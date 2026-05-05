-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2026 at 09:14 AM
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
-- Table structure for table `school_users`
--

DROP TABLE IF EXISTS `school_users`;
CREATE TABLE IF NOT EXISTS `school_users` (
  `user_id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` json NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_users`
--

INSERT INTO `school_users` (`user_id`, `user_name`, `user_pass`, `user_role`) VALUES
(1, 'leeSchool', '$2y$12$X7SVIN3CJTON/yDsQFSR1O.cG08yUfWbUQMuxDxL3nSPXmMEjMWaC', '[\"ROLE_ADMIN\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
