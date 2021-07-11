<?php
class ProgrammeModel {
   private $id;
   private $idGabaritProgramme;
   private $idSession;
   private $animateurs;
   private $prix;
   private $numeroSemaines = array();
   // horraire?

   function __construct($id, $idGabaritProgramme, $idSession) {
      $this->id = $id;
      $this->idGabaritProgramme = $idGabaritProgramme;
      $this->idSession = $idSession;
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
    * Get the value of idGabaritProgramme
    */ 
   public function getIdGabaritProgramme() {
      return $this->idGabaritProgramme;
   }

   /**
    * Set the value of idGabaritProgramme
    *
    * @return  self
    */ 
   public function setIdGabaritProgramme($idGabaritProgramme) {
      $this->idGabaritProgramme = $idGabaritProgramme;
      return $this;
   }

   /**
    * Get the value of idSession
    */ 
   public function getIdSession() {
      return $this->idSession;
   }

   /**
    * Set the value of idSession
    *
    * @return  self
    */ 
   public function setIdSession($idSession) {
      $this->idSession = $idSession;
      return $this;
   }

   /**
    * Get the value of animateurs
    */ 
   public function getAnimateurs() {
      return $this->animateurs;
   }

   /**
    * Set the value of animateurs
    *
    * @return  self
    */ 
   public function setAnimateurs($animateurs) {
      $this->animateurs = $animateurs;
      return $this;
   }

   /**
    * Get the value of prix
    */ 
   public function getPrix() {
      return $this->prix;
   }

   /**
    * Set the value of prix
    *
    * @return  self
    */ 
   public function setPrix($prix) {
      $this->prix = $prix;
      return $this;
   }

   public function addSemaine($numeroSemaine) {
      array_push($this->numeroSemaines, $numeroSemaine);
   }

   /**
    * Get the value of numeroSemaines
    */ 
   public function getNumeroSemaines() {
      return $this->numeroSemaines;
   }

   /**
    * Set the value of numeroSemaines
    *
    * @return  self
    */ 
   public function setNumeroSemaines($numeroSemaines) {
      $this->numeroSemaines = $numeroSemaines;
      return $this;
   }
}