var tableauCree = createTableFromJSON();

if (tableauCree) {
  var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  $("#table_admin").DataTable({
    order: [
      [2, "des"],
      [4, "asc"],
    ],
    rowGroup: {
      dataSrc: 2,
    },
    pageLength: 15,
    language: {
      lengthMenu: "Montrer _MENU_ Resultats",
      info: "Page _PAGE_ de _PAGES_",
      search: "Rechercher ",
      oPaginate: { sNext: "Suivant", sPrevious: "Précédant" },
    },

    lengthMenu: [
      [15, 50, -1],
      [15, 50, "Tous"],
    ],
  });
}

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
  tableauInscription.classList.add("table", "table-hover", "table-sm", "py-3");
  tableauInscription.id = "table_admin";
  var thead = document.createElement("thead");
  thead.classList.add("table-dark");
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
    var tr = tbody.insertRow(-1);
    tr.setAttribute("value", i);
    tr.onclick = function () {
      onClickTableauAdmin(this.getAttribute("value"));
    };
    tr.classList.add("clicable");
    tr.setAttribute("data-bs-toggle", "tooltip");
    tr.setAttribute("data-bs-placement", "left");
    tr.setAttribute("title", "clicker pour plus d'info");
    for (var j = 0; j < colonnes.length; j++) {
      var tabCell = tr.insertCell(-1);
      if (j < colonnes.length - 1) {
        tabCell.innerHTML = inscriptionJSON[i][colonnes[j]];
      } else if (inscriptionJSON[i][colonnes[j]] == 1) {
        tabCell.innerHTML =
          '<i id="icone_paye" class="fas fa-check-circle" style="text-color:white"> </i>';
      } else {
        tabCell.innerHTML =
          '<i id="icone_impaye" class="fas fa-times-circle"></i>';
      }
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

function onClickTableauAdmin(index) {
  var parent = (function () {
    for (var i = 0; i < parents.length; i++) {
      if (parents[i].id === inscriptionJSON[index].Parent) {
        return parents[i];
      }
    }
  })();
  var enfant = (function () {
    for (var i = 0; i < enfants.length; i++) {
      if (enfants[i].id === inscriptionJSON[index].Enfant) {
        return enfants[i];
      }
    }
  })();
  var photoEnfant = document.getElementById("modal_inscription_image_enfant");
  photoEnfant.setAttribute("src", "../" + enfant.photo);
  document
    .getElementById("modal_inscription_image_parent")
    .setAttribute("src", "../" + parent.photo);
  document.getElementById("modal_nom_parent").innerHTML = parent.nom;
  document.getElementById("modal_prenom_parent").innerHTML = parent.prenom;
  document.getElementById("modal_courriel_parent").innerHTML = parent.courriel;
  document.getElementById("modal_adresse_parent").innerHTML = parent.adresse;
  document.getElementById("modal_date_naiss_parent").innerHTML =
    parent.dateNaissance;
  parent.dateDeNaissance;
  document.getElementById("modal_nom_enfant").innerHTML = enfant.nom;
  document.getElementById("modal_prenom_enfant").innerHTML = enfant.prenom;
  document.getElementById("modal_date_naiss_enfant").innerHTML =
    enfant.dateNaissance;
  document.getElementById("modal_programme_enfant").innerHTML =
    inscriptionJSON[index].Programme;
  $("#detail_inscription_modal").modal("show");
}
