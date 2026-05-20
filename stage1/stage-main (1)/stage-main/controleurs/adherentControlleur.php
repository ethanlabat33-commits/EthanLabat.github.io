<?php
require_once __DIR__ . '/../DAO/AdherentDAO.php';
$dao = new AdherentDAO();

$adherents = $dao->getAllAdherents();
$adherentAModifier = null;
$erreur = '';
$message = '';

// Vérifie si on souhaite modifier un adhérent
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']);
    foreach ($adherents as $a) {
        if ($a['id_adherent'] === $id) {
            $adherentAModifier = $a;
            break;
        }
    }
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'ajouter') {
        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        $genre = $_POST['genre'] ?? '';
        $commune = trim($_POST['commune'] ?? '');
        $nb = intval($_POST['nombre_adherents'] ?? 0);

        if ($nom && $prenom && $age > 0 && $genre && $commune && $nb >= 0) {
            $success = $dao->ajouterAdherent($nom, $prenom, $age, $genre, $commune, $nb);
            $message = $success ? "Adhérent ajouté." : "Erreur lors de l'ajout.";
        } else {
            $erreur = "Tous les champs sont obligatoires.";
        }

    } elseif ($action === 'modifier') {
        $id = intval($_POST['id_adherent'] ?? 0);
        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        $genre = $_POST['genre'] ?? '';
        $commune = trim($_POST['commune'] ?? '');
        $nb = intval($_POST['nombre_adherents'] ?? 0);

        if ($id > 0 && $nom && $prenom && $age > 0 && $genre && $commune && $nb >= 0) {
            $success = $dao->modifierAdherent($id, $nom, $prenom, $age, $genre, $commune, $nb);
            $message = $success ? "Adhérent modifié." : "Erreur lors de la modification.";
        } else {
            $erreur = "Champs invalides pour la modification.";
        }

    } elseif ($action === 'supprimer') {
        $id = intval($_POST['id_adherent'] ?? 0);
        if ($id > 0) {
            $success = $dao->supprimerAdherentParId($id);
            $message = $success ? "Adhérent supprimé." : "Erreur lors de la suppression.";
        } else {
            $erreur = "ID invalide pour suppression.";
        }
    }
}

// Mise à jour de la liste après traitement
$adherents = $dao->getAllAdherents();

// Affichage de la vue
if ($adherentAModifier) {
    require_once __DIR__ . '/../vues/adherent/VueModifierAdherent.php';
} else {
    require_once __DIR__ . '/../vues/adherent/VueAdherent.php';
}
