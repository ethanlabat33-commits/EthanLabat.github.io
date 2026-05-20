<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');

if (!isset($roleAModifier)) {
    echo "<p>Erreur : aucune activité à modifier.</p>";
    exit;
}

$role = $roleAModifier;
?>

<h2>Modifier la personne</h2>

<form method="POST" action="index.php?page=roles">
    <input type="hidden" name="action" value="modifier">
    <input type="hidden" name="id_role" value="<?= htmlspecialchars($role->getIdRole() ?? '') ?>">

    <label>Role :</label><br>
    <textarea name="role" required><?= htmlspecialchars($role->getRole() ?? '') ?></textarea>


    <button type="submit">Enregistrer les modifications</button>
    <a href="index.php?page=roles">Annuler</a>
</form>
