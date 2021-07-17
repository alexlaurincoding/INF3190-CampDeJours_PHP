<?php
class EnfantInscriptionModel{
    
    private $idEnfant;
    private $nomEnfant;
    private $prenomEnfant;
    private $estInscrit;
    private $estPaye;
    private $programmes;
    private $nomProgramme;

    public function __construct($idEnfant, $nomEnfant, $prenomEnfant, $estInscrit, $estPaye, $programmes){
        $this->idEnfant = $idEnfant;
        $this->nomEnfant = $nomEnfant;
        $this->prenomEnfant = $prenomEnfant;
        $this->estInscrit = $estInscrit;
        $this->estPaye = $estPaye;
    }

    public function getNomEnfant(){
        return $this->nomEnfant;
    }

    public function getPrenomEnfant(){
        return $this->prenomEnfant;
    }

    public function getEstInscrit(){
        return $this->estInscrit;
    }

    public function getEstPaye(){
        return $this->estPaye;
    }

    public function getNomProgramme(){
        return $this->nomProgramme;
    }

    public function getIdEnfant(){
        return $this->idEnfant;
    }

    public function getProgrammes(){
        return $this->programmes;
    }

    public function setNomProgramme($nomProgramme){
        $this->nomProgramme = $nomProgramme;
    }
}