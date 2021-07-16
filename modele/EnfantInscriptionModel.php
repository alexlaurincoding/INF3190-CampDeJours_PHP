<?php
class EnfantInscriptionModel
{
  private $idEnfant;
  private $nom;
  private $prenom;
  private $inscrit;
  private $paye;

  function __construct($enfant, $idProgramme)
  {
    $this->idEnfant = $enfant['id'];
    $this->nom = $enfant['nom'];
    $this->prenom = $enfant['prenom'];

    $inscription = 'SELECT programme.id, 
                           inscription.paye
                      FROM enfant
                INNER JOIN inscription
                        ON inscription.id_enfant = enfant.id
                INNER JOIN programme_semaine 
                        ON programme_semaine.id = inscription.id_programme_semaine
                     WHERE enfant.id = "'.$this->idEnfant.'"
                       AND programme.id = "'.$idProgramme.'";';
                  
    if (!is_null($inscription)) {
        $this->inscrit = $inscription['id'];
        $this->paye = $inscription['paye'];
    } else {
        $this->inscrit = null;
        $this->paye = null;
    }
  }
}