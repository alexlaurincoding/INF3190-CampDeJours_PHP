<?php

/**
 * Controlleur Admin
 */

function index($params) {
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    require("vue/inscription_admin.php");
}

function gestionProgramme($params) {
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    require("vue/gestion_programme.php");
}