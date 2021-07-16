<?php
class programmeInscriptionModel{
    
    private $titreGabaritProgramme;
    private $idProgramme;
    private enfantInscriptionModel $enfantsInscrits;

   function __construct($idProgramme) {
      $idEnfants = DAO::getEnfantsByProgrammeId($idProgramme) 

      foreach($idEnfants as $idEnfant) {
         $enfantsInscrits.push(new EnfantInscriptionModel($idEnfant));
      }
   }

   public function getTitreGabaritProgramme() {
      return $this->titreGabaritProgramme;
   }

   public function getIdProgramme() {
      return $this->idProgramme;
   }

}
