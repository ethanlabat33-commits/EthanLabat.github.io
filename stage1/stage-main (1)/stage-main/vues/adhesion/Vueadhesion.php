

<?php 
require_once(__DIR__ . '/../header.php');
require_once (__DIR__ . '/../VueGauche.php');
?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>Les adhesions</h1>

    <?php if (!empty($adhesions)): ?>
    <ul class="list">
        <?php foreach ($adhesions as $adhesion): ?>
            <div class="carre">
            <li>
                <strong><?= htmlspecialchars($adhesion['id_adhesion']) ?></strong><br>
                <p><?=  htmlspecialchars($adhesion['montant']) ?> €</p>
                <p><?= htmlspecialchars($adhesion['details'])  ?></p>
                

                <form method="POST" action="index.php?page=adhesion" style="display:inline;" onsubmit="return confirm('Supprimer cette adhesion ?');">
                    <input type="hidden" name="action" value="supprimer">
                    <input type="hidden" name="id_adhesion" value="<?= htmlspecialchars($adhesion['id_adhesion']) ?>">
                
                
                    <div class="submit">
                        <button type="submit">Supprimer</button>
                        <a href="index.php?page=adhesion&modifier_id=<?= htmlspecialchars($adhesion['id_adhesion']) ?>">Modifier</a>
  
                    </div>
                </form>
            

                
            </li>
        </div>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune adhesion pour l'instant.</p>
<?php endif; ?>


<a href="index.php?page=creeradhesion" class="paragraphe">Créer une adhesion ?</a>
<a href="index.php?page=modifieradhesion" class="paragraphe">modifier une adhesion ?</a>
</div>
