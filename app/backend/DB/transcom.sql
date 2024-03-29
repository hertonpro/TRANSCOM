-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 nov. 2019 à 15:21
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `transcom`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_conducteur`
--

CREATE TABLE `affectation_conducteur` (
  `id_affect_cond` int(11) NOT NULL,
  `id_cond_affect` int(11) NOT NULL,
  `nom_cond_affect` varchar(255) NOT NULL,
  `id_ut_affect` int(11) NOT NULL,
  `nom_ut_affect` varchar(255) NOT NULL,
  `id_mt_affect` int(11) NOT NULL,
  `nom_mt_affect` varchar(255) NOT NULL,
  `type_cond_affect` varchar(255) NOT NULL,
  `etat_cond_affect` varchar(255) NOT NULL,
  `date_enreg_affect_cond` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation_conducteur`
--

INSERT INTO `affectation_conducteur` (`id_affect_cond`, `id_cond_affect`, `nom_cond_affect`, `id_ut_affect`, `nom_ut_affect`, `id_mt_affect`, `nom_mt_affect`, `type_cond_affect`, `etat_cond_affect`, `date_enreg_affect_cond`) VALUES
(7, 2, 'test cond', 1, 'admin', 9, 'RAV4', 'Taximan', 'oui', '2019-11-10 12:37:52'),
(8, 1, 'rrr', 1, 'admin', 9, 'RAV4', 'Taximan', 'oui', '2019-11-10 13:45:43'),
(9, 2, 'test cond', 1, 'admin', 1, 'KIA', 'Taximan', 'non', '2019-11-10 13:49:23'),
(10, 3, 'ttttt', 1, 'admin', 1, 'KIA', 'Taximan', 'oui', '2019-11-10 15:54:00');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_pro`
--

CREATE TABLE `affectation_pro` (
  `id_affect_pro` int(11) NOT NULL,
  `id_pro_affect` int(11) NOT NULL,
  `nom_pro_affect` varchar(255) NOT NULL,
  `id_ut_affect` int(11) NOT NULL,
  `nom_ut_affect` varchar(255) NOT NULL,
  `id_mt_affect` int(11) NOT NULL,
  `nom_mt_affect` varchar(255) NOT NULL,
  `etat_affect` varchar(255) NOT NULL,
  `date_enreg_affect_pro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation_pro`
--

INSERT INTO `affectation_pro` (`id_affect_pro`, `id_pro_affect`, `nom_pro_affect`, `id_ut_affect`, `nom_ut_affect`, `id_mt_affect`, `nom_mt_affect`, `etat_affect`, `date_enreg_affect_pro`) VALUES
(1, 1, 'MIAMBA', 1, 'admin', 1, 'KIA', 'oui', '2019-11-06 23:00:00'),
(2, 1, 'MIAMBA', 1, 'admin', 2, 'H2O', 'non', '2019-11-06 23:00:00'),
(4, 2, 'SADIKI', 1, 'admin', 3, '2121', 'non', '2019-11-06 23:00:00'),
(5, 3, 'BISIMWA', 1, 'admin', 5, 'VL', 'non', '2019-11-06 23:00:00'),
(6, 4, 'OPIVA', 1, 'admin', 4, '1924', 'non', '2019-11-06 23:00:00'),
(7, 3, 'BISIMWA', 1, 'admin', 1, 'KIA', 'non', '2019-11-07 23:00:00'),
(8, 5, 'kam', 1, 'admin', 6, 'ml305', 'non', '2019-11-07 23:00:00'),
(9, 6, 'alva', 1, 'admin', 7, '2345', 'non', '2019-11-07 23:00:00'),
(10, 6, 'alva', 1, 'admin', 8, '45465', 'non', '2019-11-07 23:00:00'),
(11, 6, 'alva', 1, 'admin', 9, 'RAV4', 'non', '2019-11-07 23:00:00'),
(12, 1, 'MIAMBA', 1, 'admin', 9, 'RAV4', 'non', '2019-11-07 23:00:00'),
(13, 3, 'BISIMWA', 1, 'admin', 9, 'RAV4', 'oui', '2019-11-07 23:00:00'),
(14, 7, 'test proprietaire', 1, 'admin', 9, 'RAV4', 'non', '2019-11-07 23:00:00'),
(16, 8, 'frank', 1, 'admin', 14, 'tvs', 'oui', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `id_alerte` int(11) NOT NULL,
  `type_alerte` varchar(255) NOT NULL,
  `autre_alerte` varchar(255) NOT NULL,
  `date_alerte` date NOT NULL,
  `lieu_alerte` varchar(255) NOT NULL,
  `description_alerte` text NOT NULL,
  `casier_mt` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_alerte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alerte`
