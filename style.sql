-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 19:32
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `style`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_user_id_foreign` (`user_id`),
  KEY `appointments_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `product_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2021-07-21', '18:29:00', '2021-07-19 03:45:11', '2021-07-19 03:45:11'),
(2, 2, 1, '2021-07-19', '16:00:00', '2021-07-19 03:51:33', '2021-07-19 03:51:33'),
(3, 2, 3, '2021-07-22', '23:10:00', '2021-07-21 10:10:22', '2021-07-21 10:10:22');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_appointment_id_foreign` (`appointment_id`),
  KEY `jobs_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`id`, `appointment_id`, `service_id`, `created_at`, `updated_at`) VALUES
(13, 1, 2, '2021-07-19 03:45:11', '2021-07-19 03:45:11'),
(14, 1, 4, '2021-07-19 03:45:11', '2021-07-19 03:45:11'),
(15, 2, 3, '2021-07-19 03:51:33', '2021-07-19 03:51:33'),
(16, 2, 6, '2021-07-19 03:51:33', '2021-07-19 03:51:33'),
(17, 3, 7, '2021-07-21 10:10:23', '2021-07-21 10:10:23');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_06_13_114826_create_products_table', 2),
(3, '2021_06_26_155930_create_services_table', 3),
(6, '2021_07_12_165954_create_appointments_table', 6),
(5, '2021_07_15_084538_create_jobs_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date1` time NOT NULL,
  `date2` time NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `type`, `gender`, `location`, `detail`, `date1`, `date2`, `logo`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, 1, 'john\'s saloon', 'Haircut Saloon', 'Unisex', 'gunjur palya', 'everything cleaned up', '09:00:00', '21:30:00', 'ice-1244927_1920.jpg', 'aaa.jpg', 'books-1617327_1920.jpg', '2021-06-14 06:17:22', '2021-06-14 06:17:22'),
(2, 1, 'john\'s saloon 2', 'Massage Saloon', 'females Only', 'gunjur palya village', 'damn.. you better come over here baby!!', '09:30:00', '23:00:00', 'baby-2923997_1920.jpg', 'heating-463904_1920.jpg', 'mobile-phone-4646854_1920.jpg', '2021-06-14 06:21:08', '2021-06-14 06:21:08'),
(3, 1, 'diane\'s saloon', 'Massage Saloon', 'Mens Only', 'fghjkjhgfdfgh', 'fghjhhjgh', '10:00:00', '23:06:00', 'ice-1244927_1920.jpg', 'fridge-2358603_1920.jpg', 'supermarket-5202138_1920.jpg', '2021-07-21 10:07:01', '2021-07-21 10:07:01');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `product_id`, `type`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 'Facial', '3001', 'Facial.jpg', '2021-06-26 12:39:48', '2021-06-28 13:01:28'),
(3, 1, 'Body Massage', '12002', 'Body Massage.jpg', '2021-06-26 13:05:08', '2021-06-28 12:17:36'),
(4, 2, 'Waxing', '1200', 'Waxing.jpg', '2021-06-28 13:02:32', '2021-06-28 13:02:32'),
(6, 1, 'Facial', '250', 'Facial.jpg', '2021-07-17 03:33:15', '2021-07-17 03:33:15'),
(7, 3, 'Facial', '100', 'Facial.jpg', '2021-07-21 10:08:00', '2021-07-21 10:08:32');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `location`, `user_type`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', '546456', 'knnkkjjk', '1', 'aaa.jpg', NULL, '$2y$10$64.YWuWQ9YYDPeAa/xzPUutf7ombUnZkHhSXZvGKShTbjKvll7WxG', NULL, '2021-06-13 07:09:11', '2021-06-13 07:09:11'),
(2, 'karim', 'test1@gmail.com', '8975124886', 'varthur hobbli', '2', 'sport-1685896_640.jpg', NULL, '$2y$10$wwICypgq3fOOLAbHz5ofUeMksEtQ2ucakMpPUQyLKS8BPa/swBkFq', NULL, '2021-07-01 10:43:34', '2021-07-01 10:43:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
