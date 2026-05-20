<?php 
$adherentAModifier = null;

require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');
?>

<div class="container">
    <h1><?= $adherentAModifier ? 'Modifier un adhérent' : 'Ajouter un nouvel adhérent' ?></h1>

    <a href="index.php?page=adherent" class="btn-retour">⬅ Retour à la liste des adhérents</a>

    <?php if (!empty($_GET['success']) && $_GET['success'] === 'true'): ?>
        <p class="message-success">✅ Modification/Ajout réussi !</p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=adherent">
        <input type="hidden" name="action" value="<?= $adherentAModifier ? 'modifier' : 'ajouter' ?>">
        <?php if ($adherentAModifier): ?>
            <input type="hidden" name="id_adherent" value="<?= htmlspecialchars($adherentAModifier['id_adherent']) ?>">
        <?php endif; ?>

        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($adherentAModifier['nom'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Prénom :</label>
            <input type="text" name="prenom" value="<?= htmlspecialchars($adherentAModifier['prenom'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Âge :</label>
            <input type="number" name="age" value="<?= htmlspecialchars($adherentAModifier['age'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Genre :</label>
            <select name="genre" required>
                <option value="">-- Sélectionner --</option>
                <option value="Homme" <?= isset($adherentAModifier) && $adherentAModifier['genre'] === 'Homme' ? 'selected' : '' ?>>Homme</option>
                <option value="Femme" <?= isset($adherentAModifier) && $adherentAModifier['genre'] === 'Femme' ? 'selected' : '' ?>>Femme</option>
                <option value="Autre" <?= isset($adherentAModifier) && $adherentAModifier['genre'] === 'Autre' ? 'selected' : '' ?>>Autre</option>
            </select>
        </div>

        <div class="form-group">
            <label>Commune :</label>
            <input type="text" name="commune" value="<?= htmlspecialchars($adherentAModifier['commune'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label>Nombre d'adhérents :</label>
            <input type="number" name="nombre_adherents" value="<?= htmlspecialchars($adherentAModifier['nombre_adherents'] ?? '') ?>" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-action"><?= $adherentAModifier ? "💾 Modifier" : "➕ Ajouter" ?></button>
            <?php if ($adherentAModifier): ?>
                <a href="index.php?page=adherent" class="btn-annuler">❌ Annuler</a>
            <?php endif; ?>
        </div>
    </form>
</div>
