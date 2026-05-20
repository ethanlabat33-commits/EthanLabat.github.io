<?php

require_once __DIR__ . '/../DAO/DossierSubventionDAO.php';
require_once __DIR__ . '/../DAO/AssociationDAO.php';
require_once __DIR__ . '/../DAO/MairieDAO.php';
require_once __DIR__ . '/../DAO/ManifestationDAO.php';
require_once __DIR__ . '/../modele/DossierSubvention.php';
require_once __DIR__ . '/../modele/Association.php';
require_once __DIR__ . '/../modele/Mairie.php';
require_once __DIR__ . '/../modele/Manifestation.php';

$dossierDAO = new DossierSubventionDAO();
$associationDAO = new AssociationDAO();
$mairieDAO = new MairieDAO();
$manifestationDAO = new ManifestationDAO();

$associations = $associationDAO->getAllAssociations();
$mairies = $mairieDAO->getAllMairies();
$manifestations = $manifestationDAO->getAllManifestations();
$dossiers = $dossierDAO->getAll();

$dossierAModifier = null;
$erreurs = [];
$message = '';
$erreur = '';

// Affichage du formulaire de création
if (isset($_GET['page']) && $_GET['page'] === 'CreerDossierAdmin') {
    require_once 'vues/Dossier/VueCreerDossierAdmin.php'; // ✅ vue propre qui ne contient que le formulaire
    exit();
}

// Affichage du formulaire de modification
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $dossierAModifier = $dossierDAO->getDossierParId($id);

    if (!$dossierAModifier) {
        $erreur = "Dossier introuvable.";
        header('Location: index.php?page=dossier_subvention&erreur=' . urlencode($erreur));
        exit();
    }

    require_once __DIR__ . '/../vues/dossier/VueModifierdossier.php';
    exit();
}

// TRAITEMENT POST (Ajouter / Modifier / Supprimer)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    $data = [
        'annee_demande' => intval($_POST['annee_demande'] ?? 0),
        'date_depot' => $_POST['date_depot'] ?? '',
        'date_limite_depot' => $_POST['date_limite_depot'] ?? '',
        'rib' => trim($_POST['rib'] ?? ''),
        'copie_statut' => isset($_POST['copie_statut']) ? 1 : 0,
        'recepisse_declaration' => isset($_POST['recepisse_declaration']) ? 1 : 0,
        'recepisse_prefecture_maj' => isset($_POST['recepisse_prefecture_maj']) ? 1 : 0,
        'pv_derniere_assemblee' => isset($_POST['pv_derniere_assemblee']) ? 1 : 0,
        'derniers_extraits_compte' => isset($_POST['derniers_extraits_compte']) ? 1 : 0,
        'id_association' => intval($_POST['id_association'] ?? 0),
        'id_mairie' => intval($_POST['id_mairie'] ?? 0),
        'id_manifestation' => intval($_POST['id_manifestation'] ?? 0),
    ];

    // Validation simple
    if ($action === 'ajouter' || $action === 'modifier') {
        if ($data['annee_demande'] <= 2000 || empty($data['date_depot']) || empty($data['rib'])) {
            $erreurs[] = "Tous les champs obligatoires doivent être remplis.";
        }

        if (!empty($erreurs)) {
            if ($action === 'ajouter') {
                require_once __DIR__ . '/../vues/dossier/VueCreerDossierAdmin.php';
            } else {
                $id = intval($_POST['id_dossier'] ?? 0);
                $dossierAModifier = DossierSubvention::fromArray($data);
                $dossierAModifier->setIdDossier($id);
                require_once __DIR__ . '/../vues/dossier/VueModifierdossier.php';
            }
            exit();
        }
    }

    // Traitement après validation
    if ($action === 'ajouter') {
        $success = $dossierDAO->ajouterDossier($data);
        $message = $success ? "Dossier ajouté avec succès." : "Erreur lors de l'ajout du dossier.";
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_dossier'] ?? 0);
        if ($id > 0) {
            $success = $dossierDAO->modifierDossier($id, $data);
            $message = $success ? "Dossier modifié avec succès." : "Erreur lors de la modification.";
        } else {
            $erreur = "ID dossier invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_dossier'] ?? 0);
        if ($id > 0) {
            $success = $dossierDAO->supprimerDossierParId($id);
            $message = $success ? "Dossier supprimé avec succès." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID dossier invalide.";
        }
    }

    // Redirection avec messages
    $redirect_url = 'index.php?page=dossier_subvention';
    if (!empty($message)) {
        $redirect_url .= '&message=' . urlencode($message);
    }
    if (!empty($erreur)) {
        $redirect_url .= (empty($message) ? '' : '&') . 'erreur=' . urlencode($erreur);
    }
    header('Location: ' . $redirect_url);
    exit();
}

// Affichage principal
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
if (isset($_GET['erreur'])) {
    $erreur = htmlspecialchars($_GET['erreur']);
}

require_once __DIR__ . '/../vues/Dossier/VueDossier.php';
