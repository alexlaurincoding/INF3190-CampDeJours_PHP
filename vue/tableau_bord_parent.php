<?php 
$parent = Util::message('viewmodel');
$sessions = Util::message('sessions');
$enfants = $parent->getEnfants();
$nombreEnfants = count($enfants);
$estPaye = false; //temporaire
$estDansPanier = false; //temporaire
$dateCourrante = DateTime::createFromFormat("Y-m-d", date("Y-m-d"));
$dateDebutSession = DateTime::createFromFormat("Y-m-d", "2021-06-01");

$differenceSemaines = $dateCourrante->diff($dateDebutSession)->days / 7;
if ($differenceSemaines < 0) $differenceSemaines = 0;
else if ($differenceSemaines > 15) $differenceSemaines = 15;


//Vue::loadModals('modifierParent', 'ajouterEnfant', 'modifierEnfant');
require('modals/modifierParent.php');
require('modals/ajouterEnfant.php');
?>

<h1>Tableau de bord des parents</h1>
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
          <li class="breadcrumb-item active" aria-current="page">Parents</li>
          <li class="breadcrumb-item active" aria-current="page">
            Tableau de bord des parents
          </li>
        </ol>
      </nav>

      <div id="user" class="card mb-4">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0"><?=$parent->getNom()?>, <?=$parent->getPrenom()?></h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#modifierProfil"
              >
                <i class="fas fa-pen"></i>
                Modifier le profil
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <img src="<?=Util::getChemin()?>/<?=$parent->getPhotoProfil()?>" height="160rem" alt="" />
            </div>
            <div class="col">
              <h6 class="mb-0 card-title">Nom</h6>
              <p class="card-text"><?=$parent->getNom()?></p>
              <h6 class="mb-0 card-title">Prenom</h6>
              <p class="card-text"><?=$parent->getPrenom()?></p>
              <h6 class="mb-0 card-title">Courriel</h6>
              <p class="card-text"><?=$parent->getCourriel()?></p>
            </div>
            <div class="col">
              <h6 class="mb-0 card-title">Adresse</h6>
              <address class="card-text">
                <?=$parent->getAdresse()?>
              </address>
              <h6 class="mb-0 card-title">Date De Naissance</h6>
              <p class="card-text"><?=$parent->getDateDeNaissance()?></p>
            </div>
          </div>
        </div>
      </div>

      <div id="children" class="card mb-4">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">
                </i> Enfants à charge
              </h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button
                type="button"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#ajouterEnfant"
              >
                <i class="fas fa-plus"></i>
                Ajouter un enfant
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">

          <?php 
          $enfantModif;
          foreach ($parent->getEnfants() as $enfant) { 
          $enfantModif = $enfant;
          require('modals/modifierEnfant.php');
          ?>
          
          <div class="card mb-4">
            <div class="card-header">
              <div class="row mb-2 mt-2">
                <div class="col-6">
                  <h2 class="mb-0"><?=$enfant->getNom()?>, <?=$enfant->getPrenom()?></h2>
                </div>
                <div class="col-6 d-flex align-items-end justify-content-end">
                  <button
                    type="button"
                    class="btn btn-secondary btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modifierEnfant<?=$enfant->getId()?>"
                  >
                    <i class="fas fa-pen"></i>
                    Modifier <?=$enfant->getPrenom()?>
                  </button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <img src="<?=Util::getChemin()?>/<?=$enfant->getPhotoProfil()?>" height="160rem" alt="" />
                </div>
                <div class="col">
                  <h6 class="mb-0 card-title">Nom</h6>
                  <p class="card-text"><?=$enfant->getNom()?></p>
                  <h6 class="mb-0 card-title">Prenom</h6>
                  <p class="card-text"><?=$enfant->getPrenom()?></p>
                  <h6 class="mb-0 card-title">Notes</h6>
                  <p class="card-text"><?=$enfant->getNotes()?></p>
                </div>
                <div class="col">
                  <h6 class="mb-0 card-title">Adresse</h6>
                  <address class="card-text">
                    <?=$parent->getAdresse()?>
                  </address>
                  <h6 class="mb-0 card-title">Date De Naissance</h6>
                  <p class="card-text"><?=$enfant->getDateDeNaissance()?></p>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>

        </div>
      </div>

      <div class="card mb-4">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-9">
              <h2 class="mb-0">
                <i class="far fa-calendar-alt"></i> Horaire des enfants à charge
              </h2>
            </div>
            <div class="col-3 d-flex align-items-end justify-content-end">
              <select name="numSession" class="form-control">
                <?php 
                  foreach($sessions as $session){
                    echo '<option value="' . $session->getId() . '">' . $session->getNom() . '</option>';
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover table-sm" id="table_enfants_a_charge">
            <thead class="thead-dark">
              <tr>
                <th>Semaine</th>
                <th>Enfant</th>
                <th>Programme</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody>

              <?php for ($i = 1; $i <= 15; $i++) { 
                $estEnCours = ($i > $differenceSemaines);
                foreach ($enfants as $enfant) { ?>
                
                <?php if ($estEnCours) { ?> <tr class="week-ongoing">
                <?php } else { ?> <tr class="week-passed">
                <?php } ?>

                  <?php if ($enfant == $parent->getEnfants()[0]) { ?> 
                    <td rowspan="<?=$nombreEnfants?>">Semaine <?=$i?></td>
                  <?php } ?>

                  <td><?=$enfant->getNom()?>, <?=$enfant->getPrenom()?></td>
                  
                  <!-- bouton paye -->
                  <?php if($estPaye) { ?>
                    <td>Les arts et la science</td>
                    <td>
                        <button class="btn btn-success btn-sm disabled">
                          Payé <i class="fas fa-check"></i>
                        </button>
                    </td>
                  
                  <!-- bouton dans panier -->
                  <?php } else if($estDansPanier) { ?>
                    <td class="cart-in">Les arts et la science</td>
                    <td>
                      <button class="btn btn-danger btn-sm">
                        Retirer
                        <i class="fas fa-minus-circle"></i>
                      </button>
                    </td>

                  <!-- bouton ajouter au panier -->
                  <?php } else { ?>
                    <td>
                    <div class="col-6">
                      <select class="form-control">
                        <?php //foreach($programmes->getParSemaine($i) as $programme) { ?>
                          <!-- <option>1</option> -->
                        <?php //} ?>
                        <option>Le classique</option>
                        <option>Les arts et les sciences</option>
                        <option>L'enfant actif</option>
                      </select>
                    </div>
                    </td>
                    <td>
                      <button class="btn btn-secondary btn-sm">
                        150.00 $
                        <i class="fas fa-cart-plus"></i>
                      </button>
                    </td>

                </tr>

                  <?php } ?>
                <?php } ?>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>



