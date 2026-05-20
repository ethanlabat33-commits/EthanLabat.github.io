<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');

if (!isset($associationAModifier)) {
    echo "<p class='error-message'>Erreur : aucune association à modifier.</p>";
    exit;
}

$assoc = $associationAModifier;
?>

<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="form-card">
        <h2 class="form-title">Modifier l'association : <?php echo $assoc->getNomAssociation(); ?></h2>

        <form method="POST" action="index.php?page=association" class="form-grid">
            <input type="hidden" name="action" value="modifier">
            <input type="hidden" name="id_association" value="<?php echo $assoc->getIdAssociation(); ?>">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom_association" value="<?php echo $assoc->getNomAssociation(); ?>" required>
            </div>

            <div class="form-group">
                <label>Numéro récépissé :</label>
                <input type="text" name="numero_recepisse" value="<?php echo $assoc->getNumeroRecepisse(); ?>">
            </div>

            <div class="form-group">
                <label>Date parution JO :</label>
                <input type="date" name="date_parution_jo" value="<?php echo $assoc->getDateParutionJo(); ?>">
            </div>

            <div class="form-group">
                <label>Numéro INSEE :</label>
                <input type="text" name="numero_insee" value="<?php echo $assoc->getNumeroInsee(); ?>">
            </div>

            <div class="form-group full-width">
                <label>Objet :</label>
                <textarea name="objet_association" required><?php echo $assoc->getObjetAssociation(); ?></textarea>
            </div>

            <div class="form-group">
                <label>Adresse siège social :</label>
                <input type="text" name="adresse_siege_social" value="<?php echo $assoc->getAdresseSiegeSocial(); ?>">
            </div>

            <div class="form-group">
                <label>Code postal :</label>
                <input type="text" name="code_postal_siege_social" value="<?php echo $assoc->getCodePostalSiegeSocial(); ?>">
            </div>

            <div class="form-group">
                <label>Commune :</label>
                <input type="text" name="commune_siege_social" value="<?php echo $assoc->getCommuneSiegeSocial(); ?>">
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone_siege_social" value="<?php echo $assoc->getTelephoneSiegeSocial(); ?>">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email_siege_social" value="<?php echo $assoc->getEmailSiegeSocial(); ?>">
            </div>

            <div class="form-group">
                <label for="id_activite">Activité associée :</label>
                <select id="id_activite" name="id_activite"> <option value="">-- Aucune activité --</option>
                    <?php foreach ($activites as $act): ?>
                        <option value="<?= htmlspecialchars($act->getIdActivite()); ?>"
                            <?= ($assoc->getIdActivite() == $act->getIdActivite()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($act->getDescriptionActivite()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_manifestation">manifestation associée :</label>
                <select id="id_manifestation" name="id_manifestation">
                    <option value="">-- Aucune manifestation --</option>
                    <?php foreach ($manifestations as $manif): ?>
                        <option value="<?= htmlspecialchars($manif->getIdManifestation()); ?>"
                            <?= ($assoc->getIdManifestation() == $manif->getIdManifestation()) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($manif->getNomManifestation()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_personne">Personne associée :</label>
                <select id="id_personne" name="id_personne">
                    <option value="">-- Aucune personne --</option>
                    <?php 
                    if (isset($personnes) && is_array($personnes) && !empty($personnes)) {
                        foreach ($personnes as $p): ?>
                            <option value="<?= htmlspecialchars($p->getIdPersonne()); ?>"
                                <?= ($assoc->getIdPersonne() == $p->getIdPersonne()) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($p->getNom() . ' ' . $p->getPrenom()); ?>
                            </option>
                        <?php endforeach;
                    } else {
                        echo '<option value="">Aucune personne disponible</option>';
                    }
                    ?>
                </select>
            </div>
            <?php if (isset($ressource)): ?>
                <h3>Ressources Humaines</h3>

                <div class="form-group">
                    <label>Nombre de bénévoles :</label>
                    <input type="number" name="nombre_benevoles" value="<?= htmlspecialchars($ressource->getNombreBenevoles()); ?>" min="0">
                </div>

                <div class="form-group">
                    <label>Nombre total de salariés :</label>
                    <input type="number" name="nombre_salaries_total" value="<?= htmlspecialchars($ressource->getNombreSalariesTotal()); ?>" min="0">
                </div>

                <div class="form-group">
                    <label>Salariés à temps complet :</label>
                    <input type="number" name="nombre_salaries_temps_complet" value="<?= htmlspecialchars($ressource->getNombreSalariesTempsComplet()); ?>" min="0">
                </div>

                <div class="form-group">
                    <label>Salariés à temps non complet :</label>
                    <input type="number" name="nombre_salaries_temps_non_complet" value="<?= htmlspecialchars($ressource->getNombreSalariesTempsNonComplet()); ?>" min="0">
                </div>

                <div class="form-group">
                    <label>Salariés autres :</label>
                    <input type="number" name="nombre_salaries_autres" value="<?= htmlspecialchars($ressource->getNombreSalariesAutres()); ?>" min="0">
                </div>

                <div class="form-group">
                    <label>Heures hebdomadaires des salariés :</label>
                    <input type="number" name="nombre_heures_hebdomadaires_salaries" value="<?= htmlspecialchars($ressource->getNombreHeuresHebdomadairesSalaries()); ?>" min="0">
                </div>
            <?php else: ?>
                <p class="info-message">Aucune ressource humaine associée à cette association.</p>
            <?php endif; ?>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="index.php?page=association" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>