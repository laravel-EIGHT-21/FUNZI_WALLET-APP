-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 01:04 PM
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
-- Database: `funziwallet_db_24`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_folders`
--

CREATE TABLE IF NOT EXISTS `academic_folders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `telephone`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Keynes Noah', 'keynesnoah01@gmail.com', NULL, '$2y$12$6jIs70.XcsdkDgZo4e2jkeinXZfOYKtJlI.e3XMdMOH8mJV05h1qu', NULL, NULL, NULL, '0779913330', 1, NULL, NULL, '5pgsDNqwp40zatVs2ve02nRZPwVCRF5Ym8rDAm9S.jpg', NULL, NULL),
(2, 'John Wick 4 	', 'jw@gmail.com', NULL, '$2y$12$jkt7JtLryRwO4O4J0Bh1w.0L2NXtcLIeDmhXtWgSRlbwLw4wWyXQm', NULL, NULL, NULL, '0777265376', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE IF NOT EXISTS `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `admission_fees` double DEFAULT NULL,
  `student_class` varchar(255) DEFAULT NULL,
  `student_day_boarding` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `school_id`, `student_id`, `term_id`, `admission_fees`, `student_class`, `student_day_boarding`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 9, 21, 2, 80000, 'SeniorThree', 'BoardingSection', '2024-04-15', 'April 2024', '2024', '2024-04-15 13:48:24', NULL),
(2, 9, 22, 1, 80000, 'SeniorFour', 'BoardingSection', '2024-04-15', 'April 2024', '2024', '2024-04-15 13:48:24', '2024-05-21 09:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0bb80f0413ef83204a2122d3ab92b442', 'i:1;', 1746013901),
('0bb80f0413ef83204a2122d3ab92b442:timer', 'i:1746013901;', 1746013901),
('15f2dbb261b246e5a782986797f38b0e', 'i:1;', 1738840657),
('15f2dbb261b246e5a782986797f38b0e:timer', 'i:1738840657;', 1738840657),
('2d130e23bd1034bb38d8ef8f07200ac7', 'i:1;', 1736352402),
('2d130e23bd1034bb38d8ef8f07200ac7:timer', 'i:1736352402;', 1736352402),
('82b9d3ea76200f07a826deb7b492fef9', 'i:1;', 1751102297),
('82b9d3ea76200f07a826deb7b492fef9:timer', 'i:1751102297;', 1751102297),
('funzitours@gmail.com|127.0.0.1', 'i:1;', 1749457123),
('funzitours@gmail.com|127.0.0.1:timer', 'i:1749457123;', 1749457123),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:32:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"view-admin-users\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"create-admin-user\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"edit-admin-user\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"view-schools\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:13:\"create-school\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"edit-school\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"money-transactions\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"permit-list\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:13:\"permit-create\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"permit-edit\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:13:\"permit-delete\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:18:\"school-orders-view\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:21:\"school-orders-details\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:26:\"money-transactions-reports\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:21:\"school-orders-reports\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:35:\"money-transactions-school-transfers\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:25:\"ecommerce-products-create\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:23:\"ecommerce-products-edit\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:25:\"ecommerce-category-create\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:23:\"ecommerce-category-edit\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:19:\"create-school-class\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:17:\"edit-school-class\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:18:\"create-school-term\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:16:\"edit-school-term\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"tour-destinations\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:20:\"school-tours-operate\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"taxi-bus-view\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:15:\"taxi-bus-create\";s:1:\"c\";s:5:\"admin\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super-Admin\";s:1:\"c\";s:5:\"admin\";}}}', 1751140075);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rental_operator_id` int(11) DEFAULT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `no_of_seats` varchar(255) DEFAULT NULL,
  `hire_price_fuel` double DEFAULT NULL,
  `hire_price_no_fuel` double DEFAULT NULL,
  `car_photo` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `rental_operator_id`, `car_name`, `model`, `no_of_seats`, `hire_price_fuel`, `hire_price_no_fuel`, `car_photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Coaster Bus', 'Toyota', '30', 350000, 270000, '1819067187830135.jpg', '2024-12-18 16:02:29', '2024-12-21 13:14:16'),
(2, 2, 'Straline 2070 E AC Coach', 'Mitsubishi', '28', 400000, 300000, '1819062782199886.jpg', '2024-12-18 16:11:35', '2024-12-21 12:04:15'),
(3, 4, 'Straline 2070 E AC Coaster', 'Mitsubishi', '28', 250000, 180000, '1819067124686705.webp', '2024-12-21 10:18:40', '2024-12-21 13:13:16'),
(4, 3, 'Tata Mini-Bus', 'Toyota', '35', 300000, 150000, '1819062665954891.jpg', '2024-12-21 12:01:42', '2024-12-21 12:02:24'),
(5, 3, 'Straline 2000 E AD', 'Toyota', '30', 220000, 120000, '1819062646789581.jpg', '2024-12-21 12:01:42', '2024-12-21 12:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `car_bookings`
--

CREATE TABLE IF NOT EXISTS `car_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `school_tel1` varchar(255) NOT NULL,
  `school_tel2` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `total_rentals` int(10) DEFAULT NULL,
  `booking_no` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_bookings`
--

INSERT INTO `car_bookings` (`id`, `school_id`, `name`, `email`, `school_tel1`, `school_tel2`, `school_address`, `total_rentals`, `booking_no`, `time`, `date`, `month`, `year`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 9, 'Akilibit High School', 'ahs@gmail.com', '1234567894', '1122245788', 'Naalya', 1, '59532425', '09:35:25', '2025-01-03', 'January 2025', '2025', 'Bookings Confirmed', 450000, '2025-01-03 06:35:25', '2025-01-03 08:12:19'),
(2, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 2, '45395767', '12:50:23', '2025-01-03', 'January 2025', '2025', 'Bookings Pending', 810000, '2025-01-03 09:50:23', NULL),
(3, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 1, '71045234', '13:29:59', '2025-01-24', 'January 2025', '2025', 'Bookings Pending', 450000, '2025-01-24 10:29:59', NULL),
(4, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 1, '34994109', '12:52:27', '2025-01-30', 'January 2025', '2025', 'Bookings Confirmed', 300000, '2025-01-30 09:52:27', '2025-06-23 07:42:13'),
(5, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 1, '46841705', '09:59:08', '2025-02-05', 'February 2025', '2025', 'Bookings Pending', 300000, '2025-02-05 06:59:08', NULL),
(6, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 1, '17184766', '21:13:20', '2025-06-22', 'June 2025', '2025', 'Bookings Pending', 300000, '2025-06-22 18:13:20', NULL),
(7, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 1, '27245945', '21:23:17', '2025-06-22', 'June 2025', '2025', 'Bookings Cancelled', 880000, '2025-06-22 18:23:17', '2025-06-23 08:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `car_rental_bookings`
--

CREATE TABLE IF NOT EXISTS `car_rental_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `vehicle_total` varchar(255) DEFAULT NULL,
  `total_days` varchar(255) DEFAULT NULL,
  `start_day` varchar(255) DEFAULT NULL,
  `end_day` varchar(255) DEFAULT NULL,
  `fuel_status` varchar(255) DEFAULT NULL,
  `price_per_day` double DEFAULT NULL,
  `pricetotal` double DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_rental_bookings`
--

INSERT INTO `car_rental_bookings` (`id`, `booking_id`, `school_id`, `car_id`, `vehicle_total`, `total_days`, `start_day`, `end_day`, `fuel_status`, `price_per_day`, `pricetotal`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 4, '2', '3', '2024-12-24', '2024-12-27', 'With No Fuel', 150000, 450000, '2025-01-03', 'January 2025', '2025', 'Bookings Confirmed', '2025-01-03 06:35:25', '2025-01-03 08:12:19'),
(2, 2, 11, 5, '2', '3', '2025-01-03', '2025-01-06', 'With No Fuel', 120000, 360000, '2025-01-03', 'January 2025', '2025', 'Bookings Pending', '2025-01-03 09:50:23', NULL),
(3, 2, 11, 4, '2', '3', '2025-01-03', '2025-01-06', 'With No Fuel', 150000, 450000, '2025-01-03', 'January 2025', '2025', 'Bookings Pending', '2025-01-03 09:50:23', NULL),
(4, 3, 11, 4, '1', '3', '2025-01-24', '2025-01-27', 'With No Fuel', 150000, 450000, '2025-01-24', 'January 2025', '2025', 'Bookings Pending', '2025-01-24 10:29:59', NULL),
(5, 4, 11, 4, '1', '2', '2025-01-30', '2025-02-01', 'With No Fuel', 150000, 300000, '2025-01-30', 'January 2025', '2025', 'Bookings Confirmed', '2025-01-30 09:52:27', '2025-06-23 07:42:13'),
(6, 5, 11, 4, '1', '2', '2025-02-06', '2025-02-08', 'With No Fuel', 150000, 300000, '2025-02-05', 'February 2025', '2025', 'Bookings Pending', '2025-02-05 06:59:08', NULL),
(7, 6, 11, 4, '2', '1', '2025-06-24', '2025-06-24', 'With No Fuel', 150000, 300000, '2025-06-22', 'June 2025', '2025', 'Bookings Pending', '2025-06-22 18:13:21', NULL),
(8, 7, 11, 5, '4', '1', '2025-06-24', '2025-06-24', 'With Fuel', 220000, 880000, '2025-06-22', 'June 2025', '2025', 'Bookings Cancelled', '2025-06-22 18:23:17', '2025-06-23 08:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `car_rental_carts`
--

CREATE TABLE IF NOT EXISTS `car_rental_carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) DEFAULT NULL,
  `car_id` bigint(20) DEFAULT NULL,
  `vehicle_total` varchar(255) DEFAULT NULL,
  `fuel_status` varchar(255) DEFAULT NULL,
  `total_days` varchar(255) DEFAULT NULL,
  `start_day` varchar(255) DEFAULT NULL,
  `end_day` varchar(255) DEFAULT NULL,
  `price_per_day` double DEFAULT NULL,
  `pricetotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_bank_fees_payments`
