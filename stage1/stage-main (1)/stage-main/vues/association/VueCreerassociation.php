<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
// Les variables $activites (liste de toutes les activités) et $erreurs sont passées depuis le contrôleur
?>

<link rel="stylesheet" href="styles.css">

<div class="main-container">
    <div class="form-card">
        <h2 class="form-title">Ajouter une association</h2>

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
        <?php if (!empty($erreur)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($erreur) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=association" class="form-grid">
            <input type="hidden" name="action" value="ajouter">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom_association" required value="<?= htmlspecialchars($_POST['nom_association'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Numéro récépissé :</label>
                <input type="text" name="numero_recepisse" value="<?= htmlspecialchars($_POST['numero_recepisse'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Date parution JO :</label>
                <input type="date" name="date_parution_jo" value="<?= htmlspecialchars($_POST['date_parution_jo'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Numéro INSEE :</label>
                <input type="text" name="numero_insee" value="<?= htmlspecialchars($_POST['numero_insee'] ?? '') ?>">
            </div>

            <div class="form-group full-width">
                <label>Objet :</label>
                <textarea name="objet_association" required><?= htmlspecialchars($_POST['objet_association'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label>Adresse siège social :</label>
                <input type="text" name="adresse_siege_social" value="<?= htmlspecialchars($_POST['adresse_siege_social'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Code postal :</label>
                <input type="text" name="code_postal_siege_social" value="<?= htmlspecialchars($_POST['code_postal_siege_social'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Commune :</label>
                <input type="text" name="commune_siege_social" value="<?= htmlspecialchars($_POST['commune_siege_social'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone_siege_social" value="<?= htmlspecialchars($_POST['telephone_siege_social'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email_siege_social" value="<?= htmlspecialchars($_POST['email_siege_social'] ?? '') ?>">
            </div>

<div class="form-group">
    <label for="id_activite">Activité associée :</label>
    <select id="id_activite" name="id_activite">
        <option value="">-- Sélectionner une activité --</option>
        <?php 
        if (!empty($activites)) {
            $selected_id_activite = $_POST['id_activite'] ?? null;
            foreach ($activites as $act): ?>
                <option value="<?= $act->getIdActivite(); ?>"
                    <?= ($selected_id_activite == $act->getIdActivite()) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($act->getDescriptionActivite()) ?>
                </option>
            <?php endforeach;
        } else {
            echo '<option value="">Aucune activité disponible</option>';
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="id_manifestation">Manifestation associée :</label>
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

<div class="form-group">
    <label for="id_personne">Personne associée :</label>
    <select id="id_personne" name="id_personne">
        <option value="">-- Sélectionner une personne --</option>
        <?php 
        if (!empty($personnes)) {
            $selected_id_personne = $_POST['id_personne'] ?? null;
            foreach ($personnes as $p): ?>
                <option value="<?= $p->getIdPersonne(); ?>"
                    <?= ($selected_id_personne == $p->getIdPersonne()) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($p->getNom() . ' ' . $p->getPrenom()) ?>
                </option>
            <?php endforeach;
        } else {
            echo '<option value="">Aucune personne disponible</option>';
        }
        ?>
    </select>
</div>


  <details>
    <summary>Informations Ressources Humaines (optionnel)</summary>

    <label for="nombre_benevoles">Nombre de bénévoles :</label>
    <input type="number" id="nombre_benevoles" name="nombre_benevoles" min="0" value="<?= htmlspecialchars(isset($ressource) ? $ressource->getNombreBenevoles() : '') ?>">


    <label for="nombre_salaries_total">Nombre total de salariés :</label>
    <input type="number" id="nombre_salaries_total" name="nombre_salaries_total" min="0" value="<?= isset($ressource) ? htmlspecialchars($ressource->getNombreSalariesTotal()) : '' ?>">

    <label for="nombre_salaries_autres">Nombre de salariés autres :</label>
    <input type="number" id="nombre_salaries_autres" name="nombre_salaries_autres" min="0" value="<?=  isset($ressource) ? htmlspecialchars($ressource->getNombreSalariesAutres()) : '' ?>">

    <label for="nombre_salaries_temps_complet">Nombre de salariés temps complet :</label>
    <input type="number" id="nombre_salaries_temps_complet" name="nombre_salaries_temps_complet" min="0" value="<?=  isset($ressource) ? htmlspecialchars($ressource->getNombreSalariesTempsComplet()) : '' ?>">

    <label for="nombre_salaries_temps_non_complet">Nombre de salariés temps partiel :</label>
    <input type="number" id="nombre_salaries_temps_non_complet" name="nombre_salaries_temps_non_complet" min="0" value="<?=  isset($ressource) ? htmlspecialchars($ressource->getNombreSalariesTempsNonComplet()) : '' ?>">

    <label for="nombre_heures_hebdomadaires_salaries">Nombre d'heures hebdomadaires des salariés :</label>
    <input type="number" id="nombre_heures_hebdomadaires_salaries" name="nombre_heures_hebdomadaires_salaries" min="0" value="<?=  isset($ressource) ? htmlspecialchars($ressource->getNombreHeuresHebdomadairesSalaries()) : '' ?>">

  </details>

<script>
function toggleSection(id) {
  const el = document.getElementById(id);
  el.style.display = (el.style.display === 'none') ? 'block' : 'none';
}
</script>

<style>
  details {
    max-width: 600px;   /* largeur max contrôlée */
    margin: 20px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px 15px;
    background: #f9f9f9;
    font-family: Arial, sans-serif;
  }

  summary {
    font-weight: bold;
    font-size: 1.1em;
    cursor: pointer;
    outline: none;
  }

  details[open] summary::after {
    content: "▲";
    float: right;
  }

  summary::after {
    content: "▼";
    float: right;
  }

  /* Form styles inside details */
  details form {
    margin-top: 15px;
  }

  details label {
    display: block;
    margin: 10px 0 5px;
    font-weight: 600;
  }

  details input[type=number] {
    width: 100%;  /* input pleine largeur */
    padding: 8px;
    box-sizing: border-box;
    border-radius: 4px;
    border: 1px solid #bbb;
  }

  details button {
    margin-top: 15px;
    padding: 8px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  details button:hover {
    background-color: #0056b3;
  }
</style>








            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="index.php?page=association" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>