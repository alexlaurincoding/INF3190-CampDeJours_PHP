<?php

class ProgrammeSemaineModel{
    private $id;
    private $idProgramme;
    private $idSemaine;

    public function __construct($id, $idProgramme, $idSemaine){
        $this->$id = $id;
        $this->$idProgramme = $idProgramme;
        $this->$idSemaine = $idSemaine;

    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idProgramme
     */ 
    public function getIdProgramme()
    {
        return $this->idProgramme;
    }

    /**
     * Set the value of idProgramme
     *
     * @return  self
     */ 
    public function setIdProgramme($idProgramme)
    {
        $this->idProgramme = $idProgramme;

        return $this;
    }

    /**
     * Get the value of idSemaine
     */ 
    public function getIdSemaine()
    {
        return $this->idSemaine;
    }

    /**
     * Set the value of idSemaine
     *
     * @return  self
     */ 
    public function setIdSemaine($idSemaine)
    {
        $this->idSemaine = $idSemaine;

        return $this;
    }
}

