-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 04:29 PM
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(2, 12, 13, 'ghadf'),
(3, 12, 13, 'hgfjh'),
(4, 15, 13, 'hi'),
(5, 12, 13, 'gg'),
(6, 13, 12, 'hhh'),
(7, 13, 12, 'hhejhce'),
(8, 12, 13, 'cedced'),
(9, 12, 13, 't5g45tg'),
(10, 13, 12, 'g54g4t'),
(11, 12, 13, 'hhvgh'),
(12, 15, 13, 'arun'),
(13, 13, 12, 'hy'),
(15, 13, 12, 'fff'),
(16, 13, 15, 'gg'),
(17, 13, 15, 'hello'),
(18, 13, 15, 'hello'),
(19, 12, 15, 'gggg'),
(20, 15, 12, 'hhhh'),
(21, 13, 15, 'hi'),
(22, 15, 13, 'hvhygu');

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
  `pincode` bigint(20) NOT NULL,
  `profileimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`a_id`, `login_id`, `house`, `street`, `city`, `state`, `pincode`, `profileimg`) VALUES
(1, 13, 'Ayyanolil', 'Ranni', 'Pathanamthitta', 'Kerala', 686510, '.trashed-1665708175-IMG_3004.jpeg'),
(2, 12, 'Ayyanolil\r\n', 'Vazhoor East', 'Kottayam\r\n', 'kerala\r\n', 686504, 'IMG_20220519_172507.jpg'),
(3, 11, 'Ayyanolil', 'Vazhoor East', 'Kottayam', 'Kerala', 686504, 'IMG_3099.jpeg'),
(4, 15, 'NILL', 'NILL', 'NILL', 'NILL', 0, 'NILL');

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
(122, 60, 'Maruthi cias', 850000, 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-1721976120 (1).png', 'good in condition , mileage-15 km, petrol', 7456354539, ''),
(123, 75, 'Ducati Monster', 1200000, '2019-Ducati-Monster-821-ABS-Motorcycles-1720657920.png', 'yellow in color,\r\ngood in condition', 8592016678, ''),
(124, 61, 'Google Pixel', 29000, '51+p2QXs81L._AC_SX679_.jpg', 'brand new \r\n8GB,128GB\r\nblack color', 7456354539, ''),
(125, 60, 'Maruthi cias', 850000, 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-1721976120 (1).png', 'good in condition , mileage-15 km, petrol', 0, ''),
(126, 60, 'Maruthi cias', 850000, 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-1721976120 (1).png', 'good in condition , mileage-15 km, petrol', 0, ''),
(191, 64, 'Sony TV', 35000, '71GUJVSDv3L._AC_SX450_.jpg', 'black in color\r\n40 inch', 0, 'arun399@gmail.com'),
(194, 75, 'Ducati Monster', 1200000, '2019-Ducati-Monster-821-ABS-Motorcycles-1720657920.png', 'yellow in color,\r\ngood in condition', 0, 'arun399@gmail.com'),
(195, 61, 'Google Pixel', 29000, '51+p2QXs81L._AC_SX679_.jpg', 'brand new \r\n8GB,128GB\r\nblack color', 0, 'arun399@gmail.com'),
(203, 119, 'Maruti-Suzuki XL6 Zeta 2021-Petrol', 700000, 'Maruti-Suzuki-XL6-Zeta-2021-Petrol-Cars-1722079579.png', 'good in condition', 0, 'alanshijo@gmail.com'),
(205, 116, 'r15', 130000, 'Yamaha-R15M-2022-Just-4-months-old-Brand-new-condition-Motorcycles-17270182100.png', 'good condition', 0, 'alanshijo@gmail.com'),
(369, 116, 'r15', 130000, 'Yamaha-R15M-2022-Just-4-months-old-Brand-new-condition-Motorcycles-17270182100.png', 'good condition', 0, 'sangeorge@gmail.com'),
(390, 118, 'Maruti Suzuki Swift-Dzire', 650000, 'Maruti-Suzuki-Swift-Dzire-VDI-Optional-2017-Diesel-Cars-1722956903.png', 'good in condition, 2017 Diesel', 0, 'sangeorge@gmail.com');

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
(3, 'cars', 0),
(5, 'electronics', 0),
(6, 'motorbikes', 0),
(25, 'bike', 1),
(27, 'erty', 0);

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
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `transcation_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `login_id`, `trans_id`, `amount`, `transcation_date`) VALUES
(26, 15, 'pay_LXO1oG15RmLz3j', 100, '2023-03-29 08:47:54'),
(28, 15, 'pay_LXadqZ3VasxAkc', 100, '2023-03-29 08:47:54'),
(30, 13, 'pay_LXzOOwHNrcW9pw', 100, '2023-03-29 08:47:54'),
(32, 13, 'pay_LY4ebW524Ee2Rz', 100, '2023-05-29 08:47:54'),
(38, 13, 'pay_LdFK3ntnhhdZeZ', 100, '2023-04-13 04:10:59 pm'),
(39, 13, 'pay_Lf91OJHdub52ra', 100, '2023-04-18 11:19:12 am');

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
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `p_image` varchar(300) NOT NULL,
  `p_image2` varchar(100) NOT NULL,
  `p_image3` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `delete_status` int(30) NOT NULL DEFAULT 0,
  `paymet_id` int(30) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `login_id`, `subcat_id`, `p_name`, `p_description`, `latitude`, `longitude`, `p_image`, `p_image2`, `p_image3`, `price`, `date`, `delete_status`, `paymet_id`) VALUES
