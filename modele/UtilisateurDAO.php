<?php
class UtilisateurDAO {

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

    public static function isIdUtilisateurExistant($idUtilisateur) {
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT nom_utilisateur FROM utilisateur WHERE id = :id');
        $req->execute(array('id'=> $idUtilisateur));
        $donnee = $req->fetch();
        BaseDonnee::close();   
        if($donnee){
            return true;
        }
        return false;
    }

    public static function isAdmin($nomUtilisateur){
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT est_admin FROM utilisateur WHERE nom_utilisateur = :nomUtilisateur');
        $req->execute(array('nomUtilisateur'=> $nomUtilisateur));
        $donnee = $req->fetch();
        BaseDonnee::close();   

        return $donnee['est_admin'] == 1;     
    }

    public static function isBonMotDePasse($nomUtilisateur, $motDePasse) {
        $hashPass = '';     
        if(self::isUtilisateurExistant($nomUtilisateur)){
            $bdd = BaseDonnee::getConnexion();
            $req = $bdd->prepare('SELECT nom_utilisateur, mot_de_passe FROM utilisateur WHERE nom_utilisateur = :nomUtilisateur');
            $req->execute(array('nomUtilisateur'=> $nomUtilisateur));
            $donnee = $req->fetch();
            $hashPass = $donnee['mot_de_passe'];
            BaseDonnee::close();
        }

        return password_verify($motDePasse, $hashPass);
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

    public static function changerPhotoProfil($username, $photoProfil){
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('UPDATE parent INNER JOIN utilisateur ON parent.id = utilisateur.id
                              SET parent.url_photo = :url_photo 
                              WHERE nom_utilisateur = :nom_utilisateur');
        $req->execute(array(
            'url_photo' => $photoProfil,
            'nom_utilisateur' => $username
            ));

        BaseDonnee::close();
    }


    public static function changerMotPasse($username, $password){
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('UPDATE utilisateur SET mot_de_passe = :mot_de_passe 
                              WHERE nom_utilisateur = :nom_utilisateur');
        $req->execute(array(
            'mot_de_passe' => password_hash($password,  PASSWORD_DEFAULT),
            'nom_utilisateur' => $username
            ));

        BaseDonnee::close();
    }
}