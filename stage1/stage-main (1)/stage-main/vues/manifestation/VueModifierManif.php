<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');

if (!isset($manifestationAModifier)) {
    echo "<p>Erreur : aucune activité à modifier.</p>";
    exit;
}

$manif = $manifestationAModifier;
?>

<div class="container"> 
<h2>Modifier la manifestation</h2>

<form method="POST" action="index.php?page=manifestation">
    <input type="hidden" name="action" value="modifier">
    <input type="hidden" name="id_manifestation" value="<?= $manif->getIdManifestation() ?>">

    <label>Date de la manifestation :</label><br>
    <input type="date" name="date_manifestation" value="<?= $manif->getDateManifestation() ?>" required><br><br>

    <label>Nom de la manifestation :</label><br>
    <input type="text" name="nom_manifestation" value="<?= $manif->getNomManifestation() ?>" required><br><br>

    <label>Statut :</label><br>
    <input type="text" name="statut_manifestation" value="<?= $manif->getStatutManifestation() ?>" required><br><br>

    <label>Genre :</label><br>
    <input type="text" name="genre" value="<?= $manif->getGenre() ?>" required><br><br>

    <label>Nombre d'entrées :</label><br>
    <input type="number" name="NombreEntre" value="<?= $manif->getNombreEntre() ?>" required><br><br>

    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    <a href="index.php?page=manifestation" class="btn btn-secondary">Annuler</a>
</form>
</div>
