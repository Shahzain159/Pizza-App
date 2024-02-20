-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 08:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pizza_id` bigint(20) UNSIGNED NOT NULL,
  `crust_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cold_drink1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cold_drink2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `pizza_id`, `crust_option_id`, `cold_drink1_id`, `cold_drink2_id`, `created_at`, `updated_at`) VALUES
(9, 1, 10, 6, NULL, NULL, '2024-02-19 23:37:44', '2024-02-20 00:50:36'),
(10, 1, 11, NULL, NULL, NULL, '2024-02-20 00:53:03', '2024-02-20 00:53:03'),
(11, 5, 9, 5, NULL, NULL, '2024-02-20 01:59:08', '2024-02-20 01:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item_addons`
--

CREATE TABLE `cart_item_addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cold_drink_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_item_addons`
--

INSERT INTO `cart_item_addons` (`id`, `user_id`, `cold_drink_id`, `created_at`, `updated_at`) VALUES
(27, 1, 5, '2024-02-19 23:36:22', '2024-02-19 23:36:22'),
(28, 1, 7, '2024-02-20 00:51:35', '2024-02-20 00:51:35'),
(31, 5, 5, '2024-02-20 01:59:17', '2024-02-20 01:59:17'),
(32, 5, 6, '2024-02-20 02:10:04', '2024-02-20 02:10:04'),
(33, 5, 7, '2024-02-20 02:10:05', '2024-02-20 02:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `cold_drinks`
--

CREATE TABLE `cold_drinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cold_drinks`
--

INSERT INTO `cold_drinks` (`id`, `name`, `size`, `price`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Cold Drink 1', '1 litre', '200.00', 'images.jfif', '2024-02-19 23:06:37', '2024-02-19 23:06:37'),
(6, 'Cold Drink 2', '1 litre', '250.00', 'images (1).jfif', '2024-02-19 23:06:57', '2024-02-19 23:06:57'),
(7, 'Cold Drink 3', 'Can', '120.00', 'png-clipart-two-red-and-blue-coca-cola-and-pepsi-cans-coca-cola-fizzy-drinks-fanta-diet-coke-cold-drink-cola-cola-wars-thumbnail.png', '2024-02-19 23:07:34', '2024-02-19 23:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `crust_options`
--

CREATE TABLE `crust_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crust_options`
--

INSERT INTO `crust_options` (`id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Crust 1', '150.00', '20-3-large.jpg', '2024-02-19 23:04:17', '2024-02-19 23:04:17'),
(5, 'Crust 2', '180.00', 'chewy-pizza-dough-recipe-with-big-bubbles-in-crust-e1672615461194.jpg', '2024-02-19 23:04:27', '2024-02-19 23:04:27'),
(6, 'Crust  3', '450.00', '46595-amazing-whole-wheat-pizza-crust-DDMFS-4x3-79e5d462f27646ffa48df5512986019b.jpg', '2024-02-19 23:04:42', '2024-02-19 23:04:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_18_080056_create_pizzas_table', 1),
(6, '2024_02_18_080124_create_crust_options_table', 1),
(7, '2024_02_18_080143_create_cold_drinks_table', 1),
(11, '2024_02_18_080207_create_orders_table', 2),
(12, '2024_02_18_080223_create_order_details_table', 2),
(14, '2024_02_18_183219_create_cart_items_table', 3),
(15, '2024_02_19_075551_add_is_admin_to_users_table', 4),
(17, '2024_02_19_110958_create_cart_item_addons_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `delivery_address`, `phone_number`, `status`) VALUES
(10, 1, '2300.00', 'aa', 'asdas', 'pending'),
(11, 5, '2300.00', 'aa', 'asdas', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `pizza_id` bigint(20) UNSIGNED NOT NULL,
  `crust_option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pizza_id`, `crust_option_id`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 10, 9, 4, 1, '2024-02-20 00:50:11', '2024-02-20 00:50:11'),
(18, 10, 10, 6, 1, '2024-02-20 00:50:11', '2024-02-20 00:50:11'),
(19, 11, 10, 6, 1, '2024-02-20 02:01:20', '2024-02-20 02:01:20'),
(20, 11, 11, NULL, 1, '2024-02-20 02:01:20', '2024-02-20 02:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_cold_drink`
--

CREATE TABLE `order_detail_cold_drink` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_detail_id` bigint(20) UNSIGNED NOT NULL,
  `cold_drink_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail_cold_drink`
--

INSERT INTO `order_detail_cold_drink` (`id`, `order_detail_id`, `cold_drink_id`, `quantity`) VALUES
(2, 18, 5, 1),
(3, 20, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(9, 'pizza 1', 'Proident suscipit a Proident suscipit a Proident suscipit a Proident suscipit a', '900.00', 'chicken-pizza-1.jpeg', '2024-02-19 23:02:30', '2024-02-19 23:02:30'),
(10, 'pizza 2', 'Proident suscipit a Proident suscipit a Proident suscipit a', '1200.00', '48727-Mikes-homemade-pizza-DDMFS-beauty-4x3-BG-2974-a7a9842c14e34ca699f3b7d7143256cf.jpg', '2024-02-19 23:02:48', '2024-02-19 23:02:48'),
(11, 'pizza 3', 'Proident suscipit a Proident suscipit a Proident suscipit a', '1150.00', 'classic-cheese-pizza-FT-RECIPE0422-31a2c938fc2546c9a07b7011658cfd05.jpg', '2024-02-19 23:03:07', '2024-02-19 23:03:07');

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
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone_number`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'zain', 'zain@gmail.com', '2024-01-15 19:16:16', 'zain123', 'dummy data', '23223233232', NULL, '2024-02-18 19:16:16', '2024-02-17 19:16:16', 0),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$rdp5kvWU6.9CEWquWTLZg.iZ25oDGKSYAhCpHNwbRlAPVqfa5lq7K', 'Sample Address', '0342352623', NULL, '2024-02-19 03:22:39', '2024-02-19 03:22:39', 1),
(5, 'Fahad', 'fahad@gmail.com', NULL, '$2y$10$OQ26.05OyRr8HiacwHlJ0OsaHp5aHnBRuJK/JpCOux2BiFlzeADQa', NULL, NULL, NULL, '2024-02-20 01:44:39', '2024-02-20 01:44:39', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_pizza_id_foreign` (`pizza_id`),
  ADD KEY `cart_items_crust_option_id_foreign` (`crust_option_id`),
  ADD KEY `cart_items_cold_drink1_id_foreign` (`cold_drink1_id`),
  ADD KEY `cart_items_cold_drink2_id_foreign` (`cold_drink2_id`);

--
-- Indexes for table `cart_item_addons`
--
ALTER TABLE `cart_item_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_addons_user_id_foreign` (`user_id`),
  ADD KEY `cart_item_addons_cold_drink_id_foreign` (`cold_drink_id`);

--
-- Indexes for table `cold_drinks`
--
ALTER TABLE `cold_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crust_options`
--
ALTER TABLE `crust_options`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_pizza_id_foreign` (`pizza_id`),
  ADD KEY `order_details_crust_option_id_foreign` (`crust_option_id`);

--
-- Indexes for table `order_detail_cold_drink`
--
ALTER TABLE `order_detail_cold_drink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_cold_drink_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `order_detail_cold_drink_cold_drink_id_foreign` (`cold_drink_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
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
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart_item_addons`
--
ALTER TABLE `cart_item_addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cold_drinks`
--
ALTER TABLE `cold_drinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crust_options`
--
ALTER TABLE `crust_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail_cold_drink`
--
ALTER TABLE `order_detail_cold_drink`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cold_drink1_id_foreign` FOREIGN KEY (`cold_drink1_id`) REFERENCES `cold_drinks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_cold_drink2_id_foreign` FOREIGN KEY (`cold_drink2_id`) REFERENCES `cold_drinks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_crust_option_id_foreign` FOREIGN KEY (`crust_option_id`) REFERENCES `crust_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_pizza_id_foreign` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_item_addons`
--
ALTER TABLE `cart_item_addons`
  ADD CONSTRAINT `cart_item_addons_cold_drink_id_foreign` FOREIGN KEY (`cold_drink_id`) REFERENCES `cold_drinks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_item_addons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_crust_option_id_foreign` FOREIGN KEY (`crust_option_id`) REFERENCES `crust_options` (`id`),
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_pizza_id_foreign` FOREIGN KEY (`pizza_id`) REFERENCES `pizzas` (`id`);

--
-- Constraints for table `order_detail_cold_drink`
--
ALTER TABLE `order_detail_cold_drink`
  ADD CONSTRAINT `order_detail_cold_drink_cold_drink_id_foreign` FOREIGN KEY (`cold_drink_id`) REFERENCES `cold_drinks` (`id`),
  ADD CONSTRAINT `order_detail_cold_drink_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
