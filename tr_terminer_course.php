<?php
include "connexion.php";

$course_id = $_POST['course_id'];

$req = mysqli_query($connexion,
"SELECT chauffeur_id FROM courses WHERE course_id='$course_id'");
$data = mysqli_fetch_assoc($req);
$chauffeur_id = $data['chauffeur_id'];

mysqli_query($connexion,
"UPDATE courses SET statut='terminée'
WHERE course_id='$course_id'");

mysqli_query($connexion,
"UPDATE chauffeurs SET disponible=1
WHERE chauffeur_id='$chauffeur_id'");

header("Location: index.php");
?>