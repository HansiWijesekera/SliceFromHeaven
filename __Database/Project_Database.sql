-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for project
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project`;

-- Dumping structure for table project.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `date` datetime DEFAULT current_timestamp(),
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `num` char(10) NOT NULL DEFAULT '',
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `number` (`number`)
) ENGINE=MyISAM AUTO_INCREMENT=45633 DEFAULT CHARSET=latin1;

-- Dumping data for table project.customer: 6 rows
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
REPLACE INTO `customer` (`date`, `number`, `num`, `name`, `address`, `type`) VALUES
	('2019-12-18 20:37:48', 3, '756696634', 'Tharushi', 'Nugegoda', 'carryout'),
	('2019-12-18 20:36:15', 2, '772471833', 'Hansi', 'Maharagama', 'dinein'),
	('2019-12-18 20:35:18', 1, '772589634', 'Nayani', 'Kahathuduwa', 'dinein'),
	('2019-12-31 11:13:08', 6, '778529634', 'chamika akila', 'maharagama', 'carryout'),
	('2019-12-29 13:23:06', 5, '774564567', 'Kalpa Viraj', 'Ambalangoda', 'carryout'),
	('2019-12-31 11:17:18', 7, '778529635', 'lakshaitha', 'panadura', 'carryout');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table project.cus_order
CREATE TABLE IF NOT EXISTS `cus_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `emp_no` int(11) DEFAULT 0,
  `price` int(11) DEFAULT 0,
  `main_item_data` longtext DEFAULT NULL,
  `extra_item_data` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

-- Dumping data for table project.cus_order: 17 rows
/*!40000 ALTER TABLE `cus_order` DISABLE KEYS */;
REPLACE INTO `cus_order` (`id`, `date`, `emp_no`, `price`, `main_item_data`, `extra_item_data`) VALUES
	(40, '2019-12-28', 1, 800, '{"name":"veg_lovers","quantity":"1","size":"large"}', '[{"name":"spice"}]'),
	(110, '2019-12-28', 1, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"medium"}', '[]'),
	(124, '2019-12-29', 1, 600, '{"name":"chicken_delight","quantity":"1","size":"medium"}', '[{"name":"chees"}]'),
	(125, '2019-12-29', 1, 2000, '{"name":"mighty_meaty","quantity":"1","size":"large"}', '[{"name":"chicken"}]'),
	(126, '2019-12-29', 1, 400, '{"name":"Hot_Veg","quantity":"1","size":"large"}', '[{"name":"spice"}]'),
	(127, '2019-12-29', 1, 2000, '{"name":"mighty_meaty","quantity":"1","size":"medium"}', '[]'),
	(129, '2019-12-29', 1, 700, '{"name":"Seafood_Hawai","quantity":"1","size":"medium"}', '[{"name":"chicken"}]'),
	(133, '2019-12-29', 1, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"large"}', '[{"name":"sause"}]'),
	(134, '2019-12-29', 1, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"medium"}', '[{"name":"spice"}]'),
	(135, '2019-12-29', 1, 2000, '{"name":"mighty_meaty","quantity":"1","size":"medium"}', '[{"name":"sause"}]'),
	(136, '2019-12-29', 1, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"medium"}', '[{"name":"spice"}]'),
	(140, '2019-12-29', 1, 700, '{"name":"Seafood_Hawai","quantity":"1","size":"medium"}', '[{"name":"chees"}]'),
	(141, '2019-12-29', 2, 700, '{"name":"Seafood_Hawai","quantity":"1","size":"large"}', '[{"name":"spice"}]'),
	(142, '2019-12-29', 2, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"medium"}', '[{"name":"spice"}]'),
	(143, '2019-12-29', 2, 1000, '{"name":"Sausage_Pizza","quantity":"1","size":"medium"}', '[{"name":"chicken"}]'),
	(144, '2019-12-31', 3, 4000, '{"name":"mighty_meaty","quantity":"2","size":"small"}', '[{"name":"chees"},{"name":"chicken"}]'),
	(145, '2019-12-31', 3, 800, '{"name":"veg_lovers","quantity":"1","size":"medium"}', '[{"name":"chees"},{"name":"spice"},{"name":"chicken"}]');
/*!40000 ALTER TABLE `cus_order` ENABLE KEYS */;

-- Dumping structure for table project.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `Empno` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `roletype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Empno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table project.employee: 3 rows
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
REPLACE INTO `employee` (`Empno`, `password`, `roletype`) VALUES
	(1, '900150983cd24fb0d6963f7d28e17f72', 'admin'),
	(2, '900150983cd24fb0d6963f7d28e17f72', 'user'),
	(3, '900150983cd24fb0d6963f7d28e17f72', 'user');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table project.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emp_no` int(11) unsigned DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `main_item_data` longtext NOT NULL,
  `extra_item_data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

-- Dumping data for table project.items: 0 rows
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table project.pizza
CREATE TABLE IF NOT EXISTS `pizza` (
  `name` varchar(50) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table project.pizza: 30 rows
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
REPLACE INTO `pizza` (`name`, `size`, `price`) VALUES
	('chees_pizza', 'small', 500),
	('chees_pizza', 'medium', 1000),
	('chees_pizza', 'large', 1500),
	('chicken_delight', 'small', 600),
	('chicken_delight', 'medium', 1200),
	('chicken_delight', 'large', 1600),
	('prown_delight', 'small', 600),
	('prown_delight', 'medium', 1200),
	('prown_delight', 'large', 1600),
	('veg_lovers', 'medium', 800),
	('veg_lovers', 'large', 1200),
	('veg_lovers', 'small', 400),
	('galic_prowns', 'small', 600),
	('galic_prowns', 'medium', 1200),
	('galic_prowns', 'large', 1800),
	('bbq_chicken', 'medium', 1200),
	('bbq_chicken', 'large', 1800),
	('bbq_chicken', 'small', 600),
	('mighty_meaty', 'large', 2000),
	('mighty_meaty', 'small', 1500),
	('mighty_meaty', 'medium', 1700),
	('Seafood_Hawai', 'small', 700),
	('Seafood_Hawai', 'medium', 1500),
	('Seafood_Hawai', 'large', 2000),
	('Hot_Veg', 'small', 400),
	('Hot_Veg', 'medium', 1100),
	('Hot_Veg', 'large', 1500),
	('Sausage_Pizza', 'medium', 1000),
	('Sausage_Pizza', 'small', 400),
	('Sausage_Pizza', 'large', 1600);
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;

-- Dumping structure for table project.toppping
CREATE TABLE IF NOT EXISTS `toppping` (
  `topping` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table project.toppping: 4 rows
/*!40000 ALTER TABLE `toppping` DISABLE KEYS */;
REPLACE INTO `toppping` (`topping`, `price`) VALUES
	('chees', 200),
	('spice', 100),
	('chicken', 200),
	('sause', 50);
/*!40000 ALTER TABLE `toppping` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
