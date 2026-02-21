<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter Course</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php include("menu.php"); ?>

<div class="container mt-5 pt-5">
<h4 class="text-primary mb-4">Ajouter une Course</h4>

<form action="tr_ajouter_course.php" 
      method="POST" 
      enctype="multipart/form-data">

<div class="mb-3">
<input type="text" name="depart"
class="form-control"
placeholder="Point de départ" required>
</div>

<div class="mb-3">
<input type="text" name="arrivee"
class="form-control"
placeholder="Point d'arrivée" required>
</div>

<div class="mb-3">
<input type="datetime-local" name="date_heure"
class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label fw-bold">
Image du véhicule
</label>
<input type="file" name="image"
class="form-control"
accept="image/*">
</div>

<button class="btn btn-primary">Ajouter</button>

</form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>