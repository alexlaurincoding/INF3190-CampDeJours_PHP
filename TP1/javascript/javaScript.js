/**
 * Load Header
 **/
$("#nav-placeholder").load("navbar.html");
/**
 * Load Footer
 **/
$("#footer-placeholder").load("footer.html");

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

function loadModal() {
  var modalModifParent = document.getElementById("modifierProfil");
  console.log("yoooooooooooooooooooo");
  modalModifParent.show();
}
