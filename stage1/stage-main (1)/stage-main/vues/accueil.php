<?php
require_once __DIR__ . '/../vues/header.php';  
require_once __DIR__ . '/../vues/VueGauche.php';
?>
<div class="container">
    
<section class="container-flex">
    <div class="login-container">
        <h1>Bienvenue sur la page d'accueil</h1>
        <p>Ceci est un exemple de page d'accueil simple.</p>
        <img src="/subvention/public/images/logo_portrait_posi.jpg" alt="Logo" style="max-width: 200px;">
    </div>

<div class="mairie">
<h2>coordonnées de la mairie</h2>

<?php if (!empty($mairies)): ?>
            <?php foreach ($mairies as $mairie): ?>
                
                    <?php echo $mairie->getNomMairie(); ?></td><br>
                    <?php echo $mairie->getAdresse(); ?></td><br>
                    <?php echo $mairie->getCodePostal(); ?></td><br>
                    <?php echo $mairie->getVille(); ?></td><br>
                    <?php echo $mairie->getNumeroTelephone(); ?></td><br>
                    <?php echo $mairie->getAdresseEmail(); ?></td><br>           
            <?php endforeach; ?>
<?php else: ?>
    <p>Aucune mairie trouvée.</p>
<?php endif; ?>
</div></div></section>