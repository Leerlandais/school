-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2026 at 02:53 PM
-- Server version: 8.4.7
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_pages`
--

DROP TABLE IF EXISTS `school_pages`;
CREATE TABLE IF NOT EXISTS `school_pages` (
  `page_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `page_tag_position` int UNSIGNED NOT NULL,
  `page_tag_name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `page_tag_class` varchar(512) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `page_tag_content` varchar(2048) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
