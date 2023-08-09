-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ims_brand`
--

CREATE TABLE `ims_brand` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `bname` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_brand`
--

INSERT INTO `ims_brand` (`id`, `categoryid`, `bname`, `status`) VALUES
(1, 1, 'Samsung', 'active'),
(2, 1, 'Apple', 'active'),
(3, 2, 'Oppo', 'active'),
(4, 2, 'Vivo', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_category`
--

CREATE TABLE `ims_category` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_category`
--

INSERT INTO `ims_category` (`categoryid`, `name`, `status`) VALUES
(1, 'Mobile', 'active'),
(2, 'Speakers', 'active'),
(3, 'Earphones', 'active'),
(4, 'Accessories', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_customer`
--

CREATE TABLE `ims_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `balance` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_customer`
--

INSERT INTO `ims_customer` (`id`, `name`, `address`, `mobile`, `balance`) VALUES
(1, 'Deepak M', 'Mumbai', '2147483647', 500),
(2, 'Rahul', 'Pune', '8934227292', 0),
(3, 'Ganesh', 'India', '9286367289', 300),
(4, 'Jay', 'Mumbai', '6382627911', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ims_order`
--

CREATE TABLE `ims_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `total_shipped` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_order`
--

INSERT INTO `ims_order` (`order_id`, `product_id`, `total_shipped`, `customer_id`, `order_date`) VALUES
(1, 1, 7, 1, '2023-05-27 11:15:23'),
(2, 2, 5, 2, '2023-05-27 11:15:37'),
(3, 3, 8, 2, '2023-05-27 11:33:10'),
(4, 4, 7, 3, '2023-05-27 11:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `ims_product`
--

CREATE TABLE `ims_product` (
  `pid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `pname` varchar(300) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(150) NOT NULL,
  `base_price` int(10) NOT NULL,
  `tax` int(2) NOT NULL,
  `minimum_order` int(3) NOT NULL,
  `supplier` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_product`
--

INSERT INTO `ims_product` (`pid`, `categoryid`, `brandid`, `pname`, `model`, `description`, `quantity`, `unit`, `base_price`, `tax`, `minimum_order`, `supplier`, `status`) VALUES
(1, 1, 1, 'Galaxy S22', '128gb ', '128gb ', 10, 'Nos.', 60000, 12, 5, 1, 'active'),
(2, 1, 2, 'Iphone X', '528 gb', '528 gb', 5, 'Nos.', 90000, 8, 1, 2, 'active'),
(3, 2, 3, 'Speaker101', 'oppo101', '12v Speaker', 5, 'Nos.', 400, 8, 1, 3, 'active'),
(4, 3, 4, 'earphone', 'vivo300', 'Bluetooth', 4, 'Nos.', 1200, 8, 1, 4, 'active'),
(5, 1, 1, 'A55', '128gb ', '128gb ', 1, 'Nos.', 15000, 10, 2, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_purchase`
--

CREATE TABLE `ims_purchase` (
  `purchase_id` int(11) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_purchase`
--

INSERT INTO `ims_purchase` (`purchase_id`, `supplier_id`, `product_id`, `quantity`, `purchase_date`) VALUES
(1, 1, 1, '3', '2023-05-27 11:14:33'),
(2, 2, 2, '6', '2023-05-27 11:14:56'),
(3, 3, 3, '3', '2023-05-27 11:31:50'),
(4, 4, 4, '1', '2023-05-27 11:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `ims_supplier`
--

CREATE TABLE `ims_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_supplier`
--

INSERT INTO `ims_supplier` (`supplier_id`, `supplier_name`, `mobile`, `address`, `status`) VALUES
(1, 'Samsung Inc.', '73573930287', 'Delhi', 'active'),
(2, 'Apple Inc.', '537383667839', 'Chennai', 'active'),
(3, 'Oppo inc', '48298266378', 'China', 'active'),
(4, 'Vivo Inc', '63839374748', 'China', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ims_user`
--

CREATE TABLE `ims_user` (
  `userid` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` enum('admin','member') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ims_user`
--

INSERT INTO `ims_user` (`userid`, `email`, `password`, `name`, `type`, `status`) VALUES
(1, 'admin@mail.com', 'admin', 'Administrator', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `otp`) VALUES
(1, 'm.dee.5055@gmail.com', 2476);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ims_brand`
--
ALTER TABLE `ims_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `ims_category`
--
ALTER TABLE `ims_category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `ims_customer`
--
ALTER TABLE `ims_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ims_order`
--
ALTER TABLE `ims_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `ims_product`
--
ALTER TABLE `ims_product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `categoryid` (`categoryid`,`brandid`,`supplier`),
  ADD KEY `supplier` (`supplier`),
  ADD KEY `brandid` (`brandid`);

--
-- Indexes for table `ims_purchase`
--
ALTER TABLE `ims_purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `supplier_id` (`supplier_id`,`product_id`),
  ADD KEY `supplier_id_2` (`supplier_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ims_supplier`
--
ALTER TABLE `ims_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `ims_user`
--
ALTER TABLE `ims_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ims_brand`
--
ALTER TABLE `ims_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_category`
--
ALTER TABLE `ims_category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_customer`
--
ALTER TABLE `ims_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ims_order`
--
ALTER TABLE `ims_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_product`
--
ALTER TABLE `ims_product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ims_purchase`
--
ALTER TABLE `ims_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_supplier`
--
ALTER TABLE `ims_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_user`
--
ALTER TABLE `ims_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ims_brand`
--
ALTER TABLE `ims_brand`
  ADD CONSTRAINT `ims_brand_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `ims_category` (`categoryid`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_order`
--
ALTER TABLE `ims_order`
  ADD CONSTRAINT `ims_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `ims_customer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ims_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ims_product` (`pid`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_product`
--
ALTER TABLE `ims_product`
  ADD CONSTRAINT `ims_product_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `ims_category` (`categoryid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ims_product_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `ims_supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ims_product_ibfk_3` FOREIGN KEY (`brandid`) REFERENCES `ims_brand` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ims_purchase`
--
ALTER TABLE `ims_purchase`
  ADD CONSTRAINT `ims_purchase_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `ims_supplier` (`supplier_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ims_purchase_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `ims_product` (`pid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
