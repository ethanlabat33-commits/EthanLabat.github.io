<?php

require_once __DIR__ . '/../DAO/AssociationDAO.php';
require_once __DIR__ . '/../DAO/ActiviteProposeeDAO.php';
require_once __DIR__ . '/../modele/Association.php'; 
require_once __DIR__ . '/../modele/ActiviteProposee.php';
require_once __DIR__ . '/../modele/Manifestation.php';
require_once __DIR__ . '/../DAO/ManifestationDAO.php'; 
require_once __DIR__ . '/..//modele/Personne.php';
require_once __DIR__ . '/../DAO/PersonneDAO.php';
require_once __DIR__ . '/../DAO/RessourcesHumainesDAO.php';
require_once __DIR__ . '/../modele/RessourcesHumaines.php';



$associationDAO = new AssociationDAO();
$activiteDAO = new ActiviteProposeeDAO();
$dao = new ManifestationDAO();
$ressourcesHumainesDAO = new RessourcesHumainesDAO();
// Initialisation des variables pour les vues
$personneDAO = new PersonneDAO();
$ressourcesHumaines = $ressourcesHumainesDAO->getAllRessourcesHumaines();
$personnes = $personneDAO->getAllPersonnes();
$manifestations = $dao->getAllManifestations();
$associations = $associationDAO->getAllAssociations(); // Liste de toutes les associations
$activites = $activiteDAO->getAllActivites();       // Liste de toutes les activités pour les <select>
$associationAModifier = null;
$erreurs = [];
$message = ''; // Message de succès
$erreur = '';  // Message d'erreur

// --- Logique de ROUTING et d'Affichage des FORMULAIRES ---

// Si l'URL demande explicitement de créer une association (e.g., index.php?page=creerassociation)
if (isset($_GET['page']) && $_GET['page'] === 'creerassociation') {
    require_once __DIR__ . '/../vues/association/VueCreerassociation.php';
    exit(); 
}

// Si l'URL demande explicitement de modifier une association (e.g., index.php?page=association&modifier_id=X)
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $associationAModifier = $associationDAO->getAssociationParId($id);

    if (!$associationAModifier) {
        $erreur = "Association à modifier non trouvée.";
        header('Location: index.php?page=association&erreur=' . urlencode($erreur));
        exit();
    }

    // 🔽 C'est ici que tu peux ajouter la récupération de la ressource
    $id_ressource_associee = $associationAModifier->getIdRessource();
    $ressource = null;
    if ($id_ressource_associee !== null) {
        $ressource = $ressourcesHumainesDAO->getRessourcesHumainesById($id_ressource_associee);
    }

    require_once __DIR__ . '/../vues/association/VueModifierassociation.php';
    exit(); 
}

// --- Logique de TRAITEMENT des ACTIONS POST (Ajout, Modification, Suppression) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // Récupération et nettoyage des données POST (pour ajout/modification)
    $data = [
        'nom_association' => trim($_POST['nom_association'] ?? ''),
        'numero_recepisse' => trim($_POST['numero_recepisse'] ?? ''),
        'date_parution_jo' => trim($_POST['date_parution_jo'] ?? ''),
        'numero_insee' => trim($_POST['numero_insee'] ?? ''),
        'objet_association' => trim($_POST['objet_association'] ?? ''),
        'adresse_siege_social' => trim($_POST['adresse_siege_social'] ?? ''),
        'code_postal_siege_social' => trim($_POST['code_postal_siege_social'] ?? ''),
        'commune_siege_social' => trim($_POST['commune_siege_social'] ?? ''),
        'telephone_siege_social' => trim($_POST['telephone_siege_social'] ?? ''),
        'email_siege_social' => trim($_POST['email_siege_social'] ?? ''),
        'id_activite' => isset($_POST['id_activite']) && $_POST['id_activite'] !== '' ? intval($_POST['id_activite']) : null, 
        'id_manifestation' => isset($_POST['id_manifestation']) && $_POST['id_manifestation'] !== '' ? intval($_POST['id_manifestation']) : null,   
        'id_personne' => isset($_POST['id_personne']) && $_POST['id_personne'] !== '' ? intval($_POST['id_personne']) : null,
        'id_ressources_humaines' => isset($_POST['id_ressources_humaines']) && $_POST['id_ressources_humaines'] !== '' ? intval($_POST['id_ressources_humaines']) : null,
    ];
    $ressourceData = [
    'nombre_benevoles' => $_POST['nombre_benevoles'] ?? null,
    'nombre_salaries_total' => $_POST['nombre_salaries_total'] ?? null,
    'nombre_salaries_autres' => $_POST['nombre_salaries_autres'] ?? null,
    'nombre_salaries_temps_complet' => $_POST['nombre_salaries_temps_complet'] ?? null,
    'nombre_salaries_temps_non_complet' => $_POST['nombre_salaries_temps_non_complet'] ?? null,
    'nombre_heures_hebdomadaires_salaries' => $_POST['nombre_heures_hebdomadaires_salaries'] ?? null
];

