-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 04, 2021 at 05:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `product_name`, `sku`, `price`) VALUES
(111222333, 'Spice - Chili Powder Mexican', '5457-5459', '$10.60'),
(111222334, 'Lettuce - Romaine, Heart', '65597-117', '$6.84'),
(111222335, 'Langers - Mango Nectar', '54868-3584', '$18.60'),
(111222336, 'Clementine', '0555-0954', '$29.20'),
(111222337, 'Lemonade - Island Tea, 591 Ml', '0003-0830', '$20.60'),
(111222338, 'Flour - Bread', '65044-5076', '$17.50'),
(111222339, 'Snapple Lemon Tea', '13537-240', '$6.24'),
(111222340, 'Coffee - Dark Roast', '63323-304', '$28.29'),
(111222341, 'Coffee - Frthy Coffee Crisp', '55154-4614', '$1.32'),
(111222342, 'Juice - Grape, White', '52125-809', '$9.57');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email_address` varchar(64) NOT NULL,
  `address_one` varchar(80) NOT NULL,
  `address_two` varchar(80) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `country` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `uid`, `first_name`, `last_name`, `email_address`, `address_one`, `address_two`, `city`, `state`, `zip`, `country`) VALUES
(23, 24, 'Ladelle', 'Diekhoff', 'ladelle.augustine@gmail.com', '11167 Brain Way', '', 'Houston', 'Texas', 76301, 'United States'),
(24, 25, 'Ladelle', 'Diekhoff', 'ladelle2016@gmail.com', '11167 Brain Way', '', 'Atlanta', 'Georgia', 76301, 'United States'),
(26, 27, 'Test', 'testhello', 'testinghomework123@gmail.com', '1111 Sideways', '', 'Shinji ', 'California', 74568, 'United States'),
(27, 28, 'Testing', 'test', 'testinghomework123@gmail.com', '11167 Brain Way', '', 'Shinji', 'Texas', 77114, 'United States'),
(28, 29, 'testing', 'test', 'testinghomework123@gmail.com', '11167 Brain Way', '', 'Shinji', 'Georgia', 71452, 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_info`
--

CREATE TABLE `purchased_info` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `used_for` varchar(40) NOT NULL,
  `op_sys` varchar(40) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchased_info`
--

INSERT INTO `purchased_info` (`id`, `uid`, `pid`, `purchase_date`, `serial_number`, `used_for`, `op_sys`, `comments`) VALUES
(23, 24, 111222342, '2021-09-13', '1112211', 'Business', 'Netware,Windows,IBM Lan Server', 'Testing 1 2 3'),
(24, 25, 111222338, '2021-09-07', '123456', 'Home', 'Netware,Windows,IBM Lan Server,PC/NFS', 'Testing 1 2'),
(26, 27, 111222337, '2021-09-27', '17854632', 'Educational Institution', 'Netware,IBM Lan Server', 'Testing information information information'),
(27, 28, 111222339, '2021-08-26', '123789', 'Religous or Charitable Institution', 'Netware,Windows,PC/NFS', 'Testing 123'),
(28, 29, 111222338, '2021-09-30', '11133324', 'Business', 'Netware,Windows,PC/NFS', 'Hello Test');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `roleID` int(11) NOT NULL DEFAULT 1,
  `username` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `token` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `roleID`, `username`, `password`, `token`) VALUES
(25, 1, 'ladelle2016@gmail.com', '123Ladelle', NULL),
(29, 1, 'testinghomework123@gmail.com', 'Testing123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_info`
--
ALTER TABLE `purchased_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111222343;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchased_info`
--
ALTER TABLE `purchased_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
