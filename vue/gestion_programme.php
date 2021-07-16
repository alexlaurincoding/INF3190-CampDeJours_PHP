<?php
$viewmodel = util::message('viewmodel');
echo "<script>window.viewmodel=" . json_encode($viewmodel) . "</script>";
require('vue/modals/ajouterSession.php');
require('vue/modals/ajouterTypeDActivite.php');
require('vue/modals/ajouterBlocActivite.php');
require('vue/modals/ajouterActivite.php');
require('vue/modals/ajouterProgramme.php');
?>
<h1 class="">Gestion des programmes</h1>

      <nav
        style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
        "
        aria-label="breadcrumb"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=Util::getChemin()?>">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Admin</li>
          <li class="breadcrumb-item active" aria-current="page">
            Gestion des programmes
          </li>
        </ol>
      </nav>

      <!--Sessions-->
      <div class="card my-3">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Sessions</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#creerSessionModal"
              >
                Ajouter
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">

          <div class="collapse" id="collapseSession">
<?php
$sessions = $viewmodel->getSessions();
foreach($sessions as $session){
?>
            <div class="card my-2">
              <div class="card-body">
                <h3 class="session-titre mb-0"><?=$session->getNom()?></h3>
                <div class="session-description col-10 mb-3">
                  <?=$session->getDescription()?>
                </div>
              </div>
            </div>
<?php
}
?>
          </div>
          <p class="text-center">
            <button
              class="btn btn-secondary mt-3"
              id="sessionVoirPlus"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseSession"
              aria-expanded="false"
              aria-controls="collapseSession"
              onclick="voirplus(this)"
              data-text = "Voir les sessions"
            >
              Voir les sessions
            </button>
          </p>
        </div>
      </div>
<!--Fin Sessions-->

<!--Programmes-->
      <div class="card my-3">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Programmes</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#creerProgrammeModal"
              >
                Ajouter
              </button>
            </div>
          </div>
        </div>
        
        <div class="card-body">
        <div class="collapse" id="collapseProgramme">
        <?php
              $programmes = $viewmodel->getProgrammes();
              foreach($programmes as $programme){
                $semaines = $programme->getSemaines();
                $affichageSemaines = "Semaines ";
                foreach($semaines as $semaine){
                  $affichageSemaines = $affichageSemaines  . $semaine->getNoSemaine() . ", ";
                }
                $affichageSemaines = rtrim($affichageSemaines, ", ");
                $affichageSemaines = $affichageSemaines  . "."
                ?>
          <div class="card my-2">
            <div class="card-body">
            
              <div class="row">
                <div class="flex-column col-4">
                  <h3 class="programme-titre mb-0"><?=$programme->getGabaritProgramme()->getTitre()?></h3>
                </div>
                <div
                  class="d-flex col-4 align-items-center justify-content-center"
                >
                   <h4><?=$programme->getSession()->getNom() ?></h4>
                </div>
                <div
                  class="d-flex col-4 align-items-center justify-content-center"
                >
                   <?= $affichageSemaines?>
                </div>
              </div>

              <div>
                <hr class="mt-3" />
              </div>

              <div class="programme-description col-12 mb-3">
              <?=$programme->getGabaritProgramme()->getDescription()?>
              </div>

              <div class="programme-description col-12 mb-3">
                <h4 class="mb-0">Animateurs :</h4>
                <?=$programme->getAnimateurs()?>
              </div>

              <div class="mb-4">
                <h4 class="col-3 d-flex mb-0">Horaire :</h4>

                <div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Activité</th>
                        <th scope="col">Durée</th>
                        <th scope="col">Heure</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
            $heure = 8;
            $horaireProgramme = GestionProgrammeDAO::getHoraireProgramme($programme->getId());
            foreach($horaireProgramme as $horaireProgramme){
              $activiteProgramme = GestionProgrammeDAO::getActiviteProgramme($horaireProgramme->getActiviteProg());
              if(GestionProgrammeDAO::isActivite($horaireProgramme->getActiviteProg())){
                $type = "Activité";

              }else{
                $type = "Bloc";
              }
          ?>
                      <tr>
                        <th scope="row"><?=$horaireProgramme->getPlageHoraire()?></th>
                        <td><?=$type?> - <?=$activiteProgramme->getNom()?></td>
                        <td><?=$horaireProgramme->getDuree()?> heures</td>
                        <td><?=$heure?>h à <?=$heure += $horaireProgramme->getDuree()?></td>
                      </tr>
                               <?php
            }
          ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php
                }
              
              ?>
         
          </div>
          <p class="text-center">
            <button
              class="btn btn-secondary mt-3"
              id="sessionVoirPlus"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseProgramme"
              aria-expanded="false"
              aria-controls="collapseProgramme"
              onclick="voirplus(this)"
              data-text = "Voir les programmes"
            >
              Voir les programmes
            </button>
          </p>
        </div>
      </div>
