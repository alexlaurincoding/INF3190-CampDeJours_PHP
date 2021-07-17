<?php
class EnfantInscriptionModel{
    
    private $idEnfant;
    private $nomEnfant;
    private $prenomEnfant;
    private $programmeInscrit;
    private $estPaye;
    private $programmes;
    private $nomProgramme;

    public function __construct($idEnfant, $nomEnfant, $prenomEnfant, $programmeInscrit, $estPaye, $programmes){
        $this->idEnfant = $idEnfant;
        $this->nomEnfant = $nomEnfant;
        $this->prenomEnfant = $prenomEnfant;
        $this->programmeInscrit = $programmeInscrit;
        $this->estPaye = $estPaye;
        $this->programmes = $programmes;
    }

    public function getIdEnfant(){
        return $this->idEnfant;
    }
    public function getNomEnfant(){
        return $this->nomEnfant;
    }

    public function getPrenomEnfant(){
        return $this->prenomEnfant;
    }

    public function getProgrammeInscrit(){
        return $this->programmeInscrit;
    }

    public function getEstPaye(){
        return $this->estPaye;
    }

    public function getNomProgramme(){
        return $this->nomProgramme;
    }


    public function getProgrammes(){
        return $this->programmes;
    }

    public function setNomProgramme($nomProgramme){
        $this->nomProgramme = $nomProgramme;
    }
}