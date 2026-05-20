<?php 
// Inclusion de l'en-tête HTML commun à toutes les pages (doctype, meta, ouverture body, etc.)
require_once(__DIR__ . '/../header.php');

// Inclusion de la barre latérale ou menu gauche (navigation)
require_once (__DIR__ . '/../VueGauche.php');
?>

<div class="container">
    <!-- Titre principal de la page -->
    <h1>Ajouter une activité</h1>

    <!-- Affichage d'un message d'erreur si la variable $erreur est définie et non vide -->
    <?php if (!empty($erreur)): ?>
        <!-- Le message d'erreur est affiché en rouge, avec protection contre les failles XSS -->
        <p style="color: red;"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <!-- Formulaire POST pour envoyer les données de la nouvelle activité -->
    <form method="POST" action="index.php?page=activite">
        <!-- Label associé à la zone de texte pour décrire l'activité -->
        <label for="description_activite">Description :</label><br>

        <!-- Zone de texte pour saisir la description de l'activité, champ obligatoire -->
        <textarea id="description_activite" name="description_activite" required></textarea><br><br>

        <!-- Bouton pour soumettre le formulaire, avec un champ caché "action" valant "ajouter" -->
        <button type="submit" name="action" value="ajouter">Ajouter</button>
    </form>

    <!-- Lien vers la page listant toutes les activités, avec un style de bouton -->
    <a href="index.php?page=activite" class="btn btn-primary">Voir les activités</a>
</div>
