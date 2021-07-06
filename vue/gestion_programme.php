<?php
require('vue/modals/ajouterSession.php');
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
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
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
          <div class="card my-2">
            <div class="card-body">
              <h3 class="session-titre mb-0">Session 2021</h3>
              <div class="session-description col-10 mb-3">
                Le Classique, les arts et la science, l'enfant actif.
              </div>
            </div>
          </div>
          <div class="collapse" id="collapseSession">
            <div class="card my-2">
              <div class="card-body">
                <h3 class="session-titre mb-0">Session 2020</h3>
                <div class="session-description col-10 mb-3">
                  Le Classique, les arts et la science, l'enfant actif.
                </div>
              </div>
            </div>
            <div class="card my-2">
              <div class="card-body">
                <h3 class="session-titre mb-0">Session 2019</h3>
                <div class="session-description col-10 mb-3">
                  Le Classique, les arts et la science, l'enfant actif.
                </div>
              </div>
            </div>
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
              onclick="voirplus('sessionVoirPlus')"
            >
              Voir plus
            </button>
          </p>
        </div>
      </div>
      <!--Fin Sessions-->