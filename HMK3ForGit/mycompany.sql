-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 08, 2021 at 12:11 PM
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
(21, 21, 'Joan', 'Clayton', 'ladelle2016@gmail.com', '1715 Daytona Vue', '', 'Arizonia', 'Georgia', 76301, 'United States'),
(22, 22, 'Misato', 'Rushmore', 'testinghomework123@gmail.com', '11116 Hand waves', '', 'Shinji', 'Arizona', 76301, 'Japan'),
(23, 23, 'Lynn', 'Cercy', 'mgaugustine1@gmail.com', '1715 Hello World', '', 'Chicago', 'Illinois', 76301, 'United States'),
(24, 24, 'Maya', 'Wilks', 'ladelle.augustine@gmail.com', '11167 Brain Way', '', 'Las Vegas', 'Texas', 456789, 'United States');

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
(21, 21, 111222337, '2021-09-26', '455454651651', 'Business', 'Netware,IBM Lan Server,PC/NFS', 'Testing Super Admin'),
(22, 22, 111222340, '2021-10-03', '656565161', 'Business', 'IBM Lan Server,PC/NFS', 'Testing Admin'),
(23, 23, 111222337, '2021-10-10', '11136', 'Government', 'Banyan Vines,IBM Lan Server', 'Testing General'),
(24, 24, 111222340, '2021-09-26', '1123654', 'Religous or Charitable Institution', 'Banyan Vines', 'Testing General 2');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `timestamp`) VALUES
(1, 'General', '2021-10-03 12:02:29'),
(2, 'Admin', '2021-10-03 12:02:29'),
(3, 'Super Admin', '2021-10-03 12:02:29');

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
(21, 3, 'ladelle2016@gmail.com', '9561cc1aff599fad53c0b57288b04e2d', NULL),
(22, 2, 'testinghomework123@gmail.com', 'ca762676c74f1b27011e944093b7e929', NULL),
(23, 1, 'mgaugustine1@gmail.com', '227eacaf4617a017eb45ed40e6d29924', NULL),
(24, 1, 'ladelle.augustine@gmail.com', 'a8b2229136448a9ad30d1f060f5707ea', '');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchased_info`
--
ALTER TABLE `purchased_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
