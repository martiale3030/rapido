<?php
include "connexion.php";

$id = $_GET['id'];

mysqli_query($connexion,
"DELETE FROM courses WHERE course_id='$id'");

header("Location: index.php");
?>