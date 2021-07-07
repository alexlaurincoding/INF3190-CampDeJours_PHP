<?php
class ActiviteModel {
   private $id;
   private $nom;
   private $typeActivite;

   function __construct($id, $nom, $typeActivite) {
      $this->id = $id;
      $this->nom = $nom;
      $this->typeActivite = $typeActivite;
   }

   public function sauvegarder() {
      ProgrammeDAO::creerActivite($this);
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
   public function getTypeActivite() {
      return $this->typeActivite;
   }

   /**
    * Set the value of typeActivite
    *
    * @return  self
    */ 
   public function setTypeActivite($typeActivite) {
      $this->typeActivite = $typeActivite;
      return $this;
   }


}

