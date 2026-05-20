<?php
require_once __DIR__ . '/../DAO/ManifestationDAO.php';
$dao = new ManifestationDAO();

// Récupérer toutes les manifestations
$manifestations = $dao->getAllManifestations();
$existe = false;

// Après récupération des données
$manifestationAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($manifestations as $manifestation) {
        if ($manifestation->getIdManifestation() === $id) {
            $manifestationAModifier = $manifestation;
            break;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'date_manifestation' => trim($_POST['date_manifestation'] ?? ''),
        'nom_manifestation' => trim($_POST['nom_manifestation'] ?? ''),
        'statut_manifestation' => trim($_POST['statut_manifestation'] ?? ''),
        'genre' => trim($_POST['genre'] ?? ''),
        'NombreEntre' => intval($_POST['NombreEntre'] ?? 0),
        'resultatFinancier' => floatval($_POST['resultatFinancier'] ?? 0),
        'id_dossier' => intval($_POST['id_dossier'] ?? 0)
    ];

    if ($action === 'ajouter') {
        if (empty($data['nom_manifestation'])) {
            $erreur = "Le nom de la manifestation est obligatoire.";
        } else {
            $success = $dao->ajouterManifestation($data);
            $message = $success ? "Manifestation ajoutée." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_manifestation'] ?? 0);
        if ($id > 0) {
            $success = $dao->modifierManifestation($id, $data);
            $message = $success ? "Manifestation modifiée." : "Erreur lors de la modification.";
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_manifestation'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerManifestation($id);
            $message = $success ? "Manifestation supprimée." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$manifestations = $dao->getAllManifestations();

// Si on est en modification, charger la vue spécifique
if ($manifestationAModifier) {
    require_once __DIR__ . '/../vues/manifestation/VueModifierManif.php';
} else {
    require_once __DIR__ . '/../vues/manifestation/Vuemanifestation.php';

}
