<?php 
class ParentDAO {

    /**
     * Retourne un parent à partir de son nom d'utilisateur
     * 
     */
    public static function getParentParNomUtilisateur($nomUtilisateur){
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT * FROM parent 
                              INNER JOIN utilisateur 
                              ON parent.id = utilisateur.id 
                              WHERE utilisateur.nom_utilisateur = :nomUtilisateur');

        $req->execute(array('nomUtilisateur'=> $nomUtilisateur));
        $donnee = $req->fetch();

        $id = $donnee['id'];
        $nom = $donnee['nom'];
        $prenom = $donnee['prenom'];
        $courriel = $donnee['courriel'];
        $adresse = $donnee['adresse'];
        $dateDeNaissance = $donnee['date_de_naissance'];
        $photoProfil = $donnee['url_photo'];

        $parent = new ParentModel($id, $nom, $prenom, $courriel, $adresse, $dateDeNaissance, $photoProfil);
        $enfants = EnfantDAO::getEnfants($parent);
        $parent->setEnfants($enfants);
        
        BaseDonnee::close();   

        return $parent;
    }

        public static function isIdParentExistant($id) {
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT id FROM parent WHERE id = :id');
        $req->execute(array('id'=> $id));
        $donnee = $req->fetch();
        BaseDonnee::close();   
        if($donnee){
            return true;
        }
        return false;
    }

    /**
     * Enregistrer un parent dans la base de données
     * 
     * param $parent instance de ParentModel
     * 
     */
    public static function sauvegarderParent($parent){
        $bdd = BaseDonnee::getConnexion();

        //sauvegarde parent dans la BD            
        $req = $bdd->prepare('INSERT INTO parent(id, nom, prenom, courriel, adresse, date_de_naissance, url_photo)
                                    VALUES (:id, :nom, :prenom, :courriel, :adresse, :date_de_naissance, :url_photo)');
        $req->execute(array(
            'id'=> $parent->getId(),
            'nom'=> $parent->getNom(),
            'prenom'=> $parent->getPrenom(),
            'courriel'=> $parent->getCourriel(),
            'adresse'=> $parent->getAdresse(),
            'date_de_naissance'=>$parent->getDateDeNaissance(),
            'url_photo'=> $parent->getPhotoProfil()
        )); 
        BaseDonnee::close();
    }


    public static function modifierParent($parent){
        $bdd = BaseDonnee::getConnexion();
        
        $req = $bdd->prepare('UPDATE parent 
                              SET nom = :nom, prenom = :prenom, courriel = :courriel, adresse = :adresse, date_de_naissance = :date_de_naissance
                              WHERE id = :id');
        $req->execute(array(
            'nom' => $parent->getNom(),
            'prenom' => $parent->getPrenom(),
            'courriel' => $parent->getCourriel(),
            'adresse' => $parent->getAdresse(),
            'date_de_naissance' => $parent->getDateDeNaissance(),
            'id' => $parent->getId(),
            ));       

        BaseDonnee::close();
    }

    public static function getProgrammesParSemaine($idSemaine){
        $bdd = BaseDonnee::getConnexion();
        $programmes = array();
        $req = $bdd->prepare('SELECT g.titre, p.id, p.prix
                                FROM gabarit_programme AS g
                          INNER JOIN programme AS p  
                                  ON g.id = p.id_gabarit_programme
                          INNER JOIN programme_semaine
                                  ON programme_semaine.id_programme = p.id
                          INNER JOIN semaine
                                  ON semaine.id = programme_semaine.id_semaine
                               WHERE semaine.id = :idSemaine');
        $req->execute(Array('idSemaine' => $idSemaine));
        while($donnee = $req->fetch()){
            $programme = new programmeInscriptionModel($donnee['titre'], $donnee['id'], $donnee['prix']);
            array_push($programmes, $programme);
        }
        BaseDonnee::close();

        return $programmes; 
    }

    public static function getSemaines($idSession){
        $bdd = BaseDonnee::getConnexion();
        $semaines = array();
        $req = $bdd->prepare('SELECT * FROM semaine 
                            WHERE id_session = :idSession
                            ORDER BY no_semaine;
                            ');
        $req->execute(array('idSession'=>$idSession));

        while($donnee = $req->fetch()){
            $semaine = new SemaineModel($donnee['id'], $donnee['id_session'], $donnee['no_semaine']);
            array_push($semaines, $semaine);
        }
        BaseDonnee::close();
        return $semaines;      
    }

    public static function getEnfantsInscriptions($idSemaine, $parent){
        $enfants = EnfantDAO::getEnfants($parent);
        $programmes = self::getProgrammesParSemaine($idSemaine);
        $enfantsInscriptions = array();
        foreach($enfants as $enfant){
            $programmeInscrit = EnfantDAO::getProgrammeInscrit($enfant->getId(), $idSemaine);
            $estPaye = EnfantDAO::getEstPaye($enfant->getId(), $idSemaine);
            $enfantInscription = new EnfantInscriptionModel($enfant->getId(), 
                                                            $enfant->getNom(), 
                                                            $enfant->getPrenom(), 
                                                            $programmeInscrit, 
                                                            $estPaye,
                                                            $programmes);

            if($programmeInscrit){
                $nomProgramme = EnfantDAO::getNomProgramme($enfant->getId(), $idSemaine);
                $enfantInscription->setNomProgramme($nomProgramme);
            }

            array_push($enfantsInscriptions, $enfantInscription);
        }

        return $enfantsInscriptions;
    }

    public static function getSemainesProgramme($idSession, $parent){
        $semainesProgramme = array();
        $semaines = self::getSemaines($idSession);
        foreach($semaines as $semaine){
            $enfantsInscriptions = self::getEnfantsInscriptions($semaine->getId(), $parent);
            $semaineProgramme = new SemaineProgrammesModel($semaine, $enfantsInscriptions);

            array_push($semainesProgramme, $semaineProgramme);
        }

        return $semainesProgramme;
    }

    public static function payer($idParent, $numSession){
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('UPDATE `inscription` SET `paye`= 1 WHERE id_enfant IN (SELECT id_enfant 
                                                                                    FROM enfant 
                                                                                    JOIN parent 
                                                                                    WHERE parent.id = :idParent)
        AND id_programme_semaine IN (SELECT programme_semaine.id id FROM programme_semaine 
                                    JOIN programme ON programme.id = programme_semaine.id_programme
                                    JOIN session ON session.id = programme.id_session
                                    WHERE session.id = :numSession)');
        $req->execute(array(
            'idParent' => $idParent,
            'numSession' => $numSession
        ));
        BaseDonnee::close();
    }
}