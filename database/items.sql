-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 01:35 PM
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
(2, '3, 4, 5', 'Pradip123', 1234567890, 'ngt', 'test123', 1234567890);

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
(3, 'Pradip123', 1, 40, 1, 150, 'ngt', 1234567890, 'OnTheWay'),
(4, 'Pradip123', 1, 34, 1, 200, 'ngt', 1234567890, 'OnTheWay'),
(5, 'Pradip123', 1, 36, 1, 100, 'ngt', 1234567890, 'OnTheWay');

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
  `R_Id` int(11) NOT NULL,
  `categories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `shipping`, `quantity`, `image`, `R_Id`, `categories`) VALUES
(32, 'Fried Chicken Rice', 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat.', 150, 20, 5, 'Fried-chicken-Rice.jpg', 1, 'Fried-Rice'),
(33, 'Fired Veg Rice', 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat.', 120, 20, 5, 'fried-veg-rice.jpg', 1, 'Fried-Rice'),
(34, 'Mutton Curry Rice', 'Tender, succulent pieces of meat are cooked in a spicy gravy that makes it the perfect bowl of comfort food with basmati rice.', 200, 20, 5, 'mutton_curry-rice.jpg', 1, 'Fried-Rice'),
(35, 'Buff Chowmein', 'Chow Mein (ç‚’é¢) literally means â€œfried noodles,â€ and is usually made with noodles, a protein, and vegetables stir-fried with a sauce.', 120, 20, 5, 'Buff-Chowmein.jpg', 1, 'Chowmein'),
(36, 'Chicken Chowmein', 'Chow Mein (ç‚’é¢) literally means â€œfried noodles,â€ and is usually made with noodles, a protein, and vegetables stir-fried with a sauce.', 100, 20, 5, 'chicken-chowmein.jpg', 1, 'Chowmein'),
(37, 'Veg Chowmein', 'Chow Mein (ç‚’é¢) literally means â€œfried noodles,â€ and is usually made with noodles, a protein, and vegetables stir-fried with a sauce.', 80, 20, 5, 'veg-chowmein.jpg', 1, 'Chowmein'),
(38, 'Buff Momo', ' Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet and Bhutan', 130, 20, 5, 'buff-momo.png', 1, 'Momo'),
(39, 'Fired Buff MoMo', ' Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet.', 160, 20, 5, 'fried-buff-momo.png', 1, 'Momo'),
(40, 'Soup Buff MoMo', ' Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet.', 150, 25, 5, 'soup-buff-momo.jpg', 1, 'Momo'),
(41, 'Veg MoMo', ' Momo is a type of steamed dumpling with some form of filling. Momo has become a traditional delicacy in Nepal, Tibet.', 110, 20, 5, 'veg-momo.jpg', 1, 'Momo'),
(42, 'Avocado and Bacon Sandwich', 'sandwiches is made with toast, herb mayonnaise, avocado, bacon, and sprouts, seasoning with salt and pepper.', 100, 20, 5, 'avocado-and-Bacon-Cheese-sandwich.jpg', 3, 'sandwich'),
(43, 'Meatball Sandwich', 'The sandwich primarily consists of meatballs(Buff), a tomato sauce or marinara sauce, and bread.', 120, 20, 5, 'meatball-sandwich.jpg', 3, 'sandwich'),
(44, 'Tuna Mayo Sandwich', 'Tuna Mayo Sandwich is a sandwich made from canned tunaâ€”usually made into a tuna salad by adding mayonnaise, and sometimes other ingredients.', 120, 20, 5, 'tuna-mayo-sandwich.jpeg', 3, 'sandwich'),
(45, 'Bacon Burger', '50% buff. 50% bacon. Ground up into a sexy pile of meat and then turned into the most life altering burgers you will ever stuff in your face.', 180, 20, 5, 'bacon-burger.jpg', 3, 'burger'),
(46, 'Cheese and Buff Burger', 'As with other hamburgers, a cheeseburger may include toppings, such as lettuce, tomato, onion, pickles, buff, mayonnaise, ketchup, mustard or other toppings', 180, 20, 5, 'cheese-buff-burger.jpg', 3, 'burger'),
(47, 'Chicken Burger ', 'Our Flame Grilled Chicken Burger features a savory flame-grilled chicken burger patty topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles, and sliced white onions on a soft toasted brioche style bun.', 150, 20, 5, 'chicken-burger.jpg', 3, 'burger'),
(48, 'Mushroom Pizza', 'This mushroom pizza recipe has a thin and crispy crust, right amount of mushrooms and a combination of spices which turns into a delicious Italian pizza.', 210, 20, 5, 'Mushroom-Pizza.jpg', 3, 'pizza'),
(49, 'Black Olive Pizza', 'Brush the border with olive oil, sprinkle with garlic powder and sprinkle with parmesan cheese. Spread the olives and onions over the sauce and top with cheese. Bake for 12 to 15 minutes until crust is crisp.', 220, 20, 5, 'Olive-pizza.jpg', 3, 'pizza'),
(50, 'Sausage Pizza', 'Spicy sausage, onions, mushrooms and plenty of cheese make this pizza from our Test Kitchen a real keeper. It beats the delivery variety every timeâ€”and thereâ€™s no wait! ', 200, 20, 5, 'sausage-pizza.jpg', 3, 'pizza');

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
(1, 'Pradip123', 'test123', 27.6837038, 84.4458531);

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
(6, 'test1', 'test1@gmail.com', 'ngt', 1234567890, '$2y$10$0mW1Zrak/fjCRkf0Rb7xMu6cg8oyX3fY3wiJAriJQrJ.wy8CCuIwu', 'customer'),
(8, 'bil123', 'bill123@gmail.com', 'ngt', 1234567890, '$2y$10$P5xJfGoBHD27Ega/uuWmA.HlwfqakGDCTECSiJWNnTTpusjTiDvSe', 'customer'),
(9, 'lama123', 'lama1@gmail.com', 'ngt', 1234567890, '$2y$10$SZRHoOVwaxL.mlFExuDJ/.JrOX0bhsVda2ViAMkNThaDP1/vdM.jS', 'customer');

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
  MODIFY `Bill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveryboy`
--
ALTER TABLE `deliveryboy`
  MODIFY `deliveryboy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `R_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `Tracking_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
