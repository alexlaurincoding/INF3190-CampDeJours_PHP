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

function gestionProgramme($params) {
    /*
    if(!Session::isConnecte() || !Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    */
    $infosProgramme = new ProgrammeModel(ProgrammeDAO::getSessions(), ProgrammeDAO::getTypesActivite());
    Util::setMessage('viewmodel', $infosProgramme);
    // Util::setMessage('viewmodel', ProgrammeDAO::getSessions());
    Vue::render('gestion_programme');
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
        $session = new SessionModel(Util::guidv4(), $nomSession, $description, $premiereJournee, $derniereJournee);
        $session->sauvegarder();
        Util::setMessage('global', "Session créée avec succès");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}

function validFormCreerTypeActivite() {
    $valide = true;
    $nomTypeActivite = Util::param("nomTypeActivite");
    $description = Util::param("descriptionTypeActivite");
    if (empty($nomTypeActivite)) {
        Util::setMessage("nomTypeActivite", "Veuillez entrer le type d'activité");
        $valide = false;
    }
    if (empty($description)) {
        Util::setMessage("nomTypeActivite", "Veuillez entrer la description de ce type d'activité");
        $valide = false;
    }
    return $valide;
}

function creerTypeActivite($param) {
    $nomTypeActivite = Util::param("nomTypeActivite");
    $description = Util::param("descriptionTypeActivite");

    if (!validFormCreerTypeActivite()) {
        Util::redirectControlleur('admin', 'gestionProgramme', 'creerTypeModal');
    } else {
        $typeActivite = new TypeActiviteModel(Util::guidv4(), $nomTypeActivite, $description);
        $typeActivite->sauvegarder();
        Util::setMessage('global', "Type d'activité créé avec succès!");
        Util::redirectControlleur('admin', 'gestionProgramme');
    }
}