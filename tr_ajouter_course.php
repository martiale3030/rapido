<?php
include "connexion.php";

$depart = $_POST['depart'];
$arrivee = $_POST['arrivee'];
$date_heure = $_POST['date_heure'];

$image_name = NULL;

if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

    $dossier = "uploads/";
    $nom_image = time() . "_" . basename($_FILES['image']['name']);
    $chemin = $dossier . $nom_image;

    move_uploaded_file($_FILES['image']['tmp_name'], $chemin);

    $image_name = $nom_image;
}

$requete = "INSERT INTO courses
(point_depart, point_arrivee, date_heure, image_vehicule)
VALUES
('$depart','$arrivee','$date_heure','$image_name')";

mysqli_query($connexion, $requete);

header("Location: index.php");
?>