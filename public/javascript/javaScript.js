/**
 *Charger la photo de profil
 **/
var loadFile = function (event) {
  var image = document.getElementById(event.target.id + "Img");
  image.src = URL.createObjectURL(event.target.files[0]);
};

/**
 * Login
 */
function login() {
  let username = document.getElementById("username");
  if (username.value == "admin") {
    window.location.replace("inscription_admin.html");
  } else {
    window.location.replace("tableau_bord_parent.html");
  }
}

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
