<!-- Modal Créer un bloc d'activité -->
    <div
      class="modal fade"
      id="creerBlocActiviteModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer un bloc d'activité</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"
                  >Nom du bloc d'activité:</label
                >
                <input type="text" class="form-control" id="nomBlocActivite" name="nomBlocActivite" />
              </div>
              <hr />
              <h5>Types d'activités</h5>
              <div class="form-check form-check-inline mt-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="inlineCheckbox1"
                  value="option1"
                />
                <label class="form-check-label" for="inlineCheckbox1"
                  >Sport</label
                >
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="inlineCheckbox2"
                  value="option2"
                />
                <label class="form-check-label" for="inlineCheckbox2"
                  >Art</label
                >
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="inlineCheckbox3"
                  value="option3"
                />
                <label class="form-check-label" for="inlineCheckbox3"
                  >Science</label
                >
              </div>
              <hr />
              <h5>Activités</h5>
              <select class="form-control" name="activite1">
                <option disabled selected>Activités</option>
                <option>Soccer</option>
                <option>Piano</option>
                <option>Théâtre</option>
                <option disabled>
                  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
                </option>
                <option disabled>Blocs d'activités</option>
                <option>Activités sportives</option>
                <option>Activités artistiques</option>
              </select>
              <div id="ajouterBlocActiviteForm"></div>
            <div class="col-md-12 text-center margin-auto mt-3">
              <button class="btn btn-secondary" id="addActiviteBloc">
                Ajouter une activité +
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-light border"
              data-bs-dismiss="modal"
            >
              Fermer
            </button>
            <input type="hidden" id="nbActivites" name="nbActivites" value="1">
            <button type="submit" class="btn btn-secondary">Créer</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN Modal Créer un bloc d'activité -->