<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "rapido";

$connexion = mysqli_connect($host, $user, $password, $database);

if (!$connexion) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>