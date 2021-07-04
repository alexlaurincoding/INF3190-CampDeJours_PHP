      <!-- Modal Ajouter un enfant -->
      <div
        class="modal fade"
        id="ajouterEnfant"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
      >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ajouter un enfant</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?=Util::getChemin()?>/parent/ajouterEnfant" enctype="multipart/form-data">
              <div class="row pt-2">
                <div class="col text-center">
                  <input
                    type="file"
                    accept="image/*"
                    name="photoEnfant"
                    id="uploadChild"
                    onchange="loadFile(event)"
                    style="display: none"
                  />
                  <label for="uploadChild" style="cursor: pointer" class="form-label">
                    <img
                      id="uploadChildImg"
                      width="150"
                      src="../../public/img/profil.png"
                      class="rounded"
                    />
                    <p>Photo de l'enfant</p>
                    <span class="erreur"><?= Util::message("photoEnfant"); ?></span>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"
                      >Prénom:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="prenomEnfant"
                      name="prenomEnfant"
                    />
                  </div>
                  <span class="erreur"><?= Util::message("prenomEnfant"); ?></span>
                </div>
                <div class="form-group col">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"
                      >Nom:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="nomEnfant"
                      name="nomEnfant"
                    />
                    <span class="erreur"><?= Util::message("nomEnfant"); ?></span>
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <label for="example-date-input" class="form-label"
                    >Date de naissance</label
                  >
                  <div class="col-10">
                    <input
                      class="form-control"
                      type="date"
                      id="dateNaissanceEnfant"
                      name="dateNaissanceEnfant"
                    />
                    <span class="erreur"><?= Util::message("dateNaissanceEnfant"); ?></span>
                  </div>
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
              <button type="submit" class="btn btn-dark">Ajouter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- FIN Modal Ajouter un enfant -->