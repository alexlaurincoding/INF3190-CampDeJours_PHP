<?php
class SemaineProgrammesModel{
    private SemaineModel $semaine;
    private  $enfantsInscriptions; //array

    function __construct($semaine, $enfantsInscriptions){
        $this->semaine = $semaine;
        $this->enfantsInscriptions = $enfantsInscriptions;
    }

    public function getSemaine(){
        return $this->semaine;
    }

    public function getEnfantsInscriptions(){
        return $this->enfantsInscriptions;
    }
}