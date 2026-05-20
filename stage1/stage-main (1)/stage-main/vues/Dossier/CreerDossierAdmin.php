<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
<div class="main-container">
    <div class="header-section">
        <h1 class="page-title">Créer un dossier de subvention</h1>
        <a href="index.php?page=Vuedossier" class="btn btn-secondary">← Retour à la liste</a>
    </div>

    <form method="POST" action="index.php?page=dossier" class="form-card">
        <input type="hidden" name="action" value="ajouter">

        <div class="form-group">
            <label for="annee_demande">Année de la demande :</label>
            <input type="number" name="annee_demande" id="annee_demande" required>
        </div>

        <div class="form-group">
            <label for="date_depot">Date de dépôt :</label>
            <input type="date" name="date_depot" id="date_depot" required>
        </div>

        <div class="form-group">
            <label for="date_limite_depot">Date limite de dépôt :</label>
            <input type="date" name="date_limite_depot" id="date_limite_depot" required>
        </div>

        <div class="form-group">
            <label for="rib">RIB :</label>
            <input type="text" name="rib" id="rib" required>
        </div>

        <div class="form-group">
            <label>Documents fournis :</label><br>
            <label><input type="checkbox" name="copie_statut"> Copie des statuts</label><br>
            <label><input type="checkbox" name="recepisse_declaration"> Récépissé déclaration</label><br>
            <label><input type="checkbox" name="recepisse_prefecture_maj"> Récépissé préfecture MàJ</label><br>
            <label><input type="checkbox" name="pv_derniere_assemblee"> PV dernière assemblée</label><br>
            <label><input type="checkbox" name="derniers_extraits_compte"> Derniers extraits de compte</label>
        </div>

        <div class="form-group">
            <label for="id_association">Association concernée :</label>
            <select name="id_association" id="id_association" required>
                <option value="">-- Sélectionner une association --</option>
                <?php foreach ($associations as $association): ?>
                    <option value="<?php echo $association->getIdAssociation(); ?>">
                        <?php echo htmlspecialchars($association->getNomAssociation()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_mairie">Mairie concernée :</label>
            <select name="id_mairie" id="id_mairie" required>
                <option value="">-- Sélectionner une mairie --</option>
                <?php foreach ($mairies as $mairie): ?>
                    <option value="<?php echo $mairie->getIdMairie(); ?>">
                        <?php echo htmlspecialchars($mairie->getNomMairie()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

<div class="form-group">
    <label for="id_manifestation">Manifestation concernée :</label>
    <select id="id_manifestation" name="id_manifestation">
        <option value="">-- Sélectionner une manifestation --</option>
        <?php 
        if (!empty($manifestations)) {
            $selected_id_manifestation = $_POST['id_manifestation'] ?? null;
            foreach ($manifestations as $manif): ?>
                <option value="<?= $manif->getIdManifestation(); ?>"
                    <?= ($selected_id_manifestation == $manif->getIdManifestation()) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($manif->getNomManifestation()) ?>
                </option>
            <?php endforeach;
        } else {
            echo '<option value="">Aucune manifestation disponible</option>';
        }
        ?>
    </select>
</div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer le dossier</button>
        </div>
    </form>
</div>
</div>
