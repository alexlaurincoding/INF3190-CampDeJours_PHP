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
  var modal = new bootstrap.Modal(document.getElementById(modalName));
  modal.show();
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

  //generer l'id des radio buttons du modal ajouterProgramme
  function genererIdRbGabaritProgramme(){
    static var i = 1;
    var id = "inlineRadio" + i;
    i++;
    return id;
  }
 

/**
 * Créer un bloc d'activité
 */
let ajouterBlocActiviteform = document.getElementById(
  "ajouterBlocActiviteForm"
);
let nbActivitesInputHidden = document.getElementById("nbActivites");
let nbActiviteBloc = 1;
const NB_MAXIMUM_ACTIVITE_BLOC = 6;
$("#addActiviteBloc").click(function (e) {
  let activites = "";
  e.preventDefault();
  nbActiviteBloc++;
  nbActivitesInputHidden.value = nbActiviteBloc;
  let nouvelleActivite = '<div class="form-group mt-2">';
  nouvelleActivite +=
    '<select class="form-control" name="activite' + nbActiviteBloc + '">';
  window.viewmodel.activites.forEach((activite) => {
    activites +=
      "<option value='" + activite.id + "'>" + activite.nom + "</option>";
  });
  nouvelleActivite += activites;

  nouvelleActivite += "</select>";
  nouvelleActivite += "</div>";
  ajouterBlocActiviteform.innerHTML += nouvelleActivite;
  if (nbActiviteBloc == NB_MAXIMUM_ACTIVITE_BLOC) {
    let button = document.getElementById("addActiviteBloc");
    button.disabled = true;
  }
});
