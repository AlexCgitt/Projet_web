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
            <img src="image/logo.png" alt="logo">
        </div>
        <ul>
            <li><a href="#">Ajout d'arbres</a></li>
            <li><a href="#">Visualisation</a></li>
            <li><a href="#">Prediction</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="login">
            <a href="#">log in / log out</a>
        </div>
    </nav>
    
    <main>
        <h1>Connexion</h1>
        <p>Connectez-vous à votre compte afin de pouvoir ajouter des arbres</p>
        <form class="login-form">
            <label for="username">pseudo</label>
            <input type="text" id="username" name="username" value="user12mickael">
            
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="password">
            
            <button type="submit">Submit</button>
        </form>
    </main>

    <footer>
        <div class="contact-info">
            <p>Contact</p>
            <div class="social-icons">
                <a href="#"><img src="image/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="image/linkedin.png" alt="LinkedIn"></a>
                <a href="#"><img src="image/youtube.png" alt="YouTube"></a>
                <a href="#"><img src="image/instagram.png" alt="Instagram"></a>
            </div>
            <p>&copy; Saint Quentree</p>
        </div>
        <div class="map" id="map"></div>
    </footer>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var saintQuentin = {lat: 49.8489, lng: 3.2876};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: saintQuentin
            });
            var marker = new google.maps.Marker({
                position: saintQuentin,
                map: map
            });
        }
    </script>
</body>
</html>
