<?php
class HoraireProgrammeModel implements JsonSerializable {
   private $activiteProg;
   private $plageHoraire;
   private $duree;

   function __construct($activiteProg, $plageHoraire, $duree) {
      $this->activiteProg = $activiteProg;
      $this->plageHoraire = $plageHoraire;
      $this->duree = $duree;
   }

   public function jsonSerialize() {
      $vars = get_object_vars($this);
      return $vars;
   }

   public function getActiviteProg() {
      return $this->activiteProg;
   }

   public function setActiviteProg($activiteProg) {
      $this->idActiviteProg = $activiteProg;
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