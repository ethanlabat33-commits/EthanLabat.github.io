<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

if (!isset($adhesionAModifier) || empty($adhesionAModifier)) {
    echo "<p>Erreur : aucune adhésion à modifier.</p>";
    return;
}
?>

<div class="container">
    <h2>Modifier une adhésion</h2>
    <form method="POST" action="index.php?page=adhesion">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="id_adhesion" value="<?= htmlspecialchars($adhesionAModifier['id_adhesion']) ?>">

        <label>Montant :</label>
        <input type="text" name="montant" value="<?= htmlspecialchars($adhesionAModifier['montant']) ?>" required><br>

        <label>Détails :</label>
        <textarea name="details"><?= htmlspecialchars($adhesionAModifier['details']) ?></textarea><br>

        <label>ID Dossier :</label>
        <input type="text" name="id_dossier" value="<?= htmlspecialchars($adhesionAModifier['id_dossier']) ?>"><br>

        <label>ID Type Adhésion :</label>
        <input type="text" name="id_type_adhesion" value="<?= htmlspecialchars($adhesionAModifier['id_type_adhesion']) ?>"><br>

        <button type="submit">Modifier</button>
        <a href="index.php?page=adhesion">Annuler</a>
    </form>
</div>
