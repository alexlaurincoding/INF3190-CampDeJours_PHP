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
<?php
  $i= 0;
  foreach ($viewmodel->getTypesActivite() as $typeActivite) {
?>
              <div class="form-check form-check-inline mt-2">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="<?=$typeActivite->getId()?>"
                  name="typeActivite<?= ++$i ?>"
                  value="<?=$typeActivite->getId()?>"
                />
                <label class="form-check-label" for="<?=$typeActivite->getId()?>"><?=$typeActivite->getNom()?></label>
              </div>

<?php } echo '<input type="hidden" name="nbTypesActivite" value="' . $i . '>' ?>

              <hr />
              <h5>Activités</h5>
              <select class="form-control" name="activite1">
<?php 
  $i = 0;
  foreach ($viewmodel->getActivites() as $activite) {
?>
                <option value="<?=$activite->getId()?>"><?=$activite->getNom()?></option>
<?php } ?>
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