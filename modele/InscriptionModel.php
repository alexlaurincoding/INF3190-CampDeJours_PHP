<?php

class InscriptionModel{
    private $idProgrammeSemaine;
    private $idEnfant;
    private $paye;

    public function __construct($idProgrammeSemaine, $idEnfant, $paye){
        $this->idProgrammeSemaine = $idProgrammeSemaine;
        $this->idEnfant = $idEnfant;
        $this->paye = $paye;
    }

    


    /**
     * Get the value of idProgrammeSemaine
     */ 
    public function getIdProgrammeSemaine()
    {
        return $this->idProgrammeSemaine;
    }

    /**
     * Set the value of idProgrammeSemaine
     *
     * @return  self
     */ 
    public function setIdProgrammeSemaine($idProgrammeSemaine)
    {
        $this->idProgrammeSemaine = $idProgrammeSemaine;

        return $this;
    }

    /**
     * Get the value of idEnfant
     */ 
    public function getIdEnfant()
    {
        return $this->idEnfant;
    }

    /**
     * Set the value of idEnfant
     *
     * @return  self
     */ 
    public function setIdEnfant($idEnfant)
    {
        $this->idEnfant = $idEnfant;

        return $this;
    }

    /**
     * Get the value of paye
     */ 
    public function getPaye()
    {
        return $this->paye;
    }

    /**
     * Set the value of paye
     *
     * @return  self
     */ 
    public function setPaye($paye)
    {
        $this->paye = $paye;

        return $this;
    }
}
