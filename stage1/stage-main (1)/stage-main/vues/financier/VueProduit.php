<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Produits</h1>
            <a href="index.php?page=creerProduit" class="btn btn-primary">Créer un produit</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($produits)): ?>
            <div class="card-grid">
                <?php foreach ($produits as $produit): ?>
                    <div class="card">
                        <h3>Produit #<?= $produit->getIdProduit(); ?></h3>
                        <p><strong>Description :</strong> <?= htmlspecialchars($produit->getDescription()); ?></p>
                        <p><strong>Montant Exercice Écoulé :</strong> <?= htmlspecialchars($produit->getMontantExerciceEcoule() ?? 'N/A'); ?></p>
                        <p><strong>Montant Prévisionnel :</strong> <?= htmlspecialchars($produit->getMontantPrevisionnel() ?? 'N/A'); ?></p>
                        <p><strong>ID Dossier :</strong> <?= htmlspecialchars($produit->getIdDossier() ?? 'N/A'); ?></p>
                        <p><strong>ID Catégorie Produit :</strong> <?= htmlspecialchars($produit->getIdCategProduit() ?? 'N/A'); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=produit" onsubmit="return confirm('Supprimer ce produit ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_produit" value="<?= $produit->getIdProduit(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=produit&modifier_id=<?= $produit->getIdProduit(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucun produit enregistré pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>