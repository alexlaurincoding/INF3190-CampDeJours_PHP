<?php 
class EnfantModel {
    
    private $id;
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $photoProfil;
    private $notes;
    private $parent;
    private $inscriptions;
    
    function __construct($id, $nom, $prenom, $dateDeNaissance, $photoProfil, $notes, $parent, $inscriptions = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
        $this->photoProfil = $photoProfil;
        $this->notes = $notes;
        $this->parent = $parent;
        $this->inscriptions = $inscriptions;
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

    public function getDateDeNaissance(){
        return $this->dateDeNaissance;
    }

    public function getPhotoProfil(){
        return $this->photoProfil;
    }

    public function getNotes(){
        return $this->notes;
    }

    public function getParent(){
        return $this->parent;
    }

    public function getInscriptions(){
        return $this->inscriptions;
    }
}