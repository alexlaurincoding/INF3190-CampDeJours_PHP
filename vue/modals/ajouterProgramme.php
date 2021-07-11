 <!-- Modal Créer un programme -->
 <div
      class="modal fade"
      id="creerProgrammeModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer un programme</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <label for="message-text" class="col-form-label"
                >Gabarit de programme :</label
              >
              <div class="mb-2">
<?php
 $gabaritsProgramme = GestionProgrammeDAO::getGabaritsProgramme();
foreach($gabaritsProgramme as $gabaritProgramme){
?>            
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="inlineRadioOptions"
                    id="<?=$gabaritProgramme->getId() ?>"
                    value="<?=$gabaritProgramme->getId() ?>"
                  />
                  <label class="form-check-label" for="<?=$gabaritProgramme->getId() ?>"
                    ><?=$gabaritProgramme->getTitre() ?></label
                  >
                </div>
<?php
} 
?>
              <label for="message-text" class="col-form-label">Session :</label>
              <select class="form-control" name="activite1">
                <option disabled selected>Session</option>
                <option>Session 2021</option>
                <option>Session 2020</option>
                <option>Session 2019</option>
              </select>

              <label for="message-text" class="col-form-label"
                >Numéros de semaine :</label
              >
              <div>
                <div class="form-check form-check-inline px-0">
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-1"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-1"
                    >01</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-2"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-2"
                    >02</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-3"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-3"
                    >03</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-4"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-4"
                    >04</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-5"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-5"
                    >05</label
                  >
                </div>
                <br />
                <div class="form-check form-check-inline px-0 mt-1">
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-6"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-6"
                    >06</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-7"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-7"
                    >07</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-8"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-8"
                    >08</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-9"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-9"
                    >09</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-10"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-10"
                    >10</label
                  >
                </div>
                <br />
                <div class="form-check form-check-inline px-0 mt-1">
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-11"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-11"
                    >11</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-12"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-12"
                    >12</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-13"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-13"
                    >13</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-14"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-14"
                    >14</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-15"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-15"
                    >15</label
                  >
                </div>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label"
                  >Animateurs :</label
                >
                <textarea class="form-control" id="message-text"></textarea>
              </div>
              <hr />
              <h5>Activités</h5>

              <div class="row">
                <div class="form-group col-md-10">
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
                </div>
                <div class="form-group col">
                  <input
                    type="text"
                    class="form-control"
                    id="heures"
                    placeholder="0h"
                  />
                </div>
              </div>
              <div id="ajouterProgrammeForm"></div>
            </form>
            <div class="col-md-12 text-center margin-auto mt-3">
              <button class="btn btn-secondary" id="addActivite">
                Ajouter une activité +
              </button>
            </div>
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
            <button type="button" class="btn btn-secondary">Créer</button>
          </div>
        </div>
      </div>
    </div>
    <!--FIN Modal Créer un programme -->