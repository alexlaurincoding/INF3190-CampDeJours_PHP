<?php
/**
 * Controlleur Parent
 */

function index($param){
    if(!Session::isConnecte() || Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
    Util::setMessage('viewmodel', Session::getParentUser());
    Util::setMessage('sessions', GestionProgrammeDAO::getSessions());

    $idSessionDefaut = numSession();

    Util::setMessage('semainesProgramme', ParentDAO::getSemainesProgramme($idSessionDefaut, Session::getParentUser()));

    Vue::render('tableau_bord_parent');
}

    function valideFormAjoutEnfant(){
        $valide = true;
        $prenom = Util::param("prenomEnfant");
        $nom = Util::param("nomEnfant");
        $dateNaissance = Util::param("dateNaissanceEnfant");

        if(!isset($_FILES['photoEnfant']) || empty($_FILES['photoEnfant']['name'])){
            Util::setMessage("photoEnfant", "Veuillez selectionner une photo.");
            $valide = false;
        }

        if(empty($prenom)){
            Util::setMessage("prenomEnfant", "Veuillez entrer le prénom de l'enfant.");
            $valide = false;
        }
        if(empty($nom)){
            Util::setMessage("nomEnfant", "Veuillez entrer le nom de l'enfant.");
            $valide = false;
        }

        if(empty($dateNaissance)){
            Util::setMessage("dateNaissanceEnfant", "Veuillez entrer la date de naissance de L'enfant.");
            $valide = false;
        }

        return $valide;
    }

    function ajouterEnfant($param){
        $prenom = Util::param("prenomEnfant");
        $nom = Util::param("nomEnfant");
        $dateNaissance = Util::param("dateNaissanceEnfant");
        
        if(!valideFormAjoutEnfant()){
            Util::setMessage("inputPrenom", $prenom);
            Util::setMessage("inputNom", $nom);
            Util::setMessage("inputDateNaissance", $dateNaissance);

            Util::redirectControlleur("parent","index", "ajouterEnfant");
        }else{
            $parent = Session::getParentUser();
            $photo = Util::enregistrerImage("photoEnfant"); 

            $enfant = EnfantModel::creerEnfant();
            $enfant->setNom($nom);
            $enfant->setPrenom($prenom);
            $enfant->setDateDeNaissance($dateNaissance);
            $enfant->setPhotoProfil($photo);
            $enfant->setParent($parent);
            $enfant->sauvegarder();
            
            //Mettre à jour la liste des enfants du parent dans la session
            Session::reload();

            Util::setMessage("global", "Enfant ajouté avec succès!");
            Util::redirectControlleur("parent","index");
        }
    }

    function valideFormModifEnfant($idEnfant){
        $valide = true;
        $prenom = Util::param("prenomEnfant");
        $nom = Util::param("nomEnfant");
        $dateNaissance = Util::param("dateNaissanceEnfant");

        if(empty($prenom)){
            Util::setMessage("prenomEnfantModif" . $idEnfant, "Veuillez entrer le prénom de l'enfant.");
            $valide = false;
        }
        if(empty($nom)){
            Util::setMessage("nomEnfantModif" . $idEnfant, "Veuillez entrer le nom de l'enfant.");
            $valide = false;
        }

        if(empty($dateNaissance)){
            Util::setMessage("dateNaissanceEnfantModif" . $idEnfant, "Veuillez entrer la date de naissance de L'enfant.");
            $valide = false;
        }

        return $valide;
    }

    function modifierEnfant($param){
        $prenom = Util::param("prenomEnfant");
        $nom = Util::param("nomEnfant");
        $dateNaissance = Util::param("dateNaissanceEnfant");
        $notes = Util::param("notesEnfant");

        $enfant = EnfantDAO::getEnfantParId($param);
        
        if(!valideFormModifEnfant($enfant->getId())){
            Util::redirectControlleur("parent","index", "modifierEnfant" . $enfant->getId());
        }else{

            $enfant->setPrenom($prenom);
            $enfant->setNom($nom);
            $enfant->setDateDeNaissance($dateNaissance);
            $enfant->setNotes($notes);
            $enfant->sauvegarder();
            
            if(isset($_FILES['photoEnfant']) && !empty($_FILES['photoEnfant']['name'])){
                Util::supprimerImage($enfant->getPhotoProfil());
                $photoProfil = Util::enregistrerImage("photoEnfant");
                $enfant->setPhotoProfil($photoProfil);
                EnfantDAO::changerPhotoProfil($enfant->getId(), $photoProfil);
            }

            //Mettre à jour la liste des enfants du parent dans la session
            Session::reload();

            Util::setMessage("global", "Vos modification ont été sauvegardées.");
            Util::redirectControlleur("parent","index");
        }
    }

    function inscrireEnfant($param){
        $idEnfant = Util::param("idEnfant");
        $idProgramme = Util::param("idProgramme");
        $idSemaine = Util::param("idSemaine");

        EnfantDAO::inscrireEnfant($idEnfant, $idProgramme, $idSemaine);

        Util::setMessage("global", "Votre enfant maintenant est inscrit!");
        Util::redirectControlleur("parent","index");
    }

    function retirerEnfant($param){
        $idEnfant = Util::param("idEnfant");
        $idSemaine = Util::param("idSemaine");

        EnfantDAO::retirerEnfant($idEnfant, $idSemaine);

        Util::setMessage("global", "Votre enfant maintenant est retiré du programme!");
        Util::redirectControlleur("parent","index");
    }

    function numSession() {
        if (!empty($_POST) && isset($_POST["numSession"])) 
            $_SESSION["numSession"] = $_POST["numSession"];
        else if (!isset($_SESSION["numSession"])) 
            $_SESSION["numSession"] = GestionProgrammeDAO::getSessions()[0]->getId();

        return $_SESSION["numSession"];
    }