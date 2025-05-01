-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 mai 2025 à 20:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `front_integrated`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `electronic_cards`
--

CREATE TABLE `electronic_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE `historiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_recepteur` bigint(20) UNSIGNED NOT NULL,
  `id_expediteur` bigint(20) UNSIGNED NOT NULL,
  `montant_transfere` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_16_113428_create_operations_table', 1),
(5, '2025_04_16_122908_create_transactions_table', 1),
(6, '2025_04_16_124344_create_historiques_table', 1),
(7, '2025_04_16_122214_create_electronic_cards_table', 2),
(8, '2025_04_30_110832_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('00b9b1f0-fc2b-4be1-916e-78dc9aeadf91', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 1, '{\"type\":\"reception\",\"montant\":\"2154.00\",\"description\":\"izz\",\"recepteur\":\"DEGBEVI\"}', NULL, '2025-04-30 10:46:57', '2025-04-30 10:46:57'),
('0da5a640-4007-4618-93b7-98c8bf09e4eb', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 3, '{\"type\":\"envoi\",\"montant\":\"2154\",\"recepteur\":\"DGB\",\"description\":\"izz\"}', NULL, '2025-04-30 10:46:55', '2025-04-30 10:46:55'),
('63a0500d-edf2-4b38-94fa-88ca7d83d963', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 2, '{\"type\":\"envoi\",\"montant\":\"1000\",\"recepteur\":\"DEGBEVI\",\"description\":\"gf\"}', NULL, '2025-04-30 14:06:23', '2025-04-30 14:06:23'),
('7875f617-91ae-4344-9e96-d7197dcd639c', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 3, '{\"type\":\"reception\",\"montant\":\"30000.00\",\"description\":\"cadeau\",\"recepteur\":\"DGB\"}', NULL, '2025-04-30 17:04:35', '2025-04-30 17:04:35'),
('7a92243a-b409-497a-a05f-582fe99820db', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 2, '{\"type\":\"envoi\",\"montant\":\"1200\",\"recepteur\":\"DEGBEVI\",\"description\":\"dd\"}', NULL, '2025-04-30 14:02:18', '2025-04-30 14:02:18'),
('9a517344-3a67-45a0-8cdc-7c7a95cffba6', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 3, '{\"type\":\"envoi\",\"montant\":\"120\",\"recepteur\":\"DGB\",\"description\":\"jkde\"}', NULL, '2025-04-30 10:22:04', '2025-04-30 10:22:04'),
('a0746650-b1de-4bd4-a17b-237888b62fb0', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 1, '{\"type\":\"reception\",\"montant\":\"10200.00\",\"description\":\"sce\",\"recepteur\":\"DEGBEVI\"}', NULL, '2025-04-30 10:21:21', '2025-04-30 10:21:21'),
('a2040411-e74b-4657-93ad-cb41c40691a3', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 3, '{\"type\":\"reception\",\"montant\":\"1200.00\",\"description\":\"dd\",\"recepteur\":\"Orelson\"}', NULL, '2025-04-30 14:02:20', '2025-04-30 14:02:20'),
('b069204c-b820-47d5-b76c-3bf6300cb544', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 2, '{\"type\":\"envoi\",\"montant\":\"12\",\"recepteur\":\"DEGBEVI\",\"description\":\"de\"}', NULL, '2025-04-30 14:05:02', '2025-04-30 14:05:02'),
('c49f62c4-07fa-4a8e-bafa-91eed9cfabed', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 1, '{\"type\":\"reception\",\"montant\":\"120.00\",\"description\":\"jkde\",\"recepteur\":\"DEGBEVI\"}', NULL, '2025-04-30 10:22:08', '2025-04-30 10:22:08'),
('ce8ceab2-2d39-430e-bac1-f2bf6c942745', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 3, '{\"type\":\"reception\",\"montant\":\"12.00\",\"description\":\"de\",\"recepteur\":\"Orelson\"}', NULL, '2025-04-30 14:05:03', '2025-04-30 14:05:03'),
('db36eeea-f3c5-49cf-b8d4-418c908925d0', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 3, '{\"type\":\"envoi\",\"montant\":\"10200\",\"recepteur\":\"DGB\",\"description\":\"sce\"}', NULL, '2025-04-30 10:21:12', '2025-04-30 10:21:12'),
('f468d7a5-cd61-4f89-a34e-1515e19c5aec', 'App\\Notifications\\TransactionRecue', 'App\\Models\\User', 3, '{\"type\":\"reception\",\"montant\":\"1000.00\",\"description\":\"gf\",\"recepteur\":\"Orelson\"}', NULL, '2025-04-30 14:06:25', '2025-04-30 14:06:25'),
('ffa00091-673b-4bfb-abf7-997a56b48843', 'App\\Notifications\\TransactionEnvoie', 'App\\Models\\User', 1, '{\"type\":\"envoi\",\"montant\":\"30000\",\"recepteur\":\"DEGBEVI\",\"description\":\"cadeau\"}', NULL, '2025-04-30 17:04:34', '2025-04-30 17:04:34');

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_operation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `type_operation`, `created_at`, `updated_at`) VALUES
(1, 'Dépot d\'argent', NULL, NULL),
(2, 'Retrait d\'argent', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C2N02BTCA1uVwyHok7aZ9toOGvQ5iO2IzEcE5leC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaDlzclZNa2tVSVBxaWZIOG5oZk5KRkUycTRoOTJRNkhuUmdISXF5eiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9fcGVyc28iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9fcGVyc28iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746104502),
('gekF7X6kuv4A0330jjvqBaR6vAvfbQ1b44jEBudd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2hMc1BNVFU1NlJrMDlocGdIaEZWM0E0TkZnUVNLSlpIMzVZMlAwdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9fcGVyc28iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9fcGVyc28iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1746104503),
('QsQu8Wyi9m7Oh1ghGfUNCNFiGANwL5AfJIbqN90W', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNGxnZWdNYkdTZUgxTFhMb0pERGpDNDExRkF1RXVCNUxjems2Nks1eCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmZvX3BlcnNvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1746043513),
('V9qxpgk5Jf3y0e8PhTdBPQ3el0SI0i2AyFW68ix2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDNicXRFNUtlcTRyMXFGeE5ja3o0dzNGVEE5ZUZZUXZmT1E3SUV2OCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2luZm9fcGVyc28iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1746105701),
('yC1iSdEP2UtTz753ye89AJMRlJUGHAF0uO4CmbTq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejNIVzVHR3NBU1ZtcFc4czJLaGhkSzRrYUxXTXJ3V1JjeENwTzZqYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746123784);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recepteur_id` bigint(20) UNSIGNED NOT NULL,
  `expediteur_id` bigint(20) UNSIGNED NOT NULL,
  `operation_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `montant_transfere` decimal(10,2) NOT NULL,
  `status` enum('pending','validated','failed') NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `recepteur_id`, `expediteur_id`, `operation_id`, `description`, `montant_transfere`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'jke', 200.00, 'validated', NULL, '2025-04-24 12:42:40', '2025-04-24 12:42:40'),
(2, 2, 1, 1, 'jke', 200.00, 'validated', NULL, '2025-04-24 12:48:01', '2025-04-24 12:48:01'),
(3, 2, 1, 1, 'kj,', 20010.00, 'validated', NULL, '2025-04-25 00:00:23', '2025-04-25 00:00:23'),
(4, 2, 1, 1, 'fete', 30000.00, 'validated', NULL, '2025-04-25 00:18:23', '2025-04-25 00:18:23'),
(5, 2, 1, 1, 'kdo', 1000.00, 'validated', NULL, '2025-04-25 19:32:22', '2025-04-25 19:32:22'),
(6, 2, 1, 1, 'kdo', 1200.00, 'validated', NULL, '2025-04-28 07:43:25', '2025-04-28 07:43:25'),
(7, 1, 2, 1, 'paya', 15000.00, 'validated', NULL, '2025-04-29 01:17:06', '2025-04-29 01:17:06'),
(8, 1, 2, 1, 'fais toi plaisir', 10000.00, 'validated', NULL, '2025-04-29 01:24:01', '2025-04-29 01:24:01'),
(9, 1, 2, 1, 'hje,', 1010.00, 'validated', NULL, '2025-04-29 01:25:43', '2025-04-29 01:25:43'),
(10, 1, 2, 1, 'commerce', 25000.00, 'validated', NULL, '2025-04-29 01:41:26', '2025-04-29 01:41:26'),
(11, 1, 2, 1, 'describe', 1200.00, 'validated', NULL, '2025-04-29 01:48:58', '2025-04-29 01:48:58'),
(12, 1, 2, 1, 'fr', 100.00, 'validated', NULL, '2025-04-29 01:53:05', '2025-04-29 01:53:05'),
(13, 2, 3, 1, 'kdo', 150.00, 'validated', NULL, '2025-04-29 07:29:56', '2025-04-29 07:29:56'),
(14, 1, 3, 1, 'zse', 175.00, 'validated', NULL, '2025-04-29 07:30:22', '2025-04-29 07:30:22'),
(15, 2, 3, 1, 'js', 5.00, 'validated', NULL, '2025-04-29 08:54:13', '2025-04-29 08:54:13'),
(16, 1, 3, 1, 'x', 212.00, 'validated', NULL, '2025-04-29 09:03:27', '2025-04-29 09:03:27'),
(17, 2, 3, 1, 'dcx', 125.00, 'validated', NULL, '2025-04-29 09:18:08', '2025-04-29 09:18:08'),
(18, 2, 3, 1, 'dcx', 125.00, 'validated', NULL, '2025-04-29 09:19:08', '2025-04-29 09:19:08'),
(19, 1, 3, 1, 'de', 125.00, 'validated', NULL, '2025-04-29 09:22:50', '2025-04-29 09:22:50'),
(20, 2, 3, 1, 'de', 125.00, 'validated', NULL, '2025-04-29 09:42:20', '2025-04-29 09:42:20'),
(21, 1, 3, 1, 'edxs', 250.00, 'validated', NULL, '2025-04-29 09:44:47', '2025-04-29 09:44:47'),
(22, 2, 3, 1, 'ifjorlf', 123.00, 'validated', NULL, '2025-04-29 14:06:07', '2025-04-29 14:06:07'),
(23, 1, 3, 1, 'fjken', 125.00, 'validated', NULL, '2025-04-29 14:06:25', '2025-04-29 14:06:25'),
(24, 1, 3, 1, 'vfr', 100.00, 'validated', NULL, '2025-04-29 14:06:46', '2025-04-29 14:06:46'),
(25, 2, 3, 1, 'kldc', 124.00, 'validated', NULL, '2025-04-29 14:07:31', '2025-04-29 14:07:31'),
(30, 1, 3, 1, 'sce', 10200.00, 'validated', NULL, '2025-04-30 10:21:11', '2025-04-30 10:21:11'),
(31, 1, 3, 1, 'jkde', 120.00, 'validated', NULL, '2025-04-30 10:22:02', '2025-04-30 10:22:02'),
(32, 1, 3, 1, 'izz', 2154.00, 'validated', NULL, '2025-04-30 10:46:55', '2025-04-30 10:46:55'),
(33, 3, 2, 2, 'dd', 1200.00, 'validated', NULL, '2025-04-30 14:02:17', '2025-04-30 14:02:17'),
(34, 3, 2, 2, 'de', 12.00, 'validated', NULL, '2025-04-30 14:05:02', '2025-04-30 14:05:02'),
(35, 3, 2, 2, 'gf', 1000.00, 'validated', NULL, '2025-04-30 14:06:23', '2025-04-30 14:06:23'),
(36, 3, 1, 1, 'cadeau', 30000.00, 'validated', NULL, '2025-04-30 17:04:33', '2025-04-30 17:04:33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `balence` decimal(10,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `call_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `balence`, `email`, `email_verified_at`, `call_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DGB', 'Gilfred', 55961.00, 'gilfred@gmail.com', NULL, '54020312', '$2y$12$GLAtKEgAyLPhyOV/DOa8DefstLilT23CuBxt0Qvn6.apYT6j66DAS', NULL, '2025-04-24 12:06:47', '2025-04-30 17:04:33'),
(2, 'Orelson', 'Orel', 65.00, 'orelson@gmail.com', NULL, '52535487', '$2y$12$nej1mD44Zmk85L.GJoXXoe72YobbqI53lpK6/Tr/gDQ.lfd7jxMHG', NULL, '2025-04-24 12:20:35', '2025-04-30 14:06:23'),
(3, 'DEGBEVI', 'Yaovi', 219974.00, 'yaovi@gmail.com', NULL, '54020312', '$2y$12$I/ER0eiv.BOEytUWAzJpO.82jm8OQJPpt/SZXebNm6T.irY2CFq4G', NULL, '2025-04-29 07:29:06', '2025-04-30 17:04:33');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `electronic_cards`
--
ALTER TABLE `electronic_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `electronic_cards_users_id_foreign` (`users_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historiques_id_recepteur_foreign` (`id_recepteur`),
  ADD KEY `historiques_id_expediteur_foreign` (`id_expediteur`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_recepteur_id_foreign` (`recepteur_id`),
  ADD KEY `transactions_expediteur_id_foreign` (`expediteur_id`),
  ADD KEY `transactions_operation_id_foreign` (`operation_id`);

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
-- AUTO_INCREMENT pour la table `electronic_cards`
--
ALTER TABLE `electronic_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `electronic_cards`
--
ALTER TABLE `electronic_cards`
  ADD CONSTRAINT `electronic_cards_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD CONSTRAINT `historiques_id_expediteur_foreign` FOREIGN KEY (`id_expediteur`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historiques_id_recepteur_foreign` FOREIGN KEY (`id_recepteur`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_expediteur_id_foreign` FOREIGN KEY (`expediteur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_operation_id_foreign` FOREIGN KEY (`operation_id`) REFERENCES `operations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_recepteur_id_foreign` FOREIGN KEY (`recepteur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
