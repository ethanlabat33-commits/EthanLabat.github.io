<?php
require_once __DIR__ . '/../DAO/CategorieChargeDAO.php';
$dao = new CategorieChargeDAO();

// Récupérer toutes les catégories de charges
$categoriesCharges = $dao->getAllCategoriesCharges();
$categorieChargeAModifier = null;

// Gérer la demande de modification (quand on clique sur "Modifier" depuis la liste)
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $categorieChargeAModifier = $dao->getCategorieChargeById($id);
}

// Gérer les actions POST (ajouter, modifier, supprimer)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'libelle_categorie' => trim($_POST['libelle_categorie'] ?? '') // Utilisation de libelle_categorie
    ];

    if ($action === 'ajouter') {
        if (empty($data['libelle_categorie'])) {
            $erreur = "Le libellé de la catégorie de charge est obligatoire.";
        } else {
            $success = $dao->ajouterCategorieCharge($data);
            $message = $success ? "Catégorie de charge ajoutée." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_categorie_charge'] ?? 0); // Utilisation de id_categorie_charge
        if ($id > 0) {
            if (empty($data['libelle_categorie'])) {
                $erreur = "Le libellé de la catégorie de charge est obligatoire.";
            } else {
                $success = $dao->modifierCategorieCharge($id, $data);
                $message = $success ? "Catégorie de charge modifiée." : "Erreur lors de la modification.";
            }
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_categorie_charge'] ?? 0); // Utilisation de id_categorie_charge
        if ($id > 0) {
            $success = $dao->supprimerCategorieCharge($id);
            $message = $success ? "Catégorie de charge supprimée." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
    // Après toute action, actualiser la liste des catégories de charges
    $categoriesCharges = $dao->getAllCategoriesCharges();
}

// Charger la vue appropriée
if ($categorieChargeAModifier) {
    require_once __DIR__ . '/../vues/financier/VueModifiercategCharge.php'; // Vue pour créer/modifier
} else {
    require_once __DIR__ . '/../vues/financier/VuecategCharges.php'; // Vue pour lister
}