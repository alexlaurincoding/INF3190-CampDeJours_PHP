<?php
class programmeInscriptionModel
{

  private $idProgramme;
  private $titreGabarit;
  private $prix;
  private $idUtilisateur;
  private $idSemaine;
  private $inscriptions = array(); //enfantInscriptionModel

  function __construct($idProgramme, $titreGabarit, $prix, $idUtilisateur, $idSemaine)
  {
    $this->idProgramme = $idProgramme;
    $this->titreGabarit = $titreGabarit;
    $this->prix = $prix;
    $this->idUtilisateur = $idUtilisateur;
    $this->idSemaine = $idSemaine;

    $enfantsInfo = 'SELECT enfant.id, 
                           enfant.nom, 
                           enfant.prenom,
                      FROM enfant
                INNER JOIN parent
                        ON parent.id = enfant.id_parent
                INNER JOIN utilisateur
                        ON utilisateur.id = parent.id
                     WHERE utilisateur.id = "' . $idUtilisateur . '";';
    $enfantsInfo = array();
    //id de HOMER = "1be9edcd-aaae-4494-aa68-90406d7461b5"

    foreach ($enfantsInfo as $enfant) {
      array_push(
        $this->inscriptions,
          new EnfantInscriptionModel($enfant, $idProgramme)
      );
    }
  }

  public function getTitreGabaritProgramme()
  {
    return $this->titreGabaritProgramme;
  }

  public function getIdProgramme()
  {
    return $this->idProgramme;
  }
}
