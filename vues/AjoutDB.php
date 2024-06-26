<?php
$servername = "localhost";
$username = "etu1122";
$password = "qikqpbvw";
$dbname = "etu1122";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

# Récupération des valeurs du formulaire
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$stade_developpement = $_POST['stade_developpement'];
$nom_technique = $_POST['nom_technique'];
$nombre_diagnostics = $_POST['nombre_diagnostics'];
$hauteur_tronc = $_POST['hauteur_tronc'];
$diametre_tronc = $_POST['diametre_tronc'];
$hauteur_totale = $_POST['hauteur_totale'];
$feuillage = $_POST['feuillage'];


# Récupération des ID de la table Stadedev
$sql1 = "SELECT id_stadedev FROM Stadedev WHERE nom_stadedev = '$stade_developpement'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $id_stadedev = $row1['id_stadedev'];
} else {die("Erreur lors de la récupération de l'ID du stade de développement.");}

# Récupération des ID de la table NomTech
$sql2 = "SELECT id_nomtech FROM NomTech WHERE nomtech = '$nom_technique'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $id_nomtech = $row2['id_nomtech'];
} else {die("Erreur lors de la récupération de l'ID du stade de développement.");}

# Récupération des ID de la table Feuillage
$sql3 = "SELECT id_feuillage FROM Feuillage WHERE nom_feuillage = '$feuillage'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {   
    $row3 = $result3->fetch_assoc();
    $id_feuillage = $row3['id_feuillage'];
} else {die("Erreur lors de la récupération de l'ID du stade de développement.");}

# Requêtre pour ajouter un arbre
$sql = "INSERT INTO Arbre (longitude, latitude, id_stadedev, id_nomtech, clc_nbr_diag, haut_tronc, tronc_diam, haut_tot, id_feuillage, remarquable, revetement, identifiant, id_port, id_villeca, id_pied, id_situation, id_arbreetat, id_secteur, id_quartier)
        VALUES ('$longitude', '$latitude', '$id_stadedev', '$id_nomtech', '$nombre_diagnostics', '$hauteur_tronc', '$diametre_tronc', '$hauteur_totale', '$id_feuillage', 'Non', 'Non', 'user1', '1', '1', '1', '1', '1', '1', '1')";

if ($conn->query($sql) === TRUE) {
    echo "Les données ont été ajoutées avec succès.";
} else {echo "Erreur : " . $conn->error;}

$conn->close();
?>
