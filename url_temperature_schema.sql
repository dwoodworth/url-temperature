-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2016 at 07:20 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `url_temperature`
--
CREATE DATABASE IF NOT EXISTS `url_temperature` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `url_temperature`;

-- --------------------------------------------------------

--
-- Table structure for table `access_logs`
--

CREATE TABLE `access_logs` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_logs`
--

INSERT INTO `access_logs` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2016-06-28 01:24:17', '2016-06-28 01:24:17'),
(2, 1, '2016-06-28 01:25:18', '2016-06-28 01:25:18'),
(3, 2, '2016-06-28 01:28:35', '2016-06-28 01:28:35'),
(4, 2, '2016-06-28 02:33:25', '2016-06-28 02:33:25'),
(5, 2, '2016-06-28 02:33:49', '2016-06-28 02:33:49'),
(6, 1, '2016-06-28 06:47:44', '2016-06-28 06:47:44'),
(7, 1, '2016-06-28 20:25:33', '2016-06-28 20:25:33'),
(8, 1, '2016-06-29 00:52:01', '2016-06-29 00:52:01'),
(9, 1, '2016-06-29 02:04:18', '2016-06-29 02:04:18'),
(10, 1, '2016-06-29 21:38:25', '2016-06-29 21:38:25'),
(11, 3, '2016-06-29 21:40:19', '2016-06-29 21:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_27_192759_create_access_table', 2),
('2016_06_28_170017_create_cache_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `zip`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'David Woodworth', 'davidwoodworth@me.com', '$2y$10$v16Y6Hbtl5ipvRAjI1wrMuMVt9JumunxOx3lKEBCY7Lcp8JTmu2ye', '64134', 1, '5aoIqSrA9WcRhVY09S9sWOc0j4HdsU4C99rXaN3O7iyzb6TxkII0h9tz4TVR', '2016-06-27 23:47:24', '2016-06-29 21:39:12'),
(2, 'Test User 1', 'user1@test.com', '$2y$10$drDMzUtMlWqUQ42FE7GvX.4wxIhr/9OYNWG2GSqKNesU2jw5YySc.', '', 1, 'cYjP5rKyj5NLyj5c0bVrJ4I1mn3WpzpgSBC7ISsHc6WP9f338qbTcSyr17sV', '2016-06-28 01:28:35', '2016-06-28 06:46:14'),
(3, 'Test User 2', 'user2@test.com', '$2y$10$od4dI.sHbLLrdz.r0dTP0ebgPWeklwBGdGmVeUnf6kw8M4IlXnhRq', '', 1, NULL, '2016-06-29 21:40:19', '2016-06-29 21:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `weather-cache`
--

CREATE TABLE `weather-cache` (
  `id` int(10) unsigned NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `temp_f` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weather` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weather-cache`
--

INSERT INTO `weather-cache` (`id`, `zip`, `temp_f`, `icon`, `weather`, `city`, `created_at`, `updated_at`) VALUES
(1, '64106', 82, 'mostlycloudy', 'Mostly Cloudy', 'Kansas City, MO', '2016-06-29 22:06:52', '2016-06-29 22:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_logs`
--
ALTER TABLE `access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weather-cache`
--
ALTER TABLE `weather-cache`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_logs`
--
ALTER TABLE `access_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `weather-cache`
--
ALTER TABLE `weather-cache`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;  
  
GRANT USAGE ON *.* TO 'url_temperature'@'localhost' IDENTIFIED BY PASSWORD '*EE50D76EC9B503E70AA58319CBAC46A99FC8724D';

GRANT ALL PRIVILEGES ON `url_temperature`.* TO 'url_temperature'@'localhost';