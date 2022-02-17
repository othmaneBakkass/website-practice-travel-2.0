-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2022 at 11:05 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `tripId` int DEFAULT NULL,
  `tripName` text CHARACTER SET utf16 COLLATE utf16_bin,
  `tripImg` text CHARACTER SET utf16 COLLATE utf16_bin,
  `price` float DEFAULT NULL,
  `qte` int DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cartebancaire`
--

DROP TABLE IF EXISTS `cartebancaire`;
CREATE TABLE IF NOT EXISTS `cartebancaire` (
  `cardnumber` varchar(50) COLLATE utf8_bin NOT NULL,
  `holder` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `yearEx` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `monthEx` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `crypto` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cardnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `cartebancaire`
--

INSERT INTO `cartebancaire` (`cardnumber`, `holder`, `yearEx`, `monthEx`, `crypto`) VALUES
('123123123', 'user', '2025', '4', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int NOT NULL AUTO_INCREMENT,
  `cartId` int NOT NULL,
  `userId` int NOT NULL,
  `tripId` int NOT NULL,
  `tripName` text COLLATE utf16_bin NOT NULL,
  `tripImg` text COLLATE utf16_bin NOT NULL,
  `price` float NOT NULL,
  `qte` int NOT NULL,
  `total` float NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderId`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `cartId`, `userId`, `tripId`, `tripName`, `tripImg`, `price`, `qte`, `total`, `dateAdded`) VALUES
