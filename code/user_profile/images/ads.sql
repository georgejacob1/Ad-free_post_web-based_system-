-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 06:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `a_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `house` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`a_id`, `login_id`, `house`, `street`, `city`, `state`, `pincode`) VALUES
(1, 13, 'Ayyanolil', 'Vazhoor East', 'Kottayam', 'kerala', 686504),
(2, 12, 'Ayyanolil\r\n', 'Vazhoor East', 'Kottayam\r\n', 'kerala\r\n', 686504),
(3, 11, 'Ayyanolil', 'Vazhoor East', 'Kottayam', 'Kerala', 686504),
(4, 15, 'NILL', 'NILL', 'NILL', 'NILL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `pid`, `pname`, `price`, `image`, `description`, `contact`, `username`) VALUES
(7, 39, 'Creta', 1400000, 'images.jpeg', 'good', 2147483647, 'jacobgeorge399@gmail.com'),
(74, 39, 'Creta', 140000, 'images.jpeg', 'good', 7456355838, 'sangeorge@gmail.com'),
(78, 11, 'asus laptops', 25000, 'lap.jpg', 'good in condition', 7456355838, 'sangeorge@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `del_status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `category`, `del_status`) VALUES
(3, 'car', 0),
(5, 'electronics', 0),
(6, 'motorbike', 0),
(25, 'bike', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `otp_code` int(1) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email`, `password`, `otp_code`, `type_id`) VALUES
(3, 'admin@g.com', '1234', 0, 1),
(11, 'jacobgeorge399@gmail.com', '1234', 969442, 2),
(12, 'alanshijo@gmail.com', '1234', 0, 2),
(13, 'sangeorge@gmail.com', '1234', 0, 2),
(15, 'arun399@gmail.com', '1234', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_description` varchar(300) NOT NULL,
  `p_image` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `delete_status` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `login_id`, `subcat_id`, `p_name`, `p_description`, `p_image`, `price`, `year`, `delete_status`) VALUES
(11, 13, 12, 'asus laptops', 'good in condition', 'lap.jpg', 25000, 2010, 1),
(12, 13, 6, 'Maruthi cias', 'mileage-15 km', '5d8d02195e992.jpeg', 1404545, 2015, 1),
(13, 12, 10, 're himalayan', 'mileage-35km', 'RE-Himalayan-012_1.jpeg', 150000, 2009, 1),
(14, 12, 11, 'oneplus nord', 'good in condition', '51BJYsMmF8L._SX679_.jpg', 25000, 2020, 1),
(15, 11, 5, 'innova crysta', 'mileage-10 km', '5218242af598450aa28bc5715b7e6cfb_1125x630.jpg', 2400000, 2021, 1),
(16, 13, 11, 'samsung mobile', 'good in condition', '812YsUxpyfL._SX679_.jpg', 17000, 2022, 1),
(39, 13, 4, 'Creta', 'good', 'images.jpeg', 140000, 2010, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `sub_id` int(11) NOT NULL,
  `subcat` varchar(30) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `del_status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`sub_id`, `subcat`, `cat_id`, `del_status`) VALUES
(4, 'SUV', 3, 1),
(5, 'MUV', 3, 0),
(6, 'Sedan', 3, 0),
(8, 'touring', 6, 0),
(9, ' sports', 6, 0),
(10, 'off-road', 6, 0),
(11, 'mobile phones', 5, 0),
(12, 'laptops', 5, 0),
(23, 'hatch back ', 3, 0),
(26, 'television', 5, 1),
(41, 'xuv', 25, 1),
(42, '13141344456542314', 3, 1),
(43, 'rrr', 3, 1),
(44, '2344', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_status` varchar(30) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_fname`, `user_lname`, `user_phone`, `user_status`, `login_id`) VALUES
(1, 'admin', 'admin', '1234567890', 'active', 3),
(11, 'George', 'Jacob', '8592016749', 'active', 11),
(12, 'alan', 'shijo', '8592016748', 'active', 12),
(13, 'sandra', 'george', '7456354567', 'active', 13),
(15, 'arun', 'babu', '8592016678', 'active', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`type_id`, `type_name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD CONSTRAINT `tbl_subcat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
