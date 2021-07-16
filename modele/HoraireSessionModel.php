<?php
class HoraireSessionModel{
    private SemaineProgrammesModel $semaines;

    function __construct($semaines){
        $this->semaines = $semaines;
    }

    public function getSemaines(){
        return $this->semaines;
    }
}