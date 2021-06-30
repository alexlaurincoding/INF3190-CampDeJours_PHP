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
        
        $enfants = EnfantDAO::getEnfantsParNomUtilisateurParent($nomUtilisateur);

        $parent = new ParentModel($id, $nom, $prenom, $courriel, $adresse, $dateDeNaissance, $photoProfil, $enfants);
        
        BaseDonnee::close();   

        return $parent;
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

}