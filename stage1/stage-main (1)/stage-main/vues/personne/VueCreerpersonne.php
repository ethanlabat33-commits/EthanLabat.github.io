<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
// Les variables $erreurs, $message, $roles, $associations etc. doivent être passées depuis le contrôleur
?>

<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="form-card">
        <h2 class="form-title">Ajouter une personne</h2>

        <?php if (!empty($erreurs)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= htmlspecialchars($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($message)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=personne" class="form-grid">
            <input type="hidden" name="action" value="ajouter">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Prénom :</label>
                <input type="text" name="prenom" required value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Date de naissance :</label>
                <input type="date" name="date_naissance" value="<?= htmlspecialchars($_POST['date_naissance'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Adresse :</label>
                <input type="text" name="adresse" value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Code postal :</label>
                <input type="text" name="code_postal" value="<?= htmlspecialchars($_POST['code_postal'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Commune :</label>
                <input type="text" name="commune" value="<?= htmlspecialchars($_POST['commune'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="id_role">Rôle associé :</label>
                <select id="id_role" name="id_role">
                    <option value="">-- Sélectionner un rôle --</option>
                    <?php
                    if (isset($roles) && is_array($roles) && !empty($roles)) {
                        $selected_id_role = $_POST['id_role'] ?? null;
                        foreach ($roles as $role) {
                            $selected = ($selected_id_role == $role->getIdRole()) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($role->getIdRole()) . '" ' . $selected . '>' . htmlspecialchars($role->getRole()) . '</option>';
                        }
                    } else {
                        echo '<option value="">Aucun rôle disponible</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_association">Association :</label>
                <select id="id_association" name="id_association">
                    <option value="">-- Sélectionner une association --</option>
                    <?php
                    if (isset($associations) && is_array($associations) && !empty($associations)) {
                        $selected_id_association = $_POST['id_association'] ?? null;
                        foreach ($associations as $assoc) {
                            $selected = ($selected_id_association == $assoc->getIdAssociation()) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($assoc->getIdAssociation()) . '" ' . $selected . '>' . htmlspecialchars($assoc->getNomAssociation()) . '</option>';
                        }
                    } else {
                        echo '<option value="">Aucune association disponible</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="index.php?page=personne" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
