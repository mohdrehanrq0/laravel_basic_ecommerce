-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 06:04 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_step`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `qty`, `created_at`, `updated_at`) VALUES
(9, 10, 5, 1, '2021-09-02 09:30:26', '2021-09-02 09:30:26'),
(10, 16, 5, 5, '2021-09-02 10:28:33', '2021-09-02 10:28:33');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_08_28_053042_create_user_table', 1),
(3, '2021_08_31_080550_create_products_table', 2),
(4, '2021_09_01_091541_create_carts_table', 3),
(5, '2021_09_02_164912_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `payment_method`, `payment_status`, `status`, `address`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'Cash on Delivery (COD)', 'pending', 'pending', 'Delhi', '2021-09-03 09:12:28', '2021-09-03 09:12:28'),
(2, 9, 1, 'Cash on Delivery (COD)', 'pending', 'pending', 'Delhi', '2021-09-03 09:12:29', '2021-09-03 09:12:29'),
(3, 19, 1, 'Cash on Delivery (COD)', 'pending', 'pending', 'Delhi', '2021-09-03 09:12:29', '2021-09-03 09:12:29');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `description`, `mrp`, `price`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Chair', 50, 'This is a test product of chair', 1200, 1000, '1630416082.jpg', 1, '2021-08-31 13:21:22', '2021-08-31 07:51:22'),
(10, 'Chair2', 50, 'this is a chair2 description', 600, 500, '1630419010.jpg', 1, '2021-08-31 14:10:10', '2021-08-31 08:40:10'),
(11, 'Chair3', 100, 'this is a test descriptioon of chair3', 60, 50, '1630474302.jpg', 1, '2021-09-01 05:31:42', '2021-09-01 00:01:42'),
(12, 'Product4', 10, 'this  is a test description of Product4', 120, 100, '1630474752.jpg', 1, '2021-09-01 05:39:12', '2021-09-01 00:09:12'),
(14, 'Product5', 20, 'This is a test description of Product5', 160, 140, '1630474800.jpg', 1, '2021-09-01 05:40:00', '2021-09-01 00:10:00'),
(15, 'Product6', 0, 'This is a test description of Product6', 60, 50, '1630474841.jpg', 1, '2021-09-01 05:40:41', '2021-09-01 00:10:41'),
(16, 'Product7', 10, 'this is test descritipion of Product7', 15, 10, '1630475071.jpg', 1, '2021-09-01 05:44:31', '2021-09-01 00:14:31'),
(17, 'Product8', 20, 'this is a test description of Product8', 80, 60, '1630475113.jpg', 1, '2021-09-01 05:45:13', '2021-09-01 00:15:13'),
(18, 'Product9', 10, 'this is a test description of Product9', 120, 100, '1630475150.jpg', 1, '2021-09-01 05:45:50', '2021-09-01 00:15:50'),
(19, 'Product10', 10, 'This is a test descriptionn of Product10', 60, 40, '1630475205.jpg', 1, '2021-09-01 05:46:45', '2021-09-01 00:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rehan', 'rehan@gmail.com', '123456789', '$2y$10$YpNaEpWbl.su8kSFXqtgSO8rCkSPb9hKz47CTaeaMfpL7uohSJCmq', NULL, NULL),
(3, 'amaan', 'amaan@gmail.com', '1234567809', '$2y$10$jOeQXMUQrw/V6V20F7vx6eVA0NmLb.v70tZVasd0KXpl0wzKtFwt6', '2021-08-31 01:56:56', '2021-08-31 01:56:56'),
(4, 'sohail', 'sohil@gmail.com', '1234567809', '$2y$10$tJ/vY12TVxHybMINmGfSSesEb8QPzp2l8mRkl0.SJdK8MOZQXVEgC', '2021-08-31 02:25:05', '2021-08-31 02:25:05'),
(5, 'umer', 'umer@gmail.com', '1234567809', '$2y$10$X7L7qY8NJZr5vCesvdgXZuewxq/y2Y3PnvRn2bw/HzTtBDhXb0w.6', '2021-08-31 02:27:47', '2021-08-31 02:27:47'),
(6, 'zubaair', 'zubair@gmail.com', '1234567809', '$2y$10$90fH18eqVQC7alT8iLMD3.xDR6sfcSX9D5fC0d4Dvhd1HfrDog4u2', '2021-08-31 02:31:07', '2021-08-31 02:31:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
