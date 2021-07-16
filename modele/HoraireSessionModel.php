<?php
class HoraireSessionModel{
    private $idSession;
    private SemaineProgrammesModel $semaines;

    //getIdSemaines 

    function __construct(){
        $idSessions = DAO::getIdSessions();
        foreach ($idSessions as $idSess) {
            $idSemaines = DAO:getIdSemaines($idSess);
            foreach ($idSemaines as $idSem) {
                $this->semaines.push(new SemaineProgrammesModel($idSem));
            }
        }
    }

    public function getSemaines(){
        return $this->semaines;
    }
}