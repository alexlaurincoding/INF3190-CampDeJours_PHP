<?php
/**
 * Controlleur Parent
 */

function index($param){
    if(!Session::isConnecte() || Session::isAdmin()){
        throw new Exception("Accès interdit");
    }

    $parent = new ParentModel("Mathieu", "Charbonneau", "courriel");
    Util::setMessage("parent", $parent);
    Vue::render('tableau_bord_parent');
}