(116, 15, 9, 'r15', 'good condition', '10', '77', 'Yamaha-R15M-2022-Just-4-months-old-Brand-new-condition-Motorcycles-17270182100.png', 'Yamaha-R15M-2022-Just-4-months-old-Brand-new-condition-Motorcycles-31720182100.png', 'Yamaha-R15M-2022-Just-4-months-old-Brand-new-condition-Motorcycles-1720182100.png', 130000, '2023-03-29', 1, NULL),
(117, 15, 9, 'Ducati Monster', 'good in condition', '9.5813', '76.5263', '2019-Ducati-Monster-821-ABS-Motorcycles-1720657920.png', '2019-Ducati-Monster-821-ABS-Motorcycles-21720657920.png', '2019-Ducati-Monster-821-ABS-Mo4torcycles-1720657920.png', 560000, '2023-03-29', 1, NULL),
(118, 13, 6, 'Maruti Suzuki Swift-Dzire', 'good in condition, 2017 Diesel', '9.5289344', '76.8147456', 'Maruti-Suzuki-Swift-Dzire-VDI-Optional-2017-Diesel-Cars-1722956903.png', 'Maruti-Suzuki-Swift-Dzire-VDI-Optional-2017-Diesel-Cars-17229569H03.png', 'Maruti-Suzuki-Swift-Dzire-VDI-Optional-2017-Diesel-Cars-17622956903.png', 650000, '2023-03-29', 1, NULL),
(119, 15, 5, 'Maruti-Suzuki XL6', 'good in condition,2021-Petrol,', '9.5813', '76.5263', 'Maruti-Suzuki-XL6-Zeta-2021-Petrol-Cars-1722079579.png', 'Maruti-Suzuki-XL6-Zeta-2021-Petrol-Cars-17220795749.png', 'Maruti-Suzuki-XL6-Zeta-2021-Petrol-Cars-1722079579R.png', 700000, '2023-03-29', 1, NULL),
(122, 15, 48, 'BMW 3 Series GT Msport', 'good in condition, 2017-Petrol', '9.5813', '76.5263', 'BMW-3-Series-330i-GT-M-Sport-2017-Petrol-Cars-1720533203.png', 'BMW-3-Series-330i-GT-M-Sport-2017-Petrol-Cars-1E720533203.png', 'BMW-3-Series-330i-GT-M-Sport-2017-Petrol-Cars-17720533203.png', 7500000, '2023-03-29', 1, 28),
(125, 13, 47, 'Vespa', '2019 model, Notte-edition', '9.9312328', '76.2673041', '92019-Vespa-Notte-edition-finance-available-Scooters-1719567135.png', '2019-Vespa-Notte-edition-finance-available-Scooters-1719567135.png', '2019-Vespa-Notte-edition-finance-available-Scooters-19719567135.png', 45000, '2023-03-29', 1, 0),
(126, 13, 12, 'ASUS VivoBook 15', ' FHD-Display,Intel-i3,CPU-8GB,RAM-128GB(SSD)', '9.9312328', '76.2673041', '71GKXeMFy-L._AC_SX466_.jpg', '71BPDKZc9bL._AC_SL1500_.jpg', 'Amazon-com-ASUS-VivoBook-15-F515-Laptop-15-6-FHD-Display-Intel-i3-1115G4-CPU-8GB-DDR4-RAM-128GB-SSD-', 35000, '2023-03-29', 1, 0),
(129, 12, 10, 'Himalayan Bs3', 'good in condition', '9.9185', '76.2558', 'Himalayan-Bs3-Motorcycles-17230406735.png', 'Himalayan-Bs3-Motorcycles-1723006735.png', 'Bs3-Himalayan-2017-Motorcycles-1716047292.png', 75000, '2023-03-30', 1, 0),
(130, 12, 8, 'meteor RE', 'good in condition', '9.9185', '76.2558', '2020-meteor-finance-available-Motorcycles-17194460874.png', '2020-meteor-finance-available-Motorcycles-17194436087.png', '2020-meteor-finance-available-Motorcycles-17194460873.png', 145000, '2023-03-30', 1, 0),
(131, 12, 8, 'Honda CB-Hiness 350', 'good in condition', '9.9312328', '76.2673041', 'Honda-CB-Hiness-350-finance-available-Motorcycles-1719117207.png', 'PHonda-CB-Hiness-350-finance-available-Motorcycles-1719117207.png', 'Honda-CB-Hiness-350-finance-available-Motorcycles-17191172307.png', 145000, '2023-03-30', 1, 0),
(135, 13, 6, 'Maruti Suzuki-Ciaz', 'ZDi Plus,2017-Diesel', '9.5260093', '76.8144186', 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-1721976120 (1).png', 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-17219761270.png', 'Maruti-Suzuki-Ciaz-2014-2017-ZDi-Plus-SHVS-2017-Diesel-Cars-1721976120.png', 450000, '2023-03-31', 1, 30),
(778, 13, 5, 'Xuv', 'caxcsv', '9.5813', '76.5263', 'dollar-gill-x4RjgQpCXSk-unsplash.jpg', 'dollar-gill-x4RjgQpCXSk-unsplash.jpg', 'paul-steiner-SIBw6Lh6FRU-unsplash.jpg', 1234, '2023-04-13', 0, 38),
(779, 13, 5, 'Xuv', 'desktop_computer', '9.5813', '76.5263', '51SALdXSymL._AC_SX450_.jpg', '91eUgYILDWL._AC_SX450_.jpg', '71GUJVSDv3L._AC_SX450_.jpg', 1999, '2023-04-18', 1, 39);

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
(26, 'television', 5, 0),
(41, 'xuv', 25, 1),
(42, '13141344456542314', 3, 1),
(43, 'rrr', 3, 1),
(44, '2344', 3, 1),
(45, 'off-roadg', 3, 1),
(46, 'tab', 5, 0),
(47, 'scoorter(scooty)', 6, 0),
(48, ' sports', 3, 0);

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
(11, 'George', 'Jacob', '8547123510', 'active', 11),
(12, 'alan', 'shijo', '9592016748', 'active', 12),
(13, 'sandra', 'george', '7456354539', 'active', 13),
(15, 'arun', 'babu', '8545016678', 'active', 15);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

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
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
