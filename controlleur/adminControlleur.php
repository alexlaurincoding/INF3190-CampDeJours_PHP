<?php

/**
 * Controlleur Admin
 */
function index($params) {
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    Vue::render('inscription_admin');
}

function validFormCreerSession(){
        $valide = true;
        $nomSession = Util::param("nomSession");
        $description = Util::param("descriptionSession");
        $premiereJournee = Util::param("premiereJournee");
        $derniereJournee = Util::param("derniereJournee");

        if(empty($nomSession)){
            Util::setMessage("nomSession", "Veuillez entrer le nom de la session.");
            $valide = false;
        }
        if(empty($description)){
            Util::setMessage("descriptionSession", "Veuillez entrer une description.");
            $valide = false;
        }
        if(empty($premiereJournee)){
            Util::setMessage("premiereJournee", "Veuillez entrer le premier jour.");
            $valide = false;
        }
        if(empty($derniereJournee)){
            Util::setMessage("derniereJournee", "Veuillez entrer le dernier jour.");
            $valide = false;
        }

        return $valide;
}

function creerSession($param){
    $nomSession = Util::param("nomSession");
    $description = Util::param("descriptionSession");
    $premiereJournee = Util::param("premiereJournee");
    $derniereJournee = Util::param("derniereJournee");  

    if(!validFormCreerSession()){
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerSessionModal');
    }else{    
        $session = new SessionModel($nomSession, $description, $premiereJournee, $derniereJournee);
        $session->sauvegarder();
        Util::setMessage('global', "Session créée avec succès");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}

function gestionProgramme($params) {
    /*
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    */
    Vue::render('gestion_programme');
}