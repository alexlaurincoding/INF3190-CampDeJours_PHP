<?php 
class Session {
    public static function isConnecte(){
        // return true;
        return ISSET($_SESSION) && ISSET($_SESSION['connecte']);
    }

    public static function isAdmin(){
        // return true;
        return ISSET($_SESSION) && ISSET($_SESSION['isAdmin']);
    }

    public static function deconnexion(){
        return "Utilisateur-> deconnexion() a fonctionne";
        /*
            UNSET($_SESSION['connecte']);
            UNSET($_SESSION['username']);
            UNSET($_SESSION['isAdmin']);
            session_destroy();
            Diriger sur la page d'accueil
        */
    }

    public static function connexion($nomUtilisateur, $isAdmin = false){
        $_SESSION["connecte"] = true;
        $_SESSION["username"] = $nomUtilisateur; // username ==> utilisateur  (francais esti!)
        if ($isAdmin) {
            $_SESSION["isAdmin"] = true;
        }
        return "Utilisateur-> connexion() a fonctionne";
        /*
            Récupérer connexion à la base de données
            Vérifier si déjà connecté
            Récupérer nom d'utilisateur et mot de passe dans le formulaire
            Vérifier format des deux inputs. Retourner erreur au besoin
            Vérifier si utilisateur existe
            Récupérer le hash du mot de passe de l'utilisateur dans la bdd
            Comparer les deux hash
            Vérifier si estAdmin
            Initialiser la variable SESSION['connecte']
            Initialiser la variable SESSION['username']
            Diriger l'utilisateur sur sa page personnelle
            Fermer connexion à la base de données
        */
    }


}