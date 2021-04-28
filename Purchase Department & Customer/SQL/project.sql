-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 05:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(100) NOT NULL,
  `User Name` varchar(20) NOT NULL,
  `Item Name` varchar(100) NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `Total Price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Id` int(11) NOT NULL,
  `Item ID` int(100) NOT NULL,
  `Item Name` varchar(100) NOT NULL,
  `Price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Id`, `Item ID`, `Item Name`, `Price`) VALUES
(1, 1, 'Chinigura Rice (per kg)', '89'),
(2, 2, 'Potato Sesonal (per kg)', '19'),
(3, 3, 'Aarong Dairy Yougurt (500 ml)', '90');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `Order ID` int(100) NOT NULL,
  `Customer Name` varchar(30) NOT NULL,
  `Phone No` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Order ID`, `Customer Name`, `Phone No`, `Address`) VALUES
(1, 1, 'Customer1', '01777777777', 'CTG, BD'),
(2, 2, 'Customer2', '01888888888', 'Khulna, BD'),
(3, 3, 'Customer1', '01888888889', 'Dhaka, BD'),
(4, 4, 'Customer2', '01444444444', 'Khulna, BD'),
(5, 5, 'Customer1', '01888888889', 'Dhaka, BD'),
(6, 6, 'Customer1', '01888888889', 'Dhaka, BD'),
(7, 7, 'Customer1', '01888888889', 'Dhaka, BD'),
(8, 8, 'Customer2', '01444444444', 'Khulna, BD');

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `Id` int(11) NOT NULL,
  `Order ID` int(100) NOT NULL,
  `Item Name` varchar(100) NOT NULL,
  `Quantity` text NOT NULL,
  `Price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_item`
--

INSERT INTO `orders_item` (`Id`, `Order ID`, `Item Name`, `Quantity`, `Price`) VALUES
(1, 1, 'Chinigura Rice (per kg)', '10', '89'),
(2, 1, 'Potato Seasonal (per kg)', '5', '19'),
(3, 2, 'Aarong Dairy Yougurt (500 ml)', '1', '90'),
(4, 3, 'Chinigura Rice (per kg)', '1', '89'),
(5, 4, 'Aarong Dairy Yougurt (500 ml)', '1', '90'),
(6, 4, 'Potato Sesonal (per kg)', '2', '19'),
(7, 4, 'Chinigura Rice (per kg)', '1', '89'),
(8, 5, 'Aarong Dairy Yougurt (500 ml)', '3', '90'),
(9, 6, 'Chinigura Rice (per kg)', '1', '89'),
(10, 7, 'Potato Sesonal (per kg)', '1', '19'),
(11, 7, 'Chinigura Rice (per kg)', '1', '89'),
(12, 8, 'Potato Sesonal (per kg)', '5', '19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone Number` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Role`, `Name`, `UserName`, `Email`, `Phone Number`, `Address`, `Password`, `Image`) VALUES
(1, 'Admin', 'Admin', 'ADMIN', 'ADMIN@GMAIL.COM', '01777777777', 'Ctg, BD', 'c5df1e9301c8e8ec45c6b86c50da342a', 'alexander-popov-342444-unsplash.jpg'),
(2, 'Purchase Stuff', 'Stuff1', 'STUFF1', 'STUFF1@GMAIL.COM', '01222222233', 'Ctg, BD', 'c5df1e9301c8e8ec45c6b86c50da342a', 'david-kovalenko-414249-unsplash.jpg'),
(3, 'Customer', 'Customer1', 'CUSTOMER1', 'CUSTOMER1@GMAIL.COM', '01888888889', 'Dhaka, BD', 'c5df1e9301c8e8ec45c6b86c50da342a', 'jonatan-pie-234237-unsplash.jpg'),
(4, 'Customer', 'Customer2', 'CUSTOMER2', 'CUSTOMER2@GMAIL.COM', '01444444444', 'Khulna, BD', 'c5df1e9301c8e8ec45c6b86c50da342a', 'david-marcu-114194-unsplash.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
