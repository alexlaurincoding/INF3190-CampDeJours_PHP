/**
 *Charger la photo de profil
 **/
var loadFile = function (event) {
  var image = document.getElementById(event.target.id + "Img");
  image.src = URL.createObjectURL(event.target.files[0]);
};

/**
 * Ouvrir une modale si son nom est mentionné dans l'url après le controlleur et l'action "/controlleur/action/modal"
 */
window.onload = function () {
  var url = window.location.href;
  var urlPath = url.split("/");
  var modalName = urlPath[urlPath.length - 1];
  if (modalName.toLowerCase().includes("modal")) {
    var modal = new bootstrap.Modal(document.getElementById(modalName));
    modal.show();
  }
  ajouterSelectActiviteProgramme();
  ajouterSelectActiviteBloc();
  ajouterListenersSurTypesCheckbox();
};

/**
 * Changer le texte du bouton voir plus voir moins
 */
function voirplus(btn) {
  let monBouton = btn;
  if (monBouton.innerText != "Réduire") {
    monBouton.innerText = "Réduire";
  } else {
    monBouton.innerText = btn.dataset.text;
  }
}

/**
 * Créer un bloc d'activité
 */
var ajouterBlocActiviteform = $("#ajouterBlocActiviteForm");
let nbActivitesBlocHidden = document.getElementById("nbActivitesBloc");
var nbActivitesBloc = 0;
const NB_MAXIMUM_ACTIVITE_BLOC = 6;

$("#addActiviteBloc").click((e) => {
  e.preventDefault();
  ajouterSelectActiviteBloc();
});

function ajouterSelectActiviteBloc() {
  nbActivitesBloc++;
  nbActivitesBlocHidden.value = nbActivitesBloc;
  ajouterBlocActiviteform.append(creerSelectActiviteBloc(nbActivitesBloc));
  toggleBoutonRetirerActiviteBloc();
  toggleBoutonAjoutActiviteBloc();
}

$("#rmActiviteBloc").click((e) => {
  e.preventDefault();
  retirerActiviteBloc();
});

function retirerActiviteBloc() {
  var elem = document.getElementById("activiteBloc" + nbActivitesBloc);
  elem.parentNode.removeChild(elem);
  nbActivitesBloc--;
  document.getElementById("nbActivitesBloc").value = nbActivitesBloc;
  toggleBoutonRetirerActiviteBloc();
  toggleBoutonAjoutActiviteBloc();
}

function toggleBoutonAjoutActiviteBloc() {
  let button = document.getElementById("addActiviteBloc");
  if (nbActivitesBloc >= NB_MAXIMUM_ACTIVITE_BLOC) {
    button.disabled = true;
  } else {
    button.disabled = false;
  }
}

function toggleBoutonRetirerActiviteBloc() {
  if (nbActivitesBloc > 1) {
    $("#rmActiviteBloc").attr("hidden", false);
  } else {
    $("#rmActiviteBloc").attr("hidden", true);
  }
}

function remplacerActivitesBloc() {
  let nb = nbActivitesBloc;
  for (i=0; i< nb; i++) {
    retirerActiviteBloc();
  }
  for (i=0; i< 1; i++) {
    ajouterSelectActiviteBloc();
  }
}

function ajouterListenersSurTypesCheckbox() {
  let checkboxTypes = document.getElementsByClassName("type-activite");
  Array.from(checkboxTypes).forEach(function(element) {
      element.addEventListener('click', remplacerActivitesBloc);
    });
}

function creerSelectActiviteBloc(nbActivitesBloc) {
  let nouvelleActivite =
    '<div class="form-group mt-2" id="activiteBloc' + nbActivitesBloc + '">';
  nouvelleActivite +=
    '<select class="form-control" name="activite' + nbActivitesBloc + '">';
  if (getIdTypesChoisis().length == 0) {
    nouvelleActivite += "<option disabled selected> Veuillez choisir un type d'activité </option>";
  } else if (filtrerActivitesSelonTypesChoisis().length == 0) {
    nouvelleActivite += "<option disabled selected> Aucune activité disponible pour les types d'activité sélectionnés  </option>";
  } else {
    filtrerActivitesSelonTypesChoisis().forEach((activite) => {
      nouvelleActivite += "<option value='" + activite.id + "'>" + activite.nom + "</option>";
    });
  }
  nouvelleActivite += "</select>";
  nouvelleActivite += "</div>";
  return nouvelleActivite;
}

