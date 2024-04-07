-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Aug 02, 2022 at 04:16 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `status` enum('cancel','processed','delivered') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `email`, `address`, `order_date`, `delivery_date`, `status`) VALUES
(1, 'Shivam Yadav', 'shivam24161@gmail.com', 'aaa', '2022-08-01 01:56:26', '30-08-2022', 'delivered'),
(2, 'samsung', 'a@gmail.com', 'asd', '2022-08-01 01:58:01', '30-08-2022', 'delivered'),
(3, 'aa', 'a@gmail.com', 'sdsdf', '2022-08-01 01:59:35', '30-08-2022', 'delivered'),
(4, 'samsung', 'a@gmail.com', 'asd', '2022-08-01 02:01:19', '30-08-2022', 'delivered'),
(5, 'Shivam Yadav', 'shivam24161@gmail.com', 'aaa', '2022-08-01 02:06:11', '30-08-2022', 'cancel'),
(6, 'Shivam y', 'yash@gmail.com', 'sdsdf', '2022-08-01 21:22:43', '30-08-2022', 'processed'),
(7, 'Shivam y', 'yash@gmail.com', 'sdsdf', '2022-08-01 21:38:31', '30-08-2022', 'processed'),
(8, 'Shivam Yadav', 'betu@gmail.com', 'asd', '2022-08-01 21:40:43', '30-08-2022', 'processed'),
(9, '', '', '', '2022-08-02 00:42:25', '30-08-2022', 'processed'),
(10, 'Shivam Yadav', 'shivam24161@gmail.com', 'aaa', '2022-08-02 00:54:46', '30-08-2022', 'processed'),
(11, 'Rishab', 'yash@gmail.com', 'Jarauli khurd', '2022-08-02 00:56:01', '30-08-2022', 'processed'),
(12, 'Shivam Yadav', 'shivam24161@gmail.com', 'Firozabad, Uttar Pradesh, India, Jarauli Khurd', '2022-08-02 00:57:49', '30-08-2022', 'processed'),
(13, 'Shivam Yadav', 'shivam24161@gmail.com', 'Firozabad, Uttar Pradesh, India, Jarauli Khurd', '2022-08-02 00:57:56', '30-08-2022', 'processed'),
(14, 'Shivam Yadav', 'shivam24161@gmail.com', 'asd', '2022-08-02 00:58:44', '30-08-2022', 'processed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_name`, `price`, `quantity`) VALUES
(5, 'Boat earbuds', '9000', '1'),
(5, 'Fast-track', '11000', '1'),
(5, 'Laptop', '49999', '1'),
(6, 'Laptop Bag', '7000', '1'),
(6, 'Nokia', '20000', '1'),
(6, 'Samsung', '14999', '1'),
(1, 'Laptop Bag', '7000', '1'),
(1, 'Nokia', '20000', '1'),
(1, 'Samsung', '14999', '1'),
(2, 'Boat earbuds', '9000', '1'),
(2, 'Nokia', '20000', '1'),
(3, 'Boat earbuds', '9000', '1'),
(2, 'Boat earbuds', '9000', '1'),
(3, 'Nokia', '20000', '1'),
(4, 'Laptop Bag', '7000', '1'),
(5, 'Fast-track', '11000', '1'),
(6, 'Boat earbuds', '9000', '1'),
(6, 'Laptop Bag', '7000', '1'),
(8, 'Boat earbuds', '9000', '1'),
(9, 'Fast-track Watch', '10000', '1'),
(9, 'ger', '434', '1'),
(10, 'Fast-track Watch', '10000', '1'),
(10, 'Samsung ', '40000', '1'),
(11, 'Fast-track Watch', '10000', '1'),
(11, 'Samsung ', '40000', '1'),
(12, 'Boat earbuds', '9000', '1'),
(14, 'Samsung ', '40000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_category` enum('electronics','fashion','home appliances','furniture','jewellery') DEFAULT NULL,
  `product_sale_price` int DEFAULT NULL,
  `product_list_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_category`, `product_sale_price`, `product_list_price`) VALUES
(25, 'Laptop Bag', '5.jpg', 'electronics', 7000, 10000),
(26, 'Boat earbuds', '6.jpg', 'electronics', 9000, 12000),
(29, 'Samsung ', '3.jpg', 'electronics', 40000, 50000),
(30, 'Fast-track Watch', '4.jpg', 'electronics', 10000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `role`, `address`, `pincode`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'admin', 'Lucknow', '226201', 'active'),
(3, 'abc', 'betu@gmail.com', '123', 'customer', 'asd', '23', 'active'),
(6, 'Shivam Yadav', 'shivam24161@gmail.com', '111', 'customer', 'Firozabad, Uttar Pradesh, India, Jarauli Khurd', '232323', 'active'),
(8, 'satyam', 'satyam@gmail.com', '1234', 'customer', '1234', '283203', 'active'),
(9, 'Rishab', 'rishab@gmail.com', '1212', 'customer', '1212', '121122', 'active'),
(10, 'samsung', 'sds@gmail.com', '2332', 'customer', 'efewfsd', '2323332', 'active'),
(11, 'END', 'a223@gmail.com', '21', 'customer', 'sdsd', '2', 'active'),
(13, 'asass', 'a@gmail.com', 'asas', 'customer', 'asas', '121221', 'active'),
(16, '3123', 'shivam2465161@gmail.com', '1212', 'customer', 'Jarauli khurd', '121212', 'active'),
(17, '12', 'shivam16142@gmail.com', '1212', 'customer', 'Jarauli khurd', '1212', 'active'),
(23, 'samsung', 'shivam1612242@gmail.com', '1212', 'customer', 'aaa', '1212122', 'active'),
(28, 'Shivam Yadav', 'yash@gmail.com', 'efe', 'customer', 'asd', '232', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
