<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Bilans Financiers</h1>
            <a href="index.php?page=VuecreerBilan" class="btn btn-primary">Créer un Bilan Financier</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($bilans)): ?>
            <div class="card-grid">
                <?php foreach ($bilans as $bilan): ?>
                    <div class="card">
                        <h3>Bilan #<?= $bilan->getIdBilanFinancier(); ?></h3>
                        <p><strong>Année d'exercice :</strong> <?= htmlspecialchars($bilan->getAnneeExercice()); ?></p>
                        <p><strong>Charges Exercice Écoulé :</strong> <?= htmlspecialchars($bilan->getTotalChargesExerciceEcoule()); ?></p>
                        <p><strong>Charges Prévisionnel :</strong> <?= htmlspecialchars($bilan->getTotalChargesPrevisionnel()); ?></p>
                        <p><strong>Produits Exercice Écoulé :</strong> <?= htmlspecialchars($bilan->getTotalProduitsExerciceEcoule()); ?></p>
                        <p><strong>Produits Prévisionnel :</strong> <?= htmlspecialchars($bilan->getTotalProduitsPrevisionnel()); ?></p>
                        <p><strong>Résultat Exercice Écoulé :</strong> <?= htmlspecialchars($bilan->getResultatExerciceEcoule()); ?></p>
                        <p><strong>Résultat Prévisionnel :</strong> <?= htmlspecialchars($bilan->getResultatPrevisionnel()); ?></p>
                        <p><strong>ID Dossier :</strong> <?= htmlspecialchars($bilan->getIdDossier()?? ''); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=VuebilanFinancier" onsubmit="return confirm('Supprimer ce bilan financier ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_bilan_financier" value="<?= $bilan->getIdBilanFinancier(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=bilan_financier&modifier_id=<?= $bilan->getIdBilanFinancier(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucun bilan financier enregistré pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>