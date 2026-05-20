<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>Financements des projets</h1>

    <?php if (!empty($erreur)): ?>
        <p style="color:red;"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=financement_projet">
        <label>Type de financement :</label><br>
        <input type="text" name="type_financement" required><br>

        <label>Montant sollicité :</label><br>
        <input type="number" name="montant_sollicite" step="0.01" required><br>

        <label>ID dossier :</label><br>
        <input type="number" name="id_dossier" required><br><br>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des financements</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Montant sollicité</th>
                <th>ID dossier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($financements as $financement): ?>
            <tr>
                <td><?= htmlspecialchars($financement['id_financement']) ?></td>
                <td><?= htmlspecialchars($financement['type_financement']) ?></td>
                <td><?= htmlspecialchars($financement['montant_sollicite']) ?></td>
                <td><?= htmlspecialchars($financement['id_dossier']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
