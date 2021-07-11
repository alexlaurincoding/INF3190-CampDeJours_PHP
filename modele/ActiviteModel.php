<?php
class ActiviteModel implements JsonSerializable{
   private $id;
   private $nom;
   private $idTypeActivite;

   function __construct($id, $nom, $idTypeActivite) {
      $this->id = $id;
      $this->nom = $nom;
      $this->idTypeActivite = $idTypeActivite;
   }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

   public function sauvegarder() {
      GestionProgrammeDAO::creerActivite($this);
   }
   

   /**
    * Get the value of id
    */ 
   public function getId() {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id) {
      $this->id = $id;
      return $this;
   }

   /**
    * Get the value of nom
    */ 
   public function getNom() {
      return $this->nom;
   }

   /**
    * Set the value of nom
    *
    * @return  self
    */ 
   public function setNom($nom) {
      $this->nom = $nom;
      return $this;
   }

   /**
    * Get the value of typeActivite
    */ 
   public function getIdType() {
      return $this->idTypeActivite;
   }

   /**
    * Set the value of typeActivite
    *
    * @return  self
    */ 
   public function setIdType($idTypeActivite) {
      $this->idTypeActivite = $idTypeActivite;
      return $this;
   }


}

