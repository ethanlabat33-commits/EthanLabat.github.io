<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

if (!isset($ressourceAModifier)) {
    echo "<p>Erreur : aucune ressource à modifier.</p>";
    exit;
}

$ressource = $ressourceAModifier;
?>

<div class="container">
    <h2>Modifier les ressources humaines</h2>
    
    <form method="POST" action="index.php?page=ressourcesHumaines">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="id_ressources_humaines" value="<?= $ressource->getIdRessourcesHumaines() ?>">

        <label>Nombre de bénévoles :</label><br>
        <input type="number" name="nombre_benevoles" 
               value="<?= $ressource->getNombreBenevoles() ?>" 
               min="0" required><br><br>

        <label>Nombre total de salariés :</label><br>
        <input type="number" name="nombre_salaries_total" 
               value="<?= $ressource->getNombreSalariesTotal() ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés autres :</label><br>
        <input type="number" name="nombre_salaries_autres" 
               value="<?= $ressource->getNombreSalariesAutres() ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés temps complet :</label><br>
        <input type="number" name="nombre_salaries_temps_complet" 
               value="<?= $ressource->getNombreSalariesTempsComplet() ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés temps partiel :</label><br>
        <input type="number" name="nombre_salaries_temps_non_complet" 
               value="<?= $ressource->getNombreSalariesTempsNonComplet() ?>" 
               min="0" required><br><br>

        <label>Nombre d'heures hebdomadaires des salariés :</label><br>
        <input type="number" name="nombre_heures_hebdomadaires_salaries" 
               value="<?= $ressource->getNombreHeuresHebdomadairesSalaries() ?>" 
               min="0" required><br><br>


        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="index.php?page=ressourcesHumaines" class="btn btn-secondary">Annuler</a>
    </form>
</div>