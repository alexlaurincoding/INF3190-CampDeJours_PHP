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

}