<?php 
class ParentModel implements JsonSerializable{
    
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
        if(is_null($enfants)){
            $this->enfants = array();
        }else{
            $this->enfants = $enfants;
        }
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
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


    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setCourriel($courriel){
        $this->courriel = $courriel;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function setDateDeNaissance($dateNaissance){
        $this->dateDeNaissance = $dateNaissance;
    }

    public function setPhotoProfil($photoProfil){
        $this->photoProfil = $photoProfil;
    }

    public function setEnfants($enfants){
        $this->enfants = $enfants;
    }

    public function ajouterEnfant($enfant){
        array_push($this->enfants, $enfant);
    }

    public function sauvegarder(){
        if(ParentDAO::isIdParentExistant($this->id)){
            //Modifier un parent existant
            ParentDAO::modifierParent($this);
        }else{
            //Créer un nouveau parent
            ParentDAO::sauvegarderParent($this);
        }
    }
}