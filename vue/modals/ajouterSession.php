<!-- Modal Créer Session -->
    <div
      class="modal fade"
      id="creerSessionModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer une session</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
          <form method="post" action="<?=Util::getChemin()?>/admin/creerSession">
            <div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"
                  >Nom de la session :</label
                >
                <input type="text" class="form-control" id="recipient-name" name="nomSession" />
                <span class="erreur"><?= Util::message("nomSession"); ?></span>
              </div>
            </div>

            <div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"
                  >Description :</label
                >
                <input type="text" class="form-control" id="recipient-name" name="descriptionSession"/>
                <span class="erreur"><?= Util::message("descriptionSession"); ?></span>
              </div>
            </div>

            <hr />

            <div>
              <h5>Dates</h5>
            </div>

            <div class="form-group row mt-3">
              <label for="example-date-input" class="form-label"
                >Premiere journée :</label
              >
              <div class="col-12">
                <input
                  class="form-control"
                  type="date"
                  id="example-date-input"
                  name="premiereJournee"
                />
                <span class="erreur"><?= Util::message("premiereJournee"); ?></span>
              </div>
            </div>

            <div class="form-group row mt-3">
              <label for="example-date-input" class="form-label"
                >Derniere journée :</label
              >
              <div class="col-12">
                <input
                  class="form-control"
                  type="date"
                  id="example-date-input"
                  name="derniereJournee"
                />
                <span class="erreur"><?= Util::message("derniereJournee"); ?></span>
              </div>
            </div>

            <div class="modal-footer mt-4">
              <button
                type="button"
                class="btn btn-light border"
                data-bs-dismiss="modal"
              >
                Fermer
              </button>
              <button type="submit" class="btn btn-secondary">Créer</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN Modal Session -->