-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 02:32 AM
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
-- Database: `shopnepal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(5, 'Sports', 'sports', '1628571905.jpg', '2021-07-27 14:51:12', '2021-08-09 13:21:13', NULL),
(9, 'sdfdf', 'sdfdf', '1629026328.jpg', '2021-08-14 19:33:48', '2021-08-14 19:33:48', NULL),
(10, 'zxcv', 'zxcv', '1631498467.jpg', '2021-09-12 10:16:07', '2021-09-12 10:16:07', 12),
(11, 'dfsgdfg', 'dfsgdfg', '1631498500.jpg', '2021-09-12 10:16:40', '2021-09-12 10:16:40', NULL),
(12, 'kiran', 'kiran', '1632540944.jpg', '2021-09-24 11:50:44', '2021-09-24 11:50:44', NULL),
(15, 'ale', 'ale', '1637846373.png', '2021-11-24 20:34:33', '2021-11-24 20:34:33', NULL),
(16, 'watches', 'watches', '1637848718.png', '2021-11-24 21:13:38', '2021-11-24 21:13:38', 5),
(17, 'sweater', 'sweater', '1637848862.png', '2021-11-24 21:16:02', '2021-11-24 21:16:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2, 35, NULL, NULL),
(4, 6, 35, NULL, NULL),
(5, 11, 35, NULL, NULL),
(8, 2, 37, NULL, NULL),
(10, 10, 31, NULL, NULL),
(11, 4, 38, NULL, NULL),
(13, 2, 39, NULL, NULL),
(15, 2, 40, NULL, NULL),
(16, 4, 40, NULL, NULL),
(17, 2, 41, NULL, NULL),
(18, 4, 41, NULL, NULL),
(19, 2, 38, NULL, NULL),
(28, 5, 2, NULL, NULL),
(29, 9, 2, NULL, NULL),
(30, 10, 2, NULL, NULL),
(31, 11, 2, NULL, NULL),
(32, 12, 2, NULL, NULL),
(33, 15, 2, NULL, NULL),
(34, 16, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `type` enum('fixed','percent') NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, 'OFF20', 'fixed', '30.00', '1000.00', '2021-08-15 21:31:57', '2021-09-12 18:51:44', '2021-08-16'),
(2, 'OFF10', 'percent', '20.00', '1000.00', '2021-08-15 21:40:14', '2021-09-12 18:45:46', '2021-08-03'),
(4, 'OFF30', 'percent', '30.00', '1300.00', '2021-08-16 15:07:57', '2021-11-26 11:01:25', '2021-01-12');

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
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'This is the slider', 'shop more, get more discounts', '34.20', 'http://127.0.0.1:8000/shop', '1630903399.jpg', 1, '2021-08-07 17:53:32', '2021-09-12 16:59:33'),
(3, 'This Is Second Slider', 'buy one get one free', '45.00', 'http://127.0.0.1:8000/shop', '1628512704.jpg', 0, '2021-08-07 17:56:18', '2021-09-12 15:11:51'),
(4, 'zdfxgsasdfdsaf', 'asdf', '122', 'asdf', '1631515755.jpg', 1, '2021-09-12 15:04:15', '2021-09-12 15:04:15');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_26_015703_create_sessions_table', 1),
(7, '2021_07_28_060953_create_categories_table', 2),
(8, '2021_07_28_061020_create_products_table', 2),
(9, '2021_08_08_030339_create_home_sliders_table', 3),
(10, '2021_08_13_060803_create_sales_table', 4),
(11, '2021_08_16_104441_create_coupons_table', 5),
(12, '2021_08_17_063909_add_expiry_date_to_coupons_table', 6),
(13, '2021_08_17_081729_create_orders_table', 7),
(14, '2021_08_17_081745_create_order_items_table', 7),
(15, '2021_08_17_081759_create_shippings_table', 7),
(16, '2021_08_17_081816_create_transactions_table', 7),
(17, '2021_08_18_061234_add_delivered_cancelled_date_to_orders_table', 8),
(18, '2021_08_18_115353_create_reviews_table', 9),
(19, '2021_08_18_115807_add_review_status_to_order_items_table', 9),
(20, '2021_08_20_035228_create_shoppingcart_table', 10),
(21, '2021_09_15_075048_create_subcategories_table', 11),
(22, '2021_09_15_075937_change_foreign_key_in_products_table', 12),
(23, '2021_09_24_041635_update_column_in_category_table', 13),
(24, '2021_09_24_042519_create_category_products_table', 14),
(25, '2021_09_24_062227_create_category_product_table', 15),
(26, '2021_09_30_132328_update_order_table', 16),
(27, '2021_11_27_080404_add_payment_to_order_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` enum('ordered','delivered','canceled') NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `cancelled_date` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `fullname`, `mobile`, `email`, `address1`, `address2`, `city`, `province`, `zipcode`, `country`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `cancelled_date`, `payment_method`, `payment_status`) VALUES
(1, 3, '156.00', '0.00', '20.28', '176.28', 'sdf', '9808192821', 'sdf@gmail.com', 'sdfsdf', NULL, 'sfasfas', 'sdfasf', 'sfas', 'sfdsaf', 'ordered', 1, '2021-08-16 21:16:06', '2021-08-16 21:16:06', NULL, NULL, NULL, 0),
(2, 3, '156.00', '0.00', '20.28', '176.28', 'sfagadfgagda', '9808192821', 'asdfsadf@gmail.com', 'asdfa', NULL, 'sdafasf', 'sadfaf', 'asdfsa', 'sadfasdf', 'ordered', 0, '2021-08-16 21:25:12', '2021-08-16 21:25:12', NULL, NULL, NULL, 0),
(3, 3, '156.00', '0.00', '20.28', '176.28', 'fghffghgj', '9808192821', 'admin@admin.com', 'd', 'd', 'dd', 'd', 'dd', 'sefgdf', 'delivered', 0, '2021-08-16 21:27:32', '2021-08-17 15:02:46', '2021-08-18', NULL, NULL, 0),
(4, 3, '156.00', '0.00', '20.28', '176.28', 'sdf', '9808192821', 'admin@admin.com', 's', 's', 'ss', 's', 's', 's', 'delivered', 0, '2021-08-16 21:28:47', '2021-08-17 15:34:15', '2021-08-18', '2021-08-18', NULL, 0),
(5, 3, '1421.00', '609.00', '184.73', '1605.73', 'kiran ', '9808192821', 'alekiran41@gmail.com', 'Kahule ', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'delivered', 0, '2021-08-16 21:36:45', '2021-08-17 15:34:12', '2021-08-18', '2021-08-18', NULL, 0),
(6, 3, '1108.80', '475.20', '144.14', '1252.94', 'Kiran ', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'delivered', 1, '2021-08-16 21:42:39', '2021-08-17 15:34:09', '2021-08-18', '2021-08-18', NULL, 0),
(7, 2, '1117.20', '478.80', '145.24', '1262.44', 'fsd', '9808192821', 'sdf@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'delivered', 0, '2021-08-17 13:21:55', '2021-08-17 15:34:29', '2021-08-18', '2021-08-18', NULL, 0),
(8, 3, '427.00', '0.00', '55.51', '482.51', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'canceled', 0, '2021-08-17 23:30:17', '2021-08-17 23:43:04', NULL, '2021-08-18', NULL, 0),
(9, 3, '1987.00', '0.00', '258.31', '2245.31', 'Kishan', '9849552851', 'kishanale786@gmail.com', 'dhungedhara', 'raniban', 'kathmandu', 'Bagmati', '44600', 'Nepal', 'canceled', 0, '2021-08-17 23:36:29', '2021-08-17 23:39:46', NULL, '2021-08-18', NULL, 0),
(10, 3, '458.00', '0.00', '59.54', '517.54', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:42:49', '2021-08-18 14:42:49', NULL, NULL, NULL, 0),
(11, 3, '458.00', '0.00', '59.54', '517.54', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:42:59', '2021-08-18 14:42:59', NULL, NULL, NULL, 0),
(12, 3, '458.00', '0.00', '59.54', '517.54', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:43:21', '2021-08-18 14:43:21', NULL, NULL, NULL, 0),
(13, 3, '458.00', '0.00', '59.54', '517.54', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:48:41', '2021-08-18 14:48:41', NULL, NULL, NULL, 0),
(14, 3, '458.00', '0.00', '59.54', '517.54', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:51:03', '2021-08-18 14:51:03', NULL, NULL, NULL, 0),
(15, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 14:59:36', '2021-08-18 14:59:36', NULL, NULL, NULL, 0),
(16, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:03:52', '2021-08-18 15:03:52', NULL, NULL, NULL, 0),
(17, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:05:01', '2021-08-18 15:05:01', NULL, NULL, NULL, 0),
(18, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:06:32', '2021-08-18 15:06:32', NULL, NULL, NULL, 0),
(19, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:08:47', '2021-08-18 15:08:47', NULL, NULL, NULL, 0),
(20, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:13:23', '2021-08-18 15:13:23', NULL, NULL, NULL, 0),
(21, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:16:25', '2021-08-18 15:16:25', NULL, NULL, NULL, 0),
(22, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:20:44', '2021-08-18 15:20:44', NULL, NULL, NULL, 0),
(23, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:37:12', '2021-08-18 15:37:12', NULL, NULL, NULL, 0),
(24, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:41:27', '2021-08-18 15:41:27', NULL, NULL, NULL, 0),
(25, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:42:17', '2021-08-18 15:42:17', NULL, NULL, NULL, 0),
(26, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:43:22', '2021-08-18 15:43:22', NULL, NULL, NULL, 0),
(27, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:45:00', '2021-08-18 15:45:00', NULL, NULL, NULL, 0),
(28, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:47:25', '2021-08-18 15:47:25', NULL, NULL, NULL, 0),
(29, 3, '867.00', '0.00', '112.71', '979.71', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-18 15:48:36', '2021-08-18 15:48:36', NULL, NULL, NULL, 0),
(30, 3, '3020.00', '0.00', '392.60', '3412.60', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-19 11:45:37', '2021-08-19 11:45:37', NULL, NULL, NULL, 0),
(31, 3, '460.00', '0.00', '59.80', '519.80', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-19 11:47:01', '2021-08-19 11:47:01', NULL, NULL, NULL, 0),
(32, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-19 11:49:29', '2021-08-19 11:49:29', NULL, NULL, NULL, 0),
(33, 3, '3079.00', '0.00', '400.27', '3479.27', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-08-24 19:15:36', '2021-08-24 19:15:36', NULL, NULL, NULL, 0),
(34, 4, '435.00', '0.00', '56.55', '491.55', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-09-09 19:46:50', '2021-09-09 19:46:50', NULL, NULL, NULL, 0),
(35, 3, '430.00', '0.00', '55.90', '485.90', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-09-12 20:58:41', '2021-09-12 20:58:41', NULL, NULL, NULL, 0),
(36, 3, '430.00', '0.00', '55.90', '485.90', 'Kiran', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'Gandaki', '44600', 'Nepal', 'ordered', 0, '2021-09-12 22:15:15', '2021-09-12 22:15:15', NULL, NULL, NULL, 0),
(37, 3, '2004.00', '0.00', '260.52', '2264.52', 'Kiran', '9808192821', 'kiranale855@gmail.com', 'Raniban', NULL, 'Kathmandu', 'Bagmati', '44600', 'Nepal', 'ordered', 0, '2021-09-14 19:57:11', '2021-09-14 19:57:11', NULL, NULL, NULL, 0),
(38, 3, '2374.00', '0.00', '308.62', '2682.62', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-09-29 21:45:05', '2021-09-29 21:45:05', NULL, NULL, NULL, 0),
(39, 3, '4664.00', '0.00', '606.32', '5270.32', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-10-31 10:07:32', '2021-10-31 10:07:32', NULL, NULL, NULL, 0),
(40, 3, '211.00', '0.00', '27.43', '238.43', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-10-31 10:10:01', '2021-10-31 10:10:01', NULL, NULL, NULL, 0),
(41, 3, '820.00', '0.00', '106.60', '926.60', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-10-31 10:15:52', '2021-10-31 10:15:52', NULL, NULL, NULL, 0),
(42, 3, '2054.00', '0.00', '267.02', '2321.02', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'delivered', 0, '2021-11-08 10:19:33', '2021-11-20 12:04:23', '2021-11-21', NULL, NULL, 0),
(43, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:36:20', '2021-11-22 09:36:20', NULL, NULL, NULL, 0),
(44, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:36:38', '2021-11-22 09:36:38', NULL, NULL, NULL, 0),
(45, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:37:07', '2021-11-22 09:37:07', NULL, NULL, NULL, 0),
(46, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:37:14', '2021-11-22 09:37:14', NULL, NULL, NULL, 0),
(47, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:37:20', '2021-11-22 09:37:20', NULL, NULL, NULL, 0),
(48, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:37:26', '2021-11-22 09:37:26', NULL, NULL, NULL, 0),
(49, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:40:08', '2021-11-22 09:40:08', NULL, NULL, NULL, 0),
(50, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-22 09:40:18', '2021-11-22 09:40:18', NULL, NULL, NULL, 0),
(51, 3, '123.00', '0.00', '15.99', '138.99', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 11:58:47', '2021-11-26 11:58:47', NULL, NULL, NULL, 0),
(52, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:39:26', '2021-11-26 15:39:26', NULL, NULL, 'esewa', 0),
(53, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:42:46', '2021-11-26 15:42:46', NULL, NULL, 'esewa', 0),
(54, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:42:53', '2021-11-26 15:42:53', NULL, NULL, 'esewa', 0),
(55, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:43:03', '2021-11-26 15:43:03', NULL, NULL, 'esewa', 0),
(56, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:43:57', '2021-11-26 15:43:57', NULL, NULL, 'esewa', 0),
(57, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:44:27', '2021-11-26 15:44:27', NULL, NULL, 'esewa', 0),
(58, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:45:47', '2021-11-26 15:45:47', NULL, NULL, 'esewa', 0),
(59, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:47:55', '2021-11-26 15:47:55', NULL, NULL, 'esewa', 0),
(60, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:51:19', '2021-11-26 15:51:19', NULL, NULL, 'esewa', 0),
(61, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-26 15:57:05', '2021-11-26 15:57:05', NULL, NULL, 'esewa', 0),
(62, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-27 11:21:41', '2021-11-27 11:21:41', NULL, NULL, 'esewa', 0),
(63, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '9808192821', 'alekiran41@gmail.com', 'Kahule', 'Bhangar', 'Gorkha', 'gandaki', '44600', 'Nepal', 'ordered', 0, '2021-11-27 11:23:10', '2021-11-27 11:23:10', NULL, NULL, 'esewa', 0),
(64, 3, '1952.00', '0.00', '253.76', '2205.76', 'Manish magar', '0426042216', 'mannis09mgr@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'province2', '1211565', 'Australia', 'ordered', 0, '2022-08-08 17:01:29', '2022-08-08 17:01:29', NULL, NULL, 'cash_on_delivery', 0),
(65, 6, '146.00', '0.00', '18.98', '164.98', 'Manish magar', '0426042216', 'mannis09mgr@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'lumbini', '65346', 'Nepal', 'ordered', 0, '2022-08-08 17:03:35', '2022-08-08 17:03:35', NULL, NULL, 'cash_on_delivery', 0),
(66, 6, '146.00', '0.00', '18.98', '164.98', 'Manish magar', '0426042216', 'mannis09mgr@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', 'as', 'Sydney', 'bagmati', '45555', 'Nepal', 'ordered', 0, '2022-08-08 17:09:29', '2022-08-08 17:09:29', NULL, NULL, 'cash_on_delivery', 0),
(67, 6, '247.00', '0.00', '32.11', '279.11', 'Manish magar', '0426042216', 'mannis09mgr@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'province2', '4565', 'Nepal', 'ordered', 0, '2022-08-08 17:22:31', '2022-08-08 17:22:31', NULL, NULL, 'cash_on_delivery', 0),
(68, 3, '1975.00', '0.00', '256.75', '2231.75', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'province2', '2144', 'Australia', 'ordered', 0, '2022-08-10 11:59:40', '2022-08-10 11:59:40', NULL, NULL, 'cash_on_delivery', 0),
(69, 3, '231.00', '0.00', '30.03', '261.03', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'bagmati', '2144', 'Nepal', 'ordered', 0, '2022-08-10 12:07:30', '2022-08-10 12:07:30', NULL, NULL, 'cash_on_delivery', 0),
(70, 3, '13.00', '0.00', '1.69', '14.69', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'gandaki', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:10:42', '2022-08-10 12:10:42', NULL, NULL, 'cash_on_delivery', 0),
(71, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'province1', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:12:13', '2022-08-10 12:12:13', NULL, NULL, 'cash_on_delivery', 0),
(72, 3, '12.00', '0.00', '1.56', '13.56', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'province1', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:15:11', '2022-08-10 12:15:11', NULL, NULL, 'cash_on_delivery', 0),
(73, 3, '12.00', '0.00', '1.56', '13.56', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'province2', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:16:29', '2022-08-10 12:16:29', NULL, NULL, 'cash_on_delivery', 0),
(74, 3, '145.00', '0.00', '18.85', '163.85', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'gandaki', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:20:33', '2022-08-10 12:20:33', NULL, NULL, 'cash_on_delivery', 0),
(75, 3, '156.00', '0.00', '20.28', '176.28', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'gandaki', '2144', 'Nepal', 'ordered', 0, '2022-08-10 12:43:57', '2022-08-10 12:43:57', NULL, NULL, 'cash_on_delivery', 0),
(76, 3, '279.00', '0.00', '36.27', '315.27', 'Kiran Ale', '0426042216', 'alekiran41@gmail.com', '23 St Hilliers Road, Auburn', NULL, 'AUBURN', 'karnali', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:47:16', '2022-08-10 12:47:16', NULL, NULL, 'cash_on_delivery', 0),
(77, 3, '295.00', '0.00', '38.35', '333.35', 'Kiran Ale', '0426042216', 'kiranale855@gmail.com', '23 St. Hillier\'s Road, Auburn NSW', NULL, 'Sydney', 'province2', '2144', 'Australia', 'ordered', 0, '2022-08-10 12:48:51', '2022-08-10 12:48:51', NULL, NULL, 'cash_on_delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `review_status`) VALUES
(1, 5, 4, '156.00', 1, '2021-08-16 21:28:47', '2021-08-16 21:28:47', 0),
(2, 11, 5, '145.00', 14, '2021-08-16 21:36:45', '2021-08-16 21:36:45', 0),
(3, 6, 6, '88.00', 18, '2021-08-16 21:42:39', '2021-08-16 21:42:39', 0),
(4, 6, 7, '88.00', 1, '2021-08-17 13:21:55', '2021-08-17 13:21:55', 0),
(5, 11, 7, '145.00', 1, '2021-08-17 13:21:55', '2021-08-17 13:21:55', 0),
(6, 5, 7, '156.00', 7, '2021-08-17 13:21:55', '2021-08-17 13:21:55', 0),
(7, 10, 7, '271.00', 1, '2021-08-17 13:21:56', '2021-08-17 13:21:56', 0),
(8, 5, 8, '156.00', 1, '2021-08-17 23:30:17', '2021-08-17 23:30:17', 0),
(9, 10, 8, '271.00', 1, '2021-08-17 23:30:18', '2021-08-17 23:30:18', 0),
(10, 15, 9, '163.00', 2, '2021-08-17 23:36:29', '2021-08-17 23:36:29', 0),
(11, 4, 9, '460.00', 2, '2021-08-17 23:36:29', '2021-08-17 23:36:29', 0),
(12, 14, 9, '247.00', 3, '2021-08-17 23:36:29', '2021-08-17 23:36:29', 0),
(13, 14, 10, '247.00', 1, '2021-08-18 14:42:49', '2021-08-18 14:42:49', 0),
(14, 2, 10, '211.00', 1, '2021-08-18 14:42:49', '2021-08-18 14:42:49', 0),
(15, 14, 11, '247.00', 1, '2021-08-18 14:42:59', '2021-08-18 14:42:59', 0),
(16, 2, 11, '211.00', 1, '2021-08-18 14:42:59', '2021-08-18 14:42:59', 0),
(17, 14, 12, '247.00', 1, '2021-08-18 14:43:21', '2021-08-18 14:43:21', 0),
(18, 2, 12, '211.00', 1, '2021-08-18 14:43:21', '2021-08-18 14:43:21', 0),
(19, 14, 13, '247.00', 1, '2021-08-18 14:48:41', '2021-08-18 14:48:41', 0),
(20, 2, 13, '211.00', 1, '2021-08-18 14:48:41', '2021-08-18 14:48:41', 0),
(21, 14, 14, '247.00', 1, '2021-08-18 14:51:03', '2021-08-18 14:51:03', 0),
(22, 2, 14, '211.00', 1, '2021-08-18 14:51:03', '2021-08-18 14:51:03', 0),
(23, 11, 15, '145.00', 1, '2021-08-18 14:59:36', '2021-08-18 14:59:36', 0),
(24, 10, 15, '271.00', 1, '2021-08-18 14:59:36', '2021-08-18 14:59:36', 0),
(25, 12, 15, '295.00', 1, '2021-08-18 14:59:36', '2021-08-18 14:59:36', 0),
(26, 5, 15, '156.00', 1, '2021-08-18 14:59:36', '2021-08-18 14:59:36', 0),
(27, 11, 16, '145.00', 1, '2021-08-18 15:03:52', '2021-08-18 15:03:52', 0),
(28, 10, 16, '271.00', 1, '2021-08-18 15:03:52', '2021-08-18 15:03:52', 0),
(29, 12, 16, '295.00', 1, '2021-08-18 15:03:52', '2021-08-18 15:03:52', 0),
(30, 5, 16, '156.00', 1, '2021-08-18 15:03:52', '2021-08-18 15:03:52', 0),
(31, 11, 17, '145.00', 1, '2021-08-18 15:05:01', '2021-08-18 15:05:01', 0),
(32, 10, 17, '271.00', 1, '2021-08-18 15:05:01', '2021-08-18 15:05:01', 0),
(33, 12, 17, '295.00', 1, '2021-08-18 15:05:01', '2021-08-18 15:05:01', 0),
(34, 5, 17, '156.00', 1, '2021-08-18 15:05:01', '2021-08-18 15:05:01', 0),
(35, 11, 18, '145.00', 1, '2021-08-18 15:06:32', '2021-08-18 15:06:32', 0),
(36, 10, 18, '271.00', 1, '2021-08-18 15:06:32', '2021-08-18 15:06:32', 0),
(37, 12, 18, '295.00', 1, '2021-08-18 15:06:32', '2021-08-18 15:06:32', 0),
(38, 5, 18, '156.00', 1, '2021-08-18 15:06:33', '2021-08-18 15:06:33', 0),
(39, 11, 19, '145.00', 1, '2021-08-18 15:08:47', '2021-08-18 15:08:47', 0),
(40, 10, 19, '271.00', 1, '2021-08-18 15:08:47', '2021-08-18 15:08:47', 0),
(41, 12, 19, '295.00', 1, '2021-08-18 15:08:47', '2021-08-18 15:08:47', 0),
(42, 5, 19, '156.00', 1, '2021-08-18 15:08:48', '2021-08-18 15:08:48', 0),
(43, 11, 20, '145.00', 1, '2021-08-18 15:13:23', '2021-08-18 15:13:23', 0),
(44, 10, 20, '271.00', 1, '2021-08-18 15:13:23', '2021-08-18 15:13:23', 0),
(45, 12, 20, '295.00', 1, '2021-08-18 15:13:23', '2021-08-18 15:13:23', 0),
(46, 5, 20, '156.00', 1, '2021-08-18 15:13:23', '2021-08-18 15:13:23', 0),
(47, 11, 21, '145.00', 1, '2021-08-18 15:16:25', '2021-08-18 15:16:25', 0),
(48, 10, 21, '271.00', 1, '2021-08-18 15:16:25', '2021-08-18 15:16:25', 0),
(49, 12, 21, '295.00', 1, '2021-08-18 15:16:25', '2021-08-18 15:16:25', 0),
(50, 5, 21, '156.00', 1, '2021-08-18 15:16:25', '2021-08-18 15:16:25', 0),
(51, 11, 22, '145.00', 1, '2021-08-18 15:20:44', '2021-08-18 15:20:44', 0),
(52, 10, 22, '271.00', 1, '2021-08-18 15:20:44', '2021-08-18 15:20:44', 0),
(53, 12, 22, '295.00', 1, '2021-08-18 15:20:44', '2021-08-18 15:20:44', 0),
(54, 5, 22, '156.00', 1, '2021-08-18 15:20:44', '2021-08-18 15:20:44', 0),
(55, 11, 23, '145.00', 1, '2021-08-18 15:37:12', '2021-08-18 15:37:12', 0),
(56, 10, 23, '271.00', 1, '2021-08-18 15:37:12', '2021-08-18 15:37:12', 0),
(57, 12, 23, '295.00', 1, '2021-08-18 15:37:12', '2021-08-18 15:37:12', 0),
(58, 5, 23, '156.00', 1, '2021-08-18 15:37:12', '2021-08-18 15:37:12', 0),
(59, 11, 24, '145.00', 1, '2021-08-18 15:41:27', '2021-08-18 15:41:27', 0),
(60, 10, 24, '271.00', 1, '2021-08-18 15:41:27', '2021-08-18 15:41:27', 0),
(61, 12, 24, '295.00', 1, '2021-08-18 15:41:27', '2021-08-18 15:41:27', 0),
(62, 5, 24, '156.00', 1, '2021-08-18 15:41:27', '2021-08-18 15:41:27', 0),
(63, 11, 25, '145.00', 1, '2021-08-18 15:42:17', '2021-08-18 15:42:17', 0),
(64, 10, 25, '271.00', 1, '2021-08-18 15:42:17', '2021-08-18 15:42:17', 0),
(65, 12, 25, '295.00', 1, '2021-08-18 15:42:17', '2021-08-18 15:42:17', 0),
(66, 5, 25, '156.00', 1, '2021-08-18 15:42:17', '2021-08-18 15:42:17', 0),
(67, 11, 26, '145.00', 1, '2021-08-18 15:43:22', '2021-08-18 15:43:22', 0),
(68, 10, 26, '271.00', 1, '2021-08-18 15:43:22', '2021-08-18 15:43:22', 0),
(69, 12, 26, '295.00', 1, '2021-08-18 15:43:22', '2021-08-18 15:43:22', 0),
(70, 5, 26, '156.00', 1, '2021-08-18 15:43:22', '2021-08-18 15:43:22', 0),
(71, 11, 27, '145.00', 1, '2021-08-18 15:45:01', '2021-08-18 15:45:01', 0),
(72, 10, 27, '271.00', 1, '2021-08-18 15:45:01', '2021-08-18 15:45:01', 0),
(73, 12, 27, '295.00', 1, '2021-08-18 15:45:01', '2021-08-18 15:45:01', 0),
(74, 5, 27, '156.00', 1, '2021-08-18 15:45:01', '2021-08-18 15:45:01', 0),
(75, 11, 28, '145.00', 1, '2021-08-18 15:47:25', '2021-08-18 15:47:25', 0),
(76, 10, 28, '271.00', 1, '2021-08-18 15:47:25', '2021-08-18 15:47:25', 0),
(77, 12, 28, '295.00', 1, '2021-08-18 15:47:25', '2021-08-18 15:47:25', 0),
(78, 5, 28, '156.00', 1, '2021-08-18 15:47:25', '2021-08-18 15:47:25', 0),
(79, 11, 29, '145.00', 1, '2021-08-18 15:48:37', '2021-08-18 15:48:37', 0),
(80, 10, 29, '271.00', 1, '2021-08-18 15:48:37', '2021-08-18 15:48:37', 0),
(81, 12, 29, '295.00', 1, '2021-08-18 15:48:37', '2021-08-18 15:48:37', 0),
(82, 5, 29, '156.00', 1, '2021-08-18 15:48:37', '2021-08-18 15:48:37', 0),
(83, 4, 30, '460.00', 4, '2021-08-19 11:45:37', '2021-08-19 11:45:37', 0),
(84, 12, 30, '295.00', 1, '2021-08-19 11:45:37', '2021-08-19 11:45:37', 0),
(85, 10, 30, '271.00', 1, '2021-08-19 11:45:37', '2021-08-19 11:45:37', 0),
(86, 9, 30, '302.00', 1, '2021-08-19 11:45:37', '2021-08-19 11:45:37', 0),
(87, 5, 30, '156.00', 2, '2021-08-19 11:45:37', '2021-08-19 11:45:37', 0),
(88, 4, 31, '460.00', 1, '2021-08-19 11:47:01', '2021-08-19 11:47:01', 0),
(89, 5, 32, '156.00', 1, '2021-08-19 11:49:29', '2021-08-19 11:49:29', 0),
(90, 5, 33, '156.00', 18, '2021-08-24 19:15:36', '2021-08-24 19:15:36', 0),
(91, 10, 33, '271.00', 1, '2021-08-24 19:15:36', '2021-08-24 19:15:36', 0),
(92, 11, 34, '145.00', 3, '2021-09-09 19:46:50', '2021-09-09 19:46:50', 0),
(93, 12, 35, '295.00', 1, '2021-09-12 20:58:41', '2021-09-12 20:58:41', 0),
(94, 26, 35, '123.00', 1, '2021-09-12 20:58:41', '2021-09-12 20:58:41', 0),
(95, 30, 35, '12.00', 1, '2021-09-12 20:58:41', '2021-09-12 20:58:41', 0),
(96, 12, 36, '295.00', 1, '2021-09-12 22:15:15', '2021-09-12 22:15:15', 0),
(97, 26, 36, '123.00', 1, '2021-09-12 22:15:15', '2021-09-12 22:15:15', 0),
(98, 30, 36, '12.00', 1, '2021-09-12 22:15:15', '2021-09-12 22:15:15', 0),
(99, 5, 37, '156.00', 1, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(100, 6, 37, '88.00', 1, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(101, 12, 37, '295.00', 2, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(102, 26, 37, '12.00', 2, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(103, 30, 37, '12.00', 1, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(104, 11, 37, '145.00', 1, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(105, 15, 37, '163.00', 1, '2021-09-14 19:57:11', '2021-09-14 19:57:11', 0),
(106, 2, 37, '211.00', 1, '2021-09-14 19:57:12', '2021-09-14 19:57:12', 0),
(107, 10, 37, '271.00', 1, '2021-09-14 19:57:12', '2021-09-14 19:57:12', 0),
(108, 9, 37, '302.00', 1, '2021-09-14 19:57:12', '2021-09-14 19:57:12', 0),
(109, 27, 37, '21.00', 2, '2021-09-14 19:57:12', '2021-09-14 19:57:12', 0),
(110, 6, 38, '88.00', 2, '2021-09-29 21:45:05', '2021-09-29 21:45:05', 0),
(111, 13, 38, '432.00', 1, '2021-09-29 21:45:05', '2021-09-29 21:45:05', 0),
(112, 4, 38, '460.00', 1, '2021-09-29 21:45:05', '2021-09-29 21:45:05', 0),
(113, 28, 38, '12.00', 6, '2021-09-29 21:45:05', '2021-09-29 21:45:05', 0),
(114, 29, 38, '1234.00', 1, '2021-09-29 21:45:05', '2021-09-29 21:45:05', 0),
(115, 39, 39, '1234.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(116, 38, 39, '23.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(117, 6, 39, '88.00', 2, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(118, 13, 39, '432.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(119, 4, 39, '460.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(120, 28, 39, '12.00', 7, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(121, 29, 39, '1234.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(122, 18, 39, '482.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(123, 26, 39, '12.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(124, 9, 39, '302.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(125, 30, 39, '12.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(126, 40, 39, '213.00', 1, '2021-10-31 10:07:32', '2021-10-31 10:07:32', 0),
(127, 2, 40, '211.00', 1, '2021-10-31 10:10:02', '2021-10-31 10:10:02', 0),
(128, 10, 41, '271.00', 1, '2021-10-31 10:15:52', '2021-10-31 10:15:52', 0),
(129, 9, 41, '302.00', 1, '2021-10-31 10:15:52', '2021-10-31 10:15:52', 0),
(130, 14, 41, '247.00', 1, '2021-10-31 10:15:53', '2021-10-31 10:15:53', 0),
(131, 39, 42, '1234.00', 1, '2021-11-08 10:19:33', '2021-11-08 10:19:33', 0),
(132, 10, 42, '271.00', 1, '2021-11-08 10:19:33', '2021-11-08 10:19:33', 0),
(133, 9, 42, '302.00', 1, '2021-11-08 10:19:33', '2021-11-08 10:19:33', 0),
(134, 14, 42, '247.00', 1, '2021-11-08 10:19:33', '2021-11-08 10:19:33', 0),
(144, 5, 52, '156.00', 1, '2021-11-26 15:39:27', '2021-11-26 15:39:27', 0),
(145, 5, 53, '156.00', 1, '2021-11-26 15:42:46', '2021-11-26 15:42:46', 0),
(146, 5, 54, '156.00', 1, '2021-11-26 15:42:53', '2021-11-26 15:42:53', 0),
(147, 5, 55, '156.00', 1, '2021-11-26 15:43:03', '2021-11-26 15:43:03', 0),
(148, 5, 56, '156.00', 1, '2021-11-26 15:43:57', '2021-11-26 15:43:57', 0),
(149, 5, 57, '156.00', 1, '2021-11-26 15:44:27', '2021-11-26 15:44:27', 0),
(150, 5, 58, '156.00', 1, '2021-11-26 15:45:47', '2021-11-26 15:45:47', 0),
(151, 5, 59, '156.00', 1, '2021-11-26 15:47:55', '2021-11-26 15:47:55', 0),
(152, 5, 60, '156.00', 1, '2021-11-26 15:51:19', '2021-11-26 15:51:19', 0),
(153, 5, 61, '156.00', 1, '2021-11-26 15:57:05', '2021-11-26 15:57:05', 0),
(154, 5, 62, '156.00', 1, '2021-11-27 11:21:41', '2021-11-27 11:21:41', 0),
(155, 5, 63, '156.00', 1, '2021-11-27 11:23:10', '2021-11-27 11:23:10', 0),
(156, 40, 64, '213.00', 1, '2022-08-08 17:01:29', '2022-08-08 17:01:29', 0),
(157, 38, 64, '23.00', 1, '2022-08-08 17:01:29', '2022-08-08 17:01:29', 0),
(158, 5, 64, '156.00', 11, '2022-08-08 17:01:29', '2022-08-08 17:01:29', 0),
(159, 34, 65, '23.00', 1, '2022-08-08 17:03:35', '2022-08-08 17:03:35', 0),
(160, 33, 65, '123.00', 1, '2022-08-08 17:03:35', '2022-08-08 17:03:35', 0),
(161, 33, 66, '123.00', 1, '2022-08-08 17:09:29', '2022-08-08 17:09:29', 0),
(162, 34, 66, '23.00', 1, '2022-08-08 17:09:29', '2022-08-08 17:09:29', 0),
(163, 14, 67, '247.00', 1, '2022-08-08 17:22:31', '2022-08-08 17:22:31', 0),
(164, 34, 68, '23.00', 1, '2022-08-10 11:59:40', '2022-08-10 11:59:40', 0),
(165, 40, 68, '213.00', 1, '2022-08-10 11:59:40', '2022-08-10 11:59:40', 0),
(166, 38, 68, '23.00', 1, '2022-08-10 11:59:40', '2022-08-10 11:59:40', 0),
(167, 5, 68, '156.00', 11, '2022-08-10 11:59:40', '2022-08-10 11:59:40', 0),
(168, 29, 69, '231.00', 1, '2022-08-10 12:07:30', '2022-08-10 12:07:30', 0),
(169, 25, 70, '13.00', 1, '2022-08-10 12:10:42', '2022-08-10 12:10:42', 0),
(170, 5, 71, '156.00', 1, '2022-08-10 12:12:13', '2022-08-10 12:12:13', 0),
(171, 27, 72, '12.00', 1, '2022-08-10 12:15:11', '2022-08-10 12:15:11', 0),
(172, 27, 73, '12.00', 1, '2022-08-10 12:16:29', '2022-08-10 12:16:29', 0),
(173, 11, 74, '145.00', 1, '2022-08-10 12:20:33', '2022-08-10 12:20:33', 0),
(174, 5, 75, '156.00', 1, '2022-08-10 12:43:57', '2022-08-10 12:43:57', 0),
(175, 5, 76, '156.00', 1, '2022-08-10 12:47:16', '2022-08-10 12:47:16', 0),
(176, 33, 76, '123.00', 1, '2022-08-10 12:47:16', '2022-08-10 12:47:16', 0),
(177, 12, 77, '295.00', 1, '2022-08-10 12:48:51', '2022-08-10 12:48:51', 0);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL,
  `stock_status` enum('instock','outofstock') NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `created_at`, `updated_at`) VALUES
(2, 'dicta dignissimoshh', 'dicta-dignissimoshh', '<p>Nulla sit delectus harum it<strong>aque quia eum dolorem. Molestiae dolores temporibus voluptas molestiae neque iure eius. Accusamus qui nesciunt eius id possimus dolorem</strong>.</p>', '<p><strong>color: &nbsp;</strong>red</p>\n<p><strong>size</strong>: XXL</p>', '211.00', '200.00', 'SPN358', 'instock', 0, 101, '1631236896.jpg', NULL, '2021-07-27 14:51:12', '2021-11-26 16:21:16'),
(4, 'vel expedita', 'vel-expedita', 'Officia ex odio maiores nam esse ut facere. Reprehenderit sed laboriosam libero et omnis dolorem. Perferendis nam blanditiis aut minima adipisci. Reiciendis nam deleniti ut sunt dolorem eos.', 'Fugiat cupiditate dignissimos officiis suscipit cum eum accusamus. Ex dolor hic nam quaerat aut culpa. Qui laudantium eius et at. Accusantium vero minima sit ex alias itaque voluptas. Quisquam corporis reprehenderit omnis veniam doloribus. Mollitia voluptate accusantium veritatis aut. Sit molestiae laboriosam consequatur eligendi officia. Omnis velit et sint placeat blanditiis ab.', '460.00', '400.00', 'SPN191', 'instock', 1, 131, '1631236924.jpg', NULL, '2021-07-27 14:51:12', '2021-11-20 11:53:26'),
(5, 'deleniti non', 'deleniti-non', 'Qui perferendis ducimus architecto modi eveniet modi ratione. Quos quia ea aspernatur nulla provident quis. Ut id labore nulla nemo debitis aliquid enim non. Vero voluptatem aut at ex.', 'Iste optio non similique. Voluptatibus enim et omnis alias debitis laudantium. Voluptas autem maiores ipsam. Et ab placeat doloremque aut illo non in culpa. Ut voluptatem reiciendis ut eligendi. Rerum quaerat ratione asperiores nulla consectetur aliquid placeat consectetur. Quis excepturi tempora voluptates unde corrupti. Voluptas consequatur non error sunt quae.', '156.00', '100.00', 'SPN281', 'instock', 0, 148, 'spnl_21.jpg', NULL, '2021-07-27 14:51:12', '2021-11-21 11:48:09'),
(6, 'deleniti labore', 'deleniti-labore', 'Aut nesciunt quia dolores aut reprehenderit et et. Et in inventore nihil et cupiditate ipsa et nam. Ut ut cumque ut et autem temporibus. Dignissimos itaque beatae in velit non vel voluptate.', 'Cupiditate animi quia dolore nihil ratione quibusdam eaque. Nihil quis iusto et aut nam et minima quisquam. Commodi soluta dignissimos voluptates consequatur voluptatum sit ut ipsa. Laboriosam non corrupti ducimus dolorum quia repellendus at. Quae molestiae recusandae aut incidunt. Dolore ea assumenda excepturi nisi possimus. Voluptatem minima eos quidem voluptatem soluta qui. Et commodi magnam ut explicabo enim aut.', '88.00', '82.00', 'SPN329', 'instock', 1, 129, '1631237003.jpg', NULL, '2021-07-27 14:51:12', '2021-11-20 11:53:30'),
(9, 'expedita quia', 'expedita-quia', 'Velit quaerat necessitatibus sequi aliquid aut accusamus. Exercitationem asperiores incidunt non. Voluptatem officia eaque odit doloribus ea.', 'Et aut molestias blanditiis rem vel necessitatibus accusamus magnam. Id voluptate omnis sint rem ad excepturi recusandae. Ut aut ducimus eius dolor voluptas non. Id molestias ut consectetur ipsa. Illo ut corrupti dignissimos corporis. Voluptatem esse est nostrum distinctio. Sequi dolores distinctio ipsa provident cumque modi quis. Suscipit et ut ut quisquam ab. Dolorem quaerat explicabo velit officiis amet. Molestiae laboriosam et sint quo dolores voluptas. Odio esse facilis et iste fugit.', '302.00', '250.50', 'SPN413', 'instock', 0, 150, 'spnl_10.jpg', NULL, '2021-07-27 14:51:12', '2021-08-13 13:26:33'),
(10, 'quibusdam non', 'quibusdam-non', 'Natus autem in aut minima cumque officiis. In veritatis nostrum dolores maxime. Assumenda occaecati voluptatem sit quia sed. Et mollitia voluptas ex.', 'Eligendi laboriosam quo et quas. Neque architecto veritatis id nostrum tempore harum. Recusandae sit ipsum recusandae sed maxime qui ex. Dolor amet exercitationem ut aperiam sapiente perspiciatis quia. Consequatur culpa aperiam quia expedita non sapiente. Sed dolore vitae et consequatur voluptas eligendi. Unde quo qui aperiam recusandae. Temporibus nesciunt saepe voluptas in. Veniam corrupti exercitationem facere quibusdam voluptas sunt.', '271.00', '220.00', 'SPN220', 'instock', 0, 102, 'spnl_11.jpg', NULL, '2021-07-27 14:51:12', '2021-08-13 13:26:51'),
(11, 'repellendus est', 'repellendus-est', 'Aut cumque officia laboriosam earum. Sapiente earum dicta ea. Laboriosam dicta tempora molestias voluptate dolores sed unde. Consectetur nihil aliquam nesciunt eveniet enim.', 'Nobis aperiam aut quaerat est. In debitis repudiandae quasi omnis. Ad quisquam quia est autem. Dicta porro neque sequi dolores sit. Occaecati sequi expedita debitis. Quo iusto natus aut perspiciatis quaerat. Consequuntur modi quia totam eos eius. Animi illo labore placeat quo. Omnis velit dolor necessitatibus consequuntur beatae cupiditate. Placeat placeat nobis ut a quis quia aliquam eum.', '145.00', NULL, 'SPN237', 'instock', 0, 125, 'spnl_19.jpg', NULL, '2021-07-27 14:51:12', '2021-07-27 14:51:12'),
(12, 'dolores aspernatur', 'dolores-aspernatur', 'Ab qui ea et nobis eligendi ipsam. Quisquam quo dolores ullam aspernatur autem ipsum et.', 'Qui vitae aut consequatur sit. Sint dolorum aut est consequuntur qui deserunt. Atque deserunt quisquam quos dolores tempora ea. Soluta quam earum eos necessitatibus. Ratione et molestiae aperiam debitis. Corrupti est debitis est temporibus velit aliquam eius. Velit sint at commodi adipisci qui reprehenderit numquam. Et qui recusandae unde deserunt accusantium. Ipsa saepe error unde repudiandae et mollitia. Cupiditate fugiat quisquam dignissimos rerum vero veritatis vel non.', '295.00', '250.00', 'SPN259', 'instock', 1, 124, '1631237023.jpg', NULL, '2021-07-27 14:51:12', '2021-11-20 11:53:09'),
(13, 'fuga fuga', 'fuga-fuga', 'Vel sint ut explicabo qui vel. Mollitia consequuntur facere voluptatem et. Quibusdam id dignissimos dolorem vero provident.', 'Aut deserunt dolores consequatur sapiente dolorum provident. Neque soluta assumenda minus ratione ducimus esse sit. Et quia ut impedit. Minus eaque hic incidunt harum ab qui suscipit. Qui distinctio voluptates accusamus est beatae unde qui. Dicta necessitatibus eius velit hic. Repudiandae quia ut ullam. Quisquam nulla qui illum quam.', '432.00', '255.00', 'SPN406', 'instock', 0, 138, '1631236975.jpg', NULL, '2021-07-27 14:51:12', '2021-11-21 11:48:34'),
(14, 'aut laborum', 'aut-laborum', 'Neque voluptatem mollitia optio nostrum. Iste laudantium voluptatem aut omnis id. Libero est placeat aliquam voluptas aliquid. Quia amet consequuntur rem sed tenetur.', 'Occaecati et dolor perferendis odit ut tempora explicabo quia. Quisquam quisquam nostrum unde voluptatem. Sint modi magnam error. Quisquam vel quia doloremque inventore ullam reiciendis necessitatibus harum. Illum non sint aut fuga expedita. Recusandae eos architecto rerum iure. Ea molestiae maxime alias ullam dolor nisi. Repudiandae sit maxime et magni. Iusto atque enim quia.', '247.00', '200.00', 'SPN468', 'instock', 0, 103, 'spnl_22.jpg', NULL, '2021-07-27 14:51:12', '2021-08-13 13:27:08'),
(15, 'sed voluptates', 'sed-voluptates', 'Recusandae vitae natus ipsa est qui. Ullam omnis nihil et eum aperiam et. Sed dolorum facere est. Non et voluptatum animi cum aspernatur et occaecati dolores.', 'Aut illum distinctio qui est voluptatem modi. Incidunt repudiandae magni sed est corrupti. Ea quo atque quos pariatur. Voluptas placeat rerum accusantium dignissimos rerum repudiandae repellat. Ratione neque maxime nam. Eos quaerat animi cum quo molestias. Inventore veniam iste cum at. Distinctio aut impedit voluptas occaecati minima dolorum voluptas. Excepturi alias et tempora atque id. Quidem omnis tempora repellat.', '163.00', '135.00', 'SPN456', 'instock', 0, 116, 'spnl_13.jpg', NULL, '2021-07-27 14:51:12', '2021-08-13 13:28:37'),
(16, 'nisi provident', 'nisi-provident', 'Qui velit qui sint sed. Nisi rerum placeat at atque laudantium corporis doloremque magnam. Quod blanditiis est et velit ullam eius libero aut. Vero non quia qui necessitatibus.', 'Aspernatur debitis nulla ipsam molestiae. Id ab nobis voluptatibus nostrum. Quas consectetur odio eveniet quisquam porro. Voluptate adipisci dolores quaerat in esse esse doloremque. Ut voluptatibus nihil quibusdam vero. Expedita corrupti rerum ab nihil molestiae aut. Dolores accusamus officiis eveniet quia et eaque voluptatibus officia.', '39.00', '12.00', 'SPN179', 'instock', 0, 168, '1631110504.jpg', NULL, '2021-07-27 14:51:12', '2021-09-07 22:30:04'),
(17, 'quos fugiat', 'quos-fugiat', 'Qui inventore eum consequatur et. Architecto neque est adipisci amet. Qui ab quidem aspernatur amet voluptas. Ratione eos deleniti aut aut et fugiat fuga.', 'Omnis dolor velit aut vel quasi. Et ipsa perferendis in autem esse velit aut. Laborum culpa ea soluta nisi. Nisi voluptatum sunt veritatis ipsum sunt. Et excepturi velit eos placeat numquam veniam facere. Corrupti reprehenderit deleniti rerum sunt. Architecto dolorem sapiente omnis natus a vel veritatis. Aliquam reiciendis magnam quia esse quo. Quidem incidunt quibusdam at et fugit nobis quidem.', '237.00', '199.00', 'SPN154', 'instock', 0, 163, 'spnl_5.jpg', NULL, '2021-07-27 14:51:12', '2021-08-13 13:28:17'),
(18, 'voluptate impedit', 'voluptate-impedit', 'Quis voluptas et quidem autem laboriosam quas quis officia. Voluptatem ipsa cum nisi ea quia quam odio. Minus possimus ad distinctio exercitationem blanditiis deleniti est adipisci.', 'Consectetur eligendi harum tempora ipsam temporibus deleniti voluptatem. Consequuntur pariatur iure quam illo officiis ullam. Ullam et qui atque. Dolores qui enim aspernatur eius occaecati earum iure sed. Dolorem quos sit dicta culpa non unde culpa. Voluptatum sapiente debitis vero sed enim suscipit. Corrupti molestias optio culpa officia architecto vero. Consequatur et sed non. Ad esse sit aut ut doloremque commodi. Voluptate voluptas sit dolorum deserunt ad sed.', '482.00', '420.00', 'SPN168', 'instock', 0, 151, '1631110542.jpg', NULL, '2021-07-27 14:51:12', '2021-09-07 22:30:42'),
(19, 'velit eligendi', 'velit-eligendi', 'Neque non et quia tempora dolores. Quisquam iste molestiae fuga quis ab qui eos. Et aut qui est ut quidem. Maxime velit minima nobis animi et.', 'Consequuntur consequatur illum consequuntur ut sunt. Ipsum perspiciatis qui et. Quo iste eum deserunt tenetur est. Quis eum aut numquam sunt. Sequi voluptatibus dolorem libero nulla expedita laboriosam quam. Alias distinctio nam quia aut. Vero et at eius omnis atque sit aut. Et aut aspernatur velit ullam totam expedita. Sit omnis qui enim consequatur commodi aliquid hic.', '100.00', NULL, 'SPN261', 'instock', 0, 128, 'spnl_1.jpg', NULL, '2021-07-27 14:51:12', '2021-07-27 14:51:12'),
(21, 'culpa quos', 'culpa-quos', 'Neque et quia eum ducimus dignissimos iusto minima. Tenetur ducimus aut in eveniet aut laudantium. Qui praesentium ab quam impedit. Aut ipsum facilis omnis dolore pariatur praesentium quisquam.', 'Voluptatem inventore et ut id et aut. Architecto animi et unde dolores voluptatibus asperiores. Beatae necessitatibus hic consequatur voluptatem nulla pariatur. Voluptatum ut consequatur porro et. Error exercitationem eligendi reprehenderit necessitatibus ipsa. Ad molestias iure est ad et suscipit deserunt quia. Sunt voluptatem commodi similique saepe molestias autem. Omnis voluptatem quae quo quis eos qui omnis.', '230.00', NULL, 'SPN421', 'instock', 0, 170, 'spnl_12.jpg', NULL, '2021-07-27 14:51:12', '2021-07-27 14:51:12'),
(22, 'et odit', 'et-odit', 'Expedita deserunt provident et est. Aliquam ipsum deleniti aliquam voluptas quos praesentium. Est ea corporis praesentium blanditiis quo commodi cum.', 'Perspiciatis et adipisci et molestias. Ut consequuntur aliquid veniam non veniam non sit. Aut officiis ullam aliquam dolor voluptatem dolorem officia. Id tenetur quis doloribus ratione ut dignissimos harum. Eaque delectus itaque deserunt laboriosam ut. Sint recusandae et odio id ad quas aut assumenda. Sit quo est nisi enim recusandae incidunt facilis.', '112.00', '99.00', 'SPN464', 'instock', 0, 142, 'spnl_16.jpg', NULL, '2021-07-27 14:51:12', '2021-11-21 11:48:11'),
(25, 'we', 'we', '<p>we</p>', '<p>qwe</p>', '13.00', '12.00', 'fsdf', 'instock', 0, 213, '1631107271.jpg', NULL, '2021-08-23 23:18:27', '2021-09-07 21:36:11'),
(26, 'sdfasfg', 'sdfasfg', '<p>ams,dfjsoifs</p>', '<p>this is description</p>', '12.00', '123.00', 'wsds', 'outofstock', 0, 12, '1631107295.jpg', ',16298175030.jpg,16298175031.jpg,16298175032.jpg', '2021-08-23 23:20:03', '2021-09-07 21:36:35'),
(27, 'safg', 'safg', '<p>sdf</p>', '<p>sdf</p>', '12.00', '21.00', 'sdvf', 'instock', 0, 12, '1629818010.jpg', ',16298180100.jpg,16298180101.jpg,16298180102.jpg', '2021-08-23 23:28:30', '2021-11-21 11:48:05'),
(28, 'sadfasdf', 'sadfasdf', '<p>sdfa</p>', '<p>asdf</p>', '12.00', '23.00', 'ds', 'instock', 0, 213, '1629856221.jpg', ',16298562210.jpg,16298562211.jpg,16298562212.jpg,16298562213.jpg', '2021-08-24 10:05:21', '2021-08-24 10:05:21'),
(29, 'adfsasad', 'adfsasad', '<p>sadf</p>', '<p>sadsf</p>', '231.00', '1234.00', 'sd', 'outofstock', 0, 12, '1629856359.jpg', ',16298563590.jpg,16298563591.jpg,16298563592.jpg', '2021-08-24 10:07:39', '2021-08-24 10:07:39'),
(30, 'green shoes for men ', 'green-shoes-for-men', '<p>sdf</p>', '<p>afzf</p>', '12.00', '123.00', 'dsf', 'instock', 0, 12, '1631336036.jpg', '16298565203.jpg,16298565203.jpg', '2021-08-24 10:10:20', '2021-09-10 13:08:56'),
(31, 'fghjkl', 'fghjkl', '<p>sdf</p>', '<p>sdfd</p>', '4.00', '45.00', 'sdf', 'instock', 0, 5, '1631694216.jpg', NULL, '2021-09-14 16:38:36', '2021-09-14 16:38:36'),
(32, 'asfg', 'asfg', '<p>asfd</p>', '<p>asdf</p>', '4.00', '4.00', 'hiyu', 'instock', 0, 5, '1632464269.jpg', ',16324642690.jpg', '2021-09-23 14:32:49', '2021-09-23 14:32:49'),
(33, 'asf', 'asf', '<p>asf</p>', '<p>asf</p>', '123.00', '124.00', 'sfd', 'instock', 0, 123, '1632464719.jpg', ',16324647190.jpg', '2021-09-23 14:40:19', '2021-09-23 14:40:19'),
(34, 'asdf', 'asdfasf', 'sdf', 'asdf', '23.00', '13.00', 'ed', 'instock', 1, 12, '1632485157.jpg', ',16324851570.jpg', '2021-09-23 20:20:57', '2021-11-21 11:48:25'),
(37, 'asdfasd', 'asdfasdasd', '<p style=\"text-align: center;\">asd<strong>sadasdfasdf</strong></p>', '<p style=\"text-align: left;\">asdasdfsadfasdf<strong>adasdaasd</strong></p>', '123.00', '12.00', 'asd', 'instock', 0, 2, '1632493429.jpg', ',16324934290.jpg,16324934291.jpg,16324934292.jpg', '2021-09-23 22:38:49', '2021-09-23 22:38:49'),
(38, 'qew', 'qew', '<p>123qwqwefqwfqw</p>', '<p>qweqwerqweqwe<em>qweqwerqwerq</em></p>', '23.00', '123.00', 'w', 'instock', 0, 231, '1632493550.jpg', NULL, '2021-09-23 22:40:50', '2021-09-23 22:40:50'),
(39, 'kiran', 'kiran', '<p>zxzfxv&nbsp; dg dgdsfb d</p>', '<p>sdf gsdg sdg&nbsp;</p>', '1234.00', '2134.00', '1dfd', 'instock', 0, 123, '1632495081.jpg', ',16324950810.jpg,16324950811.jpg,16324950812.jpg', '2021-09-23 23:06:21', '2021-09-23 23:06:21'),
(40, 'asf', 'asf-2', '<p>123</p>', '<p>wefdc</p>', '213.00', '123.00', 'sadf', 'instock', 0, 123, '1632540536.jpg', ',16325405360.jpg,16325405361.jpg', '2021-09-24 11:43:56', '2021-09-24 11:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-11-29 12:00:00', 1, NULL, '2021-11-26 10:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cE96e5Py3qdI5AgK6epCyyehyPLtxgfqA9EGLmIo', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWFNYbDZnZm1QbTlXQjFYVmtNRVhERmd1S1VoNHRkekxDak9XZWZOSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aGFuay15b3UiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NToidXR5cGUiO3M6NDoidXNlciI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR2S2NrZkFLMUZpMC5TdmdoUnRVc2F1V0tya3VaRVpIYzZoRVl6SjJzc011TW94US92ZjhrcSI7czo0OiJjYXJ0IjthOjE6e3M6ODoid2lzaGxpc3QiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjE0OntzOjMyOiI2Yjc3MGQwMDk4ZWI1YmM3ZjZlMGE3NGUzMzE0ZDRkMCI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6IjZiNzcwZDAwOThlYjViYzdmNmUwYTc0ZTMzMTRkNGQwIjtzOjI6ImlkIjtpOjM4O3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjM6InFldyI7czo1OiJwcmljZSI7ZDoyMztzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiMmM1MDkzZWQ4NWIxZGNlYzA1YjcyMDViZWEwZTVlYzYiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIyYzUwOTNlZDg1YjFkY2VjMDViNzIwNWJlYTBlNWVjNiI7czoyOiJpZCI7aTozMTtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo2OiJmZ2hqa2wiO3M6NToicHJpY2UiO2Q6NDtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiYmY5M2UwMDQwMTkwZTJhMmM4OTU3MGU1MTUyYzdjZTEiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiJiZjkzZTAwNDAxOTBlMmEyYzg5NTcwZTUxNTJjN2NlMSI7czoyOiJpZCI7aToyNztzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo0OiJzYWZnIjtzOjU6InByaWNlIjtkOjEyO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToxMztzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO31zOjMyOiJhYjQ3NGE3MjQ3NWVhNmVhNTRkMjA4NWU1Y2RhY2MyOCI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6ImFiNDc0YTcyNDc1ZWE2ZWE1NGQyMDg1ZTVjZGFjYzI4IjtzOjI6ImlkIjtpOjE1O3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjE0OiJzZWQgdm9sdXB0YXRlcyI7czo1OiJwcmljZSI7ZDoxNjM7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjEzO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fXM6MzI6ImU0MjE1OWNjOTY2M2Y1ODU2Njg1YTc0ZDY0YzI5YTUzIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiZTQyMTU5Y2M5NjYzZjU4NTY2ODVhNzRkNjRjMjlhNTMiO3M6MjoiaWQiO2k6MTA7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6MTM6InF1aWJ1c2RhbSBub24iO3M6NToicHJpY2UiO2Q6MjcxO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToxMztzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO31zOjMyOiI4ZDg3ODYwZjc2OGFkY2EwNjE3ZDc5MjYxYzY1OTVhYiI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6IjhkODc4NjBmNzY4YWRjYTA2MTdkNzkyNjFjNjU5NWFiIjtzOjI6ImlkIjtpOjMwO3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjIwOiJncmVlbiBzaG9lcyBmb3IgbWVuICI7czo1OiJwcmljZSI7ZDoxMjtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiOGU1YTQ0YjdlODE1ODgzOWIwMjAzZWQ3YjlmMjE0NGIiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiI4ZTVhNDRiN2U4MTU4ODM5YjAyMDNlZDdiOWYyMTQ0YiI7czoyOiJpZCI7aToyODtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo4OiJzYWRmYXNkZiI7czo1OiJwcmljZSI7ZDoxMjtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiYWRkYzUyNWNlNDNmNWNiYjQ1MTdiZmE1MWM5YzA4ZTUiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiJhZGRjNTI1Y2U0M2Y1Y2JiNDUxN2JmYTUxYzljMDhlNSI7czoyOiJpZCI7aToyNjtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo3OiJzZGZhc2ZnIjtzOjU6InByaWNlIjtkOjEyO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToxMztzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO31zOjMyOiJjNDJmNmJlZWM5YzkzZmQ2YWZlYTZlYjA2ODRhYTk5YSI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6ImM0MmY2YmVlYzljOTNmZDZhZmVhNmViMDY4NGFhOTlhIjtzOjI6ImlkIjtpOjk7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6MTM6ImV4cGVkaXRhIHF1aWEiO3M6NToicHJpY2UiO2Q6MzAyO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aToxMztzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AaXNTYXZlZCI7YjowO31zOjMyOiI4YjQ4NjQzM2JhOGE5ZTQwODllYWZhOTI3ODQwYTY5MiI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjk6e3M6NToicm93SWQiO3M6MzI6IjhiNDg2NDMzYmE4YTllNDA4OWVhZmE5Mjc4NDBhNjkyIjtzOjI6ImlkIjtpOjEzO3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjk6ImZ1Z2EgZnVnYSI7czo1OiJwcmljZSI7ZDo0MzI7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjEzO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fXM6MzI6ImJiNGE2ZGI0Mjk1ZDZiZThiZDEyNzkxZWQ1NjUwMDg3IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiYmI0YTZkYjQyOTVkNmJlOGJkMTI3OTFlZDU2NTAwODciO3M6MjoiaWQiO2k6MTQ7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6MTE6ImF1dCBsYWJvcnVtIjtzOjU6InByaWNlIjtkOjI0NztzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9czozMjoiMDdjY2ExNTE2OGIxYTVlNDhlMGY4OWQ4NzhmYmY2ZWEiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIwN2NjYTE1MTY4YjFhNWU0OGUwZjg5ZDg3OGZiZjZlYSI7czoyOiJpZCI7aToxNjtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czoxNDoibmlzaSBwcm92aWRlbnQiO3M6NToicHJpY2UiO2Q6Mzk7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjEzO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fXM6MzI6IjYyMGQ2NzBkOTVmMDQxOWUzNWY5MTgyNjk1OTE4YzY4IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiNjIwZDY3MGQ5NWYwNDE5ZTM1ZjkxODI2OTU5MThjNjgiO3M6MjoiaWQiO2k6MTE7czozOiJxdHkiO2k6MTtzOjQ6Im5hbWUiO3M6MTU6InJlcGVsbGVuZHVzIGVzdCI7czo1OiJwcmljZSI7ZDoxNDU7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjEzO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fXM6MzI6IjQ2ODM5OTU4MTM0MjUwNWM0N2Y0NjE1YjgxYmVkYWE5IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiNDY4Mzk5NTgxMzQyNTA1YzQ3ZjQ2MTViODFiZWRhYTkiO3M6MjoiaWQiO2k6NTtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czoxMjoiZGVsZW5pdGkgbm9uIjtzOjU6InByaWNlIjtkOjE1NjtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9fX19fQ==', 1660207736),
('FoerQCCKrk9tMLnWRQtUg98eMIjOgR7F1KrSKtlG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR21uSVNjN3lPQTZjNDNoZ2VwSlJMS2RpQkZDaXNtdzVpdmxOcHJaNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2V4cGVkaXRhLXF1aWEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1661660399),
('POkI6OfuXvhlIYdxqAtpN82KXeEgN5wJmAYOonCc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQW9BWHhGSHZwc1k3RE5zbEZTaFBORUt2YmE0d3dSWGpiVXhmSUlMZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6NDoiY2FydCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiMzcwZDA4NTg1MzYwZjVjNTY4YjE4ZDFmMmU0Y2ExZGYiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIzNzBkMDg1ODUzNjBmNWM1NjhiMThkMWYyZTRjYTFkZiI7czoyOiJpZCI7aToyO3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjE5OiJkaWN0YSBkaWduaXNzaW1vc2hoIjtzOjU6InByaWNlIjtkOjIxMTtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YTowOnt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO3M6MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MTM7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9fX19czo4OiJjaGVja291dCI7YTo0OntzOjg6ImRpc2NvdW50IjtpOjA7czo4OiJzdWJ0b3RhbCI7czo2OiIyMTEuMDAiO3M6MzoidGF4IjtzOjU6IjI3LjQzIjtzOjU6InRvdGFsIjtzOjY6IjIzOC40MyI7fX0=', 1661751704);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `firstname`, `lastname`, `mobile`, `email`, `address1`, `address2`, `city`, `province`, `zipcode`, `country`, `created_at`, `updated_at`) VALUES
(1, 6, 'Kishan', 'Ale', '9849552851', 'alekirashan@gmail.com', 'dhungedhara', 'raniban', 'kathmandu', 'Bagmati', '44600', 'Nepal', '2021-08-16 21:42:39', '2021-08-16 21:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('admin@admin.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"bf93e0040190e2a2c89570e5152c7ce1\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bf93e0040190e2a2c89570e5152c7ce1\";s:2:\"id\";i:27;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"safg\";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-09-10 13:44:24', NULL),
('alekiran41@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"eef12573176125ce53e333e13d747a17\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"eef12573176125ce53e333e13d747a17\";s:2:\"id\";i:12;s:3:\"qty\";i:1;s:4:\"name\";s:18:\"dolores aspernatur\";s:5:\"price\";d:295;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2022-08-10 12:48:27', NULL),
('alekiran41@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:15:{s:32:\"6b770d0098eb5bc7f6e0a74e3314d4d0\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"6b770d0098eb5bc7f6e0a74e3314d4d0\";s:2:\"id\";i:38;s:3:\"qty\";i:1;s:4:\"name\";s:3:\"qew\";s:5:\"price\";d:23;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"2c5093ed85b1dcec05b7205bea0e5ec6\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"2c5093ed85b1dcec05b7205bea0e5ec6\";s:2:\"id\";i:31;s:3:\"qty\";i:1;s:4:\"name\";s:6:\"fghjkl\";s:5:\"price\";d:4;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"bf93e0040190e2a2c89570e5152c7ce1\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bf93e0040190e2a2c89570e5152c7ce1\";s:2:\"id\";i:27;s:3:\"qty\";i:1;s:4:\"name\";s:4:\"safg\";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"620d670d95f0419e35f9182695918c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"620d670d95f0419e35f9182695918c68\";s:2:\"id\";i:11;s:3:\"qty\";i:1;s:4:\"name\";s:15:\"repellendus est\";s:5:\"price\";d:145;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"ab474a72475ea6ea54d2085e5cdacc28\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"ab474a72475ea6ea54d2085e5cdacc28\";s:2:\"id\";i:15;s:3:\"qty\";i:1;s:4:\"name\";s:14:\"sed voluptates\";s:5:\"price\";d:163;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"eef12573176125ce53e333e13d747a17\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"eef12573176125ce53e333e13d747a17\";s:2:\"id\";i:12;s:3:\"qty\";i:1;s:4:\"name\";s:18:\"dolores aspernatur\";s:5:\"price\";d:295;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"468399581342505c47f4615b81bedaa9\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"468399581342505c47f4615b81bedaa9\";s:2:\"id\";i:5;s:3:\"qty\";i:1;s:4:\"name\";s:12:\"deleniti non\";s:5:\"price\";d:156;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"e42159cc9663f5856685a74d64c29a53\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e42159cc9663f5856685a74d64c29a53\";s:2:\"id\";i:10;s:3:\"qty\";i:1;s:4:\"name\";s:13:\"quibusdam non\";s:5:\"price\";d:271;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"8d87860f768adca0617d79261c6595ab\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"8d87860f768adca0617d79261c6595ab\";s:2:\"id\";i:30;s:3:\"qty\";i:1;s:4:\"name\";s:20:\"green shoes for men \";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"8e5a44b7e8158839b0203ed7b9f2144b\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"8e5a44b7e8158839b0203ed7b9f2144b\";s:2:\"id\";i:28;s:3:\"qty\";i:1;s:4:\"name\";s:8:\"sadfasdf\";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"addc525ce43f5cbb4517bfa51c9c08e5\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"addc525ce43f5cbb4517bfa51c9c08e5\";s:2:\"id\";i:26;s:3:\"qty\";i:1;s:4:\"name\";s:7:\"sdfasfg\";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"c42f6beec9c93fd6afea6eb0684aa99a\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c42f6beec9c93fd6afea6eb0684aa99a\";s:2:\"id\";i:9;s:3:\"qty\";i:1;s:4:\"name\";s:13:\"expedita quia\";s:5:\"price\";d:302;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"8b486433ba8a9e4089eafa927840a692\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"8b486433ba8a9e4089eafa927840a692\";s:2:\"id\";i:13;s:3:\"qty\";i:1;s:4:\"name\";s:9:\"fuga fuga\";s:5:\"price\";d:432;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"bb4a6db4295d6be8bd12791ed5650087\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bb4a6db4295d6be8bd12791ed5650087\";s:2:\"id\";i:14;s:3:\"qty\";i:1;s:4:\"name\";s:11:\"aut laborum\";s:5:\"price\";d:247;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"07cca15168b1a5e48e0f89d878fbf6ea\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"07cca15168b1a5e48e0f89d878fbf6ea\";s:2:\"id\";i:16;s:3:\"qty\";i:1;s:4:\"name\";s:14:\"nisi provident\";s:5:\"price\";d:39;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2022-08-10 12:11:30', NULL),
('kiranale855@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"8e5a44b7e8158839b0203ed7b9f2144b\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"8e5a44b7e8158839b0203ed7b9f2144b\";s:2:\"id\";i:28;s:3:\"qty\";i:1;s:4:\"name\";s:8:\"sadfasdf\";s:5:\"price\";d:12;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"620d670d95f0419e35f9182695918c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"620d670d95f0419e35f9182695918c68\";s:2:\"id\";i:11;s:3:\"qty\";i:1;s:4:\"name\";s:15:\"repellendus est\";s:5:\"price\";d:145;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-09-09 20:15:01', NULL),
('kiranale855@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:3:{s:32:\"eef12573176125ce53e333e13d747a17\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"eef12573176125ce53e333e13d747a17\";s:2:\"id\";i:12;s:3:\"qty\";i:1;s:4:\"name\";s:18:\"dolores aspernatur\";s:5:\"price\";d:295;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"620d670d95f0419e35f9182695918c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"620d670d95f0419e35f9182695918c68\";s:2:\"id\";i:11;s:3:\"qty\";i:1;s:4:\"name\";s:15:\"repellendus est\";s:5:\"price\";d:145;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"e42159cc9663f5856685a74d64c29a53\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e42159cc9663f5856685a74d64c29a53\";s:2:\"id\";i:10;s:3:\"qty\";i:1;s:4:\"name\";s:13:\"quibusdam non\";s:5:\"price\";d:271;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-09-09 19:50:05', NULL),
('kishanale786@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"addc525ce43f5cbb4517bfa51c9c08e5\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"addc525ce43f5cbb4517bfa51c9c08e5\";s:2:\"id\";i:26;s:3:\"qty\";i:1;s:4:\"name\";s:7:\"sdfasfg\";s:5:\"price\";d:123;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2021-09-14 12:38:07', NULL),
('kishanale786@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2021-09-14 12:37:54', NULL),
('mannis09mgr@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"bb4a6db4295d6be8bd12791ed5650087\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"bb4a6db4295d6be8bd12791ed5650087\";s:2:\"id\";i:14;s:3:\"qty\";i:1;s:4:\"name\";s:11:\"aut laborum\";s:5:\"price\";d:247;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:0:{}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:13;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}}', '2022-08-08 17:22:13', NULL),
('mannis09mgr@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2022-08-08 17:22:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cash_on_delivery','card','paypal','esewa') NOT NULL,
  `status` enum('pending','approved','declined','refunded') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 6, 'cash_on_delivery', 'pending', '2021-08-16 21:42:39', '2021-08-16 21:42:39'),
(2, 2, 7, 'cash_on_delivery', 'pending', '2021-08-17 13:21:56', '2021-08-17 13:21:56'),
(3, 3, 8, 'cash_on_delivery', 'pending', '2021-08-17 23:30:18', '2021-08-17 23:30:18'),
(4, 3, 9, 'cash_on_delivery', 'pending', '2021-08-17 23:36:29', '2021-08-17 23:36:29'),
(5, 3, 14, 'cash_on_delivery', 'pending', '2021-08-18 14:51:03', '2021-08-18 14:51:03'),
(6, 3, 29, 'card', 'approved', '2021-08-18 15:48:40', '2021-08-18 15:48:40'),
(7, 3, 30, 'cash_on_delivery', 'pending', '2021-08-19 11:45:37', '2021-08-19 11:45:37'),
(8, 3, 31, 'cash_on_delivery', 'pending', '2021-08-19 11:47:01', '2021-08-19 11:47:01'),
(9, 3, 32, 'card', 'approved', '2021-08-19 11:49:35', '2021-08-19 11:49:35'),
(10, 3, 33, 'card', 'approved', '2021-08-24 19:15:42', '2021-08-24 19:15:42'),
(11, 4, 34, 'cash_on_delivery', 'pending', '2021-09-09 19:46:50', '2021-09-09 19:46:50'),
(12, 3, 36, 'cash_on_delivery', 'pending', '2021-09-12 22:15:15', '2021-09-12 22:15:15'),
(13, 3, 37, 'cash_on_delivery', 'pending', '2021-09-14 19:57:12', '2021-09-14 19:57:12'),
(14, 3, 38, 'cash_on_delivery', 'pending', '2021-09-29 21:45:05', '2021-09-29 21:45:05'),
(15, 3, 39, 'cash_on_delivery', 'pending', '2021-10-31 10:07:32', '2021-10-31 10:07:32'),
(16, 3, 40, 'cash_on_delivery', 'pending', '2021-10-31 10:10:02', '2021-10-31 10:10:02'),
(17, 3, 41, 'cash_on_delivery', 'pending', '2021-10-31 10:15:53', '2021-10-31 10:15:53'),
(18, 3, 42, 'cash_on_delivery', 'pending', '2021-11-08 10:19:34', '2021-11-08 10:19:34'),
(19, 3, 51, 'card', 'approved', '2021-11-26 11:58:55', '2021-11-26 11:58:55');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `utype` varchar(255) NOT NULL DEFAULT 'user' COMMENT 'admin for admin and user for user/customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Adminee', 'admin@admin.com', NULL, '$2y$10$UVItggKt2vgeEdxX5XnzPeeSCyh6gpb2GCyB9cmS/PEq/qUVxHxXS', NULL, NULL, NULL, NULL, '1631531637.jpg', 'admin', '2021-07-25 10:30:06', '2021-11-19 13:42:49'),
(2, 'User', 'user@user.com', NULL, '$2y$10$coJn/VZcwj/9wPTrHfBD6.Zs0xPIwau5cbD1CXKs6vUKpoySZKqUK', NULL, NULL, NULL, NULL, NULL, 'user', '2021-07-25 12:13:25', '2021-07-25 12:13:25'),
(3, 'Kiran Ale', 'alekiran41@gmail.com', NULL, '$2y$10$vKckfAK1Fi0.SvghRtUsauWKrkuZEZHc6hEYzJ2ssMuMoxQ/vf8kq', NULL, NULL, 'qi6emJpMS6i6lYSU35LMdkfHTQXTKz8DRGs0DYgVN1gMHjLmNClGfDzW85KX', NULL, NULL, 'user', '2021-07-26 22:28:32', '2021-09-29 20:44:44'),
(4, 'Kiran Ale', 'kiranale855@gmail.com', NULL, '$2y$10$lGXF3TtjjdF4lBxJMJsvfucc//k2RjWI8U8U3sSPyUHSnqnAZeogm', NULL, NULL, NULL, NULL, NULL, 'user', '2021-09-09 19:31:44', '2021-09-09 19:31:44'),
(5, 'Kishan', 'kishanale786@gmail.com', NULL, '$2y$10$PAx8jub9HJkQmJfeUCu9GuppNkamZZGkvcI6Z9.K2J0/TksJXhNWG', NULL, NULL, NULL, NULL, NULL, 'user', '2021-09-14 12:37:13', '2021-09-14 12:37:13'),
(6, 'Manish magar', 'mannis09mgr@gmail.com', NULL, '$2y$10$veWZaO.K4cCr2DaUcrevYuKOW5yc1DEzXsG/z3F7BeUSThQSjA6qq', NULL, NULL, NULL, NULL, NULL, 'user', '2022-08-08 17:03:11', '2022-08-08 17:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_products_category_id_foreign` (`category_id`),
  ADD KEY `category_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
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
