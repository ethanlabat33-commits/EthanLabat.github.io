<?php
require_once __DIR__ . '/../DAO/ProduitDAO.php';
$dao = new ProduitDAO();

// Récupérer tous les produits
$produits = $dao->getAllProduits();
$existe = false; // Cette variable n'est pas utilisée dans l'exemple de rôle, je l'ai laissée pour cohérence si vous l'utilisez ailleurs.

// Après récupération des données
$produitAModifier = null;

if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($produits as $produit) {
        if ($produit->getIdProduit() === $id) {
            $produitAModifier = $produit;
            break;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $data = [
        'description' => trim($_POST['description'] ?? ''),
        'montant_exercice_ecoule' => empty($_POST['montant_exercice_ecoule']) ? null : floatval($_POST['montant_exercice_ecoule']),
        'montant_previsionnel' => empty($_POST['montant_previsionnel']) ? null : floatval($_POST['montant_previsionnel']),
        'id_dossier' => empty($_POST['id_dossier']) ? null : intval($_POST['id_dossier']),
        'id_CategProduit' => empty($_POST['id_CategProduit']) ? null : intval($_POST['id_CategProduit'])
    ];

    if ($action === 'ajouter') {
        if (empty($data['description'])) {
            $erreur = "La description du produit est obligatoire.";
        } else {
            $success = $dao->ajouterProduit($data);
            $message = $success ? "Produit ajouté." : "Erreur lors de l'ajout.";
        }
    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_produit'] ?? 0);
        if ($id > 0) {
            if (empty($data['description'])) {
                $erreur = "La description du produit est obligatoire.";
            } else {
                $success = $dao->modifierProduit($id, $data);
                $message = $success ? "Produit modifié." : "Erreur lors de la modification.";
            }
        } else {
            $erreur = "ID invalide.";
        }
    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_produit'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerProduit($id);
            $message = $success ? "Produit supprimé." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Actualiser la liste après modification
$produits = $dao->getAllProduits();

// Si on est en modification, charger la vue spécifique
if ($produitAModifier) {
    require_once __DIR__ . '/../vues/financier/VueModifierProduit.php'; 
} else {
    require_once __DIR__ . '/../vues/financier/VueProduit.php';
}