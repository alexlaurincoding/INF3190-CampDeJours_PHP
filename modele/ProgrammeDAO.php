<?php
class ProgrammeDAO {

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

    public static function getSessions(){
        $bdd = BaseDonnee::getConnexion();
        $sessions = array();
        //sauvegarde parent dans la BD            
        $res = $bdd->query('SELECT * FROM session');
        while($donnee = $res->fetch()){
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