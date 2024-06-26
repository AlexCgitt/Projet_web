<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/style_ajout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>SAINT-QUENTREE - Ajout d'arbre</title>
</head>
<body>
<nav>
        <div class="logo">
            <a href="./Acceuil.php">
                <img src="../img/logo.png" alt="logo">
            </a>
        </div>
        <ul>
            <li><a href="./Ajout.php">Ajout d'arbres</a></li>
            <li><a href="./visualisation.php">Visualisation</a></li>
            <li><a href="./prediction.php">Prediction</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <div class="login">
            <a href="./Login.php">log in / log out</a>
        </div>
    </nav>
    
    <main>
        <div class="title-section">
            <h1>Remplir le formulaire<span class="material-symbols-outlined">forest</span></h1>
            <p>Vous souhaitez ajouter un arbre à notre base de données, n'hésitez pas.</p>
        </div>
        <div class="content-container">
            <div class="form-container">   
                <form action="AjoutDB.php" class="form-block" method="POST"> <!--// mettre un dans action POST car on envoie des données -->
                <form action="AjoutDB.php" class="form-block" method="POST"> <!--// mettre un dans action POST car on envoie des données -->
                    <div class="full-width"> <!-- // on va créer une rangée de 2 colonnes -->
                        <div class="col-half">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" placeholder="3.2932636093638927" class="input-field"/>
                        </div>
                        <div class="col-half">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" placeholder="49.84050020512298" class="input-field"/>
                        </div>
                    </div>
                    <div class="full-width"> <!--// on crée une nouvelle rangée de 2 colonnes -->
                        <div class="col-half">
                            <label for="stade_developpement">Stade Développement</label>
                            <select name="stade_developpement" class="input-field">
                                <option value="Jeune">jeune</option>
                                <option value="Adulte">adulte</option>
                                <option value="vieux">vieux</option>
                                <option value="Jeune">Jeune</option>
                                <option value="Adulte">Adulte</option>
                                <option value="Vieux">vieux</option>
                                <option value="senescent">senescent</option>
                            </select>
                        </div>
                        <div class="col-half">
                            <label for="nom_technique">Nom de la Technique</label>
                            <input type="text" name="nom_technique" placeholder="Smitherton" class="input-field" />     
                        </div>
                    </div>
                    <div class="full-width"> <!--// on crée une nouvelle rangée de 2 colonnes -->
                        <div class="col-half">
                            <label for="nombre_diagnostics">Nombre de Diagnostics</label>
                            <select name="nombre_diagnostics" class="input-field">
                                <option value="1">0.0</option>
                                <option value="2">1.0</option>
                                <option value="3">2.0</option>
                                <option value="4">3.0</option>
                                <option value="5">4.0</option>
                            </select>     
                        </div>
                        <div class="col-half">
                            <label for="hauteur_tronc">Hauteur du Tronc</label>
                            <input type="number" name="hauteur_tronc" placeholder="4.0" class="input-field" />     
                        </div>
                    </div>
                    <div class="full-width"> <!--// on crée une nouvelle rangée de 2 colonnes -->
                        <div class="col-half">
                            <label for="diametre_tronc">Diamètre du Tronc</label>
                            <input type="number" name="diametre_tronc" placeholder="37.0" class="input-field" />     
                        </div>
                        <div class="col-half">
                            <label for="hauteur_totale">Hauteur Totale</label>
                            <input type="number" name="hauteur_totale" placeholder="11.0" class="input-field" />     
                        </div>
                    </div>
                    <div class="full-width">
                        <div class="col-full">
                            <label for="feuillage">Feuillage</label>
                            <select name="feuillage" class="input-field">
                                <option value="feuillu">Feuillu</option>
                                <option value="conifere">Conifère</option>
                                <option value="feuillu">Feuillu</option>
                                <option value="conifere">Conifère</option>
                            </select>
                        </div>
                    </div>
                    <div class="full-width">
                        <div class="col-full">
                            <input class="btn btn-submit" type="submit" value="Valider">
                        </div>
                    </div>
                </form>  
            </div>
            <div class="image-container">
                <img src="../img/flowers.jpg" alt="Description de l'image">
            </div>
        </div>
    </main>
    
    <footer>
        <p class="centre">SAINT-QUENTREE</p>
        <div class="colonnes">
            <div class="colonne">
                <p class="centre">Contact</p>
                <div class="social-icons">
                    <a class="facebook" href="https://www.facebook.com/villedesaintquentin.OFFICIEL/?locale=fr_FR"><i class="fa-brands fa-facebook"></i></a>
                    <a class="twitter" href="https://x.com/a_saint_quentin"><i class="fa-brands fa-twitter"></i></a>
                    <a class="insta" href="https://www.instagram.com/villesaintquentin/"><i class="fa-brands fa-instagram"></i></a>
                    <a class="internet" href="https://www.saint-quentin.fr/"><i class="fa-brands fa-internet-explorer"></i></a>   
                </div>
            </div>
            <div class="colonnes">
                <div id="map" style="width: 50%; height: 30vh;"></div>
            </div>
            <div class="colonne">
                <p>Adresse</p>
                <p>1 rue des arbres</p>
                <p>02100 Saint-Quentin</p>
            </div>
        </div>
    </footer>
    <script>var data = [{
                type: 'scattermapbox',
            }];var layout = {
    mapbox: {style: 'open-street-map', center: {lat: 49.847066, lon: 3.2874}, zoom: 12},
    margin: {r: 0, t: 0, l: 0, b: 0}
    }; Plotly.newPlot('map', data, layout);</script>
</body>
</html>
