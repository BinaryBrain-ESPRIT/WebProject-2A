-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 02:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
CREATE DATABASE IF NOT EXISTS `automobile` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `automobile`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userID` int(10) NOT NULL,
  `isSuperAdmin` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--   `userID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idUser` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cart`:
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE IF NOT EXISTS `cart_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idCart` int(10) NOT NULL,
  `idProduct` int(10) NOT NULL,
  `qte` int(5) NOT NULL DEFAULT 1,
  `totalPrice` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCart` (`idCart`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cart_product`:
--   `idCart`
--       `cart` -> `id`
--   `idProduct`
--       `product` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPost` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPost` (`idPost`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `comment`:
--   `idPost`
--       `post` -> `id`
--   `idUser`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `phone` int(8) NOT NULL,
  `adress` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `maintenance`:
--

-- --------------------------------------------------------

--
-- Table structure for table `new_car`
--

CREATE TABLE IF NOT EXISTS `new_car` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `cylinder` int(2) NOT NULL,
  `energy` varchar(50) NOT NULL,
  `fiscalPower` int(10) NOT NULL,
  `gearbox` varchar(50) NOT NULL,
  `availability` int(11) NOT NULL,
  `guarantee` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `new_car`:
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCar` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idCar` (`idCar`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `post`:
--   `idCar`
--       `used_car` -> `id`
--   `idUser`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qte` int(5) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idPost` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `rate` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPost` (`idPost`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `rate`:
--   `idPost`
--       `post` -> `id`
--   `idUser`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `used_car`
--

CREATE TABLE IF NOT EXISTS `used_car` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `rate` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `used_car`:
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `isBanned` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`idCart`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
