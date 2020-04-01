-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 08:28 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `order_date`) VALUES
(1, '2020-04-01 15:10:57'),
(2, '2020-04-01 15:11:05'),
(3, '2020-04-01 15:13:25'),
(4, '2020-04-01 15:14:35'),
(5, '2020-04-01 15:15:04'),
(6, '2020-04-01 15:16:21'),
(7, '2020-04-01 15:16:58'),
(8, '2020-04-01 15:17:09'),
(9, '2020-04-01 17:33:23'),
(10, '2020-04-01 17:40:05'),
(11, '2020-04-01 20:05:41'),
(12, '2020-04-02 00:28:03'),
(13, '2020-04-02 00:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(1, 2, 1, 'Bayclin', 2, 5000),
(2, 2, 3, 'Baygon', 1, 20000),
(3, 3, 1, 'Bayclin', 2, 5000),
(4, 3, 3, 'Baygon', 1, 20000),
(5, 4, 1, 'Bayclin', 2, 5000),
(6, 4, 3, 'Baygon', 1, 20000),
(7, 5, 1, 'Bayclin', 2, 5000),
(8, 5, 3, 'Baygon', 1, 20000),
(9, 6, 1, 'Bayclin', 2, 5000),
(10, 6, 3, 'Baygon', 1, 20000),
(11, 7, 1, 'Bayclin', 2, 5000),
(12, 7, 3, 'Baygon', 1, 20000),
(13, 8, 1, 'Bayclin', 2, 5000),
(14, 8, 3, 'Baygon', 1, 20000),
(15, 10, 3, 'Baygon', 2, 20000),
(16, 11, 3, 'Baygon', 2, 20000),
(17, 11, 1, 'Bayclin', 1, 5000),
(18, 12, 1, 'Bayclin', 2, 5000),
(19, 13, 3, 'Baygon', 1, 20000),
(20, 13, 1, 'Bayclin', 2, 5000);

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `order_transaction` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
	UPDATE product SET stock = stock-NEW.quantity
    WHERE product_id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `stock`) VALUES
(1, 'Bayclin', 5000, 0),
(3, 'Baygon', 20000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'kasir', 'Okayu', 'default.jpg', '$2y$10$QroU4JwOdx62fs4u0xRMi.hlUxve26t7FgYimAwbmSOrgoBafLWbe', 2, 1, 1585398128),
(4, 'admin', 'Korone', 'default.jpg', '$2y$10$EFQ/XNrvQBBfw/SpQtpcWOvWr7qjbAXpldN6H/OTgVbRTJFDfO1cq', 1, 1, 1585757190);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Okayu', 'Tokyo', 1),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Korone', 'Kansai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
