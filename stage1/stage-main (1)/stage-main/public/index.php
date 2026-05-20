<?php
// demarrer la session
session_start();

$page = $_GET['page'] ?? 'login';


//deconnexion
if ($page === 'deconnexion') {
    session_unset();
    session_destroy();
    header('Location: index.php?page=login');
    exit();
}

// Définition des pages protégées selon le rôle utilisateur
$pagesAdmin = ['home', 'creeractivite', 'bilan_financier', 'association', 'creerassociation', 'modifierassociation']; 
$pagesAsso = ['accueilAsso', 'voirActivites']; 

// "Vérification que l'utilisateur est connecté"
// "Vérification du rôle de l'utilisateur pour accéder à la page demandée"
if (in_array($page, array_merge($pagesAdmin, $pagesAsso))) {
    if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] !== true) {
        header('Location: index.php?page=login');
        exit();
    }

    $role = $_SESSION['role'] ?? '';
    if (in_array($page, $pagesAdmin) && $role !== 'admin') {
        echo "Accès réservé à l'admin.";
        exit();
    }

    if (in_array($page, $pagesAsso) && $role !== 'association') {
        echo "Accès réservé aux associations.";
        exit();
    }
}

if ($page !== 'login') {
    require_once __DIR__ . '/../config/accesDonnees.php';


    if ($_SESSION['role'] === 'admin') {
        require_once __DIR__ . '/../vues/header.php';
        require_once __DIR__ . '/../vues/VueGauche.php';
    }
}

