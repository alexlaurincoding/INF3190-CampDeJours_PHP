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

    
    
}