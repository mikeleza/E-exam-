-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 11:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '0001_01_01_000000_create_users_table', 1),
(25, '0001_01_01_000001_create_cache_table', 1),
(26, '0001_01_01_000002_create_jobs_table', 1),
(27, '2024_09_23_042321_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physical_tests`
--

CREATE TABLE `physical_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `color_blindness_test` tinyint(1) NOT NULL,
  `long_sightedness_test` tinyint(1) NOT NULL,
  `astigmatism_test` tinyint(1) NOT NULL,
  `response_test` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `physical_tests`
--

INSERT INTO `physical_tests` (`id`, `user_id`, `color_blindness_test`, `long_sightedness_test`, `astigmatism_test`, `response_test`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 1, 'ไม่ผ่าน', NULL, NULL),
(2, 2, 1, 1, 1, 0, 'ผ่าน', NULL, NULL),
(3, 3, 1, 1, 0, 1, 'ผ่าน', NULL, NULL),
(4, 4, 1, 1, 1, 0, 'ผ่าน', NULL, NULL),
(5, 5, 0, 0, 0, 0, 'ไม่ผ่าน', NULL, NULL),
(6, 6, 0, 1, 1, 1, 'ไม่ผ่าน', NULL, NULL),
(7, 7, 0, 1, 1, 1, 'ไม่ผ่าน', NULL, NULL),
(8, 8, 0, 0, 0, 0, 'ไม่ผ่าน', NULL, NULL),
(9, 9, 0, 1, 0, 1, 'ผ่าน', NULL, NULL),
(10, 10, 0, 0, 0, 0, 'ผ่าน', NULL, NULL),
(11, 11, 1, 1, 1, 0, 'ผ่าน', NULL, NULL),
(12, 12, 0, 1, 0, 0, 'ผ่าน', NULL, NULL),
(13, 13, 1, 0, 0, 0, 'ผ่าน', NULL, NULL),
(14, 14, 1, 1, 1, 1, 'ผ่าน', NULL, NULL),
(15, 15, 1, 0, 0, 1, 'ไม่ผ่าน', NULL, NULL),
(16, 16, 1, 1, 1, 0, 'ผ่าน', NULL, NULL),
(17, 17, 1, 1, 0, 1, 'ไม่ผ่าน', NULL, NULL),
(18, 18, 1, 1, 0, 0, 'ผ่าน', NULL, NULL),
(19, 19, 0, 0, 0, 1, 'ไม่ผ่าน', NULL, NULL),
(21, 22, 1, 1, 1, 0, 'ผ่าน', '2024-09-23 00:42:09', '2024-09-23 00:42:09'),
(22, 23, 0, 0, 0, 0, 'ไม่ผ่าน', '2024-09-23 01:07:21', '2024-09-23 01:07:21'),
(23, 25, 0, 0, 0, 0, 'ไม่ผ่าน', '2024-09-23 02:20:41', '2024-09-23 02:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `practical_tests`
--

CREATE TABLE `practical_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practical_tests`
--

INSERT INTO `practical_tests` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ผ่าน', NULL, '2024-09-23 02:29:23'),
(2, 2, 'ผ่าน', NULL, '2024-09-23 02:29:43'),
(3, 3, 'ไม่ผ่าน', NULL, NULL),
(4, 4, 'ผ่าน', NULL, NULL),
(5, 5, 'ไม่ผ่าน', NULL, '2024-09-23 02:22:36'),
(6, 6, 'ผ่าน', NULL, NULL),
(7, 7, 'ไม่ผ่าน', NULL, NULL),
(8, 8, 'ผ่าน', NULL, NULL),
(9, 9, 'ไม่ผ่าน', NULL, NULL),
(10, 10, 'ไม่ผ่าน', NULL, NULL),
(11, 11, 'ไม่ผ่าน', NULL, NULL),
(12, 12, 'ไม่ผ่าน', NULL, NULL),
(13, 13, 'ผ่าน', NULL, NULL),
(14, 14, 'ผ่าน', NULL, NULL),
(15, 15, 'ผ่าน', NULL, NULL),
(16, 16, 'ผ่าน', NULL, NULL),
(17, 17, 'ไม่ผ่าน', NULL, NULL),
(18, 18, 'ไม่ผ่าน', NULL, NULL),
(19, 19, 'ผ่าน', NULL, NULL),
(21, 22, 'ผ่าน', '2024-09-23 00:42:09', '2024-09-23 00:42:09'),
(22, 23, 'ผ่าน', '2024-09-23 01:07:21', '2024-09-23 01:09:45'),
(23, 25, 'ไม่ผ่าน', '2024-09-23 02:20:41', '2024-09-23 02:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `passed_count` int(11) NOT NULL,
  `failed_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `passed_count`, `failed_count`, `created_at`, `updated_at`) VALUES
