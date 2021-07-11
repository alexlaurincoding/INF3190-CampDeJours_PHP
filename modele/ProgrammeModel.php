<?php
class ProgrammeModel implements JsonSerializable{
    public $sessions;
    public $typesActivite;
    public $activites;
    public $programmes;
    public $gabaritsProgramme;

    function __construct() {
        $this->sessions = ProgrammeDAO::getSessions();
        $this->typesActivite = ProgrammeDAO::getTypesActivite();
        $this->activites = ProgrammeDAO::getActivites();
        $this->gabaritsProgramme = ProgrammeDAO::getGabaritsProgramme();
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

}