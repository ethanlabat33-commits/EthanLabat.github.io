<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$charge = $chargeAModifier ?? null;
$action = $charge ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier une charge' : 'Ajouter une charge' ?></h2>

    <form method="POST" action="index.php?page=charge">
        <input type="hidden" name="action" value="<?= $action ?>">
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_charge" value="<?= $charge->getIdCharge() ?>">
        <?php endif; ?>

        <label>Description :</label><br>
        <input type="text" name="description" 
               value="<?= $charge ? htmlspecialchars($charge->getDescription()) : '' ?>" 
               required><br><br>

        <label>Montant exercice écoulé :</label><br>
        <input type="number" step="0.01" name="montant_exercice_ecoule" 
               value="<?= $charge ? $charge->getMontantExerciceEcoule() : '' ?>"><br><br>

        <label>Montant prévisionnel :</label><br>
        <input type="number" step="0.01" name="montant_previsionnel" 
               value="<?= $charge ? $charge->getMontantPrevisionnel() : '' ?>"><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier" 
               value="<?= $charge ? $charge->getIdDossier() : '' ?>"><br><br>

        <label>ID Catégorie de charge :</label><br>
        <input type="number" name="id_categorie_charge" 
               value="<?= $charge ? $charge->getIdCategorieCharge() : '' ?>"><br><br>

        <button type="submit" class="btn btn-primary"><?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?></button>
        <a href="index.php?page=charge" class="btn btn-secondary">Annuler</a>
    </form>
</div>
