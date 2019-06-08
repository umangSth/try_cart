-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 03:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `items`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_table`
--

CREATE TABLE `bill_table` (
  `Bill_Id` int(11) NOT NULL,
  `Order_Ids_List` varchar(50) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `UserContact` int(11) NOT NULL,
  `UserAddress` varchar(50) NOT NULL,
  `Deliveryboy_name` varchar(50) NOT NULL,
  `Deliveryboy_Contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_table`
--

INSERT INTO `bill_table` (`Bill_Id`, `Order_Ids_List`, `UserId`, `UserContact`, `UserAddress`, `Deliveryboy_name`, `Deliveryboy_Contact`) VALUES
(11, '20, 29', 'Pradip123', 1234567890, 'ngt', 'test123', 1234567890),
(13, '15', 'Pradip123', 1234567890, 'ngt', 'test123', 1234567890),
(14, '25', 'san123', 1234567890, 'ngt', 'test123', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboy`
--

CREATE TABLE `deliveryboy` (
  `deliveryboy_id` int(11) NOT NULL,
  `deliveryboy_name` varchar(50) NOT NULL,
  `deliveryboy_contact` int(11) NOT NULL,
  `deliveryboy_email` varchar(50) NOT NULL,
  `R_Id` int(11) NOT NULL,
  `deliveryboy_password` varchar(100) NOT NULL,
  `userType` varchar(50) NOT NULL DEFAULT 'deliveryboy'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryboy`
--

INSERT INTO `deliveryboy` (`deliveryboy_id`, `deliveryboy_name`, `deliveryboy_contact`, `deliveryboy_email`, `R_Id`, `deliveryboy_password`, `userType`) VALUES
(7, 'test123', 1234567890, 'test123@gmail.com', 1, '$2y$10$2WJyVp3jbfDona7ye7HAgeJItqSVeD5dtxgGusCCtrtF/QbfZmfBK', 'deliveryboy');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `Order_Id` int(11) NOT NULL,
  `UserId` varchar(200) NOT NULL,
  `R_Id` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `UserAddress` varchar(200) NOT NULL,
  `UserPhone` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'ordered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`Order_Id`, `UserId`, `R_Id`, `Id`, `quantity`, `price`, `UserAddress`, `UserPhone`, `status`) VALUES
(15, 'Pradip123', 1, 24, 1, 120, 'ngt', 1234567890, 'OnTheWay'),
(16, 'Pradip123', 3, 27, 1, 100, 'ngt', 1234567890, 'Ready'),
(17, 'Pradip123', 3, 28, 1, 50, 'ngt', 1234567890, 'Ready'),
(18, 'Pradip123', 1, 24, 1, 120, 'ngt', 1234567890, 'ordered'),
(19, 'Pradip123', 1, 26, 1, 250, 'ngt', 1234567890, 'ordered'),
(20, 'Pradip123', 1, 24, 1, 120, 'ngt', 1234567890, 'OnTheWay'),
(21, 'Pradip123', 3, 28, 1, 50, 'ngt', 1234567890, 'Ready'),
(22, 'test', 1, 25, 1, 100, 'ngt', 1234567890, 'ordered'),
(23, 'test', 1, 26, 1, 250, 'ngt', 1234567890, 'ordered'),
(24, 'test', 3, 28, 1, 50, 'ngt', 1234567890, 'ordered'),
(25, 'san123', 1, 26, 1, 250, 'ngt', 1234567890, 'OnTheWay'),
(26, 'san123', 3, 30, 2, 200, 'ngt', 1234567890, 'ordered'),
(27, 'san123', 1, 29, 1, 200, 'ngt', 1234567890, 'ordered'),
(28, 'test1', 1, 25, 3, 100, 'ngt', 1234567890, 'Ready'),
(29, 'Pradip123', 1, 24, 3, 120, 'ngt', 1234567890, 'OnTheWay'),
(30, 'Pradip123', 1, 24, 1, 120, 'ngt', 1234567890, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `shipping` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '5',
  `image` varchar(250) NOT NULL,
  `R_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `shipping`, `quantity`, `image`, `R_Id`) VALUES
