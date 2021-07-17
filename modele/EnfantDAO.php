<?php
class EnfantDAO
{

  public static function isIdEnfantExistant($id)
  {
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT id FROM enfant WHERE id = :id');
    $req->execute(array('id' => $id));
    $donnee = $req->fetch();
    BaseDonnee::close();
    if ($donnee) {
      return true;
    }
    return false;
  }


  /**
   * Retourne un Enfant
   * 
   */
  public static function getEnfantParId($id)
  {
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT * FROM enfant WHERE id = :id');

    $req->execute(array('id' => $id));
    $donnee = $req->fetch();

    $id = $donnee['id'];
    $nom = $donnee['nom'];
    $prenom = $donnee['prenom'];
    $dateDeNaissance = $donnee['date_de_naissance'];
    $photoProfil = $donnee['url_photo'];
    $notes = $donnee['notes'];
    $parent = null;

    $enfant = new EnfantModel($id, $nom, $prenom, $dateDeNaissance, $photoProfil, $notes, $parent);

    BaseDonnee::close();

    return $enfant;
  }

  /**
   * Retourne une collection d'Enfant pour un Parent
   * 
   */
  public static function getEnfants($parent)
  {
    $enfants = array();
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT * FROM enfant WHERE id_parent = :id_parent');

    $req->execute(array('id_parent' => $parent->getId()));
    while ($donnee = $req->fetch()) {
      $enfant = new EnfantModel(
        $donnee['id'],
        $donnee['nom'],
        $donnee['prenom'],
        $donnee['date_naissance'],
        $donnee['url_photo'],
        $donnee['notes'],
        $parent
      );
      array_push($enfants, $enfant);
    }

    BaseDonnee::close();

    return $enfants;
  }

  public static function modifierEnfant($enfant)
  {
    $bdd = BaseDonnee::getConnexion();

    $req = $bdd->prepare('UPDATE enfant 
                              SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, notes = :notes
                              WHERE id = :id');
    $req->execute(array(
      'nom' => $enfant->getNom(),
      'prenom' => $enfant->getPrenom(),
      'date_naissance' => $enfant->getDateDeNaissance(),
      'notes' => $enfant->getNotes(),
      'id' => $enfant->getId()
    ));

    BaseDonnee::close();
  }

  /**
   * Enregistrer un enfant dans la base de données
   * 
   * param $enfant instance d'EnfantModel
   * 
   */
  public static function sauvegarderEnfant($enfant)
  {
    $bdd = BaseDonnee::getConnexion();

    //sauvegarde parent dans la BD            
    $req = $bdd->prepare('INSERT INTO enfant(id, nom, prenom, date_naissance, url_photo, id_parent)
                                    VALUES (:id, :nom, :prenom, :date_naissance, :url_photo, :id_parent)');
    $req->execute(array(
      'id' => $enfant->getId(),
      'nom' => $enfant->getNom(),
      'prenom' => $enfant->getPrenom(),
      'date_naissance' => $enfant->getDateDeNaissance(),
      'url_photo' => $enfant->getPhotoProfil(),
      'id_parent' => $enfant->getParent()->getId()
    ));
    BaseDonnee::close();
  }

  public static function changerPhotoProfil($id, $photoProfil)
  {
    $bdd = BaseDonnee::getConnexion();

    $req = $bdd->prepare('UPDATE enfant SET url_photo = :url_photo WHERE id = :id');
    $req->execute(array(
      'url_photo' => $photoProfil,
      'id' => $id
    ));

    BaseDonnee::close();
  }

  public static function getProgrammeInscrit($idEnfant, $idSemaine)
  {
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT programme_semaine.id_programme FROM `inscription` 
                            INNER JOIN programme_semaine ON inscription.id_programme_semaine = programme_semaine.id
                            INNER JOIN semaine ON semaine.id = programme_semaine.id_semaine
                            INNER JOIN enfant ON enfant.id = inscription.id_enfant
                            WHERE semaine.id = :idSemaine AND enfant.id = :idEnfant');

    $req->execute(array(
      'idSemaine' => $idSemaine,
      'idEnfant' => $idEnfant
    ));
    $donnee = $req->fetch();
    BaseDonnee::close();
    if ($donnee) {
      $inscription = $donnee['id_programme'];
    } else {
      $inscription = null;
    }
    return $inscription;
  }

  public static function getEstPaye($idEnfant, $idSemaine)
  {
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT paye FROM `inscription` 
                            INNER JOIN programme_semaine ON inscription.id_programme_semaine = programme_semaine.id
                            INNER JOIN semaine ON semaine.id = programme_semaine.id_semaine
                            INNER JOIN enfant ON enfant.id = inscription.id_enfant
                            WHERE semaine.id = :idSemaine AND enfant.id = :idEnfant');

    $req->execute(array(
      'idSemaine' => $idSemaine,
      'idEnfant' => $idEnfant
    ));
    $donnee = $req->fetch();

    BaseDonnee::close();

    if (isset($donnee['paye'])) {
      if ($donnee['paye'] == 1) {
        return true;
      }
    } 
    return false;
  }

  public static function getNomProgramme($idEnfant, $idSemaine)
  {
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT titre FROM gabarit_programme
                            INNER JOIN programme ON programme.id_gabarit_programme = gabarit_programme.id
                            INNER JOIN programme_semaine ON programme_semaine.id_programme = programme.id
                            INNER JOIN semaine ON semaine.id = programme_semaine.id_semaine
                            INNER JOIN inscription ON inscription.id_programme_semaine = programme_semaine.id
                            INNER JOIN enfant ON enfant.id = inscription.id_enfant
                            WHERE enfant.id = :idEnfant AND semaine.id = :idSemaine');

    $req->execute(array(
      'idSemaine' => $idSemaine,
      'idEnfant' => $idEnfant
    ));
    $donnee = $req->fetch();
    BaseDonnee::close();
    return $donnee['titre'];
  }

  public static function inscrireEnfant($idEnfant, $idProgramme, $idSemaine){
    $idProgrammeSemaine = self::getIdProgrammeSemaine($idProgramme, $idSemaine);
    $bdd = BaseDonnee::getConnexion();
          
    $req = $bdd->prepare('INSERT INTO inscription(id_programme_semaine, id_enfant, paye) VALUES (:idProgrammeSemaine, :idEnfant, 0)');
    $req->execute(array(
      'idProgrammeSemaine' => $idProgrammeSemaine,
      'idEnfant' => $idEnfant,
    ));
    BaseDonnee::close();   
  }

  public static function getIdProgrammeSemaine($idProgramme, $idSemaine){
    $bdd = BaseDonnee::getConnexion();
    $req = $bdd->prepare('SELECT id FROM programme_semaine WHERE id_programme = :idProgramme AND id_semaine = :idSemaine');
    $req->execute(array('idProgramme' => $idProgramme,
                        'idSemaine' => $idSemaine));
    $donnee = $req->fetch();
    BaseDonnee::close();
    return $donnee['id'];
  }

}
