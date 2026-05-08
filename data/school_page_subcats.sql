-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2026 at 04:55 PM
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
-- Table structure for table `school_page_subcats`
--

DROP TABLE IF EXISTS `school_page_subcats`;
CREATE TABLE IF NOT EXISTS `school_page_subcats` (
  `subcat_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcat_parent` smallint UNSIGNED NOT NULL,
  `subcat_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `subcat_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_page_subcats`
--

INSERT INTO `school_page_subcats` (`subcat_id`, `subcat_parent`, `subcat_name`, `subcat_active`) VALUES
(1, 1, 'Past', 1),
(2, 3, 'A Sub Test', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
