<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$bilan = $bilanAModifier ?? null;
$action = $bilan ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier un bilan financier' : 'Ajouter un bilan financier' ?></h2>

    <?php if (!empty($erreur)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=bilan_financier">
        <input type="hidden" name="action" value="<?= $action ?>">
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_bilan_financier" value="<?= $bilan->getIdBilanFinancier() ?>">
        <?php endif; ?>

        <label>Année d'exercice :</label><br>
        <input type="number" name="annee_exercice" required
               value="<?= $bilan ? htmlspecialchars($bilan->getAnneeExercice()) : '' ?>"><br><br>

        <label>Total charges exercice écoulé :</label><br>
        <input type="number" step="0.01" name="total_charges_exercice_ecoule"
               value="<?= $bilan ? htmlspecialchars($bilan->getTotalChargesExerciceEcoule()) : '' ?>"><br><br>

        <label>Total charges prévisionnel :</label><br>
        <input type="number" step="0.01" name="total_charges_previsionnel"
               value="<?= $bilan ? htmlspecialchars($bilan->getTotalChargesPrevisionnel()) : '' ?>"><br><br>

        <label>Total produits exercice écoulé :</label><br>
        <input type="number" step="0.01" name="total_produits_exercice_ecoule"
               value="<?= $bilan ? htmlspecialchars($bilan->getTotalProduitsExerciceEcoule()) : '' ?>"><br><br>

        <label>Total produits prévisionnel :</label><br>
        <input type="number" step="0.01" name="total_produits_previsionnel"
               value="<?= $bilan ? htmlspecialchars($bilan->getTotalProduitsPrevisionnel()) : '' ?>"><br><br>

        <label>Résultat exercice écoulé :</label><br>
        <input type="number" step="0.01" name="resultat_exercice_ecoule"
               value="<?= $bilan ? htmlspecialchars($bilan->getResultatExerciceEcoule()) : '' ?>"><br><br>

        <label>Résultat prévisionnel :</label><br>
        <input type="number" step="0.01" name="resultat_previsionnel"
               value="<?= $bilan ? htmlspecialchars($bilan->getResultatPrevisionnel()) : '' ?>"><br><br>

        <button type="submit" class="btn btn-primary"><?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?></button>
        <a href="index.php?page=bilan_financier" class="btn btn-secondary">Annuler</a>
    </form>
</div>
