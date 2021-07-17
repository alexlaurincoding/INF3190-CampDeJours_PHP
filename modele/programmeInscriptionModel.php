<?php
class programmeInscriptionModel{
    
    private $titreGabaritProgramme;
    private $idProgramme;
    private $prix;

   function __construct($titreGabaritProgramme, $idProgramme, $prix) {
      $this->titreGabaritProgramme = $titreGabaritProgramme;
      $this->idProgramme = $idProgramme;
      $this->prix = $prix;
   }

   public function getTitreGabaritProgramme() {
      return $this->titreGabaritProgramme;
   }

   public function getIdProgramme() {
      return $this->idProgramme;
   }

   public function getPrix() {
      return $this->prix;
   }

}