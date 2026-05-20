<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');

// Assurez-vous que $personneDAO, $associationDAO, $roleDAO sont disponibles ici (instanciés dans personneControlleur.php)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des personnes</title>
    <link rel="stylesheet" href="styles.css" />

</head>


<div id="react-root"></div>

<link rel="stylesheet" href="styles.css">
<div class="container">
<div class="main-container">
    <div class="header-section">
        <h1 class="page-title">Liste des personnes</h1>
       <a href="index.php?page=personne&subpage=creerpersonne" class="btn btn-primary">Créer une personne</a>
       <a href="index.php?page=ressourcesHumaines" class="btn btn-secondary">ressources humaine</a>
       <a href="index.php?page=roles" class="btn btn-secondary">role personne</a>


    </div>

    <?php if (!empty($personnes)): ?>
        <div class="card-grid">
            <?php foreach ($personnes as $personne): ?>
                <div class="card">
                    <h3><?php echo htmlspecialchars($personne->getPrenom() . ' ' . $personne->getNom()); ?></h3>
                    <p><strong>Adresse :</strong> <?php echo htmlspecialchars($personne->getAdresse() ?? 'Non renseignée'); ?></p>
                    <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($personne->getTelephone() ?? 'Non renseigné'); ?></p>
                    <p><strong>Email :</strong> <?php echo htmlspecialchars($personne->getEmail() ?? 'Non renseigné'); ?></p>

                    <p><strong>Association liée :</strong>
                        <?php 
                        $id_association_liee = $personne->getIdAssociation();
                        if ($id_association_liee !== null) {
                            $association = $associationDAO->getAssociationParId($id_association_liee);
                            if ($association) {
                                echo htmlspecialchars($association->getNomAssociation());
                            } else {
                                echo 'Non trouvée';
                            }
                        } else {
                            echo 'Aucune';
                        }
                        ?>
                    </p>

                    <p><strong>Rôle associé :</strong>
                        <?php 
                        $id_role_liee = $personne->getIdRole();
                        if ($id_role_liee !== null) {
                            $role = $roleDAO->getRoleParId($id_role_liee);
                            if ($role) {
                                echo htmlspecialchars($role->getRole());
                            } else {
                                echo 'Non trouvée';
                            }
                        } else {
                            echo 'Aucun';
                        }
                        ?>
                    </p>
                    <div class="card-actions">
                        <form method="POST" action="index.php?page=personne" onsubmit="return confirm('Supprimer cette personne ?');">
                            <input type="hidden" name="action" value="supprimer">
                            <input type="hidden" name="id_personne" value="<?php echo $personne->getIdPersonne(); ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                        <a href="index.php?page=personne&modifier_id=<?php echo $personne->getIdPersonne(); ?>" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="info-message">Aucune personne enregistrée pour le moment.</p>
    <?php endif; ?>
</div>
</div>
<body>
</html>