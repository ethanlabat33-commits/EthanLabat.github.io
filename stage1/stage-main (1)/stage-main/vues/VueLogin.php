<?php
$message = '';

// Traitement de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = $_POST['identifiant'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

   if ($identifiant === 'admin' && $motdepasse === '123') {
    $_SESSION['connecte'] = true;
    $_SESSION['role'] = 'admin'; 
    header('Location: index.php?page=home');
    exit();
} elseif ($identifiant === 'association' && $motdepasse === '1234') {
    $_SESSION['connecte'] = true;
    $_SESSION['role'] = 'association'; 
    header('Location: index.php?page=accueilAsso');
    exit();
}

 else {
        $message = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <img src="/subvention/public/images/logo_portrait_posi.jpg" alt="Logo">

        <?php if ($message): ?>
            <p style="color:red"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="identifiant" placeholder="Identifiant" required />
            <input type="password" name="motdepasse" placeholder="Mot de passe" required />
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
