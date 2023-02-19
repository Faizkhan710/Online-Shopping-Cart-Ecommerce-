-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 11:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(30) NOT NULL,
  `b_des` varchar(150) NOT NULL,
  `b_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`b_id`, `b_name`, `b_des`, `b_image`) VALUES
(1, 'Beauty Products', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam', 'banner-4.jpg'),
(2, 'Hand Arts', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam', 'banner-1.jpg'),
(3, 'Gift Articles ', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam', 'banner-6.jpg'),
(4, 'Hand Bags', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam', 'banner-7.jpg'),
(5, 'Stationary ', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam', 'banner-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_image`) VALUES
(1, 'Arts', 'cate-1.jpg'),
(2, 'Gift Articles', 'cate-2.jpg'),
(3, 'Geeting Cards', 'cate-3.jpg'),
(4, 'Dolls', 'cate-4.jpg'),
(5, 'Files Wraps ', 'cate-5.jpg'),
(6, 'Hand Bags', 'cate-6.jpg'),
(7, 'Wallets', 'cate-7.jpg'),
(8, 'Cosmetic Items', 'cate-8.jpg'),
(9, 'Celebrate Items', 'cate-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `msg_id` int(10) NOT NULL,
  `msg_name` varchar(20) NOT NULL,
  `msg_email` varchar(70) NOT NULL,
  `msg_subject` varchar(30) NOT NULL,
  `msg_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `f_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`f_id`, `p_id`, `u_id`) VALUES
(1, 10, 2),
(2, 10, 2),
(3, 10, 2),
(4, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `om_id` int(10) NOT NULL,
  `om_fn` varchar(15) NOT NULL,
  `om_ln` varchar(15) NOT NULL,
  `om_email` varchar(70) NOT NULL,
  `om_phone` int(15) NOT NULL,
  `om_add1` varchar(100) NOT NULL,
  `om_add2` varchar(100) NOT NULL,
  `om_country` varchar(15) NOT NULL,
  `om_city` varchar(15) NOT NULL,
  `om_state` varchar(15) NOT NULL,
  `om_zipcode` int(10) NOT NULL,
  `om_pay_mode` varchar(15) NOT NULL,
  `userid_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`om_id`, `om_fn`, `om_ln`, `om_email`, `om_phone`, `om_add1`, `om_add2`, `om_country`, `om_city`, `om_state`, `om_zipcode`, `om_pay_mode`, `userid_fk`) VALUES
(1, 'faizan', 'akkas', 'aptechclasses0@gmail.com', 2147483647, ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'Pakistan', 'lahore', 'sindh', 79520, 'Cash on Deliver', 2),
(2, 'faizan', 'akkas', 'aptechclasses0@gmail.com', 2147483647, ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'Pakistan', 'lahore', 'sindh', 79520, '', 2),
(3, 'faizan', 'akkas', 'aptechclasses0@gmail.com', 2147483647, ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'Pakistan', 'lahore', 'sindh', 79520, 'Cash on Deliver', 2),
(4, 'faizan', 'akkas', 'aptechclasses0@gmail.com', 2147483647, ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'Pakistan', 'lahore', 'sindh', 79520, 'Cash on Deliver', 2),
(5, 'faizan', 'akkas', 'aptechclasses0@gmail.com', 2147483647, ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'Pakistan', 'lahore', 'sindh', 79520, 'Cash on Deliver', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_inv_num` int(10) NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `delivered_date` varchar(10) NOT NULL,
  `reason` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `orderid_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `product_id`, `order_quantity`, `order_date`, `order_inv_num`, `order_status`, `delivered_date`, `reason`, `detail`, `orderid_fk`) VALUES
(2, 1, 1, '2022-08-16', 57908249, 'Returned', '2022-08-17', 'Arrived too late', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 3),
(3, 5, 1, '2022-08-16', 57908249, 'Cancelled', '', 'Change of mind', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 3),
(4, 2, 1, '2022-08-17', 25334397, 'processing', '', '', '', 4),
(5, 10, 1, '2022-08-17', 85347274, 'Cancelled', '2022-08-17', 'Duplicate Order', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_des` varchar(200) NOT NULL,
  `p_quantity` int(10) NOT NULL,
  `p_code` int(10) NOT NULL,
  `p_number` int(10) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `cid_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_des`, `p_quantity`, `p_code`, `p_number`, `p_image`, `cid_fk`) VALUES
(1, 'Giraffe Art', 70, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. ', 4, 0, 0, 'pd-1.jpg', 1),
(2, 'Congrats Gift Articl', 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. ', 7, 0, 0, 'pd-3.jpg', 2),
(3, 'New Year Card', 30, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 3, 0, 0, 'pd-6.jpg', 3),
(5, 'Doodles Files', 20, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 5, 0, 0, 'pd-9.jpg', 5),
(6, 'Red Bags', 35, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 6, 0, 0, 'pd-14.jpg', 6),
(7, 'Bunch Cosmetic', 77, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 9, 0, 0, 'pd-16.jpg', 8),
(8, 'Small Rocket ', 50, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 5, 0, 0, 'pd-18.jpg', 9),
(9, 'Strong Wallet', 30, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 7, 0, 0, 'pd-12.jpg', 7),
(10, 'doll for girl', 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus sollicitudin dapibus. Vestibulum id quam nulla. Donec dui velit, consequat varius odio id, venenatis commodo nisl. Etiam at', 10, 0, 0, 'doll.jpg', 4),
(11, 'Best Wishes Card', 10, 'Hand Made Quilled Greeting Card', 35, 88, 46643, 'card.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(10) NOT NULL,
  `user_fn` varchar(20) NOT NULL,
  `user_ln` varchar(20) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_add1` varchar(100) NOT NULL,
  `user_add2` varchar(100) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_zipcode` int(10) NOT NULL,
  `user_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_fn`, `user_ln`, `user_email`, `user_password`, `user_phone`, `user_add1`, `user_add2`, `user_country`, `user_city`, `user_state`, `user_zipcode`, `user_image`) VALUES
(1, 'ali', 'khan', 'alikhan@gmail.com', '12345', '0345637826', 'House No. 143, Kmc Market, Karachi', '', 'Pakistan', 'karachi', 'sindh', 79520, 'profile.png'),
(2, 'faizan', 'akkas', 'aptechclasses0@gmail.com', '09876', '03442474925', ' Hill Top Arcade Gizri Boulevard, DHA', ' Ground Floor, Textile Plaza, Karachi', 'England', 'lahore', 'sindh', 79520, 'men.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`om_id`),
  ADD KEY `userid_fk` (`userid_fk`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orderid_fk` (`orderid_fk`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cid_fk` (`cid_fk`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `om_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD CONSTRAINT `order_manager_ibfk_1` FOREIGN KEY (`userid_fk`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`orderid_fk`) REFERENCES `order_manager` (`om_id`),
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cid_fk`) REFERENCES `category` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