function getIdTypesChoisis() {
  let types = document.getElementsByClassName("type-activite");
  let typesChoisis = Array.from(types)
    .filter( type => type.checked)
    .map(typeChoisi => typeChoisi.value);
  return typesChoisis;
}

function filtrerActivitesSelonTypesChoisis() {
  let idTypesChoisis = getIdTypesChoisis();
  return viewmodel.activites
    .filter(activite => idTypesChoisis.includes(activite.idTypeActivite));
}

function validerFormAjoutBloc() {
  let estValide = true;
  let selects = document.getElementById("ajouterBlocActiviteForm").getElementsByTagName("select")
  let valeurs = Array.from(selects)
    .map(s => s.value);
  if (hasDuplicates(valeurs)) {
    estValide = false;
    document.getElementById("erreurActiviteBloc").innerText = "Les activités ne peuvent pas être répétées";
  }
  return estValide;
}

function hasDuplicates(array) {
  valeurs = [];
  contientDoublon = false;
  array.forEach( (val) => {
    if (valeurs.indexOf(val) !== -1) {
      contientDoublon = true;
    }
    valeurs.push(val);
  });
  return contientDoublon;
}

/**
 * ajouter des activites de programme
 */

var selectsActiviteProgramme = $("#select-activite-programme");
var nbActivitesProgramme = 0;
const NB_MAXIMUM_ACTIVITE_PROGRAMME = 6;

$("#addActiviteProgramme").click((e) => {
  e.preventDefault();
  ajouterSelectActiviteProgramme();
});

function ajouterSelectActiviteProgramme() {
  nbActivitesProgramme++;
  document.getElementById("nbActivitesProgramme").value = nbActivitesProgramme;
  selectsActiviteProgramme.append(
    creerSelectActiviteProgramme(nbActivitesProgramme)
  );
  toggleBoutonAjoutActiviteProgramme();
  toggleBoutonRetirerActiviteProgramme();
}

$("#rmActiviteProg").click((e) => {
  e.preventDefault();
  var activite = document.getElementById("activiteProgramme" + nbActivitesProgramme);
  activite.parentNode.removeChild(activite);
  nbActivitesProgramme--;
  document.getElementById("nbActivitesProgramme").value = nbActivitesProgramme;
  toggleBoutonRetirerActiviteProgramme();
  toggleBoutonAjoutActiviteProgramme();
});

function toggleBoutonRetirerActiviteProgramme() {
  if (nbActivitesProgramme > 1) {
    $("#rmActiviteProg").attr("hidden", false);
  } else {
    $("#rmActiviteProg").attr("hidden", true);
  }
}

function toggleBoutonAjoutActiviteProgramme() {
  let bouton = document.getElementById("addActiviteProgramme");
  if (nbActivitesProgramme >= NB_MAXIMUM_ACTIVITE_PROGRAMME) {
    bouton.disabled = true;
  } else {
    bouton.disabled = false;
  }
}

function creerSelectActiviteProgramme(noActivite) {
  let selectActivite =
    `<div id="activiteProgramme` +
    noActivite +
    `" class="row mt-2">
    <div class="form-group col-md-10">
      <select class="form-control" name="activite` +
    noActivite +
    `">
        <option disabled selected>Activités</option>`;
  window.viewmodel.activites.forEach((activite) => {
    selectActivite +=
      `<option value="` + activite.id + `">` + activite.nom + `</option>`;
  });
  selectActivite += `<option disabled>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</option>
        <option disabled value="aucuneValeur" >Blocs d'activités</option>`;
  window.viewmodel.blocsActivite.forEach((bloc) => {
    selectActivite +=
      `<option value="` + bloc.id + `">` + bloc.nom + `</option>`;
  });
  selectActivite +=
    `</select>
    </div> 
    <div class="form-group col-md-2">
      <input
        id="heuresActivite` +
    noActivite +
    `"
        type="text"
        class="form-control"
        placeholder="0h"
        name="heuresActivite` +
    noActivite +
    `"
      />
    </div>
  </div>`;
  return selectActivite;
}