(1, 7, 1, 2, 'Cork Tour', 'trip2.jpg', 1000, 2, 2000, '2022-02-15 21:01:19'),
(2, 6, 1, 1, 'Galway Tour', 'trip1.jpg', 500, 4, 2000, '2022-02-15 21:01:19'),
(3, 7, 1, 2, 'Cork Tour', 'trip2.jpg', 1000, 2, 2000, '2022-02-15 21:01:19'),
(4, 6, 1, 1, 'Galway Tour', 'trip1.jpg', 500, 4, 2000, '2022-02-15 21:01:19'),
(5, 7, 1, 2, 'Cork Tour', 'trip2.jpg', 1000, 2, 2000, '2022-02-15 21:07:17'),
(6, 6, 1, 1, 'Galway Tour', 'trip1.jpg', 500, 4, 2000, '2022-02-15 21:07:17'),
(7, 8, 1, 1, 'Galway Tour', 'trip1.jpg', 500, 1, 500, '2022-02-15 22:07:31'),
(8, 10, 1, 2, 'Cork Tour', 'trip2.jpg', 1000, 2, 2000, '2022-02-15 22:24:05'),
(9, 11, 1, 3, 'City of Moher Tour', 'trip3.jpg', 1500, 4, 6000, '2022-02-15 22:24:05'),
(10, 13, 1, 5, 'waterford', 'trip5.jpg', 2000, 3, 6000, '2022-02-15 22:24:05'),
(11, 15, 1, 2, 'Cork Tour', 'trip2.jpg', 1000, 6, 6000, '2022-02-15 22:40:10'),
(12, 17, 5, 1, 'Galway Tour', 'trip1.jpg', 500, 2, 1000, '2022-02-17 22:48:35'),
(13, 18, 5, 2, 'Cork Tour', 'trip2.jpg', 1000, 2, 2000, '2022-02-17 22:48:35'),
(14, 19, 5, 1, 'Galway Tour', 'trip1.jpg', 500, 2, 1000, '2022-02-17 23:01:42'),
(15, 20, 5, 2, 'Cork Tour', 'trip2.jpg', 1000, 1, 1000, '2022-02-17 23:01:42'),
(16, 21, 5, 3, 'City of Moher Tour', 'trip3.jpg', 1500, 1, 1500, '2022-02-17 23:01:42'),
(17, 22, 5, 1, 'Galway Tour', 'trip1.jpg', 500, 5, 2500, '2022-02-17 23:03:50'),
(18, 23, 5, 2, 'Cork Tour', 'trip2.jpg', 1000, 3, 3000, '2022-02-17 23:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `traveluser`
--

DROP TABLE IF EXISTS `traveluser`;
CREATE TABLE IF NOT EXISTS `traveluser` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `firstName` text CHARACTER SET utf16 COLLATE utf16_bin,
  `lastName` text CHARACTER SET utf16 COLLATE utf16_bin,
  `userPassword` text CHARACTER SET utf16 COLLATE utf16_bin,
  `birth` date DEFAULT NULL,
  `email` text CHARACTER SET utf16 COLLATE utf16_bin,
  `userDate` date DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `traveluser`
--

INSERT INTO `traveluser` (`idUser`, `firstName`, `lastName`, `userPassword`, `birth`, `email`, `userDate`) VALUES
(1, 'mono', 'chrome', '1231231230', '2000-01-01', 'admin@gmail.com', '2022-02-10'),
(2, 'useruser', 'useruser', '1234567890', '2000-01-01', 'user1@gmail.com', '2022-02-10'),
(3, 'user', 'user', '1234567890', '2000-01-01', 'user2@gmail.com', '2022-02-10'),
(4, 'useruser', 'useruser', '1234567890', '2000-01-01', 'user5@gmail.com', '2022-02-11'),
(5, 'admin', 'admin', '1234567891', '1997-02-14', 'wannabeAdmin@gmail.com', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `tripId` int NOT NULL AUTO_INCREMENT,
  `tripName` text CHARACTER SET utf16 COLLATE utf16_bin,
  `description` text CHARACTER SET utf16 COLLATE utf16_bin,
  `startingPoint` text CHARACTER SET utf16 COLLATE utf16_bin,
  `endingPoint` text CHARACTER SET utf16 COLLATE utf16_bin,
  `vacationLength` int DEFAULT NULL,
  `startTime` timestamp NULL DEFAULT NULL,
  `endTime` timestamp NULL DEFAULT NULL,
  `activities` text CHARACTER SET utf16 COLLATE utf16_bin,
  `price` float DEFAULT NULL,
  `imgsrc` text CHARACTER SET utf16 COLLATE utf16_bin,
  PRIMARY KEY (`tripId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tripId`, `tripName`, `description`, `startingPoint`, `endingPoint`, `vacationLength`, `startTime`, `endTime`, `activities`, `price`, `imgsrc`) VALUES
(1, 'Galway Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate. Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet\r\n', 'City of Moher', 'Galway', 1, '2022-04-15 08:00:00', '2022-04-15 10:00:00', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati, pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!', 500, 'trip1.jpg'),
(2, 'Cork Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate. Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet', 'Dublin', 'Cork', 2, '2022-05-22 04:00:00', '2022-05-22 11:02:30', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati, pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!', 1000, 'trip2.jpg'),
(3, 'City of Moher Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate. Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet', 'Waterford', 'City of Moher', 3, '2022-04-15 08:00:00', '2022-04-15 13:00:00', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati, pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!', 1500, 'trip3.jpg'),
(4, 'Dublin Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate. Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet', 'Dublin', 'Galway', 1, '2022-08-22 04:00:00', '2022-08-22 09:00:00', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati, pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!', 500, 'trip4.jpg'),
(5, 'WaterFord Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Commodo, enim senectus semper diam. Nibh diam suspendisse posuere leo sed arcu sollicitudin integer enim. Metus, lorem at facilisi malesuada ultrices dui vel vulputate. Arcu aliquam integer massa vitae. Scelerisque blandit ut eget semper egestas dictum fames sed vel. Amet', 'waterford', 'Cork', 2, '2022-05-12 11:00:00', '2022-05-12 06:00:00', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati, pariatur omnis ullam ex ut nostrum illum nulla eaque beatae ab!', 2000, 'trip5.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
