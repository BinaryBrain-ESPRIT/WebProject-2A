-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 09:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

DROP DATABASE IF EXISTS
CREATE DATABASE IF NOT EXISTS `automobile` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `automobile`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idUser`, `total`) VALUES
(1, 1, 0),
(2, 5, 10),
(3, 14, 0),
(4, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

DROP TABLE IF EXISTS `cart_product`;
CREATE TABLE `cart_product` (
  `id` int(10) NOT NULL,
  `idCart` int(10) NOT NULL,
  `idProduct` int(10) NOT NULL,
  `qte` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

DROP TABLE IF EXISTS `command`;
CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `idUser`, `total`, `date`) VALUES
(12, 14, 12, '2022-12-14 13:23:57'),
(13, 14, 36, '2022-12-14 13:25:32'),
(14, 16, 5561, '2022-12-14 14:12:44'),
(15, 16, 60, '2022-12-22 14:34:16'),
(16, 14, 450, '2022-12-25 11:38:02'),
(17, 14, 4300, '2022-12-25 11:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `command_product`
--

DROP TABLE IF EXISTS `command_product`;
CREATE TABLE `command_product` (
  `id` int(11) NOT NULL,
  `idCommand` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `command_product`
--

INSERT INTO `command_product` (`id`, `idCommand`, `idProduct`, `qte`) VALUES
(30, 0, 6, 10),
(31, 2, 6, 10),
(32, 3, 6, 1),
(33, 3, 6, 1),
(34, 3, 6, 1),
(35, 4, 6, 1),
(36, 4, 6, 1),
(37, 4, 6, 1),
(38, 5, 6, 1),
(39, 5, 6, 1),
(40, 5, 6, 1),
(41, 6, 6, 1),
(42, 6, 6, 1),
(43, 6, 6, 1),
(44, 7, 6, 1),
(45, 7, 6, 1),
(46, 7, 6, 1),
(47, 8, 6, 1),
(48, 8, 6, 1),
(49, 8, 6, 1),
(50, 9, 6, 1),
(51, 9, 6, 1),
(52, 9, 6, 1),
(53, 10, 6, 17),
(54, 10, 7, 1),
(55, 11, 6, 1),
(56, 12, 6, 1),
(57, 13, 6, 3),
(58, 14, 6, 3),
(59, 14, 7, 1),
(60, 15, 6, 5),
(61, 16, 10, 3),
(62, 17, 9, 4),
(63, 17, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idCar` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idPost`, `idCar`, `idUser`, `description`, `date`, `type`) VALUES
(41, 7, NULL, 14, 'aze', '2022-12-14 13:04:00', 1),
(43, NULL, 9, 16, 'sfvb,n;:n;vb,b;,n;,', '2022-12-14 14:05:18', 0),
(44, NULL, 7, 16, 'your comment here! \r\n', '2022-12-22 14:24:14', 0),
(45, NULL, 12, 16, 'your comment here !\r\n', '2022-12-22 14:31:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

DROP TABLE IF EXISTS `compare`;
CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `idUser`, `idCar`) VALUES
(21, 16, 10),
(22, 16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `phone` int(8) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `name`, `type`, `description`, `phone`, `address`) VALUES
(4, 'mohamed', 'Mechanic', 'akedbuaz', 58111111, 'sfax-tunisie'),
(5, 'oussama', 'Electrician', 'aaa', 53156311, 'sfax-tunisie'),
(6, 'salem', 'Electrician', 'electrique voiture', 53156311, 'tunis-tunisie'),
(17, 'amor', 'diagnostic', 'diagnostique', 55555555, 'tunis'),
(19, 'kamel', 'taulier', 'taulerie', 99999999, 'Tunis');

-- --------------------------------------------------------

--
-- Table structure for table `new_car`
--

DROP TABLE IF EXISTS `new_car`;
CREATE TABLE `new_car` (
  `id` int(11) NOT NULL,
  `imgURL` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `cylinder` int(2) NOT NULL,
  `energy` varchar(50) NOT NULL,
  `fiscalPower` int(10) NOT NULL,
  `gearbox` varchar(50) NOT NULL,
  `availability` int(11) NOT NULL,
  `guarantee` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_car`
--

