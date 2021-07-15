<?php

/**
 * Controlleur Utilisateur
 */
    function connexion($param){
        if (!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])) {
            $nomUtilisateur = Util::param('username');
            $motDePasse = Util::param('password');

            if (UtilisateurDAO::isBonMotDePasse($nomUtilisateur, $motDePasse)) {
                $isAdmin = UtilisateurDAO::isAdmin($nomUtilisateur);
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

     function valideFormModification(){
        $valide = true;
        $prenom = Util::param("prenom");
        $nom = Util::param("nom");
        $email = Util::param("email");
        $dateNaissance = Util::param("dateNaissance");
        $adresse = Util::param("adresse");
        $password = Util::param("password");

        if(empty($prenom)){
            Util::setMessage("prenom", "Veuillez entrer votre prénom.");
            $valide = false;
        }
        if(empty($nom)){
            Util::setMessage("nom", "Veuillez entrer votre nom.");
            $valide = false;
        }
        if(empty($email)){
            Util::setMessage("email", "Veuillez entrer votre courriel.");
            $valide = false;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Util::setMessage("email", "Format de courriel invalide.");
            $valide = false;
        }
        if(empty($dateNaissance)){
            Util::setMessage("dateNaissance", "Veuillez entrer votre date de naissance.");
            $valide = false;
        }
        if(empty($adresse)){
            Util::setMessage("adresse", "Veuillez entrer votre adresse.");
            $valide = false;
        }
        if(!empty($password) && strlen($password) < 6){
            Util::setMessage("password", "Votre mot de passe doit contenir au moins 6 caracteres.");
            $valide = false;
        }

        return $valide;
    }

    function modification($param){
        $prenom = Util::param("prenom");
        $nom = Util::param("nom");
        $email = Util::param("email");
        $dateNaissance = Util::param("dateNaissance");
        $adresse = Util::param("adresse");
        $username = Session::getUsername();
        $password = Util::param("password");
        $photoProfil = null;

        if(!valideFormModification()){
            Util::setMessage("inputPrenom", $prenom);
            Util::setMessage("inputNom", $nom);
            Util::setMessage("inputEmail", $email);
            Util::setMessage("inputDateNaissance", $dateNaissance);
            Util::setMessage("inputAdresse", $adresse);
            Util::setMessage("inputUsername", $username);

            Util::redirectControlleur("parent","index", "modifierProfil");
        }else{
            $parent = Session::getParentUser();
            $parent->setPrenom($prenom);
            $parent->setNom($nom);
            $parent->setCourriel($email);
            $parent->setAdresse($adresse);
            $parent->setDateDeNaissance($dateNaissance);
            $parent->sauvegarder();
            
            if(isset($_FILES['photoProfil']) && !empty($_FILES['photoProfil']['name'])){
                Util::supprimerImage($parent->getPhotoProfil());
                $photoProfil = Util::enregistrerImage("photoProfil");
                $parent->setPhotoProfil($photoProfil);
                UtilisateurDAO::changerPhotoProfil($username, $photoProfil);
            }

            if(!empty($password)){
                UtilisateurDAO::changerMotPasse($username, $password);
            }

            Util::setMessage("global", "Vos modification ont été sauvegardées.");
            Util::redirectControlleur("parent","index");
        }
        
    }

    function valideFormInscription(){
        $valide = true;
        $prenom = Util::param("prenom");
        $nom = Util::param("nom");
        $email = Util::param("email");
        $dateNaissance = Util::param("dateNaissance");
        $adresse = Util::param("adresse");
        $username = Util::param("username");
        $password = Util::param("password");

        if(!isset($_FILES['photoProfil']) || empty($_FILES['photoProfil']['name'])){
            Util::setMessage("photoProfil", "Veuillez selectionner une photo.");
            $valide = false;
        }
        if(empty($prenom)){
            Util::setMessage("prenom", "Veuillez entrer votre prénom.");
            $valide = false;
        }
        if(empty($nom)){
            Util::setMessage("nom", "Veuillez entrer votre nom.");
            $valide = false;
        }
        if(empty($email)){
            Util::setMessage("email", "Veuillez entrer votre courriel.");
            $valide = false;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Util::setMessage("email", "Format de courriel invalide.");
            $valide = false;
        }
        if(empty($dateNaissance)){
            Util::setMessage("dateNaissance", "Veuillez entrer votre date de naissance.");
            $valide = false;
        }
        if(empty($adresse)){
            Util::setMessage("adresse", "Veuillez entrer votre adresse.");
            $valide = false;
        }
        if(empty($username)){
            Util::setMessage("username", "Veuillez entrer votre nom d'utilisateur.");
            $valide = false;
        }else if (UtilisateurDAO::isUtilisateurExistant($username)){
            Util::setMessage("username", "Ce nom d'utilisateur n'est pas disponible.");
            $valide = false;
        }
        if(empty($password)){
            Util::setMessage("password", "Veuillez entrer votre mot de passe.");
            $valide = false;
        }else if(strlen($password) < 6){
            Util::setMessage("password", "Votre mot de passe doit contenir au moins 6 caracteres.");
            $valide = false;
        }

        return $valide;
    }

    function inscription($param){
        $prenom = Util::param("prenom");
        $nom = Util::param("nom");
        $email = Util::param("email");
        $dateNaissance = Util::param("dateNaissance");
        $adresse = Util::param("adresse");
        $username = Util::param("username");
        $password = Util::param("password");
        
        if(!valideFormInscription()){
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

