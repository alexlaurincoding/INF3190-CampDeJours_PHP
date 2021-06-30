<?php
class Util {
    public static function sanitizeUserInput($input) {
        return trim(stripslashes(htmlspecialchars($input)));
    }

    public static function getChemin() {
    return (ISSET($_SERVER['REDIRECT_BASE'])) ? $_SERVER['REDIRECT_BASE'] : '.';
    }

    public static function redirectControlleur($controlleur,$action){
        $url = getChemin()."/$controlleur/$action";
        header('Location: '.$url);
        die();
    }

    public static function message($parametre) {
        if (ISSET($_SESSION['messages'][$parametre])) {
            $msg = $_SESSION['messages'][$parametre];
            unset($_SESSION['messages'][$parametre]);
            return $msg;
        }
        return '';
    }
    
    public static function setMessage($parametre,$valeur) {
        if (!ISSET($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
        $_SESSION['messages'][$parametre] = $valeur;
    }

    public static function param($parametre) {
        if (ISSET($_REQUEST[$parametre])) {
            return $_REQUEST[$parametre];
        }
        return '';
    }    
}