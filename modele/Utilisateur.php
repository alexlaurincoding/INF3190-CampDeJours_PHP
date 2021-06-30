<?php
class Utilisateur {

    public static function isUtilisateurExistant($nomUtilisateur) {
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT nom_utilisateur FROM utilisateur WHERE nom_utilisateur = :nomUtilisateur');
        $req->execute(array('nomUtilisateur'=> $nomUtilisateur));
        $donnee = $req->fetch();
        BaseDonnee::close();   
        if($donnee){
            return true;
        }
        return false;
    }

    public static function isBonMotDePasse($nomUtilisateur, $motDePasse) {
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT nom_utilisateur, mot_de_passe FROM utilisateur WHERE nom_utilisateur = :nomUtilisateur');
        $req->execute(array('nomUtilisateur'=> $nomUtilisateur));
        $donnee = $req->fetch();
        BaseDonnee::close();
        return password_verify($motDePasse, $donnee['mot_de_passe']);
    }

    public static function getUtilisateur($id){

    }

    public static function sauvegarderUtilisateur($nom, $prenom, $email, $adresse, $dateNaissance, $username,  $password, $photoProfil){   
        //sauvegarde utilisateur dans la BD
        $bdd = BaseDonnee::getConnexion();
        $idUtilisateur = Util::guidv4();
        $req = $bdd->prepare('INSERT INTO utilisateur(id, nom_utilisateur, mot_de_passe, est_admin)
                        VALUES (:id, :nom_utilisateur, :mot_de_passe, :est_admin)');
        $req->execute(array(
            'id'=> $idUtilisateur,
            'nom_utilisateur'=> $username,
            'mot_de_passe'=> password_hash($password,  PASSWORD_DEFAULT),
            'est_admin' => 0 
        ));        
        BaseDonnee::close();

        //Sauvegarder un nouveau parent dans la base de données
        $parent = new ParentModel($idUtilisateur, $nom, $prenom, $email, $adresse, $dateNaissance, $photoProfil);
        $parent-> sauvegarder();
    }

    public static function isAdmin($nomUtilisateur) {
        return false;
        
    }
}