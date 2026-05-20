<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Charges</h1>
            <a href="index.php?page=creerCharge" class="btn btn-primary">Créer une charge</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($charges)): ?>
            <div class="card-grid">
                <?php foreach ($charges as $charge): ?>
                    <div class="card">
                        <h3>Charge #<?= $charge->getIdCharge(); ?></h3>
                        <p><strong>Description :</strong> <?= htmlspecialchars($charge->getDescription() ?? 'N/A'); ?></p>
                        <p><strong>Montant Exercice Écoulé :</strong> <?= htmlspecialchars($charge->getMontantExerciceEcoule() ?? 'N/A'); ?></p>
                        <p><strong>Montant Prévisionnel :</strong> <?= htmlspecialchars($charge->getMontantPrevisionnel() ?? 'N/A'); ?></p>
                        <p><strong>ID Dossier :</strong> <?= htmlspecialchars($charge->getIdDossier() ?? 'N/A'); ?></p>
                        <p><strong>ID Catégorie Charge :</strong> <?= htmlspecialchars($charge->getIdCategorieCharge() ?? 'N/A'); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=charge" onsubmit="return confirm('Supprimer cette charge ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_charge" value="<?= $charge->getIdCharge(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=charge&modifier_id=<?= $charge->getIdCharge(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucune charge enregistrée pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>
