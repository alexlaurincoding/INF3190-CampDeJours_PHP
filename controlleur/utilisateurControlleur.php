<?php

/**
 * Controlleur Utilisateur
 */
function connexion($param){

    if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
        $nomUtilisateur = Util::param('username');
        $motDePasse = Util::param('password');

        if (UtilisateurDAO::isBonMotDePasse($nomUtilisateur, $motDePasse)) {
            $isAdmin = Session::isAdmin($nomUtilisateur);
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
        Util::redirectControlleur("parent", "index");
    }
}

function deconnexion($param){
    if(Session::isConnecte()) Session::deconnexion();
    Util::setMessage('global', 'Vous avez été déconnecté avec succès!');
    Util::redirectControlleur("accueil", "index");
}


function validerChampsFormulaire(){
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
    }else if (UtilisateurDAO::isUtilisateurExistant($username)){
        Util::setMessage("username", "Ce nom d'utilisateur n'est pas disponible.");
        $erreur = true;
    }
    if(empty($password)){
        Util::setMessage("password", "Veuillez entrer votre mot de passe.");
        $erreur = true;
     }else if(strlen($password) < 6){
        Util::setMessage("password", "Votre mot de passe doit contenir au moins 6 caracteres.");
        $erreur = true;
     }

     return $erreur;
}

function modification($param){
    $prenom = Util::param("prenom");
    $nom = Util::param("nom");
    $email = Util::param("email");
    $dateNaissance = Util::param("dateNaissance");
    $adresse = Util::param("adresse");
    $username = Util::param("username");
    $password = Util::param("password");
       
    if(validerChampsFormulaire()){

        Util::setMessage("inputPrenom", $prenom);
        Util::setMessage("inputNom", $nom);
        Util::setMessage("inputEmail", $email);
        Util::setMessage("inputDateNaissance", $dateNaissance);
        Util::setMessage("inputAdresse", $adresse);
        Util::setMessage("inputUsername", $username);

        Util::redirectControlleur("parent","index", "modifierProfil");
    }else{
        //$photoProfil = Util::enregistrerImage("photoProfil");  
        //UtilisateurDAO::sauvegarderUtilisateur($nom, $prenom, $email, $adresse, $dateNaissance, $username,  $password, $photoProfil);                  
        //Session::connexion($username);
        Util::setMessage("global", "Vos modification ont été sauvegardées.");
        Util::redirectControlleur("parent","index");
      }
    
}


function inscription($param){
    $prenom = Util::param("prenom");
    $nom = Util::param("nom");
    $email = Util::param("email");
    $dateNaissance = Util::param("dateNaissance");
    $adresse = Util::param("adresse");
    $username = Util::param("username");
    $password = Util::param("password");
       
    if(validerChampsFormulaire()){

        Util::setMessage("inputPrenom", $prenom);
        Util::setMessage("inputNom", $nom);
        Util::setMessage("inputEmail", $email);
        Util::setMessage("inputDateNaissance", $dateNaissance);
        Util::setMessage("inputAdresse", $adresse);
        Util::setMessage("inputUsername", $username);

        Vue::render('inscription');
    }else{
        $photoProfil = Util::enregistrerImage("photoProfil");  
        UtilisateurDAO::sauvegarderUtilisateur($nom, $prenom, $email, $adresse, $dateNaissance, $username,  $password, $photoProfil);                  
        Session::connexion($username);
        Util::setMessage("global", "Vous êtes maintenant inscrit.");
        Util::redirectControlleur("parent","index");
      }

}

