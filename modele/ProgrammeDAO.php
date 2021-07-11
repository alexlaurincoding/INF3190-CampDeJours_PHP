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

        // SEMAINES
        for($i = 1; $i <= 15; $i++) {
            $reqsem = $bdd->prepare('INSERT INTO semaine(id, id_session, no_semaine) 
                                    VALUES (:id, :id_session, :no_semaine)');
            $reqsem->execute(array(
                'id'=> Util::guidv4(),
                'id_session'=> $session->getId(),
                'no_semaine'=> $i
            )); 
        }

        BaseDonnee::close();
    }

    public static function getGabaritsProgramme(){
        $bdd = BaseDonnee::getConnexion();
        $gabaritsProgramme = array();
        $reponse = $bdd->query('SELECT * FROM gabarit_programme');
        while($donnee = $reponse->fetch()){
            $gabaritProgramme = new GabaritProgrammeModel($donnee['id'], 
                                        $donnee['titre'], 
                                        $donnee['description']);
            array_push($gabaritsProgramme, $gabaritProgramme);
        }
        BaseDonnee::close();       

        return $gabaritsProgramme;
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

    public static function getBlocsActivite(){
        $bdd = BaseDonnee::getConnexion();
        $blocsActivite = array();
        $req = $bdd->query('SELECT * FROM bloc');
        while($donnee = $req->fetch()){
            $activitesDuBloc = self::getActivitesDuBloc($donnee['id_bloc']);
            $blocActivite = new BlocModel($donnee['id_bloc'], $donnee['nom'], $activitesDuBloc);
            array_push($blocsActivite, $blocActivite);
        }
        BaseDonnee::close();

        return $blocsActivite;      
    }

    public static function getActivitesDuBloc($idBlocActivite){
        $bdd = BaseDonnee::getConnexion();
        $activites = array();
        $req = $bdd->prepare('SELECT * FROM activite 
                            INNER JOIN activite_du_bloc
                            ON activite.id_activite = activite_du_bloc.id_activite
                            WHERE activite_du_bloc.id_bloc = :idBlocActivite');
        $req->execute(Array('idBlocActivite' => $idBlocActivite));
        while($donnee = $req->fetch()){
            $activite = new ActiviteModel($donnee['id_activite'], $donnee['nom'], $donnee['type_activite']);
            array_push($activites, $activite);
        }
        BaseDonnee::close();

        return $activites;         
    }

    public static function getActivite($id) {
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('SELECT * FROM activite WHERE id_activite = :id');
        $req->execute(array('id'=>$id));
        $donnee = $req->fetch();
        $activite = new ActiviteModel( $donnee['id_activite'], $donnee['nom'], $donnee['type_activite'] );

        BaseDonnee::close();
        return $activite;
    }

    public static function creerBlocActivite(BlocModel $blocActivite){
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('INSERT INTO activite_programme (id) VALUES (:id)');
        $req->execute(array('id'=> $blocActivite->getId()));
        
        $req = $bdd->prepare('INSERT INTO bloc (id_bloc, nom) VALUES (:id_bloc, :nom)');
        $req->execute(array(
        'id_bloc' => $blocActivite->getId(),
        'nom'=> $blocActivite->getNom()
    )); 
    $activites = $blocActivite->getActivites();
    $ordre = 0;
    foreach($activites as $activite){
        $req = $bdd->prepare('INSERT INTO activite_du_bloc (id_activite, id_bloc, ordre) values (:id_activite, :id_bloc, :ordre)');
        $req->execute(array(
            'id_activite'=>$activite->getId(),
            'id_bloc'=>$blocActivite->getId(),
            'ordre'=>++$ordre
        ));
    }

    BaseDonnee::close();

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