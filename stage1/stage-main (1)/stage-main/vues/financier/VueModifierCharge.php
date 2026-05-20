<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$charge = $chargeAModifier ?? null;
$action = $charge ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier la charge' : 'Créer une nouvelle charge' ?></h2>
    
    <form method="POST" action="index.php?page=charges">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_charge" value="<?= $charge->getIdCharge() ?>">
        <?php endif; ?>

        <label>Description :</label><br>
        <input type="text" name="description" 
               value="<?= $charge ? htmlspecialchars($charge->getDescription() ?? '') : '' ?>" 
               required><br><br>

        <label>Montant Exercice Écoulé :</label><br>
        <input type="number" step="0.01" name="montant_exercice_ecoule" 
               value="<?= $charge ? htmlspecialchars($charge->getMontantExerciceEcoule() ?? '') : '' ?>"><br><br>

        <label>Montant Prévisionnel :</label><br>
        <input type="number" step="0.01" name="montant_previsionnel" 
               value="<?= $charge ? htmlspecialchars($charge->getMontantPrevisionnel() ?? '') : '' ?>"><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier" 
               value="<?= $charge ? htmlspecialchars($charge->getIdDossier() ?? '') : '' ?>"><br><br>

        <label>ID Catégorie Charge :</label><br>
        <input type="number" name="id_categorie_charge" 
               value="<?= $charge ? htmlspecialchars($charge->getIdCategorieCharge() ?? '') : '' ?>"><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=charge" class="btn btn-secondary">Annuler</a>
    </form>
</div>