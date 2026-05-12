-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2026 at 05:31 AM
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
-- Table structure for table `school_blocks`
--

DROP TABLE IF EXISTS `school_blocks`;
CREATE TABLE IF NOT EXISTS `school_blocks` (
  `block_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_page_id` smallint UNSIGNED NOT NULL,
  `block_html_tag` tinyint UNSIGNED NOT NULL,
  `block_class` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `block_content` varchar(4096) COLLATE utf8mb4_general_ci NOT NULL,
  `block_position` int UNSIGNED NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_pages`
--

DROP TABLE IF EXISTS `school_pages`;
CREATE TABLE IF NOT EXISTS `school_pages` (
  `page_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `page_parent` smallint UNSIGNED NOT NULL,
  `page_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `page_slug` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `page_created` datetime NOT NULL,
  `page_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_pages`
--

INSERT INTO `school_pages` (`page_id`, `page_parent`, `page_name`, `page_slug`, `page_created`, `page_updated`) VALUES
(1, 2, 'sdfsdf', '', '2026-05-10 06:08:14', '2026-05-10 08:08:14'),
(2, 2, 'sdqsdqd', '', '2026-05-10 06:09:58', '2026-05-10 08:09:58'),
(3, 2, 'sdfdsfs', '', '2026-05-10 06:10:25', '2026-05-10 08:10:25'),
(4, 2, 'Yet Another Test', 'yet-another-test', '2026-05-11 13:30:13', '2026-05-11 15:30:13'),
(5, 2, 'More Testing', 'more-testing', '2026-05-11 15:41:56', '2026-05-11 17:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `school_page_categories`
--

DROP TABLE IF EXISTS `school_page_categories`;
CREATE TABLE IF NOT EXISTS `school_page_categories` (
  `cat_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `cat_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_page_categories`
--

INSERT INTO `school_page_categories` (`cat_id`, `cat_title`, `cat_active`) VALUES
(1, 'Tenses', 1),
(3, 'ThemeTest', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_page_subcats`
--

INSERT INTO `school_page_subcats` (`subcat_id`, `subcat_parent`, `subcat_name`, `subcat_active`) VALUES
(1, 1, 'Past', 1),
(2, 3, 'A Sub Test', 1),
(6, 1, 'Present', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_tags`
--

DROP TABLE IF EXISTS `school_tags`;
CREATE TABLE IF NOT EXISTS `school_tags` (
  `tag_id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tag_no_close` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_tags`
--

INSERT INTO `school_tags` (`tag_id`, `tag_name`, `tag_no_close`) VALUES
(1, 'h1', 0),
(2, 'img', 1),
(3, 'h2', 0),
(4, 'p', 0),
(5, 'h3', 0),
(6, 'h4', 0),
(7, 'h5', 0),
(8, 'h6', 0),
(9, 'span', 0);

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
