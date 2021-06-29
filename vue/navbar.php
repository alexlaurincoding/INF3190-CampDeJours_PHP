<nav
  class="navbar navbar-expand-md navbar bg-light mb-3"
  aria-label="Fourth navbar example"
>
  <div class="container-fluid">
    <a id="nav-title" class="navbar-brand" href="<?=getChemin()?>">Camp de jour des nerds</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbar"
      aria-controls="navbar"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=getChemin()?>">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=getChemin()?>/accueil/description">Description des programmes</a>
                  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=getChemin()?>/accueil/contact">Contact</a>
        </li>
        </li>
      </ul>
      <form class="d-flex" onsubmit="login(); return false;">
        <input required id="username" class="form-control me-2" type="text" placeholder="Nom d'utilisateur" />
        <input required id="password" class="form-control me-2" type="password" placeholder="Mot de passe" />
        <button class="btn btn-dark">Connexion</button>
        <a class="btn btn-secondary mx-2" href="<?=getChemin()?>/accueil/inscription">Inscription</a>
      </form>
    </div>
  </div>
</nav>