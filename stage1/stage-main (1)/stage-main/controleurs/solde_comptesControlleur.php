<?php
require_once __DIR__ . '/../DAO/SoldeComptesDAO.php';

$dao = new SoldeCompteDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_solde'])) {
    $nom = trim($_POST['nom_compte'] ?? '');
    $montant = floatval($_POST['montant_solde'] ?? 0);
    $id_dossier = intval($_POST['id_dossier'] ?? 1); // adapte si besoin

    if (!empty($nom) && $montant > 0 && $id_dossier > 0) {
        $dao->ajouter($nom, $montant, $id_dossier);
    }

    header('Location: index.php?page=solde_comptes');
    exit();
}

$comptes = $dao->getAll();

require_once __DIR__ . '/../vues/financier/VuesoldeComptes.php';
