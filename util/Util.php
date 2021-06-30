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

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
    public static function param($parametre) {
        if (ISSET($_REQUEST[$parametre])) {
            return $_REQUEST[$parametre];
        }
        return '';
    }    
}