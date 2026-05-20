<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Catégories de Charges</h1>
            <a href="index.php?page=creerCategCharges" class="btn btn-primary">Créer une catégorie de charge</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($categoriesCharges)): ?>
            <div class="card-grid">
                <?php foreach ($categoriesCharges as $categorieCharge): ?>
                    <div class="card">
                        <h3>Catégorie de Charge #<?= $categorieCharge->getIdCategorieCharge(); ?></h3>
                        <p><strong>Libellé :</strong> <?= htmlspecialchars($categorieCharge->getLibelleCategorie()); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=categCharge" onsubmit="return confirm('Supprimer cette catégorie de charge ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_categorie_charge" value="<?= $categorieCharge->getIdCategorieCharge(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=categCharge&modifier_id=<?= $categorieCharge->getIdCategorieCharge(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucune catégorie de charge enregistrée pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>