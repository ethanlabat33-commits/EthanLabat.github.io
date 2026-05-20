<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Catégories de Produits</h1>
            <a href="index.php?page=creerCategProduit" class="btn btn-primary">Créer une catégorie de produit</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($categoriesProduits)): ?>
            <div class="card-grid">
                <?php foreach ($categoriesProduits as $categorieProduit): ?>
                    <div class="card">
                        <h3>Catégorie de Produit #<?= $categorieProduit->getIdCategProduit(); ?></h3>
                        <p><strong>Libellé :</strong> <?= htmlspecialchars($categorieProduit->getLibelleCategProduit()); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=categProduit" onsubmit="return confirm('Supprimer cette catégorie de produit ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_CategProduit" value="<?= $categorieProduit->getIdCategProduit(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=categProduit&modifier_id=<?= $categorieProduit->getIdCategProduit(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucune catégorie de produit enregistrée pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>