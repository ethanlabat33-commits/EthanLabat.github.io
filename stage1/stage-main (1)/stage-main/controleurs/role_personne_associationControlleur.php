<?php
require_once __DIR__ . '/../DAO/RolePersonneAssociationDAO.php';
$dao = new RolePersonneAssociationDAO();

// Récupérer tous les rôles
$roles = $dao->getAllRoles();
$existe = false;

// Après récupération des données
$roleAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($roles as $role) {
        if ($role->getIdRole() === $id) {
            $roleAModifier = $role;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'role' => trim($_POST['role'] ?? '')
    ];

    if ($action === 'ajouter') {
        if (empty($data['role'])) {
            $erreur = "Le nom du rôle est obligatoire.";
        } else {
            $success = $dao->ajouterRole($data);
            $message = $success ? "Rôle ajouté." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_role'] ?? 0);
        if ($id > 0) {
            if (empty($data['role'])) {
                $erreur = "Le nom du rôle est obligatoire.";
            } else {
                $success = $dao->modifierRole($id, $data);
                $message = $success ? "Rôle modifié." : "Erreur lors de la modification.";
            }
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_role'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerRole($id);
            $message = $success ? "Rôle supprimé." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$roles = $dao->getAllRoles();

// Si on est en modification, charger la vue spécifique
if ($roleAModifier) {
    require_once __DIR__ . '/../vues/roles/VueModifierRole.php';
} else {
    require_once __DIR__ . '/../vues/roles/Vuerole_personne_association.php';
}