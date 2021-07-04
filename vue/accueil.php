<h1>Camp de jour des nerds</h1>
      <h4>Parce que vous le codez bien</h4>

      <h3 class="mt-5">Présentation des pages du projet</h3>
      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Pages Publique</h5>
          <p class="card-text">
            Démonstration des pages qui seront accessibles au publique, qui peut
            simplement consulter des renseignements sur le camps et s'y
            inscrire.
          </p>
          <button href="<?=Util::getChemin()?>" class="btn btn-dark" disabled>
            Accueil
          </button>
          <a href="<?=Util::getChemin()?>/accueil/description" class="btn btn-dark"
            >Description des programmes</a
          >
          <a href="<?=Util::getChemin()?>/accueil/inscription" class="btn btn-dark"
            >Inscription des parents</a
          >
          <a href="<?Util::getChemin()?>/accueil/contact" class="btn btn-dark">Contact</a>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Pages Parents</h5>
          <p class="card-text">
            Démonstration des pages qui seront accessibles aux parents des
            enfants inscrits au camp de jour. Ces pages comprennent un tableau
            de bord pour inscrire des enfants aux activités du camp.
          </p>
          <a href="<?=Util::getChemin()?>/utilisateur/index" class="btn btn-dark"
            >Tableau de bord du parent</a
          >
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-body">
          <h5 class="card-title">Pages Administrateurs</h5>
          <p class="card-text">
            Démonstration des pages qui seront accessibles uniquement au
            administrateurs du camp de jour. Ces pages permettent de gérer les
            programmes et de voir les enfants qui y sont inscrits.
          </p>
          <a href="<?=Util::getChemin()?>/admin/gestionProgramme" class="btn btn-dark">Gérer les programmes</a>
          <a href="<?=Util::getChemin()?>/admin/index" class="btn btn-dark"
            >Voir les inscriptions</a
          >
        </div>
      </div>