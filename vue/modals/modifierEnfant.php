<!-- Modal Modifier Bart -->
      <div
        class="modal fade"
        id="modifierEnfant<?=$enfantModif->getId()?>"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
      >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modifier un enfant</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?=Util::getChemin()?>/parent/modifierEnfant/<?=$enfantModif->getId()?>" enctype="multipart/form-data">
              <div class="row pt-2">
                <div class="col text-center">
                  <input
                    type="file"
                    accept="image/*"
                    name="photoEnfant"
                    id="uploadEnfant<?=$enfantModif->getId()?>"
                    onchange="loadFile(event)"
                    style="display: none"
                  />
                  <label for="uploadEnfant<?=$enfantModif->getId()?>" style="cursor: pointer" class="form-label">
                    <img
                      id="uploadEnfant<?=$enfantModif->getId()?>Img"
                      width="150"
                      src="<?=Util::getChemin()?>/<?=$enfantModif->getPhotoProfil()?>"
                      class="rounded"
                    />
                    <p>
                        Photo de <?=$enfantModif->getPrenom()?><br>
                        <span class="erreur"><?= Util::message("photoEnfantModif" . $enfantModif->getId()); ?></span>
                    </p>
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
                      name="prenomEnfant"
                      value="<?=$enfantModif->getPrenom()?>"
                    />
                    <span class="erreur"><?= Util::message("prenomEnfantModif" . $enfantModif->getId()); ?></span>
                  </div>
                </div>
                <div class="form-group col">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"
                      >Nom:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      name="nomEnfant"
                      value="<?=$enfantModif->getNom()?>"
                    />
                    <span class="erreur"><?= Util::message("nomEnfantModif" . $enfantModif->getId()); ?></span>
                  </div>
                </div>
                <div class="form-group row mt-3">
                  <label for="example-date-input" class="form-label"
                    >Date de naissance</label
                  >
                  <div class="col-6">
                    <input
                      class="form-control"
                      type="date"
                      value="<?=$enfantModif->getDateDeNaissance()?>"
                      name="dateNaissanceEnfant"
                    />
                    <span class="erreur"><?= Util::message("dateNaissanceEnfantModif" . $enfantModif->getId()); ?></span>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <label class="form-label">Notes</label>
                  <textarea class="form-control" name="notesEnfant"><?=$enfantModif->getNotes()?></textarea>
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
              <button type="submit" class="btn btn-dark">Modifier</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- FIN Modal Modifier Bart -->