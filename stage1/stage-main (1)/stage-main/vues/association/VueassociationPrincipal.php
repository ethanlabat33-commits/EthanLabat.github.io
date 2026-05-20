<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

// Assurez-vous que $activiteDAO est disponible ici (il est instancié dans associationControlleur.php)
?>

<div id="react-root"></div>


<link rel="stylesheet" href="styles.css">
<div class="container">
<div class="main-container">
    <div class="header-section">
        <h1 class="page-title">Liste des associations</h1>
        <a href="index.php?page=creerassociation" class="btn btn-primary">Créer une association</a>
    </div>

    <?php if (!empty($associations)): ?>
        <div class="card-grid">
            <?php foreach ($associations as $association): ?>
                <?php
                $id_ressource = $association->getIdRessource();
                $ressource = null;

                if ($id_ressource !== null) {
                    $ressource = $ressourcesHumainesDAO->getRessourcesHumainesById($id_ressource);
                }
                ?>
                <div class="card">
                    <h3><?php echo $association->getNomAssociation(); ?></h3>
                    <p><strong>Commune :</strong> <?php echo $association->getCommuneSiegeSocial(); ?></p>
                    <p><strong>Téléphone :</strong> <?php echo $association->getTelephoneSiegeSocial(); ?></p>

                    <p><strong>Activité associée :</strong>
                        <?php 
                        $id_activite_liee = $association->getIdActivite();
                        if ($id_activite_liee !== null) {
                            // Correction : Appel à getActiviteParId() sur ActiviteProposeeDAO
                            $activite = $activiteDAO->getActiviteParId($id_activite_liee); 
                            if ($activite) {
                                echo htmlspecialchars($activite->getDescriptionActivite());
                            } else {
                                echo 'Non trouvée';
                            }
                        } else {
                            echo 'Aucune';
                        } ?>

                    <p><strong>manifestation associée :</strong>
                        <?php 
                        $id_manifestation_liee = $association->getIdActivite();
                        if ($id_manifestation_liee !== null) {
                            // Correction : Appel à getActiviteParId() sur ActiviteProposeeDAO
                            $manifestation = $manifestationDAO->getManifestationParId($id_manifestation_liee); 
                            if ($manifestatio) {
                                echo htmlspecialchars($manifestation->getNomManifestation());
                            } else {
                                echo 'Non trouvée';
                            }
                        } else {
                            echo 'Aucune';
                        }
                        ?>
                    <p><strong>Personne associée :</strong>
                        <?php 
                        $id_personne_liee = $association->getIdPersonne();
                        if ($id_personne_liee !== null) {
                            $personne = $personneDAO->getPersonneParId($id_personne_liee); 
                            if ($personne) {
                                // Correction ici : accès direct aux méthodes getNom() et getPrenom()
                                echo htmlspecialchars($personne->getNom() . ' ' . $personne->getPrenom());
                            } else {
                                echo 'Non trouvée';
                            }
                        } else {
                            echo 'Aucune';
                        }
                        ?>
                    </p>
                    <p><strong>Informations Ressources Humaines :</strong>
                        <p><strong>Informations Ressources Humaines :</strong>
                        <?php 
                            $id_ressource_liee = $association->getIdRessource();
                            $ressource = null;

                            if ($id_ressource_liee !== null) {
                                $ressource = $ressourcesHumainesDAO->getRessourcesHumainesById($id_ressource_liee);
                            }

                            if ($ressource !== null) {
                                echo 'Nombre de bénévoles : ' . htmlspecialchars($ressource->getNombreBenevoles()) . '<br>';
                                echo 'Nombre de salariés : ' . htmlspecialchars($ressource->getNombreSalariesTotal());
                            } else {
                                echo 'Aucune';
                            }
                        ?>
                    </p>

                    </p>
                    <div class="card-actions">
                        <form method="POST" action="index.php?page=association" onsubmit="return confirm('Supprimer cette association ?');">
                            <input type="hidden" name="action" value="supprimer">
                            <input type="hidden" name="id_association" value="<?php echo $association->getIdAssociation(); ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                        <a href="index.php?page=association&modifier_id=<?php echo $association->getIdAssociation(); ?>" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="info-message">Aucune association enregistrée pour le moment.</p>
    <?php endif; ?>
</div>
</div>