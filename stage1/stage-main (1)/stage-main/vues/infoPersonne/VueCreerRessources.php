<?php
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

$ressource = $ressourceAModifier ?? null;
$action = $ressource ? 'modifier' : 'ajouter';
?>

<div class="container">
    <h2><?= $action === 'modifier' ? 'Modifier les ressources humaines' : 'Ajouter des ressources humaines' ?></h2>
    
    <form method="POST" action="index.php?page=ressourcesHumaines">
        <input type="hidden" name="action" value="<?= $action ?>">
        
        <?php if ($action === 'modifier'): ?>
            <input type="hidden" name="id_ressources_humaines" value="<?= $ressource->getIdRessourcesHumaines() ?>">
        <?php endif; ?>

        <label>Nombre de bénévoles :</label><br>
        <input type="number" name="nombre_benevoles" 
               value="<?= $ressource ? $ressource->getNombreBenevoles() : '' ?>" 
               min="0" required><br><br>

        <label>Nombre total de salariés :</label><br>
        <input type="number" name="nombre_salaries_total" 
               value="<?= $ressource ? $ressource->getNombreSalariesTotal() : '' ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés autres :</label><br>
        <input type="number" name="nombre_salaries_autres" 
               value="<?= $ressource ? $ressource->getNombreSalariesAutres() : '' ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés temps complet :</label><br>
        <input type="number" name="nombre_salaries_temps_complet" 
               value="<?= $ressource ? $ressource->getNombreSalariesTempsComplet() : '' ?>" 
               min="0" required><br><br>

        <label>Nombre de salariés temps partiel :</label><br>
        <input type="number" name="nombre_salaries_temps_non_complet" 
               value="<?= $ressource ? $ressource->getNombreSalariesTempsNonComplet() : '' ?>" 
               min="0" required><br><br>

        <label>Nombre d'heures hebdomadaires des salariés :</label><br>
        <input type="number" name="nombre_heures_hebdomadaires_salaries" 
               value="<?= $ressource ? $ressource->getNombreHeuresHebdomadairesSalaries() : '' ?>" 
               min="0" required><br><br>

        <label>ID Dossier :</label><br>
        <input type="number" name="id_dossier" 
               value="<?= $ressource ? $ressource->getIdDossier() : '' ?>" 
               min="1"><br><br>

        <button type="submit" class="btn btn-primary">
            <?= $action === 'modifier' ? 'Modifier' : 'Ajouter' ?>
        </button>
        <a href="index.php?page=ressourcesHumaines" class="btn btn-secondary">Annuler</a>
    </form>
</div>