--

INSERT INTO `alerte` (`id_alerte`, `type_alerte`, `autre_alerte`, `date_alerte`, `lieu_alerte`, `description_alerte`, `casier_mt`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_alerte`) VALUES
(6, 'vehicule ou moto volÃ©', '', '2019-11-05', '', '', 'non reglÃ©', 1, 'admin', 1, '1234/22', '2019-11-10 15:36:18'),
(7, 'vehicule ou moto volÃ©', '', '0000-00-00', '', '', 'non regl', 1, 'admin', 1, '1234/22', '2019-11-10 15:39:45'),
(11, 'vehicule ou moto volÃ©<br>accident<br> fouille la PCR<br> autres degats routier', '', '2019-11-06', '', '', 'non reglÃ©', 1, 'admin', 1, '1234/22', '2019-11-10 15:55:21'),
(12, '', '', '0000-00-00', '', '', 'non reglÃ©', 1, 'admin', 5, '343465/87', '2019-11-10 20:07:32'),
(13, 'vehicule ou moto volÃ©', '', '0000-00-00', '', '', 'non reglÃ©', 1, 'admin', 5, '343465/87', '2019-11-10 20:08:02');

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `reff_assurance` varchar(255) NOT NULL,
  `date_livraison_assurance` date NOT NULL,
  `date_expiration_assurance` date NOT NULL,
  `scan_assurance` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_assurance` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `reff_assurance`, `date_livraison_assurance`, `date_expiration_assurance`, `scan_assurance`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_assurance`) VALUES
(1, '35524', '2019-11-04', '2019-11-29', 'loc.png', 1, 'admin', 8, '6e453/23', '2019-11-08 13:28:46'),
(2, 'rrrr', '0000-00-00', '0000-00-00', '', 1, 'admin', 9, '234567654', '2019-11-10 12:45:45'),
(3, 'asur', '2019-11-04', '2019-11-22', '', 1, 'admin', 9, '234567654', '2019-11-10 12:46:22'),
(4, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:04:12'),
(5, '', '2019-11-05', '2019-11-24', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:05:05');

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `id_cond` int(11) NOT NULL,
  `nom_cond` varchar(255) NOT NULL,
  `postnom_cond` varchar(255) NOT NULL,
  `prenom_cond` varchar(255) NOT NULL,
  `sexe_cond` varchar(255) NOT NULL,
  `date_naiss_cond` date NOT NULL,
  `lieu_naiss_cond` varchar(255) NOT NULL,
  `province_cond` varchar(255) NOT NULL,
  `ville_cond` varchar(255) NOT NULL,
  `commune_cond` varchar(255) NOT NULL,
  `quartier_cond` varchar(255) NOT NULL,
  `avennue_cond` varchar(255) NOT NULL,
  `num_domicile_cond` varchar(255) NOT NULL,
  `tel1_cond` varchar(255) NOT NULL,
  `tel2_cond` varchar(255) NOT NULL,
  `email_cond` varchar(255) NOT NULL,
  `scan_identite_cond` varchar(255) NOT NULL,
  `photo_cond` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_conducteur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tel2_chauf';

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`id_cond`, `nom_cond`, `postnom_cond`, `prenom_cond`, `sexe_cond`, `date_naiss_cond`, `lieu_naiss_cond`, `province_cond`, `ville_cond`, `commune_cond`, `quartier_cond`, `avennue_cond`, `num_domicile_cond`, `tel1_cond`, `tel2_cond`, `email_cond`, `scan_identite_cond`, `photo_cond`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_conducteur`) VALUES
(1, 'rrr', 'rrrtr', 'trtt', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '2019-11-07 19:40:52'),
(2, 'test cond', 'ggjhjh', 'hjhj', 'MASCULIN', '2019-11-06', 'qewqe', 'hfdsfu', 'kjh', 'hjk;', 'kbnm', 'kv', 'bnm', 'bnm', 'hg', '', 'flag2.jpg', 'operateur.jpg', 1, 'admin', 4, '3435/22', '2019-11-10 12:53:56'),
(3, 'ttttt', '', '', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:51:12'),
(4, 'eee', '', '', '---Selectionnez---', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 1, 'admin', 1, '1234/22', '2019-11-10 16:07:00');

-- --------------------------------------------------------

--
-- Structure de la table `controle_roullage`
--

CREATE TABLE `controle_roullage` (
  `id_controle` int(11) NOT NULL,
  `nom_doc_manquant` varchar(255) NOT NULL,
  `constant` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_controle_roullage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle_roullage`
--

INSERT INTO `controle_roullage` (`id_controle`, `nom_doc_manquant`, `constant`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_controle_roullage`) VALUES
(60, ',Taxe voirie,', '', 2, 'admin2', 1, '1234/22', '2019-11-20 09:34:00'),
(61, ',Taxe voirie,', '', 2, 'admin2', 1, '1234/22', '2019-11-20 09:38:08'),
(62, ',Taxe voirie,', '', 2, 'admin2', 1, '1234/22', '2019-11-20 10:23:01'),
(63, ',Taxe voirie,', '', 2, 'admin2', 1, '1234/22', '2019-11-20 10:41:39');

-- --------------------------------------------------------

--
-- Structure de la table `controle_technique`
--

CREATE TABLE `controle_technique` (
  `id_controle_technique` int(11) NOT NULL,
  `reff_controle_technique` varchar(255) NOT NULL,
  `date_livraison_controle_technique` date NOT NULL,
  `date_expiration_controle_technique` date NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` int(11) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` int(11) NOT NULL,
  `date_enreg_controle_technique` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle_technique`
--

INSERT INTO `controle_technique` (`id_controle_technique`, `reff_controle_technique`, `date_livraison_controle_technique`, `date_expiration_controle_technique`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_controle_technique`) VALUES
(1, 'ct', '2019-11-09', '2019-11-24', 1, 0, 9, 234567654, '2019-11-10 12:47:34'),
(2, '', '0000-00-00', '0000-00-00', 1, 0, 1, 1234, '2019-11-10 15:04:08'),
(3, '', '0000-00-00', '0000-00-00', 1, 0, 1, 1234, '2019-11-10 15:04:18'),
(4, '', '2019-11-05', '2019-11-06', 1, 0, 1, 1234, '2019-11-10 15:04:48'),
(5, '', '2019-11-12', '2019-11-29', 1, 0, 1, 1234, '2019-11-10 15:32:23');

-- --------------------------------------------------------

--
-- Structure de la table `moyen_de_transport`
--

CREATE TABLE `moyen_de_transport` (
  `id_mt` int(11) NOT NULL,
  `num_plaque_mt` varchar(255) NOT NULL,
  `marque_mt` varchar(255) NOT NULL,
  `model_mt` varchar(255) NOT NULL,
  `type_mt` varchar(255) NOT NULL,
  `annee_fabrication_mt` year(4) NOT NULL,
  `num_chassis_mt` varchar(255) NOT NULL,
  `num_moteur_mt` varchar(255) NOT NULL,
  `main_mt` varchar(255) NOT NULL,
  `couleur_mt` varchar(255) NOT NULL,
  `image_mt` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `date_enreg_mt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `moyen_de_transport`
--

INSERT INTO `moyen_de_transport` (`id_mt`, `num_plaque_mt`, `marque_mt`, `model_mt`, `type_mt`, `annee_fabrication_mt`, `num_chassis_mt`, `num_moteur_mt`, `main_mt`, `couleur_mt`, `image_mt`, `id_ut_fk`, `nom_ut_fk`, `date_enreg_mt`) VALUES
(1, '1234/22', 'TOYOTA', 'KIA', 'vehicule', 2002, '000001', '000022', 'GAUCHE', 'ROSE', 'flag.png', 1, 'admin', '2019-11-12 10:29:08'),
(2, '4321/21', 'HUMER', 'H2O', 'vehicule', 0000, '09876543', '123456789', 'GAUCHE', 'NOIR', 'javascript.jpg', 1, 'admin', '2019-11-07 10:39:20'),
(3, '2346/22', 'VW', '2121', 'vehicule', 2008, '123456', '654321', '---Selectionez---', 'VERTE', 'wordpress.jpg', 1, 'admin', '2019-11-07 18:20:54'),
(4, '3435/22', 'mercedes benz', '1924', 'vehicule', 2019, '098765434', '234567898765', '---Selectionez---', 'bleu', 'loc.png', 1, 'admin', '2019-11-07 20:43:57'),
(5, '343465/87', 'VOLVO', 'VL', 'vehicule', 0000, '20374', '566677', 'GAUCHE', 'BB', 'javascript.jpg', 1, 'admin', '2019-11-07 20:52:10'),
(6, '864846/21', 'MERCEDES BENZ', 'ml305', 'vehicule', 2019, '234565432', '0987656789', '---Selectionez---', 'grise', 'logo.png', 1, 'admin', '2019-11-08 12:07:31'),
(7, '233465/22', 'yundai', '2345', 'vehicule', 2019, '45678', '345676543', 'GAUCHE', 'ROUGE', '', 1, 'admin', '2019-11-08 13:22:11'),
(8, '6e453/23', 'FUSO', '45465', 'vehicule', 2019, '3432', '34565434567', 'DROITE', 'NOIR', '', 1, 'admin', '2019-11-08 13:26:00'),
(9, '234567654', 'TOYOTA', 'RAV4', 'vehicule', 2019, '234567', '3456765', 'DROITE', 'jaune', 'wordpress.jpg', 1, 'admin', '2019-11-08 13:52:07'),
(12, '6543', '344444', '', 'vehicule', 0000, '', '', '---Selectionez---', '', 'loc.png', 1, 'admin', '2019-11-10 16:03:30'),
(14, '65434', 'bodaboda', 'tvs', 'moto', 2019, '56789', '45678', 'AUTRE', '', 'logo.png', 1, 'admin', '2019-11-12 11:01:41'),
(16, 'tttttttttttt', 'ttttttttt', 'tttttttttttt', 'vehicule', 2019, '111111111111', '22222222222', 'GAUCHE', 'rrrrrrrrrrr', 'big_image_3.jpg', 1, 'admin', '2019-11-19 07:19:10'),
(17, 'tttttttttttt', 'ttttttttt', 'tttttttttttt', 'vehicule', 2019, '111111111111', '22222222222', 'GAUCHE', 'rrrrrrrrrrr', 'big_image_3.jpg', 1, 'admin', '2019-11-19 07:22:05');

-- --------------------------------------------------------

--
-- Structure de la table `note_perception`
--

CREATE TABLE `note_perception` (
  `id_note` int(11) NOT NULL,
  `nom_doc` varchar(255) NOT NULL,
  `montant` varchar(255) NOT NULL,
  `date_note` date NOT NULL,
  `etat_note` varchar(255) NOT NULL,
  `id_controle_fk` int(11) NOT NULL,
  `nom_doc_manquant_fk` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_note` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note_perception`
--

INSERT INTO `note_perception` (`id_note`, `nom_doc`, `montant`, `date_note`, `etat_note`, `id_controle_fk`, `nom_doc_manquant_fk`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_note`) VALUES
(3, 'taxe_voirie<br>vignette<br>assurence<br>controle_technique', '34', '2019-11-14', '', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-14 20:58:07'),
(4, 'taxe_voirie<br>vignette<br>assurance', '', '0000-00-00', 'non_reglÃ©', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-20 11:44:03'),
(5, 'assurence<br>controle_technique', '', '0000-00-00', 'non_reglÃ©', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-14 21:11:19'),
(6, 'taxe_voirie', '', '2019-11-20', 'non_reglÃ©', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-20 08:20:54'),
(7, 'taxe_voirie<br>vignette<br>assurance<br>controle_technique<br>permis', '', '0000-00-00', '', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-20 11:43:47'),
(8, 'taxe_voirie<br>vignette<br>assurance<br>controle_technique<br>permis', '22', '2019-11-20', 'non_reglÃ©', 0, '', 2, 'admin2', 1, '1234/22', '2019-11-20 11:43:55'),
(9, 'taxe_voirie', '', '2019-11-20', 'non_reglÃ©', 63, '', 2, 'admin2', 1, '1234/22', '2019-11-20 09:59:12'),
(14, 'taxe_voirie', '', '0000-00-00', 'non_reglÃ©', 63, ',Taxe voirie,', 2, 'admin2', 1, '1234/22', '2019-11-20 10:09:48'),
(15, '', '', '0000-00-00', 'non_reglÃ©', 63, ',Taxe voirie,', 2, 'admin2', 1, '1234/22', '2019-11-20 10:12:26'),
(16, '<br>taxe_voirie<br>vignette<br>assurance', '', '2019-11-20', 'non_reglÃ©', 63, ',Taxe voirie,', 2, 'admin2', 1, '1234/22', '2019-11-20 11:44:09'),
(17, '<br>taxe_voirie<br>vignette<br>assurance<br>controle_technique<br>permis', '', '0000-00-00', 'non_reglÃ©', 63, ',Taxe voirie,', 2, 'admin2', 1, '1234/22', '2019-11-20 11:59:44');

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `id_permis` int(11) NOT NULL,
  `type_permis` varchar(255) NOT NULL,
  `date_livraison_permis` date NOT NULL,
  `date_expiration_permis` date NOT NULL,
  `scan_permis` varchar(255) NOT NULL,
  `date_jour` date NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_pro_cond_fk` int(11) NOT NULL,
  `nom_pro_cond_fk` varchar(255) NOT NULL,
  `postnom_pro_cond_fk` varchar(255) NOT NULL,
  `prenom_pro_cond_fk` varchar(255) NOT NULL,
  `date_enreg_permis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `permis`
--

INSERT INTO `permis` (`id_permis`, `type_permis`, `date_livraison_permis`, `date_expiration_permis`, `scan_permis`, `date_jour`, `id_ut_fk`, `nom_ut_fk`, `id_pro_cond_fk`, `nom_pro_cond_fk`, `postnom_pro_cond_fk`, `prenom_pro_cond_fk`, `date_enreg_permis`) VALUES
(4, 'A,B,C,D', '2019-11-04', '2019-11-22', '', '2019-11-14', 1, 'admin', 6, 'alva', '', '', '2019-11-14 13:25:55'),
(5, 'A,B,C,D', '2019-11-04', '2019-11-29', '', '2019-11-14', 1, 'admin', 2, 'test cond', '', '', '2019-11-14 14:00:29'),
(6, 'A,B,C,D', '2019-11-01', '2019-11-15', '', '2019-11-14', 1, 'admin', 1, 'rrr', '', '', '2019-11-14 14:08:30'),
(7, 'A,B,C,D,E,F', '2019-11-05', '2019-11-15', '', '2019-11-14', 1, 'admin', 8, 'frank', '', '', '2019-11-14 14:22:42'),
(8, 'A,B,C,D', '2019-11-06', '2019-11-14', '', '2019-11-14', 1, 'admin', 4, 'eee', '', '', '2019-11-14 14:23:45'),
(10, 'A,B,C,D', '2019-11-13', '2019-11-22', '', '2019-11-14', 1, 'admin', 2, 'hjhj', 'ggjhjh', 'test', '2019-11-14 19:28:41'),
(11, 'A,B,C,D', '2019-11-12', '2019-11-29', '', '2019-11-14', 1, 'admin', 5, 'kam', 'birindingo', 'bosco', '2019-11-14 15:13:38');

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_pro` int(11) NOT NULL,
  `nom_pro` varchar(255) NOT NULL,
  `postnom_pro` varchar(255) NOT NULL,
  `prenom_pro` varchar(255) NOT NULL,
  `sexe_pro` varchar(255) NOT NULL,
  `date_naiss_pro` date NOT NULL,
  `lieu_naiss_pro` varchar(255) NOT NULL,
  `province_pro` varchar(255) NOT NULL,
  `ville_pro` varchar(255) NOT NULL,
  `commune_pro` varchar(255) NOT NULL,
  `quartier_pro` varchar(255) NOT NULL,
  `avennue_pro` varchar(255) NOT NULL,
  `num_domicile_pro` varchar(255) NOT NULL,
  `tel1_pro` varchar(255) NOT NULL,
  `tel2_pro` varchar(255) NOT NULL,
  `email_pro` varchar(255) NOT NULL,
  `scan_identite_pro` varchar(255) NOT NULL,
  `photo_pro` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_proprietaire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_pro`, `nom_pro`, `postnom_pro`, `prenom_pro`, `sexe_pro`, `date_naiss_pro`, `lieu_naiss_pro`, `province_pro`, `ville_pro`, `commune_pro`, `quartier_pro`, `avennue_pro`, `num_domicile_pro`, `tel1_pro`, `tel2_pro`, `email_pro`, `scan_identite_pro`, `photo_pro`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_proprietaire`) VALUES
(1, 'MIAMBA', 'MIB', 'JEEF', 'MASCULIN', '2019-11-06', 'UVIRA', 'SK', 'BUKAVU', 'IBANDA', 'NDENDERE', 'MUHUNGU', '20', '000999898', '98989889', '', '', 'profil2.jpg', 1, 'admin', 1, '1234/22', '2019-11-07 10:37:49'),
(2, 'SADIKI', 'KIJINGO', 'FABRICE', 'MASCULIN', '2019-11-04', 'BUKAVU', 'SK', '', 'IBANDA', '', 'MUHUNGU', '23', '345678', '987654', '', '', 'operateur.jpg', 1, 'admin', 3, '2346/22', '2019-11-07 18:24:16'),
(3, 'BISIMWA', 'KILO', 'JOHN', 'MASCULIN', '2019-11-08', '', '', '', '', '', '', '', '', '', '', '', 'person_2.jpg', 1, 'admin', 5, '343465/87', '2019-11-07 20:54:02'),
(4, 'OPIVA', 'KILICHO', 'BABYLON', 'MASCULIN', '2019-11-06', '', '', '', '', '', '', '', '', '', '', '', 'person_6.jpg', 1, 'admin', 4, '3435/22', '2019-11-07 20:57:27'),
(5, 'kam', 'birindingo', 'bosco', 'MASCULIN', '2019-11-15', '', '', '', '', '', '', '', '', '', '', 'profil.jpg', 'profil.jpg', 1, 'admin', 6, '864846/21', '2019-11-08 12:08:28'),
(6, 'alva', 'mihigo', 'alva', 'MASCULIN', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'operateur.jpg', 'operateur.jpg', 1, 'admin', 7, '233465/22', '2019-11-08 13:24:01'),
(7, 'test moto', 'yryryr', 'yggygyg', 'FEMININ', '2019-11-05', 'wwwwwww', '', '', '', '', '', '', '', '', '', '', 'person_1.jpg', 1, 'admin', 1, '1234/22', '2019-11-12 10:43:15'),
(8, 'frank', 'lwabanji', 'kiko', 'MASCULIN', '2019-11-06', '', '', '', '', '', '', '', '', '', '', '', 'person_1.jpg', 1, 'admin', 14, '65434', '2019-11-12 11:02:29');

-- --------------------------------------------------------

--
-- Structure de la table `taxe_voirie`
--

CREATE TABLE `taxe_voirie` (
  `id_taxe_voirie` int(11) NOT NULL,
  `reff_taxe_voirie` varchar(255) NOT NULL,
  `date_livraison_taxe_voirie` date NOT NULL,
  `date_expiration_taxe_voirie` date NOT NULL,
  `scan_taxe_voirie` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_taxe_voirie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taxe_voirie`
--

INSERT INTO `taxe_voirie` (`id_taxe_voirie`, `reff_taxe_voirie`, `date_livraison_taxe_voirie`, `date_expiration_taxe_voirie`, `scan_taxe_voirie`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_taxe_voirie`) VALUES
(1, '546464', '2019-11-04', '2019-11-15', '', 1, 'admin', 8, '6e453/23', '2019-11-08 13:30:31'),
(2, 'EFETR', '0000-00-00', '0000-00-00', '', 1, 'admin', 8, '6e453/23', '2019-11-08 13:42:21'),
(3, 'tv', '2019-11-01', '2019-11-17', '', 1, 'admin', 9, '234567654', '2019-11-10 12:47:22'),
(4, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:04:15'),
(5, '', '2019-11-04', '2019-11-17', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:04:57'),
(6, '', '2019-11-07', '2019-11-09', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:29:05');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_ut` int(11) NOT NULL,
  `nom_ut` varchar(255) NOT NULL,
  `mdp_ut` int(11) NOT NULL,
  `postnom_ut` varchar(255) NOT NULL,
  `prenom_ut` varchar(255) NOT NULL,
  `sexe_ut` varchar(255) NOT NULL,
  `tel1_ut` varchar(255) NOT NULL,
  `tel2_ut` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `act_desact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_ut`, `nom_ut`, `mdp_ut`, `postnom_ut`, `prenom_ut`, `sexe_ut`, `tel1_ut`, `tel2_ut`, `role`, `act_desact`) VALUES
(1, 'admin', 1234, 'hello', 'gggg', 'm', '0987654321', '123456789', 'operateur', '1'),
(2, 'admin2', 1234, 'ffff', 'fffgggh', 'f', '22222333', '44443332', 'roullage', '1');

-- --------------------------------------------------------

--
-- Structure de la table `vignette`
--

CREATE TABLE `vignette` (
  `id_vignette` int(11) NOT NULL,
  `reff_vignette` varchar(255) NOT NULL,
  `date_livraison_vignette` date NOT NULL,
  `date_expiration_vignette` date NOT NULL,
  `scan_vignette` varchar(255) NOT NULL,
  `id_ut_fk` int(11) NOT NULL,
  `nom_ut_fk` varchar(255) NOT NULL,
  `id_mt_fk` int(11) NOT NULL,
  `num_plaque_mt_fk` varchar(255) NOT NULL,
  `date_enreg_vignette` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vignette`
--

INSERT INTO `vignette` (`id_vignette`, `reff_vignette`, `date_livraison_vignette`, `date_expiration_vignette`, `scan_vignette`, `id_ut_fk`, `nom_ut_fk`, `id_mt_fk`, `num_plaque_mt_fk`, `date_enreg_vignette`) VALUES
(1, '554', '2019-11-06', '2019-11-09', '', 1, 'admin', 8, '6e453/23', '2019-11-08 13:29:54'),
(2, 'vign', '2019-11-05', '2019-11-18', '', 1, 'admin', 9, '234567654', '2019-11-10 12:47:12'),
(3, 'vign2', '2019-11-05', '2019-11-28', '', 1, 'admin', 9, '234567654', '2019-11-10 12:48:36'),
(4, '', '0000-00-00', '0000-00-00', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:04:27'),
(5, '', '2019-11-04', '2019-11-24', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:05:14'),
(6, '', '2019-11-04', '2019-11-04', '', 1, 'admin', 1, '1234/22', '2019-11-10 15:24:30'),
(7, '3232323', '2019-11-13', '2019-11-29', '', 1, 'admin', 1, '1234/22', '2019-11-19 15:05:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_conducteur`
--
ALTER TABLE `affectation_conducteur`
  ADD PRIMARY KEY (`id_affect_cond`);

--
-- Index pour la table `affectation_pro`
--
ALTER TABLE `affectation_pro`
  ADD PRIMARY KEY (`id_affect_pro`);

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`id_alerte`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`id_cond`);

--
-- Index pour la table `controle_roullage`
--
ALTER TABLE `controle_roullage`
  ADD PRIMARY KEY (`id_controle`);

--
-- Index pour la table `controle_technique`
--
ALTER TABLE `controle_technique`
  ADD PRIMARY KEY (`id_controle_technique`);

--
-- Index pour la table `moyen_de_transport`
--
ALTER TABLE `moyen_de_transport`
  ADD PRIMARY KEY (`id_mt`);

--
-- Index pour la table `note_perception`
--
ALTER TABLE `note_perception`
  ADD PRIMARY KEY (`id_note`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`id_permis`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_pro`);

--
-- Index pour la table `taxe_voirie`
--
ALTER TABLE `taxe_voirie`
  ADD PRIMARY KEY (`id_taxe_voirie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_ut`);

--
-- Index pour la table `vignette`
--
ALTER TABLE `vignette`
  ADD PRIMARY KEY (`id_vignette`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_conducteur`
--
ALTER TABLE `affectation_conducteur`
  MODIFY `id_affect_cond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `affectation_pro`
--
ALTER TABLE `affectation_pro`
  MODIFY `id_affect_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `id_alerte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `id_cond` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `controle_roullage`
--
ALTER TABLE `controle_roullage`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `controle_technique`
--
ALTER TABLE `controle_technique`
  MODIFY `id_controle_technique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `moyen_de_transport`
--
ALTER TABLE `moyen_de_transport`
  MODIFY `id_mt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `note_perception`
--
ALTER TABLE `note_perception`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `permis`
--
ALTER TABLE `permis`
  MODIFY `id_permis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `taxe_voirie`
--
ALTER TABLE `taxe_voirie`
  MODIFY `id_taxe_voirie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_ut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vignette`
--
ALTER TABLE `vignette`
  MODIFY `id_vignette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
