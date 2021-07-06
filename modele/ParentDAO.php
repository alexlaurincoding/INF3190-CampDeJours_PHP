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

}