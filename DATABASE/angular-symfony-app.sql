-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2020 at 04:45 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angular-symfony-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181208160542');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name_` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qte_` int(11) NOT NULL,
  `product_description_` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_` double NOT NULL,
  `product_purchase_number_` int(11) NOT NULL,
  `product_img_src_` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_created_at_` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name_`, `product_qte_`, `product_description_`, `product_price_`, `product_purchase_number_`, `product_img_src_`, `product_created_at_`) VALUES
(6, 'Produit 4', 23, 'Laboris elit et non irure ea ad ad culpa sint eu voluptate sit irure Lorem.', 31000, 25, '../assets/images/3.jpg', ''),
(11, 'jeu voiture bmw', 2, 'Laboris elit et non irure ea ad ad culpa sint eu voluptate sit irure Lorem.', 260, 0, '../assets/images/1.jpg', ''),
(12, 'Marker Animations', 1, 'marker marker marker marker ', 20, 0, '', 'Tue Jan 08 2019 11:12:00 GMT+0100 (heure normale d’Europe centrale)'),
(13, 'Sample title', 1, 'azeryuipouu', 30, 0, '../assets/images/1.jpg', 'Tue Jan 08 2019 15:22:40 GMT+0100 (heure normale d’Europe centrale)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
