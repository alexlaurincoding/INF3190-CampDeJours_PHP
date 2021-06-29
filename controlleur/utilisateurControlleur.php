<?php

/**
 * Controlleur Utilisateur (par défaut)
 */

// function index($param){
//     require('vue/accueil.php');
// }

function connexion($param){
    if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
        $nomUtilisateur = Util::sanitizeUserInput($_REQUEST["username"]);
        $motDePasse = Util::sanitizeUserInput($_REQUEST["password"]);

        if (Utilisateur::isBonMotDePasse($utilisateur, $motDePasse)) {
            $isAdmin = Utilisateur::isAdmin($utilisateur)
            Session::connexion($nomUtilisateur, $isAdmin);
        } else {
            throw new Exception ("Mauvais nom d'utilisateur ou mot de passe.");
        }
    } else {
       throw new Exception ("Nom d'utilisateur ou mot de passe manquant.");
    }
    if (Session::isAdmin()) {
        //redirige vers controleur 
        
    }
}

function deconnexion($param){
    $utilisateur = new Utilisateur();
    $messageTest = $utilisateur->deconnexion();
    throw new Exception ($messageTest);
}