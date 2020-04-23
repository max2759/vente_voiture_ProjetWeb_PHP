-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2020 at 02:18 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertOrder` (IN `pUsers_ID` INT, IN `pOrders_ID` INT)  NO SQL
INSERT into orders(orders_ID, users_ID) values (pOrders_ID, pUsers_ID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sellCar` (IN `pCarsID` INT, IN `pOrderDate` DATE, IN `pPriceUnitOrder` DECIMAL)  NO SQL
insert into orders_details(cars_ID,orders_ID, order_date,priceUnitOrder) VALUES(pCarsID,null,pOrderDate,pPriceUnitOrder)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateImage` (IN `pPicture` VARCHAR(255), IN `pCarsID` INT)  NO SQL
UPDATE cars set picture = pPicture where cars_ID = pCarsID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePassword` (IN `pPassword` VARCHAR(255), IN `pPseudo` VARCHAR(255))  NO SQL
UPDATE users SET password = pPassword where pseudo = Pseudo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUser` (IN `pName` VARCHAR(255), IN `pFirstname` VARCHAR(255), IN `pUserID` INT)  NO SQL
UPDATE users SET name = pName, firstname = pFirstname  where users_ID = pUserID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUserAndPassword` (IN `pName` VARCHAR(255), IN `pFirstname` VARCHAR(255), IN `pPassword` VARCHAR(255), IN `pUserID` INT)  NO SQL
UPDATE users SET name = pName, firstname = pFirstname, password = pPassword  where users_ID = pUserID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userActivation` (IN `pIsActive` BOOLEAN, IN `pUserID` INT)  NO SQL
UPDATE users SET isActive = pIsActive where users_ID = pUserID$$

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
(2, 'Ford'),
(3, 'Kia'),
(4, 'Mercedes'),
(5, 'BMW'),
(6, 'Volkswagen'),
(7, 'Audi'),
(8, 'Peugeot'),
(9, 'Fiat'),
(10, 'Nissan'),
(11, 'Suzuki'),
(12, 'Lexus');

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
  `year` int(11) NOT NULL,
  `fuel` enum('Essence','Diesel','Hybrid','Plug-in hybrid','Gaz','Electrique') NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cars_ID`, `brands_ID`, `model`, `color`, `kilometer`, `horsepower`, `unitprice`, `isActive`, `year`, `fuel`, `picture`) VALUES
(1, 1, 'Supra', 'Rouge', 10000, 340, '60000', 1, 1999, 'Essence', 'supra.jpg'),
(2, 2, 'Fiesta 1.0i Trend', 'Gris', 47000, 80, '7999', 1, 2009, 'Diesel', 'fiesta.jpg'),
(3, 5, 'BMW 318 Berline', 'Noir', 1, 150, '33000', 1, 2018, 'Diesel', 'bmw.jpg'),
(4, 6, 'Volkswagen Golf VII Trendline', 'Noir', 10, 86, '18750', 1, 2019, 'Essence', 'golf.jpg'),
(5, 1, 'Toyota Corolla 2.0 Hybrid', 'Rouge', 0, 179, '28500', 1, 2019, 'Hybrid', 'corolla.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_ID` int(11) NOT NULL,
  `users_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `insertOD` AFTER INSERT ON `orders` FOR EACH ROW insert into orders_details(orders_ID, cars_ID) VALUES ((select orders_ID FROM orders), (SELECT cars_ID FROM cars))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `cars_ID` int(11) NOT NULL,
  `orders_ID` int(11) NOT NULL,
  `priceUnitOrder` decimal(10,0) NOT NULL,
  `order_date` date NOT NULL
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
(11, 1, 'Zabbara', 'Maximilien', 'maxzab', '$2y$10$.dKgT4fJOAwHhP26i1zr6.mtYPQar8/47xsRxtCExINMhSqnvB1E.', 1),
(12, 2, 'Eude', 'Jean', 'eudjea', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(14, 1, 'Conreur', 'Valentin', 'valcon', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(15, 2, 'Wicky', 'John', 'wicjoh', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(16, 2, 'Balboa', 'Rocky', 'balroc', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(17, 2, 'Smith', 'Mortimer', 'smimor', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(19, 2, 'Tyson', 'Mike', 'miktys', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 1),
(20, 2, 'Sanchez', 'Rick', 'sanric', '$2y$10$8EU48vipo.nXAgsdR4WWxOhLgdsPRE0T8RW8XE8IB5tOF2FPeB8Ae', 0);

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
  MODIFY `brands_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cars_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
