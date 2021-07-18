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

    public static function payerInscriptions($inscriptions){
        $bdd = BaseDonnee::getConnexion();

        foreach($inscriptions as $inscription){
            $req = $bdd->prepare('UPDATE inscription
                                SET paye = 1
                                WHERE id_programme = :idProgramme
                                AND id_enfant = :idEnfant');
            $req->execute(array('idProgramme' => $inscription->getIdProgrammeSemaine(),
                                'idEnfant' => $inscription->getIdEnfant()));
        }
        Util::setMessage("global", "Payment effectuer avec succès!");
        Util::redirectControlleur("parent","index"); 
    }
}


