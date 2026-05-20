<?php
// Inclusion de la classe DAO pour interagir avec les données des activités
require_once __DIR__ . '/../DAO/ActiviteProposeeDAO.php';
// Instanciation de l'objet DAO
$dao = new ActiviteProposeeDAO();
// Récupération de la liste des activités existantes
$activites = $dao->getAllActivites();
// Initialisation des variables (erreurs, messages, activité à modifier)
$activiteAModifier = null;
$erreurs = [];
$message = '';
$erreur = '';

// Si une demande de modification est détectée, on recherche l'activité correspondante
if (isset($_GET['modifier_id'])) {
    $id = intval($_GET['modifier_id']); // Conversion en entier pour sécurité
    foreach ($activites as $activite) {
        if ($activite->getIdActivite() === $id) {
            $activiteAModifier = $activite;
            break;
        }
    }
}

// Traitement du formulaire selon l'action envoyée (ajouter, modifier, supprimer)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $description = trim($_POST['description_activite'] ?? '');

    // Validation simple
    if ($action !== 'supprimer' && $description === '') {
        $erreurs[] = "La description de l'activité est obligatoire.";
    }

    if (empty($erreurs)) {
        // Ajout d'une nouvelle activité si la description est fournie
        if ($action === 'ajouter') {
            $success = $dao->ajouterActivite($description);
            $message = $success ? "Activité ajoutée." : "Erreur lors de l'ajout.";
        } elseif ($action === 'modifier') {
            // Modification de l'activité existante avec l'ID donné
            $id = intval($_POST['id_activite'] ?? 0);
            if ($id > 0) {
                $success = $dao->modifierActivite($id, $description);
                $message = $success ? "Activité modifiée." : "Erreur lors de la modification.";
            } else {
                $erreur = "ID invalide.";
            }
        } elseif ($action === 'supprimer') {
            // Suppression de l'activité en fonction de l'ID transmis
            $id = intval($_POST['id_activite'] ?? 0);
            if ($id > 0) {
                $success = $dao->supprimerActiviteParId($id);
                $message = $success ? "Activité supprimée." : "Erreur lors de la suppression.";
            } else {
                $erreur = "ID invalide pour suppression.";
            }
        }
    }

// Mise à jour de la liste des activités après traitement
    $activites = $dao->getAllActivites();
}

// Affichage de la vue correspondante : modification ou liste des activités
if ($activiteAModifier) {
    require_once __DIR__ . '/../vues/activite/VueModifieractivite.php';
} else {
    require_once __DIR__ . '/../vues/activite/Vueactivite_proposee.php';
}
