-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 06:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_id` int(11) NOT NULL,
  `category_desc` varchar(150) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_desc`, `active`) VALUES
(1, 'Pasta Noodles', 1),
(2, 'Noodles', 1),
(3, 'Vegetables', 1),
(4, 'Pork', 1),
(5, 'Desert', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE `tblevents` (
  `events_id` int(11) NOT NULL,
  `event_code` varchar(50) NOT NULL,
  `events_desc` varchar(100) NOT NULL,
  `events_image` varchar(400) NOT NULL,
  `events_details` varchar(400) NOT NULL,
  `events_price` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`events_id`, `event_code`, `events_desc`, `events_image`, `events_details`, `events_price`, `active`) VALUES
(1, '630425570219', 'Birthday Party', 'event-birthday.jpg', 'test events', 3000, 1),
(2, '400197920188', 'anniversary events', 'event-private.jpg', 'teawdastt', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `feedback_id` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL,
  `tdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodimage`
--

CREATE TABLE `tblfoodimage` (
  `fimage_id` int(11) NOT NULL,
  `image` varchar(400) NOT NULL,
  `food_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblfoods`
--

CREATE TABLE `tblfoods` (
  `food_id` int(11) NOT NULL,
  `food_desc` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `food_serve` varchar(50) NOT NULL DEFAULT '0',
  `food_details` varchar(200) NOT NULL,
  `food_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblgiveaways`
--

CREATE TABLE `tblgiveaways` (
  `giveaways_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `limit_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `tdate` varchar(50) NOT NULL,
  `act_no` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpackage`
--

CREATE TABLE `tblpackage` (
  `package_id` int(11) NOT NULL,
  `package_code` varchar(50) NOT NULL,
  `package_desc` varchar(50) NOT NULL,
  `package_price` int(11) NOT NULL,
  `image` varchar(400) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsetpackage`
--

CREATE TABLE `tblsetpackage` (
  `setpackage_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`status_id`, `status_desc`) VALUES
(1, 'pending'),
(2, 'approve'),
(3, 'decline');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_number` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `tdate` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `todaydate` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 2,
  `click` int(1) NOT NULL DEFAULT 0,
  `remarks` varchar(300) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `return_deliver` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `password`, `status`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(2, 'secretary', '827ccb0eea8a706c4c34a16891f84e7b', 'secretary', 1),
(3, 'test secretary', '25f9e794323b453885f5181f1b624d0b', 'Secretary', 1),
(4, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tblfoodimage`
--
ALTER TABLE `tblfoodimage`
  ADD PRIMARY KEY (`fimage_id`);

--
-- Indexes for table `tblfoods`
--
ALTER TABLE `tblfoods`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tblgiveaways`
--
ALTER TABLE `tblgiveaways`
  ADD PRIMARY KEY (`giveaways_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tblpackage`
--
ALTER TABLE `tblpackage`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tblsetpackage`
--
ALTER TABLE `tblsetpackage`
  ADD PRIMARY KEY (`setpackage_id`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfoodimage`
--
ALTER TABLE `tblfoodimage`
  MODIFY `fimage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfoods`
--
ALTER TABLE `tblfoods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgiveaways`
--
ALTER TABLE `tblgiveaways`
  MODIFY `giveaways_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpackage`
--
ALTER TABLE `tblpackage`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsetpackage`
--
ALTER TABLE `tblsetpackage`
  MODIFY `setpackage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblfoods`
--
ALTER TABLE `tblfoods`
  ADD CONSTRAINT `tblfoods_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tblcategory` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tblgiveaways`
--
ALTER TABLE `tblgiveaways`
  ADD CONSTRAINT `tblgiveaways_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `tblfoods` (`food_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD CONSTRAINT `tbltransaction_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `tblstatus` (`status_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltransaction_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tblcustomer` (`customer_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltransaction_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
