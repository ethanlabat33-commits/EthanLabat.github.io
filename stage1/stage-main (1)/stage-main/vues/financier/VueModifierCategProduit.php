<?php

require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$categorieProduit = $categorieProduitAModifier ?? null;
$action = $categorieProduit ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier la catégorie produit' : 'Créer une nouvelle catégorie produit' ?></h2>

    <form method="POST" action="index.php?page=categProduit">
        <input type="hidden" name="action" value="<?= $action ?>">

        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_CategProduit" value="<?= htmlspecialchars($categorieProduit->getIdCategProduit()) ?>">
        <?php endif; ?>

        <label>Libellé de la catégorie :</label><br>
        <input type="text" name="libelle_CategProduit" 
               value="<?= $categorieProduit ? htmlspecialchars($categorieProduit->getLibelleCategProduit()) : '' ?>" 
               required><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=categProduit" class="btn btn-secondary">Annuler</a>
    </form>
</div>
