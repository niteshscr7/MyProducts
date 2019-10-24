-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2019 at 08:40 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `SKU` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `SIZE` varchar(10) DEFAULT NULL,
  `WEIGHT` varchar(10) DEFAULT NULL,
  `HEIGHT` varchar(10) DEFAULT NULL,
  `WIDTH` varchar(10) DEFAULT NULL,
  `LENGTH` varchar(10) DEFAULT NULL,
  `TYPE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SKU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`SKU`, `NAME`, `PRICE`, `SIZE`, `WEIGHT`, `HEIGHT`, `WIDTH`, `LENGTH`, `TYPE`) VALUES
('JVC200123', 'Acme DISC', '100 $', '700 MB', NULL, NULL, '', NULL, 'DVD-DISC'),
('GGWP0007', 'War and Peace', '2000 $', '', '2 KG', NULL, '', NULL, 'BOOK'),
('TR120555', 'Chair', '4000 $', NULL, NULL, '24', '45', '15', 'FURNITURE'),
('TRY454875', 'Book', '200 rs', NULL, '12 kg', NULL, NULL, NULL, NULL),
('RRT467734838', 'Disc', '200 $', '10 Kb ', NULL, NULL, NULL, NULL, NULL),
('ITEM467768', 'Furniture', '100 rs', NULL, NULL, '10', '20', '10', NULL),
('IKU38897', 'Arihant', '700 rs', NULL, '1 kg', NULL, NULL, NULL, NULL),
('DESK88662', 'Chair', '800 rs', NULL, NULL, '10', '15.8', '20', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
