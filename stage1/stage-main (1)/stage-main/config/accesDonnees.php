<?php
// Inclusion du fichier 'param.php' qui contient les paramètres de connexion (DSN, user, pass)
require_once 'param.php'; 
// Fonction pour créer une connexion PDO à la base de données
// Prend en paramètres la chaîne de connexion ($unDsn), le nom d'utilisateur ($unUser) et le mot de passe ($UnPass)
 function connexion($unDsn, $unUser, $UnPass) {
    try {
        // Création d'une nouvelle instance PDO avec les paramètres fournis
        $uneConnex = new PDO ($unDsn, $unUser, $UnPass);
        // Si la connexion réussit, on retourne l'objet PDO
        return $uneConnex;
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, on arrête le script et affiche le message d'erreur
        die("erreur de connexion !" . $e->getMessage());
    }
 }

 