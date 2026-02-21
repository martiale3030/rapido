<?php
include "connexion.php";

$course_id = $_POST['course_id'];
$chauffeur_id = $_POST['chauffeur_id'];

mysqli_query($connexion,
"UPDATE courses SET chauffeur_id='$chauffeur_id',
statut='en cours' WHERE course_id='$course_id'");

mysqli_query($connexion,
"UPDATE chauffeurs SET disponible=0
WHERE chauffeur_id='$chauffeur_id'");

header("Location: index.php");
?>