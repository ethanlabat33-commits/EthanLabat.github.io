<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes informations d'association</title>
    <link rel="stylesheet" href="association.css">
</head>
<body>

<form method="POST" action="index.php?page=infoAssociation">
  <h2>information sur l'activite</h2>

  <label for="nom">description de l'activite :</label>
  <input type="text" name="description_activite" id="nom" value="<?= htmlspecialchars($assoc['description_activite'] ?? '') ?>" required>

<a class="btn" href="index.php?page=accueilAsso"><i class="fas fa-plus-circle"></i> Annuler</a>
<a class="btn" href="index.php?page=infoAssociation"><i class="fas fa-plus-circle"></i> retour</a>
<a class="btn" href="index.php?page=infoManif"><i class="fas fa-plus-circle"></i> suivant</a>

</form>

</body>
</html>
