-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 03:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `ordered` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `ordered`, `delivered`, `created_at`, `updated_at`) VALUES
(1, 3, 20230005, 1, 0, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(2, 3, 20230001, 1, 0, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(3, 4, 20230008, 1, 0, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(4, 4, 20230006, 1, 0, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(5, 4, 20230005, 1, 1, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(6, 3, 20230002, 1, 1, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(7, 2, 20230005, 1, 0, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(8, 2, 20230001, 1, 1, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(9, 2, 20230002, 1, 1, '2023-08-10 07:19:46', '2023-08-10 07:19:46'),
(10, 4, 20230004, 1, 0, '2023-08-10 07:19:46', '2023-08-10 07:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(2, 'T-Shirt', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(3, 'Hoodie', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(4, 'Jacket', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(5, 'Sweater', '2023-08-10 07:19:45', '2023-08-10 07:19:45');

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
(65, '2014_10_12_000000_create_users_table', 1),
(66, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(67, '2019_08_19_000000_create_failed_jobs_table', 1),
(68, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(69, '2023_08_05_073333_create_products_table', 1),
(70, '2023_08_05_073841_create_categories_table', 1),
(71, '2023_08_05_142806_create_cart_table', 1),
(72, '2023_08_05_150451_create_wishlist_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(20230001, 1, ' Casual Tshirt', 'Casual Tshirt for men', 1000, 'test-Shirt.jpg', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230002, 2, 'Luffy Tshirt', 'Luffy Latest Tshirt', 1200, 'test-Tshirt.jpg', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230003, 2, 'Animie Tshirt', 'Best animie tshirt in market', 1500, 'test-Tshirt2.jpg', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230004, 4, 'Lether Jacket', 'Lether Jacket for Men', 5000, 'test-Jacket.webp', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230005, 3, 'Animie Hoodie', 'Printed animie hoodie', 2500, 'test-Hoodie.webp', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230006, 4, 'Cargo Jacket', 'Printed animie hoodie', 2500, 'test-Jacket2.webp', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230007, 4, 'Red Jacket', 'Printed animie hoodie', 2500, 'test-Jacket3.webp', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230008, 3, 'PRO Classic Hoodie', 'Printed animie hoodie', 2500, 'test-Hoodie2.jpg', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230009, 1, 'Red Shirt', 'Printed animie hoodie', 2500, 'test-Shirt2.jpeg', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230010, 1, 'Woolen Sweater', 'Printed animie hoodie', 2500, 'test-sweater.webp', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(20230011, 1, 'Woolen Sweater', 'Printed animie hoodie', 2500, 'test-sweater2.jpg', '2023-08-10 07:19:45', '2023-08-10 07:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_number`, `is_admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '9801234567', 1, 'admin@admin.com', '$2y$10$6FEtMfTf2Vl0xffiVqy0SuQqNQUc22.i/OtlrNsDExEEDHFHLjmmO', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(2, 'Forest Ernser III', '9830934392', 0, 'littel.ardella@example.com', '$2y$10$oEcmIpEDsFRhaONpSoQWvu6LafpW0Yz/DjPpyoqAaT8zv93OnDQRO', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(3, 'Malachi Bernier', '9842606666', 0, 'grayce.collier@example.net', '$2y$10$KcV/I0NdUFvOOgIkBynxdudJE9Il6tod3X/S4Vf2C2S.OSbiNdSaS', '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(4, 'Blanca Dach', '9881444422', 0, 'agibson@example.com', '$2y$10$s6SdOpXdYF1VlEB3dzqXJ.xftQxIsQfXuw5FPhWPACJSRgDG8ZGoC', '2023-08-10 07:19:45', '2023-08-10 07:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 20230003, '2023-08-10 07:19:45', '2023-08-10 07:19:45'),
(2, 2, 20230001, '2023-08-10 07:19:45', '2023-08-10 07:19:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20230012;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
