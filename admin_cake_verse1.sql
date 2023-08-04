-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2022 at 03:46 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_cake_verse1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `ip_address`, `device_name`, `type`, `active`, `created_at`, `updated_at`) VALUES
(101, 1, '157.39.144.196', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:100.0) Gecko/20100101 Firefox/100.0', 'login', 1, '2022-05-29 04:44:25', '2022-05-29 04:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `user_type`, `mobile`, `account_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'rakashpal87@gmail.com', NULL, '$2y$10$umXcxV5OaMEJtkMWkxLMu.mz0MxgK35HAR8kpLAAE3Ere1PPKXjvW', 'super_admin', '9646367199', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key_name`, `key_value`, `active`, `created_at`, `updated_at`) VALUES
(1, 'REFERRAL_UPTO', '5', 1, NULL, NULL),
(2, 'ADMIN_WALLET_ADDRESS_KEY', '0x90e64d81dbe54d9577a34c0455921589b674c33c', 1, '2022-05-17 22:37:14', '2022-05-17 22:37:14'),
(3, 'ADMIN_PRIVATE_KEY', '0xecf6cc8fb32b26435f3670142a02f8c0a3615214d9311f7c4e6252dc5dee943b', 1, '2022-05-17 22:37:14', '2022-05-17 22:37:14'),
(4, 'ADMIN_WITHDRAWAL_CHARGES', '5', 1, '2022-05-17 22:37:14', '2022-05-18 12:03:34'),
(5, 'CAKE_VERSE_PRICE', '0.01', 1, '2022-05-20 02:03:28', '2022-05-20 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `c_wallets`
--

CREATE TABLE `c_wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkey` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_wallets`
--

INSERT INTO `c_wallets` (`id`, `user_id`, `address`, `pkey`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, '0x7734d439f1066fe8a21b57b0319bd9bd7476971d', '0x3519e3f67ec9bfaadcbdf88e36ece64eb11f138d33c8b97077c4f3806dde6db8', 1, '2022-05-16 22:30:50', '2022-05-16 22:30:50'),
(2, 1, '0x90e64d81dbe54d9577a34c0455921589b674c33c', '0xecf6cc8fb32b26435f3670142a02f8c0a3615214d9311f7c4e6252dc5dee943b', 1, '2022-05-17 22:35:43', '2022-05-17 22:35:43'),
(3, 3, '0x70dfc72f424516e221589039a7ad0466dffc594d', '0xba8fbe229e421eec98216beccd8672359965fcdb21cd1e4828de6e9a8c77888a', 1, '2022-05-18 11:37:59', '2022-05-18 11:37:59'),
(4, 4, '0xc1df4beb8a283d6a9f27a20ba97017eafa0793d7', '0x0a8615c624c45b8a931b670ef34b82d6a887bc29ca0d06da97463d20813dac08', 1, '2022-05-18 23:52:10', '2022-05-18 23:52:10'),
(5, 5, '0x424d3afc70d9dd8d8864094e1a5a8d9bdec6ec86', '0x043b8a8d3782a52d6deb29682e09926a532936ad67ac0663ca2a0de24601e915', 1, '2022-05-19 20:36:21', '2022-05-19 20:36:21'),
(6, 6, '0x377d45ec8f253306c8a3aaa2af0da968b408cd7e', '0x7746902af8cd8d99238887a6156cdb831890bcd555bb737c72bdc3a96c8d7a34', 1, '2022-05-22 23:37:08', '2022-05-22 23:37:08'),
(7, 7, '0x72a1caed82399700f33ba0887f19e708659e86ce', '0x4134f4f60b7af72d68fe2c28c3a9ff96448a60f9f70140413be1fe617c0f8a91', 1, '2022-05-22 23:38:35', '2022-05-22 23:38:35'),
(8, 8, '0x512cf19b32037795abeff33b4bb3b5e0daca2db0', '0xef03078b79edf7f360c67d79fce6c9d1510671d09b68241177e5ee26eea3ba82', 1, '2022-05-23 02:22:41', '2022-05-23 02:22:41'),
(9, 9, '0xd0aaa6ad9bfe2302f9e3dfa41f301c7dd24e79b4', '0xb9be1ad45d50024425f55ab6d4fbf7152800068450bf9885302c579754ceb654', 1, '2022-05-23 10:34:08', '2022-05-23 10:34:08'),
(10, 10, '0x8130b0ef7f0aee1e6f73515f2072280bfc9561e2', '0xd468351fec47f9b46bc1436132fe64eb11a77ca7d74ed84400080fbcd3637267', 1, '2022-05-23 23:12:53', '2022-05-23 23:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `level_no` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `percentage`, `level_no`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Level 1', 10, 1, 1, NULL, NULL),
(2, 'Level 2', 5, 2, 1, NULL, NULL),
(3, 'Level 3', 3, 3, 1, NULL, NULL),
(4, 'Level 4', 2, 4, 1, NULL, NULL),
(5, 'Level 5', 1, 5, 1, NULL, NULL);

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2022_04_28_155903_create_plans_table', 1),
(22, '2022_04_28_164722_create_user_plans_table', 1),
(23, '2022_04_30_025745_create_levels_table', 1),
(24, '2022_04_30_070630_create_configs_table', 1),
(25, '2022_04_30_073814_create_wallets_table', 1),
(26, '2022_04_30_112413_create_working_income_logs_table', 1),
(27, '2022_05_01_044624_create_roi_logs_table', 1),
(28, '2022_05_03_165132_create_c_wallets_table', 1),
(29, '2022_05_07_094209_create_admins_table', 1),
(30, '2022_05_14_164510_create_activity_logs_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_months` int(11) NOT NULL,
  `monthly_roi` int(11) NOT NULL,
  `min_joining_token` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `no_of_months`, `monthly_roi`, `min_joining_token`, `active`, `created_at`, `updated_at`) VALUES
