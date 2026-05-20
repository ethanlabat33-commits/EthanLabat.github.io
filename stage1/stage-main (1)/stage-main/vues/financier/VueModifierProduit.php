<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$produit = $produitAModifier ?? null; // On récupère le produit à modifier
$action = 'modifier';

// Gérer le cas où $produit n'est pas défini (ex: accès direct sans ID)
if (!$produit) {
    echo '<div class="container"><div class="alert alert-danger">Produit non trouvé pour la modification.</div></div>';
    echo '<a href="index.php?page=produits" class="btn btn-secondary">Retour à la liste des produits</a>';
    exit(); // Arrêter l'exécution pour éviter les erreurs
}
?>

<div class="container">
    <h2>Modifier le produit</h2>
    
    <form method="POST" action="index.php?page=produit">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <input type="hidden" name="id_produit" value="<?= $produit->getIdProduit() ?>">

        <label>Description :</label><br>
        <input type="text" name="description" 
               value="<?= htmlspecialchars($produit->getDescription()) ?>" 
               required><br><br>

        <label>Montant Exercice Écoulé :</label><br>
        <input type="number" step="0.01" name="montant_exercice_ecoule" 
               value="<?= $produit->getMontantExerciceEcoule() !== null ? htmlspecialchars($produit->getMontantExerciceEcoule()) : '' ?>"><br><br>

        <label>Montant Prévisionnel :</label><br>
        <input type="number" step="0.01" name="montant_previsionnel" 
               value="<?= $produit->getMontantPrevisionnel() !== null ? htmlspecialchars($produit->getMontantPrevisionnel()) : '' ?>"><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier" 
               value="<?= $produit->getIdDossier() !== null ? htmlspecialchars($produit->getIdDossier()) : '' ?>"><br><br>

        <label>ID Catégorie Produit :</label><br>
        <input type="number" name="id_CategProduit" 
               value="<?= $produit->getIdCategProduit() !== null ? htmlspecialchars($produit->getIdCategProduit()) : '' ?>"><br><br>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="index.php?page=produit" class="btn btn-secondary">Annuler</a>
    </form>
</div>