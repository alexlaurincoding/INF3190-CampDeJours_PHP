<?php
/**
 * Controlleur Parent
 */

function index($param){
    if(!Session::isConnecte() || Session::isAdmin()){
        throw new Exception("Accès interdit");
    }
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
            
            $parent->ajouterEnfant($enfant);

            Util::setMessage("global", "Enfant ajouté avec succès!");
            Util::redirectControlleur("parent","index");
        }
    }