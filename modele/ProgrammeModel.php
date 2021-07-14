<?php
class ProgrammeModel implements JsonSerializable {
   private $id;
   private $idGabaritProgramme;
   private $idSession;
   private $animateurs;
   private $prix;
   private $numeroSemaines = array();
   private $horraireProgramme = array();

   function __construct($id, $idGabaritProgramme, $idSession, $animateur, $numeroSemaines, $horraireProgramme, $prix) {
      $this->id = $id;
      $this->idGabaritProgramme = $idGabaritProgramme;
      $this->idSession = $idSession;
      $this->animateur = $animateur;
      $this->numeroSemaine = $numeroSemaines;
      $this->horraireProgramme = $horraireProgramme;
      $this->prix = $prix;
   }

   public function jsonSerialize() {
      $vars = get_object_vars($this);
      return $vars;
   }

   public function sauvegarder() {
      // ProgrammeDAO::creerProgramme($this);
   }

   public function getId() {
      return $this->id;
   }

   public function setId($id) {
      $this->id = $id;
      return $this;
   }

   public function getIdGabaritProgramme() {
      return $this->idGabaritProgramme;
   }

   public function setIdGabaritProgramme($idGabaritProgramme) {
      $this->idGabaritProgramme = $idGabaritProgramme;
      return $this;
   }

   public function getIdSession() {
      return $this->idSession;
   }

   public function setIdSession($idSession) {
      $this->idSession = $idSession;
      return $this;
   }

   public function getAnimateurs() {
      return $this->animateurs;
   }

   public function setAnimateurs($animateurs) {
      $this->animateurs = $animateurs;
      return $this;
   }

   public function getPrix() {
      return $this->prix;
   }

   public function setPrix($prix) {
      $this->prix = $prix;
      return $this;
   }

   // SEMAINE

   public function addSemaine($numeroSemaine) {
      array_push($this->numeroSemaines, $numeroSemaine);
   }

   public function getNumeroSemaines() {
      return $this->numeroSemaines;
   }

   public function setNumeroSemaines($numeroSemaines) {
      $this->numeroSemaines = $numeroSemaines;
      return $this;
   }

   // HORAIRE

   public function addActivite(HoraireProgrammeModel $horraireProg) {
      array_push($this->horraireProgramme, $horraireProg);
   }

   public function getHorraireProgramme() {
      return $this->horraireProgramme;
   }

   public function setHorraireProgramme($horraireProgramme) {
      $this->horraireProgramme = $horraireProgramme;
      return $this;
   }
}