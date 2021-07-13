<?php

class SemaineModel{
    private $id;
    private $idSession;
    private $noSemaine;

    function __construct($id, $idSession, $noSemaine)
    {
        $this->id = $id;
        $this->idSession = $idSession;
        $this->noSemaine = $noSemaine;
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
     * Get the value of idSession
     */ 
    public function getIdSession()
    {
        return $this->idSession;
    }

    /**
     * Set the value of idSession
     *
     * @return  self
     */ 
    public function setIdSession($idSession)
    {
        $this->idSession = $idSession;

        return $this;
    }

    /**
     * Get the value of noSemaine
     */ 
    public function getNoSemaine()
    {
        return $this->noSemaine;
    }

    /**
     * Set the value of noSemaine
     *
     * @return  self
     */ 
    public function setNoSemaine($noSemaine)
    {
        $this->noSemaine = $noSemaine;

        return $this;
    }
}