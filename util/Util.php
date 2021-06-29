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
        if (ISSET($_REQUEST['messages'][$parametre])) {
            return $_REQUEST['messages'][$parametre];
        }
        return '';
    }
    
    public static function setMessage($parametre,$valeur) {
        if (!ISSET($_REQUEST['messages'])) {
            $_REQUEST['messages'] = array();
        }
        $_REQUEST['messages'][$parametre] = $valeur;
    }
}