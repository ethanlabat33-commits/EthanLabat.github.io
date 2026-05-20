<?php
require_once __DIR__ . '/../DAO/BilanFinancierDAO.php';
require_once __DIR__ . '/../modele/BilanFinancier.php'; // Ensure the BilanFinancier model is included

$dao = new BilanFinancierDAO();

// Récupérer tous les bilans financiers
$bilans = $dao->getAllBilans();
$bilanAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    // We need to fetch the object from the DAO result directly, not just by ID as it's an object not an array
    foreach ($bilans as $bilan) {
        if ($bilan->getIdBilanFinancier() === $id) {
            $bilanAModifier = $bilan;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'annee_exercice' => intval($_POST['annee_exercice'] ?? 0),
        'total_charges_exercice_ecoule' => floatval($_POST['total_charges_exercice_ecoule'] ?? 0.0),
        'total_charges_previsionnel' => floatval($_POST['total_charges_previsionnel'] ?? 0.0),
        'total_produits_exercice_ecoule' => floatval($_POST['total_produits_exercice_ecoule'] ?? 0.0),
        'total_produits_previsionnel' => floatval($_POST['total_produits_previsionnel'] ?? 0.0),
        'resultat_exercice_ecoule' => floatval($_POST['resultat_exercice_ecoule'] ?? 0.0),
        'resultat_previsionnel' => floatval($_POST['resultat_previsionnel'] ?? 0.0),
        // 'id_dossier' => intval($_POST['id_dossier'] ?? 0) // Supprimé
    ];

    if (empty($data['annee_exercice'])) {
        $erreur = "L'année d'exercice est obligatoire.";
    } else {
        if ($action === 'ajouter') {
            $success = $dao->ajouterBilan($data);
            $message = $success ? "Bilan financier ajouté." : "Erreur lors de l'ajout.";
        } elseif ($action === 'modifier') {
            $id = intval($_POST['id_bilan_financier'] ?? 0);
            if ($id > 0) {
                $success = $dao->modifierBilan($id, $data);
                $message = $success ? "Bilan financier modifié." : "Erreur lors de la modification.";
            } else {
                $erreur = "ID invalide pour modification.";
            }
        }
    }

    // Suppression gérée séparément
    if ($action === 'supprimer') {
        $id = intval($_POST['id_bilan_financier'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerBilan($id);
            $message = $success ? "Bilan financier supprimé." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}


// Actualiser la liste après modification
$bilans = $dao->getAllBilans();

// If we are modifying, load the specific view
if ($bilanAModifier) {
    require_once __DIR__ . '/../vues/financier/VuemodifierBilan.php';
} else {
    require_once __DIR__ . '/../vues/financier/VueBilanFinancier.php';
}