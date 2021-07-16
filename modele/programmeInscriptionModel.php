<?php
class programmeInscriptionModel{
    
    private $titreGabaritProgramme;
    private $idProgramme;

   function __construct($titreGabaritProgramme, $idProgramme) {
      $this->titreGabaritProgramme = $titreGabaritProgramme;
      $this->idProgramme = $idProgramme;
   }

   public function getTitreGabaritProgramme() {
      return $this->titreGabaritProgramme;
   }

   public function getIdProgramme() {
      return $this->idProgramme;
   }

}
