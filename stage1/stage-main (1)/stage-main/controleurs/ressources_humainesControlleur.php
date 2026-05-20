<?php
require_once __DIR__ . '/../DAO/RessourcesHumainesDAO.php';
$dao = new RessourcesHumainesDAO();

// Récupérer toutes les ressources humaines
$ressourcesHumaines = $dao->getAllRessourcesHumaines();
$existe = false;

// Après récupération des données
$ressourceAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($ressourcesHumaines as $ressource) {
        if ($ressource->getIdRessourcesHumaines() === $id) {
            $ressourceAModifier = $ressource;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'nombre_benevoles' => intval($_POST['nombre_benevoles'] ?? 0),
        'nombre_salaries_total' => intval($_POST['nombre_salaries_total'] ?? 0),
        'nombre_salaries_autres' => intval($_POST['nombre_salaries_autres'] ?? 0),
        'nombre_salaries_temps_complet' => intval($_POST['nombre_salaries_temps_complet'] ?? 0),
        'nombre_salaries_temps_non_complet' => intval($_POST['nombre_salaries_temps_non_complet'] ?? 0),
        'nombre_heures_hebdomadaires_salaries' => intval($_POST['nombre_heures_hebdomadaires_salaries'] ?? 0),
        'id_dossier' => intval($_POST['id_dossier'] ?? 0)
    ];

    if ($action === 'ajouter') {
        $success = $dao->ajouterRessourcesHumaines($data);
        $message = $success ? "Ressources humaines ajoutées." : "Erreur lors de l'ajout.";
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_ressources_humaines'] ?? 0);
        if ($id > 0) {
            $success = $dao->modifierRessourcesHumaines($id, $data);
            $message = $success ? "Ressources humaines modifiées." : "Erreur lors de la modification.";
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_ressources_humaines'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerRessourcesHumaines($id);
            $message = $success ? "Ressources humaines supprimées." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$ressourcesHumaines = $dao->getAllRessourcesHumaines();

// Si on est en modification, charger la vue spécifique
if ($ressourceAModifier) {
    require_once __DIR__ . '/../vues/infoPersonne/VueModifierRessources.php';
} else {
    require_once __DIR__ . '/../vues/infoPersonne/Vueressources_humaines.php';
}