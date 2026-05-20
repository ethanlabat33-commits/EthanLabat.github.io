<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$manif = $manifestationAModifier ?? null;

$action = $manif ? 'modifier' : 'ajouter';
?>

<div class="container"> 
<h2><?= $action === 'modifier' ? 'Modifier la manifestation' : 'Créer une nouvelle manifestation' ?></h2>

<form method="POST" action="index.php?page=manifestation">
    <input type="hidden" name="action" value="<?= $action ?>">

    <?php if ($action === 'modifier'): ?>
        <input type="hidden" name="id_manifestation" value="<?= $manif->getIdManifestation() ?>">
    <?php endif; ?>

    <label>Date :</label><br>
    <input type="date" name="date_manifestation" value="<?= $manif ? $manif->getDateManifestation() : '' ?>" required><br><br>

    <label>Nom :</label><br>
    <input type="text" name="nom_manifestation" value="<?= $manif ? $manif->getNomManifestation() : '' ?>" required><br><br>

    <label>Statut :</label><br>
    <input type="text" name="statut_manifestation" value="<?= $manif ? $manif->getStatutManifestation() : '' ?>" required><br><br>

    <label>Genre :</label><br>
    <input type="text" name="genre" value="<?= $manif ? $manif->getGenre() : '' ?>" required><br><br>

    <label>Nombre d'entrées :</label><br>
    <input type="number" name="NombreEntre" value="<?= $manif ? $manif->getNombreEntre() : '' ?>" min="0"><br><br>

    <button type="submit" class="btn btn-primary"><?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?></button>
    <?php if ($action === 'modifier'): ?>
    <?php endif; ?>
    <a href="index.php?page=manifestation" class="btn btn-secondary">Annuler</a>
</form>
</div>
