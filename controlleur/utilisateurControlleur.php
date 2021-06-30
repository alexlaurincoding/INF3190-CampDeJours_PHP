<?php

/**
 * Controlleur Utilisateur
 */

function index($param){
    if(!Session::isConnecte()){
        throw new Exception("Accès interdit");
    }
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
    } else {
        Util::redirectControlleur("utilisateur", "index");
    }
}

function deconnexion($param){
    if(Session::isConnecte()) Session::deconnexion();
    Util::setMessage('global', 'Vous avez été déconnecté avec succès!');
    Util::redirectControlleur("accueil", "index");
}

function inscription($param){
    $erreur = false;
    $prenom = Util::param("prenom");
    $nom = Util::param("nom");
    $email = Util::param("email");
    $dateNaissance = Util::param("dateNaissance");
    $adresse = Util::param("adresse");
    $username = Util::param("username");
    $password = Util::param("password");
    
    if(!isset($_FILES['photoProfil']) || empty($_FILES['photoProfil']['name'])){
        Util::setMessage("photoProfil", "Veuillez selectionner une photo.");
        $erreur = true;
    }
    if(empty($prenom)){
        Util::setMessage("prenom", "Veuillez entrer votre prénom.");
        $erreur = true;
    }
    if(empty($nom)){
        Util::setMessage("nom", "Veuillez entrer votre nom.");
        $erreur = true;
    }
    if(empty($email)){
        Util::setMessage("email", "Veuillez entrer votre courriel.");
        $erreur = true;
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        Util::setMessage("email", "Format de courriel invalide.");
        $erreur = true;
    }
    if(empty($dateNaissance)){
        Util::setMessage("dateNaissance", "Veuillez entrer votre date de naissance.");
        $erreur = true;
    }
    if(empty($adresse)){
        Util::setMessage("adresse", "Veuillez entrer votre adresse.");
        $erreur = true;
    }
    if(empty($username)){
        Util::setMessage("username", "Veuillez entrer votre nom d'utilisateur.");
        $erreur = true;
    }else if (Utilisateur::isUtilisateurExistant($username)){
        Util::setMessage("username", "Ce nom d'utilisateur n'est pas disponible.");
        $erreur = true;
    }
    if(empty($password)){
        Util::setMessage("password", "Veuillez entrer votre mot de passe.");
        $erreur = true;
     }       
    if($erreur){
        require('vue/inscription.php');
    }else{
        $photoProfil = Util::enregistrerImage("photoProfil");
        sauvegarderUtilisateur($nom, $prenom, $email, $adresse, $dateNaissance, $username,  $password, $photoProfil);                  
        Session::connexion($prenom);
        Util::redirectControlleur("utilisateur","index");
      }     
}

