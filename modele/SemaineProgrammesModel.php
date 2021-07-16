<?php
class SemaineProgrammesModel{
    private $idSemaine;
    private programmeInscriptionModel $programmes;

    function __construct($idSemaine, $programmes){
        $this->idSemaine = $idSemaine;
        $this->programmes = $programmes;
    }

    public function getIdSemaine(){
        return $this->idSemaine;
    }

    public function getProgrammes(){
        return $this->programmes;
    }
}