<?php
class SemaineProgrammesModel{
    private $idSemaine;
    private programmeInscriptionModel $programmes;

    function __construct($idSemaine){
        $idProgrammes = DAO::getIdProgrammesParSemaine($idSemaine);
        foreach ($idProgrammes as $idProg) {
            $programmes.push(new programmeInscriptionModel($idProg));
        }
    }

    public function getIdSemaine(){
        return $this->idSemaine;
    }

    public function getProgrammes(){
        return $this->programmes;
    }
}