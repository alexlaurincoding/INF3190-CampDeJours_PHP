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
}