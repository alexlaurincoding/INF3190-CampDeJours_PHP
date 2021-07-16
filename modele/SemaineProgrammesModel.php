<?php
class SemaineProgrammesModel{
    private $idSemaine;
    private $noSemaine;
    private $idUtilisateur;
    private $programmes = array();

    function __construct($idSemaine, $noSemaine, $idUtilisateur){
        $this->idSemaine = $idSemaine;
        $this->noSemaine = $noSemaine;
        $this->idUtilisateur = $idUtilisateur;
        // $idProgrammes = DAO::getProgrammesParSemaine($idSemaine);
        $programmesInfo = ' SELECT programme.id,
                              		 gabarit_programme.titre,
                                   programme.prix
                              FROM programme
                        INNER JOIN gabarit_programme
                                ON gabarit_programme.id = programme.id_gabarit_programme
                        INNER JOIN programme_semaine
                                ON programme_semaine.id_programme = programme.id
                             WHERE programme_semaine = "'.$idSemaine.'";';
        $programmesInfo = array();
    
        foreach ($programmesInfo as $programme) {
            array_push($this->programmes, 
              new programmeInscriptionModel($programme['id'], $programme['titre'], $programme['prix'], $this->idUtilisateur, $idSemaine));
        }
    }

    public function getIdSemaine(){
        return $this->idSemaine;
    }

    public function getNoSemaine(){
        return $this->noSemaine;
    }

    public function getProgrammes(){
        return $this->programmes;
    }
}