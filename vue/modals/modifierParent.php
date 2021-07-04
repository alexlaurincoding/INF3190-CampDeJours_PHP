      <!-- Modal Modifier Profil -->
      <div
        class="modal fade"
        id="modifierProfil"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
      >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modifier Profil</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?=Util::getChemin()?>/utilisateur/modification" enctype="multipart/form-data">
                <div class="row pt-2">
                  <div class="col text-center">
                    <input
                      type="file"
                      accept="image/*"
                      name="photoProfil"
                      id="uploadHomer"
                      onchange="loadFile(event)"
                      style="display: none"
                    />
                    <label
                      for="uploadHomer"
                      style="cursor: pointer"
                      class="form-label"
                    >
                      <img
                        id="uploadHomerImg"
                        width="150"
                        src="<?=Util::getChemin() . '/'.  $parent->getPhotoProfil()?>"
                        class="rounded"
                      />
                      <p>Photo de profil<br>
                        <span class="erreur"><?= Util::message("photoProfil"); ?></span>
                      </p>
                    </label>
                  </div>
                </div>
                <div class="row px-2">
                  <div class="col">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input
                      type="text"
                      id="prenom"
                      name="prenom"
                      class="form-control"
                      value="<?=$parent->getPrenom()?>"
                    />
                    <span class="erreur"><?= Util::message("prenom"); ?></span>
                  </div>
                  <div class="col">
                    <label for="nom" class="form-label">Nom</label>
                    <input
                      type="text"
                      id="nom"
                      name="nom"
                      class="form-control"
                      value="<?=$parent->getNom()?>"
                    />
                    <span class="erreur"><?= Util::message("nom"); ?></span>
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col">
                    <label for="emailemail" class="form-label">Email</label>
                    <input
                      type="email"
                      name="email"
                      class="form-control"
                      id="inputEmail3"
                      value="<?=$parent->getCourriel()?>"
                    />
                    <span class="erreur"><?= Util::message("email"); ?></span>
                  </div>
                  <div class="col">
                    <label for="ddn" class="form-label"
                      >Date de naissance</label
                    >
                    <input
                      type="date"
                      id="ddn"
                      name="dateNaissance"
                      class="form-control"
                      value="<?=$parent->getDateDeNaissance()?>"
                    />
                    <span class="erreur"><?= Util::message("dateNaissance"); ?></span>
                  </div>
                </div>
                <div class="form-group p-2">
                  <label for="adresse" class="form-label">Adresse complète</label>
                  <textarea class="form-control" id="adresse" name="adresse"><?=$parent->getAdresse()?></textarea>
                  <span class="erreur"><?= Util::message("adresse"); ?></span>
                </div>
                <hr />
                <h5 class="card-title">Informations du compte</h5>
                <div class="row p-2">
                  <div class="col">
                    <label for="username" class="form-label"
                      >Nom d'utilisateur</label>
                    <input
                      type="text"
                      id="username"
                      name="username"
                      class="form-control disabled"
                      disabled
                      value="<?=$_SESSION['username']?>"
                    />
                    <span class="erreur"><?= Util::message("username"); ?></span>
                  </div>
                  <div class="col">
                    <label for="password" class="form-label"
                      >Changer mot de passe</label>
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="form-control"
                      placeholder=""
                    />
                    <span class="erreur"><?= Util::message("password"); ?></span>
                  </div>
                </div>
              
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Fermer
              </button>
              <input type="submit" value="Modifier" class="btn btn-dark">
            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- FIN Modal Modifier Profil -->