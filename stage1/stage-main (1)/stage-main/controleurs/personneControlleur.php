<?php

require_once __DIR__ . '/../DAO/PersonneDAO.php';
require_once __DIR__ . '/../modele/Personne.php';
require_once __DIR__ . '/../DAO/RolePersonneAssociationDAO.php';
require_once __DIR__ . '/../modele/RolePersonneAssociation.php';
require_once __DIR__ . '/../DAO/AssociationDAO.php'; // ajout DAO Association

$personneDAO = new PersonneDAO();
$roleDAO = new RolePersonneAssociationDAO();
$associationDAO = new AssociationDAO();

$roles = $roleDAO->getAllRoles();
$associations = $associationDAO->getAllAssociations();

$personnes = $personneDAO->getAllPersonnes();
$personneAModifier = null;
$erreurs = [];
$message = '';
$erreur = '';

// Affichage formulaire création personne
if (isset($_GET['subpage']) && strtolower($_GET['subpage']) === 'creerpersonne') {
    require_once __DIR__ . '/../vues/personne/VueCreerPersonne.php';
    exit();
}


// Affichage formulaire modification personne
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $personneAModifier = $personneDAO->getPersonneParId($id);

    if (!$personneAModifier) {
        $erreur = "Personne à modifier non trouvée.";
        header('Location: index.php?page=personne&erreur=' . urlencode($erreur));
        exit();
    }

    // $roles et $associations sont déjà chargés, nécessaires pour la vue
    require_once __DIR__ . '/../vues/personne/VueModifierPersonnes.php';
    exit();
}

// Traitement POST : ajout, modif, suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    $data = [
        'nom_personne' => trim($_POST['nom'] ?? ''),
        'prenom' => trim($_POST['prenom'] ?? ''),
        'adresse' => trim($_POST['adresse'] ?? ''),
        'telephone' => trim($_POST['telephone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'id_association' => isset($_POST['id_association']) && $_POST['id_association'] !== '' ? intval($_POST['id_association']) : null,
        'id_role' => isset($_POST['id_role']) && $_POST['id_role'] !== '' ? intval($_POST['id_role']) : null,
    ];

    // Validation simple pour ajout ou modification
    if ($action === 'ajouter' || $action === 'modifier') {
        if (empty($data['nom_personne'])) {
            $erreurs[] = "Le nom est obligatoire.";
        }
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "L'adresse email est invalide.";
        }
        if (!empty($data['telephone']) && !preg_match('/^0[1-9](\d{2}){4}$/', $data['telephone'])) {
            $erreurs[] = "Le numéro de téléphone est invalide.";
        }

        if (!empty($erreurs)) {
    $roles = $roleDAO->getAllRoles();
    $associations = $associationDAO->getAllAssociations();

    if ($action === 'ajouter') {
        require_once __DIR__ . '/../vues/personne/VueCreerPersonne.php';
    } else {
        $id = intval($_POST['id_personne'] ?? 0);
        $personneAModifier = Personne::fromArray($data);
        $personneAModifier->setIdPersonne($id);
        require_once __DIR__ . '/../vues/personne/VueModifierPersonnes.php';
    }
    exit();
}

    }

    // Exécution après validation
    if ($action === 'ajouter') {
        $success = $personneDAO->ajouterPersonne($data);
        $message = $success ? "Personne ajoutée avec succès." : "Erreur lors de l'ajout de la personne.";
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_personne'] ?? 0);
        if ($id > 0) {
            $success = $personneDAO->modifierPersonne($id, $data);
            $message = $success ? "Personne modifiée avec succès." : "Erreur lors de la modification de la personne.";
        } else {
            $erreur = "ID de personne invalide pour la modification.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_personne'] ?? 0);
        if ($id > 0) {
            $success = $personneDAO->supprimerPersonneParId($id);
            $message = $success ? "Personne supprimée avec succès." : "Erreur lors de la suppression de la personne.";
        } else {
            $erreur = "ID de personne invalide pour la suppression.";
        }
    }

    // Redirection avec message / erreur
    $redirect_url = 'index.php?page=personne';
    if (!empty($message)) {
        $redirect_url .= '&message=' . urlencode($message);
    }
    if (!empty($erreur)) {
        $redirect_url .= (empty($message) ? '' : '&') . 'erreur=' . urlencode($erreur);
    }
    header('Location: ' . $redirect_url);
    exit();
}

// Messages récupérés via GET après redirection
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
if (isset($_GET['erreur'])) {
    $erreur = htmlspecialchars($_GET['erreur']);
}

// Affichage liste des personnes
require_once __DIR__ . '/../vues/personne/VuePersonne.php';