$idRessourceCreee = $ressourcesHumainesDAO->ajouterRessourcesHumaines($ressourceData);
$data['id_ressources_humaines'] = $idRessourceCreee;




    // --- VALIDATION (pour ajout/modification seulement) ---
    if ($action === 'ajouter' || $action === 'modifier') {
        if (empty($data['nom_association']) || preg_match('/\d/', $data['nom_association'])) {
            $erreurs[] = "Le nom de l'association est obligatoire et ne doit pas contenir de chiffres.";
        }
        if (!empty($data['numero_insee']) && !preg_match('/^\d{9}$/', $data['numero_insee'])) {
            $erreurs[] = "Le numéro INSEE doit contenir exactement 9 chiffres.";
        }
        if (!empty($data['email_siege_social']) && !filter_var($data['email_siege_social'], FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "L'adresse email est invalide.";
        }
        if (!empty($data['code_postal_siege_social']) && !preg_match('/^\d{5}$/', $data['code_postal_siege_social'])) {
            $erreurs[] = "Le code postal doit contenir 5 chiffres.";
        }
        if (!empty($data['telephone_siege_social']) && !preg_match('/^0[1-9](\d{2}){4}$/', $data['telephone_siege_social'])) {
            $erreurs[] = "Le numéro de téléphone est invalide.";
        }

        // Si des erreurs de validation sont présentes, réafficher le formulaire AVEC les erreurs et les données postées
        if (!empty($erreurs)) {
            if ($action === 'ajouter') {
                require_once __DIR__ . '/../vues/association/VueCreerassociation.php';
            } elseif ($action === 'modifier') {
                $id = intval($_POST['id_association'] ?? 0);
                $associationAModifier = Association::fromArray($data); 
                $associationAModifier->setIdAssociation($id); 
                require_once __DIR__ . '/../vues/association/VueModifierassociation.php';
            }
            exit(); 
        }
    }

    // === EXÉCUTION DES ACTIONS APRÈS VALIDATION (ou pour suppression qui a moins de validation de forme) ===
    if ($action === 'ajouter') {
        $success = $associationDAO->ajouterAssociation($data);
        $message = $success ? "Association ajoutée avec succès." : "Erreur lors de l'ajout de l'association.";
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_association'] ?? 0);
        if ($id > 0) {
            $success = $associationDAO->modifierAssociation($id, $data);
            $message = $success ? "Association modifiée avec succès." : "Erreur lors de la modification de l'association.";
        } else {
            $erreur = "ID d'association invalide pour la modification.";
        }
    } elseif ($action === 'supprimer') {
        // Pour la suppression, l'ID est la seule donnée importante.
        $id = intval($_POST['id_association'] ?? 0);
        if ($id > 0) {
            $success = $associationDAO->supprimerAssociationParId($id);
            $message = $success ? "Association supprimée avec succès." : "Erreur lors de la suppression de l'association.";
        } else {
            $erreur = "ID d'association invalide pour la suppression.";
        }
    }

    // --- REDIRECTION APRÈS TOUTE ACTION POST ---
    // C'est cette partie qui est CRUCIALE pour le problème de suppression.
    $redirect_url = 'index.php?page=association';
    if (!empty($message)) {
        $redirect_url .= '&message=' . urlencode($message);
    }
    if (!empty($erreur)) {
        // Utilise '&' si un message est déjà présent, sinon c'est le premier paramètre après '?'
        $redirect_url .= (empty($message) ? '' : '&') . 'erreur=' . urlencode($erreur);
    }
    header('Location: ' . $redirect_url);
    exit(); 
}

// --- Affichage par DÉFAUT (si aucune action POST ou GET de formulaire n'est déclenchée) ---
// Récupère les messages et erreurs qui ont été passés via l'URL après une redirection.
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
if (isset($_GET['erreur'])) {
    $erreur = htmlspecialchars($_GET['erreur']);
}

require_once __DIR__ . '/../vues/association/VueassociationPrincipal.php';