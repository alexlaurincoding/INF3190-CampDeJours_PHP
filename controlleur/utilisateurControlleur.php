<?php

/**
 * Controlleur Utilisateur (par défaut)
 */

// function index($param){
//     require('vue/accueil.php');
// }

function connexion($param){
    $utilisateur = new Utilisateur();
    $messageTest = $utilisateur->connexion();
    throw new Exception ($messageTest);
}

function deconnexion($param){
    $utilisateur = new Utilisateur();
    $messageTest = $utilisateur->deconnexion();
    throw new Exception ($messageTest);
}