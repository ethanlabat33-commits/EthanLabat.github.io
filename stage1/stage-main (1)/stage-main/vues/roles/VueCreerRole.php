<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$role = $roleAModifier ?? null;
$action = $role ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier le rôle' : 'Créer un nouveau rôle' ?></h2>
    
    <form method="POST" action="index.php?page=roles">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_role" value="<?= $role->getIdRole() ?>">
        <?php endif; ?>

        <label>Nom du rôle :</label><br>
        <input type="text" name="role" 
               value="<?= $role ? htmlspecialchars($role->getRole()) : '' ?>" 
               required><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=roles" class="btn btn-secondary">Annuler</a>
    </form>
</div>