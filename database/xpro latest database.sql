-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 05:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpro`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_06_153804_create_sessions_table', 1),
(7, '2024_05_17_125650_create_refferals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `refferalcode` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_method`, `status`, `amount`, `currency`, `transaction_id`, `refferalcode`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 1, 'Card', 'pending', '45', '₦', 'as0kwa0n4m', 4378784, '2024-05-17 14:52:29', '2024-05-17 14:52:31', 1),
(2, 6, 'Card', 'successful', '45', '₦', 'nb88v0bqlc', 4378784, '2024-05-17 14:52:46', '2024-05-17 14:54:37', 1),
(3, 8, 'Card', 'pending', '20000', '₦', 'y6fur1eb9l', NULL, '2024-05-20 10:47:49', '2024-05-20 10:47:50', 2),
(4, 1, 'Card', 'pending', '40000', '₦', 'yl556hlm2u', NULL, '2024-05-21 06:38:05', '2024-05-21 06:38:06', 1),
(5, 1, 'Card', 'pending', '20000', '₦', '4jxef1utl8', NULL, '2024-05-21 06:39:25', '2024-05-21 06:39:25', 2),
(6, 1, 'Card', 'pending', '20000', '₦', 'qfgjk5wpq0', NULL, '2024-05-21 08:11:24', '2024-05-21 08:11:25', 2),
(7, 1, 'Card', 'pending', '20000', '₦', 'y515vceksz', NULL, '2024-05-21 08:13:58', '2024-05-21 08:13:59', 2),
(8, 1, 'Card', 'pending', '20000', '₦', '1lxilztcc9', 4378784, '2024-05-23 06:12:22', '2024-05-23 06:12:23', 2),
(9, 1, 'Card', 'pending', '20000', '₦', 's3qylmd8o4', 4378784, '2024-05-23 06:18:22', '2024-05-23 06:18:22', 2),
(10, 1, 'Card', 'pending', '40000', '₦', 'nt2i16lhoz', 4378784, '2024-05-23 06:23:05', '2024-05-23 06:23:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sales@pampost.com', '$2y$12$i1vMeshHTm/h.IOBLMKBa.FWL5kAQjHi4fsLycQj/Wd18H/tB72Ju', '2024-05-10 13:25:20'),
('uchetochukwu@gmail.com', '$2y$12$4/h8gPptKbtvVPDas525DeoQcOIfT8UpTBNGxcIeix9VYU5aZgbIa', '2024-05-06 15:17:30');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_description`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'My Commission Shortcut: Affiliate Marketing Masterclass', 40000, 'Welcome to PAMPost, your premier destination for unlocking the secrets to financial success through expertly crafted video tutorials. We are an innovative affiliate marketing agency dedicated to empowering individuals with the knowledge and skills necessary to thrive in today’s fast-paced digital economy.\r\n<br><br>\r\n**Our Mission**\r\n<br><br>\r\nAt PAMPost, our mission is simple: to provide high-quality, actionable content that helps people transform their passions into profitable ventures. We believe in the power of education and the limitless potential of the internet to create opportunities for everyone, regardless of their background or experience.\r\n<br><br>\r\n**What We Offer**\r\n<br><br>\r\nOur comprehensive video tutorials cover a wide range of money-making skills, from the basics of affiliate marketing and e-commerce to advanced strategies in digital marketing, content creation, and more. Each tutorial is designed by industry experts who have successfully navigated the online business landscape, ensuring you receive practical, real-world advice that works.\r\n<br><br>\r\n**Why Choose PAMPost?**\r\n<br><br>\r\n1. **Expert-Led Content:** Our tutorials are created and led by seasoned professionals who have a proven track record of success in their respective fields. They share insider tips, strategies, and techniques that can help you achieve similar results.\r\n\r\n2. **User-Friendly Platform:** Our platform is designed with you in mind. Easy to navigate and accessible from any device, PAMPost makes learning convenient and enjoyable.\r\n\r\n3. **Community Support:** Join a vibrant community of like-minded individuals who are also on their journey to financial freedom. Share experiences, ask questions, and find support as you progress through our tutorials.\r\n\r\n4. **Continuous Learning:** The digital world is constantly evolving, and so are we. We regularly update our content to reflect the latest trends, tools, and techniques, ensuring you stay ahead of the curve.\r\n\r\n**Our Values**\r\n\r\n- **Integrity:** We are committed to providing honest, transparent, and reliable information.\r\n- **Empowerment:** We aim to equip you with the skills and confidence needed to succeed independently.\r\n- **Innovation:** We embrace new ideas and technologies to deliver the best learning experience possible.\r\n- **Community:** We foster a supportive environment where members can grow together and help each other succeed.\r\n\r\n\r\n**Join Us Today**', '1716475506.png', '2024-05-17 15:52:00', '2024-05-23 13:45:06'),
(2, 'WhatsApp Sales Blueprint 2.0 Course', 20000, 'Large text area content', '1716187445.png', '2024-05-20 05:44:05', '2024-05-20 05:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `refferals`
--

CREATE TABLE `refferals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `refferal_percentage` int(11) NOT NULL,
  `refferal_profit` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refferals`
--

INSERT INTO `refferals` (`id`, `user_id`, `order_id`, `refferal_percentage`, `refferal_profit`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 50, '22.50', '2024-05-17 14:54:37', '2024-05-17 14:54:37'),
(2, 1, 2, 50, '22.50', '2024-05-17 15:01:22', '2024-05-17 15:01:22'),
(3, 1, 2, 50, '22.50', '2024-05-17 15:01:36', '2024-05-17 15:01:36'),
(4, 1, 2, 50, '22.50', '2024-05-17 15:02:11', '2024-05-17 15:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JZanp43gH3ErDJlKmrxWbB6XKdd3HbFY8WggFlbY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Avast/124.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR29uRVREbU40dkRqQkwwVVIySXM4N0FkRjd4M1ROT244N0o2ckRTciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1716473001),
('YQzu4SSr5oSsiOOeGxjtYouRGSb3EVmdMc0nKuT3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZG95TlNhbTdoeGdWT0dCbVJXVFh5WjZsRXFhaloyc3Z6R21DSUcxNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0ZGV0YWlsLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716475516);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refferral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `affiliate_code`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `refferral_code`) VALUES
(1, 'Onutochukwu Uche', '4378784', 'uchetochukwu@gmail.com', NULL, '$2y$12$c1yAOEZJda3RkvROUJ1PC.D8Dy1JWLR9ylV.XMOHGPFRFhQGW/n5a', NULL, NULL, NULL, 'cw86vJL7Mn31ksxTeQZ3AZegjQK6Ne5XSsUyTk5kPxW6ciSq2MaTlkGuGsI4', NULL, NULL, '2024-05-06 14:44:36', '2024-05-06 14:44:36', NULL),
(2, 'Solomon Sam', '94838190', 'sol@gmail.com', NULL, '$2y$12$wOalRftydIkuhL81tJUcMeF7NGr8VP/sg7he/efXoCDekSKu.XQS2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-09 13:28:53', '2024-05-09 13:28:53', NULL),
(3, 'Pam Post', '9646816', 'sales@pampost.com', NULL, '$2y$12$oc65j0k736kf1l2Sz7E5UeJniUPMkouPuaf9Giu7ygiOOV26rcMHK', NULL, NULL, NULL, 'K4log3UHB0LCirXuH4YxTRnTnky411eyR413NOZdNw2ZMKD0RtV5v6AYU5K7', NULL, NULL, '2024-05-10 08:50:20', '2024-05-10 08:50:20', NULL),
(4, 'Bill D Gates', '76275555', 'bill@gate.com', NULL, '$2y$12$PAOq1qvS4kYS8/8mUdp6g.uu6BUWF1xpdmQxIVMwLHOrwZgnzzBnS', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-14 10:13:36', '2024-05-14 10:13:36', NULL),
(6, 'chiwetara Rese igwe', 'jQ0TPRq35t', 'donchiwexco@gmail.com', NULL, '$2y$12$IdLrq712bIcA0AlLTpCe0eDI6Gx6RgXhg1tiPKbaA0Xqmptgk8TjO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-17 14:27:59', '2024-05-17 14:27:59', '4378784'),
(7, 'Bill D Gates', 'VUm09G9Hgk', 'bill33@gate.com', NULL, '$2y$12$/3JCOottbUWuw7NbluL0A.Y6sACjprEILCsm5LuGib6PuTYjtBUFy', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 10:02:59', '2024-05-20 10:02:59', ''),
(8, 'Onutochukwu Uche iii', '8H9XWsGJGM', 'bill55@gate.com', NULL, '$2y$12$rVaqw3O8pYDMgTmtS3/pF.7T7X0rvQFcYAw2bElM8MH1NA2OwFOSW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-20 10:16:30', '2024-05-20 10:16:30', '1234');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refferals`
--
ALTER TABLE `refferals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refferals`
--
ALTER TABLE `refferals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
