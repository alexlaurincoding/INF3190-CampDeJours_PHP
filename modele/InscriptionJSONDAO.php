<?php 
class inscriptionJSONDAO{

    public function getIDSemaine($idSession, $noSemaine){
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('SELECT id FROM semaine 
                            WHERE id_session = :idSession
                            AND :no_semaine = :noSemaine
                            ');
        $req->execute(array('idSession'=>$idSession,
                            'noSemaine'=>$noSemaine));

        $idSemaine = $req->fetch();

        BaseDonnee::close();
        return $idSemaine;       
    }

    public static function getInscriptions(){
        $bdd = BaseDonnee::getConnexion();
        $inscriptions = array();
        $reponse = $bdd->query('SELECT enfant.nom enfantNom, 
                                enfant.prenom enfantPrenom, 
                                parent.nom parentNom, 
                                parent.prenom parentPrenom, 
                                session.nom sessionNom, 
                                gabarit_programme.titre, 
                                semaine.no_semaine, 
                                inscription.paye
                            FROM inscription
                            JOIN enfant ON enfant.id = inscription.id_enfant
                            JOIN programme_semaine ON programme_semaine.id = inscription.id_programme_semaine
                            JOIN semaine ON semaine.id = programme_semaine.id_semaine
                            JOIN programme ON programme.id = programme_semaine.id_programme
                            JOIN gabarit_programme ON gabarit_programme.id = programme.id_gabarit_programme
                            JOIN session ON session.id = programme.id_session
                            JOIN parent ON parent.id = enfant.id_parent');
        while($donnee = $reponse->fetch()){
            $enfant = $donnee['enfantNom'] . ', ' . $donnee['enfantPrenom'];
            $parent = $donnee['parentNom'] . ', ' . $donnee['parentPrenom'];
            $session = $donnee['sessionNom'];
            $programme = $donnee['titre'];
            $semaine = 'Semaine ' . $donnee['no_semaine'];
            $paye = $donnee['paye'];
            $inscription = new inscriptionsJSONModel($enfant, $parent, $session, $programme, $semaine, $paye);
            array_push($inscriptions, $inscription);
        }
        BaseDonnee::close();       

        return $inscriptions;     
    }

    public static function getEnfants(){
        $bdd = BaseDonnee::getConnexion();
        $enfants = array();
        $reponse = $bdd->query('SELECT enfant.id, enfant.nom, enfant.prenom, enfant.date_naissance, enfant.url_photo, parent.nom nomParent, parent.prenom prenomParent
                                FROM enfant INNER JOIN parent ON parent.id = enfant.id_parent');
         while($donnee = $reponse->fetch()){
            $idEnfant = $donnee['id'];
            $nomEnfant = $donnee['nom'];
            $prenomEnfant = $donnee['prenom'];
            $dateEnfant = $donnee['date_naissance'];
            $photoEnfant = $donnee['url_photo'];
            $nomParent = $donnee['nomParent'] . ", " . $donnee['prenomParent'];

<<<<<<< HEAD


            $enfant = new EnfantJSONModel($idEnfant, $nomEnfant, $prenomEnfant, $dateEnfant, $photoEnfant, $nomParent);
            array_push($enfants, $enfant);
         }
         return $enfants;
    }

    public static function getParents(){
        $bdd = BaseDonnee::getConnexion();
        $parents = array();
        $reponse = $bdd->query('SELECT * FROM parent');
         while($donnee = $reponse->fetch()){
            $idParent = $donnee['id'];
            $nomParent = $donnee['nom'];
            $prenomParent = $donnee['prenom'];
            $courriel = $donnee['courriel'];
            $adresse = $donnee['adresse'];
            $dateNaissance = $donnee['date_de_naissance'];
            $photo = $donnee['url_photo'];
            
            $parent = new ParentJSONModel($idParent, $nomParent, $prenomParent, $courriel, $adresse, $dateNaissance, $photo);
            array_push($parents, $parent);
         }
         return $parents;
=======
        foreach($inscriptions as $inscription){
            $req = $bdd->prepare('UPDATE inscription
                                SET paye = 1
                                WHERE id_programme_semaine = :idProgramme
                                AND id_enfant = :idEnfant');
            $req->execute(array('idProgramme' => $inscription->getIdProgrammeSemaine(),
                                'idEnfant' => $inscription->getIdEnfant()));
        }
        Util::setMessage("global", "Payment effectué avec succès!");
        // Util::redirectControlleur("parent","index"); 
>>>>>>> c9342c33c6293295a6e6d21b104a0487260b92a9
    }
    
}