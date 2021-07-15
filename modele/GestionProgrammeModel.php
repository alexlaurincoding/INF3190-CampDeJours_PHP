<?php
class GestionProgrammeModel implements JsonSerializable{
    public $sessions;
    public $typesActivite;
    public $activites;
    public $programmes;
    public $gabaritsProgramme;
    public $blocsActivite;

    function __construct() {
        $this->sessions = GestionProgrammeDAO::getSessions();
        $this->typesActivite = GestionProgrammeDAO::getTypesActivite();
        $this->activites = GestionProgrammeDAO::getActivites();
        $this->gabaritsProgramme = GestionProgrammeDAO::getGabaritsProgramme();
        $this->blocsActivite = GestionProgrammeDAO::getBlocsActivite();
        $this->programmes = GestionProgrammeDAO::getProgrammes();
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
    
    /**
     * Get the value of sessions 
     */ 
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Get the value of typesActivite 
     */ 
    public function getTypesActivite()
    {
        return $this->typesActivite;
    }

    /**
     * Get the value of sessions 
     */ 
    public function getActivites()
    {
        return $this->activites;
    }

    /**
     * Get the value of sessions 
     */ 
    public function getBlocsActivite()
    {
        return $this->blocsActivite;
    }

    /**
     * Get the value of sessions 
     */ 
    public function getProgrammes()
    {
        return $this->programmes;
    }

}