--

CREATE TABLE IF NOT EXISTS `cash_bank_fees_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` int(20) DEFAULT NULL,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `student_class` varchar(255) DEFAULT NULL,
  `student_day_boarding` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `fees_topup_amount` double DEFAULT NULL,
  `previous_fees_amount` double DEFAULT NULL,
  `present_fees_amount` double DEFAULT NULL,
  `old_balance` double DEFAULT NULL,
  `new_balance` double DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_bank_fees_payments`
--

INSERT INTO `cash_bank_fees_payments` (`id`, `payment_id`, `student_acct_no`, `school_id`, `term_id`, `student_class`, `student_day_boarding`, `invoice_no`, `fees_topup_amount`, `previous_fees_amount`, `present_fees_amount`, `old_balance`, `new_balance`, `payment_type`, `notes`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 3, '323389134', '08', 1, 'SeniorThree', 'BoardingSection', '8324721624', 300000, 650000, 950000, 600000, 300000, 'Cash', 'Term 1 Balance Payment for 2024', '2024-03-26', 'March 2024', '2024', '2024-03-26 16:34:12', '2024-03-26 16:34:12'),
(5, 6, '412119640', '08', 1, 'SeniorSix', 'BoardingSection', '6653420757', 850000, 850000, 850000, 650000, 650000, 'Cash', 'Term 1 Payment for 2024', '2024-03-27', 'March 2024', '2024', '2024-03-27 06:52:01', '2024-03-27 06:52:01'),
(6, 3, '323389134', '08', 1, 'SeniorThree', 'BoardingSection', '8324721624', 150000, 950000, 1100000, 300000, 150000, 'Cash', 'Term 1 Balance Payment for 2024', '2024-03-27', 'March 2024', '2024', '2024-03-27 11:56:57', '2024-03-27 11:56:57'),
(7, 3, '323389134', '08', 1, 'SeniorThree', 'BoardingSection', '8324721624', 150000, 1100000, 1250000, 150000, 0, 'Cash', 'Term 1 Balance Payment for 2024', '2024-04-29', 'April 2024', '2024', '2024-04-29 12:01:39', '2024-04-29 12:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Library Books', 'fa-solid fa-book-open-reader', '2023-12-20 10:55:42', '2025-06-19 09:42:29'),
(2, 'Furniture', 'fa-solid fa-chair', '2023-12-20 10:56:01', '2025-06-19 09:39:31'),
(3, 'Stationery', 'fa-solid fa-school', '2025-06-16 14:30:46', '2025-06-19 09:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropbox_tokens`
--

CREATE TABLE IF NOT EXISTS `dropbox_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_token` text NOT NULL,
  `refresh_token` text DEFAULT NULL,
  `expires_in` datetime NOT NULL,
  `token_type` varchar(255) DEFAULT NULL,
  `uid` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `scope` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `invoice_amount` double DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `school_id`, `date`, `month`, `year`, `term_id`, `category_id`, `amount`, `invoice_amount`, `invoice_no`, `created_at`, `updated_at`) VALUES
