<?php
class ProgrammeDAO {

    // SESSION

    public static function creerSession(SessionModel $session){
        $bdd = BaseDonnee::getConnexion();

        //sauvegarde parent dans la BD            
        $req = $bdd->prepare('INSERT INTO session(id, nom, description, date_debut, date_fin) 
                                VALUES (:id, :nom, :description, :date_debut, :date_fin)');
        $req->execute(array(
            'id'=> $session->getId(),
            'nom'=> $session->getNom(),
            'description'=> $session->getDescription(),
            'date_debut'=> $session->getDateDebut(),
            'date_fin'=> $session->getDateFin(),
        )); 

        BaseDonnee::close();
    }

    public static function getSessions() {
        $bdd = BaseDonnee::getConnexion();
        $sessions = array();
        $req = $bdd->query('SELECT * FROM session');
        while($donnee = $req->fetch()){
            $session = new SessionModel($donnee['id'], 
                                        $donnee['nom'], 
                                        $donnee['description'], 
                                        $donnee['date_debut'], 
                                        $donnee['date_fin']);
            array_push($sessions, $session);
        }
        BaseDonnee::close();       

        return $sessions;
    }

    // ACTIVITE

    public static function creerActivite(ActiviteModel $activite) {
        $bdd = BaseDonnee::getConnexion();
        
        $req = $bdd->prepare('INSERT INTO activite_programme(id) 
                                   VALUES (:id);
                              INSERT INTO activite(id_activite, nom, type_activite) 
                                   VALUES (:id, :nom, :id_type_activite)');
        $req->execute(array(
            'id'=> $activite->getId(),
            'nom'=> $activite->getNom(),
            'id_type_activite'=> $activite->getIdType(),
        )); 

        BaseDonnee::close();
    }

    public static function getActivitesParType($idType) {
        $bdd = BaseDonnee::getConnexion();
        $activites = array();
        $req = $bdd->prepare('SELECT * 
                                FROM activite
                               WHERE type_activite = :id_type_activite');

        $req->execute(array(
            'id_type_activite' => $idType
        ));

        while($donnee = $req->fetch()){
            $activite = new ActiviteModel($donnee['id_activite'], 
                                          $donnee['nom'], 
                                          $donnee['type_activite']);
            array_push($activites, $activite);
        }
        BaseDonnee::close();

        return $activites;
    }

    public static function getActivites() {
        $bdd = BaseDonnee::getConnexion();
        $activites = array();
        $req = $bdd->query('SELECT * FROM activite');
        while($donnee = $req->fetch()){
            $activite = new ActiviteModel($donnee['id_activite'], 
                                          $donnee['nom'], 
                                          $donnee['type_activite']);
            array_push($activites, $activite);
        }
        BaseDonnee::close();

        return $activites;
    }

    public static function getActivite($id) {
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->query('SELECT * FROM activite WHERE id_activite = :id');
        $donnee = $req->fetch();
        $activite = new ActiviteModel( $donnee['id_activite'], $donnee['nom'], $donnee['type_activite'] );

        BaseDonnee::close();
        return $activite;
    }

    // BLOC

    // public static function creerBloc(BlocModel $bloc){
    //     $bdd = BaseDonnee::getConnexion();

    //     //sauvegarde parent dans la BD            
    //     $req = $bdd->prepare('INSERT INTO bloc(id, nom, description, date_debut, date_fin) 
    //                             VALUES (:id, :nom, :description, :date_debut, :date_fin)');
    //     $req->execute(array(
    //         'id'=> $session->getId(),
    //         'nom'=> $session->getNom(),
    //         'description'=> $session->getDescription(),
    //         'date_debut'=> $session->getDateDebut(),
    //         'date_fin'=> $session->getDateFin(),
    //     )); 

    //     BaseDonnee::close();
    // }

    // public static function getBlocs(){
    //     $bdd = BaseDonnee::getConnexion();
    //     $blocs = array();
    //     //sauvegarde parent dans la BD            
    //     $res = $bdd->query('SELECT * FROM bloc');
    //     while($donnee = $res->fetch()){
    //         $session = new SessionModel($donnee['id'], 
    //                                     $donnee['nom'], 
    //                                     $donnee['description'], 
    //                                     $donnee['date_debut'], 
    //                                     $donnee['date_fin']);
    //         array_push($sessions, $session);
    //     }
    //     BaseDonnee::close();       

    //     return $blocs;
    // }


    // TYPE ACTIVITE

    public static function creerTypeActivite(TypeActiviteModel $type) {
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('INSERT INTO 
                        TYPE_ACTIVITE (id, nom, description)
                            VALUES (:id, :nom, :description)');
        $req->execute(array(
            'id' => $type->getId(),
            'nom' => $type->getNom(),
            'description' => $type->getDescription(),
        ));

        $bdd = BaseDonnee::close();
    }

    public static function getTypesActivite(){
        $bdd = BaseDonnee::getConnexion();

        $typesActivite = array();
        $res = $bdd->query('SELECT * FROM type_activite');
        while($donnee = $res->fetch()){
            $type = new TypeActiviteModel($donnee['id'], 
                                    $donnee['nom'], 
                                    $donnee['description'] 
                                );
            array_push($typesActivite, $type);
        }

        BaseDonnee::close();       

        return $typesActivite;
    }

}