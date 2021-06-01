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
  tableauInscription.appendChild(document.createElement("thead"));
  var tr = tableauInscription.insertRow(-1); // colonnes

  for (var i = 0; i < colonnes.length; i++) {
    var th = document.createElement("th"); // Header
    th.innerHTML = colonnes[i];
    tr.appendChild(th);
  }

  // ADD JSON DATA TO THE TABLE AS ROWS.
  for (var i = 0; i < inscriptionJSON.length; i++) {
    tr = tableauInscription.insertRow(-1);

    for (var j = 0; j < colonnes.length; j++) {
      var tabCell = tr.insertCell(-1);
      tabCell.innerHTML = inscriptionJSON[i][colonnes[j]];
    }
  }

  // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
  var divContainer = document.getElementById("showData");
  divContainer.innerHTML = "";
  divContainer.appendChild(tableauInscription);
}
