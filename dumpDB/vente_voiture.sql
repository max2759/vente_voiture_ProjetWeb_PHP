-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2020 at 01:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vente_voiture`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser` (IN `pFirstname` VARCHAR(100), IN `pName` VARCHAR(100), IN `pPassword` VARCHAR(256), IN `pPseudo` VARCHAR(100))  NO SQL
insert into users(users_ID,roles_ID,firstname,name,password,pseudo,isActive) VALUES(null, 2, pFirstname, pName, pPassword,pPseudo,1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `pFirstname` VARCHAR(250), IN `pName` VARCHAR(250), IN `pPassword` VARCHAR(250), IN `pUsersId` INT)  NO SQL
UPDATE users SET firstname = pFirstname, name = pName, password = pPassword where users_ID = pUsersId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_ID`, `name`) VALUES
(1, 'Toyota'),
(2, 'Ford');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cars_ID` int(11) NOT NULL,
  `brands_ID` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `kilometer` int(11) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `unitprice` decimal(10,0) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `fuel` enum('Essence','Diesel','Hybrid','Plug-in hybrid','Gaz','Electrique') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cars_ID`, `brands_ID`, `model`, `color`, `kilometer`, `horsepower`, `unitprice`, `isActive`, `fuel`) VALUES
(1, 1, 'Supra', 'Rouge', 10000, 340, '60000', 1, 'Essence'),
(2, 2, 'Fiesta 1.0i Trend', 'gris', 47000, 80, '7999', 1, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_ID` int(11) NOT NULL,
  `users_ID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `cars_ID` int(11) NOT NULL,
  `orders_ID` int(11) NOT NULL,
  `priceUnitOrder` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roles_ID` int(11) NOT NULL,
  `Label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roles_ID`, `Label`) VALUES
(1, 'Admin'),
(2, 'Employe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_ID` int(11) NOT NULL,
  `roles_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_ID`, `roles_ID`, `name`, `firstname`, `pseudo`, `password`, `isActive`) VALUES
(11, 1, 'Max', 'Zab', 'maxmax', '$2y$10$jshHtHv2dvzW5qNrFuejQ.9mqu4szeSrYwdCmlW4N/7uPs6Hiz.4q', 1),
(12, 2, 'Eude', 'Jean', 'eudjea', '$2y$10$mS7p9l13IGSXgwCjVO0CvuU8He.LHMkI/MUKtMYayHVG2O/fEu5rW', 0),
(14, 1, 'Conreur', 'Valentin', 'valcon', '$2y$10$KxxbomRrYCE90mKvGLHXT.Gejf4lm3OhSyQTa89tjVKXrG/wda2Vi', 1),
(15, 2, 'Wick', 'John', 'wicjoh', '$2y$10$7YZX39MvuQbfaeUodw3hDeSqmDbfZRqL11u1ekoywmKMntTrZ8NIG', 1),
(16, 2, 'Balboa', 'Rocky', 'balroc', '$2y$10$354o3fn8Lm/BaeeS8hRLhu3iKFMQi.m41gKzLllI3h1xFviC6rdwy', 0),
(17, 2, 'Smith', 'Morty', 'smimor', '$2y$10$qOCA6Qpc2wSpXAj8sXd7jurn7.VOJLizp3MOUmxERHl.tTEVdnTd.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_ID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cars_ID`),
  ADD KEY `brands_ID` (`brands_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_ID`),
  ADD KEY `users_ID` (`users_ID`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD KEY `cars_ID` (`cars_ID`),
  ADD KEY `orders_ID` (`orders_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_ID`),
  ADD KEY `roles_ID` (`roles_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cars_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brands_ID`) REFERENCES `brands` (`brands_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_ID`) REFERENCES `users` (`users_ID`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`cars_ID`) REFERENCES `cars` (`cars_ID`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`orders_ID`) REFERENCES `orders` (`orders_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_ID`) REFERENCES `roles` (`roles_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
