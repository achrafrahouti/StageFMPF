-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 24 mai 2021 à 23:11
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom`, `prenom`, `created_at`, `updated_at`) VALUES
(1, 'Adil', 'Admin', '2019-04-15 18:13:32', '2019-04-15 18:13:32');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_stagaire` bigint(20) UNSIGNED NOT NULL,
  `id_stage` bigint(20) UNSIGNED NOT NULL,
  `type_dem` enum('Transfert','Revalidation','Reclamtion','Attestation') COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet_dem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `demande_validé` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `encadrants`
--

CREATE TABLE `encadrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `encadrants`
--

INSERT INTO `encadrants` (`id`, `nom`, `prenom`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Achraf', 'Rahou', 6, '2019-04-15 18:13:32', '2019-04-15 18:13:32'),
(2, 'Achraf', 'Rahou', 2, '2019-04-15 18:13:32', '2019-04-15 18:13:32'),
(3, 'Achraf', 'Rahou', 3, '2019-04-15 18:13:32', '2019-04-15 18:13:32'),
(4, 'Achraf', 'Rahou', 4, '2019-04-15 18:13:32', '2019-04-15 18:13:32'),
(5, 'Achraf', 'Rahou', 5, '2019-04-15 18:13:32', '2019-04-15 18:13:32'),
(6, 'Achraf', 'Rahou', 1, '2019-04-15 18:13:32', '2019-04-15 18:13:32');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cne` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `cne`, `nom`, `prenom`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, 'A29887660', 'Irving', 'Lebsack', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(2, 'Z26906321', 'Jorge', 'Schmeler', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(3, 'D41825138', 'Donavon', 'Price', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(4, 'G41450004', 'Shana', 'Balistreri', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(5, 'G78327977', 'Giuseppe', 'Nienow', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(6, 'B86705233', 'Shanel', 'Hessel', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(7, 'H36235343', 'Shemar', 'Keebler', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(8, 'D93072900', 'Zoey', 'Dach', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(9, 'Y68786167', 'Lucienne', 'Wisozk', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49'),
(10, 'Z60940447', 'Cyril', 'Muller', 1, '2021-05-24 13:54:49', '2021-05-24 13:54:49');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupe_tot` int(11) NOT NULL,
  `groupe_sh` int(11) NOT NULL,
  `groupe_sgh` int(11) NOT NULL,
  `niveau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `name`, `groupe_tot`, `groupe_sh`, `groupe_sgh`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, 'G 1.1.1', 1, 1, 1, 1, NULL, NULL),
(2, 'G 1.1.2', 1, 1, 2, 1, NULL, NULL),
(3, 'G 1.2.3', 1, 2, 3, 1, NULL, NULL),
(4, 'G 1.2.4', 1, 2, 4, 1, NULL, NULL),
(5, 'G 2.1.1', 2, 1, 1, 1, NULL, NULL),
(6, 'G 2.1.2', 2, 1, 2, 1, NULL, NULL),
(7, 'G 2.2.3', 2, 2, 3, 1, NULL, NULL),
(8, 'G 2.2.4', 2, 2, 4, 1, NULL, NULL),
(9, 'G 3.1.1', 3, 1, 1, 1, NULL, NULL),
(10, 'G 3.1.2', 3, 1, 2, 1, NULL, NULL),
(11, 'G 3.2.3', 3, 2, 3, 1, NULL, NULL),
(12, 'G 3.2.4', 3, 2, 4, 1, NULL, NULL),
(13, 'G 1.1.1', 1, 1, 1, 2, NULL, NULL),
(14, 'G 1.1.2', 1, 1, 2, 2, NULL, NULL),
(15, 'G 1.2.3', 1, 2, 3, 2, NULL, NULL),
(16, 'G 1.2.4', 1, 2, 4, 2, NULL, NULL),
(17, 'G 2.1.1', 2, 1, 1, 2, NULL, NULL),
(18, 'G 2.1.2', 2, 1, 2, 2, NULL, NULL),
(19, 'G 2.2.3', 2, 2, 3, 2, NULL, NULL),
(20, 'G 2.2.4', 2, 2, 4, 2, NULL, NULL),
(21, 'G 3.1.1', 3, 1, 1, 2, NULL, NULL),
(22, 'G 3.1.2', 3, 1, 2, 2, NULL, NULL),
(23, 'G 3.2.3', 3, 2, 3, 2, NULL, NULL),
(24, 'G 3.2.4', 3, 2, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2010_05_25_115851_create_niveaux_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_15_191331679173_create_1555355612601_permissions_table', 1),
(4, '2019_04_15_191331731390_create_1555355612581_roles_table', 1),
(5, '2019_04_15_191331779537_create_1555355612782_users_table', 1),
(6, '2019_04_15_191332603432_create_1555355612603_permission_role_pivot_table', 1),
(7, '2019_04_15_191332791021_create_1555355612790_role_user_pivot_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_05_04_231824_create_periodes_table', 1),
(10, '2020_05_06_001119_create_groupes_table', 1),
(11, '2020_05_06_143720_create_services_table', 1),
(12, '2020_05_07_141837_create_stages_table', 1),
(13, '2020_05_08_141324_create_etudiants_table', 1),
(14, '2020_05_08_141422_create_stagaires_table', 1),
(15, '2020_05_08_145521_create_lignestage_stage_pivot_table', 1),
(16, '2020_05_13_231744_create_secretaires_table', 1),
(17, '2020_05_17_015016_create_stage_groupe_periode_table', 1),
(18, '2020_05_24_130718_create_encadrants_table', 1),
(19, '2020_05_25_142359_create_admins_table', 1),
(20, '2020_06_01_153004_create_demandes_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `liblle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `liblle`) VALUES
(1, 'Niveau 1'),
(2, 'Niveau 2'),
(3, 'Niveau 3'),
(4, 'Niveau 4'),
(5, 'Niveau 5'),
(6, 'Niveau 6');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Note` double DEFAULT NULL,
  `presence` double DEFAULT NULL,
  `motivation` double DEFAULT NULL,
  `Assiduite` double DEFAULT NULL,
  `integration` double DEFAULT NULL,
  `connaissance` double DEFAULT NULL,
  `stagaire_id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` bigint(20) UNSIGNED NOT NULL,
  `verify` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `Note`, `presence`, `motivation`, `Assiduite`, `integration`, `connaissance`, `stagaire_id`, `stage_id`, `verify`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, 5, 2, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, NULL, 5, 4, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, NULL, 6, 1, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, NULL, 6, 4, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, 7, 1, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, NULL, 7, 2, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, NULL, 7, 4, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, NULL, 8, 1, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, NULL, 8, 2, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, 8, 3, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL, NULL, 8, 4, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, 9, 1, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, 9, 2, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, 9, 3, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, 9, 4, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL, 10, 2, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL, 10, 3, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, 10, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `niveau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `periodes`
--

INSERT INTO `periodes` (`id`, `name`, `date_debut`, `date_fin`, `niveau_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Periode  1', '2020-09-15', '2020-10-15', 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(2, 'Periode 2', '2020-10-15', '2020-11-15', 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(3, 'Periode 3', '2020-11-15', '2020-12-15', 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(4, 'Periode 1', '2020-12-15', '2021-01-15', 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(5, 'Periode 2', '2021-01-15', '2021-02-15', 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(6, 'Periode 3', '2021-02-15', '2021-03-15', 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(2, 'permission_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(3, 'permission_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(4, 'permission_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(5, 'permission_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(6, 'permission_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(7, 'role_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(8, 'role_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(9, 'role_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(10, 'role_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(11, 'role_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(12, 'user_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(13, 'user_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(14, 'user_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(15, 'user_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(16, 'user_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(17, 'periode_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(18, 'periode_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(19, 'periode_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(20, 'periode_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(21, 'periode_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(22, 'groupe_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(23, 'groupe_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(24, 'groupe_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(25, 'groupe_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(26, 'groupe_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(27, 'service_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(28, 'service_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(29, 'service_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(30, 'service_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(31, 'service_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(32, 'stage_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(33, 'stage_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(34, 'stage_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(35, 'stage_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(36, 'stage_access', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(37, 'demande_create', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(38, 'demande_edit', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(39, 'demande_show', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(40, 'demande_delete', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(41, 'demande_access_etudiant', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(42, 'demande_access_admin', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(43, 'add_note', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 38),
(4, 39),
(4, 40),
(4, 41),
(4, 42),
(4, 43);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL),
(2, 'Etudiant', '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL),
(3, 'Secretaire', '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL),
(4, 'Encadrant', '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `secretaires`
--

CREATE TABLE `secretaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secretaires`
--

INSERT INTO `secretaires` (`id`, `nom`, `prenom`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Abdo', 'Rahou', 6, '2019-04-15 18:13:32', '2019-04-15 18:13:32');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacite` int(11) NOT NULL,
  `lieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `capacite`, `lieu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Radiologie', 14, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(2, 'MC Interne', 20, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(3, 'Pshycho', 15, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(4, 'Urgence', 16, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(5, 'Laboratoire', 30, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL),
(6, 'Chirurgie', 18, 'CHU FES', '2019-04-15 18:14:42', '2019-04-15 18:14:42', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stagaires`
--

CREATE TABLE `stagaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etudiant_id` bigint(20) UNSIGNED NOT NULL,
  `groupe_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stagaires`
--

INSERT INTO `stagaires` (`id`, `etudiant_id`, `groupe_id`) VALUES
(2, 2, 13),
(3, 3, 14),
(4, 4, 14),
(5, 5, 15),
(6, 6, 15),
(7, 7, 16),
(8, 8, 16),
(9, 9, 17),
(10, 10, 17);

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `niveau_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stages`
--

INSERT INTO `stages` (`id`, `name`, `service_id`, `niveau_id`, `created_at`, `updated_at`) VALUES
(1, 'Chirurgie A', 6, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(2, 'Chirurgie B', 6, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(3, ' Urgences', 4, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(4, 'Urgences', 5, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(5, 'Cardiologie', 5, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(6, 'Médecine Interne', 5, 2, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(7, 'CCV', 5, 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(8, 'Pneumologie', 5, 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42'),
(9, 'Gastro-entéro', 2, 1, '2019-04-15 18:14:42', '2019-04-15 18:14:42');

-- --------------------------------------------------------

--
-- Structure de la table `stage_groupe_periode`
--

CREATE TABLE `stage_groupe_periode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` bigint(20) UNSIGNED NOT NULL,
  `groupe_id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stage_groupe_periode`
--

INSERT INTO `stage_groupe_periode` (`id`, `stage_id`, `groupe_id`, `periode_id`) VALUES
(1, 1, 13, 1),
(2, 1, 14, 2),
(3, 1, 15, 3),
(6, 2, 13, 2),
(7, 2, 14, 3),
(10, 2, 17, 1),
(11, 3, 13, 3),
(14, 3, 16, 1),
(15, 3, 17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `profile_type`, `profile_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@admin.com', NULL, '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO', 'App\\Admin', 1, NULL, '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL),
(3, 'secretaire@secretaire.com', NULL, '$2y$10$Gr97Ypgk364UuZJl6oqv5.ex4ANJJznBIO90SZkVx77r0TBpBgSWa', 'App\\Secretaire', 1, NULL, '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL),
(4, 'encadrant@encadrant.com', NULL, '$2y$10$ygQiPRxOTkWOum7c07e1w.0/COS3nFQtJ6n8d12jzmEv0kvt6NVlm', 'App\\Encadrant', 1, NULL, '2019-04-15 18:13:32', '2019-04-15 18:13:32', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demandes_id_stagaire_foreign` (`id_stagaire`),
  ADD KEY `demandes_id_stage_foreign` (`id_stage`);

--
-- Index pour la table `encadrants`
--
ALTER TABLE `encadrants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encadrants_service_id_foreign` (`service_id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etudiants_cne_unique` (`cne`),
  ADD KEY `etudiants_niveau_id_foreign` (`niveau_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupes_niveau_id_foreign` (`niveau_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notes_stage_id_stagaire_id_unique` (`stage_id`,`stagaire_id`),
  ADD KEY `notes_stagaire_id_foreign` (`stagaire_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodes_niveau_id_foreign` (`niveau_id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Index pour la table `secretaires`
--
ALTER TABLE `secretaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `secretaires_service_id_foreign` (`service_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagaires`
--
ALTER TABLE `stagaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stagaires_groupe_id_foreign` (`groupe_id`),
  ADD KEY `stagaires_etudiant_id_foreign` (`etudiant_id`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_service_id_foreign` (`service_id`),
  ADD KEY `stages_niveau_id_foreign` (`niveau_id`);

--
-- Index pour la table `stage_groupe_periode`
--
ALTER TABLE `stage_groupe_periode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stage_groupe_periode_periode_id_groupe_id_unique` (`periode_id`,`groupe_id`),
  ADD UNIQUE KEY `stage_groupe_periode_groupe_id_stage_id_unique` (`groupe_id`,`stage_id`),
  ADD KEY `stage_groupe_periode_stage_id_foreign` (`stage_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `encadrants`
--
ALTER TABLE `encadrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `secretaires`
--
ALTER TABLE `secretaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `stagaires`
--
ALTER TABLE `stagaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `stage_groupe_periode`
--
ALTER TABLE `stage_groupe_periode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_id_stagaire_foreign` FOREIGN KEY (`id_stagaire`) REFERENCES `stagaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demandes_id_stage_foreign` FOREIGN KEY (`id_stage`) REFERENCES `stages` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `encadrants`
--
ALTER TABLE `encadrants`
  ADD CONSTRAINT `encadrants_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_stagaire_id_foreign` FOREIGN KEY (`stagaire_id`) REFERENCES `stagaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `periodes`
--
ALTER TABLE `periodes`
  ADD CONSTRAINT `periodes_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `secretaires`
--
ALTER TABLE `secretaires`
  ADD CONSTRAINT `secretaires_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stagaires`
--
ALTER TABLE `stagaires`
  ADD CONSTRAINT `stagaires_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stagaires_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `stages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stage_groupe_periode`
--
ALTER TABLE `stage_groupe_periode`
  ADD CONSTRAINT `stage_groupe_periode_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stage_groupe_periode_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stage_groupe_periode_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
