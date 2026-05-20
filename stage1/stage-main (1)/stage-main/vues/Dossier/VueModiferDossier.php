<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

if (!isset($dossierAModifier)) {
    echo "<p class='error-message'>Erreur : aucun dossier à modifier.</p>";
    exit;
}

$dossier = $dossierAModifier;
?>

<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="form-card">
        <h2 class="form-title">Modifier le dossier de subvention</h2>

        <form method="POST" action="index.php?page=Vuedossier" class="form-grid">
            <input type="hidden" name="action" value="modifier">
            <input type="hidden" name="id_dossier" value="<?= $dossier->getIdDossier(); ?>">

            <div class="form-group">
                <label>Année de la demande :</label>
                <input type="number" name="annee_demande" value="<?= htmlspecialchars($dossier->getAnneeDemande()) ?>" required>
            </div>

            <div class="form-group">
                <label>Date de dépôt :</label>
                <input type="date" name="date_depot" value="<?= htmlspecialchars($dossier->getDateDepot()) ?>" required>
            </div>

            <div class="form-group">
                <label>Date limite de dépôt :</label>
                <input type="date" name="date_limite_depot" value="<?= htmlspecialchars($dossier->getDateLimiteDepot()) ?>" required>
            </div>

            <div class="form-group">
                <label>RIB :</label>
                <input type="text" name="rib" value="<?= htmlspecialchars($dossier->getRib()) ?>">
            </div>

            <div class="form-group">
                <label><input type="checkbox" name="copie_statut" <?= $dossier->getCopieStatut() ? 'checked' : '' ?>> Copie des statuts</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" name="recepisse_declaration" <?= $dossier->getRecepisseDeclaration() ? 'checked' : '' ?>> Récépissé de déclaration</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" name="recepisse_prefecture_maj" <?= $dossier->getRecepissePrefectureMaj() ? 'checked' : '' ?>> Récépissé préfecture mis à jour</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" name="pv_derniere_assemblee" <?= $dossier->getPvDerniereAssemblee() ? 'checked' : '' ?>> PV dernière assemblée</label>
            </div>

            <div class="form-group">
                <label><input type="checkbox" name="derniers_extraits_compte" <?= $dossier->getDerniersExtraitsCompte() ? 'checked' : '' ?>> Derniers extraits de compte</label>
            </div>

            <div class="form-group">
                <label for="id_association">Association :</label>
                <select name="id_association" id="id_association">
                    <option value="">-- Choisir une association --</option>
                    <?php foreach ($associations as $assoc): ?>
                        <option value="<?= $assoc->getIdAssociation(); ?>" <?= ($assoc->getIdAssociation() == $dossier->getIdAssociation()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($assoc->getNomAssociation()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="id_mairie">Mairie :</label>
                <select name="id_mairie" id="id_mairie">
                    <option value="">-- Choisir une mairie --</option>
                    <?php foreach ($mairies as $mairie): ?>
                        <option value="<?= $mairie->getIdMairie(); ?>" <?= ($mairie->getIdMairie() == $dossier->getIdMairie()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($mairie->getNomMairie()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="index.php?page=Vuedossier" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
