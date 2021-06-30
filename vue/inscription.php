<h1>Inscription des parents</h1>
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
          <li class="breadcrumb-item"><a href="<?=Util::getChemin()?>">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Inscription des parents
          </li>
        </ol>
      </nav>

      
      <div class="card w-50 mx-auto mb-5">
        <div class="card-body">
          <h5 class="card-title">Informations personnelles</h5>
          <form method="post" action="<?=Util::getChemin();?>/utilisateur/inscription" enctype="multipart/form-data">
            <div class="row pt-2">
              <div class="col text-center">
                <input
                  type="file"
                  accept="image/*"
                  name="photoProfil"
                  id="uploadProfil"
                  onchange="loadFile(event)"
                  style="display: none"
                />
                <label
                  for="uploadProfil"
                  style="cursor: pointer"
                  class="form-label"
                >
                  <img
                    id="uploadProfilImg"
                    width="150"
                    src="../public/img/profil.png"
                    class="rounded"
                  />
                  <p>Photo de profil<br>
                  <span class="erreur">
                    <?= Util::message("photoProfil"); ?>
                </span></p>                  
                </label>
              </div>
            </div>
            <div class="row px-2">
              <div class="col">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="form-control"/>
                <span class="erreur">
                    <?= Util::message("prenom"); ?>
                </span>
              </div>
              <div class="col">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" />
                <span class="erreur">
                    <?= Util::message("nom"); ?>
                </span>
              </div>
            </div>
            <div class="row p-2">
              <div class="col">
                <label for="emailemail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail3" />
                <span class="erreur">
                    <?= Util::message("email"); ?>
                </span>
              </div>
              <div class="col">
                <label for="ddn" class="form-label">Date de naissance</label>
                <input type="date" id="ddn" name="dateNaissance" class="form-control" />
                <span class="erreur">
                    <?= Util::message("dateNaissance"); ?>
                </span>
              </div>
            </div>
            <div class="form-group p-2">
              <label for="adresse" class="form-label">Adresse complète</label>
              <textarea class="form-control" name="adresse" id="adresse"></textarea>
              <span class="erreur">
                    <?= Util::message("adresse"); ?>
                </span>
            </div>
            <hr />
            <h5 class="card-title">Informations du compte</h5>
            <div class="row p-2">
              <div class="col">
                <label for="username" class="form-label"
                  >Nom d'utilisateur</label
                >
                <input type="text" id="username" name="username" class="form-control" />
                <span class="erreur">
                    <?= Util::message("username"); ?>
                </span>
              </div>
              <div class="col">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" />
                <span class="erreur">
                    <?= Util::message("password"); ?>
                </span>
              </div>
            </div>
            <div class="row m-3">
              <div class="col text-center">
                <button type="submit" class="btn btn-dark">Inscription</button>
                <button type="reset" class="btn btn-secondary mx-2">
                  Recommencer
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>