(24, 'French Fries', 'French Fries are tasty  fast food.', 120, 10, 5, 'french-fries.jpg', 1),
(25, 'Mo:Mo', 'MoMo are the most eaten fast food in nepal ', 100, 10, 5, 'momo.jpeg', 1),
(26, 'Pizza', 'Pizza (Italian: [Ëˆpittsa], Neapolitan: [ËˆpittsÉ™]) is a savory dish of Italian origin.\r\n', 250, 20, 5, 'pizza.jpg', 1),
(27, 'Rice', 'rice is common food', 100, 10, 2, 'rice_with_high_package.jpg', 3),
(28, 'Pakora', 'Veg Pakora', 50, 5, 2, 'Veg_Pakora.jpg', 3),
(29, 'Chili paneer', 'chile Paneer', 200, 20, 2, 'Chilli-Paneer.jpg', 1),
(30, 'ChowMein', 'Chowmein is fast food.', 200, 20, 3, 'ChowMein.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_Id` int(11) NOT NULL,
  `R_Name` varchar(50) NOT NULL,
  `R_Email` varchar(50) NOT NULL,
  `R_Address` varchar(50) NOT NULL,
  `R_Phone` int(11) NOT NULL,
  `R_Owner` varchar(50) NOT NULL,
  `R_Pan` int(11) NOT NULL,
  `R_User` varchar(50) NOT NULL,
  `R_Password` varchar(100) NOT NULL,
  `userType` varchar(50) NOT NULL DEFAULT 'restaurant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_Id`, `R_Name`, `R_Email`, `R_Address`, `R_Phone`, `R_Owner`, `R_Pan`, `R_User`, `R_Password`, `userType`) VALUES
(1, 'hungry', 'abc@gmail.com', 'ngt', 1234567890, 'sandip', 1234567890, 'sandip123', '$2y$10$IlvCB9QqfzPwuxKgtKk4wuZeBsunLkfoYnyjDlrcpNQKCIf0Y1dKq', 'restaurant'),
(3, 'FoodFast', 'abc@gmail.com', 'ngt', 1234567890, 'sandip', 1234567890, 'apple123', '$2y$10$VkTkf25dU7829pkQu6qOouOjTz3pQVGrKMlkVZDXQP231OSDLVmVa', 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `Tracking_Id` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `deliveryboy_name` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`Tracking_Id`, `UserId`, `deliveryboy_name`, `latitude`, `longitude`) VALUES
(1, 'Pradip123', 'test123', 27.700919, 84.44219199999999),
(2, 'san123', 'test123', 27.700919, 84.44219199999999);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `UserEmail` varchar(200) NOT NULL,
  `UserAddress` varchar(200) NOT NULL,
  `UserPhone` int(11) NOT NULL,
  `UserPassword` varchar(200) NOT NULL,
  `userType` varchar(25) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserEmail`, `UserAddress`, `UserPhone`, `UserPassword`, `userType`) VALUES
(1, 'umang', 'umang.sth101@gmail.com', 'ngt', 1234567890, '$2y$10$/.RK6WfYdBKejdWP0oHGUulrpC6OoAJdUEAE1xqr7R1CseVJc6FAG', 'admin'),
(3, 'Pradip123', 'pradip@gmail.com', 'ngt', 1234567890, '$2y$10$j/J50NcRNi4xWKkBPPLjIOiXZztCr01ertZG4xathYx/jj2qq69Xa', 'customer'),
(4, 'san123', 'san123@gmail.com', 'ngt', 1234567890, '$2y$10$sV1cyZ0X0wnqPXlWRM.al.917wYhSCthXAJaQ.geZLcpsrPz6xKeO', 'customer'),
(5, 'test', 'test@gmail.com', 'ngt', 1234567890, '$2y$10$csVgG6G1gsuoiil8bArAEO8ZjEbZ3DApd9U6WivhQKiSpnS318fM2', 'customer'),
(6, 'test1', 'test1@gmail.com', 'ngt', 1234567890, '$2y$10$0mW1Zrak/fjCRkf0Rb7xMu6cg8oyX3fY3wiJAriJQrJ.wy8CCuIwu', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_table`
--
ALTER TABLE `bill_table`
  ADD PRIMARY KEY (`Bill_Id`);

--
-- Indexes for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  ADD PRIMARY KEY (`deliveryboy_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `R_Id` (`R_Id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_Id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`Tracking_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_table`
--
ALTER TABLE `bill_table`
  MODIFY `Bill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `deliveryboy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `R_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `Tracking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`R_Id`) REFERENCES `restaurants` (`R_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
