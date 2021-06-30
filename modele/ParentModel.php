<?php 
class ParentModel {
    
    private $prenom;
    private $nom;
    private $courriel;
    
    function __construct($prenom, $nom, $courriel) {
        $this->$prenom = $prenom;
        $this->$nom = $nom;
        $this->$courriel = $courriel;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getCourriel(){
        return $this->courriel;
    }
}