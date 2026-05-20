<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$categoriesProduits = $categoriesProduits ?? null;  // Normalement null ici
$action = 'ajouter';
?>

<div class="container">
    <h2>Créer une nouvelle catégorie de produit</h2>
    
    <form method="POST" action="index.php?page=categProduit">
        <input type="hidden" name="action" value="<?= $action ?>">

        <label>Libellé :</label><br>    
        <input type="text" name="libelle_CategProduit" 
               value="<?= $categoriesProduits ? htmlspecialchars($categorieProduit->getLibelleCategProduit() ?? '') : '' ?>" 
               required><br><br>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="index.php?page=categProduit" class="btn btn-secondary">Annuler</a>
    </form>
</div>
