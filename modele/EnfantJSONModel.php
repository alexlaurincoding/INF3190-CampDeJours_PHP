<?php 

class EnfantJSONModel{
    public $id;
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $photo;
    public $parent;

    public function __construct($id, $nom, $prenom, $dateNaissance, $photo, $parent){
        $this->id = $nom . ", " . $prenom;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->photo = $photo;
        $this->parent = $parent;
    }

    
}