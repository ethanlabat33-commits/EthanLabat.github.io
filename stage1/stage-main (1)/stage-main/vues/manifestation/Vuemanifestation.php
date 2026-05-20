<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');
?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Liste des manifestations</h1>
            <a href="index.php?page=creermanifestation" class="btn btn-primary">Créer une manifestation</a>
        </div>

        <?php if (!empty($manifestations)): ?>
            <div class="card-grid">
                <?php foreach ($manifestations as $manifestation): ?>
                    <div class="card">
                        <h3><?= $manifestation->getNomManifestation(); ?></h3>
                        <p><strong>Date :</strong> <?= $manifestation->getDateManifestation(); ?></p>
                        <p><strong>Statut :</strong> <?= $manifestation->getStatutManifestation(); ?></p>
                        <p><strong>Genre :</strong> <?= $manifestation->getGenre(); ?></p>
                        <p><strong>Entrées :</strong> <?= $manifestation->getNombreEntre(); ?></p>
                        <p><strong>Résultat Financier :</strong> <?= $manifestation->getResultatFinancier(); ?> €</p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=manifestation" onsubmit="return confirm('Supprimer cette manifestation ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_manifestation" value="<?= $manifestation->getIdManifestation(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=manifestation&modifier_id=<?= $manifestation->getIdManifestation(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucune manifestation pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>
