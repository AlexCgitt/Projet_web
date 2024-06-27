$(document).ready(function() {
    // Gestion des clics sur "Tableau des arbres"
    $("#tableau").click(function(event) { 
        console.log("click")
        ajaxRequest("GET", "../php/request.php/arbres/", loadTableau)
    });

    // Gestion des clics sur "Carte avec les arbres"
    $("#carte").click(function(event) { 
        console.log("click")
        ajaxRequest("GET", "../php/request.php/arbres/", loadCarte)
    });

    // Gestion des clics sur "Tableau et carte avec nos arbres"
    $("#tableau_carte").click(function(event) { 
        console.log("click")
        ajaxRequest("GET", "../php/request.php/arbres/", loadAll)
    });

    function loadTableau(trees) {
        var keys = ['id_arbre', 'longitude', 'latitude', 'nom_stadedev', 'nomtech', 'clc_nbr_diag', 'haut_tot', 'haut_tronc', 'tronc_diam', 'nom_feuillage'];

        var fieldOptions = '';
        keys.forEach(function(key) {
            fieldOptions += '<option value="' + key + '">' + key + '</option>';
        });

        var html = '<span>Trier par: </span><select id="sortField">' + fieldOptions + '</select>';
        html += '<span>Par ordre: </span><select id="sortOrder"><option value="asc">Croissant</option><option value="desc">Décroissant</option></select>';
        html += '<button id="trier">Trier</button>';

        $("#filtres").html(html);

        var compt_page = 0;
        var treesPerPage = 5; // Nombre d'arbres à afficher par page

        function renderTable() {
            // Copie du tableau trees
            var sortedTrees = trees.slice();

            // Application du tri en fonction des options sélectionnées
            var sortField = $("#sortField").val();
            var sortOrder = $("#sortOrder").val();

            // Trie le tableau trees dans l'ordre du sortOrder, à partir de la colonne sortField
            sortedTrees.sort(function(a, b) {
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
            var slicedTrees = sortedTrees.slice(startIndex, endIndex); // Ne prend que les arbres pour la page actuelle

            var html = "<table>";
            // Ajoute la ligne titre avec les différentes colonnes
            html += "<tr>";
            keys.forEach(function(key) {
                html += "<th>" + key + "</th>";
            });
            html += "<th>Action</th>";
            html += "</tr>";

            slicedTrees.forEach(function(tree) {
                html += "<tr>";
                html += "<td>" + tree.id_arbre + "</td>";
                html += "<td>" + tree.longitude + "</td>";
                html += "<td>" + tree.latitude + "</td>";
                html += "<td>" + tree.nom_stadedev + "</td>";
                html += "<td>" + tree.nomtech + "</td>";
                html += "<td>" + tree.clc_nbr_diag + "</td>";
                html += "<td>" + tree.haut_tot + "</td>";
                html += "<td>" + tree.haut_tronc + "</td>";
                html += "<td>" + tree.tronc_diam + "</td>";
                html += "<td>" + tree.nom_feuillage + "</td>";
                html += "<td><button id_arbre=" + tree.id_arbre + ">predire age</button></td>";
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
                    renderTable();
                }
            });

            $("#apres").click(function() {
                if (endIndex < trees.length) {
                    compt_page++;
                    renderTable();
                }
            });

            // Écouteur d'événements pour les sélections de tri
            $("#trier").click(function() {
                compt_page = 0;
                renderTable();
            });

            $('#map-container').hide();
            $('#tableau_load').show();
            $('#recherche').show();
            $('#filtres').show();
        }

        renderTable();
    }

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
        $('#map-container').show();
        $('#tableau_load').hide();
        $('#recherche').hide();
        $('#filtres').hide();
    }

    function loadAll(trees) {
        loadTableau(trees);
        loadCarte(trees);

        $('#recherche').show();
        $('#filtres').show();
        $('#tableau_load').show();
        $('#map-container').show();
    }
});
