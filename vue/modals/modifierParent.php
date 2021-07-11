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
              <form method="post" action="<?=Util::getChemin()?>/utilisateur/modification">
                <div class="row pt-2">
                  <div class="col text-center">
                    <input
                      type="file"
                      accept="image/*"
                      name="image"
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
                      <p>Photo de profil</p>
                      <span class="erreur">
                    <?= Util::message("photoProfil"); ?>
                </span></p> 
                    </label>
                  </div>
                </div>
                <div class="row px-2">
                  <div class="col">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input
                      type="text"
                      id="prenom"
                      class="form-control"
                      value="<?=$parent->getPrenom()?>"
                    />
                  </div>
                  <div class="col">
                    <label for="nom" class="form-label">Nom</label>
                    <input
                      type="text"
                      id="nom"
                      class="form-control"
                      value="<?=$parent->getNom()?>"
                    />
                  </div>
                </div>
                <div class="row p-2">
                  <div class="col">
                    <label for="emailemail" class="form-label">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="inputEmail3"
                      value="<?=$parent->getCourriel()?>"
                    />
                  </div>
                  <div class="col">
                    <label for="ddn" class="form-label"
                      >Date de naissance</label
                    >
                    <input
                      type="date"
                      id="ddn"
                      class="form-control"
                      value="<?=$parent->getDateDeNaissance()?>"
                    />
                  </div>
                </div>
                <div class="form-group p-2">
                  <label for="adresse" class="form-label">Adresse complète</label>
                  <textarea class="form-control" id="adresse"><?=$parent->getAdresse()?></textarea>
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
                      class="form-control disabled"
                      disabled
                      value="<?=$_SESSION['username']?>"
                    />
                  </div>
                  <div class="col">
                    <label for="password" class="form-label"
                      >Changer mot de passe</label>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      placeholder=""
                    />
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