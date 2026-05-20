<?php 
require_once(__DIR__ . '/../header.php');  // Inclut l'en-tête commun (balises <head>, nav, etc.)
require_once (__DIR__ . '/../VueGauche.php');  // Inclut la barre latérale ou menu à gauche
// Vérifie si on a bien une activité à modifier, sinon affiche une erreur et stoppe
if (!isset($activiteAModifier)) {
    echo "<p>Erreur : aucune activité à modifier.</p>";
    exit;
}

$activ = $activiteAModifier; // Pour simplifier la variable
?>
<!-- Titre de la page avec le nom de l’activité à modifier -->
<h2>Modifier l'activité : <?php echo $activ->getDescriptionActivite(); ?></h2>
<!-- Formulaire de modification, envoie les données en POST -->
<form method="POST" action="index.php?page=activite">
    <!-- Indique qu’on veut modifier une activité -->
    <input type="hidden" name="action" value="modifier">
    <!-- ID caché pour savoir quelle activité modifier -->
    <input type="hidden" name="id_activite" value="<?php echo $activ->getIdActivite(); ?>">
    <!-- Label + zone de texte pour modifier la description -->
    <label>Description :</label><br>
    <textarea name="description_activite" required><?php echo $activ->getDescriptionActivite(); ?></textarea><br><br>
    <!-- Bouton pour enregistrer les changements -->
    <button type="submit">Enregistrer les modifications</button>
    <!-- Lien pour annuler et revenir à la liste sans changer -->
    <a href="index.php?page=activite">Annuler</a>
</form>
