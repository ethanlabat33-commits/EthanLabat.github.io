<?php 
require_once(__DIR__ . '/../header.php');
require_once(__DIR__ . '/../VueGauche.php');
?>

<link rel="stylesheet" href="styles.css">
<div class="container">
<div class="main-container">
    <div class="header-section">
        <h1 class="page-title">Liste des dossiers de subvention</h1>
        <a href="index.php?page=VueCreerDossierAdmin" class="btn btn-primary">Créer un dossier</a>
    </div>

    <?php if (!empty($dossiers)): ?>
        <div class="card-grid">
            <?php foreach ($dossiers as $dossier): ?>
                <div class="card">
                    <h3>Dossier N° <?php echo $dossier->getIdDossier(); ?></h3>
                    <p><strong>Année de la demande :</strong> <?php echo htmlspecialchars($dossier->getAnneeDemande()); ?></p>
                    <p><strong>Date de dépôt :</strong> <?php echo htmlspecialchars($dossier->getDateDepot()); ?></p>
                    <p><strong>Date limite de dépôt :</strong> <?php echo htmlspecialchars($dossier->getDateLimiteDepot()); ?></p>
                    <p><strong>RIB :</strong> <?php echo htmlspecialchars($dossier->getRib() ?? 'Non renseigné'); ?></p>

                    <p><strong>Pièces jointes :</strong><br>
                        Statut : <?php echo $dossier->getCopieStatut() ? 'Oui' : 'Non'; ?><br>
                        Récépissé déclaration : <?php echo $dossier->getRecepisseDeclaration() ? 'Oui' : 'Non'; ?><br>
                        Préfecture MàJ : <?php echo $dossier->getRecepissePrefectureMaj() ? 'Oui' : 'Non'; ?><br>
                        PV dernière assemblée : <?php echo $dossier->getPvDerniereAssemblee() ? 'Oui' : 'Non'; ?><br>
                        Extraits de compte : <?php echo $dossier->getDerniersExtraitsCompte() ? 'Oui' : 'Non'; ?>
                    </p>

                    <p><strong>Association concernée :</strong>
                        <?php
                            $association = $associationDAO->getAssociationParId($dossier->getIdAssociation());
                            echo $association ? htmlspecialchars($association->getNomAssociation()) : 'Non trouvée';
                        ?>
                    </p>

                    <p><strong>Mairie concernée :</strong>
                        <?php
                            $mairie = $mairieDAO->getMairieParId($dossier->getIdMairie());
                            echo $mairie ? htmlspecialchars($mairie->getNomMairie()) : 'Non trouvée';
                        ?>
                    </p>
                    <pre>
<?php var_dump($dossiers); ?>
</pre>


                    <div class="card-actions">
                        <form method="POST" action="index.php?page=dossier" onsubmit="return confirm('Supprimer ce dossier ?');">
                            <input type="hidden" name="action" value="supprimer">
                            <input type="hidden" name="id_dossier" value="<?= $dossier->getIdDossier(); ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>


                        <a href="index.php?page=dossier&modifier_id=<?php echo $dossier->getIdDossier(); ?>" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="info-message">Aucun dossier de subvention enregistré pour le moment.</p>
    <?php endif; ?>
</div>
</div>
