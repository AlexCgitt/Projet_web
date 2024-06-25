<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/style_ajout.css">
    <title>SAINT-QUENTREE - Ajout d'arbre</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="../img/logo.png" alt="logo">
        </div>
        <ul>
            <li><a href="./Ajout.php">Ajout d'arbres</a></li>
            <li><a href="./visualisation.php">Visualisation</a></li>
            <li><a href="./prediction">Prediction</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
        <div class="login">
            <a href="./Login.php">log in / log out</a>
        </div>
    </nav>
    
    <main>
        <div class="form-container">   
            <form action="" class="form-block"> <!--// mettre un dans action POST car on envoie des données -->
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
                            <option value="feuillu">feuillu</option>
                            <option value="conifere">conifère</option>
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
    </main>
    
    <footer>
        <p class="centre">SAINT-QUENTREE</p>
        <div class="colonnes">
            <div class="colonne">
                <p>Contact</p>
                <p>instagram</p>
                <p>facebook</p>
                <p>twitter</p>
            </div>
            <div class="colonne">
                <p>Adresse</p>
                <p>1 rue des arbres</p>
                <p>02100 Saint-Quentin</p>

        </div>
    </footer>
</body>
</html>
