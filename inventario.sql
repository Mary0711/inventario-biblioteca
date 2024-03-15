-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventario
DROP DATABASE IF EXISTS `inventario`;
CREATE DATABASE IF NOT EXISTS `inventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `inventario`;

-- Dumping structure for table inventario.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.categories: ~0 rows (approximately)
DELETE FROM `categories`;

-- Dumping structure for table inventario.discontinued
DROP TABLE IF EXISTS `discontinued`;
CREATE TABLE IF NOT EXISTS `discontinued` (
  `property` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` int(11) NOT NULL,
  KEY `user-dis` (`user`),
  CONSTRAINT `user-dis` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.discontinued: ~0 rows (approximately)
DELETE FROM `discontinued`;

-- Dumping structure for table inventario.object
DROP TABLE IF EXISTS `object`;
CREATE TABLE IF NOT EXISTS `object` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `serial_num` varchar(255) NOT NULL,
  `property_num` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`serial_num`,`property_num`) USING BTREE,
  KEY `owner` (`owner`),
  CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.object: ~0 rows (approximately)
DELETE FROM `object`;

-- Dumping structure for table inventario.object_log
DROP TABLE IF EXISTS `object_log`;
CREATE TABLE IF NOT EXISTS `object_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `task` varchar(150) NOT NULL,
  `object` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user-objetc` (`user_id`),
  KEY `obect_serial` (`object`),
  CONSTRAINT `obect_serial` FOREIGN KEY (`object`) REFERENCES `object` (`serial_num`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user-objetc` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.object_log: ~0 rows (approximately)
DELETE FROM `object_log`;

-- Dumping structure for table inventario.subcategories
DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sub-cat` (`category`),
  CONSTRAINT `sub-cat` FOREIGN KEY (`category`) REFERENCES `categories` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.subcategories: ~0 rows (approximately)
DELETE FROM `subcategories`;

-- Dumping structure for table inventario.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `status`, `role`) VALUES
	(14, 'Jean C Serrano Cruz', 'jean.serrano7@upr.edu', '$2y$10$TDF5mc.tGX8EDSKGVX/yRuo8tns7e0ITPJad.DTjQlHcVIfowaFkK', 1, 'admin'),
	(15, 'Juan del Pueblo', 'juan.pueblo@upr.edu', '$2y$10$537/7FZTfcJKRmKrUZBx.egPOSWVHzFbVKuWckNFz9qmzshCq6yu6', 1, 'user');

-- Dumping structure for table inventario.user_log
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `task` varchar(150) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_from` (`user_from`),
  KEY `user_to` (`user_to`),
  CONSTRAINT `user_from` FOREIGN KEY (`user_from`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_to` FOREIGN KEY (`user_to`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventario.user_log: ~0 rows (approximately)
DELETE FROM `user_log`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
