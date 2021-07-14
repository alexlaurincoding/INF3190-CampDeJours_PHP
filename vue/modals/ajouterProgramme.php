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
            <form method="post" action="<?=Util::getChemin()?>/admin/creeProgramme">
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
                    name="gabarit_programme"
                    value="<?=$gabaritProgramme->getId()?>"
                  />
                  <label class="form-check-label" for="<?=$gabaritProgramme->getId() ?>"
                    ><?=$gabaritProgramme->getTitre() ?></label
                  >
                </div>
<?php
} 
?>
              <span class="erreur"><?= Util::message("gabaritProgramme"); ?></span>
              <label for="message-text" class="col-form-label">Session :</label>
              <select class="form-control" name="session">
              <option disabled selected>Session</option>
<?php
 $sessions = GestionProgrammeDAO::getSessions();
foreach($sessions as $session){
?> 
                
                <option value="<?=$session->getId()?>"><?=$session->getNom()?></option>
<?php
} 
?>
              </select>
              <span class="erreur"><?= Util::message("session"); ?></span>
              <label for="message-text" class="col-form-label"
                >Numéros de semaine :</label
              >
              <div>
                <div class="form-check form-check-inline px-0">
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-1"
                    name="semaine1"
                    value="1"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-1"
                    >01</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-2"
                    name="semaine2"
                    value="2"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-2"
                    >02</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-3"
                    name="semaine3"
                    value="3"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-3"
                    >03</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-4"
                    name="semaine4"
                    value="4"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-4"
                    >04</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-5"
                    name="semaine5"
                    value="5"
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
                    name="semaine6"
                    value="6"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-6"
                    >06</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-7"
                    name="semaine7"
                    value="7"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-7"
                    >07</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-8"
                    name="semaine8"
                    value="8"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-8"
                    >08</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-9"
                    name="semaine9"
                    value="9"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-9"
                    >09</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-10"
                    name="semaine10"
                    value="10"
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
                    name="semaine11"
                    value="11"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-11"
                    >11</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-12"
                    name="semaine12"
                    value="12"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-12"
                    >12</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-13"
                    name="semaine13"
                    value="13"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-13"
                    >13</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-14"
                    name="semaine14"
                    value="14"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-14"
                    >14</label
                  >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-15"
                    name="semaine15"
                    value="15"
                    autocomplete="off"
                  />
                  <label class="btn btn-outline-secondary" for="btn-check-15"
                    >15</label
                  >
                </div>
              </div>
              <span class="erreur"><?= Util::message("semaine"); ?></span>
              <div class="form-group">
                <label for="message-text" class="col-form-label"
                  >Animateurs :</label
                >
                <textarea class="form-control" id="message-text" name="animateur"></textarea>
              </div>
              <hr />
              <h5>Activités</h5>

              <div id="select-activite-programme">
                <input type="hidden" name="nbActivitesProgramme" id="nbActivitesProgramme">
              </div>
              <span class="erreur"><?= Util::message("activite"); ?></span>
              <div id="ajouterProgrammeForm"></div>
            </form>
            <div class="col-md-12 text-center margin-auto mt-3">
            <button class="btn btn-secondary" id="rmActiviteProg" hidden="true">
                Retirer une activite -
              </button>
              <button class="btn btn-secondary" id="addActiviteProgramme">
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