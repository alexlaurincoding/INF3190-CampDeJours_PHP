<?php
/**
 * Controlleur Parent
 */

function index($param){
    if(!Session::isConnecte() || Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    Vue::render('tableau_bord_parent');
}
