-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 05:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digimo_masterqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conpany_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_6` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `user_id`, `user_name`, `first_name`, `last_name`, `email`, `phone`, `designation`, `conpany_name`, `link_1`, `link_2`, `link_3`, `link_4`, `link_5`, `link_6`, `photo`, `cover_photo`, `created_at`, `updated_at`, `description`, `other`, `info`) VALUES
(1, 2, 'sheikh0001', 'sheikh', 'sheikh', 'sheikh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-23 10:24:38', '2021-09-23 10:24:38', NULL, NULL, NULL),
(2, 3, 'taj0002', 'Taj', 'taj', 'taj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-23 10:27:22', '2021-09-23 10:27:22', NULL, NULL, NULL),
(3, 4, 'sohanur0003', 'MD.', 'RAHMAN', 'sohan01772@gmail.com', '01992392269', 'ami sohan', NULL, '{\"facebook\":\"www.t\"}', NULL, NULL, NULL, NULL, NULL, 'uploads/card/hUUpEP7ryBUscWaH26TZ11Vk6as0coBEncIk2k27.jpg', 'uploads/card/KLbQDdINZZpbOFoIw87T6rBsN5BbpE7MC8l3I0ob.jpg', '2021-09-24 08:59:27', '2021-09-24 12:25:19', NULL, NULL, NULL),
(4, 5, 'md.0004', 'MD.', 'Sohan', 'sohan01772@gmail.com', '1966913043', 'ami sohan', NULL, '{\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"Youtube\":\"https:\\/\\/youtube.com\\/\",\"Vimeo\":\"https:\\/\\/vimeo.com\\/469450080\",\"Skype\":\"https:\\/\\/web.whatsapp.com\\/\"}', '1928 Haworth Street', '+880', NULL, NULL, NULL, 'uploads/card/MK2IcVT6L7Mw7wgMKjugUDMfadQHEzPd7D1WNpc6.jpg', 'uploads/card/80DtIe8tdHhFOxTQFh8t8Hglk8BQco6WxD1qO0PF.png', '2021-09-26 11:43:44', '2021-09-26 15:05:48', NULL, NULL, NULL),
(5, 6, 'rahman0005', 'Mona', 'Lisa', 'sohan@gmail.com', '-920 143 746', 'Graphic designer', 'Adobe Creative', '{\"key\":\"facebook\",\"link\":\"https:\\/\\/web.whatsapp.com\\/\"}', 'West rajabazar', '+351', '{\"key\":\"linkedin\",\"link\":\"https:\\/\\/web.whatsapp.com\\/\"}', '{\"key\":\"Skype\",\"link\":\"https:\\/\\/web.whatsapp.com\\/\"}', '{\"key\":\"WhatsApp\",\"link\":\"https:\\/\\/web.whatsapp.com\\/\"}', 'uploads/card/p0r77grlxY9GRh9R2G5SUIaKzCzhnDB3pGmtNUgc.png', '2', '2021-09-26 15:41:57', '2021-09-28 15:45:42', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem typesetting Ipsum .', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_21_093126_create_cards_table', 1),
(6, '2021_09_27_164359_add_company_to_cards_table', 2),
(7, '2021_09_30_115942_create_social_links_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Linkedin', 'https://www.linkedin.com/in/username', '2021-09-30 12:08:25', NULL),
(2, 'vimeo', 'https://vimeo.com/', NULL, NULL),
(3, 'Facebook', 'https://www.facebook.com/', NULL, NULL),
(4, 'Twitter', 'https://twitter.com/', NULL, NULL),
(5, 'instagram', 'https://www.instagram.com/', NULL, NULL),
(6, 'Behance', 'https://www.behance.net/', NULL, NULL),
(7, 'youtube', 'https://youtube.com/', NULL, NULL),
(8, 'skype', 'https://www.skype.com/en/', NULL, NULL),
(9, 'Whatsapp', 'https://api.whatsapp.com/send?phone=', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr Admin', 'bappy@dev.local', NULL, '$2y$10$nZFZ4.bERLBzi2aZnJeX1OHfGYu8GEfVOV8.Zi50nkd9lZw8wpa4e', 'admin', NULL, NULL, NULL, '2021-09-23 10:19:53', '2021-09-23 10:19:53'),
(2, 'sheikh sheikh', 'sheikh@gmail.com', NULL, '$2y$10$8lzig0pemZcByJmmSFVLKe.8CXNm8we2patCZuiYoROg70fpUG4Ti', 'user', NULL, NULL, NULL, '2021-09-23 10:24:38', '2021-09-23 10:24:38'),
(3, 'Taj taj', 'taj@gmail.com', NULL, '$2y$10$CrWoVzRwsfgb4gHYKNTTie5noFZAsC.UC6nllv8NMT1bw1JMleUpq', 'user', NULL, NULL, NULL, '2021-09-23 10:27:22', '2021-09-23 10:27:22'),
(4, 'Sohanur Rahman', 'sohan@dev.local', NULL, '$2y$10$Kwokz7lRcNF.JHASjiRr2OkC22JfuvYXc6dW1c33UWCAdhQfdSTva', 'user', NULL, NULL, NULL, '2021-09-24 08:59:27', '2021-09-24 08:59:27'),
(5, 'MD. Sohan', 'sohan01772@gmail.com', NULL, '$2y$10$kUyjXLL46rHmJfcle9K/w.DhrV02jhz9k3x1eRDeMV9cxd95DdYkO', 'user', NULL, NULL, NULL, '2021-09-26 11:43:44', '2021-09-26 11:43:44'),
(6, 'Rahman Sohan', 'sohan@gmail.com', NULL, '$2y$10$k1YXD9xH7BZOrVdVQudwCuQGQJS/asmeoqPf6ozgt5ivA.1dKj.6y', 'user', '2021-09-30 04:56:44', '::1', NULL, '2021-09-26 15:41:57', '2021-09-30 04:56:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
