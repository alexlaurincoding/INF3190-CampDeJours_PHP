<?php
class ProgrammeModel{
    public $sessions;
    public $typesActivite;

        function __construct($sessions, $typesActivite) {
        $this->sessions = $sessions;
        $this->typesActivite = $typesActivite;
        }

    /**
     * Get the value of sessions 
     */ 
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Set the value of sessions 
     *
     * @return  self
     */ 
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;

        return $this;
    }

    /**
     * Get the value of typesActivite 
     */ 
    public function getTypesActivite()
    {
        return $this->typesActivite;
    }

    /**
     * Set the value of typesActivite 
     *
     * @return  self
     */ 
    public function setTypesActivite($typesActivite)
    {
        $this->typesActivite = $typesActivite;

        return $this;
    }
}