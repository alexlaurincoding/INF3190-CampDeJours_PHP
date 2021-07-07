<!-- Modal Type Activite -->
    <div
      class="modal fade"
      id="creerTypeModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer un type d'activité</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?=Util::GetChemin()?>/admin/creerTypeActivite">
              <div>
                <div class="form-group">
                  <label for="nom-type-activite" class="col-form-label"
                    >Nom du type d'activité :</label
                  >
                  <input type="text" class="form-control" id="nom-type-activite" name="nomTypeActivite" />
                  <span class="erreur"><?=Util::message("nomTypeActivite")?></span>
                </div>
              </div>

              <div>
                <div class="form-group">
                  <label for="description-type-activite" class="col-form-label"
                    >Description :</label
                  >
                  <input type="text" class="form-control" id="description-type-activite" name="descriptionTypeActivite" />
                  <span class="erreur"><?=Util::message("descriptionTypeActivite")?></span>
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
<!-- FIN Modal Type Activite -->