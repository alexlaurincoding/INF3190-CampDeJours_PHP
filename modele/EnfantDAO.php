<?php 
class EnfantDAO {

    public static function isIdEnfantExistant($id){
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT id FROM enfant WHERE id = :id');
        $req->execute(array('id'=> $id));
        $donnee = $req->fetch();
        BaseDonnee::close();   
        if($donnee){
            return true;
        }
        return false;
    }


    /**
     * Retourne un Enfant
     * 
     */
    public static function getEnfantParId($id){

    }

    /**
     * Retourne une collection d'Enfant pour un Parent
     * 
     */
    public static function getEnfants($parent){
        $enfants = array();
        $bdd = BaseDonnee::getConnexion();
        $req = $bdd->prepare('SELECT * FROM enfant WHERE id_parent = :id_parent');

        $req->execute(array('id_parent'=> $parent->getId()));
        while($donnee = $req->fetch()){
            $enfant = new EnfantModel($donnee['id'], 
                                      $donnee['nom'], 
                                      $donnee['prenom'], 
                                      $donnee['date_naissance'], 
                                      $donnee['url_photo'], 
                                      $donnee['notes'], 
                                      $parent);
            array_push($enfants, $enfant);
        }
        
        BaseDonnee::close();   

        return $enfants;
    }

    public static function modifierEnfant($enfant){

    }

    /**
     * Enregistrer un enfant dans la base de données
     * 
     * param $enfant instance d'EnfantModel
     * 
     */
    public static function sauvegarderEnfant($enfant){
        $bdd = BaseDonnee::getConnexion();

        //sauvegarde parent dans la BD            
        $req = $bdd->prepare('INSERT INTO enfant(id, nom, prenom, date_naissance, url_photo, id_parent)
                                    VALUES (:id, :nom, :prenom, :date_naissance, :url_photo, :id_parent)');
        $req->execute(array(
            'id'=> $enfant->getId(),
            'nom'=> $enfant->getNom(),
            'prenom'=> $enfant->getPrenom(),
            'date_naissance'=>$enfant->getDateDeNaissance(),
            'url_photo'=> $enfant->getPhotoProfil(),
            'id_parent'=> $enfant->getParent()->getId()
        )); 
        BaseDonnee::close();
    }

    
}