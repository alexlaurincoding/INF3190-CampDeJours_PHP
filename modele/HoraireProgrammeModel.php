<?php
class HoraireProgrammeModel implements JsonSerializable {
   private $idProgramme;
   private $idActiviteProg;
   private $plageHoraire;
   private $duree;

   function __construct($idProgramme, $idActiviteProg, $plageHoraire, $duree) {
      $this->idProgramme = $idProgramme;
      $this->idActiviteProg = $idActiviteProg;
      $this->plageHoraire = $plageHoraire;
      $this->duree = $duree;
   }

   public function jsonSerialize() {
      $vars = get_object_vars($this);
      return $vars;
   }

   public function getIdProgramme() {
      return $this->idProgramme;
   }

   public function setIdProgramme($idProgramme) {
      $this->idProgramme = $idProgramme;
      return $this;
   }

   public function getIdActiviteProg() {
      return $this->idActiviteProg;
   }

   public function setIdActiviteProg($idActiviteProg) {
      $this->idActiviteProg = $idActiviteProg;
      return $this;
   }

   public function getPlageHoraire() {
      return $this->plageHoraire;
   }

   public function setPlageHoraire($plageHoraire) {
      $this->plageHoraire = $plageHoraire;

      return $this;
   }

   public function getDuree() {
      return $this->duree;
   }

   public function setDuree($duree) {
      $this->duree = $duree;
      return $this;
   }
}