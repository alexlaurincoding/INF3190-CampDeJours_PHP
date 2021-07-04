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

window.onload = function () {
  var url = window.location.href;
  var urlPath = url.split("/");
  //si l'url contient plus de 7 champs, cela veux dire que un modal est appeler. ex: https://localhost/camps_des_nerds/INF3190_Travail_de_session/parent/index/modifierProfil
  if (urlPath.length > 7) {
    var modal = urlPath[urlPath.length - 1];
    var myModal = new bootstrap.Modal(document.getElementById(modal));

    myModal.show();
  }
};
