<?php
$parent = Util::message('viewmodel');
$sessions = Util::message('sessions');
$enfants = $parent->getEnfants();
$nombreEnfants = count($enfants);

$semainesProgramme = Util::message('semainesProgramme');

$dateCourrante = DateTime::createFromFormat("Y-m-d", date("Y-m-d"));
$dateDebutSession = DateTime::createFromFormat("Y-m-d", 
  GestionProgrammeDAO::getSession($semainesProgramme[0]->getSemaine()->getIdSession())->getDateDebut()); 
// $dateDebutSession = DateTime::createFromFormat("Y-m-d", date("2021-06-06")); // tests (override)

$differenceSemaines = ceil($dateCourrante->diff($dateDebutSession)->days / 7);
if ($dateCourrante < $dateDebutSession) $differenceSemaines = 0;
else if ($differenceSemaines > 15) $differenceSemaines = 15;

//Vue::loadModals('modifierParent', 'ajouterEnfant', 'modifierEnfant');
require('modals/modifierParent.php');
require('modals/ajouterEnfant.php');
?>

<h1>Tableau de bord des parents</h1>
<nav style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
        " aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= Util::getChemin() ?>">Accueil</a></li>
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
        <h2 class="mb-0"><?= $parent->getNom() ?>, <?= $parent->getPrenom() ?></h2>
      </div>
      <div class="col-6 d-flex align-items-end justify-content-end">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modifierProfil">
          <i class="fas fa-pen"></i>
          Modifier le profil
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <img src="<?= Util::getChemin() ?>/<?= $parent->getPhotoProfil() ?>" height="160rem" alt="" />
      </div>
      <div class="col">
        <h6 class="mb-0 card-title">Nom</h6>
        <p class="card-text"><?= $parent->getNom() ?></p>
        <h6 class="mb-0 card-title">Prenom</h6>
        <p class="card-text"><?= $parent->getPrenom() ?></p>
        <h6 class="mb-0 card-title">Courriel</h6>
        <p class="card-text"><?= $parent->getCourriel() ?></p>
      </div>
      <div class="col">
        <h6 class="mb-0 card-title">Adresse</h6>
        <address class="card-text">
          <?= $parent->getAdresse() ?>
        </address>
        <h6 class="mb-0 card-title">Date De Naissance</h6>
        <p class="card-text"><?= $parent->getDateDeNaissance() ?></p>
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
        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ajouterEnfant">
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
              <h2 class="mb-0"><?= $enfant->getNom() ?>, <?= $enfant->getPrenom() ?></h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modifierEnfant<?= $enfant->getId() ?>">
                <i class="fas fa-pen"></i>
                Modifier <?= $enfant->getPrenom() ?>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <img src="<?= Util::getChemin() ?>/<?= $enfant->getPhotoProfil() ?>" height="160rem" alt="" />
            </div>
            <div class="col">
              <h6 class="mb-0 card-title">Nom</h6>
              <p class="card-text"><?= $enfant->getNom() ?></p>
              <h6 class="mb-0 card-title">Prenom</h6>
              <p class="card-text"><?= $enfant->getPrenom() ?></p>
              <h6 class="mb-0 card-title">Notes</h6>
              <p class="card-text"><?= $enfant->getNotes() ?></p>
            </div>
            <div class="col">
              <h6 class="mb-0 card-title">Adresse</h6>
              <address class="card-text">
                <?= $parent->getAdresse() ?>
              </address>
              <h6 class="mb-0 card-title">Date De Naissance</h6>
              <p class="card-text"><?= $enfant->getDateDeNaissance() ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>
</div>

