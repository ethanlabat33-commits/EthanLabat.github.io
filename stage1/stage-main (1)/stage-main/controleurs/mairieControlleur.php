<?php
require_once __DIR__ . '/../DAO/MairieDAO.php';

$dao = new MairieDAO();
$mairies = $dao->getAllMairies();

// Affichage de la vue (affichage simple uniquement)
require_once __DIR__ . '/../vues/accueil.php';
