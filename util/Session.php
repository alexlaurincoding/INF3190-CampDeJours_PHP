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
        UNSET($_SESSION['connecte']);
        UNSET($_SESSION['username']);
        UNSET($_SESSION['isAdmin']);

        session_destroy();
        session_start();
    }

    public static function connexion($nomUtilisateur, $isAdmin = false){
        $_SESSION["connecte"] = true;
        $_SESSION["username"] = $nomUtilisateur;
        if ($isAdmin) {
            $_SESSION["isAdmin"] = true;
        }else{
            $parent = ParentDAO::getParentParNomUtilisateur($nomUtilisateur);
            $_SESSION["parent"] = $parent;
        }
    }

    public static function reload(){
        self::connexion(self::getUsername());
    }

    public static function getUsername(){
        if(isset($_SESSION["username"])){
            return $_SESSION["username"];
        }
    }

    public static function getParentUser(){
         if(isset($_SESSION["parent"])){
            return $_SESSION["parent"];
        }       
    }


}