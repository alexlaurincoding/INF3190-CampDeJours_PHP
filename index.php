<?php

try {
    if (!ISSET($_SESSION)) session_start();

    $controlleur = getControlleur();
    $actionControlleur = getAction();
    $param = getParam();

    require('controlleur/'.$controlleur.'Controlleur.php');
    $actionControlleur($param);
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

function getControlleur(){
    $controlleur_defaut = "accueil";
    $params = getUrlParams();
    $controlleur = (ISSET($params[1]))?$params[1]:$controlleur_defaut;

    return $controlleur;
}

function getAction(){
    $action_defaut = "index";
    $params = getUrlParams();
    $action = (ISSET($params[2]))?$params[2]:$action_defaut;

    return $action;
}

function getParam(){
    $params = getUrlParams();
    $param = $param = (ISSET($params[3])&&$params[3]!='')?$params[3]:'';

    return $param;
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