<!--Fin Programmes-->

<!--Bloc Activités-->
      <div class="card my-3">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Blocs d'activité</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#creerBlocActiviteModal"
              >
                Ajouter
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">

          <div class="collapse" id="collapseBlocActivite">
<?php
$blocsActivite = $viewmodel->getBlocsActivite();
foreach($blocsActivite as $blocActivite){
?>
            <div class="card my-2">
              <div class="card-body">
                <h2><?=$blocActivite->getNom()?></h2>
                <hr />
                <p>
<?php
$activites = $blocActivite->getActivites();
foreach($activites as $activite){
?>
                <span class="badge rounded-pill bg-secondary"
                    ><?=$activite->getNom()?></span
                  >
<?php
}
?>
                </p>
              </div>
            </div>
<?php
}
?>
          </div>
          <p class="text-center">
            <button
              class="btn btn-secondary mt-3"
              id="blocActiviteVoirPlus"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseBlocActivite"
              aria-expanded="false"
              aria-controls="collapseBlocActivite"
              onclick="voirplus(this)"
              data-text = "Voir les blocs d'activités"
            >
              Voir les blocs d'activités
            </button>
          </p>
        </div>
      </div>
      <!--Fin Bloc Activités-->

      <!--Type d'activité-->
      <div class="card my-3">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Types d'activité</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#creerTypeModal"
              >
                Ajouter
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
        <div class="collapse" id="collapseTypeActivite">
<?php
$typesActivite = $viewmodel->getTypesActivite();
foreach($typesActivite as $typeActivite){
?>
          <div class="card my-2">
            <div class="card-body">
              <h2><?=$typeActivite->getNom()?></h2>
              <hr />
              <h4>Description:</h4>
              <p class="mt-3"><?=$typeActivite->getDescription()?></p>
            </div>
          </div>
<?php
}
?>
        </div>
        </div>
          <p class="text-center">
            <button
              class="btn btn-secondary mt-3"
              id="typeActiviteVoirPlus"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseTypeActivite"
              aria-expanded="false"
              aria-controls="collapseTypeActivite"
              onclick="voirplus(this)"
              data-text = "Voir les types d'activité"
            >
              Voir les types d'activité 
            </button>
          </p>
        </div>
      <!--Fin Type d'activité-->

      <!--Activité-->
      <div class="card my-3">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Activités</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#creerActiviteModal"
              >
                Ajouter
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
        <div class="collapse" id="collapseActivite">

<?php 
$typesActivite = $viewmodel->getTypesActivite(); 
foreach ($typesActivite as $type) {
?>
        <!-- Regroupement des activités par type -->
          <div class="card my-2">
            <div class="card-body">
              <h2><?=$type->getNom()?></h2>
              <hr />
  <?php 
  $activitesParType = GestionProgrammeDAO::getActivitesParType($type->getId());
  foreach($activitesParType as $activite) {
  ?>
              <!-- Pastilles activites -->
                <p>
                  <span class="badge rounded-pill bg-secondary"><?=$activite->getNom()?></span>
                </p>
              <!-- Fin pastilles activites -->
  <?php
  }
  ?>
            </div>
          </div>
        <!-- Fin regroupement des activités par type -->
<?php 
}
?>
        </div>

        </div>
          <p class="text-center">
            <button
              class="btn btn-secondary mt-3"
              id="activiteVoirPlus"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapseActivite"
              aria-expanded="false"
              aria-controls="collapseActivite"
              onclick="voirplus(this)"
              data-text = "Voir les activités"
            >
              Voir les activités 
            </button>
          </p>
        </div>
      </div>
      <!--Fin Activité-->
