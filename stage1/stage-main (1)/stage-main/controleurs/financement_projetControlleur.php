<?php
require_once __DIR__ . '/../DAO/FinancementProjetDAO.php';

$dao = new FinancementProjetDAO();

$financements = $dao->getAll();

// Si formulaire soumis pour ajouter un financement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type_financement'] ?? '';
    $montant = floatval($_POST['montant_sollicite'] ?? 0);
    $id_dossier = intval($_POST['id_dossier'] ?? 0);

    if ($type && $montant > 0 && $id_dossier > 0) {
        $ajoutOk = $dao->ajouter($type, $montant, $id_dossier);
        if ($ajoutOk) {
            header('Location: index.php?page=financement_projet');
            exit();
        } else {
            $erreur = "Erreur lors de l'ajout du financement.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs correctement.";
    }
}

require_once __DIR__ . '/../vues/financier/financementProjet.php';
