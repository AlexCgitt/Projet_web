<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/style_login.css">
    <title>Connexion - Saint Quentree</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="./Acceuil.php">
                <img src="../img/logo.png" alt="logo">
            </a>
        </div>
        <ul>
            <li><a href="#">Ajout d'arbres</a></li>
            <li><a href="./visualisation.php">Visualisation</a></li>
            <li><a href="#">Prediction</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="login">
            <a href="./Login.php">log in / log out</a>
        </div>
    </nav>
    
    <main>
        <h1>Connexion</h1>
        <p>Connectez-vous à votre compte afin de pouvoir ajouter des arbres</p>
        <form class="login-form">
            <label for="username">Pseudo</label>
            <input type="text" id="username" name="username" value="user12mickael">
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="password">
            
            <button type="submit">Valider</button>
        </form>
    </main>

    <footer>
        <p class="centre">SAINT-QUENTREE</p>
        <div class="colonnes">
            <div class="colonne">
                <p class="centre">Contact</p>
                <div class="social-icons">
                    <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="image/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="image/youtube.png" alt="YouTube"></a>
                    <a href="#"><img src="image/instagram.png" alt="Instagram"></a>
                </div>
            </div>
            <div class="colonne">
                <p>Adresse</p>
                <p>1 rue des arbres</p>
                <p>02100 Saint-Quentin</p>
        </div>

    </footer>

</body>
</html>