(1, '12 months', 'Minimum 100$ or Multiple of 100$ (No Limit)', 12, 3, 100, 1, NULL, NULL),
(2, '18 months', 'Minimum 10 Cakes or Multiple of 10 Cakes(No Limit)', 18, 10, 10, 0, NULL, NULL),
(3, '24 months', 'Minimum 10 Cakes or Multiple of 10 Cakes(No Limit)', 24, 9, 10, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roi_logs`
--

CREATE TABLE `roi_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>pending,1=>completed',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `title`, `message`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 'test ticket', 'testingdslfajflsjf lajflaskdf jasjf sl', 1, 1, '2022-05-20 13:10:38', '2022-05-28 05:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` int(11) NOT NULL,
  `email_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` bigint(20) UNSIGNED DEFAULT NULL,
  `referral_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `user_type`, `mobile_number`, `account_status`, `email_token`, `referred_by`, `referral_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rakashpal', 'Singh', 'rakashpal87@gmail.com', NULL, '$2y$10$FzWvVhine64dlDL2RWJ49eTNBWJGt8F/jeUDBeIYUV8/ndTTiuCKm', 'user', '9646367199', 1, NULL, 0, '9434DB85517B', NULL, NULL, NULL),
(2, 'Priyansh', 'Thakur', 'raktrick@gmail.com', NULL, '$2y$10$evLiWT6eHbFRo8sObQ4iTul..fG8.zEygeTcSCQIzjd/ASVcX14xO', 'user', '9646367199', 1, NULL, 1, '8FC77AB37F8B', 'sFsoxTQeMJXb2WppKdy7w4HsAUotH4ofpj1HFkf2VhzrHQxL0l4mhVQbQgWE', '2022-05-16 22:30:48', '2022-05-16 22:30:48'),
(3, 'Narender', 'Singh', 'raktrick@yopmail.com', NULL, '$2y$10$XfB1xxyR2JEX4cqGc4.pJ.s2meVQY.kMI9yCTZeugO2mxrJ0Erwoi', 'user', '9646367199', 1, NULL, 1, '4C1C3246860A', 'dzlX6zkXGCOl6hPB7wSSg2hv0vfM5od4PMZHkK5fOzaWNskUYtWW3iik7Dvm', '2022-05-18 11:37:59', '2022-05-18 11:37:59'),
(4, 'Deepak', 'Verma', 'kartik.xpedient@gmail.com', NULL, '$2y$10$lzsubPw6O4ajDIka6y.rQu1vyxj5z8Z.DuR9xc9/5dMWciTYlBQNC', 'user', '+919990494919', 1, NULL, 1, '142F67E7BAD6', 'WZdiqQSSbLhTalzJ7093ON83HPW2UzzL9Arpwg2Y3Z2dFWUKVvrLUnSJdBsX', '2022-05-18 23:52:10', '2022-05-18 23:52:10'),
(5, 'p', 'Thakur', 'pthakur@yopmail.com', NULL, '$2y$10$RXhujJ5VAdCWgpp/Kqzlx.GSWXcPaE1z8Xp4I5AAfGHzUq5iopCci', 'user', '9780941110', 1, NULL, 2, 'A80199C00232', '2uvGBy6lik6c3WmVQumvbedCjP5IzfOMWWfK6FuLxIhZlhk4IhDudhOjyvZW', '2022-05-19 20:36:21', '2022-05-19 20:36:21'),
(6, 'DUR', 'VIJAY', 'usrdeepak.v@gmail.com', NULL, '$2y$10$ZMAUHNGV4IaKuYFBzXfKD.R4YpQkAK2kwCsbClmz2gCH22o3ITfGe', 'user', '9990494919', 1, NULL, 4, '913B2761BCE0', 'Yi31hg3QlJzaUGqfTLU0k2FMtbamI4GJRCe7KxZ9eikeCRHo9CVnrmlmKlqP', '2022-05-22 23:37:07', '2022-05-22 23:37:07'),
(7, 'Naveen', 'Garg', 'naveen@gmail.com', NULL, '$2y$10$0x79jKniBMAWk4DOMyuQ3ejMOnz0bTZFdFq/I32LxnTRuf.QwJt4m', 'user', '8287274238', 1, NULL, 4, '1577DA5962B9', 'RKSlvSCdWzrrS8nXNNyd41HH9uBIHTt2FtfpplQbEgoYKYSKaZPHiebVnEc8', '2022-05-22 23:38:34', '2022-05-22 23:38:34'),
(8, 'NAVEEEN', 'GARG', 'naveenkumargarg@gmail.com', NULL, '$2y$10$XgIQVlQlAZoVeV4vFnUPz.5FFHQqOL4/SiT3bdT0hcixz6Zp6HSaa', 'user', '9718340065', 1, NULL, 1, '4F787B7CC9A3', 'C8ZIQQswhpmIxw9eyRojMJm1PywSpN5lG0TCDKyatlrq2pwzaCNNtKomgEHG', '2022-05-23 02:22:40', '2022-05-23 02:22:40'),
(9, 'Rakashpal', 'Singh', 'ppthakur@yopmail.com', NULL, '$2y$10$WEQhUIzsXaVfQsgYhbR/C.4IkgHDlcH5lTEqc4S.5Q7AMvc/reS4m', 'user', '9646367199', 1, NULL, 2, 'C6D69B44505F', 'J0bxTgZt43j6rDJYXmMRER2xMxtzk0tJcoKIrXqjVIaHvNHw51nV9JTGf7pB', '2022-05-23 10:34:08', '2022-05-23 10:34:08'),
(10, 'vicky', 'kashyap[', 'veee.kay258@gmail.com', NULL, '$2y$10$5HkQ1pjPm3pvawInx4ukTuHVgSqLMul4ZyEZHJt5NCOnoNXXBXfP.', 'user', '9034195001', 1, NULL, 1, '028B5C2F4FD5', 'f56uclf182veaUQ0jgiMO5w0QwpIQKJPsHCMkjxtpUtscqDRVIIp5qZPpXjh', '2022-05-23 23:12:52', '2022-05-23 23:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_plans`
--

CREATE TABLE `user_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `total_cakes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `expire_date` timestamp NULL DEFAULT NULL,
  `roi_until_date` timestamp NULL DEFAULT NULL,
  `roi_price_till_date` int(11) DEFAULT '0',
  `txId` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`id`, `user_id`, `plan_id`, `total_cakes`, `active`, `expire_date`, `roi_until_date`, `roi_price_till_date`, `txId`, `usd_price`, `created_at`, `updated_at`) VALUES
