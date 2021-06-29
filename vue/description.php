<?php ob_start(); ?>

<h1>Nos programmes</h1>
      <nav
        style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
        "
        aria-label="breadcrumb"
        class="mb-4"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=getChemin()?>">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Nos Programmes
          </li>
        </ol>
      </nav>

      <div class="mt-3 card">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Le classique</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end"></div>
          </div>
        </div>
        <div class="card-body">
          <p class="card-text">
            Le classique comprend chaque jour un bloc d’activités de type
            sportif et un autre avec une activité de type art et une activité de
            type science.
          </p>
          <h5>Horaire</h5>
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
              <tr>
                <th scope="row">1</th>
                <td>Bloc - Sports d'equipe au choix</td>
                <td>4h</td>
                <td>8h à 12h</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>Diner</td>
                <td>1h</td>
                <td>12h à 13h</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Bloc - Art et Science</td>
                <td>4h</td>
                <td>13h à 17h</td>
              </tr>
            </tbody>
          </table>
          <h5>Prix</h5>
          <p>150$ par semaine.</p>
        </div>
      </div>
      <div class="mt-3 card">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">Arts et science</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end"></div>
          </div>
        </div>
        <div class="card-body">
          <p class="card-text">
            Le programme arts et science comprend plusieurs activités d'arts
            culinaires, d'arts visuels, d'arts plastiques, de chimie, de
            biologie et de physique. Il ne possède pas d’activité physique,
            cependant une activité matinale est réservée pour pratiquer le yoga
            ou jouer à un jeu de course comme le ballon chasseur.
          </p>
          <h5>Horaire</h5>
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
                <tr>
                  <th scope="row">1</th>
                  <td>Bloc - Matin actif leger</td>
                  <td>1h</td>
                  <td>8h à 9h</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Bloc - Art et Science</td>
                  <td>3h</td>
                  <td>9h à 12h</td>
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td>Diner</td>
                  <td>1h</td>
                  <td>12h à 13h</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Bloc - Art et Science</td>
                  <td>4h</td>
                  <td>13h à 17h</td>
                </tr>
              </tbody>
            </table>
            <h5>Prix</h5>
            <p>150$ par semaine.</p>
          </div>
        </div>
      </div>

      <div class="mt-3 card">
        <div class="card-header">
          <div class="row mb-2 mt-2">
            <div class="col-6">
              <h2 class="mb-0">L'enfant actif</h2>
            </div>
            <div class="col-6 d-flex align-items-end justify-content-end"></div>
          </div>
        </div>
        <div class="card-body">
          <p class="card-text">
            Le programme athlétique est un camp de jour sportif intensif pour
            les enfants très actifs. Il comprend au moins quatre activités
            quotidiennes dont le basketball, le tennis, le soccer, le ballon
            chasseur, le baseball, etc.
          </p>
          <h5>Horaire</h5>
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
              <tr>
                <th scope="row">1</th>
                <td>Bloc - Sports d'equipe au choix</td>
                <td>2h</td>
                <td>8h à 10h</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Bloc - Sports d'equipe au choix</td>
                <td>2h</td>
                <td>10h à 12h</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>Diner</td>
                <td>1h</td>
                <td>12h à 13h</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Bloc - Sports d'equipe au choix</td>
                <td>2h</td>
                <td>13h à 15h</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Bloc - Sports d'equipe au choix</td>
                <td>2h</td>
                <td>15h à 17h</td>
              </tr>
            </tbody>
          </table>
          <h5>Prix</h5>
          <p>150$ par semaine.</p>
        </div>
      </div>
      
<?php $contenu = ob_get_clean(); ?>
<?php require('template.php'); ?>