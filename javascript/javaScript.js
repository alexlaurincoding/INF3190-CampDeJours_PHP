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
