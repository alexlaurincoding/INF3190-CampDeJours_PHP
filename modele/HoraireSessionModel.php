<?php
class HoraireSessionModel
{

    private $idSession;
    private $idUtilisateur;
    private $semaines = array();

    //getIdSemaines 

    function __construct($idSession, $idUtilisateur)
    {
        $this->idSession = $idSession;
        $this->idUtilisateur = $idUtilisateur;

        $semainesInfo = 'SELECT semaine.id, 
                                semaine.no_semaine
                           FROM semaine
                     INNER JOIN session 
                             ON session.id = semaine.id_session
                          WHERE session.id = "'.$idSession.'";';
        $semainesInfo = array();

        foreach ($semainesInfo as $semaine) {
            array_push($this->semaines, 
              new SemaineProgrammesModel($semaine['id'], $semaine['no_semaine'], $this->idUtilisateur));
        }
    }

    public function getIdSession()
    {
        return $this->idSession;
    }

    public function getSemaines()
    {
        return $this->semaines;
    }
}
