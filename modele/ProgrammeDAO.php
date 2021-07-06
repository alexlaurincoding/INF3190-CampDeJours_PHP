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

}