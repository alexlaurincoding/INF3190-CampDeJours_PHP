<?php 
class inscriptionJSONDAO{

    public function genererJSONInscription(){
        $bdd = BaseDonnee::getConnexion();
        $reponse = $bdd->query('SELECT e.prenom, e.nom, par.prenom, par.nom, ses.nom, prog.titre, sem.no_semaine, insc.paye 
                                from inscription insc, enfant e, parent par, sesssion ses, programme prog, semaine sem
                                WHERE e.id = insc.id_enfant
                                AND par.id = e.id_parent
                                AND 

                                ORDER BY ');
    }


}