INSERT INTO `new_car` (`id`, `imgURL`, `category`, `brand`, `model`, `cylinder`, `energy`, `fiscalPower`, `gearbox`, `availability`, `guarantee`, `rate`) VALUES
(5, 'la-nouvelle-mercedes-classe-a-en-tunisie-39003.jpg', 'SEDAN', ' Mercedes-Benz ', 'QSDSQ', 7, 'Essence', 7, 'Automatic', 1, 4, 0),
(7, 'volkswagen-golf-8-1.4-l-tsi-r-line-62418.jpg', 'SEDAN', 'volkswagen ', 'golf', 7, 'Diesel', 7, 'manual', 1, 4, 0),
(8, 'audi A3.jpg', 'SEDAN', 'Audi', '', 7, 'Essence', 7, 'Automatic', 1, 4, 0),
(9, 'kia-sportage-1.6-l-t-gdi-7-dct-sx-67049.jpg', 'SEDAN', 'kIA', '', 7, 'Diesel', 7, 'manual', 1, 4, 0),
(10, 'bmw-serie-3-320i-access-67885.jpg', 'SEDAN', 'BMW', '', 7, 'Diesel', 7, 'Automatic', 1, 3, 0),
(11, 'toyota-hilux-2.4-l-diesel-d-4d-4x4-double-cabine-premium-61475.jpg', 'SEDAN', 'Toyota', '', 7, 'Essence', 7, 'Automatic', 1, 4, 0),
(12, 'peugeot-208-1.2-l-active-52507.jpg', 'SEDAN', 'Peugeot', '', 7, 'Essence', 7, 'manual', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `idCar` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `idCar`, `idUser`, `price`, `date`) VALUES
(6, 2, 14, 50000, '2022-12-03'),
(7, 6, 14, 60000, '2022-12-03'),
(9, 5, 14, 100000, '2022-12-03'),
(10, 8, 14, 100000, '2022-12-03'),
(11, 9, 14, 80000, '2022-12-03'),
(12, 10, 14, 70000, '2022-12-03'),
(13, 11, 14, 80000, '2022-12-03'),
(14, 12, 14, 55000, '2022-12-04'),
(15, 13, 14, 88000, '2022-12-04'),
(16, 14, 14, 59000, '2022-12-04'),
(17, 15, 14, 78000, '2022-12-04'),
(18, 16, 14, 49000, '2022-12-04'),
(19, 17, 14, 49000, '2022-12-04'),
(20, 18, 14, 74000, '2022-12-04'),
(21, 19, 14, 85000, '2022-12-04'),
(22, 20, 14, 86000, '2022-12-04'),
(23, 21, 14, 67000, '2022-12-04'),
(24, 22, 14, 79000, '2022-12-04'),
(25, 23, 14, 99000, '2022-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qte` int(5) NOT NULL,
  `price` float NOT NULL,
  `imgURL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand`, `type`, `name`, `qte`, `price`, `imgURL`) VALUES