(6, 1, 1, '10000', 1, '2023-05-29 04:44:46', NULL, 0, '0x58006a67addbaf1195688326ac94db4b226b65939bf1da8df658395e110ab72d', '100', '2022-05-29 04:44:46', '2022-05-29 04:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `working_income` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdrawal_working_income` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `withdrawal_till_date` timestamp NULL DEFAULT NULL,
  `non_working_income` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `working_income`, `withdrawal_working_income`, `withdrawal_till_date`, `non_working_income`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '0', NULL, '0', 1, '2022-05-18 11:01:57', '2022-05-29 02:23:45'),
(2, 2, '0', '0', NULL, '0', 1, '2022-05-18 11:01:57', '2022-05-28 10:48:55'),
(3, 3, '0', '0', NULL, '0', 1, '2022-05-18 12:06:39', '2022-05-20 22:29:26'),
(4, 8, '0', '0', NULL, '0', 1, '2022-05-23 02:39:58', '2022-05-27 01:27:45'),
(5, 10, '0', '0', NULL, '0', 1, '2022-05-23 23:58:55', '2022-05-23 23:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_histories`
--

CREATE TABLE `withdrawal_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>pending,1=>completed,2=>rejected',
  `txId` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reject_reason` text COLLATE utf8mb4_unicode_ci,
  `admin_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `working_income_logs`
--

CREATE TABLE `working_income_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `referal_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal_hierarchy_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_no` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_wallets`
--
ALTER TABLE `c_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roi_logs`
--
ALTER TABLE `roi_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_plans`
--
ALTER TABLE `user_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_histories`
--
ALTER TABLE `withdrawal_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_income_logs`
--
ALTER TABLE `working_income_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `c_wallets`
--
ALTER TABLE `c_wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roi_logs`
--
ALTER TABLE `roi_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_plans`
--
ALTER TABLE `user_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawal_histories`
--
ALTER TABLE `withdrawal_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `working_income_logs`
--
ALTER TABLE `working_income_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
