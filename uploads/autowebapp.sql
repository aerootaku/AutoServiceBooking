-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 05:10 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autowebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `company_id` text NOT NULL,
  `company_name` text NOT NULL,
  `role` enum('Owner','Client') NOT NULL DEFAULT 'Client',
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `dtcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `company_id`, `company_name`, `role`, `username`, `password`, `firstname`, `middlename`, `lastname`, `status`, `dtcreated`) VALUES
(1, '', '', 'Owner', 'admin', '$2y$10$AqXhVgp2Z5FNNRh3E2/KXuhWs.UzONXq6fBTRKgwrVm.vCgFVeRWm', '', '', '', 'Active', '2018-03-31 14:53:36'),
(2, '1', 'Dummy Name', '', 'client', '$2y$10$ZC2kBJWuGwiXoLSJKcD.meXo/1LRPMrYqwV8qhhcnix.FS4Ev37qy', '', '', '', '', '2018-03-31 20:02:49'),
(3, '', 'xx', 'Client', 'asd', '$2y$10$EQincvAz3GJnJFVqT1e6oODCG2/ITYa31efud/uQq.mS4enwyhppS', '', '', '', 'Active', '2018-04-05 12:37:02'),
(4, '', 'x', 'Client', 'asd@yahoo.com', '$2y$10$2axE9O3EaAxooSAVcx42sePiBK.gppK3L6mvd55aN.sZp.5OD38lu', '', '', '', 'Active', '2018-04-05 12:37:29'),
(5, '', 'x', 'Client', 'asd', '$2y$10$xCzLYHhrzCNKT8mF5f68TeLi5G6pc47y05PzX41LC2wiFpdIIuk8S', '', '', '', 'Active', '2018-04-05 16:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(250) NOT NULL,
  `tech_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `tech_firstname` text NOT NULL,
  `tech_lastname` text NOT NULL,
  `customer_firstname` text NOT NULL,
  `customer_lastname` text NOT NULL,
  `customer_contact` text NOT NULL,
  `customer_email` text NOT NULL,
  `service_type` text NOT NULL,
  `attachment` text NOT NULL,
  `notes` text NOT NULL,
  `fee` int(11) NOT NULL,
  `est_time` text NOT NULL,
  `adr_from` text NOT NULL,
  `adr_to` text NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `booking_id`, `tech_id`, `customer_id`, `company_name`, `tech_firstname`, `tech_lastname`, `customer_firstname`, `customer_lastname`, `customer_contact`, `customer_email`, `service_type`, `attachment`, `notes`, `fee`, `est_time`, `adr_from`, `adr_to`, `status`, `date`, `dtcreated`) VALUES
