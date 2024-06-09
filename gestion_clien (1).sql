-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2024 at 09:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_clien`
--

-- --------------------------------------------------------

--
-- Table structure for table `clien`
--

DROP TABLE IF EXISTS `clien`;
CREATE TABLE IF NOT EXISTS `clien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clien`
--

INSERT INTO `clien` (`id`, `nom`, `prenom`, `tel`) VALUES
(4, 'oussame', 'med', '42407530'),
(2, 'med', 'moktar', '20590302'),
(3, 'sidaty', 'sidi', '41888861'),
(5, 'bouh', 'sidi', '41888861'),
(6, 'med', 'sidi', '41888861'),
(7, 'beymin', 'med', '36601809'),
(8, 'bobs', 'abmed', '49051829'),
(9, 'cheikh', 'hamadi', '41909048'),
(10, 'mohamed', 'med', '36601809'),
(11, 'vadl', 'heydoud', '33478915'),
(13, 'lalla', 'Ahmed', '43034303');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(190) NOT NULL,
  `nom_clien` varchar(100) NOT NULL,
  `Date_c` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_total` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id`, `numero`, `nom_clien`, `Date_c`, `price_total`) VALUES
(10, 'CMD20240517170955742', 'med moktar', '2024-05-17 20:10:37', 1200),
(11, 'CMD20240517172519951', 'sidaty sidi', '2024-05-17 20:25:45', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(190) NOT NULL,
  `pass_word` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass_word`) VALUES
('medmoctar239@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantite` varchar(100) NOT NULL,
  `images` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nom`, `price`, `quantite`, `images`) VALUES
(1, 'chemise', '1000 ', '75', 'controller/images/164f0a656f4bfb908064f9e9347ae046baner-right-image-02.jpg'),
(2, 'pants', '500 ', '91', 'controller/images/8eb4c67cc7d4ca833bdb61fc5c8245cesaving-img.png'),
(4, 'shoes', '100 ', '40', 'controller/images/d627f91cfb2d2d755e2d13ec8359b768men-01_BtEXwoT.jpg'),
(5, 'tea-shirt', '2000', '79', 'controller/images/6216b325406ea2273b94cf6c02564762men-02_WjZGzOo.jpg'),
(6, 'phone', '2000', '70', 'controller/images/e2e4ba3a63841faaf5a188b7c7bdb068p5.png'),
(14, 'bag', '4000', '50', 'controller/images/24d8ceb858fa58afdc6705dd086f8892instagram-02.jpg'),
(15, 'bag', '4000', '50', 'controller/images/24d8ceb858fa58afdc6705dd086f8892instagram-02.jpg'),
(17, 'benans', '500 ', '40', 'controller/images/7d0510056ea4d6396b2bddeb160a0839instagram-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `result_order`
--

DROP TABLE IF EXISTS `result_order`;
CREATE TABLE IF NOT EXISTS `result_order` (
  `id` int NOT NULL,
  `product` varchar(100) NOT NULL,
  `United_Price` int NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `Rising` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result_order`
--

INSERT INTO `result_order` (`id`, `product`, `United_Price`, `Quantity`, `Rising`) VALUES
(11, 'pants', 500, '2', 1000),
(10, 'pants', 500, '2', 1000),
(10, 'shoes', 100, '2', 200),
(11, 'tea-shirt', 2000, '2', 4000),
(12, 'pants', 500, '3', 1500),
(12, 'shoes', 100, '2', 200),
(19, 'tea-shirt', 2000, '2', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int NOT NULL,
  `numero` varchar(190) NOT NULL,
  `nom_clien` varchar(100) NOT NULL,
  `Date_c` datetime NOT NULL,
  `price_total` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id`, `numero`, `nom_clien`, `Date_c`, `price_total`) VALUES
(4, 'CMD2024051323562889', 'fatim', '2024-05-13 20:16:20', 100),
(2, 'CMD2024051323562889', 'med', '0000-00-00 00:00:00', 1000),
(3, 'CMD2024051323562889', 'moktar', '2024-05-13 01:14:01', 100),
(13, '', 'Custumer', '2024-05-18 02:16:20', 4200),
(14, 'CMD20240518103213263', 'Custumer', '2024-05-18 13:32:52', 2300),
(15, 'CMD20240519195333651', 'Custumer', '2024-05-19 22:54:43', 3200),
(16, 'CMD20240521091102706', 'beymin med', '2024-05-21 12:11:34', 2200),
(17, 'CMD20240522184725627', 'vadl heydoud', '2024-05-22 21:48:02', 8000),
(18, 'CMD20240605174754577', 'Custumer', '2024-06-05 20:48:55', 13500),
(20, 'CMD20240606180459487', 'vadl heydoud', '2024-06-06 21:05:09', 3000),
(21, 'CMD20240606182747439', 'oussame med', '2024-06-06 21:28:11', 14000),
(22, 'CMD20240606193729522', 'med moktar', '2024-06-06 22:38:04', 6000),
(23, 'CMD20240607192913583', 'lalla Ahmed', '2024-06-07 22:30:03', 27000);

-- --------------------------------------------------------

--
-- Table structure for table `vente_order`
--

DROP TABLE IF EXISTS `vente_order`;
CREATE TABLE IF NOT EXISTS `vente_order` (
  `id` int NOT NULL,
  `product` varchar(100) NOT NULL,
  `United_Price` int NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `Rising` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vente_order`
--

INSERT INTO `vente_order` (`id`, `product`, `United_Price`, `Quantity`, `Rising`) VALUES
(12, 'pants', 500, '3', 1500),
(12, 'shoes', 100, '2', 200),
(13, 'shoes', 100, '2', 200),
(13, 'tea-shirt', 2000, '2', 4000),
(14, 'shoes', 100, '3', 300),
(14, 'chemise', 1000, '2', 2000),
(15, 'shoes', 100, '2', 200),
(15, 'chemise', 1000, '3', 3000),
(16, 'shoes', 100, '2', 200),
(16, 'chemise', 1000, '2', 2000),
(17, 'chemise', 1000, '2', 2000),
(17, 'phone', 2000, '3', 6000),
(18, 'tea-shirt', 2000, '4', 8000),
(18, 'chemise', 1000, '3', 3000),
(18, 'pants', 500, '5', 2500),
(20, 'chemise', 1000, '3', 3000),
(21, 'pants', 500, '4', 2000),
(21, 'chemise', 1000, '2', 2000),
(21, 'tea-shirt', 2000, '5', 10000),
(22, 'benans', 500, '4', 2000),
(22, 'chemise', 1000, '4', 4000),
(23, 'chemise', 1000, '3', 3000),
(23, 'pc', 12000, '2', 24000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
