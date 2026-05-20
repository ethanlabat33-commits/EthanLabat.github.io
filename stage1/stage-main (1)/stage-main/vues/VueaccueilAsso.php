<?php  require_once __DIR__ . '/../config/accesDonnees.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil Association</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="association.css">
</head>
<body>

<header>
  <div class="logo"><i class="fas fa-home"></i> Ma Mairie</div>
  <div class="actions">
    <a href="index.php?page=login" style="color:white"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
  </div>
</header>

<main>
  <h1>🎉 Bienvenue !</h1>

  <p>📌 Ici vous pouvez :</p>
  <ul>
    <li>✅ Créer un nouveau dossier de subvention</li>
    <li>📂 Consulter l’historique de vos demandes</li>
    <li>📞 Nous contacter en cas de problème</li>
  </ul>

  <div class="section">
  <h2>Coordonnées de la mairie</h2>

  <?php if (!empty($mairies)): ?>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Adresse</th>
          <th>Code Postal</th>
          <th>Ville</th>
          <th>Téléphone</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($mairies as $mairie): ?>
          <tr>
            <td><?= htmlspecialchars($mairie['nom_mairie']) ?></td>
            <td><?= htmlspecialchars($mairie['adresse']) ?></td>
            <td><?= htmlspecialchars($mairie['code_postal']) ?></td>
            <td><?= htmlspecialchars($mairie['ville']) ?></td>
            <td><?= htmlspecialchars($mairie['numero_telephone']) ?></td>
            <td><?= htmlspecialchars($mairie['adresse_email']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="info-empty">Aucune mairie trouvée pour le moment.</p>
  <?php endif; ?>
</div>

    <a class="btn" href="index.php?page=infoAssociation"><i class="fas fa-plus-circle"></i> Créer un dossier</a>
    <a class="btn" href="index.php?page=CreerDossierAsso"><i class="fas fa-plus-circle"></i> historique de vos dossiers</a>

  <div class="footer-contact">
    <p>📬 Besoin d’aide ? Écrivez-nous à</p><a href="index.php?page=contact"><strong>contact@mairie.fr</strong></a>
  </div>
</main>

</body>
</html>
