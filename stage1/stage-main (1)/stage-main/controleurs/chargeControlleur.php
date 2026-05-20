<?php
require_once __DIR__ . '/../DAO/ChargeDAO.php';
$dao = new ChargeDAO();

$charges = $dao->getAllCharges();
$chargeAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $chargeAModifier = $dao->getChargeById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'description' => trim($_POST['description'] ?? ''),
        'montant_exercice_ecoule' => floatval($_POST['montant_exercice_ecoule'] ?? 0),
        'montant_previsionnel' => floatval($_POST['montant_previsionnel'] ?? 0),
        'id_dossier' => intval($_POST['id_dossier'] ?? 0),
        'id_categorie_charge' => intval($_POST['id_categorie_charge'] ?? 0)
    ];

    // Gérer les champs NULL si vides
    foreach ($data as $key => $value) {
        if ($value === '' || $value === 0.0 || $value === 0) { // Adapter selon les types de données
            $data[$key] = null;
        }
    }

    if ($action === 'ajouter') {
        if (empty($data['description'])) {
            $erreur = "La description de la charge est obligatoire.";
        } else {
            $success = $dao->ajouterCharge($data);
            $message = $success ? "Charge ajoutée." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_charge'] ?? 0);
        if ($id > 0) {
            if (empty($data['description'])) {
                $erreur = "La description de la charge est obligatoire.";
            } else {
                $success = $dao->modifierCharge($id, $data);
                $message = $success ? "Charge modifiée." : "Erreur lors de la modification.";
            }
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_charge'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerCharge($id);
            $message = $success ? "Charge supprimée." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$charges = $dao->getAllCharges();

if ($chargeAModifier) {
    require_once __DIR__ . '/../vues/financier/VueModifierCharge.php';
} else {
    require_once __DIR__ . '/../vues/financier/VueCharges.php';
}