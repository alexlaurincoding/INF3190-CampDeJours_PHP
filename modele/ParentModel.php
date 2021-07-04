<?php 
class ParentModel {
    
    private $id;
    private $nom;
    private $prenom;
    private $courriel;
    private $adresse;
    private $dateDeNaissance;
    private $photoProfil;
    private $enfants;
    
    function __construct($id, $nom, $prenom, $courriel, $adresse, $dateDeNaissance, $photoProfil, $enfants = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->courriel = $courriel;
        $this->adresse = $adresse;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->photoProfil = $photoProfil;
        $this->enfants = $enfants;
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getCourriel(){
        return $this->courriel;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getDateDeNaissance(){
        return $this->dateDeNaissance;
    }

    public function getPhotoProfil(){
        return $this->photoProfil;
    }

    public function getEnfants(){
        return $this->enfants;
    }

    public function sauvegarder(){
        if(UtilisateurDAO::isUtilisateurExistant($this->id)){
            //Modifier un parent existant
            ParentDAO::modifierParent($this);
        }else{
            //Créer un nouveau parent
            ParentDAO::sauvegarderParent($this);
        }
    }
}