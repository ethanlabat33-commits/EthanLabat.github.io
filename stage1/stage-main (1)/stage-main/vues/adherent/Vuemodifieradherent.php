<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');

// Vérifie si $adherentAModifier est bien défini
if (!isset($adherentAModifier)) {
    echo "<p>Erreur : aucun adhérent à modifier.</p>";
    exit;
}

$adherent = $adherentAModifier;
?>

<h2>Modifier l'adhérent : <?= htmlspecialchars($adherent['nom_association']) ?></h2>

<form method="POST" action="index.php?page=association">
    <input type="hidden" name="action" value="modifier">
    <input type="hidden" name="id_adherent" value="<?= htmlspecialchars($adherent['id_adherent'] ?? '') ?>">

    <label>Nom :</label>
    <input type="text" name="nom_association" value="<?= htmlspecialchars($adherent['nom_association'] ?? '') ?>" required><br>

    <label>Numéro récépissé :</label>
    <input type="text" name="numero_recepisse" value="<?= htmlspecialchars($adherent['numero_recepisse'] ?? '') ?>"><br>

    <label>Date parution JO :</label>
    <input type="date" name="date_parution_jo" value="<?= htmlspecialchars($adherent['date_parution_jo'] ?? '') ?>"><br>

    <label>Numéro INSEE :</label>
    <input type="text" name="numero_insee" value="<?= htmlspecialchars($adherent['numero_insee'] ?? '') ?>"><br>

    <label>Objet :</label>
    <textarea name="objet_association" required><?= htmlspecialchars($adherent['objet_association'] ?? '') ?></textarea><br>

    <label>Adresse siège social :</label>
    <input type="text" name="adresse_siege_social" value="<?= htmlspecialchars($adherent['adresse_siege_social'] ?? '') ?>"><br>

    <label>Code postal siège social :</label>
    <input type="text" name="code_postal_siege_social" value="<?= htmlspecialchars($adherent['code_postal_siege_social'] ?? '') ?>"><br>

    <label>Commune siège social :</label>
    <input type="text" name="commune_siege_social" value="<?= htmlspecialchars($adherent['commune_siege_social'] ?? '') ?>"><br>

    <label>Téléphone siège social :</label>
    <input type="text" name="telephone_siege_social" value="<?= htmlspecialchars($adherent['telephone_siege_social'] ?? '') ?>"><br>

    <label>Email siège social :</label>
    <input type="email" name="email_siege_social" value="<?= htmlspecialchars($adherent['email_siege_social'] ?? '') ?>"><br>

    <button type="submit">Enregistrer les modifications</button>
    <a href="index.php?page=association">Annuler</a>
</form>
