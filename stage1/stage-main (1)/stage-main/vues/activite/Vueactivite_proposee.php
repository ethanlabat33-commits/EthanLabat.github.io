<?php 
// Inclusion de l'en-tête HTML commun à toutes les pages
require_once(__DIR__ . '/../header.php');
// Inclusion de la barre latérale ou du menu gauche
require_once(__DIR__ . '/../VueGauche.php');
?>
<!-- Lien vers le fichier CSS personnalisé pour la mise en page -->
<link rel="stylesheet" href="styles.css">

<div class="container"><!-- Conteneur principal qui centre le contenu et limite la largeur -->
    <div class="main-container"> <!-- Zone principale où tout le contenu est placé -->
        <div class="header-section"><!-- En-tête avec le titre et le bouton -->
            <!-- Titre de la page -->
            <h1 class="page-title">Liste des activités</h1>
            <!-- Bouton pour aller vers la page de création d'une nouvelle activité -->
            <a href="index.php?page=creeractivite" class="btn btn-primary">Créer une activité</a>
        </div>
        <!-- Vérifie si le tableau $activites n'est pas vide -->
        <?php if (!empty($activites)): ?>
            <div class="card-grid"><!-- Grille qui organise les cartes des activités -->
                <!-- Boucle sur chaque activité et l'affiche dans une carte -->
                <?php foreach ($activites as $activite): ?>
                    <div class="card"><!-- Une carte pour chaque activité, avec bordure et espace -->
                        <!-- Affiche la description de l’activité -->
                        <p><?= $activite->getDescriptionActivite(); ?></p>

                        <div class="card-actions"> <!-- Boutons pour modifier ou supprimer l’activité -->
                            <!-- Champ caché pour signaler l'action à effectuer (supprimer) -->
                            <form method="POST" action="index.php?page=activite" onsubmit="return confirm('Supprimer cette activité ?');">
                                <input type="hidden" name="action" value="supprimer">
                                 <!-- Champ caché pour transmettre l'ID de l’activité à supprimer -->
                                <input type="hidden" name="id_activite" value="<?= $activite->getIdActivite() ?>">
                                <!-- Bouton de suppression -->
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <!-- Lien vers la page de modification de l’activité -->
                            <a href="index.php?page=activite&modifier_id=<?= $activite->getIdActivite() ?>" class="btn btn-secondary">Modifier</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Message affiché s'il n'y a aucune activité enregistrée -->
            <p class="info-message">Aucune activité pour l'instant.</p>
        <?php endif; ?>
    </div>
</div>