<?php
require_once __DIR__ . '/../DAO/CategorieProduitDAO.php';
$dao = new CategorieProduitDAO();

// Récupérer toutes les catégories de produits
$categoriesProduits = $dao->getAllCategoriesProduits();
$categorieProduitAModifier = null;

// Gérer la demande de modification
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    $categorieProduitAModifier = $dao->getCategorieProduitById($id);
}



// Gérer les actions POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'libelle_CategProduit' => trim($_POST['libelle_CategProduit'] ?? '')
    ];

    if ($action === 'ajouter') {
        if (empty($data['libelle_CategProduit'])) {
            $erreur = "Le libellé de la catégorie de produit est obligatoire.";
        } else {
            $success = $dao->ajouterCategorieProduit($data);
            $message = $success ? "Catégorie de produit ajoutée." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
         $id = intval($_POST['id_CategProduit'] ?? 0);
        if ($id > 0) {
            if (empty($data['libelle_CategProduit'])) {
                $erreur = "Le libellé de la catégorie de produit est obligatoire.";
            } else {
                $success = $dao->modifierCategorieProduit($id, $data);
                $message = $success ? "Catégorie de produit modifiée." : "Erreur lors de la modification.";
            }
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_CategProduit'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerCategorieProduit($id);
            $message = $success ? "Catégorie de produit supprimée." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
    // Après toute action, actualiser la liste
    $categoriesProduits = $dao->getAllCategoriesProduits();
}

// Charger la vue appropriée
if ($categorieProduitAModifier) {
    require_once __DIR__ . '/../vues/financier/VueModifiercategProduit.php';
} else {
    require_once __DIR__ . '/../vues/financier/VuecategProduit.php';
}