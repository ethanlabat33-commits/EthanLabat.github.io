<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Ressources Humaines</h1>
            <a href="index.php?page=creerRessource" class="btn btn-primary">Ajouter des ressources</a>
        </div>

        <?php if (!empty($ressourcesHumaines)): ?>
            <div class="card-grid">
                <?php foreach ($ressourcesHumaines as $ressource): ?>
                    <div class="card">
                        <h3>Ressources Humaines #<?= $ressource->getIdRessourcesHumaines(); ?></h3>
                        <p><strong>Bénévoles :</strong> <?= $ressource->getNombreBenevoles(); ?></p>
                        <p><strong>Total salariés :</strong> <?= $ressource->getNombreSalariesTotal(); ?></p>
                        <p><strong>Salariés autres :</strong> <?= $ressource->getNombreSalariesAutres(); ?></p>
                        <p><strong>Temps complet :</strong> <?= $ressource->getNombreSalariesTempsComplet(); ?></p>
                        <p><strong>Temps partiel :</strong> <?= $ressource->getNombreSalariesTempsNonComplet(); ?></p>
                        <p><strong>Heures hebdo :</strong> <?= $ressource->getNombreHeuresHebdomadairesSalaries(); ?>h</p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=ressourcesHumaines" onsubmit="return confirm('Supprimer ces ressources humaines ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_ressources_humaines" value="<?= $ressource->getIdRessourcesHumaines(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="index.php?page=ressourcesHumaines&modifier_id=<?= $ressource->getIdRessourcesHumaines(); ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucune ressource humaine enregistrée pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>