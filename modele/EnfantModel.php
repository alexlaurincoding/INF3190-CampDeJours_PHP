<?php 
class EnfantModel implements JsonSerializable{
    
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

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public static function creerEnfant(){
        return new EnfantModel(Util::guidv4(), null, null, null, null, null, null);
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

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setDateDeNaissance($dateDeNaissance){
        $this->dateDeNaissance = $dateDeNaissance;
    }

    public function setPhotoProfil($photoProfil){
        $this->photoProfil = $photoProfil;
    }

    public function setNotes($note){
        $this->notes = $note;
    }

    public function setParent($parent){
        $this->parent = $parent;
    }

    public function setInscriptions($inscriptions){
        $this->inscriptions = $inscriptions;
    }

    public function sauvegarder(){
        if(EnfantDAO::isIdEnfantExistant($this->id)){
            //Modifier un enfant existant
            EnfantDAO::modifierEnfant($this);
        }else{
            //Créer un nouveau enfant
            EnfantDAO::sauvegarderEnfant($this);
        }
    }
}