// Liste des pages et leurs fichiers
$pages = [
    // Auth & accueil
    'login' => __DIR__ . '/../vues/VueLogin.php',
    'home' => __DIR__ . '/../vues/accueil.php', 
    'deconnexion' => '', 

    // Admin (General Admin Modules)
    // 'association' points to the controller, this is correct for the main list
    'association' => __DIR__ . '/../controleurs/associationControlleur.php',
    'mairie' => __DIR__ . '/../controleurs/mairieControlleur.php',
    'bilan_financier' => __DIR__ . '/../controleurs/bilanFinancierControlleur.php',
    'solde_comptes' => __DIR__ . '/../controleurs/soldeComptesControlleur.php',
    'financement_projet' => __DIR__ . '/../controleurs/financementProjetControlleur.php',

    // Produits et Charges
    'charge' => __DIR__ . '/../controleurs/chargeControlleur.php',
    'produit' => __DIR__ . '/../controleurs/produitControlleur.php',
    'creerProduit' => __DIR__ . '/../vues/financier/VuecreerProduit.php', 
    'categCharge' => __DIR__ . '/../controleurs/categ_chargeControlleur.php',
    'vueCategorieCharge' => __DIR__ . '/../vues/financier/VuecategCharges.php', 
    'modifierCategCharge' => __DIR__ . '/../vues/financier/VueModifiercategCharge.php', 
    'categProduit' => __DIR__ . '/../controleurs/categ_produitControlleur.php',
    'vueCategorieProduit' => __DIR__ . '/../vues/financier/VuecategProduit.php', 
    'creerCategCharges' => __DIR__ . '/../vues/financier/VueCreerCategCharges.php', 
    'creerCategProduit' => __DIR__ . '/../vues/financier/VuecreerCategProduit.php', 
    'modifierCategProduit' => __DIR__ . '/../finacier/VueModifierCategProduit.php',
    'creerCharge' => __DIR__ . '/../vues/financier/VuecreerCharges.php',
    'modifierCharges' => __DIR__ . '/../vues/financier/VueModifierCharges.php', 
    
    'VuebilanFinancier' => __DIR__ . '/../vues/financier/VuebilanFinancier.php',
    'VuecreerBilan' => __DIR__ . '/../vues/financier/VuecreerBilan.php',
    'VueModifierBilan' => __DIR__ . '/../vues/financier/VuemodifierBilan.php',
    'Vuesolde' => __DIR__ . '/../vues/financier/VuesoldeComptes.php',
    
    // Controllers for these main financial sections
    'bilan_financier' => __DIR__ . '/../controleurs/bilan_financierControlleur.php', 
    'solde_comptes' => __DIR__ . '/../controleurs/solde_comptesControlleur.php', 
    'financement_projet' => __DIR__ . '/../controleurs/financement_projetControlleur.php',

    // Activité et manifestation
    'activite' => __DIR__ . '/../controleurs/activite_proposeeControlleur.php',
    'creeractivite' => __DIR__ . '/../vues/activite/VueCreeractivite.php',
    
    'creerassociation' => __DIR__ . '/../controleurs/associationControlleur.php',
    'modifierassociation' => __DIR__ . '/../controleurs/associationControlleur.php', 

    'modifieractivite' => __DIR__ . '/../vues/activite/VueModifieractivite.php', 
    'infoActivite' => __DIR__ . '/../vues/activite/VueInfoActivite.php', 
    'manifestation' => __DIR__ . '/../controleurs/manifestationControlleur.php',
    'vueManifestation' => __DIR__ . '/../vues/manifestation/Vuemanifestation.php', 
    'creermanifestation' => __DIR__ . '/../vues/manifestation/VueCreermanifestation.php', 
    'infoManif' => __DIR__ . '/../vues/manifestation/VueinfoManifestation.php', 

    // Personne / rôle
    'personne' => __DIR__ . '/../controleurs/personneControlleur.php',
    'vuePersonne' => __DIR__ . '/../vues/personne/Vuepersonne.php', 
    'modifierpersonne' => __DIR__ . '/../vues/personne/VueModifierPersonnes.php', 

    'roles' => __DIR__ . '/../controleurs/role_personne_associationControlleur.php',
    'rolesView' => __DIR__ . '/../vues/roles/Vuerole_personne_association.php', 
    'creerRole' => __DIR__ . '/../vues/roles/VueCreerRole.php', 
    'ressourcesHumaines' => __DIR__ . '/../controleurs/ressources_humainesControlleur.php', 
    'creerRessource' => __DIR__ . '/../vues/infoPersonne/VueCreerRessources.php', 

    // Adhésion
    'adherent' => __DIR__ . '/../controleurs/adherentControlleur.php',
    'creeradherent' => __DIR__ . '/../vues/adherent/VueCreeradherent.php', 
    'modifieradherent' => __DIR__ . '/../vues/adherent/VueModifieradherent.php', 
    'adhesion' => __DIR__ . '/../vues/adhesion/Vueadhesion.php', 
    'creeradhesion' => __DIR__ . '/../vues/adhesion/Vuecreeradhesion.php', 
    'modifieradhesion' => __DIR__ . '/../vues/adhesion/Vuemodifieradhesion.php', 

    // Dossiers
    'dossier' => __DIR__ . '/../controleurs/dossier_subventionControlleur.php',
    'Vuedossier' => __DIR__ . '/../vues/Dossier/VueDossier.php', 
    'CreerDossierAdmin' => __DIR__ . '/../controleurs/dossier_subventionControlleur.php',
    'VueCreerDossierAdmin' => __DIR__ . '/../vues/Dossier/CreerDossierAdmin.php',
    'CreerDossierAsso' => __DIR__ . '/../vues/dossier/VueCreerDossier.php', 
    'infoAssociation' => __DIR__ . '/../vues/association/VueinfoAssociation.php', 
    'accueilAsso' => __DIR__ . '/../vues/VueAccueilAsso.php',

    // Divers
    'contact' => __DIR__ . '/../vues/Vuecontact.php',
    'VueFinancier' => __DIR__ . '/../vues/financier/VueFinancier.php', 
    'home' => __DIR__ . '/../controleurs/mairieControlleur.php', 
];




if (array_key_exists($page, $pages)) {
    if ($page !== 'login' && $page !== 'deconnexion') {
        require $pages[$page];
    } elseif ($page === 'login') {
        require_once __DIR__ . '/../vues/VueLogin.php';
    }
} else {
    echo "<h2>Page non trouvée</h2>";
}
?>