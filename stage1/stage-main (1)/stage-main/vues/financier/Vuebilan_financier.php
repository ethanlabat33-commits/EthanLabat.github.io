

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bilan Financier</title>
    <link rel="stylesheet" href="/public/styles.css">

</head>
<body>
    <div class="container">

<h1>Créer un Bilan Financier</h1>
<form method="POST" action="controleurs/bilan_financierControlleur.php">
    <label>Année :</label>
    <input type="number" name="annee" required><br><br>

    <fieldset>
        <legend><strong>Charges</strong></legend>
        <?php if (!empty($categ_charges)) {
            foreach ($categ_charges as $charge): ?>
                <label><?= htmlspecialchars($charge['libelle_categorie']) ?> (€) :</label>
                <input type="number" step="0.01" name="charges[<?= $charge['id_categorie_charge'] ?>]" value="0" required><br>
        <?php endforeach; } else {
            echo "<p>Aucune catégorie de charges disponible.</p>";
        } ?>
    </fieldset>
    

    <fieldset>
        <legend><strong>Produits</strong></legend>
        <?php if (!empty($categ_produits)) {
            foreach ($categ_produits as $produit): ?>
                <label><?= htmlspecialchars($produit['libelle_CategProduit']) ?> (€) :</label>
                <input type="number" step="0.01" name="produits[<?= $produit['id_CategProduit'] ?>]" value="0" required><br>
        <?php endforeach; } else {
            echo "<p>Aucune catégorie de produits disponible.</p>";
        } ?>
    </fieldset>

    <br>
    <input type="submit" value="Créer Bilan Automatiquement">
</form>

<hr>

<h1>Bilans Financiers Enregistrés</h1>

    <?php
    if (!empty($bilans)) {
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr><th>Année</th><th>Total Charges (€)</th><th>Total Produits (€)</th><th>Résultat (€)</th></tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($bilans as $bilan) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($bilan['annee_exercice']) . '</td>';
            echo '<td>' . $bilan['total_charges_exercice_ecoule']. '</td>';
            echo '<td>' . $bilan['total_produits_exercice_ecoule']. '</td>';
            echo '<td>' . $bilan['resultat_exercice_ecoule'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Aucun bilan financier enregistré.</p>';
    }
    ?>

<div class="charge">
    <h2>Charges</h2>
    
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Description</th>
      <th>Montant exercice écoulé</th>
      <th>Montant prévisionnel</th>
      <th>ID dossier</th>
      <th>ID catégorie charge</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($charges as $charge): ?>
      <tr>
        <td><?= htmlspecialchars($charge['id_charge']) ?></td>
        <td><?= htmlspecialchars($charge['description']) ?></td>
        <td><?= htmlspecialchars($charge['montant_exercice_ecoule'] ?? '') ?></td>
        <td><?= htmlspecialchars($charge['montant_previsionnel']?? '') ?></td>
        <td><?= htmlspecialchars($charge['id_dossier']?? '') ?></td>
        <td><?= htmlspecialchars($charge['id_categorie_charge']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h3>Ajouter une charge</h3>
<form method="post">
  <input type="text" name="description" placeholder="Description" required>
  <input type="number" step="0.01" name="montant_exercice_ecoule" placeholder="Montant exercice écoulé">
  <input type="number" step="0.01" name="montant_previsionnel" placeholder="Montant prévisionnel">
  <input type="number" name="id_dossier" placeholder="ID dossier" required>
  <input type="number" name="id_categorie_charge" placeholder="ID catégorie charge" required>
  <button type="submit" name="add_charge">Ajouter</button>
</form>
</div>
  </div>


</body>
</html>
