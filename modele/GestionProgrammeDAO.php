<?php
class GestionProgrammeDAO {

    #region Session

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

    #endregion Session

    #region Gabarit Programme

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

    #endregion Gabarit Programme

    #region Programme

   /* public static function creerProgramme(ProgrammeModel $programme) {
        $bdd = BaseDonnee::getConnexion();

        //Programme
        $req = $bdd->prepare('INSERT INTO programme(id, id_gabarit_programme, id_session, animateur, prix)
                                VALUES (:id, :id_gabarit_programme, :id_session, :animateur, :prix)');
        $req->execute(array(
            'id'=> $programme->getId(),
            'id_gabarit_programme'=> $programme->getIdGabaritProgramme(),
            'id_session'=> $programme->getIdSession(),
            'animateur'=> $programme->getAnimateurs(),
            'prix'=> $programme->getPrix(),
        ));

        //ProgrammeSemaine
        $req = $bdd->prepare('INSERT INTO programme_semaine(id, id_programme, id_semaine)
        VALUES (:id, :id_programme, :id_semaine)');
        foreach ($programme->getNumeroSemaines() as $numeroSemaine) { 
            $req->execute(array(
                'id'=> Util::guidv4(),
                'id_programme'=> $programme->getId(),
                'id_semaine'=> GestionProgrammeDAO::getIdSemaine($programme->getIdSession(), $numeroSemaine),
            ));
        }

        //Horaire
        $req = $bdd->prepare('INSERT INTO horaire_programme(id_programme, id_activite_programme, plage_horaire, duree)
                                VALUES (:id_programme, :id_activite_programme, :plage_horaire, :duree)');
        foreach ($programme->getHorraireProgramme() as $horraireProgramme) { 
            $req->execute(array(
                'id_programme'=> $programme->getId(),
                'id_activite_programme'=> $horraireProgramme->getIdActiviteProg(),
                'plage_horaire'=> $horraireProgramme->getPlageHoraire(),
                'duree'=> $horraireProgramme->getDuree(),
            ));
        }

        BaseDonnee::close();
    }*/

    #endregion Programme

    public static function creeProgramme($idProgramme, $idGabaritProgramme, $idSession, $animateurs, $prix){
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('INSERT INTO programme(id, id_gabarit_programme, id_session, animateur, prix) 
                            values(:idProgramme, :idGabaritProgramme, :idSession, :animateurs, :prix)');
        $req->execute(array(
            'idProgramme'=>$idProgramme,
            'idGabaritProgramme'=>$idGabaritProgramme,
            'idSession'=>$idSession,
            'animateurs'=>$animateurs,
            'prix'=>$prix));

        BaseDonnee::close();
    }

    public static function creeProgrammeSemaine($idProgramme, $idSemaine){
        $bdd = BaseDonnee::getConnexion();
        $id = Util::guidv4();

        $req = $bdd->prepare('INSERT INTO programme_semaine(id, id_programme, id_semaine) 
                            values(:id, :idProgramme, :idSemaine)');
        $req->execute(array(
            'id'=>$id,
            'idProgramme'=>$idProgramme,
            'idSemaine'=>$idSemaine));

        BaseDonnee::close();

    }

    public static function creeHoraireProgramme($idProgramme, $idActivite, $plageHoraire, $duree){
        $bdd = BaseDonnee::getConnexion();
        
        $req = $bdd->prepare('INSERT INTO horaire_programme(id_programme, id_activite_programme, plage_horaire, duree) 
                            values(:idProgramme, :idActivite, :plageHoraire, :duree)');
        $req->execute(array(
            'idProgramme'=>$idProgramme,
            'idActivite'=>$idActivite,
            'plageHoraire'=>$plageHoraire,
            'duree'=>$duree));

        BaseDonnee::close();
    }

    public static function getIdSemaine($idSession, $noSemaine) {
         $bdd = BaseDonnee::getConnexion();

         $req = $bdd->prepare('SELECT id FROM semaine WHERE id_session = :idSession AND no_semaine = :noSemaine');

         $req->execute(array(
             'idSession'=>$idSession,
             'noSemaine'=>$noSemaine
         ));
         $donnee = $req->fetch();
         $idSemaine = $donnee['id'];
         BaseDonnee::close();
        return $idSemaine;
    }
    #region Activite

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

        $req = $bdd->prepare('SELECT * FROM activite WHERE id_activite = :id');
        $req->execute(array('id'=>$id));
        $donnee = $req->fetch();
        $activite = new ActiviteModel( $donnee['id_activite'], $donnee['nom'], $donnee['type_activite'] );

        BaseDonnee::close();
        return $activite;
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

    #endregion Activite

    #region Type Activite

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

    #endregion Type Activite

    #region Bloc

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

    #endregion Bloc



}