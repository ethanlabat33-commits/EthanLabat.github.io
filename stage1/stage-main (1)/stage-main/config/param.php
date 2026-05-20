<?php
// On spécifie l'hôte (localhost), le nom de la base (subvention) et l'encodage des caractères (utf8)
 $dsn = 'mysql:host=localhost;dbname=subvention;charset=utf8';
 // Nom d'utilisateur pour se connecter à la base de données
$user = 'root';
// Mot de passe associé à root (vide ici)
$pass = '';
// Appel à la fonction 'connexion' pour établir la connexion PDO avec les paramètres ci-dessus
// $pdo contiendra l'objet de connexion à la base de données
$pdo  = connexion($dsn, $user, $pass);
