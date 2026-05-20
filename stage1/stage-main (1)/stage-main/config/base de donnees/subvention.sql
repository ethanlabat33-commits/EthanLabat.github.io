-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 juin 2025 à 14:39
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `subvention`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite_proposee`
--

DROP TABLE IF EXISTS `activite_proposee`;
CREATE TABLE IF NOT EXISTS `activite_proposee` (
  `id_activite` int NOT NULL AUTO_INCREMENT,
  `description_activite` text,
  `id_association` int DEFAULT NULL,
  PRIMARY KEY (`id_activite`),
  KEY `id_association` (`id_association`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `activite_proposee`
--

INSERT INTO `activite_proposee` (`id_activite`, `description_activite`, `id_association`) VALUES
(36, 'foot', NULL),
(37, 'rugby', NULL),
(38, 'tennis', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id_adherent` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `genre` varchar(10) DEFAULT NULL,
  `commune` varchar(100) DEFAULT NULL,
  `nombre_adherents` int DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_adherent`),
  KEY `adherent_ibfk_1` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `age`, `genre`, `commune`, `nombre_adherents`, `id_dossier`) VALUES
(9, 'labat', 'labat', 72, 'Homme', 'ezfcv', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `adhesion`
--

DROP TABLE IF EXISTS `adhesion`;
CREATE TABLE IF NOT EXISTS `adhesion` (
  `id_adhesion` int NOT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `details` text,
  `id_dossier` int DEFAULT NULL,
  `id_type_adhesion` int DEFAULT NULL,
  PRIMARY KEY (`id_adhesion`),
  KEY `id_dossier` (`id_dossier`),
  KEY `id_type_adhesion` (`id_type_adhesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

