-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for oeaweb
CREATE DATABASE IF NOT EXISTS `oeaweb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `oeaweb`;

-- Dumping structure for table oeaweb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table oeaweb.kategoris
CREATE TABLE IF NOT EXISTS `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.kategoris: ~1 rows (approximately)
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
INSERT INTO `kategoris` (`id`, `name`, `gambar`, `created_at`, `updated_at`) VALUES
	(3, 'Tes 2', 'assets/kategori/r0q7vxmPVMoh6EmdaY54W6jE4zeHZw6GHdSnnNMf.jpg', '2021-02-21 14:20:11', '2021-02-21 14:20:11');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;

-- Dumping structure for table oeaweb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2020_05_21_100000_create_teams_table', 1),
	(7, '2020_05_21_200000_create_team_user_table', 1),
	(8, '2020_05_21_300000_create_team_invitations_table', 1),
	(9, '2021_02_17_204414_create_sessions_table', 1),
	(10, '2021_02_17_210853_create_prodis_table', 1),
	(11, '2021_02_17_211544_create_transaksis_table', 1),
	(12, '2021_02_19_133229_create_kategoris_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table oeaweb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table oeaweb.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.personal_access_tokens: ~23 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 9, 'authToken', '0fb748f48e01f675f3d4da7e677409bedb68d3248b0fb19ee9700eeec699e879', '["*"]', NULL, '2021-02-18 11:55:19', '2021-02-18 11:55:19'),
	(2, 'App\\Models\\User', 9, 'authToken', 'ef014d3c860881d78e6aea38981e346201c5a7cc676f079677f6f56b74a3eeb8', '["*"]', NULL, '2021-02-18 11:55:48', '2021-02-18 11:55:48'),
	(3, 'App\\Models\\User', 9, 'authToken', '5c2a070f0fbee63ce41ff0d87b561eb15c34c49d480888de373e8b6c4e029e3a', '["*"]', NULL, '2021-02-18 19:11:43', '2021-02-18 19:11:43'),
	(4, 'App\\Models\\User', 9, 'authToken', 'aae2fd2afdf2bee4da8517a0f763dffebe36c65923f4e8ac7606b7aad12c04bb', '["*"]', NULL, '2021-02-18 19:20:09', '2021-02-18 19:20:09'),
	(5, 'App\\Models\\User', 10, 'auth_token', '6bde6ef5e5bf834796fb3aacd083fcdbbf73e305a25e6e91fb2ad10b9ca4f43e', '["*"]', NULL, '2021-02-18 19:21:35', '2021-02-18 19:21:35'),
	(6, 'App\\Models\\User', 11, 'auth_token', '2e9380f859d9e06453791b6b47058ed875161696de6b2546a0772ec6e4ee6e51', '["*"]', NULL, '2021-02-18 19:39:42', '2021-02-18 19:39:42'),
	(7, 'App\\Models\\User', 9, 'authToken', '736b8491ce7abb32660be7737de4d30ec6828dc64f985e95adce4c7fc3405bca', '["*"]', NULL, '2021-02-18 22:52:01', '2021-02-18 22:52:01'),
	(8, 'App\\Models\\User', 9, 'authToken', '2c1874a487fee5fb7a255819b00c42f7508b35d023bd1b1e6b72cf0a10bf4d12', '["*"]', NULL, '2021-02-18 22:54:53', '2021-02-18 22:54:53'),
	(9, 'App\\Models\\User', 9, 'authToken', '3d3737c1cadda89a985fb78dd52d8f61d69f202e2b68a4eacc47622089d7a355', '["*"]', NULL, '2021-02-18 22:55:35', '2021-02-18 22:55:35'),
	(10, 'App\\Models\\User', 12, 'auth_token', '4d2e44b7c099c6d6f32a7f0d85c7f914e7d52438f6c5411e80ef67d48d1857eb', '["*"]', '2021-02-18 22:58:42', '2021-02-18 22:58:41', '2021-02-18 22:58:42'),
	(11, 'App\\Models\\User', 13, 'auth_token', '28fe105bb654edc7f4daa8a02b4b87e7b11209341944ffc42f5b0f01ddaae86c', '["*"]', NULL, '2021-02-18 23:02:01', '2021-02-18 23:02:01'),
	(12, 'App\\Models\\User', 9, 'authToken', '30543336c690986bce23a0a7e7289f1186949d2ce0daa0fc11265f3e083d16ca', '["*"]', NULL, '2021-02-18 23:08:39', '2021-02-18 23:08:39'),
	(13, 'App\\Models\\User', 14, 'auth_token', '82e38494c1db9c16d55c3fbd6679cc2b72af3502b384842a6372f98b0363c708', '["*"]', '2021-02-18 23:13:27', '2021-02-18 23:13:26', '2021-02-18 23:13:27'),
	(14, 'App\\Models\\User', 15, 'auth_token', '418abae20b33aadef91f757dbc5c2fc1126ae429cf822f7f2685ea39925226e4', '["*"]', '2021-02-18 23:17:15', '2021-02-18 23:17:13', '2021-02-18 23:17:15'),
	(15, 'App\\Models\\User', 16, 'auth_token', 'b26fa9a56540195d45552186d585f9db7a2f16cf330b87c0b736b0792845d9b3', '["*"]', '2021-02-18 23:29:02', '2021-02-18 23:29:00', '2021-02-18 23:29:02'),
	(16, 'App\\Models\\User', 17, 'auth_token', '03814f09e6ff467649d0652bcc66e8a6e5dbe91ae982cac1e5203905f59e77fe', '["*"]', '2021-02-18 23:34:40', '2021-02-18 23:34:38', '2021-02-18 23:34:40'),
	(17, 'App\\Models\\User', 18, 'auth_token', '356ad6923a9d36741a286299d8f3189310fa193c1559bc46b8971b47a3fdea8e', '["*"]', '2021-02-18 23:37:43', '2021-02-18 23:37:41', '2021-02-18 23:37:43'),
	(18, 'App\\Models\\User', 19, 'auth_token', '05cc71d0990793e6762512a5225f3741e8e3fa2b9aa0b6472f5fde2fe8cc289e', '["*"]', '2021-02-19 00:09:18', '2021-02-19 00:09:17', '2021-02-19 00:09:18'),
	(19, 'App\\Models\\User', 20, 'auth_token', 'a213ff555c388538c23f6e67a2d98e018d7aa8c930c5a308dd392a0dd33b8ede', '["*"]', '2021-02-19 00:14:37', '2021-02-19 00:14:36', '2021-02-19 00:14:37'),
	(20, 'App\\Models\\User', 9, 'authToken', '6566a57cd7282c73200123f37acfeffae828c6c8cd34a6c1b2d0bf66ed2cc020', '["*"]', NULL, '2021-02-19 11:26:45', '2021-02-19 11:26:45'),
	(21, 'App\\Models\\User', 9, 'authToken', '8ecbe64e6dab57fbfbabc7b343aeef93a98ab6b1efeb49659339a33aaca8bed4', '["*"]', NULL, '2021-02-19 11:28:13', '2021-02-19 11:28:13'),
	(22, 'App\\Models\\User', 9, 'authToken', 'a89deddbccc3ccc390497bb891561f1a9039c6daa75ebe0fa3a9e439962f22be', '["*"]', NULL, '2021-02-19 11:58:07', '2021-02-19 11:58:07'),
	(23, 'App\\Models\\User', 9, 'authToken', '5dcd6d33934469c0fc496ab3740b017ff1b8eb50d6638746c92a388234fbd5e1', '["*"]', NULL, '2021-02-19 12:00:34', '2021-02-19 12:00:34');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table oeaweb.prodis
CREATE TABLE IF NOT EXISTS `prodis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sibel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(255) NOT NULL,
  `rate` double NOT NULL,
  `dis` double NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.prodis: ~2 rows (approximately)
/*!40000 ALTER TABLE `prodis` DISABLE KEYS */;
INSERT INTO `prodis` (`id`, `nama`, `gambar`, `kampus`, `jenjang`, `id_kategori`, `desc`, `sibel`, `biaya`, `rate`, `dis`, `types`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Agama Islam', 'assets/prodi/OfCwfbUPjeqOazlGr44CY3t7cCFgPs8rI1EgZdS1.jpg', 'asf', 'S1', 2, 'fasfas', 'online', 2000000, 3.5, 0, 'rekomendasi', '2021-02-21 14:26:00', '2021-02-20 17:48:15', '2021-02-21 14:26:00'),
	(2, 'Wilayah Administratif', 'assets/prodi/pYicjlEqZgxYjoC7iA3g1PIFtzWdBybMkYFJ4YV7.jpg', 'bukan', 'S1', 3, 'fasfas', 'online', 123123, 1, 1, 'baru', NULL, '2021-02-20 19:16:29', '2021-02-21 14:20:28');
/*!40000 ALTER TABLE `prodis` ENABLE KEYS */;

-- Dumping structure for table oeaweb.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.sessions: ~1 rows (approximately)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('R2D2XYLviw8tZPQK2w1VKV6UH9O7G7pknUL8qjBn', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiS3hickJtRnhHRXEyYVl6Y09jT1RvNXJhRzg0QVVLZXh5QWt4WlBzRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vb2Vhd2ViLnRlc3QvZGFzaGJvYXJkL3Byb2RpIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHVTbWhzbkNCWlhocFBLWWo4WFJHYS43TXBoZm5IcEdDaTBlWjVsOE9kTDQuazhURkFKUU1hIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR1U21oc25DQlpYaHBQS1lqOFhSR2EuN01waGZuSHBHQ2kwZVo1bDhPZEw0Lms4VEZBSlFNYSI7fQ==', 1613929978);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping structure for table oeaweb.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.teams: ~0 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Dumping structure for table oeaweb.team_invitations
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.team_invitations: ~0 rows (approximately)
/*!40000 ALTER TABLE `team_invitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_invitations` ENABLE KEYS */;

-- Dumping structure for table oeaweb.team_user
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.team_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;

-- Dumping structure for table oeaweb.transaksis
CREATE TABLE IF NOT EXISTS `transaksis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paylink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.transaksis: ~1 rows (approximately)
/*!40000 ALTER TABLE `transaksis` DISABLE KEYS */;
INSERT INTO `transaksis` (`id`, `id_user`, `id_prodi`, `quantity`, `total`, `status`, `paylink`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 20, 2, 1, 20000000, 'PENDING', 'https://class.buildwithangga.com/course_playing/full-stack-laravel-flutter-foodmarket-apps/80', NULL, NULL, '2021-02-21 17:52:55');
/*!40000 ALTER TABLE `transaksis` ENABLE KEYS */;

-- Dumping structure for table oeaweb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `asalSma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatSma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table oeaweb.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `hp`, `alamat`, `kota`, `nik`, `provinsi`, `asalSma`, `alamatSma`, `referrer_id`, `roles`, `created_at`, `updated_at`) VALUES
	(9, 'Evan Helga Suganda', 'evanabaddon@gmail.com', NULL, '$2y$10$uSmhsnCBZXhpPKYj8XRGa.7MphfnHpGCi0eZ5l8OdL4.k8TFAJQMa', NULL, NULL, NULL, NULL, NULL, '987654321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ADMIN', '2021-02-18 11:48:35', '2021-02-18 11:48:35'),
	(20, 'Evan Helga', 'bajhonk@gmail.com', NULL, '$2y$10$tgsbCLgetoXsn8GxF//oQud1G5sQE7ma4tLwzbsStc6OUg7SMhJzy', NULL, NULL, NULL, NULL, 'assets/user/Z7c7mnpy8cNMWem8ravLoAn3oAuDKXcHmosFJ5hh.jpg', '123456789', 'Malang Jatim', '3506', '123456789', '35', 'Test', 'Test test test', NULL, 'USER', '2021-02-19 00:14:36', '2021-02-19 00:14:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
