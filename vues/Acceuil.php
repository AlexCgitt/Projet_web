<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/style_acceuil.css">
    <title>SAINT-QUENTREE</title>
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
            <div>
                <h1>SAINT-QUENTREE</h1>
                <p>Description du site</p>
            </div>
            <img src="../img/saint_quentree.png">
        </div>
        <section class="grid-container">
            <div class="grid-item">
                <a href="./Ajout.php">
                    <img src="../img/ajout.jpg" alt="Ajout d'arbres">
                </a>
                <h2>Ajout d'arbres</h2>
                <p>Vous venez de planter un arbre, ajoutez-le au site</p>  
            </div>
            <div class="grid-item">
                <a href="visualisation.php">
                    <img src="../img/visu.jpg" alt="Visualisation">
                </a>
                <h2>Visualisation</h2>
                <p>Visualisez les arbres de la ville de Saint-Quentin dans un tableau ou sur une carte.</p>
                
            </div>
            <div class="grid-item">
                <a href="./prediction.php">
                    <img src="../img/prediction.jpg" alt="Prediction">
                </a>
                <h2>Prediction</h2>
                <p>Prédisez l'emplacement des arbres et leur cluster.</p>
                
            </div>
            <div class="grid-item">
                <a href="./contact.php">
                    <img src="../img/contact.jpg" alt="Contact">
                </a>
                <h2>Contact</h2>
                <p>En cas de problème, n'hésitez pas à contacter l'équipe.</p>
            </div>
        </section>
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
