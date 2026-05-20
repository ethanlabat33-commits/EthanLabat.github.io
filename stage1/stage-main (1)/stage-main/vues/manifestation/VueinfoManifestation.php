<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes informations de manifestation</title>
  <link rel="stylesheet" href="manifestation.css">
</head>
<body>

<form method="POST" action="index.php?page=infoManifestation">
  <h2>Mes informations de manifestation</h2>

  <label for="date_manifestation">Date de la manifestation :</label>
  <input type="date" name="date_manifestation" id="date_manifestation" value="<?= htmlspecialchars($manifestation['date_manifestation'] ?? '') ?>" required />

  <label for="nom_manifestation">Nom de la manifestation :</label>
  <input type="text" name="nom_manifestation" id="nom_manifestation" value="<?= htmlspecialchars($manifestation['nom_manifestation'] ?? '') ?>" required />

  <label for="statut_manifestation">Statut de la manifestation :</label>
  <input type="text" name="statut_manifestation" id="statut_manifestation" value="<?= htmlspecialchars($manifestation['statut_manifestation'] ?? '') ?>" />

  <label for="genre">Genre :</label>
  <input type="text" name="genre" id="genre" value="<?= htmlspecialchars($manifestation['genre'] ?? '') ?>" />

  <label for="NombreEntre">Nombre d'entrées :</label>
  <input type="number" name="NombreEntre" id="NombreEntre" value="<?= htmlspecialchars($manifestation['NombreEntre'] ?? '') ?>" min="0" />

  <label for="resultatFinancier">Résultat financier (€) :</label>
  <input type="number" step="0.01" name="resultatFinancier" id="resultatFinancier" value="<?= htmlspecialchars($manifestation['resultatFinancier'] ?? '') ?>" />

  <label for="id_dossier">ID du dossier :</label>
  <input type="number" name="id_dossier" id="id_dossier" value="<?= htmlspecialchars($manifestation['id_dossier'] ?? '') ?>" required />

  <div class="btn-group">
    <a class="btn cancel" href="index.php?page=#">
      <i class="fas fa-times"></i> Annuler
    </a>
    <button type="submit" class="btn">
      <i class="fas fa-arrow-right"></i> Suivant
    </button>
  </div>
</form>

</body>
</html>
