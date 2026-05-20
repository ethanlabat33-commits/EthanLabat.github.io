<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="association.css">
</head>
<body>
    <h2>Formulaire de contact</h2>

<form id="form" method="post" action="traitement_contact.php" novalidate>
    <div>
        <label for="nom">Votre nom *</label><br>
        <input type="text" id="nom" name="nom" required minlength="2">
        <div id="nom-error" class="error-message"></div>
    </div><br>

    <div>
        <label for="email">Votre email *</label><br>
        <input type="email" id="email" name="email" required>
        <div id="email-error" class="error-message"></div>
    </div><br>

    <div>
        <label for="raison">Pourquoi nous contactez-vous ? *</label><br>
        <textarea id="raison" name="raison" required minlength="10" rows="5" cols="40"></textarea>
        <div id="raison-error" class="error-message"></div>
    </div><br>

    <button type="submit">Envoyer</button>
    
    <a class="btn" ><i class="fas fa-plus-circle"></i> envoyer</a>
    <a class="btn" href="index.php?page=accueilAsso"><i class="fas fa-plus-circle"></i> revenir sur l'Accueil</a>
</form>
</body>
</html>