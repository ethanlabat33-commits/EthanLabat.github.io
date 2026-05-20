<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<div class="container">
    <h2>Ajouter une adhésion</h2>

    <form method="POST" action="index.php?page=adhesion">
        <input type="hidden" name="action" value="ajouter">

        <label for="montant">Montant :</label>
        <input type="number" step="0.01" name="montant" id="montant" required><br>

        <label for="details">Détails :</label>
        <textarea name="details" id="details"></textarea><br>

        <label for="id_dossier">ID Dossier :</label>
        <input type="number" name="id_dossier" id="id_dossier" required><br>

        <label for="id_type_adhesion">ID Type Adhésion :</label>
        <input type="number" name="id_type_adhesion" id="id_type_adhesion" required><br>

        <button type="submit">Ajouter</button>
    </form>
</div>
