<?php
include "connexion.php";

$requete = "SELECT c.*, CONCAT(ch.prenoms,' ',ch.nom) AS chauffeur
            FROM courses c
            LEFT JOIN chauffeurs ch
            ON c.chauffeur_id = ch.chauffeur_id
            ORDER BY c.date_heure DESC";

$execution = mysqli_query($connexion, $requete);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>RAPIDO - Liste</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php include("menu.php"); ?>

<div class="container mt-5 pt-5">

<h4 class="text-primary fw-bold mb-4">Liste des Courses</h4>

<table class="table table-bordered table-hover table-striped align-middle">
<thead class="table-primary">
<tr>
<th>ID</th>
<th>Image</th>
<th>Départ</th>
<th>Arrivée</th>
<th>Date</th>
<th>Chauffeur</th>
<th>Statut</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php while($course = mysqli_fetch_assoc($execution)): ?>
<tr>

<td><?= $course['course_id'] ?></td>

<td class="text-center">
<?php if(!empty($course['image_vehicule'])): ?>
<img src="uploads/<?= htmlspecialchars($course['image_vehicule']) ?>"
     width="80"
     height="60"
     class="img-thumbnail">
<?php else: ?>
<span class="text-muted">Aucune</span>
<?php endif; ?>
</td>

<td><?= htmlspecialchars($course['point_depart']) ?></td>
<td><?= htmlspecialchars($course['point_arrivee']) ?></td>
<td><?= $course['date_heure'] ?></td>
<td><?= $course['chauffeur'] ?? 'Non affecté' ?></td>

<td>
<?php if($course['statut']=="en cours"): ?>
<span class="badge bg-warning text-dark">En cours</span>

<?php elseif($course['statut']=="terminée"): ?>
<span class="badge bg-success">Terminée</span>

<?php else: ?>
<span class="badge bg-secondary">En attente</span>
<?php endif; ?>
</td>

<td>
<a class="btn btn-danger btn-sm"
onclick="return confirm('Etes-vous sûr ?')"
href="supprimer_course.php?id=<?= $course['course_id'] ?>">
Supprimer
</a>
</td>

</tr>
<?php endwhile; ?>

</tbody>
</table>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>