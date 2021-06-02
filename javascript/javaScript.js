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
  var thead = document.createElement("thead");
  $(thead).addClass("thead-dark");
  tableauInscription.appendChild(thead);
  var tr = thead.insertRow(-1); // colonnes

  for (var i = 0; i < colonnes.length; i++) {
    var th = document.createElement("th"); // Header
    th.innerHTML = colonnes[i];
    tr.appendChild(th);
  }
  var tbody = tableauInscription.appendChild(document.createElement("tbody"));
  // ajout des rangee a partir du fichier json
  for (var i = 0; i < inscriptionJSON.length; i++) {
    tr = tbody.insertRow(-1);

    for (var j = 0; j < colonnes.length; j++) {
      var tabCell = tr.insertCell(-1);

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
  var divContainer = document.getElementById("showData");
  divContainer.innerHTML = "";
  divContainer.appendChild(tableauInscription);
}
