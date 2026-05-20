<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$produit = $produitAModifier ?? null;
$action = $produit ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier un produit' : 'Ajouter un produit' ?></h2>

    <form method="POST" action="index.php?page=produit">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_produit" value="<?= $produit->getIdProduit() ?>">
        <?php endif; ?>

        <label>Description :</label><br>
        <input type="text" name="description" 
               value="<?= $produit ? htmlspecialchars($produit->getDescription()) : '' ?>" 
               required><br><br>

        <label>Montant exercice écoulé :</label><br>
        <input type="number" step="0.01" name="montant_exercice_ecoule" 
               value="<?= $produit ? $produit->getMontantExerciceEcoule() : '' ?>"><br><br>

        <label>Montant prévisionnel :</label><br>
        <input type="number" step="0.01" name="montant_previsionnel" 
               value="<?= $produit ? $produit->getMontantPrevisionnel() : '' ?>"><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier" 
               value="<?= $produit ? $produit->getIdDossier() : '' ?>"><br><br>

        <label>ID Catégorie de produit :</label><br>
        <input type="number" name="id_CategProduit" 
               value="<?= $produit ? $produit->getIdCategProduit() : '' ?>"><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=produit" class="btn btn-secondary">Annuler</a>
    </form>
</div>