(1, '2024-09-23', 15, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('SXXD3DdVCv9DailUv6LxUgHO55UIXFbK8ND0KlP0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFhpVTdFUzdjWkNmZ2Y2YTU3Z1hKeEFDR1docHhIRUg5R2dRRkQ4bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91cGRhdGUvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727084495);

-- --------------------------------------------------------

--
-- Table structure for table `test_records`
--

CREATE TABLE `test_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `physical_test_id` bigint(20) UNSIGNED NOT NULL,
  `theoretical_test_id` bigint(20) UNSIGNED NOT NULL,
  `practical_test_id` bigint(20) UNSIGNED NOT NULL,
  `overall_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_records`
--

INSERT INTO `test_records` (`id`, `user_id`, `physical_test_id`, `theoretical_test_id`, `practical_test_id`, `overall_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'ผ่านการทดสอบ', NULL, NULL),
(2, 2, 2, 2, 2, 'ผ่านการทดสอบ', NULL, NULL),
(3, 3, 3, 3, 3, 'ผ่านการทดสอบ', NULL, NULL),
(4, 4, 4, 4, 4, 'ผ่านการทดสอบ', NULL, NULL),
(5, 5, 5, 5, 5, 'ผ่านการทดสอบ', NULL, NULL),
(6, 6, 6, 6, 6, 'ผ่านการทดสอบ', NULL, NULL),
(7, 7, 7, 7, 7, 'ผ่านการทดสอบ', NULL, NULL),
(8, 8, 8, 8, 8, 'ผ่านการทดสอบ', NULL, NULL),
(9, 9, 9, 9, 9, 'ผ่านการทดสอบ', NULL, NULL),
(10, 10, 10, 10, 10, 'ผ่านการทดสอบ', NULL, NULL),
(11, 11, 11, 11, 11, 'ผ่านการทดสอบ', NULL, NULL),
(12, 12, 12, 12, 12, 'ผ่านการทดสอบ', NULL, NULL),
(13, 13, 13, 13, 13, 'ผ่านการทดสอบ', NULL, NULL),
(14, 14, 14, 14, 14, 'ผ่านการทดสอบ', NULL, NULL),
(15, 15, 15, 15, 15, 'ผ่านการทดสอบ', NULL, NULL),
(16, 16, 16, 16, 16, 'ผ่านการทดสอบ', NULL, NULL),
(17, 17, 17, 17, 17, 'ผ่านการทดสอบ', NULL, NULL),
(18, 18, 18, 18, 18, 'ผ่านการทดสอบ', NULL, NULL),
(19, 19, 19, 19, 19, 'ผ่านการทดสอบ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theoretical_tests`
--

CREATE TABLE `theoretical_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `traffic_sign_score` int(11) NOT NULL,
  `traffic_line_score` int(11) NOT NULL,
  `right_of_way_score` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theoretical_tests`
--

INSERT INTO `theoretical_tests` (`id`, `user_id`, `traffic_sign_score`, `traffic_line_score`, `right_of_way_score`, `total_score`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 25, 25, 75, 'ไม่ผ่าน', NULL, '2024-09-23 02:29:23'),
(2, 2, 21, 8, 18, 47, 'ไม่ผ่าน', NULL, '2024-09-23 02:29:43'),
(3, 3, 5, 24, 15, 44, 'ไม่ผ่าน', NULL, NULL),
(4, 4, 36, 48, 33, 117, 'ผ่าน', NULL, NULL),
(5, 5, 13, 50, 43, 106, 'ผ่าน', NULL, '2024-09-23 02:22:36'),
(6, 6, 40, 16, 50, 106, 'ผ่าน', NULL, NULL),
(7, 7, 33, 10, 25, 68, 'ไม่ผ่าน', NULL, NULL),
(8, 8, 36, 11, 25, 72, 'ไม่ผ่าน', NULL, NULL),
(9, 9, 10, 44, 35, 89, 'ผ่าน', NULL, NULL),
(10, 10, 42, 9, 32, 83, 'ผ่าน', NULL, NULL),
(11, 11, 43, 7, 33, 83, 'ผ่าน', NULL, NULL),
(12, 12, 9, 9, 37, 55, 'ไม่ผ่าน', NULL, NULL),
(13, 13, 10, 2, 29, 41, 'ไม่ผ่าน', NULL, NULL),
(14, 14, 38, 37, 46, 121, 'ผ่าน', NULL, NULL),
(15, 15, 18, 44, 6, 68, 'ไม่ผ่าน', NULL, NULL),
(16, 16, 6, 7, 22, 35, 'ไม่ผ่าน', NULL, NULL),
(17, 17, 21, 26, 23, 70, 'ไม่ผ่าน', NULL, NULL),
(18, 18, 13, 47, 19, 79, 'ไม่ผ่าน', NULL, NULL),
(19, 19, 37, 33, 14, 84, 'ผ่าน', NULL, NULL),
(21, 22, 50, 50, 50, 150, 'ผ่าน', '2024-09-23 00:42:09', '2024-09-23 00:42:09'),
(22, 23, 1, 1, 1, 3, 'ไม่ผ่าน', '2024-09-23 01:07:21', '2024-09-23 01:09:45'),
(23, 25, 5, 5, 5, 15, 'ไม่ผ่าน', '2024-09-23 02:20:41', '2024-09-23 02:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', NULL, NULL),
(2, 'Jane', 'Smith', NULL, NULL),
(3, 'Michael', 'Johnson', NULL, NULL),
(4, 'Emily', 'Davis', NULL, NULL),
(5, 'Chris', 'Brown', NULL, NULL),
(6, 'Jessica', 'Williams', NULL, NULL),
(7, 'Matthew', 'Jones', NULL, NULL),
(8, 'Ashley', 'Garcia', NULL, NULL),
(9, 'David', 'Martinez', NULL, NULL),
(10, 'Sarah', 'Hernandez', NULL, NULL),
(11, 'Daniel', 'Lopez', NULL, NULL),
(12, 'Sophia', 'Wilson', NULL, NULL),
(13, 'Andrew', 'Anderson', NULL, NULL),
(14, 'Olivia', 'Thomas', NULL, NULL),
(15, 'Joshua', 'Taylor', NULL, NULL),
(16, 'Ava', 'Moore', NULL, NULL),
(17, 'Ethan', 'Jackson', NULL, NULL),
(18, 'Mia', 'Martin', NULL, NULL),
(19, 'James', 'Lee', NULL, NULL),
(22, 'พงศธร', 'บางเหลือง', '2024-09-23 00:42:09', '2024-09-23 00:42:09'),
(23, 'asd', 'dsa', '2024-09-23 01:07:21', '2024-09-23 01:07:21'),
(25, 'สม', 'พร', '2024-09-23 02:20:41', '2024-09-23 02:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `physical_tests`
--
ALTER TABLE `physical_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `physical_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `practical_tests`
--
ALTER TABLE `practical_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `practical_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `test_records`
--
ALTER TABLE `test_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_records_user_id_foreign` (`user_id`),
  ADD KEY `test_records_physical_test_id_foreign` (`physical_test_id`),
  ADD KEY `test_records_theoretical_test_id_foreign` (`theoretical_test_id`),
  ADD KEY `test_records_practical_test_id_foreign` (`practical_test_id`);

--
-- Indexes for table `theoretical_tests`
--
ALTER TABLE `theoretical_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theoretical_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `physical_tests`
--
ALTER TABLE `physical_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `practical_tests`
--
ALTER TABLE `practical_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_records`
--
ALTER TABLE `test_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `theoretical_tests`
--
ALTER TABLE `theoretical_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `physical_tests`
--
ALTER TABLE `physical_tests`
  ADD CONSTRAINT `physical_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `practical_tests`
--
ALTER TABLE `practical_tests`
  ADD CONSTRAINT `practical_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_records`
--
ALTER TABLE `test_records`
  ADD CONSTRAINT `test_records_physical_test_id_foreign` FOREIGN KEY (`physical_test_id`) REFERENCES `physical_tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_records_practical_test_id_foreign` FOREIGN KEY (`practical_test_id`) REFERENCES `practical_tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_records_theoretical_test_id_foreign` FOREIGN KEY (`theoretical_test_id`) REFERENCES `theoretical_tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theoretical_tests`
--
ALTER TABLE `theoretical_tests`
  ADD CONSTRAINT `theoretical_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
