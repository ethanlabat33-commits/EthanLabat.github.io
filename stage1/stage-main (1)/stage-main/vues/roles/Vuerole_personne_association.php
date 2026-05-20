<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="main-container">
        <div class="header-section">
            <h1 class="page-title">Gestion des Rôles</h1>
            <a href="index.php?page=creerRole" class="btn btn-primary">Créer un rôle</a>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (isset($erreur)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <?php if (!empty($roles)): ?>
            <div class="card-grid">
                <?php foreach ($roles as $role): ?>
                    <div class="card">
                        <h3>Rôle #<?= $role->getIdRole(); ?></h3>
                        <p><strong>Nom du rôle :</strong> <?= htmlspecialchars($role->getRole()); ?></p>

                        <div class="card-actions">
                            <form method="POST" action="index.php?page=roles" onsubmit="return confirm('Supprimer ce rôle ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_role" value="<?= $role->getIdRole(); ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                
                            </form>
                            <a href="index.php?page=roles&modifier_id=<?= $role->getIdRole(); ?>" class="btn btn-secondary">Modifier</a>
                            <p><a href="index.php?page=personne">voir les personnes</a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="info-message">Aucun rôle enregistré pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>