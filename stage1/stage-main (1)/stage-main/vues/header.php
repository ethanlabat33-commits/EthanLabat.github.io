<!DOCTYPE html>
<html lang="fr"> <!-- Indique que la langue du document est le français -->
<head>
    <meta charset="UTF-8"> <!-- Encodage des caractères en UTF-8 (utile pour les accents) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- Pour que la page s'affiche bien sur tous les écrans, notamment les mobiles -->
    <title>Subvention</title> <!-- Titre affiché dans l’onglet du navigateur -->
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers ton fichier CSS pour le design -->
</head>

<body>
    <!-- Début de la barre de navigation -->
    <nav>
        <ul>
            <!-- Lien vers la page d'accueil -->
            <li><a href="index.php?page=home">Accueil</a></li>

            <!-- Menu déroulant pour "Association" -->
            <li class="deroulant"><a href="#">Association</a>
                <ul class="sous">
                    <li><a href="index.php?page=association">Voir les associations</a></li>
                    <li><a href="index.php?page=creerassociation">Créer une association</a></li>
                </ul>
            </li>

            <!-- Menu déroulant pour "Activité" -->
            <li class="deroulant"><a href="#">Activité</a>
                <ul class="sous">
                    <li><a href="index.php?page=activite">voir les activites</a></li>
                    <li><a href="index.php?page=creeractivite">Creer une activite</a></li>
                </ul>
            </li>

            <!-- Menu déroulant pour "Manifestation" -->
            <li class="deroulant"><a href="#">Manifestation</a>
                <ul class="sous">
                    <li><a href="index.php?page=manifestation">voir les manifestations</a></li>
                    <li><a href="index.php?page=creermanifestation">Creer une manifestation</a></li>
                </ul>
            </li>

            <!-- Menu déroulant pour "Personne" -->
            <li class="deroulant"><a href="#">Personne</a>
                <ul class="sous">
                    <li><a href="index.php?page=personne">voir les personnes</a></li>
                    <li><a href="index.php?page=personne&subpage=creerpersonne">Creer une personne</a></li>
                </ul>
            </li>

            <!-- Lien vers la vue du bilan financier -->
            <li><a href="index.php?page=VueFinancier">bilan_financier</a></li>

            <!-- Connexion / Déconnexion selon l'état de session -->
            <li class="connexion">
                <?php if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true): ?>
                    <!-- Si l'utilisateur n'est pas connecté -->
                    <a href="index.php?page=login">Connexion</a>
                <?php else: ?>
                    <!-- Si l'utilisateur est connecté -->
                    <a href="index.php?page=deconnexion">Déconnexion</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</body>
</html>
