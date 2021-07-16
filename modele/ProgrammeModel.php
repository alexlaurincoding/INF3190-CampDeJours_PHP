<?php
class ProgrammeModel implements JsonSerializable {
   private $id;
   private $gabaritProgramme;
   private $session;
   private $animateurs;
   private $prix;
   private $semaines = array();
   private $horaireProgramme = array();

   function __construct($id, $gabaritProgramme, $session, $animateurs, $semaines, $horaireProgramme, $prix) {
      $this->id = $id;
      $this->gabaritProgramme = $gabaritProgramme;
      $this->session = $session;
      $this->animateurs = $animateurs;
      $this->semaines = $semaines;
      $this->horaireProgramme = $horaireProgramme;
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

   public function getGabaritProgramme() {
      return $this->gabaritProgramme;
   }

   public function setGabaritProgramme($gabaritProgramme) {
      $this->gabaritProgramme = $gabaritProgramme;
      return $this;
   }

   public function getSession() {
      return $this->session;
   }

   public function setSession($session) {
      $this->session = $session;
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

   public function addSemaine($semaine) {
      array_push($this->semaines, $semaine);
   }

   public function getSemaines() {
      return $this->semaines;
   }

   public function setSemaines($semaines) {
      $this->semaines = $semaines;
      return $this;
   }

   // HORAIRE

   public function addActivite(HoraireProgrammeModel $horaireProg) {
      array_push($this->horaireProgramme, $horaireProg);
   }

   public function getHoraireProgramme() {
      return $this->horaireProgramme;
   }

   public function setHoraireProgramme($horaireProgramme) {
      $this->horaireProgramme = $horaireProgramme;
      return $this;
   }
}