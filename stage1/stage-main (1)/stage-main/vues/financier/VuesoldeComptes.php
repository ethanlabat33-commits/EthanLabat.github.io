<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bilan Financier</title>
</head>
<body>
    <div class="container"><div class="charge"><h2>🏦 Soldes des comptes</h2>

<?php if (!empty($comptes)): ?>
    
    <table>
        <thead>
            <tr>
                <th>Nom du compte</th>
                <th>Montant (€)</th>
                <th>ID dossier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comptes as $compte): ?>
                <tr>
                    <td><?= htmlspecialchars($compte['nom_compte']) ?></td>
                    <td><?= number_format($compte['montant_solde'], 2, ',', ' ') ?> €</td>
                    <td><?= htmlspecialchars($compte['id_dossier']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun solde enregistré.</p>
<?php endif; ?>

<h3>Ajouter un solde</h3>
<form method="POST">
    <input type="text" name="nom_compte" placeholder="Nom du compte" required>
    <input type="number" step="0.01" name="montant_solde" placeholder="Montant (€)" required>
    <input type="number" name="id_dossier" placeholder="ID dossier" required>
    <button type="submit" name="add_solde">Ajouter</button>
</form>
</div>
</div>