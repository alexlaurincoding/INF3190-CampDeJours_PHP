<?php
//Autochargement des Classes
spl_autoload_register(function($classeACharger) {
        $dossiers = array(
            'controlleur/',
            'modele/',
            'config/',
            'util/'
        );
        foreach( $dossiers as $dossier ) {
            if (file_exists($dossier . $classeACharger . '.php')) {
                require_once($dossier . $classeACharger . '.php');
                return TRUE;
            }
        }
        return FALSE;
    });

try {
    if (!ISSET($_SESSION)) session_start();

    $controlleur = getControlleur();
    $actionControlleur = getActionControlleur();
    $param = getParam();

    if (file_exists('controlleur/'.$controlleur.'Controlleur.php'))
        require('controlleur/'.$controlleur.'Controlleur.php');
    else throw new Exception ("Erreur 404 page ".$controlleur." introuvable");

    $actionControlleur($param);
}
catch(Exception $e) {
    $msgErreur = $e->getMessage();
    require('vue/erreur.php');
}

function getControlleur(){
    $controlleur_defaut = "accueil";
    $params = getUrlParams();
    $controlleur = (ISSET($params[1]))?$params[1]:$controlleur_defaut;
    
    return htmlspecialchars($controlleur);
}

function getActionControlleur(){
    $action_defaut = "index";
    $params = getUrlParams();
    $action = (ISSET($params[2]))?$params[2]:$action_defaut;

    return htmlspecialchars($action);
}

function getParam(){
    $params = getUrlParams();
    $param = $param = (ISSET($params[3])&&$params[3]!='')?$params[3]:'';

    return htmlspecialchars($param);
}

function getUrlParams(){
    $chemin = getChemin();
    $url = (ISSET($_SERVER['REDIRECT_URL'])) ? $_SERVER['REDIRECT_URL'] : '.';
    $requete = str_replace($chemin, '', $url);
    $paramsTab = explode('/',$requete);
    
    return $paramsTab;
}

function getChemin() {
    return (ISSET($_SERVER['REDIRECT_BASE'])) ? $_SERVER['REDIRECT_BASE'] : '.';
}