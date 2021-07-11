<!-- Modal Activite Debut -->
    <div
      class="modal fade"
      id="creerActiviteModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Créer une activité</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?=Util::GetChemin()?>/admin/creerActivite">
              <div class="form-group">
                <label for="nomActivite" class="col-form-label">Nom de l'activité:</label>
                <input type="text" class="form-control" id="nomActivite" name="nomActivite"/>
                <span class="erreur"><?=Util::message("nomActivite")?></span>
              </div>
              <hr />

              <!-- h5 ou label?? -->
              <h5>Type d'activité</h5>
              <label for="idTypeActivite">Type d'activité</label>
              <!-- h5 ou label?? -->
              <select class="form-control" id="idTypeActivite" name="idTypeActivite">
                <option disabled selected>Choisir</option>
<?php 
//on fait cette meme operation getTypesActivite() dans la page gestion_programme. Il y a surement moyen de ne pas dupliquer l'appel a la BD
$typesActivite = GestionProgrammeDAO::getTypesActivite();
foreach ($typesActivite as $type) {
?>
                <option value=<?=$type->getId()?>> 
                  <?=$type->getNom()?>
                </option>
<?php 
}
?>
              </select>
              <span class="erreur"><?=Util::message("idTypeActivite")?></span>

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
    <!-- FIN Modal Activite -->
