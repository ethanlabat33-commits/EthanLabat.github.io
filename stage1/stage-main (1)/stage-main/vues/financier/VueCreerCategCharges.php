<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$categorie = $categorie ?? null;  // Normalement null ici
$action = 'ajouter';
?>

<div class="container">
    <h2>Créer une nouvelle catégorie</h2>
    
    <form method="POST" action="index.php?page=categCharge">
        <input type="hidden" name="action" value="<?= $action ?>">

        <label>Libellé :</label><br>    
        <input type="text" name="libelle_categorie" 
               value="<?= $categorie ? htmlspecialchars($categorie->getLibelleCategorie() ?? '') : '' ?>" 
               required><br><br>

        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="index.php?page=categCharge" class="btn btn-secondary">Annuler</a>
    </form>
</div>
