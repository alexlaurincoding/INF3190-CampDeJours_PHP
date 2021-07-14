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
let nbActivitesInputHidden = document.getElementById("nbActivites");
var nbActivitesBloc = nbActivitesInputHidden.value;
const NB_MAXIMUM_ACTIVITE_BLOC = 6;
$("#addActiviteBloc").click((e) => {
  e.preventDefault();
  nbActivitesBloc++;
  ajouterBlocActiviteform.append(ajouterActiviteBloc(nbActivitesBloc));
  console.log(nbActivitesBloc);
  toggleBouttonRetirerActiviteBloc();
});

function toggleBouttonRetirerActiviteBloc() {
  if (nbActivitesBloc > 1) {
    $("#rmActiviteBloc").attr("hidden", false);
  } else {
    $("#rmActiviteBloc").attr("hidden", true);
  }
}

function ajouterActiviteBloc(nbActivitesBloc) {
  let nouvelleActivite = '<div class="form-group mt-2">';
  nouvelleActivite +=
    '<select class="form-control" id="activite' +
    nbActivitesBloc +
    '" name="activite' +
    nbActivitesBloc +
    '">';
  window.viewmodel.activites.forEach((activite) => {
    nouvelleActivite +=
      "<option value='" + activite.id + "'>" + activite.nom + "</option>";
  });
  nouvelleActivite += "</select>";
  nouvelleActivite += "</div>";

  if (nbActivitesBloc == NB_MAXIMUM_ACTIVITE_BLOC) {
    let button = document.getElementById("addActiviteBloc");
    button.disabled = true;
  }
  return nouvelleActivite;
}

$("#rmActiviteBloc").click((e) => {
  e.preventDefault();
  var elem = document.getElementById("activite" + nbActivitesBloc);
  elem.parentNode.removeChild(elem);
  nbActivitesBloc--;
  toggleBouttonRetirerActiviteBloc();
});

var selectsActiviteProgramme = $("#select-activite-programme");
var nbActivitesProgramme = 0;
const NB_MAXIMUM_ACTIVITE_PROGRAMME = 6;

$("#addActiviteProgramme").click((e) => {
  e.preventDefault();
  ajouterSelectActiviteProgramme();
  toggleBouttonRetirerActiviteProg();
});

function ajouterSelectActiviteProgramme() {
  nbActivitesProgramme++;
  selectsActiviteProgramme.append(
    creerSelectActiviteProgramme(nbActivitesProgramme)
  );
  document.getElementById("nbActivitesProgramme").value = nbActivitesProgramme;
  if (nbActivitesProgramme >= NB_MAXIMUM_ACTIVITE_PROGRAMME) {
    document.getElementById("addActiviteProgramme").disabled = true;
  }
}

function creerSelectActiviteProgramme(noActivite) {
  let selectActivite =
    `<div id="activite` +
    noActivite +
    `" class="row mt-2">
    <div class="form-group col-md-10">
      <select class="form-control" name="activite` +
    noActivite +
    `">
        <option disabled value="aucuneValeur" selected>Activités</option>`;
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

$("#rmActiviteProg").click((e) => {
  e.preventDefault();

  var activite = document.getElementById("activite" + nbActivitesProgramme);
  activite.parentNode.removeChild(activite);
  nbActivitesProgramme--;
  toggleBouttonRetirerActiviteProg();
});

function toggleBouttonRetirerActiviteProg() {
  console.log("activite" + nbActivitesProgramme);
  if (nbActivitesProgramme > 1) {
    $("#rmActiviteProg").attr("hidden", false);
  } else {
    $("#rmActiviteProg").attr("hidden", true);
  }
}
