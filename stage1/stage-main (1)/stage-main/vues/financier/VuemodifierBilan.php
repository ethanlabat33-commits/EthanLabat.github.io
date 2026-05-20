<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$bilan = $bilanAModifier;
?>

<div class="container">
    <h2>Modifier un bilan financier</h2>

    <?php if (!empty($erreur)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="id_bilan_financier" value="<?= $bilan->getIdBilanFinancier() ?>">

        <label>Année d'exercice :</label><br>
        <input type="number" name="annee_exercice" required
               value="<?= htmlspecialchars($bilan->getAnneeExercice()) ?>"><br><br>

        <label>Total charges exercice écoulé :</label><br>
        <input type="number" step="0.01" name="total_charges_exercice_ecoule"
               value="<?= htmlspecialchars($bilan->getTotalChargesExerciceEcoule()) ?>"><br><br>

        <label>Total charges prévisionnel :</label><br>
        <input type="number" step="0.01" name="total_charges_previsionnel"
               value="<?= htmlspecialchars($bilan->getTotalChargesPrevisionnel()) ?>"><br><br>

        <label>Total produits exercice écoulé :</label><br>
        <input type="number" step="0.01" name="total_produits_exercice_ecoule"
               value="<?= htmlspecialchars($bilan->getTotalProduitsExerciceEcoule()) ?>"><br><br>

        <label>Total produits prévisionnel :</label><br>
        <input type="number" step="0.01" name="total_produits_previsionnel"
               value="<?= htmlspecialchars($bilan->getTotalProduitsPrevisionnel()) ?>"><br><br>

        <label>Résultat exercice écoulé :</label><br>
        <input type="number" step="0.01" name="resultat_exercice_ecoule"
               value="<?= htmlspecialchars($bilan->getResultatExerciceEcoule()) ?>"><br><br>

        <label>Résultat prévisionnel :</label><br>
        <input type="number" step="0.01" name="resultat_previsionnel"
               value="<?= htmlspecialchars($bilan->getResultatPrevisionnel()) ?>"><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier"
               value="<?= htmlspecialchars($bilan->getIdDossier()?? '') ?>"><br><br>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php?page=bilan_financier" class="btn btn-secondary">Annuler</a>
    </form>
</div>
