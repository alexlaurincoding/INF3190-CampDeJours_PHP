<?php 
class inscriptionJSONDAO{

    public function getIDSemaine($idSession, $noSemaine){
        $bdd = BaseDonnee::getConnexion();

        $req = $bdd->prepare('SELECT id FROM semaine 
                            WHERE id_session = :idSession
                            AND :no_semaine = :noSemaine
                            ');
        $req->execute(array('idSession'=>$idSession,
                            'noSemaine'=>$noSemaine));

        $idSemaine = $req->fetch();

        BaseDonnee::close();
        return $idSemaine;       
    }
}