(1, 'BOOKING-12312313', 1, 1, 'Aviarthard Software Solutions', 'Kio', 'Hoviera', 'Kio', '', '09215388860', 'neilgipaya@gmail.com', 'x', '../../uploads/image003.png', '', 100, '', '', '', 'Declined', '2018-04-07', '2018-04-07 12:56:34'),
(8, 'BOOKING-0Chqk7L1xc', 0, 1, 'asd', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'xx', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Canceled', '2018-04-10', '2018-04-09 18:09:15'),
(9, 'BOOKING-i1fb30V29K', 0, 1, 'Aviarthard Software Solutions', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'x', '../../uploads/free-php-mysql-tutorials-course-online-tutorial.jpg', 'asd', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-09 18:11:37'),
(10, 'BOOKING-mL14kq7V8U', 0, 1, 'asd', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'xx', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-09 18:13:42'),
(11, 'BOOKING-zw6IWysGAp', 0, 1, 'Aviarthard Software Solutions', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'asdxxasd', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-09 18:14:40'),
(12, 'BOOKING-wIite3n10d', 0, 1, 'Aviarthard Software Solutions', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'asdxxasd', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', 'asd', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-09 18:15:47'),
(13, 'BOOKING-AmwlFDrH5u', 0, 1, 'asd', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'xx', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Canceled', '2018-04-10', '2018-04-09 18:18:30'),
(14, 'BOOKING-W9X85vsVJg', 0, 1, 'Aviarthard Software Solutions', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'asdxxasd', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Canceled', '2018-04-10', '2018-04-09 18:18:44'),
(15, 'BOOKING-YlpvwyHKTg', 0, 1, 'Aviarthard Software Solutions', 'Kio', 'Hoviera', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'asdxxasd', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '19:09', '', '', 'asd', '2018-04-10', '2018-04-09 18:33:23'),
(16, 'BOOKING-sAxQCSOIZr', 0, 1, 'asd', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'xx', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-09 18:34:29'),
(17, 'BOOKING-sYQcK4Wvhf', 0, 1, 'Aviarthard Software Solutions', 'Kio', 'Hoviera', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'x', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', 'asd', 0, '10:00', '', '', 'asd', '2018-04-10', '2018-04-09 18:58:45'),
(18, 'BOOKING-LOMENUaPDR', 0, 1, 'asd', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'xx', '../../uploads/free-php-mysql-tutorials-course-online-tutorial.jpg', '', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-10 03:37:01'),
(19, 'BOOKING-CIGMBdmWEk', 0, 1, 'xxx', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'gFDGD', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', 'asd', 0, '', '', '', 'Cancelled', '2018-04-10', '2018-04-10 03:37:20'),
(20, 'BOOKING-4CRBHigwo2', 0, 1, 'Aviarthard Software Solutions', '', '', 'Kio', 'Hoviera', '+639215388860', 'neilgipaya@gmail.com', 'asdxxasd', '../../uploads/NodeMCU-V3-ESP8266-ESP-12E-1.jpg', '', 0, '', '', '', 'Pending', '2018-04-10', '2018-04-10 03:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `company_name`, `title`, `description`) VALUES
(1, 'Aviarthard Software Solution', 'asdxxx', 'asdcxaxas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `contact` text NOT NULL,
  `opening` time NOT NULL,
  `closing` time NOT NULL,
  `dtcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_info`
--

INSERT INTO `tbl_company_info` (`id`, `logo`, `name`, `description`, `address`, `phone`, `contact`, `opening`, `closing`, `dtcreated`, `status`) VALUES
(1, '', 'asd', 'asd', 'asdxxxxx', 'asdxxxxx', 'asd', '00:00:00', '00:00:00', '2018-03-31 22:27:49', 'Active'),
(8, '../../uploads', 'xxx', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-04-02 09:51:12', 'Active'),
(12, '../../uploads/889486.gif', 'Aviarthard Software Solutions', 'Software Solutions Company', 'Sikatuna Village', '9215388860', '+639215388860', '09:00:00', '22:00:00', '2018-04-05 22:57:14', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_users`
--

CREATE TABLE `tbl_company_users` (
  `id` int(11) NOT NULL,
  `company_id` text NOT NULL,
  `company_name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` enum('Staff','Tech','Admin') NOT NULL,
  `profile` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `contact` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `dtcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isOnline` enum('Online','Offline','Servicing','') NOT NULL,
  `service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_users`
--

INSERT INTO `tbl_company_users` (`id`, `company_id`, `company_name`, `email`, `username`, `password`, `role`, `profile`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `contact`, `gender`, `address`, `status`, `dtcreated`, `isOnline`, `service`) VALUES
(2, '', '', 'asd@yahoo.com', 'asd', '$2y$10$hLJ/dI/oEYrMpLPFHbuPleydceA1ATW5/1A.Lq0wFFPwmVU5PDvBu', 'Staff', '../../uploads/image003.png', 'asdsaxz', 'asdxxasd', 'asd', '2018-12-31', 0, '+639215388860', 'Male', 'asd', 'Active', '2018-04-02 14:10:41', '', ''),
(11, '', 'Aviarthard Software Solutions', 'neilgipaya@gmail.com', 'kio', '$2y$10$RmTSj.LIUVxYdc5LzjGGiOosjC6Mtrg/GEonhFWSGrU2Bztly/QQ.', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-04-05 22:58:49', '', ''),
(12, '', 'Aviarthard Software Solutions', '', 'asdzzzasdasd', '$2y$10$FpHBEIE97se4pcQt18qJieeAfFzk6jyYvA3m/MwQWaaV3yOMbw.k.', 'Tech', '../../uploads/', 'Kio', 'x', 'Hoviera', '0000-00-00', 0, '+639', '', '', 'Active', '2018-04-07 12:09:29', '', 'asdxxasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_concern`
--

CREATE TABLE `tbl_customer_concern` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `company_name` text NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_concern`
--

INSERT INTO `tbl_customer_concern` (`id`, `customer_id`, `firstname`, `middlename`, `lastname`, `company_name`, `feedback`, `suggestions`) VALUES
(1, '1', 'asd', 'xx', 'asd', 'Aviarthard Software Solutions', 'asdasdasdasdasadadaxasaxa\r\nxasd\r\nxasdasd\r\nxasdasd', 'asdax\r\nasdaxax\r\nsxasdasd'),
(2, '1', 'Kio', 'X', 'Hoviera', 'Aviarthard Software Solutions', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id` int(11) NOT NULL,
  `booking_id` text NOT NULL,
  `tech_firstname` text NOT NULL,
  `tech_middlename` text NOT NULL,
  `tech_lastname` text NOT NULL,
  `ratings` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `company_name`, `title`, `description`, `category`, `fee`) VALUES
(1, 'Aviarthard Software Solutions', 'asdxxasd', 'asdxxasd', 'asd', 30),
(3, 'Aviarthard Software Solutions', 'x', 'xxasd', 'xxx', 20),
(4, 'asd', 'xx', 'xx', 'xx', 10),
(5, 'xxx', 'gFDGD', 'GFD', '', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `status` enum('Pending','Active','Inactive') NOT NULL,
  `dtcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `profile`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email`, `contact`, `gender`, `address`, `birthday`, `status`, `dtcreated`) VALUES
(1, '', 'kio', '$2y$10$7b3Os9b4cRSHFejJVezvpeZrV6aw3JLOUllAgmXQKBsbHptud6ztS', 'Kio', 'X', 'Hoviera', 'neilgipaya@gmail.com', '+639215388860', '', 'Address', '0000-00-00', 'Active', '2018-04-07 23:30:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_users`
--
ALTER TABLE `tbl_company_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_concern`
--
ALTER TABLE `tbl_customer_concern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_company_users`
--
ALTER TABLE `tbl_company_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer_concern`
--
ALTER TABLE `tbl_customer_concern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