DROP TABLE IF EXISTS `association`;
CREATE TABLE IF NOT EXISTS `association` (
  `id_association` int NOT NULL AUTO_INCREMENT,
  `nom_association` varchar(255) NOT NULL,
  `numero_recepisse` varchar(50) DEFAULT NULL,
  `date_parution_jo` date DEFAULT NULL,
  `numero_insee` varchar(50) DEFAULT NULL,
  `objet_association` text,
  `adresse_siege_social` varchar(255) DEFAULT NULL,
  `code_postal_siege_social` varchar(10) DEFAULT NULL,
  `commune_siege_social` varchar(100) DEFAULT NULL,
  `telephone_siege_social` varchar(20) DEFAULT NULL,
  `email_siege_social` varchar(100) DEFAULT NULL,
  `id_activite` int DEFAULT NULL,
  `id_manifestation` int DEFAULT NULL,
  `id_personne` int DEFAULT NULL,
  `id_ressources_humaines` int DEFAULT NULL,
  PRIMARY KEY (`id_association`),
  KEY `id_personne` (`id_personne`),
  KEY `fk_ressources_humaines` (`id_ressources_humaines`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`id_association`, `nom_association`, `numero_recepisse`, `date_parution_jo`, `numero_insee`, `objet_association`, `adresse_siege_social`, `code_postal_siege_social`, `commune_siege_social`, `telephone_siege_social`, `email_siege_social`, `id_activite`, `id_manifestation`, `id_personne`, `id_ressources_humaines`) VALUES
(1, 'ACCA', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '07.45.16.19.00', 'acca.stsymphorien@gmail.com', NULL, NULL, NULL, NULL),
(2, 'AFAFAF', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.82.80.69.80', 'gaeccdetaillepied@orange.fr', NULL, NULL, NULL, NULL),
(3, 'A.F.N', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.37.82.25.67', 'philippe.pennerat@gmail.com', NULL, NULL, NULL, NULL),
(4, 'APE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.15.67.19.96', 'ape.stsymphorien79@gmail.com', NULL, NULL, NULL, NULL),
(5, 'BADMINTON', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.27.16.42.75', 'bad.loisir79@gmail.com', NULL, NULL, NULL, NULL),
(6, 'CLUB MULTISPORTS', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.08.23.37.36', 'cecileletellier@hotmail.com', NULL, NULL, NULL, NULL),
(7, 'COMITÉ DES FÊTES', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.25.14.11.08', 'cdf79270@gmail.com', NULL, NULL, NULL, NULL),
(8, 'COPAINS COPINES', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.06.43.42.91', 'copainscopines79@gmail.com', NULL, NULL, NULL, NULL),
(9, 'CUMA', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.31.40.80.96', 'cumastsym478@gmail.com', NULL, NULL, NULL, NULL),
(10, 'CYCLOS RANDONNEURS ACR2S', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.82.59.53.40', 'president@acr2s79.fr', NULL, NULL, NULL, NULL),
(11, 'ENVIE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.60.41.23.04', 'associationenvie8@gmail.com', NULL, NULL, NULL, NULL),
(12, 'ESS FOOT LOISIR', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.24.67.46.50', 'domitexier@orange.fr', NULL, NULL, NULL, NULL),
(13, 'ESS TENNIS', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.20.81.06.59', 'tc.stsymphorien@gmail.com', NULL, NULL, NULL, NULL),
(14, 'FAN D\'ART', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.34.19.38.23', 'fanny.morand@sfr.fr', NULL, NULL, NULL, NULL),
(15, 'FANFARE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '05.49.09.52.53', 'michel.zandona0972@orange.fr', NULL, NULL, NULL, NULL),
(16, 'HANDI-SIDE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.15.08.13.75', 'pcarbonnier@bernistrucks.fr', NULL, NULL, NULL, NULL),
(17, 'LA VEDETTE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '05.49.09.54.57', 'valerieboechaud@orange.fr', NULL, NULL, NULL, NULL),
(18, 'PARLONS-EN', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.65.70.38.39', 'parlonsen79270@gmail.com', NULL, NULL, NULL, NULL),
(19, 'PRANA YOGA', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.84.20.73.91', 'pranayoga79@gmail.com', NULL, NULL, NULL, NULL),
(20, 'TAEKWONDO DU MARAIS', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.30.43.36.07', 'tkdumarais@gmail.com', NULL, NULL, NULL, NULL),
(21, 'USF2S', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.09.09.30.74', 'usf2sclub@gmail.com', NULL, NULL, NULL, NULL),
(22, 'GYMNASTIQUE VOLONTAIRE', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.71.85.55.19', 'saintsymphoriengym@gmail.com', NULL, NULL, NULL, NULL),
(23, 'HBSUD 79', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.25.08.16.53', 'secretariat.hbsud79@gmail.com', NULL, NULL, NULL, NULL),
(24, 'LES VIROUNOUX D\'AU BIEF', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.78.23.94.84', 'maryline.palardi@neuf.fr', NULL, NULL, NULL, NULL),
(25, 'POINT DE RENCONTRE AÎNÉS', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.74.54.64.92', 'marie-claude.mainet@orange.fr', NULL, NULL, NULL, NULL),
(26, 'ST SYMP P\'TITS POINTS', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '06.76.81.41.35', 'yvetteddesman@orange.fr', NULL, NULL, NULL, NULL),
(27, 'TIR \"L\'AVENIR\"', NULL, NULL, NULL, NULL, NULL, NULL, 'Saint-Symphorien', '05.49.09.50.78', 'bourdin.famille@wanadoo.fr', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `attestation`
--

DROP TABLE IF EXISTS `attestation`;
CREATE TABLE IF NOT EXISTS `attestation` (
  `id_attestation` int NOT NULL,
  `referent_association` varchar(255) DEFAULT NULL,
  `accepte_diffusion` tinyint(1) DEFAULT NULL,
  `certifie_information` tinyint(1) DEFAULT NULL,
  `certifie_asso_declaree` tinyint(1) DEFAULT NULL,
  `certifie_reglementation` tinyint(1) DEFAULT NULL,
  `precises_versement` tinyint(1) DEFAULT NULL,
  `lieu_signature` varchar(255) DEFAULT NULL,
  `date_signature` date DEFAULT NULL,
  `signature` text,
  `id_dossier` int DEFAULT NULL,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_attestation`),
  KEY `id_personne` (`id_personne`),
  KEY `attestation_ibfk_1` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bilan_financier`
--

DROP TABLE IF EXISTS `bilan_financier`;
CREATE TABLE IF NOT EXISTS `bilan_financier` (
  `id_bilan_financier` int NOT NULL AUTO_INCREMENT,
  `annee_exercice` int DEFAULT NULL,
  `total_charges_exercice_ecoule` decimal(15,2) DEFAULT NULL,
  `total_charges_previsionnel` decimal(15,2) DEFAULT NULL,
  `total_produits_exercice_ecoule` decimal(15,2) DEFAULT NULL,
  `total_produits_previsionnel` decimal(15,2) DEFAULT NULL,
  `resultat_exercice_ecoule` decimal(15,2) DEFAULT NULL,
  `resultat_previsionnel` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_bilan_financier`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `bilan_financier`
--

INSERT INTO `bilan_financier` (`id_bilan_financier`, `annee_exercice`, `total_charges_exercice_ecoule`, `total_charges_previsionnel`, `total_produits_exercice_ecoule`, `total_produits_previsionnel`, `resultat_exercice_ecoule`, `resultat_previsionnel`, `id_dossier`) VALUES
(1, 75, 57.00, 75.00, 75.00, 75.00, 75.00, 57.00, 0),
(2, 1, 1.00, 1.00, 1.00, 1.00, 1.00, 1.00, 0),
(3, 75, 75.00, 75.00, 57.00, 75.00, 75.00, 57.00, 0),
(4, 58, 75.00, 75.00, 57.00, 75.00, 75.00, 57.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categ_charge`
--

DROP TABLE IF EXISTS `categ_charge`;
CREATE TABLE IF NOT EXISTS `categ_charge` (
  `id_categorie_charge` int NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_categorie_charge`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categ_charge`
--

INSERT INTO `categ_charge` (`id_categorie_charge`, `libelle_categorie`) VALUES
(60, 'Achats'),
(61, 'Services extérieurs'),
(62, 'Autres services extérieurs'),
(63, 'Impôts et taxes'),
(64, 'Charges du personnel'),
(65, 'Autres charges de gestion'),
(66, 'Charges financières'),
(67, 'Charges exceptionnelles');

-- --------------------------------------------------------

--
-- Structure de la table `categ_produit`
--

DROP TABLE IF EXISTS `categ_produit`;
CREATE TABLE IF NOT EXISTS `categ_produit` (
  `id_CategProduit` int NOT NULL AUTO_INCREMENT,
  `libelle_CategProduit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_CategProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categ_produit`
--

INSERT INTO `categ_produit` (`id_CategProduit`, `libelle_CategProduit`) VALUES
(70, 'Prestations de services'),
(74, 'Subventions de la commune et autre subvention'),
(75, 'Produits de gestion'),
(76, 'Produits financiers'),
(77, 'Produits exceptionnels');

-- --------------------------------------------------------

--
-- Structure de la table `charge`
--

DROP TABLE IF EXISTS `charge`;
CREATE TABLE IF NOT EXISTS `charge` (
  `id_charge` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `montant_exercice_ecoule` decimal(15,2) DEFAULT NULL,
  `montant_previsionnel` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  `id_categorie_charge` int DEFAULT NULL,
  PRIMARY KEY (`id_charge`),
  KEY `charge_ibfk_2` (`id_categorie_charge`),
  KEY `charge_ibfk_1` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `charge`
--

INSERT INTO `charge` (`id_charge`, `description`, `montant_exercice_ecoule`, `montant_previsionnel`, `id_dossier`, `id_categorie_charge`) VALUES
(1, 'Fournitures d’entretien - petit équipement', NULL, NULL, NULL, 60),
(2, 'Fournitures administratives', NULL, NULL, NULL, 60),
(3, 'Marchandises destinées à la revente', NULL, NULL, NULL, 60),
(4, 'Autres fournitures', NULL, NULL, NULL, 60),
(5, 'Locations salles, matériel', NULL, NULL, NULL, 61),
(6, 'Documentation', NULL, NULL, NULL, 61),
(7, 'Travaux d’entretien / réparation', NULL, NULL, NULL, 61),
(8, 'Assurances', NULL, NULL, NULL, 61),
(9, 'Divers', NULL, NULL, NULL, 61),
(10, 'Rémunérations d’intermédiaires, honoraires', NULL, NULL, NULL, 62),
(11, 'Publicité, publication', NULL, NULL, NULL, 62),
(12, 'Photocopies', NULL, NULL, NULL, 62),
(13, 'Voyages et déplacement', NULL, NULL, NULL, 62),
(14, 'Frais de réception', NULL, NULL, NULL, 62),
(15, 'Frais postaux - téléphone', NULL, NULL, NULL, 62),
(16, 'Frais de manifestations', NULL, NULL, NULL, 62),
(17, 'Services bancaires (carte bancaire, frais)', NULL, NULL, NULL, 62),
(18, 'Autres frais', NULL, NULL, NULL, 62),
(19, 'Participation employeur à la formation', NULL, NULL, NULL, 63),
(20, 'Autres impots', NULL, NULL, NULL, 63),
(21, 'Rémunération du personnel', NULL, NULL, NULL, 64),
(22, 'Primes, avantages divers', NULL, NULL, NULL, 64),
(23, 'Charges patronales (URSSAF, retraite, Assedic)', NULL, NULL, NULL, 64),
(24, 'Médecine du travail - pharmacie', NULL, NULL, NULL, 64),
(25, 'Autres charges du personnel', NULL, NULL, NULL, 64),
(26, 'Licences fédération', NULL, NULL, NULL, 65),
(27, 'SACEM', NULL, NULL, NULL, 65),
(28, 'Autres cotisations', NULL, NULL, NULL, 65),
(29, 'Autres charges de gestion', NULL, NULL, NULL, 65),
(30, 'Intérêts d’emprunts', NULL, NULL, NULL, 66),
(31, 'Autres charges financières (agios)', NULL, NULL, NULL, 66),
(32, 'Pénalités et amendes fiscales, ou pénales', NULL, NULL, NULL, 67),
(33, 'Dons', NULL, NULL, NULL, 67),
(34, 'Autres charges exceptionnelles', NULL, NULL, NULL, 67);

-- --------------------------------------------------------

--
-- Structure de la table `dossier_subvention`
--

DROP TABLE IF EXISTS `dossier_subvention`;
CREATE TABLE IF NOT EXISTS `dossier_subvention` (
  `id_dossier` int NOT NULL AUTO_INCREMENT,
  `annee_demande` int DEFAULT NULL,
  `date_depot` date DEFAULT NULL,
  `date_limite_depot` date DEFAULT NULL,
  `rib` varchar(50) DEFAULT NULL,
  `copie_statut` tinyint(1) DEFAULT NULL,
  `recepisse_declaration` tinyint(1) DEFAULT NULL,
  `recepisse_prefecture_maj` tinyint(1) DEFAULT NULL,
  `pv_derniere_assemblee` tinyint(1) DEFAULT NULL,
  `derniers_extraits_compte` tinyint(1) DEFAULT NULL,
  `id_association` int DEFAULT NULL,
  `id_mairie` int DEFAULT NULL,
  `id_manifestation` int DEFAULT NULL,
  PRIMARY KEY (`id_dossier`),
  KEY `id_association` (`id_association`),
  KEY `id_mairie` (`id_mairie`),
  KEY `fk_manifestation_dossier` (`id_manifestation`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `financement_projet`
--

DROP TABLE IF EXISTS `financement_projet`;
CREATE TABLE IF NOT EXISTS `financement_projet` (
  `id_financement` int NOT NULL,
  `type_financement` varchar(100) DEFAULT NULL,
  `montant_sollicite` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_financement`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `infos_bancaires`
--

DROP TABLE IF EXISTS `infos_bancaires`;
CREATE TABLE IF NOT EXISTS `infos_bancaires` (
  `id_infos_bancaires` int NOT NULL,
  `nom_titulaire_compte` varchar(255) DEFAULT NULL,
  `banque` varchar(255) DEFAULT NULL,
  `domiciliation` varchar(255) DEFAULT NULL,
  `code_banque` varchar(20) DEFAULT NULL,
  `code_guichet` varchar(20) DEFAULT NULL,
  `numero_compte` varchar(50) DEFAULT NULL,
  `cle_rib` varchar(10) DEFAULT NULL,
  `id_attestation` int DEFAULT NULL,
  PRIMARY KEY (`id_infos_bancaires`),
  KEY `id_attestation` (`id_attestation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mairie`
--

DROP TABLE IF EXISTS `mairie`;
CREATE TABLE IF NOT EXISTS `mairie` (
  `id_mairie` int NOT NULL,
  `nom_mairie` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `numero_telephone` varchar(20) DEFAULT NULL,
  `adresse_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_mairie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mairie`
--

INSERT INTO `mairie` (`id_mairie`, `nom_mairie`, `adresse`, `code_postal`, `ville`, `numero_telephone`, `adresse_email`) VALUES
(1, 'Mairie de Saint Symphorien', '5 place René Cassin', '79270', 'Saint Symphorien', '05 49 09 53 53', 'mairie@saint-symphorien79.fr');

-- --------------------------------------------------------

--
-- Structure de la table `manifestation`
--

DROP TABLE IF EXISTS `manifestation`;
CREATE TABLE IF NOT EXISTS `manifestation` (
  `id_manifestation` int NOT NULL AUTO_INCREMENT,
  `date_manifestation` date DEFAULT NULL,
  `nom_manifestation` varchar(255) DEFAULT NULL,
  `statut_manifestation` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `NombreEntre` int DEFAULT NULL,
  `resultatFinancier` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_manifestation`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_association` int DEFAULT NULL,
  `id_role` int DEFAULT NULL,
  PRIMARY KEY (`id_personne`),
  KEY `id_association` (`id_association`),
  KEY `personne_ibfk_2` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `montant_exercice_ecoule` decimal(15,2) DEFAULT NULL,
  `montant_previsionnel` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  `id_CategProduit` int DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `produit_ibfk_2` (`id_CategProduit`),
  KEY `produit_ibfk_1` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `description`, `montant_exercice_ecoule`, `montant_previsionnel`, `id_dossier`, `id_CategProduit`) VALUES
(1, 'Recettes des manifestations', NULL, NULL, NULL, 70),
(2, 'Recettes annexes (casquettes, tee-shirts, verres, etc.)', NULL, NULL, NULL, 70),
(3, 'Recettes de publicité', NULL, NULL, NULL, 70),
(4, 'Locations diverses', NULL, NULL, NULL, 70),
(5, 'Autres prestations de services', NULL, NULL, NULL, 70),
(6, 'Subvention municipale - fonctionnement', NULL, NULL, NULL, 74),
(7, 'Subvention municipale - exceptionnelle (manifestation)', NULL, NULL, NULL, 74),
(8, 'Subvention Conseil général', NULL, NULL, NULL, 74),
(9, 'Subvention Conseil régional', NULL, NULL, NULL, 74),
(10, 'Subvention État', NULL, NULL, NULL, 74),
(11, 'Subvention autres communes', NULL, NULL, NULL, 74),
(12, 'Subvention autres organismes', NULL, NULL, NULL, 74),
(13, 'Partenaires privés', NULL, NULL, NULL, 74),
(14, 'Licences fédération', NULL, NULL, NULL, 75),
(15, 'Collectes - dons', NULL, NULL, NULL, 75),
(16, 'Cotisations', NULL, NULL, NULL, 75),
(17, 'Autres produits de gestion', NULL, NULL, NULL, 75),
(18, 'Revenus de placements (livret, etc...)', NULL, NULL, NULL, 76),
(19, 'Autres produits financiers', NULL, NULL, NULL, 76),
(20, 'Produits exceptionnels', NULL, NULL, NULL, 77);

-- --------------------------------------------------------

--
-- Structure de la table `projet_subvention`
--

DROP TABLE IF EXISTS `projet_subvention`;
CREATE TABLE IF NOT EXISTS `projet_subvention` (
  `id_projet` int NOT NULL,
  `Presentation_projet` text,
  `Cout_total` decimal(15,2) DEFAULT NULL,
  `autofinancement` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `remarque`
--

DROP TABLE IF EXISTS `remarque`;
CREATE TABLE IF NOT EXISTS `remarque` (
  `id_remarque` int NOT NULL,
  `texte` text,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_remarque`),
  KEY `remarque_ibfk_1` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ressources_humaines`
--

DROP TABLE IF EXISTS `ressources_humaines`;
CREATE TABLE IF NOT EXISTS `ressources_humaines` (
  `id_ressources_humaines` int NOT NULL AUTO_INCREMENT,
  `nombre_benevoles` int DEFAULT NULL,
  `nombre_salaries_total` int DEFAULT NULL,
  `nombre_salaries_autres` int DEFAULT NULL,
  `nombre_salaries_temps_complet` int DEFAULT NULL,
  `nombre_salaries_temps_non_complet` int DEFAULT NULL,
  `nombre_heures_hebdomadaires_salaries` int DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_ressources_humaines`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role_personne_association`
--

DROP TABLE IF EXISTS `role_personne_association`;
CREATE TABLE IF NOT EXISTS `role_personne_association` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role_personne_association`
--

INSERT INTO `role_personne_association` (`id_role`, `role`) VALUES
(1, 'Président'),
(2, 'Vice-Président'),
(3, 'Trésorier'),
(4, 'Secrétaire');

-- --------------------------------------------------------

--
-- Structure de la table `solde_comptes`
--

DROP TABLE IF EXISTS `solde_comptes`;
CREATE TABLE IF NOT EXISTS `solde_comptes` (
  `id_solde_compte` int NOT NULL,
  `montant_solde` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_solde_compte`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `total_soldes_comptes`
--

DROP TABLE IF EXISTS `total_soldes_comptes`;
CREATE TABLE IF NOT EXISTS `total_soldes_comptes` (
  `id_total_soldes` int NOT NULL,
  `montant_total_solde` decimal(15,2) DEFAULT NULL,
  `id_dossier` int DEFAULT NULL,
  PRIMARY KEY (`id_total_soldes`),
  KEY `id_dossier` (`id_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_adhesion`
--

DROP TABLE IF EXISTS `type_adhesion`;
CREATE TABLE IF NOT EXISTS `type_adhesion` (
  `id_type_adhesion` int NOT NULL,
  `libelle_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_type_adhesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_subvention` (`id_dossier`);

--
-- Contraintes pour la table `adhesion`
--
ALTER TABLE `adhesion`
  ADD CONSTRAINT `adhesion_ibfk_2` FOREIGN KEY (`id_type_adhesion`) REFERENCES `type_adhesion` (`id_type_adhesion`);

--
-- Contraintes pour la table `association`
--
ALTER TABLE `association`
  ADD CONSTRAINT `association_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `fk_ressources_humaines` FOREIGN KEY (`id_ressources_humaines`) REFERENCES `ressources_humaines` (`id_ressources_humaines`) ON DELETE SET NULL;

--
-- Contraintes pour la table `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `attestation_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_subvention` (`id_dossier`);

--
-- Contraintes pour la table `charge`
--
ALTER TABLE `charge`
  ADD CONSTRAINT `charge_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_subvention` (`id_dossier`),
  ADD CONSTRAINT `charge_ibfk_2` FOREIGN KEY (`id_categorie_charge`) REFERENCES `categ_charge` (`id_categorie_charge`);

--
-- Contraintes pour la table `dossier_subvention`
--
ALTER TABLE `dossier_subvention`
  ADD CONSTRAINT `dossier_subvention_ibfk_2` FOREIGN KEY (`id_mairie`) REFERENCES `mairie` (`id_mairie`),
  ADD CONSTRAINT `fk_manifestation_dossier` FOREIGN KEY (`id_manifestation`) REFERENCES `manifestation` (`id_manifestation`);

--
-- Contraintes pour la table `infos_bancaires`
--
ALTER TABLE `infos_bancaires`
  ADD CONSTRAINT `infos_bancaires_ibfk_1` FOREIGN KEY (`id_attestation`) REFERENCES `attestation` (`id_attestation`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role_personne_association` (`id_role`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_subvention` (`id_dossier`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_CategProduit`) REFERENCES `categ_produit` (`id_CategProduit`);

--
-- Contraintes pour la table `remarque`
--
ALTER TABLE `remarque`
  ADD CONSTRAINT `remarque_ibfk_1` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_subvention` (`id_dossier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
