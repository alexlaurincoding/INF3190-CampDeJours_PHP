<?php
class InscriptionsJSONModel{
    public $Enfant;
    public $Parent;
    public $Session;
    public $Programme;
    public $Semaine;
    public $Payé;

    public function __construct($Enfant, $Parent, $Session, $Programme, $Semaine, $Payé)
    {
        $this->Enfant = $Enfant;
        $this->Parent = $Parent;
        $this->Session = $Session;
        $this->Programme = $Programme;
        $this->Semaine = $Semaine;
        $this->Payé = $Payé;
    }
   
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
   
    /**
     * Getter et setters
     */ 
    public function getEnfant()
    {
        return $this->Enfant;
    }

    public function setEnfant($Enfant)
    {
        $this->Enfant = $Enfant;

        return $this;
    }

    public function getSession()
    {
        return $this->Session;
    }

    public function setSession($Session)
    {
        $this->Session = $Session;

        return $this;
    }

    public function getParent()
    {
        return $this->Parent;
    }

    public function setParent($Parent)
    {
        $this->Parent = $Parent;

        return $this;
    }

    public function getProgramme()
    {
        return $this->Programme;
    }

    public function setProgramme($Programme)
    {
        $this->Programme = $Programme;

        return $this;
    }

    public function getSemaine()
    {
        return $this->Semaine;
    }

    public function setSemaine($Semaine)
    {
        $this->Semaine = $Semaine;

        return $this;
    }

    public function getPayé()
    {
        return $this->Payé;
    }

    public function setPayé($Payé)
    {
        $this->Payé = $Payé;

        return $this;
    }
}