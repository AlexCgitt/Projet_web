$("#tableau").click(function (event) { 
    console.log("click")
    ajaxRequest("GET", "php/request.php/arbres/" , loadTableau)
})

function loadTableau(trees){
    console.log(trees)

    var html = "<table>";
    trees.forEach(function(tree){
        html += "<tr>";
        html += "<td>"+tree.id_arbre+"</td>";
        html += "<td>"+tree.longitude+"</td>";
        html += "<td>"+tree.latitude+"</td>";
        html += "<td>"+tree.nom_stadedev+"</td>";
        html += "<td>"+tree.nomtech+"</td>";
        html += "<td>"+tree.clc_nbr_diag+"</td>";
        html += "<td>"+haut_tot+"</td>";
        html += "<td>"+haut_tronc+"</td>";
        html += "<td>"+tronc_diam+"</td>";
        html += "<td>"+haut_tronc+"</td>";
        html += "<td>"+nom_feuillage+"</td>";
        html += "</tr>";
    })
    $("#tableau_load").html(html)
}