-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 09:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `block_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `block_name`, `created_at`, `updated_at`) VALUES
(1, 'C Blok', '2018-01-07 15:23:49', '2018-01-07 15:23:49'),
(2, 'B Blok', '2018-01-07 15:23:49', '2018-01-07 15:23:49'),
(3, 'F Blok', NULL, NULL),
(4, 'Hersek', NULL, NULL),
(5, 'Bosna', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `canteens`
--

CREATE TABLE `canteens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `block_id` int(10) UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `canteens`
--

INSERT INTO `canteens` (`id`, `name`, `user_id`, `block_id`, `location`, `open`, `close`, `created_at`, `updated_at`) VALUES
(2, 'Kafeniz', 2, 4, 'Kutuphane yaninda', '08:00:00', '20:00:00', '2017-12-12 21:00:00', '2018-02-25 12:51:54'),
(4, 'Samet Abi', 3, 5, 'F Blok 1 kat', '08:00:00', '23:50:00', '2017-12-14 10:41:12', '2018-02-17 20:14:20'),
(5, 'Dost', 7, 1, 'C Blok bahcesi', '09:00:00', '23:00:00', '2017-12-27 05:49:19', '2017-12-27 05:49:19'),
(6, 'Kafeniz 2', 7, 4, 'zemin katta beden egitim blogun karsisinda', '09:00:00', '21:00:00', '2018-01-07 16:28:17', '2018-01-07 16:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `canteen_product`
--

CREATE TABLE `canteen_product` (
  `canteen_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `stock` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `canteen_product`
--

INSERT INTO `canteen_product` (`canteen_id`, `product_id`, `stock`, `created_at`, `updated_at`) VALUES
(2, 3, 0, NULL, NULL),
(2, 4, -2, NULL, NULL),
(4, 24, 50, '2018-02-16 18:07:47', '2018-03-13 06:37:24'),
(2, 34, NULL, '2018-02-27 06:11:01', '2018-02-27 06:11:01'),
(4, 38, 67, '2018-02-28 07:48:34', '2018-03-13 06:37:07'),
(4, 39, 100, '2018-03-09 14:37:34', '2018-03-13 06:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

CREATE TABLE `debts` (
  `id` int(10) UNSIGNED NOT NULL,
  `canteen_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `debt_to_be_paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outstanding_debt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debts`
--

INSERT INTO `debts` (`id`, `canteen_id`, `user_id`, `debt_to_be_paid`, `outstanding_debt`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '37.75', '10.00', '2018-03-04 15:33:15', '2018-03-08 22:08:46'),
(2, 4, 8, '33.25', '11.50', '2018-03-04 15:48:51', '2018-03-06 16:56:17'),
(3, 2, 8, '19.75', '19.75', '2018-03-04 15:56:15', '2018-03-04 20:06:51'),
(4, 4, 12, '32.00', '32.00', '2018-03-04 19:38:10', '2018-03-13 07:51:59'),
(5, 2, 12, '2.75', '2.75', '2018-03-04 19:38:38', '2018-03-04 19:55:40'),
(6, 4, 11, '56.50', '12.50', '2018-03-08 18:44:02', '2018-03-10 08:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'DR', NULL, '2017-12-14 15:34:38'),
(5, 'PROF', '2017-12-14 15:33:10', '2017-12-14 15:37:15'),
(6, 'DOC', '2017-12-14 15:37:08', '2017-12-14 15:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'BOTE', 'Egitim', '2017-12-14 15:59:27', '2017-12-14 15:59:27'),
(2, 'KIMYA', 'Egitim', '2017-12-14 16:00:02', '2017-12-14 16:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `favorit_canteens`
--

CREATE TABLE `favorit_canteens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `canteen_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorit_canteens`
--

INSERT INTO `favorit_canteens` (`id`, `user_id`, `canteen_id`, `created_at`, `updated_at`) VALUES
(15, 11, 4, '2018-03-06 16:57:11', '2018-03-06 16:57:11'),
(16, 8, 4, '2018-03-13 05:58:26', '2018-03-13 05:58:26'),
(17, 12, 4, '2018-03-13 06:58:15', '2018-03-13 06:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `kinds`
--

CREATE TABLE `kinds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kinds`
--

INSERT INTO `kinds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'İçecek', '2017-12-06 17:04:48', '2017-12-14 15:49:05'),
(2, 'Yiyecek', '2017-12-06 17:04:48', '2017-12-06 17:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_24_072535_create_degrees_table', 1),
(4, '2017_11_24_075647_create_users_degrees_foreign_table', 1),
(5, '2017_11_28_071526_create_departments_table', 1),
(6, '2017_11_28_072833_create_rooms_table', 1),
(7, '2017_11_28_073003_create_canteens_table', 1),
(8, '2017_11_28_073410_create_kinds_table', 1),
(9, '2017_11_28_073640_create_products_table', 1),
(10, '2017_12_04_153637_create_orders_table', 1),
(11, '2017_12_06_064833_create_notifications_table', 1),
(12, '2017_12_16_222928_create_roles_table', 2),
(13, '2017_12_16_223213_create_role_users_table', 2),
(14, '2018_01_07_181250_create_blocks_table', 3),
(15, '2018_02_24_171332_create_favorit_canteens_table', 4),
(16, '2018_03_04_174903_create_debts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('31d835ee-c045-4e1b-b0f1-5dd0d580699c', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":12,\"name\":\"Sami\",\"surname\":\"Acar\",\"degree_id\":6,\"email\":\"samiacar@gmail.com\",\"phone\":null,\"created_at\":\"2018-02-15 20:10:18\",\"updated_at\":\"2018-02-15 20:10:18\"},\"created_at\":{\"date\":\"2018-03-13 09:59:21.735871\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:59:21', '2018-03-13 07:08:15'),
('63206af5-1268-4b37-8c4f-1a7bacbf3666', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":24,\"name\":\"Sandvic\",\"price\":\"3.00\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\"},\"created_at\":{\"date\":\"2018-03-13 08:58:43.511538\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 05:58:43', '2018-03-13 07:08:15'),
('94428852-6d9f-45e1-8528-7df0fac6f183', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":11,\"name\":\"Mutlu\",\"surname\":\"Tahisndag\",\"degree_id\":2,\"email\":\"mutlu@gmail.com\",\"phone\":\"5923216547\",\"created_at\":\"2018-02-14 14:43:43\",\"updated_at\":\"2018-03-01 14:41:01\",\"room\":null},\"room\":null,\"created_at\":{\"date\":\"2018-03-11 22:38:49.204944\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-11 19:38:49', '2018-03-11 19:38:49'),
('94a163bf-1248-43ae-869d-faefaf786d3c', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":24,\"name\":\"Sandvic\",\"price\":\"3.00\"},\"user\":{\"id\":12,\"name\":\"Sami\",\"surname\":\"Acar\",\"degree_id\":6,\"email\":\"samiacar@gmail.com\",\"phone\":null,\"created_at\":\"2018-02-15 20:10:18\",\"updated_at\":\"2018-02-15 20:10:18\"},\"created_at\":{\"date\":\"2018-03-13 09:59:21.227414\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:59:21', '2018-03-13 07:08:15'),
('a6e443cb-5330-4695-925d-650bc9be1b9e', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":39,\"name\":\"Didi\",\"price\":\"1.25\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\",\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"}},\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"},\"created_at\":{\"date\":\"2018-03-11 22:32:52.490391\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-11 19:32:52', '2018-03-11 19:32:52'),
('a6f590ee-2d0a-472d-b006-0413e65332f7', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\",\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"}},\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"},\"created_at\":{\"date\":\"2018-03-11 22:32:50.541681\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-11 19:32:50', '2018-03-11 19:32:50'),
('b6d18b1d-c031-4f78-a3dd-a18ce5331da1', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":24,\"name\":\"Sandvic\",\"price\":\"3.00\"},\"user\":{\"id\":11,\"name\":\"Mutlu\",\"surname\":\"Tahisndag\",\"degree_id\":2,\"email\":\"mutlu@gmail.com\",\"phone\":\"5923216547\",\"created_at\":\"2018-02-14 14:43:43\",\"updated_at\":\"2018-03-01 14:41:01\"},\"created_at\":{\"date\":\"2018-03-13 08:51:03.211156\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-13 05:51:03', '2018-03-13 05:51:03'),
('bae49817-6f99-40b9-b423-d8f46000d39e', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":39,\"name\":\"Didi\",\"price\":\"1.25\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\"},\"created_at\":{\"date\":\"2018-03-13 09:23:12.088273\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:23:12', '2018-03-13 07:08:15'),
('be3f70fe-b85e-4399-b323-1c5eb3a30862', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":24,\"name\":\"Sandvic\",\"price\":\"3.00\"},\"user\":{\"id\":12,\"name\":\"Sami\",\"surname\":\"Acar\",\"degree_id\":6,\"email\":\"samiacar@gmail.com\",\"phone\":null,\"created_at\":\"2018-02-15 20:10:18\",\"updated_at\":\"2018-02-15 20:10:18\"},\"created_at\":{\"date\":\"2018-03-13 09:58:31.998466\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:58:31', '2018-03-13 07:08:15'),
('c290a47d-ca34-4571-8be9-315d8da2fbdc', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":11,\"name\":\"Mutlu\",\"surname\":\"Tahisndag\",\"degree_id\":2,\"email\":\"mutlu@gmail.com\",\"phone\":\"5923216547\",\"created_at\":\"2018-02-14 14:43:43\",\"updated_at\":\"2018-03-01 14:41:01\"},\"created_at\":{\"date\":\"2018-03-13 08:53:54.500441\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-13 05:53:54', '2018-03-13 05:53:54'),
('c7267314-cf94-4e22-bff7-91e1756d8acf', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":12,\"name\":\"Sami\",\"surname\":\"Acar\",\"degree_id\":6,\"email\":\"samiacar@gmail.com\",\"phone\":null,\"created_at\":\"2018-02-15 20:10:18\",\"updated_at\":\"2018-02-15 20:10:18\"},\"created_at\":{\"date\":\"2018-03-13 09:58:33.823086\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:58:33', '2018-03-13 07:08:15'),
('d328bffd-852b-425f-9a87-c5f9f667cd88', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":39,\"name\":\"Didi\",\"price\":\"1.25\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\",\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"}},\"room\":{\"id\":7,\"user_id\":8,\"number\":206,\"department_id\":1,\"block_id\":null,\"created_at\":\"2018-03-11 22:31:03\",\"updated_at\":\"2018-03-11 22:31:29\"},\"created_at\":{\"date\":\"2018-03-11 22:31:51.966344\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-12 21:00:00', '2018-03-11 19:31:51', '2018-03-11 19:31:51'),
('d86baae1-c594-445c-b2f3-43d0b02f8227', 'App\\Notifications\\OrderNotify', 3, 'App\\User', '{\"product\":{\"id\":38,\"name\":\"Tost\",\"price\":\"4.00\"},\"user\":{\"id\":8,\"name\":\"Hasan\",\"surname\":\"Cakir\",\"degree_id\":6,\"email\":\"hasanc@gmail.com\",\"phone\":\"5221234569\",\"created_at\":\"2018-02-14 14:02:30\",\"updated_at\":\"2018-03-01 18:27:39\"},\"created_at\":{\"date\":\"2018-03-13 09:23:09.372737\",\"timezone_type\":3,\"timezone\":\"Europe\\/Istanbul\"}}', '2018-03-13 07:08:15', '2018-03-13 06:23:09', '2018-03-13 07:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `canteen_id` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `canteen_id`, `piece`, `created_at`, `updated_at`) VALUES
(275, 11, 39, 4, 2, '2018-03-08 08:00:19', '2018-03-10 08:00:19'),
(276, 11, 39, 4, 3, '2018-03-02 08:00:29', '2018-03-10 08:00:29'),
(277, 11, 38, 4, 1, '2018-03-10 08:00:47', '2018-03-10 08:00:47'),
(278, 11, 39, 4, 3, '2018-03-10 08:00:51', '2018-03-10 08:00:51'),
(279, 11, 24, 4, 2, '2018-03-10 08:02:45', '2018-03-10 08:02:45'),
(280, 11, 24, 4, 2, '2018-03-10 08:22:00', '2018-03-10 08:22:00'),
(281, 11, 24, 4, 2, '2018-03-10 08:22:55', '2018-03-10 08:22:55'),
(282, 11, 24, 4, 2, '2018-03-10 08:24:15', '2018-03-10 08:24:15'),
(283, 11, 24, 4, 2, '2018-03-10 08:25:15', '2018-03-10 08:25:15'),
(284, 11, 4, 2, 2, '2018-03-10 08:25:50', '2018-03-10 08:25:50'),
(285, 8, 39, 4, 1, '2018-03-11 19:31:49', '2018-03-11 19:31:49'),
(286, 8, 38, 4, 1, '2018-03-11 19:32:50', '2018-03-11 19:32:50'),
(287, 8, 39, 4, 1, '2018-03-11 19:32:52', '2018-03-11 19:32:52'),
(288, 11, 38, 4, 1, '2018-03-11 19:38:48', '2018-03-11 19:38:48'),
(289, 11, 24, 4, 2, '2018-03-13 05:51:01', '2018-03-13 05:51:01'),
(290, 11, 38, 4, 2, '2018-03-13 05:53:54', '2018-03-13 05:53:54'),
(291, 8, 24, 4, 2, '2018-03-13 05:58:43', '2018-03-13 05:58:43'),
(292, 8, 38, 4, 2, '2018-03-13 06:23:07', '2018-03-13 06:23:07'),
(293, 8, 39, 4, 1, '2018-03-13 06:23:11', '2018-03-13 06:23:11'),
(294, 12, 24, 4, 2, '2018-03-13 06:58:30', '2018-03-13 06:58:30'),
(295, 12, 38, 4, 2, '2018-03-13 06:58:33', '2018-03-13 06:58:33'),
(296, 12, 24, 4, 2, '2018-03-13 06:59:21', '2018-03-13 06:59:21'),
(297, 12, 38, 4, 2, '2018-03-13 06:59:21', '2018-03-13 06:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kinds_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `kinds_id`, `created_at`, `updated_at`) VALUES
(3, 'Cay', '1.00', 'storage/uploads/Cay1520189191.jpg', 1, NULL, '2018-03-04 18:46:32'),
(4, 'Gofret', '1.75', 'storage/uploads/Gofret1520189209.jpg', 2, NULL, '2018-03-04 18:46:49'),
(8, 'Tost', '2.75', 'storage/uploads/', 1, '2017-12-14 13:34:23', '2017-12-14 15:10:41'),
(9, 'sandvic', '1.75', 'storage/uploads/', 1, '2017-12-14 13:48:44', '2017-12-14 13:48:44'),
(22, 'asdasd', '5.00', 'storage/uploads/', 1, '2017-12-17 17:21:19', '2017-12-17 17:21:19'),
(24, 'Sandvic', '3.00', 'storage/uploads/Sandvic1520923044.jpg', 2, '2018-02-16 18:07:47', '2018-03-13 06:37:24'),
(27, 'Cay', '1.00', 'storage/uploads/', 1, '2018-02-16 21:20:32', '2018-02-16 21:20:32'),
(34, 'Sandvic', '9.00', 'storage/uploads/Sandvic1520189222.jpg', 2, '2018-02-27 06:11:01', '2018-03-04 18:47:02'),
(38, 'Tost', '4.00', 'storage/uploads/Tost1520923025.jpeg', 2, '2018-02-28 07:48:34', '2018-03-13 06:37:07'),
(39, 'Didi', '1.25', 'storage/uploads/Didi1520606253.jpg', 1, '2018-03-09 14:37:34', '2018-03-09 14:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin can mange all data of database', '2017-12-16 19:37:47', '2017-12-16 19:37:47'),
(2, 'canteener', 'Canteen worker can manage own canteen and products and can see the orders of own canteen', '2017-12-16 19:37:47', '2017-12-16 19:37:47'),
(3, 'user', 'Users can see canteens and the products and from there they can order product from which one canteen', '2017-12-16 19:38:40', '2017-12-16 19:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-16 19:41:13', '2017-12-16 19:41:13'),
(2, 3, '2017-12-16 19:41:13', '2017-12-16 19:41:13'),
(2, 2, '2017-12-16 19:41:32', '2017-12-16 19:41:32'),
(2, 7, '2017-12-27 05:50:33', '2017-12-27 05:50:33'),
(3, 8, '2018-02-14 11:34:23', '2018-02-14 11:34:23'),
(3, 11, '2018-02-14 11:43:44', '2018-02-14 11:43:44'),
(3, 12, '2018-02-15 17:10:18', '2018-02-15 17:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `block_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `user_id`, `number`, `department_id`, `block_id`, `created_at`, `updated_at`) VALUES
(1, 1, 111, 1, 5, '2017-12-14 16:52:02', '2017-12-14 16:52:02'),
(3, 3, 206, 2, 5, '2017-12-14 17:30:28', '2018-02-12 19:01:29'),
(4, 2, NULL, NULL, NULL, '2017-12-16 13:03:06', '2018-02-12 19:01:16'),
(5, 7, 206, 2, 5, '2018-01-07 15:51:15', '2018-01-07 15:51:15'),
(6, 12, 106, 1, 4, '2018-02-15 17:10:18', '2018-02-15 17:10:18'),
(7, 8, 206, 1, NULL, '2018-03-11 19:31:03', '2018-03-11 19:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `degree_id`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Musa', 'Aliji', 2, 'musa@gazi.tr', '$2y$10$/xy0KnCOv4yRx3xh3Rf/J.72dTESPoGSQabHyEw6X602jHi2nBkuu', 5534912872, 'BGuf9YCZMOcz7DK1CEj9ailMTzx5thmxys8h4AHPhd6flKyxxU8emb98LgQI', '2017-12-06 14:17:24', '2017-12-06 14:17:24'),
(2, 'Sebahattin', 'Altunay', 6, 'sebo@gmail.com', '$2y$10$m3k9ao7sXWzU0px9YV1HO.L3G99K9/UWKSSRCRY6qc0o.wfXkHsbe', 5381997256, 'A3wxRgu8hAUzkezszf7wchYW0KAYyVXfA312UW5e55m17leDOtH3VxjUdZix', '2017-12-09 14:02:54', '2017-12-17 18:40:57'),
(3, 'Mazen', 'Saeed', 6, 'mazen@gmail.com', '$2y$10$2u2APoTbIUC9znB/b43qXOnTeRqAr8TXFeakOYWBJPXtMQ6FYbWFK', 52616512396, 'PmYVXeqZiPtYwxAqwrdok1HxGJWZlG7gdkzMa0rTG8hMDsB0rjBTrtnm1lrk', '2017-12-09 14:23:05', '2017-12-17 10:30:53'),
(7, 'Sevilay', 'Seker', 6, 'sevilay@gmail.com', '$2y$10$SPWllaZ5ZWZWqdg4Vj2aN.9MgKVylHA2N6v.ZU67jNS6eK.V24dLe', 5532959578, 'RYFxBJXRxlCajHwHH8tq2TTfvTHkt0B1mqSDpQiUl2HBfmKG11nw56BRCcFE', '2017-12-16 15:11:37', '2017-12-16 15:12:38'),
(8, 'Hasan', 'Cakir', 6, 'hasanc@gmail.com', '$2y$10$0tgaRSxgdY9Hv7eVRzXSJu8q.JIyfwskL3FsiDIMYNV9aWzP9bu8q', 5221234569, 'GJbM0ggJU3T7OwASUmsWkdP9wc6WoD2dkqoR88K21fYt9KleYFbrJXithS4P', '2018-02-14 11:02:30', '2018-03-01 15:27:39'),
(11, 'Mutlu', 'Tahisndag', 2, 'mutlu@gmail.com', '$2y$10$uLUqZVQid8tVt/7OxeMXl.wOU6qQ8f1zXrYd2Z5xOlBlSAaH4NcJi', 5923216547, '5FZh2kY4gfebw90r9a5lJiDoWG9ZZ5vYwZsemrvXVjuiUR9Jafj1vY1fGetA', '2018-02-14 11:43:43', '2018-03-01 11:41:01'),
(12, 'Sami', 'Acar', 6, 'samiacar@gmail.com', '$2y$10$x0PImWbaXGPTIpE9pV1vc.S.wzfQ1FEeDSElAc.FNQMBBLiMEByha', NULL, '26TCOZfdmX9Nxr4stprH61D8tU1neYrEXCpnf69YiRuuEwoEyQLkxa4YGdV5', '2018-02-15 17:10:18', '2018-02-15 17:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blocks_block_name_unique` (`block_name`);

--
-- Indexes for table `canteens`
--
ALTER TABLE `canteens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `canteen_product`
--
ALTER TABLE `canteen_product`
  ADD KEY `canteen_product_canteen_id_foreign` (`canteen_id`),
  ADD KEY `canteen_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `debts`
--
ALTER TABLE `debts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debts_canteen_id_foreign` (`canteen_id`),
  ADD KEY `debts_user_id_foreign` (`user_id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorit_canteens`
--
ALTER TABLE `favorit_canteens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_kinds_id_foreign` (`kinds_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`),
  ADD KEY `rooms_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_degree_id_foreign` (`degree_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `canteens`
--
ALTER TABLE `canteens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `debts`
--
ALTER TABLE `debts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorit_canteens`
--
ALTER TABLE `favorit_canteens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `canteen_product`
--
ALTER TABLE `canteen_product`
  ADD CONSTRAINT `canteen_product_canteen_id_foreign` FOREIGN KEY (`canteen_id`) REFERENCES `canteens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `canteen_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `debts_canteen_id_foreign` FOREIGN KEY (`canteen_id`) REFERENCES `canteens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `debts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kinds_id_foreign` FOREIGN KEY (`kinds_id`) REFERENCES `kinds` (`id`);

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
