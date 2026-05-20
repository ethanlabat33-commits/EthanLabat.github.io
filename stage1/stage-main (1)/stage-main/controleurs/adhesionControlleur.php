<?php
require_once __DIR__ . '/../DAO/AdhesionDAO.php';

$dao = new AdhesionDAO();

// Récupérer toutes les adhésions
$adhesions = $dao->getAllAdhesions();

$adhesionAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($adhesions as $a) {
        if ($a['id_adhesion'] === $id) {
            $adhesionAModifier = $a;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    $data = [
        'montant' => floatval($_POST['montant'] ?? 0),
        'details' => trim($_POST['details'] ?? ''),
        'id_dossier' => intval($_POST['id_dossier'] ?? 0),
        'id_type_adhesion' => intval($_POST['id_type_adhesion'] ?? 0),
    ];

    if ($action === 'ajouter') {
        // Tu peux ajouter des validations ici si besoin
        $success = $dao->ajouterAdhesion($data['montant'], $data['details'], $data['id_dossier'], $data['id_type_adhesion']);
        $message = $success ? "Adhésion ajoutée." : "Erreur lors de l'ajout.";
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_adhesion'] ?? 0);
        if ($id > 0) {
            $success = $dao->modifierAdhesion($id, $data['montant'], $data['details'], $data['id_dossier'], $data['id_type_adhesion']);
            $message = $success ? "Adhésion modifiée." : "Erreur lors de la modification.";
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_adhesion'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerAdhesionParId($id);
            $message = $success ? "Adhésion supprimée." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$adhesions = $dao->getAllAdhesions();

// Charger la vue spécifique si on modifie, sinon vue principale
if ($adhesionAModifier) {
    require_once __DIR__ . '/../vues/adhesion/Vuemodifieradhesion.php';
} else {
    require_once __DIR__ . '/../vues/adhesion/Vueadhesion.php';
}
