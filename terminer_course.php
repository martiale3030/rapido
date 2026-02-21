<?php
include "connexion.php";

$courses = mysqli_query($connexion,
"SELECT * FROM courses WHERE statut='en cours'");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Terminer Course</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php include("menu.php"); ?>

<div class="container mt-5 pt-5">
<h4 class="mb-4">Terminer une Course</h4>

<form action="tr_terminer_course.php" method="POST">

<select name="course_id" class="form-control mb-3">
<?php while($c = mysqli_fetch_assoc($courses)): ?>
<option value="<?= $c['course_id'] ?>">
Course <?= $c['course_id'] ?>
</option>
<?php endwhile; ?>
</select>

<button class="btn btn-warning">Terminer</button>
</form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>