<?php
class Utilisateur {

    public static function isUtilisateurExistant($nomUtilisateur) {
        return true;
    }

    public static function isBonMotDePasse($nomUtilisateur, $mdp) {
        $isBonMotDePasse = false;
        if (self::isUtilisateurExistant($nomUtilisateur)) {
            $isBonMotDePasse = true;
        } 
        return $isBonMotDePasse;
    }

    

    public function inscription(){
        
    }

    public static function isAdmin($nomUtilisateur) {
        // faire!
        
    }
}