$("#tableau").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "../php/request.php/arbres/" , loadTableau)
})

console.log("visualisation.js")

var keys = ['id_arbre', 'longitude', 'latitude', 'nom_stadedev', 'nomtech', 'clc_nbr_diag', 'haut_tot', 'haut_tronc', 'tronc_diam', 'nom_feuillage'];

var fieldOptions = '';
keys.forEach(function(key) {
    fieldOptions += '<option value="' + key + '">' + key + '</option>';
});

var html = '<span>Trier par: </span><select id="sortField">' + fieldOptions + '</select>';
html += '<span>Par ordre: </span><select id="sortOrder"><option value="asc">Croissant</option><option value="desc">Décroissant</option></select>';
html += '<button id="trier">Trier</button>';

$("#filtres").html(html);

compt_page = 0 //nombre de page
var treesPerPage = 5; // Nombre d'arbres à afficher par page


function loadTableau(trees_original) {
    

    console.log(trees_original);
    //copie le tableau trees
    trees = trees_original.slice();
    console.log(trees);

    compt_page = 0 //nombre de page
    var treesPerPage = 5; // Nombre d'arbres à afficher par page
    

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
    $("#tableau_load").append("<button id='avant'>Avant</button><button id='apres'>Après</button>");

    // Gestion des clics sur les boutons de pagination
    $("#avant").click(function() {
        if (compt_page > 0) {
            compt_page--;
            loadTableau(trees_original); // Recharger la table avec la nouvelle page
        }
    });

    $("#apres").click(function() {
        if (endIndex < trees.length) {
            compt_page++;
            loadTableau(trees_original); // Recharger la table avec la nouvelle page
        }
    });

    // Écouteur d'événements pour les sélections de tri
    $("#trier").click(function() {
        loadTableau(trees_original); // Recharger le tableau avec les nouvelles options de tri
    });
}