<?php
include "connexion.php";

$courses = mysqli_query($connexion,
"SELECT * FROM courses WHERE chauffeur_id IS NULL");

$chauffeurs = mysqli_query($connexion,
"SELECT * FROM chauffeurs WHERE disponible=1");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Affecter Chauffeur</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php include("menu.php"); ?>

<div class="container mt-5 pt-5">
<h4 class="mb-4">Affecter un Chauffeur</h4>

<form action="tr_affecter_chauffeur.php" method="POST">

<select name="course_id" class="form-control mb-3">
<?php while($c = mysqli_fetch_assoc($courses)): ?>
<option value="<?= $c['course_id'] ?>">
Course <?= $c['course_id'] ?> - <?= $c['point_depart'] ?>
</option>
<?php endwhile; ?>
</select>

<select name="chauffeur_id" class="form-control mb-3">
<?php while($ch = mysqli_fetch_assoc($chauffeurs)): ?>
<option value="<?= $ch['chauffeur_id'] ?>">
<?= $ch['prenoms'].' '.$ch['nom'] ?>
</option>
<?php endwhile; ?>
</select>

<button class="btn btn-success">Affecter</button>
</form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>