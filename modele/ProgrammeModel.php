<?php
class ProgrammeModel{
    public $sessions;
    public $typesActivite;
    public $activites;
    public $programmes;

        function __construct() {
            $this->sessions = ProgrammeDAO::getSessions();
            $this->typesActivite = ProgrammeDAO::getTypesActivite();
            $this->activites = ProgrammeDAO::getActivites();
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
    public function getProgrammes()
    {
        echo "Tous les programmes";
    }
}