<?php if ($nombreEnfants > 0) { ?>

  <div class="card mb-4">
    <div class="card-header">
      <div class="row mb-2 mt-2">
        <div class="col-9">
          <h2 class="mb-0">
            <i class="far fa-calendar-alt"></i> Horaire des enfants à charge
          </h2>
        </div>
        <div class="col-3 d-flex align-items-end justify-content-end">
          <form method="POST" onchange="this.form.submit()">

            <select name="numSession" class="form-control" onchange="this.form.submit()">
              <?php
              
              $idSessionSelect = $_SESSION["numSession"];
              foreach ($sessions as $session) {
                if ($session->getId() == $idSessionSelect) 
                echo '<option value="' . $session->getId() . '">' . $session->getNom() . '</option>';
              }
              foreach ($sessions as $session) {
                if ($session->getId() != $idSessionSelect) 
                echo '<option value="' . $session->getId() . '">' . $session->getNom() . '</option>';
              }
              ?>
            </select>
            
          </form>
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
          <?php
          foreach ($semainesProgramme as $semaine) {
            $noSemaine = $semaine->getSemaine()->getNoSemaine();
            $estDateDansLePasse = ($noSemaine <= $differenceSemaines);

            $enfants = $semaine->getEnfantsInscriptions();
            foreach ($enfants as $enfant) {

              if (!$estDateDansLePasse) { ?>
                <tr class="week-ongoing">
                <?php } else { ?>
                <tr class="week-passed">
                <?php } ?>

                <?php if ($enfant == $enfants[0]) { ?> 
                  <td rowspan="<?=$nombreEnfants?>">Semaine <?=$noSemaine?></td>
                <?php } ?>

                <td><?= $enfant->getNomEnfant() ?>, <?= $enfant->getPrenomEnfant() ?></td>

                <!-- DEBUT COLONNE PROGRAMME -->
                <?php
                // $programmesDisponibles = $enfant->getProgrammes();
                afficherColonneProgramme($enfant, $noSemaine, $estDateDansLePasse);
                ?>

                <!-- DEBUT COLONNE STATUS -->
                <td class="colonne-status">
                  <?php
                  afficherBoutonStatus($enfant, $noSemaine, $estDateDansLePasse);
                  ?>
                </td>


                </tr>
            <?php }
          } ?>

        </tbody>
      </table>
    </div>
  </div>

  <div>
    <div id="cartboi" class="mt-3 mb-4 card">
      <div class="card-header">
        <div class="row mb-2 mt-2">
          <div class="col-6">
            <h2 class="mb-0"><i class="fas fa-shopping-cart"></i> Panier</h2>
          </div>
          <div class="col-6 d-flex align-items-end justify-content-end">
            <p> <span id="dateFacture"><?= date("Y-m-d") ?></span> </p>
          </div>
        </div>
      </div>

      <div class="card-body">
        <table class="table table-hover table-sm" id="table_enfants_a_charge">
          <thead class="thead-dark">
            <tr>
              <th>Programme</th>
              <th>Nombre</th>
              <th>Prix</th>
              <th>Sous-Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>L'enfant actif</td>
              <td>2</td>
              <td>150.00$</td>
              <td>300.00$</td>
            </tr>

            <tr>
              <td>Les arts et la science</td>
              <td>1</td>
              <td>150.00$</td>
              <td>150.00$</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td class="fw-bold">Total :</td>
              <td class="fw-bold grey">450.00$</td>
            </tr>
          </tbody>
        </table>
        <div class="row">
          <div class="col-9"></div>
          <div class="col-3">
            <!--boutton paypal
              pour tester, Email: sb-ybcnk6512123@personal.example.com, Mot de passe: lesnerds-->
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="RY3NXXM4RCP4E">
              <input type="image" src="https://www.sandbox.paypal.com/fr_CA/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
              <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_CA/i/scr/pixel.gif" width="1" height="1">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>


<script>
function updatePanier(e) {
    let id = e.options[e.selectedIndex].getAttribute("data-id");
    let prix = e.options[e.selectedIndex].getAttribute("data-prix");
    let boutonPanier = $("#" + e.id.replace("semaine", "panier"));
    boutonPanier.html(prix + " $ <i class=\"fas fa-cart-plus\"></i>");
    boutonPanier.prop("disabled", false);
}

function inscrire(idEnfant, idProgramme, idSemaine){
  var getUrl = window.location;
  var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
  let url = baseUrl + "/parent/inscrireEnfant";
  let params = {
    "idEnfant": idEnfant,
    "idProgramme": idProgramme,
    "idSemaine": idSemaine
  };
  
  post(url, params);
}

function post(path, params, method='post') {
  const form = document.createElement('form');
  form.method = method;
  form.action = path;

  for (const key in params) {
    if (params.hasOwnProperty(key)) {
      const hiddenField = document.createElement('input');
      hiddenField.type = 'hidden';
      hiddenField.name = key;
      hiddenField.value = params[key];

      form.appendChild(hiddenField);
    }
  }

  document.body.appendChild(form);
  form.submit();
}

</script>

<?php }

