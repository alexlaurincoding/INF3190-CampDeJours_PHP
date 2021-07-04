<?php $parent = $_SESSION['parent']; 
require('modals/modifierParent.php');
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
                Modifier
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