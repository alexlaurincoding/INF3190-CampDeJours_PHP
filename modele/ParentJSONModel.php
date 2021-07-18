<?php 

class ParentJSONModel{
    public $id;
    public $nom;
    public $prenom;
    public $courriel;
    public $adresse;
    public $dateNaissance;
    public $photo;


    public function __construct($id, $nom, $prenom, $courriel, $adresse, $dateNaissance, $photo){
        $this->id = $nom . ", " . $prenom;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->courriel = $courriel;
        $this->adresse = $adresse;
        $this->dateNaissance = $dateNaissance;
        $this->photo = $photo;

    }

    
}