(9, 'Renault', 'clutch', 'Embreillage symbole', 10, 1000, 'Clutch.png'),
(10, 'fiat', 'wheel', '26*10', 50, 150, 'roue.jpeg'),
(11, 'toyota', 'brake', 'frein', 15, 600, 'frein.jpeg'),
(12, 'Renault', 'clutch', 'Embreillage symbole', 10, 1000, 'embreyage.jpeg'),
(15, 'renault', 'oil', 'huile', 10, 150, 'oil.jpeg'),
(17, 'fiat', 'radiator', 'radiateur', 50, 500, 'radiateur.jpeg'),
(18, 'toyota', 'gas pump', 'pompe a essance', 10, 1000, 'gas-pump.jpeg'),
(19, 'seat', 'oil pump', 'pompe a huile', 40, 700, 'oil-pump.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE `rate` (
  `id` int(10) NOT NULL,
  `idPost` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

DROP TABLE IF EXISTS `reset_password`;
CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `verifCode` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `used_car`
--

DROP TABLE IF EXISTS `used_car`;
CREATE TABLE `used_car` (
  `id` int(11) NOT NULL,
  `imgURL` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `cylinder` int(11) NOT NULL,
  `energy` varchar(50) NOT NULL,
  `fiscalPower` int(11) NOT NULL,
  `gearbox` varchar(50) NOT NULL,
  `registerNumber` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `kilometers` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `used_car`
--

INSERT INTO `used_car` (`id`, `imgURL`, `category`, `brand`, `model`, `cylinder`, `energy`, `fiscalPower`, `gearbox`, `registerNumber`, `year`, `kilometers`, `rate`) VALUES
(2, 'classe a.jpg', 'sport', 'Mercedes-Benz', 'classe A', 4, 'Essence', 7, 'Automatic', '190 TUN 152', 2016, 150000, 0),
(5, 'classe.jpg', 'sport', 'Mercedes-Benz', 'classe E', 4, 'Diesel', 7, 'Automatic', '204 TUN 693', 2018, 100000, 0),
(6, 'serie1.jpg', 'sport', 'BMW', 'serie 1', 4, 'Essence', 7, 'auto', '205 TUN 457', 2018, 50000, 0),
(8, 'audia3.jpg', 'sport', 'Audi', 'A3', 4, 'Essence', 7, 'Automatic', '200 TUN 7897', 2017, 100000, 0),
(9, 'a4.jpg', 'sport', 'Audi', 'A4', 4, 'Essence', 8, 'Automatic', '195 TUN 128', 2017, 170000, 0),
(10, 'a7.jpg', 'sport', 'Audi', 'A7', 4, 'Essence', 9, 'Automatic', '185 TUN 111', 2015, 220000, 0),
(11, 'golf6.jpg', 'sport', 'Wolkswagen', 'Golf 6', 4, 'Essence', 5, 'manuelle', '160 TUN 111', 2012, 250000, 0),
(12, 'golf8.jpg', 'sport', 'Wolkswagen', 'polo 8', 4, 'Essence', 5, 'manuelle', '220 TUN 479', 2021, 20000, 0),
(13, 'passat.jpg', 'sedan', 'Wolkswagen', 'passat', 4, 'Essence', 8, 'automatic', '170 TUN 963', 2014, 190000, 0),
(14, 'golf7.jpg', 'sport', 'Wolkswagen', 'Golf 7', 4, 'Essence', 6, 'Automatic', '200 TUN 753', 2017, 200000, 0),
(15, 'polo7.jpg', 'sport', 'Wolkswagen', 'polo 7', 4, 'Essence', 5, 'manuelle', '163 TUN 679', 2013, 196000, 0),
(16, 'yaris.jpg', 'sport', 'Toyota', 'yaris', 4, 'Essence', 5, 'manuelle', '186 TUN 159', 2015, 188000, 0),
(17, 'hilux.jpg', '4*4', 'Toyota', 'hilux', 4, 'diesel', 7, 'manuelle', '137 TUN 486', 2009, 300000, 0),
(18, 'i10.jpg', 'sport', 'Hyundai', 'i10', 4, 'Essence', 5, 'manuelle', '204 TUN 411', 2018, 35000, 0),
(19, 'seat.jpg', 'sport', 'seat', 'leon', 4, 'Essence', 7, 'automatic', '215 TUN 123', 2020, 45000, 0),
(20, 'rio.jpg', 'sport', 'Kia', 'rio', 4, 'Essence', 6, 'Automatic', '205 TUN 124', 2018, 37500, 0),
(21, 'sportage.jpg', 'sport', 'Kia', 'sportage', 4, 'Essence', 8, 'Automatic', '194 TUN 632', 2017, 57000, 0),
(22, '208.jpg', 'sport', 'Peugeot', '208', 4, 'Essence', 5, 'manuelle', '187 TUN 456', 2015, 96200, 0),
(23, '308.jpg', 'sport', 'Peugeot', '308', 4, 'Essence', 5, 'manuelle', '212 TUN 123', 2020, 40000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(100) NOT NULL,
  `isBanned` int(1) NOT NULL DEFAULT 0,
  `isAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `age`, `address`, `isBanned`, `isAdmin`) VALUES
(14, 'habibbibani79@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Habib Bibani', 20, '', 0, 1),
(16, 'wiem.benzarti@esprit.tn', '25f9e794323b453885f5181f1b624d0b', 'wiem', 19, '', 0, 1),
(17, 'habibbibani79@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', 'testName', 20, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCart` (`idCart`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `command_product`
--
ALTER TABLE `command_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCar` (`idCar`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCar` (`idCar`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_car`
--
ALTER TABLE `new_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCar` (`idCar`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost` (`idPost`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `used_car`
--
ALTER TABLE `used_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `command_product`
--
ALTER TABLE `command_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `new_car`
--
ALTER TABLE `new_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `used_car`
--
ALTER TABLE `used_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`idCart`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `command_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`idCar`) REFERENCES `new_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compare`
--
ALTER TABLE `compare`
  ADD CONSTRAINT `compare_ibfk_1` FOREIGN KEY (`idCar`) REFERENCES `new_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compare_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idCar`) REFERENCES `used_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
