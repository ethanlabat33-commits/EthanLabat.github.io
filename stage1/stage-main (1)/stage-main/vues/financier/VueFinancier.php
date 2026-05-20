<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../VueGauche.php';
?>

<link rel="stylesheet" href="styles.css">

<div class="container">
    <h1>📊 Tableau de bord financier</h1>
    
    <div class="finance-grid">

        <a href="index.php?page=charge" class="finance-card">
            💸
            <h2>Charges</h2>
            <p>Ajouter ou consulter les dépenses enregistrées</p>
        </a>

        <a href="index.php?page=produit" class="finance-card">
            💰
            <h2>Produits</h2>
            <p>Voir les recettes : subventions, cotisations, etc.</p>
        </a>

        <a href="index.php?page=categCharge" class="finance-card">
            📂
            <h2>Catégories de charges</h2>
            <p>Gérer les types de dépenses</p>
        </a>

        <a href="index.php?page=categProduit" class="finance-card">
            📁
            <h2>Catégories de produits</h2>
            <p>Gérer les sources de recettes</p>
        </a>

        <a href="index.php?page=bilan_financier" class="finance-card">
            📈
            <h2>Bilan financier</h2>
            <p>Comparer charges et produits par période</p>
        </a>

        <a href="index.php?page=Vuesolde" class="finance-card">
            🏦
            <h2>Soldes des comptes</h2>
            <p>Visualiser les comptes et leur solde</p>
        </a>

        <a href="index.php?page=financement_projet" class="finance-card">
            🤝
            <h2>Financements de projets</h2>
            <p>Voir les financements reçus par projet</p>
        </a>

    </div>
</div>
