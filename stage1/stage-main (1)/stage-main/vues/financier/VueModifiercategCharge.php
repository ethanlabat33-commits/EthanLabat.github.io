<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$categorie = $categorieChargeAModifier ?? null;
$action = $categorie ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier la catégorie' : 'Créer une nouvelle catégorie' ?></h2>
    
    <form method="POST" action="index.php?page=categCharge">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_categorie_charge" value="<?= htmlspecialchars($categorie->getIdCategorieCharge()) ?>">
        <?php endif; ?>

        <label>Libellé :</label><br>    
        <input type="text" name="libelle_categorie" 
               value="<?= $categorie ? htmlspecialchars($categorie->getLibelleCategorie()) : '' ?>" 
               required><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=categCharge" class="btn btn-secondary">Annuler</a>
    </form>
</div>
