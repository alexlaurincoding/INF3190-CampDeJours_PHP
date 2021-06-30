<?php

/**
 * Controlleur Utilisateur
 */

function index($param){
    require('vue/tableau_bord_parent.php');
}

function connexion($param){
    
    if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
        $nomUtilisateur = Util::sanitizeUserInput($_REQUEST["username"]);
        $motDePasse = Util::sanitizeUserInput($_REQUEST["password"]);

        if (Utilisateur::isBonMotDePasse($nomUtilisateur, $motDePasse)) {
            $isAdmin = Utilisateur::isAdmin($nomUtilisateur);
            Session::connexion($nomUtilisateur, $isAdmin);
        } else {
            throw new Exception ("Mauvais nom d'utilisateur ou mot de passe.");
        }
    } else {
       throw new Exception ("Nom d'utilisateur ou mot de passe manquant.");
    }
    Util::setMessage("global", "Vous êtes maintenant connecté(e).");
    if (Session::isAdmin()) {
        Util::redirectControlleur("admin", "index");
    } else if (Session::isConnecte()) {
        Util::redirectControlleur("utilisateur", "index");
    }
}

function deconnexion($param){
    Session::deconnexion();
    Util::setMessage('global', 'Vous avez été doconnecté avec succès!');
    Util::redirectControlleur("accueil", "index");
}

function inscription(){
        
}