<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

if (!isset($personneAModifier)) {
    echo "<p class='error-message'>Erreur : aucune personne à modifier.</p>";
    exit;
}

$p = $personneAModifier;
?>

<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="form-card">
        <h2 class="form-title">Modifier la personne : <?php echo htmlspecialchars($p->getPrenom() . ' ' . $p->getNom()); ?></h2>

        <form method="POST" action="index.php?page=personne" class="form-grid">
            <input type="hidden" name="action" value="modifier">
            <input type="hidden" name="id_personne" value="<?php echo $p->getIdPersonne(); ?>">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" value="<?php echo htmlspecialchars($p->getNom()); ?>" required>
            </div>

            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" value="<?php echo htmlspecialchars($p->getPrenom()); ?>" required>
            </div>

            <div class="form-group">
                <label>Adresse :</label>
                <input type="text" name="adresse" value="<?php echo htmlspecialchars($p->getAdresse() ?? ''); ?>">
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="<?php echo htmlspecialchars($p->getTelephone() ?? ''); ?>">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($p->getEmail() ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="id_association">Association liée :</label>
                <select id="id_association" name="id_association">
                    <option value="">-- Aucune association --</option>
                    <?php foreach ($associations as $assoc): ?>
                        <option value="<?= htmlspecialchars($assoc->getIdAssociation()); ?>"
                            <?= ($p->getIdAssociation() == $assoc->getIdAssociation()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($assoc->getNomAssociation()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_role">Rôle associé :</label>
                <select id="id_role" name="id_role">
                    <option value="">-- Aucun rôle --</option>
                    <?php foreach ($roles as $role): ?>
                        <option value="<?= htmlspecialchars($role->getIdRole()); ?>"
                            <?= ($p->getIdRole() == $role->getIdRole()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($role->getRole()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="index.php?page=personne" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