function afficherBoutonStatus($enfant, $noSemaine, $estDateDansLePasse)
{
  $estPaye = $enfant->getEstPaye();
  $programmeInscrit = $enfant->getProgrammeInscrit();
  if ($estPaye) {
    afficherBoutonPaye($enfant, $noSemaine);
  } else if ($estDateDansLePasse) {
    afficherBoutonEchu();
  } else {
    if ($programmeInscrit) {
      afficherBoutonRetirer();
    } else {
      afficherPanierPrix($enfant, $noSemaine);
    }
  }
}

function afficherBoutonPaye()
{
  echo ('<button class="btn btn-success btn-sm disabled">
           Payé <i class="fas fa-check"></i>
         </button>');
}

function afficherBoutonRetirer()
{
  echo ('<button class="btn btn-danger btn-sm">
          Retirer
          <i class="fas fa-minus-circle"></i>
        </button>');
}

function afficherPanierPrix($enfant, $noSemaine)
{
  $idPanier = $enfant->getIdEnfant() . "-panier" . $noSemaine;
  echo ('<button disabled onclick="inscrire(idEnfant, idProgramme, idSemaine)" id="' . $idPanier . '" class="panier-prix btn btn-secondary btn-sm">
          $ <i class="fas fa-cart-plus"></i>
        </button>');
}

function afficherboutonEchu()
{
  echo ('<button class="btn btn-secondary btn-sm disabled">
          Échue
          <i class="fas fa-clock"></i>
        </button>');
}

function afficherColonneProgramme($enfant, $noSemaine, $estDateDansLePasse = false)
{
  $titreProgramme = $enfant->getNomProgramme();
  $programmeInscrit = $enfant->getProgrammeInscrit();

  if ($programmeInscrit) {
    afficherNomProgramme($titreProgramme);
  } else if ($estDateDansLePasse) {
    afficherTropTard();
  } else{
    afficherDropDown($enfant, $noSemaine);
  }
}

function afficherNomProgramme($programmesDisponibles)
{
  echo ('<td>' . $programmesDisponibles . '</td>');
}

function afficherTropTard()
{
  echo ('<td >
          <div class="col-6">
            AUCUNE INSCRITPION
          </div>
        </td>');
}

function afficherDropDown($enfant, $noSemaine)
{
  $programmesDisponibles = $enfant->getProgrammes();
  $dropdown =  '';

  if(sizeof($programmesDisponibles) > 0){
    $dropdown =  '<td>
    <div class="col-6">
      <select onchange="updatePanier(this)" onload="updatePanier(this);" id=' . $enfant->getIdEnfant() . "-semaine" . $noSemaine . ' class="form-control">
      <option disabled selected data-prix="0">Selectionnez un programme </option>';
    foreach ($programmesDisponibles as $programme) {
      $dropdown = $dropdown . '<option data-prix="' . $programme->getPrix() . ' "data-id="' . $programme->getIdProgramme() . '"> ' . $programme->getTitreGabaritProgramme() . ' </option>';
    }
  }else{
      $dropdown =  '<td><div class="col-6"><select disabled class="form-control">';
    $dropdown = $dropdown . '<option default>Aucun programme disponible</option>';
  }

  $dropdown = $dropdown . '
            </select>
          </div>
        </td>';

  echo ($dropdown);
}

?>