(1, 9, '2024-04-25', 'April 2024', '2024', 1, 2, 1200000, 2000000, '238', '2024-04-25 11:45:53', '2024-04-26 09:44:41'),
(2, 9, '2024-04-25', 'April 2024', '2024', 2, 2, 750000, 2000000, '827', '2024-04-25 11:47:50', '2024-04-25 11:47:50'),
(3, 9, '2024-04-29', 'April 2024', '2024', 1, 1, 750000, 1200000, '667', '2024-04-29 07:15:52', '2024-04-29 07:15:52'),
(4, 9, '2024-05-02', 'May 2024', '2024', 1, 2, 1000000, 2000000, '123', '2024-05-02 08:08:18', '2024-05-02 08:08:18'),
(5, 9, '2024-05-01', 'May 2024', '2024', 1, 3, 1500000, 3000000, '1204', '2024-05-14 12:31:15', '2024-05-14 12:34:10'),
(6, 9, '2024-05-14', 'May 2024', '2024', 1, 1, 750000, 1200000, '1111', '2024-05-14 12:35:50', '2024-05-14 12:35:50'),
(7, 9, '2024-05-14', 'May 2024', '2024', 1, 4, 1000000, 1500000, '23555', '2024-05-14 12:37:10', '2024-05-14 12:37:10'),
(8, 9, '2024-10-14', 'May 2024', '2024', 3, 2, 1000000, 2000000, '127878', '2024-05-14 17:33:51', '2024-05-14 17:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `school_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 9, 'WATER', '2024-04-25 07:28:38', '2024-04-25 07:28:38'),
(2, 9, 'ELECTRICITY', '2024-04-25 07:29:11', '2024-04-25 07:35:50'),
(3, 9, 'TAXATION', '2024-04-25 07:29:43', '2024-04-25 07:29:43'),
(4, 9, 'TRANSPORT', '2024-05-14 12:31:43', '2024-05-14 12:31:43'),
(5, 9, 'FURNITURE', '2024-05-14 12:31:54', '2024-05-14 12:31:54'),
(6, 11, 'Computer Equipements', '2024-05-15 05:41:14', '2024-05-15 05:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `expense_payments_tracks`
--

CREATE TABLE IF NOT EXISTS `expense_payments_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expense_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `fees_topup_amount` double DEFAULT NULL,
  `previous_fees_amount` double DEFAULT NULL,
  `present_fees_amount` double DEFAULT NULL,
  `old_balance` double DEFAULT NULL,
  `new_balance` double DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_payments_tracks`
--

INSERT INTO `expense_payments_tracks` (`id`, `expense_id`, `school_id`, `term_id`, `invoice_no`, `fees_topup_amount`, `previous_fees_amount`, `present_fees_amount`, `old_balance`, `new_balance`, `payment_type`, `notes`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 2, 9, 2, '8273475642', 750000, 750000, 750000, 1250000, 1250000, 'Cash', 'Term 2 Payment for 2024', '2024-04-25', 'April 2024', '2024', '2024-04-25 11:47:50', '2024-04-25 11:47:50'),
(3, 1, 9, 1, '2381967888', 1200000, 1200000, 1200000, 800000, 800000, 'Cash', 'Term 1 Payment for April 2024', '2024-04-25', 'April 2024', '2024', '2024-04-25 13:11:16', '2024-04-25 13:11:16'),
(6, 3, 9, 1, '6678508468', 750000, 750000, 750000, 450000, 450000, 'Cash', 'Term 1 Payment for April 2024', '2024-04-29', 'April 2024', '2024', '2024-04-29 07:15:52', '2024-04-29 07:15:52'),
(7, 4, 9, 1, '1234234', 1000000, 1000000, 1000000, 1000000, 1000000, 'Cash', 'Term 1 Payment for May 2024', '2024-05-02', 'May 2024', '2024', '2024-05-02 08:08:18', '2024-05-02 08:08:18'),
(9, 5, 9, 1, NULL, 1500000, 1500000, 1500000, 1500000, 1500000, 'Cash', 'Term 1 Payment for May 2024', '2024-05-01', 'May 2024', '2024', '2024-05-14 12:34:10', '2024-05-14 12:34:10'),
(10, 6, 9, 1, '1111', 750000, 750000, 750000, 450000, 450000, 'Cash', 'Term 1 Payment for May 2024', '2024-05-14', 'May 2024', '2024', '2024-05-14 12:35:50', '2024-05-14 12:35:50'),
(11, 7, 9, 1, '23555', 1000000, 1000000, 1000000, 500000, 500000, 'Cash', 'Term 1 Payment for May 2024', '2024-05-14', 'May 2024', '2024', '2024-05-14 12:37:10', '2024-05-14 12:37:10'),
(12, 8, 9, 3, '127878', 1000000, 1000000, 1000000, 1000000, 1000000, 'Cash', 'Term 3 Payment for October 2024', '2024-10-14', 'May 2024', '2024', '2024-05-14 17:33:51', '2024-05-14 17:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `health_folders`
--

CREATE TABLE IF NOT EXISTS `health_folders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_folders`
--

INSERT INTO `health_folders` (`id`, `name`, `student_acct_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'SCHOOL MEDICALS 	', '7423765997', '2024-06-17 11:30:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `loan_amount` double DEFAULT NULL,
  `loan_date` varchar(255) DEFAULT NULL,
  `loan_month` varchar(255) DEFAULT NULL,
  `loan_year` varchar(255) DEFAULT NULL,
  `loan_status` int(11) DEFAULT 0,
  `loan_payment_amount` double DEFAULT NULL,
  `loan_payment_date` varchar(255) DEFAULT NULL,
  `loan_payment_month` varchar(255) DEFAULT NULL,
  `loan_payment_year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(31, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(32, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(34, '2023_11_02_125512_create_sessions_table', 2),
(35, '2023_11_10_102932_create_products_table', 2),
(36, '2023_11_20_173651_create_schoolevents_table', 2),
(37, '2023_11_20_201729_create_schoolfees_sents', 2),
(38, '2023_11_20_201805_create_pocketmoney_sents', 2),
(39, '2023_11_28_141142_create_cart_orders_table', 2),
(40, '2023_12_01_125253_create_order_items', 2),
(41, '2023_12_19_202507_create_categories_table', 2),
(42, '2024_02_05_110854_create_schoolsfees_amounts_table', 2),
(43, '2024_02_05_111359_create_school_terms_table', 2),
(44, '2024_02_12_113705_create_students_schoolfees_records_table', 2),
(45, '2024_02_19_095138_create_cash_bank_fees_payments_table', 2),
(46, '2024_03_02_131834_create_academic_folders_table', 2),
(47, '2024_03_02_132024_create_health_folders_table', 2),
(48, '2024_03_05_193831_create_studentfiles_table', 2),
(49, '2024_03_05_195152_create_studentmedicals_table', 2),
(50, '2024_03_22_085805_create_admissions_table', 2),
(51, '2024_03_23_120339_create_previousyear_balances_table', 2),
(52, '2024_03_26_094419_create_orders_table', 2),
(53, '2024_03_26_104022_create_school_fees_collections_table', 2),
(54, '2024_03_26_104134_create_students_pocketmoneys_table', 2),
(55, '2024_04_04_113100_create_expenses_table', 2),
(56, '2024_04_04_113111_create_expense_categories_table', 2),
(57, '2024_04_06_102314_create_expense_payments_tracks_table', 2),
(58, '2024_04_29_123143_create_purchase_items_table', 2),
(59, '2024_04_29_123156_create_purchase_stocks_table', 2),
(60, '2024_04_30_103245_create_purchase_categories_table', 2),
(61, '2024_05_16_131915_create_tour_packages_table', 2),
(62, '2024_05_16_131928_create_tour_package_images_table', 2),
(63, '2024_05_16_141953_create_tour_payments', 2),
(64, '2024_05_16_142009_create_school_bookings', 2),
(65, '2024_05_16_142024_create_car_bookings', 2),
(66, '2024_05_16_142036_create_cars', 2),
(67, '0001_01_01_000000_create_users_table', 3),
(68, '2024_07_26_123925_add_two_factor_columns_to_users_table', 3),
(69, '2024_07_29_101344_create_permission_tables', 4),
(70, '2024_08_14_083210_create_tours_destinations_table', 5),
(71, '2024_08_23_120101_create_tours_packs_table', 6),
(72, '2024_08_23_121219_create_tours_carts_table', 6),
(73, '2024_11_20_100153_create_admins_table', 7),
(74, '2024_11_20_100221_create_tour_operators_table', 7),
(75, '2024_11_20_100243_create_students_table', 7),
(76, '2024_11_22_142125_create_tour_reviews_table', 8),
(77, '2024_11_29_143651_create_mtn_momo_tokens_table', 9),
(78, '2024_12_14_134253_create_car_rental_carts_table', 10),
(79, '2024_12_14_134304_create_car_rental_bookings_table', 10),
(80, '2024_12_14_135208_create_rental_operators_table', 10),
(81, '2024_12_18_144816_create_transport_routes_table', 11),
(82, '2025_01_02_115136_create_rental_bookings_payments_table', 12),
(83, '2025_01_06_162338_create_dropbox_tokens_table', 13),
(84, '2025_01_06_202641_create_dropbox_tokens_table', 14),
(85, '2025_01_24_094746_create_order_payments_table', 15),
(86, '2025_01_30_125708_create_order_carts_table', 16),
(87, '2025_01_30_135526_create_school_orders_payments_table', 17),
(88, '2025_02_06_114751_create_schoolorders_payments_records_table', 18),
(89, '2025_02_07_111604_create_order_delivery_regions_table', 19),
(90, '2025_02_07_113631_create_order_payments_trackings_table', 19),
(91, '2025_06_26_135516_create_tour_activities_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mtn_momo_tokens`
--

CREATE TABLE IF NOT EXISTS `mtn_momo_tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `access_token` text NOT NULL,
  `refresh_token` text DEFAULT NULL,
  `token_type` varchar(255) NOT NULL DEFAULT 'Bearer',
  `product` enum('collection','disbursement','remittance') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school_tel1` varchar(255) NOT NULL,
  `school_tel2` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `total_order_items` int(11) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `order_month` varchar(255) DEFAULT NULL,
  `order_year` varchar(255) DEFAULT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `school_id`, `name`, `email`, `school_tel1`, `school_tel2`, `school_address`, `amount`, `total_order_items`, `order_number`, `order_time`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `shipped_date`, `delivered_date`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 9, 'Akilibit High School', 'ahs@gmail.com', '1234567894', '1122245788', 'Naalya', 250000, 2, '88252812', '11:20:45', '2025-02-07', 'February 2025', '2025', NULL, NULL, NULL, 'Order Pending', 'No Payment', '2025-02-07 08:20:45', NULL),
(2, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 390000, 2, '25313424', '13:04:56', '2025-02-08', 'February 2025', '2025', '12 February 2025', '12 February 2025', '12 February 2025', 'Order Delivered', 'Payment Made', '2025-02-08 10:04:56', '2025-02-12 10:56:34'),
(4, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 150000, 1, '96265258', '12:24:28', '2025-04-30', 'April 2025', '2025', NULL, NULL, NULL, 'Order Pending', 'No Payment', '2025-04-30 09:24:28', NULL),
(8, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 275000, 2, '48178622', '10:05:10', '2025-06-19', 'June 2025', '2025', '19 June 2025', '19 June 2025', NULL, 'Out for Delivery', 'Partial Payment Made', '2025-06-19 07:05:10', '2025-06-19 08:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_carts`
--

CREATE TABLE IF NOT EXISTS `order_carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `pricetotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_carts`
--

INSERT INTO `order_carts` (`id`, `school_id`, `product_id`, `qty`, `price`, `pricetotal`, `created_at`, `updated_at`) VALUES
(26, 11, 1, '1', 22000, 22000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_regions`
--

CREATE TABLE IF NOT EXISTS `order_delivery_regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) DEFAULT NULL,
  `transport_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `pricetotal` double NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `school_id`, `product_id`, `qty`, `price`, `pricetotal`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, '4', 35000, 140000, '2025-02-07', 'February 2025', '2025', 'Order Pending', '2025-02-07 08:20:45', NULL),
(2, 1, 9, 1, '5', 22000, 110000, '2025-02-07', 'February 2025', '2025', 'Order Pending', '2025-02-07 08:20:45', NULL),
(3, 2, 11, 4, '2', 150000, 300000, '2025-02-08', 'February 2025', '2025', 'Order Delivered', '2025-02-08 10:04:56', '2025-02-12 10:56:34'),
(4, 2, 11, 3, '2', 45000, 90000, '2025-02-08', 'February 2025', '2025', 'Order Delivered', '2025-02-08 10:04:56', '2025-02-12 10:56:34'),
(7, 4, 11, 4, '1', 150000, 150000, '2025-04-30', 'April 2025', '2025', 'Order Pending', '2025-04-30 09:24:28', NULL),
(14, 8, 11, 1, '10', 22000, 220000, '2025-06-19', 'June 2025', '2025', 'Out for Delivery', '2025-06-19 07:05:10', '2025-06-19 08:16:09'),
(15, 8, 11, 5, '10', 5500, 55000, '2025-06-19', 'June 2025', '2025', 'Out for Delivery', '2025-06-19 07:05:10', '2025-06-19 08:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_payments`
--

CREATE TABLE IF NOT EXISTS `order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payer_number` varchar(255) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_payments_trackings`
--

CREATE TABLE IF NOT EXISTS `order_payments_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `payment_amount` double DEFAULT NULL,
  `order_amount_balance` double DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_payments_trackings`
--

INSERT INTO `order_payments_trackings` (`id`, `order_id`, `school_id`, `payment_amount`, `order_amount_balance`, `payment_type`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 200000, 50000, 'Mobile Money', '2025-02-10', 'February 2025', '2025', '2025-02-10 16:23:12', '2025-02-10 16:23:12'),
(3, 1, 9, 50000, 0, 'Cash', '2025-02-10', 'February 2025', '2025', '2025-02-10 16:48:50', '2025-02-10 16:48:50'),
(7, 3, 11, 400000, 80000, 'Mobile Money', '2025-02-11', 'February 2025', '2025', '2025-02-11 14:04:34', '2025-02-11 14:04:34'),
(8, 3, 11, 80000, 0, 'Cash', '2025-02-11', 'February 2025', '2025', '2025-02-11 15:50:25', '2025-02-11 15:50:25'),
(13, 8, 11, 200000, 75000, 'Mobile Money', '2025-06-19', 'June 2025', '2025', '2025-06-19 08:06:20', '2025-06-19 08:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('funziwallet@gmail.com', '$2y$12$G3JdgFh60oo9lSkXb7zVIuzK2Ky9bUbNprVO5IHL.nrnwwVe88XEK', '2025-01-14 18:12:59'),
('keynesnoah00@gmail.com', '$2y$12$TPEv432lew/n7WxR.YyUzuWQwdkIE8wwIyHD9Plf8SIVuJY4pcH4S', '2025-01-09 12:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-admin-users', 'admin', '2023-06-03 07:08:58', '2023-06-03 07:08:58'),
(2, 'create-admin-user', 'admin', '2023-06-03 07:19:20', '2023-06-03 07:19:20'),
(3, 'edit-admin-user', 'admin', '2023-06-03 07:19:53', '2023-06-03 07:19:53'),
(4, 'view-schools', 'admin', '2023-06-03 07:20:13', '2023-06-03 07:20:13'),
(5, 'create-school', 'admin', '2023-06-03 07:20:26', '2023-06-03 07:20:26'),
(6, 'edit-school', 'admin', '2023-06-03 07:21:22', '2023-06-03 07:21:22'),
(7, 'money-transactions', 'admin', '2023-06-03 07:21:51', '2024-01-20 10:53:30'),
(8, 'role-list', 'admin', '2023-06-03 07:22:09', '2023-06-03 07:25:35'),
(9, 'role-create', 'admin', '2023-06-03 07:22:20', '2023-06-03 07:26:28'),
(10, 'role-edit', 'admin', '2023-06-03 07:22:29', '2023-06-03 07:26:53'),
(11, 'permit-list', 'admin', '2023-06-03 07:23:33', '2023-06-03 07:23:33'),
(12, 'permit-create', 'admin', '2023-06-03 07:23:55', '2023-06-03 07:23:55'),
(13, 'permit-edit', 'admin', '2023-06-03 07:24:22', '2023-06-03 07:24:22'),
(14, 'permit-delete', 'admin', '2023-06-03 07:24:37', '2023-06-03 07:24:37'),
(15, 'role-delete', 'admin', '2023-06-03 07:27:20', '2023-06-03 07:27:20'),
(17, 'school-orders-view', 'admin', '2024-01-20 10:52:46', '2024-01-20 10:52:46'),
(18, 'school-orders-details', 'admin', '2024-01-20 10:53:05', '2024-01-20 10:53:05'),
(19, 'money-transactions-reports', 'admin', '2024-01-20 10:54:06', '2024-01-20 10:54:06'),
(20, 'school-orders-reports', 'admin', '2024-01-20 10:55:10', '2024-01-20 10:55:10'),
(21, 'money-transactions-school-transfers', 'admin', '2024-01-20 10:56:22', '2024-01-20 10:56:22'),
(22, 'ecommerce-products-create', 'admin', '2024-01-20 11:17:53', '2024-01-20 11:17:53'),
(23, 'ecommerce-products-edit', 'admin', '2024-01-20 11:18:05', '2024-01-20 11:18:05'),
(24, 'ecommerce-category-create', 'admin', '2024-01-20 11:18:28', '2024-01-20 11:18:28'),
(25, 'ecommerce-category-edit', 'admin', '2024-01-20 11:18:43', '2024-01-20 11:18:43'),
(26, 'create-school-class', 'admin', '2024-02-05 09:54:59', '2024-02-05 09:54:59'),
(27, 'edit-school-class', 'admin', '2024-02-05 09:55:18', '2024-02-05 09:55:18'),
(28, 'create-school-term', 'admin', '2024-02-05 09:55:50', '2024-02-05 09:55:50'),
(29, 'edit-school-term', 'admin', '2024-02-05 09:56:08', '2024-02-05 09:56:08'),
(30, 'tour-destinations', 'admin', '2024-08-14 05:41:35', '2024-08-14 05:41:35'),
(31, 'school-tours-operate', 'admin', '2024-09-03 06:55:20', '2024-09-03 06:55:20'),
(32, 'taxi-bus-view', 'admin', '2024-12-14 09:54:23', '2024-12-14 09:54:23'),
(33, 'taxi-bus-create', 'admin', '2024-12-14 09:56:53', '2024-12-14 09:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pocketmoney_sents`
--

CREATE TABLE IF NOT EXISTS `pocketmoney_sents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transfer_invoice` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `amount_sent` double DEFAULT NULL,
  `transfer_date` varchar(255) DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `previousyear_balances`
--

CREATE TABLE IF NOT EXISTS `previousyear_balances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `balance_fees_amount` double DEFAULT NULL,
  `student_class` varchar(255) DEFAULT NULL,
  `student_day_boarding` varchar(255) DEFAULT NULL,
  `previous_year` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `short_descp_en` varchar(255) DEFAULT NULL,
  `product_thambnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `selling_price`, `short_descp_en`, `product_thambnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Picfare, Ruled paper 500', '22000', 'Picfare, Ruled paper 500 Single Sheet 1 ream', '1822041493586523.jpg', '2023-11-27 12:56:59', '2025-01-23 09:09:36'),
(2, 1, 'Rotatrim, Ream Papers', '35000', 'Rotatrim, Ream Papers White 500', '1822041576617470.jpg', '2023-11-27 14:13:09', '2025-01-23 09:10:55'),
(3, 2, 'Sony FX 3 Camera', '45000', 'Color-Grading Camera', '1822041633747931.jpg', '2024-01-15 08:37:49', '2025-01-23 09:11:49'),
(4, 2, 'LapTop', '150000', 'Student Laptop for Studying Purpose And Research', '1822041154246002.jpg', '2024-01-15 08:40:08', '2025-01-23 09:04:15'),
(5, 3, 'Black Counter Books', '5500', 'Ruled Black Counter Books', '1835209414841806.jpg', '2025-06-17 17:28:07', '2025-06-17 17:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_categories`
--

CREATE TABLE IF NOT EXISTS `purchase_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_categories`
--

INSERT INTO `purchase_categories` (`id`, `school_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 9, 'FURNITURE', '2024-05-02 16:46:31', '2024-05-02 16:55:37'),
(2, 9, 'KITCHEN', '2024-05-03 07:57:09', '2024-05-03 07:57:09'),
(3, 9, 'LIBRARY', '2024-05-03 07:57:39', '2024-05-03 10:01:03'),
(4, 9, 'MECIAL', '2024-05-03 07:57:55', '2024-05-03 07:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE IF NOT EXISTS `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `school_id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'DINNING TABLES', '2024-05-03 07:56:57', '2024-05-04 08:48:58'),
(2, 9, 3, 'Primary Mathematical Book Vol. 2', '2024-05-04 07:34:18', '2024-05-04 07:34:18'),
(3, 9, 1, 'Classroom Desks', '2024-05-04 07:34:45', '2024-05-04 07:34:45'),
(4, 9, 4, 'CottonWool', '2024-05-04 07:35:09', '2024-05-18 09:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stocks`
--

CREATE TABLE IF NOT EXISTS `purchase_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `item_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_stocks`
--

INSERT INTO `purchase_stocks` (`id`, `school_id`, `date`, `month`, `year`, `term_id`, `purchase_id`, `item_qty`, `unit_price`, `total_price`, `invoice_no`, `supplier`, `notes`, `created_at`, `updated_at`) VALUES
(1, 9, '2024-05-04', 'May 2024', '2024', 1, 1, 5, 140000, 700000, '1234', 'Akilibit Co.LTD', 'Bought 5 Tables From Akilibit', '2024-05-04 09:44:28', '2024-05-04 17:07:46'),
(2, 9, '2024-05-04', 'May 2024', '2024', 2, 1, 10, 140000, 1400000, '23444', 'Akilibit Co.LTD', 'Bought 10 Tables From Akilibit', '2024-05-04 13:19:55', '2024-05-04 13:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `rental_bookings_payments`
--

CREATE TABLE IF NOT EXISTS `rental_bookings_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payer_number` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_bookings_payments`
--

INSERT INTO `rental_bookings_payments` (`id`, `booking_id`, `school_id`, `amount`, `payment_date`, `sent_time`, `currency`, `reference_id`, `externalId`, `payer_number`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 450000, '2025-01-03', '09:35:25', 'EUR', '746340a5-db00-40ee-b438-579b1f4b4d9f', '6959240', '0779913330', 'January 2025', '2025', 'SUCCESSFUL', '2025-01-03 06:35:25', '2025-01-03 06:35:25'),
(2, 2, 11, 810000, '2025-01-03', '12:50:23', 'EUR', '5dd979ae-769b-4956-ba4a-c170acb6f199', '4531818', '0779913331', 'January 2025', '2025', 'SUCCESSFUL', '2025-01-03 09:50:23', '2025-01-03 09:50:23'),
(3, 3, 11, 450000, '2025-01-24', '13:29:59', 'EUR', 'be4bb7b0-a9ba-4f2c-8497-92524ad2e063', '8332995', '0779913330', 'January 2025', '2025', 'SUCCESSFUL', '2025-01-24 10:29:59', '2025-01-24 10:29:59'),
(4, 4, 11, 300000, '2025-01-30', '12:52:27', 'EUR', 'e4f421f3-c12a-413b-b61b-66c7bc16b1f2', '8576679', '0779913330', 'January 2025', '2025', 'SUCCESSFUL', '2025-01-30 09:52:27', '2025-01-30 09:52:27'),
(5, 5, 11, 300000, '2025-02-05', '09:59:08', 'EUR', 'a187e429-5ed2-4c32-8d4a-44c77503e34e', '889774', '0779913330', 'February 2025', '2025', 'SUCCESSFUL', '2025-02-05 06:59:08', '2025-02-05 06:59:08'),
(6, 6, 11, 300000, '2025-06-22', '21:13:20', 'EUR', 'd20cc894-16f2-4e6e-b9a3-6f6da9b705ff', '6156450', '0775756467', 'June 2025', '2025', 'SUCCESSFUL', '2025-06-22 18:13:20', '2025-06-22 18:13:20'),
(7, 7, 11, 880000, '2025-06-22', '21:23:17', 'EUR', 'c682bdc6-e90e-4399-bbc5-2c791a9d823a', '2101876', '0775756467', 'June 2025', '2025', 'SUCCESSFUL', '2025-06-22 18:23:17', '2025-06-22 18:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `rental_operators`
--

CREATE TABLE IF NOT EXISTS `rental_operators` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rental_operators_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_operators`
--

INSERT INTO `rental_operators` (`id`, `name`, `email`, `telephone`, `telephone2`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ROBLYN COASTERS', 'rbCoasters@gmail.com', '0779913330', '0755424242', 'Gulu, Uganda', 1, '2024-12-18 16:02:26', '2024-12-21 10:13:23'),
(2, 'Mash Poa Coasters', 'mashpaocoasters@gmail.com', '0708 62641', '0778 62647', 'Rubaga road, Kimera Rd, Kampala, Uganda', 1, '2024-12-18 16:11:35', '2024-12-21 10:14:38'),
(3, 'YY Coasters', 'yycosters@gmail.com', '+256 776 8880', '+256 776 8890', 'Namayiba Bus Park, Martin Rd, Kampala, Uganda', 1, '2024-12-21 10:11:39', '2024-12-21 10:11:39'),
(4, 'Falcon Coasters', 'falconcoasters@gmail.com', '+256 708 6962', '+256 708 6990', 'Kampala, Uganda', 1, '2024-12-21 10:17:55', '2025-06-21 07:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'admin', '2023-06-03 07:59:20', '2023-09-13 07:02:35'),
(2, 'Semi-Admin', 'admin', '2023-06-03 08:16:33', '2023-06-03 08:16:33'),
(4, 'Operation-Manager', 'admin', '2023-09-12 16:26:58', '2023-09-12 16:26:58'),
(6, 'Assisstant-Manager', 'admin', '2023-11-23 16:37:27', '2023-11-23 16:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolevents`
--

CREATE TABLE IF NOT EXISTS `schoolevents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_date_start` date DEFAULT NULL,
  `event_date_end` date DEFAULT NULL,
  `event_time_start` time DEFAULT NULL,
  `event_time_end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schoolfees_sents`
--

CREATE TABLE IF NOT EXISTS `schoolfees_sents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transfer_invoice` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `amount_sent` double DEFAULT NULL,
  `transfer_date` varchar(255) DEFAULT NULL,
  `sent_date` date DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolfees_sents`
--

INSERT INTO `schoolfees_sents` (`id`, `transfer_invoice`, `sender_id`, `school_id`, `amount_sent`, `transfer_date`, `sent_date`, `sent_time`, `created_at`, `updated_at`) VALUES
(1, 10000000, 1, '08', 1550000, '2024-03-26', '2024-03-26', '17:03:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schoolorders_payments_records`
--

CREATE TABLE IF NOT EXISTS `schoolorders_payments_records` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolorders_payments_records`
--

INSERT INTO `schoolorders_payments_records` (`id`, `order_id`, `school_id`, `amount`, `total_amount`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 390000, 390000, 'February 2025', '2025', '2025-02-08 10:04:56', '2025-02-08 10:04:56'),
(5, 1, 9, 250000, 250000, 'February 2025', '2025', '2025-02-10 16:23:12', '2025-02-10 16:48:50'),
(8, 4, 11, 0, 150000, 'April 2025', '2025', '2025-04-30 09:24:28', '2025-04-30 09:24:28'),
(9, 8, 11, 200000, 275000, 'June 2025', '2025', '2025-06-19 07:05:10', '2025-06-19 08:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `schoolsfees_amounts`
--

CREATE TABLE IF NOT EXISTS `schoolsfees_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rand_no` varchar(255) NOT NULL,
  `school_code` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `student_class` varchar(255) NOT NULL,
  `student_day_boarding` varchar(255) NOT NULL,
  `fees_total_amount` double NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schoolsfees_amounts`
--

INSERT INTO `schoolsfees_amounts` (`id`, `rand_no`, `school_code`, `school_id`, `term_id`, `student_class`, `student_day_boarding`, `fees_total_amount`, `year`, `created_at`, `updated_at`) VALUES
(7, '5', '08', 9, 1, 'SeniorFour', 'BoardingSection', 1300000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(8, '5', '08', 9, 2, 'SeniorFour', 'BoardingSection', 1200000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(9, '5', '08', 9, 3, 'SeniorFour', 'BoardingSection', 1100000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(10, '5', '08', 9, 1, 'SeniorSix', 'BoardingSection', 1500000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(11, '5', '08', 9, 2, 'SeniorSix', 'BoardingSection', 1400000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(12, '5', '08', 9, 3, 'SeniorSix', 'BoardingSection', 1300000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(13, '5', '08', 9, 1, 'SeniorThree', 'BoardingSection', 1250000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(14, '5', '08', 9, 2, 'SeniorThree', 'BoardingSection', 1100000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(15, '5', '08', 9, 3, 'SeniorThree', 'BoardingSection', 950000, '2024', '2024-02-08 07:22:47', '2024-02-08 07:22:47'),
(22, '966800', '0011', 11, 1, 'SeniorOne', 'BoardingSection', 1250000, '2023', '2024-02-12 16:19:36', '2024-02-12 16:19:36'),
(23, '966800', '0011', 11, 2, 'SeniorOne', 'BoardingSection', 1200000, '2023', '2024-02-12 16:19:36', '2024-02-12 16:19:36'),
(24, '966800', '0011', 11, 3, 'SeniorOne', 'BoardingSection', 1000000, '2023', '2024-02-12 16:19:36', '2024-02-12 16:19:36'),
(46, '414604', '0011', 11, 1, 'SeniorOne', 'BoardingSection', 1300000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(47, '414604', '0011', 11, 2, 'SeniorOne', 'BoardingSection', 1250000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(48, '414604', '0011', 11, 3, 'SeniorOne', 'BoardingSection', 1200000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(49, '414604', '0011', 11, 1, 'SeniorTwo', 'BoardingSection', 1350000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(50, '414604', '0011', 11, 2, 'SeniorTwo', 'BoardingSection', 1300000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(51, '414604', '0011', 11, 3, 'SeniorTwo', 'BoardingSection', 1200000, '2024', '2024-02-12 17:12:09', '2024-02-12 17:12:09'),
(52, '157173', '08', 9, 1, 'SeniorTwo', 'BoardingSection', 1200000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25'),
(53, '157173', '08', 9, 2, 'SeniorTwo', 'BoardingSection', 1150000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25'),
(54, '157173', '08', 9, 3, 'SeniorTwo', 'BoardingSection', 900000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25'),
(55, '157173', '08', 9, 1, 'SeniorThree', 'BoardingSection', 1250000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25'),
(56, '157173', '08', 9, 2, 'SeniorThree', 'BoardingSection', 1100000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25'),
(57, '157173', '08', 9, 3, 'SeniorThree', 'BoardingSection', 950000, '2023', '2024-02-13 16:11:25', '2024-02-13 16:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `school_bookings`
--

CREATE TABLE IF NOT EXISTS `school_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `school_tel1` varchar(255) DEFAULT NULL,
  `school_tel2` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_tours` int(11) DEFAULT NULL,
  `booking_number` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `booking_date` varchar(255) DEFAULT NULL,
  `booking_month` varchar(255) DEFAULT NULL,
  `booking_year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_bookings`
--

INSERT INTO `school_bookings` (`id`, `school_id`, `name`, `email`, `school_tel1`, `school_tel2`, `school_address`, `total_amount`, `total_tours`, `booking_number`, `time`, `booking_date`, `booking_month`, `booking_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'Akilibit High School', 'ahs@gmail.com', '1234567894', '1122245788', 'Naalya', 7800000, 2, '83014545', '09:33:10', '2024-09-03', 'September 2024', '2024', 'Bookings Confirmed', '2024-09-03 06:33:10', '2024-09-04 06:18:48'),
(2, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 4550000, 1, '35586644', '17:31:53', '2024-11-27', 'November 2024', '2024', 'Bookings Confirmed', '2024-11-27 14:31:53', '2024-11-27 15:29:39'),
(11, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 5610000, 1, '14188211', '17:28:15', '2025-01-01', 'January 2025', '2025', 'Bookings Pending', '2025-01-01 14:28:15', NULL),
(12, 11, 'Bethany High', 'betH@gmail.com', '0775756467', '0734354495', 'Jinja-Uganda', 105000, 1, '80967454', '11:37:04', '2025-01-24', 'January 2025', '2025', 'Bookings Confirmed', '2025-01-24 08:37:04', '2025-06-07 10:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `school_fees_collections`
--

CREATE TABLE IF NOT EXISTS `school_fees_collections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payee_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_fees_collections`
--

INSERT INTO `school_fees_collections` (`id`, `student_acct_no`, `school_id`, `amount`, `payment_type`, `currency`, `reference_id`, `externalId`, `payee_number`, `status`, `sent_time`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, '7423765997', '08', 700000, 'mobilemoney', 'EUR', '6f366e2a-6fad-4517-b700-7c6cb89c776f', '582424', '12345678', 'SUCCESSFUL', '15:06:17', '2024-03-26', 'March 2024', '2024', '2024-03-26 12:06:17', '2024-03-26 12:06:17'),
(3, '7423765997', '08', 850000, 'mobilemoney', 'EUR', '668546e1-8d15-4070-beda-da529e5205c6', '81211', '12345678', 'SUCCESSFUL', '15:09:28', '2024-03-26', 'March 2024', '2024', '2024-03-26 12:09:28', '2024-03-26 12:09:28'),
(4, '323389134', '08', 650000, 'mobilemoney', 'EUR', 'c54b100a-1a3a-4537-8c3d-328d52cd4ca6', '190833', '+256764556565', 'SUCCESSFUL', '15:09:59', '2024-03-26', 'March 2024', '2024', '2024-03-26 12:09:59', '2024-03-26 12:09:59'),
(5, '549803244', '08', 950000, 'mobilemoney', 'EUR', '3d5e470d-0dba-4fdc-b5b9-8627adcf93d4', '472634', '+256764556565', 'SUCCESSFUL', '15:10:39', '2024-03-26', 'March 2024', '2024', '2024-03-26 12:10:39', '2024-03-26 12:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `school_orders_payments`
--

CREATE TABLE IF NOT EXISTS `school_orders_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payer_number` varchar(255) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_orders_payments`
--

INSERT INTO `school_orders_payments` (`id`, `order_id`, `school_id`, `amount`, `payment_date`, `currency`, `reference_id`, `externalId`, `payer_number`, `sent_time`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 390000, '2025-02-08', 'EUR', '983a6ee7-ab4b-4593-b85c-64ec27568fca', '2334762', '0779913330', '13:04:56', 'February 2025', '2025', 'SUCCESSFUL', '2025-02-08 10:04:56', '2025-02-08 10:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `school_terms`
--

CREATE TABLE IF NOT EXISTS `school_terms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_terms_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_terms`
--

INSERT INTO `school_terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Term 1', '2022-04-20 11:28:03', '2024-05-18 10:17:51'),
(2, 'Term 2', '2022-04-20 11:29:32', '2024-04-19 07:16:02'),
(3, 'Term 3', '2022-04-20 11:29:48', '2024-04-19 07:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aVaNgfgb1OzLP2Yjcdkxl4ONpkmOXXu1tS7iQDTL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkZIZk52TG1uV0pvZUt1ekJDM3ptaDd0d0ttY2ZqRFhiTXdXTHI4SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751055169),
('BvqAnHPeN7dF1tMaKxa1wGPbeLbsXHkswQxWePpv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieklkTEFtblVwRnhRamdva0JyUjNLejNHd2J2RlE1aEQ1VGUxTnMwRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751102161),
('DCRgGImQtCqapkmAvnJ9Lu0op0F3s3PTR6gpyl22', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmt3MlNFcVA3WE45YkFjOFhuZHBDMGlwZXZFdjhJeDJmc3NpTVlYRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751054031),
('DuUnURFmTyKIY6JRuAt3i8c1loBvNty7HWJkudaE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSlFpTE1hUGFpbVNTQXkyQUc4a1VqSnVsRXk1V2dleU5FS1hKMkhtZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751055251),
('jP335Mh56zvi1cgSH5h9ZeGOyL9VKwwXrOnRg8aI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWFwbnBrQ3dRcEpzOW9tZmVhbWd4NFA0UjJRRFptZWVoODRJTk5xTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751102833),
('MSDAKQpyf1GviKsVFbb9JQ715NiG8oAF5mNJRN9J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUpmckxlQ0hNRldMWlNRcEQ3dU1XUEFiZmNJdk1nNW95bWtwaDdWdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751367731),
('z22e6m4k0R70kJwtZx90OT4QS30U3isRb9hDXpWp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNldjUHhxekd1d0VUcGUzdUsxTkJxWUVRY1M1RzA5MlQzN09Mbm5PMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751367749);

-- --------------------------------------------------------

--
-- Table structure for table `studentfiles`
--

CREATE TABLE IF NOT EXISTS `studentfiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentmedicals`
--

CREATE TABLE IF NOT EXISTS `studentmedicals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `folder_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_path` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `files` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `student_NIN` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `google_token` varchar(500) DEFAULT NULL,
  `google_refresh_token` varchar(500) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `telephone`, `telephone2`, `student_NIN`, `gender`, `school_id`, `status`, `google_token`, `google_refresh_token`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'MICHAEL MUSA', 'keynesnoah00@gmail.com', NULL, '$2y$12$61DdcGCUCMtjtIRQza8Kne03WCVIAutPGl3rI4JwjEB8SPEO0n.fG', NULL, NULL, NULL, '+256778454555', '+256778454234', 'eyJpdiI6InVWSzJzd2tLRUx3OC9iL1JOemhRWlE9PSIsInZhbHVlIjoiazJVd2JEckxlbEtaWTBETHA1MU1UQT09IiwibWFjIjoiN2M0MWJlY2MyNDhiMjFlN2JlOTEyMGQ3NzMwOTk2ZTY4YWZjZWFlOTcyMzkxNDU3ZmUwYzE5MjA5MDQyMzA3MyIsInRhZyI6IiJ9', 'Male', 9, 1, NULL, NULL, NULL, NULL, 'g52Qwz3y7Jd7EYniDnaAmEkCDJgBjc2t1EFwarE3.jpg', NULL, '2025-01-06 18:33:27'),
(2, 'APOLLO KAGWA JR.', 'funziwallet@gmail.com', NULL, '$2y$12$61DdcGCUCMtjtIRQza8Kne03WCVIAutPGl3rI4JwjEB8SPEO0n.fG', NULL, NULL, NULL, '+256758799682', '+256777484575', 'eyJpdiI6IitGSTMrNWRrVnZTdVNlU29VK3RoRWc9PSIsInZhbHVlIjoiQ2Jtb1NGL21VNmhuN0pnd0tCNXZ4Zz09IiwibWFjIjoiMGY1ZjA4YmRhMTdjMmY4YzVmZmYxNTNmYjNkOGNkOWI4NTExOWNiNTE0NzA5OGFmNjlkNGU3MzcyOTM0MWJjYyIsInRhZyI6IiJ9', 'Male', 9, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-13 09:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `students_pocketmoneys`
--

CREATE TABLE IF NOT EXISTS `students_pocketmoneys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payee_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `transfer_year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students_schoolfees_records`
--

CREATE TABLE IF NOT EXISTS `students_schoolfees_records` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_acct_no` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `term_id` int(11) NOT NULL,
  `student_class` varchar(255) NOT NULL,
  `student_day_boarding` varchar(255) NOT NULL,
  `amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_schoolfees_records`
--

INSERT INTO `students_schoolfees_records` (`id`, `student_acct_no`, `school_id`, `term_id`, `student_class`, `student_day_boarding`, `amount`, `total_amount`, `invoice_no`, `year`, `created_at`, `updated_at`) VALUES
(1, '7423765997', '08', 1, 'SeniorThree', 'BoardingSection', 700000, 1250000, '3994074809', '2024', '2024-03-26 12:08:32', '2024-03-26 12:08:32'),
(2, '7423765997', '08', 2, 'SeniorThree', 'BoardingSection', 850000, 1100000, '5802803769', '2024', '2024-03-26 12:09:29', '2024-03-26 12:09:29'),
(3, '323389134', '08', 1, 'SeniorThree', 'BoardingSection', 1250000, 1250000, '8324721624', '2024', '2024-03-26 12:09:59', '2024-04-29 12:01:39'),
(4, '549803244', '08', 1, 'SeniorFour', 'BoardingSection', 950000, 1300000, '8610021921', '2024', '2024-03-26 12:10:39', '2024-03-26 12:10:39'),
(6, '412119640', '08', 1, 'SeniorSix', 'BoardingSection', 850000, 1500000, '6653420757', '2024', '2024-03-26 14:26:07', '2024-03-27 06:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tours_carts`
--

CREATE TABLE IF NOT EXISTS `tours_carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` bigint(20) DEFAULT NULL,
  `tour_package_id` bigint(20) DEFAULT NULL,
  `stud_qty` varchar(255) DEFAULT NULL,
  `stud_price` double DEFAULT NULL,
  `adult_qty` varchar(255) DEFAULT NULL,
  `adult_price` double DEFAULT NULL,
  `stud_pricetotal` double DEFAULT NULL,
  `adult_pricetotal` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours_carts`
--

INSERT INTO `tours_carts` (`id`, `school_id`, `tour_package_id`, `stud_qty`, `stud_price`, `adult_qty`, `adult_price`, `stud_pricetotal`, `adult_pricetotal`, `created_at`, `updated_at`) VALUES
(9, 11, 1, '1', 25000, '1', 30000, 25000, 30000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours_destinations`
--

CREATE TABLE IF NOT EXISTS `tours_destinations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `destination_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours_destinations`
--

INSERT INTO `tours_destinations` (`id`, `destination_name`, `created_at`, `updated_at`) VALUES
(1, 'Central Region', '2024-08-14 06:21:01', '2024-08-14 06:21:01'),
(2, 'Eastern Region', '2024-08-14 06:21:23', '2024-08-14 06:21:23'),
(3, 'Western Region', '2024-08-14 06:21:52', '2024-08-14 06:23:21'),
(4, 'Northern Region', '2024-08-14 06:22:13', '2024-08-14 06:22:13'),
(5, 'Southern Region', '2024-08-14 06:22:39', '2024-08-14 06:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `tours_packs`
--

CREATE TABLE IF NOT EXISTS `tours_packs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) NOT NULL,
  `tour_package_id` bigint(20) NOT NULL,
  `stud_qty` varchar(255) NOT NULL,
  `stud_price` double NOT NULL,
  `stud_pricetotal` double NOT NULL,
  `adult_qty` varchar(255) NOT NULL,
  `adult_price` double NOT NULL,
  `adult_pricetotal` double NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours_packs`
--

INSERT INTO `tours_packs` (`id`, `booking_id`, `school_id`, `tour_package_id`, `stud_qty`, `stud_price`, `stud_pricetotal`, `adult_qty`, `adult_price`, `adult_pricetotal`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 3, '100', 50000, 5000000, '20', 55000, 1100000, '2024-09-03', 'September 2024', '2024', 'Bookings Confirmed', '2024-09-03 06:33:10', '2025-01-03 08:07:00'),
(2, 1, 9, 1, '50', 25000, 1250000, '15', 30000, 450000, '2024-09-03', 'September 2024', '2024', 'Bookings Confirmed', '2024-09-03 06:33:10', '2025-01-03 08:07:00'),
(3, 2, 11, 3, '80', 50000, 4000000, '10', 55000, 550000, '2024-11-27', 'November 2024', '2024', 'Bookings Confirmed', '2024-11-27 14:31:53', '2024-11-27 15:29:39'),
(4, 11, 11, 2, '110', 45000, 4950000, '12', 55000, 660000, '2025-01-01', 'January 2025', '2025', 'Bookings Pending', '2025-01-01 14:28:15', NULL),
(5, 12, 11, 3, '1', 50000, 50000, '1', 55000, 55000, '2025-01-24', 'January 2025', '2025', 'Bookings Confirmed', '2025-01-24 08:37:04', '2025-06-07 10:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `tour_activities`
--

CREATE TABLE IF NOT EXISTS `tour_activities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tour_id` bigint(20) DEFAULT NULL,
  `tour_activity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_activities`
--

INSERT INTO `tour_activities` (`id`, `tour_id`, `tour_activity`, `created_at`, `updated_at`) VALUES
(5, 2, 'Swimming', '2025-06-26 14:20:25', '2025-06-26 14:20:25'),
(6, 2, 'Outdoor games', '2025-06-26 14:20:25', '2025-06-26 14:20:25'),
(7, 2, 'Camping', '2025-06-26 14:20:25', '2025-06-26 14:20:25'),
(8, 2, 'Story Telling', '2025-06-27 17:09:30', '2025-06-27 17:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `tour_operators`
--

CREATE TABLE IF NOT EXISTS `tour_operators` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tour_operators_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_operators`
--

INSERT INTO `tour_operators` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `telephone`, `telephone2`, `address`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Akilibit Tours Agency', 'akilibittours@gmail.com', NULL, '$2y$12$/S0Bmz.aDmhDIQfpD/YAAuLVi2XtTE8nErV9XfJ18SFbRrIeK7JVu', NULL, NULL, NULL, '0700112244', '0700112290', 'Kampala', 1, NULL, NULL, 'YyWxYo7GQ8MtBAnlW9ju2XwXSFGjo0v00VfPwBDi.jpg', NULL, '2024-12-02 06:16:04'),
(2, 'Funzi Tours', 'funziwallet@gmail.com', NULL, '$2y$12$6jIs70.XcsdkDgZo4e2jkeinXZfOYKtJlI.e3XMdMOH8mJV05h1qu', NULL, NULL, NULL, '0772263534', '0772263333', 'Ntinda', 1, 'IcOfApG5NpeZ4yNoZCyVF1yX1qvuXkomNlieoqoU0Ahzfei9qGWXTJjNAE56', NULL, 'JTv7nnfbPntS8Ko6UUogruWgZy0G6aFox6KcWVrh.jpg', NULL, '2025-01-14 16:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `tour_packages`
--

CREATE TABLE IF NOT EXISTS `tour_packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `students_price` double DEFAULT NULL,
  `adults_price` double DEFAULT NULL,
  `availability_start_date` varchar(255) DEFAULT NULL,
  `availability_end_date` varchar(255) DEFAULT NULL,
  `image_thambnail` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_packages`
--

INSERT INTO `tour_packages` (`id`, `name`, `destination_id`, `description`, `students_price`, `adults_price`, `availability_start_date`, `availability_end_date`, `image_thambnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Framework', 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 25000, 30000, '2024-08-23', '2024-08-30', '1808029163767125.jpg', 1, '2024-08-21 17:09:37', '2025-06-17 21:07:20'),
(2, 'Kumi Nation Park', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 45000, 55000, '2024-08-22', '2024-08-31', '1808111422845803.jpg', 1, '2024-08-22 14:57:05', '2025-06-14 17:02:05'),
(3, 'Murchison Falls National Park', 4, 'Murchison Falls National Park sits on the shore of Lake Albert, in northwest Uganda. It’s known for Murchison Falls, where the Victoria Nile River surges through a narrow gap over a massive drop.', 50000, 55000, '2024-08-23', '2024-08-31', '1808175387314101.jpg', 1, '2024-08-23 07:53:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_package_images`
--

CREATE TABLE IF NOT EXISTS `tour_package_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tour_package_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_package_images`
--

INSERT INTO `tour_package_images` (`id`, `tour_package_id`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, '1808099392440160.jpg', NULL, '2024-08-22 11:45:52'),
(2, 1, '1808029164092095.jpg', NULL, NULL),
(3, 1, '1808029164093753.jpg', NULL, NULL),
(4, 2, '1808111423384613.jpg', '2024-08-22 14:57:05', NULL),
(5, 2, '1808111423386913.jpg', '2024-08-22 14:57:05', NULL),
(6, 2, '1808111423388543.jpg', '2024-08-22 14:57:05', NULL),
(8, 3, '1808175390575027.jpg', '2024-08-23 07:53:49', NULL),
(9, 3, '1808175390577641.jpg', '2024-08-23 07:53:49', NULL),
(10, 3, '1808175390579129.jpeg', '2024-08-23 07:53:49', NULL),
(11, 3, '1808175390580640.jpg', '2024-08-23 07:53:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_payments`
--

CREATE TABLE IF NOT EXISTS `tour_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `sent_time` time DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `externalId` varchar(255) DEFAULT NULL,
  `payer_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_payments`
--

INSERT INTO `tour_payments` (`id`, `booking_id`, `school_id`, `amount`, `payment_date`, `month`, `year`, `sent_time`, `currency`, `reference_id`, `externalId`, `payer_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 11, 5610000, '2025-01-01', 'January 2025', '2025', '17:28:15', 'EUR', 'c686ac28-a6cf-4722-98be-1d984f3521d0', '1511703', '0779913330', 'SUCCESSFUL', '2025-01-01 14:28:15', '2025-01-01 14:28:15'),
(2, 12, 11, 105000, '2025-01-24', 'January 2025', '2025', '11:37:04', 'EUR', '6bc64342-43a1-4e01-8274-1e3896122ab9', '754077', '0779913330', 'SUCCESSFUL', '2025-01-24 08:37:04', '2025-01-24 08:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `tour_reviews`
--

CREATE TABLE IF NOT EXISTS `tour_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `rating` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tour_reviews_tour_id_foreign` (`tour_id`),
  KEY `tour_reviews_school_id_foreign` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_reviews`
--

INSERT INTO `tour_reviews` (`id`, `tour_id`, `school_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 'Very Lovely Tour Package', '2', '1', '2024-11-23 12:25:19', '2024-11-23 13:20:53'),
(2, 1, 11, 'Very Good Tour Package', '3', '1', '2024-11-25 07:02:47', '2024-11-25 07:12:19'),
(3, 3, 11, 'Fair Tour Package, Could Improve The transportation', '1', '1', '2024-11-25 07:05:19', '2024-11-25 07:12:53'),
(4, 2, 11, 'Great Tour Experience', '4', '1', '2025-06-26 10:09:47', '2025-06-26 10:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE IF NOT EXISTS `transport_routes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rental_operator_id` int(11) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `route_price` varchar(255) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_routes`
--

INSERT INTO `transport_routes` (`id`, `rental_operator_id`, `route_name`, `route_price`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kampala-Jinja', '20000', 2, '2024-12-20 09:31:41', '2024-12-20 09:31:41'),
(2, 1, 'Kampala-Masaka', '35000', 1, '2024-12-20 09:31:41', '2024-12-20 10:51:22'),
(4, 1, 'Kampala-Mbarara', '40000', 3, '2024-12-20 10:53:32', '2024-12-20 10:53:32'),
(5, 2, 'Kampala-Jinja', '15000', 2, '2024-12-21 09:24:04', '2024-12-21 09:24:04'),
(6, 2, 'Kampala-Mbarara', '30000', 3, '2024-12-21 09:24:04', '2024-12-21 09:24:04'),
(7, 2, 'Kampala-Masaka', '20000', 1, '2024-12-21 09:24:04', '2024-12-21 09:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `school_tel1` varchar(255) DEFAULT NULL,
  `school_tel2` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `school_type` varchar(255) DEFAULT NULL,
  `school_id_no` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `school_tel1`, `school_tel2`, `address`, `school_type`, `school_id_no`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(9, 'Akilibit High School', 'ahs@gmail.com', NULL, '$2y$12$03pTxLpKNLPWkrMbelTQteMprjWseQrYNBnlHvHryhTBsMhuogwXK', NULL, NULL, NULL, '1234567894', '1122245788', 'Naalya', 'Secondary', '08', 0, '9wR0lbNz6xBQd7l7440SgXRU8BzAWEbzFRmJh54anASkfQoYbuuN32JHTcOY', NULL, '202311241422logo_schools.jpg', '2023-09-09 17:22:22', '2025-06-14 11:54:00'),
(11, 'Bethany High', 'betH@gmail.com', NULL, '$2y$12$R.CVarNF5dRs7/RRng3mPeAxgksQuMOP7RBJBeWK8z66B2ELrUQya', NULL, NULL, NULL, '0775756467', '0734354495', 'Jinja-Uganda', 'Secondary', '0011', 1, 'hTxwDpEXdYZqMzZiseiYoRibpzNofnOYc0HxoXrx1dlLnldlfAv4P2IbnTTz', NULL, 'iG9TjyZfbbymWmQQ0YB9rmdZNM7KVaNp3vvrjnBB.jpg.jpg', '2023-09-14 14:55:47', '2024-05-20 12:56:13'),
(16, 'Nokia High School', 'keynesnoah00@gmail.com', NULL, '$2y$15$h5HfnaCSyJ.aBgkKTH7aK.ZjvrMkhO/iw9hmBaipCvdhrOBInQjui', NULL, NULL, NULL, '1234567890', '1112224447', 'Kampala', 'Secondary', '0016', 1, NULL, NULL, NULL, '2023-11-17 10:13:37', '2024-05-21 07:59:22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_reviews`
--
ALTER TABLE `tour_reviews`
  ADD CONSTRAINT `tour_reviews_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tour_reviews_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tour_packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
