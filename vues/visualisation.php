<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/style_visu.css">
    <title>SAINT-QUENTREE - Visualisation</title>
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
            <li><a href="./visualisation">Visualisation</a></li>
            <li><a href="./prediction">Prediction</a></li>
            <li><a href="./contact">Contact</a></li>
        </ul>
        <div class="login">
            <a href="./Login.php">log in / log out</a>
        </div>
    </nav>
    
    <main>
        <div class="title-section">
            <h1>Visualisation <span class="material-symbols-outlined">forest</span></h1>
            <p>Visualisé les différents arbres de Saint Quentin en haut de france, pes</p>
        </div>
        <section class="display-choice">
            <h2>Choisissez l’affichage que vous souhaitez.</h2>
            <div class="grid-container">
                <div id="tableau" class="grid-item">
                    <img src="../img/tableau_arbre.jpg" alt="Tableau des arbres">
                    <h3>Tableau des arbres</h3>
                    <p>Click</p>
                </div>
                <div id="carte" class="grid-item">
                    <img src="../img/carte_arbre.jpg" alt="Carte avec les arbres">
                    <h3>Carte avec les arbres</h3>
                    <p>Click</p>
                </div>
                <div id="tableau_carte" class="grid-item">
                    <img src="../img/tableau_carte_arbre.jpg" alt="Tableau et carte avec nos arbres">
                    <h3>Tableau et carte avec nos arbres</h3>
                    <p>Click</p>
                </div>
            </div>
        </section>
        <div id="recherche"></div>
        <div id="filtres"></div>
        <div id="tableau_load"></div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/Ajax.js"></script>
    <script src="../js/visualisation.js"></script>
</body>
</html>
