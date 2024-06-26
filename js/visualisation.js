$("#tableau").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "../php/request.php/arbres/" , loadTableau)
})

console.log("visualisation.js")

compt_page = 0 //nombre de page
var treesPerPage = 5; // Nombre d'arbres à afficher par page


function loadTableau(trees) {
    console.log("aaaaaaaaaaaaaaaaaaaa");
    console.log(trees);

    var startIndex = compt_page * treesPerPage;
    var endIndex = startIndex + treesPerPage;
    var slicedTrees = trees.slice(startIndex, endIndex); // Ne prend que les arbres pour la page actuelle

    var html = "<table>";
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
            loadTableau(trees); // Recharger la table avec la nouvelle page
        }
    });

    $("#apres").click(function() {
        if (endIndex < trees.length) {
            compt_page++;
            loadTableau(trees); // Recharger la table avec la nouvelle page
        }
    });
}