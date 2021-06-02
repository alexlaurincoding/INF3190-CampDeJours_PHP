/**
 * Load Header
 **/
$("#nav-placeholder").load("titlebar.html");

/**
 * Load Footer
 **/
$("#footer-placeholder").load("footer.html");

/**
 * Generation du tableau Inscription Admin
 */

window.onload = function () {
  if (createTableFromJSON()) {
    $("#table_admin").DataTable({
      order: [
        [2, "des"],
        [4, "asc"],
      ],
      rowGroup: {
        dataSrc: 2,
      },
      pageLength: 15,
      lengthMenu: [
        [15, 50, -1],
        [15, 50, "Tous"],
      ],
    });
  }
};

//extraction du fichier JSON
var inscriptionJSON = (function () {
  var json = null;
  $.ajax({
    async: false,
    global: false,
    url: "/javascript/inscriptions.json",
    dataType: "json",
    success: function (data) {
      json = data;
    },
  });
  return json;
})();

function createTableFromJSON() {
  //Extraction des valeur pour les entetes
  var colonnes = [];
  for (var i = 0; i < inscriptionJSON.length; i++) {
    for (var key in inscriptionJSON[i]) {
      if (colonnes.indexOf(key) === -1) {
        colonnes.push(key);
      }
    }
  }

  //Creation du tableau
  var tableauInscription = document.createElement("table");
  $(tableauInscription).addClass("table");
  $(tableauInscription).addClass("table-hover");
  $(tableauInscription).addClass("table-sm");
  $(tableauInscription).attr("id", "table_admin");
  var thead = document.createElement("thead");
  $(thead).addClass("thead-dark");
  tableauInscription.appendChild(thead);
  var tr = thead.insertRow(-1); // colonnes

  for (var i = 0; i < colonnes.length; i++) {
    var th = document.createElement("th"); // Header
    th.innerHTML = colonnes[i];
    tr.appendChild(th);
  }
  //ajout du tag <tbody> pour les fonctionnalite bootstrap
  var tbody = tableauInscription.appendChild(document.createElement("tbody"));
  // ajout des rangee a partir du fichier json
  for (var i = 0; i < inscriptionJSON.length; i++) {
    tr = tbody.insertRow(-1);

    for (var j = 0; j < colonnes.length; j++) {
      var tabCell = tr.insertCell(-1);
      //creation d'un lien cliquable
      var valeur = inscriptionJSON[i][colonnes[j]];
      tabCell.innerHTML =
        '<a href="#" onClick="alert(\'' +
        valeur +
        "')\">" +
        inscriptionJSON[i][colonnes[j]] +
        "</a>";
    }
  }

  // Ajout du tableau dans un container
  var divContainer = document.getElementById("showTableauAdmin");
  if (divContainer != null) {
    divContainer.innerHTML = "";
    divContainer.appendChild(tableauInscription);
    return true;
  }
  return false;
}
