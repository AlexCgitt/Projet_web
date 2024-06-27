$("#tableau").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "../php/request.php/arbres/" , loadTableau)
    $('#map-container').hide();
    $('#tableau_load').show();
    $('#recherche').show();
    $('#filtres').show();
})

console.log("visualisation.js")

// à mettre dans ta fonction load tableau pour que ce ne soit pas affiché comme de la merde au

var keys = ['id_arbre', 'longitude', 'latitude', 'nom_stadedev', 'nomtech', 'clc_nbr_diag', 'haut_tot', 'haut_tronc', 'tronc_diam', 'nom_feuillage'];

var fieldOptions = '';
keys.forEach(function(key) {
    fieldOptions += '<option value="' + key + '">' + key + '</option>';
});

var html = '<span>Trier par: </span><select id="sortField">' + fieldOptions + '</select>';
html += '<span>Par ordre: </span><select id="sortOrder"><option value="asc">Croissant</option><option value="desc">Décroissant</option></select>';
html += '<button id="trier" class="ok">Trier</button>';

$("#filtres").html(html);

compt_page = 0 //nombre de page
var treesPerPage = 5; // Nombre d'arbres à afficher par page


function loadTableau(trees_original) {
    // console.log(trees_original);
    //copie le tableau trees
    trees = trees_original.slice();
    console.log(trees);    

    // Application du tri en fonction des options sélectionnées
    var sortField = $("#sortField").val();
    var sortOrder = $("#sortOrder").val();

    //trie le tableau trees dans l'ordre du sortOrder, à partir de la colonne sortField
    trees.sort(function(a, b) {
        // Si nous trions par 'id_arbre', convertissons les valeurs en nombres
        if (sortField === 'id_arbre') {
            // Convertir en entiers pour comparer numériquement
            return (sortOrder === 'asc' ? 1 : -1) * (parseInt(a[sortField]) - parseInt(b[sortField]));
        }
    
        // Pour les autres champs, continuez avec le tri lexicographique
        if (a[sortField] < b[sortField]) {
            return sortOrder === 'asc' ? -1 : 1;
        }
        if (a[sortField] > b[sortField]) {
            return sortOrder === 'asc' ? 1 : -1;
        }
        return 0;
    });
    

    var startIndex = compt_page * treesPerPage;
    var endIndex = startIndex + treesPerPage;
    var slicedTrees = trees.slice(startIndex, endIndex); // Ne prend que les arbres pour la page actuelle
    html = ""
    html += "<table>";
    // rajoute la ligne titre avec les differentes colonnes
    html += "<tr>";
    keys.forEach(function(key) {
        html += "<th>"+key+"</th>";
    });
    html += "<th>Action</th>";
    html += "</tr>";


    slicedTrees.forEach(function(tree) {
        html += "<tr>";
        html += "<td>"+tree.id_arbre+"</td>";
        html += "<td>"+tree.longitude+"</td>";
        html += "<td>"+tree.latitude+"</td>";
        html += "<td>"+tree.nom_stadedev+"</td>";
        html += "<td>"+tree.nomtech+"</td>";
        html += "<td>"+tree.clc_nbr_diag+"</td>";
        html += "<td>"+tree.haut_tot+"</td>";
        html += "<td>"+tree.haut_tronc+"</td>";
        html += "<td>"+tree.tronc_diam+"</td>";
        html += "<td>"+tree.nom_feuillage+"</td>";
        html += "<td><button id_arbre="+ tree.id_arbre + ">predire age</button></td>";
        html += "</tr>";
    });
    html += "</table>";

    $("#tableau_load").html(html);

    // Ajout des boutons de navigation de pagination
    $("#tableau_load").append("<button id='avant' class='ok'>Avant</button><button id='apres' class='ok'>Après</button>");

    // Gestion des clics sur les boutons de pagination
    $("#avant").click(function() {
        if (compt_page > 0) {
            console.log(compt_page)

            compt_page--;
            loadTableau(trees_original); // Recharger la table avec la nouvelle page
        }
    });

    $("#apres").click(function() {
        if (endIndex < trees.length) {
            console.log(compt_page)

            compt_page++;
            loadTableau(trees_original); // Recharger la table avec la nouvelle page
        }
    });

    // Écouteur d'événements pour les sélections de tri
    $("#trier").click(function() {
        compt_page=0;
        loadTableau(trees_original); // Recharger le tableau avec les nouvelles options de tri
    });

    
}


$("#carte").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "../php/request.php/arbres/" , loadCarte)
    $('#map-container').show();
    $('#tableau_load').hide();
    $('#recherche').hide();
    $('#filtres').hide();
})



function loadCarte(trees) {
    const latitude = trees.map(tree => parseFloat(tree.latitude));
    const longitude = trees.map(tree => parseFloat(tree.longitude));

    var data = [{
        type: 'scattermapbox',
        lat: latitude,
        lon: longitude,
        mode: 'markers',
        marker: {size: 10, color: 'green'}
    }];

    var layout = {
        mapbox: {
            style: 'open-street-map', 
            center: {lat: 49.847066, lon: 3.2874}, 
            zoom: 12
        },
        margin: {r: 0, t: 0, l: 0, b: 0}
    };

    Plotly.newPlot('map2', data, layout);

    // Affichez la carte et masquez les autres éléments si nécessaire
    
}

$("#tableau_carte").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "../php/request.php/arbres/" , LoadAll)
})

function LoadAll(trees){
    loadTableau(trees)
    loadCarte(trees)

    $('#recherche').show();
    $('#filtres').show();
    $('#tableau_load').show();
    $('#map-container').show();
}

// Gestion des clics sur les boutons de prediction de l'age
$("#tableau_load").on("click", "button", function() {
    console.log("click age")
    var id_arbre = $(this).attr("id_arbre");
    window.location.href = "../vues/prediction_age.php?id_arbre=" + id_arbre;
});