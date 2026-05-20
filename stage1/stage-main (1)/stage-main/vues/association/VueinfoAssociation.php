<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes informations d'association</title>
    <link rel="stylesheet" href="association.css">
</head>
<body>

<form method="POST" action="index.php?page=infoAssociation">
  <h2>Mes coordonnées d'association</h2>

  <label for="nom_association">Nom de l'association :</label>
  <input type="text" name="nom_association" id="nom_association" value="<?= htmlspecialchars($assoc['nom_association'] ?? '') ?>" required />

  <label for="numero_recepisse">Numéro récépissé :</label>
  <input type="text" name="numero_recepisse" id="numero_recepisse" value="<?= htmlspecialchars($assoc['numero_recepisse'] ?? '') ?>" />

  <label for="date_parution_jo">Date parution JO :</label>
  <input type="date" name="date_parution_jo" id="date_parution_jo" value="<?= htmlspecialchars($assoc['date_parution_jo'] ?? '') ?>" />

  <label for="numero_insee">Numéro INSEE :</label>
  <input type="text" name="numero_insee" id="numero_insee" value="<?= htmlspecialchars($assoc['numero_insee'] ?? '') ?>" />

  <label for="objet_association">Objet de l'association :</label>
  <input type="text" name="objet_association" id="objet_association" value="<?= htmlspecialchars($assoc['objet_association'] ?? '') ?>" />

  <label for="adresse_siege_social">Adresse du siège social :</label>
  <input type="text" name="adresse_siege_social" id="adresse_siege_social" value="<?= htmlspecialchars($assoc['adresse_siege_social'] ?? '') ?>" />

  <label for="code_postal_siege_social">Code postal :</label>
  <input type="text" name="code_postal_siege_social" id="code_postal_siege_social" value="<?= htmlspecialchars($assoc['code_postal_siege_social'] ?? '') ?>" />

  <label for="commune_siege_social">Commune :</label>
  <input type="text" name="commune_siege_social" id="commune_siege_social" value="<?= htmlspecialchars($assoc['commune_siege_social'] ?? '') ?>" />

  <label for="telephone_siege_social">Téléphone :</label>
  <input type="text" name="telephone_siege_social" id="telephone_siege_social" value="<?= htmlspecialchars($assoc['telephone_siege_social'] ?? '') ?>" />

  <label for="email_siege_social">Email :</label>
  <input type="email" name="email_siege_social" id="email_siege_social" value="<?= htmlspecialchars($assoc['email_siege_social'] ?? '') ?>" />

  <div class="btn-group">
    <a class="btn cancel" href="index.php?page=accueilAsso">
      <i class="fas fa-times"></i> Annuler
    </a>
    <button type="submit" class="btn">
      <i class="fas fa-arrow-right"></i> Suivant
    </button>
  </div>
</form>

</body>
</html>