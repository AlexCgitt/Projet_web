<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['username']);
}

function requireLogin() {
    echo "le petit chat est passé par la";
    if (!isset($_SESSION['username']))
    header("Location: Login.php");
}
?>
