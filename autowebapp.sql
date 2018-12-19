-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 03:50 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

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
(72, 'BOOKING-hZ8FErqYNW', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/space1.png', 'asdgas', 200, '', '', '', 'Cancelled', '2018-07-11', '2018-07-13 04:48:02'),
(74, 'BOOKING-5ToEQ83Ril', 42, 13, 'RRI AUTO SERVICE CENTER', 'Tan', 'Ibisate', 'jonard', 'Saracanlao', '+639', 'saracanlaojuan@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'gshshsu', 320, '13:30', '', '', 'Completed', '2018-07-13', '2018-07-13 04:45:44'),
(75, 'BOOKING-54sWeyzIvo', 42, 8, 'RRI AUTO SERVICE CENTER', 'Tan', 'Ibisate', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/space1.png', 'wrwtw', 320, '17:30', '', '', 'Completed', '2018-07-13', '2018-07-13 04:58:53'),
(76, 'BOOKING-2xSgqH0iOA', 0, 13, 'RRI AUTO SERVICE CENTER', '', '', 'jonard', 'Saracanlao', '+639', 'saracanlaojuan@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'dufagg', 340, '', '', '', 'Declined', '2018-07-13', '2018-07-13 04:57:50'),
(77, 'BOOKING-Sbn8M6EVOf', 0, 8, 'RRI AUTO SERVICE CENTER', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DRAINED BATTERY ', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'ghctd', 370, '', '', '', 'Cancelled', '2018-07-13', '2018-07-13 05:44:19'),
(78, 'BOOKING-yjlBZIT81Q', 0, 8, 'POWERFIX AUTO SERVICES', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'FLAT', '../../uploads/space1.png', 'dgjasdg', 400, '', '', '', 'Cancelled', '2018-07-13', '2018-07-13 06:06:47'),
(79, 'BOOKING-DGJbjemq7A', 0, 8, 'RRI AUTO SERVICE CENTER', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'sjwj', 320, '', '', '', 'Cancelled', '2018-07-13', '2018-07-13 06:31:01'),
(80, 'BOOKING-oNb4qCiJn3', 42, 8, 'RRI AUTO SERVICE CENTER', 'Tan', 'Ibisate', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'help', 320, '15:43', '', '', 'Completed', '2018-07-22', '2018-07-21 16:22:37'),
(81, 'BOOKING-kJYZdsCT3a', 42, 8, 'RRI AUTO SERVICE CENTER', 'Tan', 'Ibisate', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'lol my tire is flat', 340, '14:42', '', '', 'Completed', '2018-07-22', '2018-07-25 03:34:41'),
(82, 'BOOKING-RPSAvkBgax', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'FAULTY SPARK PLUGS', '../../uploads/received_2049063452078129.jpeg', '', 250, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 03:50:24'),
(83, 'BOOKING-tiRyT3OwHx', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'gfddd', 200, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 03:52:18'),
(84, 'BOOKING-PqnNdi4wK8', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'FAULTY SPARK PLUGS', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'frj', 250, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 03:53:26'),
(85, 'BOOKING-zdRVu7HC0G', 25, 8, 'R-system', 'R', 'ech1', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'rgfeg', 300, '02:22', '', '', 'Completed', '2018-07-25', '2018-07-25 03:55:23'),
(86, 'BOOKING-EAi658bLId', 42, 8, 'RRI AUTO SERVICE CENTER', 'Tan', 'Ibisate', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'fgt', 320, '02:30', '', '', 'Completed', '2018-07-25', '2018-07-25 03:58:24'),
(87, 'BOOKING-eRc81aOIo4', 38, 8, 'POWERFIX AUTO SERVICES', 'powertech', 'powerfixtech', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DRAINED BATTERY ', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'td', 500, '02:02', '', '', 'Completed', '2018-07-25', '2018-07-25 04:02:41'),
(88, 'BOOKING-DHOs895qZw', 0, 8, 'AUTOMOTIVE SERVICE CENTER ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-13-11-48-01-49.png', 'tfd', 300, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:07:03'),
(89, 'BOOKING-ufEa26YoOi', 0, 8, 'R-system', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'gdf', 300, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:08:54'),
(90, 'BOOKING-fgX8Q2PoBJ', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'gh', 200, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:13:18'),
(91, 'BOOKING-JYqXF3bxRd', 0, 8, 'RRI AUTO SERVICE CENTER', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'OVER HEAT', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'hget', 320, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:15:27'),
(92, 'BOOKING-04EwL92ckM', 0, 8, 'POWERFIX AUTO SERVICES', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'FLAT', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'vsh', 400, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:16:37'),
(93, 'BOOKING-jB3fqHNZs7', 0, 8, 'AUTOMOTIVE SERVICE CENTER ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'ggg', 300, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:18:34'),
(94, 'BOOKING-FvmJYe1jIH', 0, 8, 'PRENS AUTO PARTS ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'FAULTY SPARK PLUGS', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'hi', 250, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:38:01'),
(95, 'BOOKING-X8yveg9OD4', 0, 8, 'AUTOMOTIVE SERVICE CENTER ', '', '', 'bon', 'nard', '+639040506070', 'sara@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/Screenshot_2018-07-19-17-35-33-11.png', 'shs', 300, '', '', '', 'Cancelled', '2018-07-25', '2018-07-25 04:44:59'),
(96, 'BOOKING-fOVCci5Ik4', 0, 16, 'AUTOMOTIVE SERVICE CENTER ', '', '', 'us', 'two', '+639222222333', 'use2@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/', '', 300, '', '', '', 'Cancelled', '2018-08-01', '2018-08-01 02:41:36'),
(97, 'BOOKING-o81gC6WcHB', 53, 16, 'R-system', 'duffy', 'duck', 'us', 'two', '+639222222333', 'use2@gmail.com', 'FLAT', '../../uploads/', '', 450, '11:11', '', '', 'Completed', '2018-08-01', '2018-08-01 02:48:30'),
(98, 'BOOKING-RudCpDhwom', 0, 16, 'R-system', '', '', 'us', 'two', '+639222222333', 'use2@gmail.com', 'OVER HEAT', '../../uploads/images (1).jpeg', 'Ew', 300, '', '', '', 'Cancelled', '2018-08-06', '2018-08-06 07:29:59'),
(99, 'BOOKING-6RFKcki9Px', 25, 16, 'R-system', 'R', 'ech1', 'us', 'two', '+639222222333', 'use2@gmail.com', 'FAULTY SPARK PLUGS', '../../uploads/images (1).jpeg', 'Gjf', 400, '17:55', '', '', 'Accepted', '2018-08-06', '2018-08-06 07:33:25'),
(100, 'BOOKING-VBs2KEGWnP', 0, 20, 'Kio Service', '', '', 'Kio', 'L', '09215388860', 'neilgipaya@gmail.com', 'Vulcanize', '../../uploads/Screenshot_1.jpg', '', 1000, '', '', '', 'Cancelled', '2018-09-02', '2018-09-02 11:40:53'),
(101, 'BOOKING-tJUnOAYiux', 78, 20, 'Kio Service', 'sample', 'sample', 'Kio', 'L', '09215388860', 'neilgipaya@gmail.com', 'Vulcanize', '../../uploads/Screenshot_1.jpg', 'Sample Description', 1000, '12:00', '', '', 'Completed', '2018-09-02', '2018-09-02 16:30:07'),
(102, 'BOOKING-5zAD2gP6Uj', 66, 20, 'AUTOMOTIVE SERVICE CENTER ', 'bajado', 'paula', 'Kio', 'L', '09215388860', 'neilgipaya@gmail.com', 'DAMAGE TIRES AND WHEELS', '../../uploads/reference 1.jpg', 'asd', 300, '', '', '', 'Cancelled', '2018-09-10', '2018-09-10 01:41:53');

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
(15, 'PRENS AUTO PARTS & SERVICES', 'A', ''),
(16, 'RRI AUTO SERVICE CENTER', 'C', ''),
(17, 'asd', 'a', 'a'),
(18, 'Kio Service', 'This is a sample category', 'Category Sample Description');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `booking_id` text NOT NULL,
  `tech_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `text` text NOT NULL,
  `class` enum('User','Tech') NOT NULL,
  `dtcreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `booking_id`, `tech_id`, `customer_id`, `text`, `class`, `dtcreated`) VALUES
(95, 'BOOKING-HYytZcObhf', '25', '10', 'hey\r\n', 'User', '2018-07-11 05:49:56'),
(98, 'BOOKING-5ToEQ83Ril', '42', '13', 'hey', 'User', '2018-07-13 04:44:36'),
(99, 'BOOKING-5ToEQ83Ril', '42', '13', 'heloo', 'Tech', '2018-07-13 04:44:47'),
(100, 'BOOKING-oNb4qCiJn3', '42', '8', 'Hello sir good am', 'Tech', '2018-07-21 16:18:45'),
(101, 'BOOKING-oNb4qCiJn3', '42', '8', 'Hello dafaq', 'Tech', '2018-07-21 16:18:57'),
(102, 'BOOKING-oNb4qCiJn3', '42', '8', 'This is User', 'Tech', '2018-07-21 16:19:20'),
(103, 'BOOKING-oNb4qCiJn3', '42', '8', 'this is user acc', 'User', '2018-07-21 16:20:42'),
(104, 'BOOKING-kJYZdsCT3a', '42', '8', 'hello this is user', 'User', '2018-07-21 16:26:21'),
(105, 'BOOKING-kJYZdsCT3a', '42', '8', 'This is tech may I help', 'Tech', '2018-07-21 16:26:39'),
(106, 'BOOKING-EAi658bLId', '42', '8', 'hi', 'User', '2018-07-25 03:57:45'),
(107, 'BOOKING-EAi658bLId', '42', '8', 'Hello', 'Tech', '2018-07-25 03:57:49'),
(108, 'BOOKING-eRc81aOIo4', '38', '8', 'He', 'Tech', '2018-07-25 04:02:14'),
(109, 'BOOKING-eRc81aOIo4', '38', '8', 'go', 'User', '2018-07-25 04:02:18'),
(110, 'BOOKING-o81gC6WcHB', '53', '16', 'Hello sir', 'Tech', '2018-08-01 02:46:46'),
(111, 'BOOKING-o81gC6WcHB', '53', '16', 'k', 'User', '2018-08-01 02:47:05'),
(112, 'BOOKING-6RFKcki9Px', '25', '16', 'He', 'User', '2018-08-06 07:34:42');

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
(1, '', 'R-SYSTEM', '', 'Motor Town II, Commerce Avenue, Alabang Town Center, Ayala Alabang, Muntinlupa, 1780 Metro Manila', '(02) 899-7896', '09090900990', '00:00:00', '05:00:00', '2018-03-31 22:27:49', 'Active'),
(8, '../../uploads', 'RRI AUTO SERVICE CENTER', '', 'Marcos Alvarez, Talon 5, City of Las Piñas, Metro Manila, Philippines', '(02) 877-6478', '0909090990', '00:00:00', '00:00:00', '2018-04-02 09:51:12', 'Active'),
(13, '../../uploads/WIN_20171103_10_36_07_Pro.jpg', 'POWERFIX AUTO SERVICES', '', '280 Alabang Zapote Road Corner Quirino Avenue, Las Pinas, 1742 Metro Manila', '(02) 877-6478', '09234561284', '06:00:00', '17:00:00', '2018-04-16 06:06:23', 'Active'),
(21, '../../uploads/', 'PRENS AUTO PARTS & SERVICES', '', 'BF Resort Dr, Las Pinas, Metro Manila', '(02) 874-8777', '+639091578457', '08:00:00', '17:00:00', '2018-07-25 04:31:39', 'Active'),
(22, '../../uploads/', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', '', '468 Real St, Almanza Uno, Las Piñas, 1747 Metro Manila', '(02) 874-5478', '+639034949797', '08:00:00', '18:00:00', '2018-07-25 04:32:44', 'Active'),
(25, '../../uploads/Screenshot_1.jpg', 'Kio Service', 'This is a sample description', 'Debug Test UTF ÃƒÂ±', '(02) 90909122', '+6391231233', '12:59:00', '00:59:00', '2018-09-02 14:44:55', 'Active');

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
  `service` text NOT NULL,
  `expertise` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_users`
--

INSERT INTO `tbl_company_users` (`id`, `company_id`, `company_name`, `email`, `username`, `password`, `role`, `profile`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `contact`, `gender`, `address`, `status`, `dtcreated`, `isOnline`, `service`, `expertise`) VALUES
(25, '', 'R-system', 'R-tech@gmail.com', 'R-tech1', '$2y$10$0M2tA7D46/zOj.RFMPF.M.szhLCPvNPa/gtqBAlnKtCaRqPlgtDBW', 'Tech', '../../uploads/edone 2.jpg', 'R', 'T', 'ech1', '1995-02-01', 0, '+639090405032', 'Male', 'makati', 'Active', '2018-05-15 16:07:18', 'Online', '1', ''),
(26, '', 'RRI', 'calbo@gmail.com', 'calbo', '$2y$10$/sKrv5XIiuK82YW/wMbslOLFuehHE/ioF3jJz9WEu5.A0hDazejwG', 'Tech', '../../uploads/', 'calbo', 'wala', 'meron', '1996-02-01', 0, '+639040506654', 'Male', 'bacoor', 'Active', '2018-05-16 08:55:48', 'Online', '', ''),
(31, '', 'POWERFIX AUTO SERVICES', 'Chellomendez@gmail.com', 'chello', '$2y$10$UuxM1dIR0SYcei6VMN0oLOzkTuIGL9PsxrcNUhmSM9iTs1X5zJ5A6', 'Admin', '', 'Chello', '', 'Mendez', '0000-00-00', 0, '090909090990', 'Male', '', 'Active', '2018-07-11 04:19:26', 'Online', '', ''),
(33, '', 'RRI AUTO SERVICE CENTER', 'caldo@gmail.com', 'caldo', '$2y$10$.orDmwgVVe5LInr5XOuvY.qH4WI9/aLYqvn3woI9MTsNVZCFq1DaS', 'Admin', '', 'Rhenzel', '', 'Caldo', '0000-00-00', 0, '0908080808080', 'Male', '', 'Active', '2018-07-11 04:31:28', 'Online', '', ''),
(36, '', 'R-SYSTEM', 'jonard@gmail.com', 'jonard', '$2y$10$G0uJWwHqvvjObb7TYwBA0uC/apDkmaDvuXHFpIR16KvEy5MI5/Jle', 'Admin', '', 'Jonard', 'V', 'Saracanlao', '2001-01-01', 0, '+63909050765', 'Male', 'Las Pinas\r\n', 'Active', '2018-07-11 04:40:05', 'Online', '', ''),
(38, '', 'POWERFIX AUTO SERVICES', 'powertech1@gmail.com', 'powertech1', '$2y$10$jHC/MGn2TQZtI4iGrpmmreF8Y.myj5ykbX6rRpEspve3FpVOu7wZm', 'Tech', '../../uploads/', 'powertech', 'v', 'powerfixtech', '1998-06-05', 0, '+63907060504', 'Male', 'las pinas', 'Active', '2018-07-11 04:53:30', 'Online', '', ''),
(42, '', 'RRI AUTO SERVICE CENTER', 'tan@gmail.com', 'tan', '$2y$10$dEgQLt4.G2fjcOXBJZnjfObZ4AnyWc/ev4lybIF4qgwCsDgyVR6T6', 'Tech', '../../uploads/', 'Tan', 'V.', 'Ibisate', '1891-12-02', 0, '+639158145927', 'Male', 'Las Pinas', 'Active', '2018-07-11 05:13:24', 'Online', '', ''),
(49, '', 'R-SYSTEM', 'saracanlaojuan@gmail.com', 'bonjonard', '$2y$10$ogHFN8gIPB1BXUfkBcuGreBP7nSTOH0X/OwDplSWs7r6X9GlSfCsW', 'Staff', '../../uploads/', 'bonjonard', 'V', 'Saracanlao', '2001-01-01', 0, '+639090507650', 'Male', 'las pinas', 'Active', '2018-07-22 09:45:13', 'Online', '', ''),
(53, '', 'R-SYSTEM', 'SARACANLAOJONARD@GMAIL.COM', 'duffy', '$2y$10$9QaasxgG0HslY1jB0bbEB.dZMCu3CO3DEgOuil2XmEE5lRoUhGGXu', 'Tech', '../../uploads/DUFFY.png', 'duffy', 'sy', 'duck', '1998-04-20', 0, '+639090567890', 'Male', 'las pinas', 'Active', '2018-07-25 03:23:06', 'Online', '', ''),
(57, '', 'RRI AUTO SERVICE CENTER', 'ginalyn@gmail.com', 'ginalyn', '$2y$10$a1mnpE1qPQtFa4zYvtfszOoiRuiSGRIRPb5WMjsH3gd./nDbQufSm', 'Staff', '../../uploads/', 'Gina', 'M', 'Saracanlao', '9999-12-09', 0, '+639111111124', 'Female', 'Bacoor', 'Active', '2018-07-25 04:14:22', 'Online', '', ''),
(58, '', 'POWERFIX AUTO SERVICES', 'jel@gmail.com', 'jel', '$2y$10$VdCVSvYYsAXFM5PNXCp2PezCAlCJKCUTJBd5mofdx3gZAibXElTyO', 'Staff', '../../uploads/', 'Jel', 'O', 'Tags', '1278-12-09', 0, '+639124547896', 'Male', 'Cavite', 'Active', '2018-07-25 04:15:57', 'Online', '', ''),
(61, '', 'PRENS AUTO PARTS & SERVICES', 'andrea@gmail.com', 'andrea', '$2y$10$XDQ0.DIz4WLSogyIznxD3uQek7Z6B.GAE7FrwZtwxy4d5yTg32vJO', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 04:32:09', 'Online', '', ''),
(62, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'gervin@gmail.com', 'gervin', '$2y$10$0R/j5o8O.eCg3n4fDJHb7u5cKWDm5uhZtmya2EI.VZYcIlXw04E1O', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 04:33:06', 'Online', '', ''),
(63, '', 'PRENS AUTO PARTS & SERVICES', 'jose@gmail.com', 'jose', '$2y$10$bbK9Srr3cLJI70Q63G7JjOb9dk4.2QRBvoendAJt5kPKMgTriGAlC', 'Staff', '../../uploads/', 'jose', 'p', 'nollora', '2000-12-09', 0, '+639158455555', 'Male', 'Bacoor', 'Active', '2018-07-25 04:34:28', 'Online', '', ''),
(64, '', 'PRENS AUTO PARTS & SERVICES', 'ken@gmail.com', 'ken', '$2y$10$XaFf0qOlEBooPMrG80Ny4OFU2pCHt95M/AdRF2jRiAq6sZDnFSd9G', 'Tech', '../../uploads/', 'ken', 'p', 'bilan', '2010-12-09', 0, '+639319899797', 'Male', 'Bacoor', 'Active', '2018-07-25 04:35:16', 'Online', '', ''),
(65, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'chllmndz@yahoo.com', 'kobebe', '$2y$10$cCTdPs.kNWof6lOwzlipQOxTQgin/swCguFF6Lb.kseDKBtuDK5jO', 'Staff', '../../uploads/', 'kobebe', 'p', 'santarin', '2007-12-06', 0, '+639131313131', 'Male', 'Cavite', 'Active', '2018-07-25 04:39:03', 'Online', '', ''),
(66, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'pau@gmail.com', 'pau', '$2y$10$NEVhgNGuSx8JzcdrCVmot.yUa/qh92jYtFcHDZyKqNSYyNlNrRdjC', 'Tech', '../../uploads/', 'paula', 'p', 'bajado', '1908-12-03', 0, '+639164497979', 'Female', 'Cavite', 'Active', '2018-07-25 04:39:46', 'Online', '', ''),
(68, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'carla@gmail.com', 'carla', '$2y$10$iebI6f7P.PHWjjDZ/RoSMuDCcgkC5f92BmXx4FREHnet24UMg/ygi', 'Tech', '../../uploads/', 'Carla', 'P', 'Papansin', '1998-12-05', 0, '+639159487569', 'Female', 'Cavite', 'Active', '2018-07-25 04:44:48', 'Online', '', ''),
(69, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'gga@gmail.com', 'cARLA', '$2y$10$PRPd/wdw4Ik1E8ImhVg3d.pSJPXiPNI5Ig/7ITdBCjzht49Eprbwy', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 04:46:47', 'Online', '', ''),
(71, '', 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'rhenzelxcaldo@yahoo.com', 'gervins', '$2y$10$VcnTEAi.QlpKVAteQO.eBeeZJU9pFlOL6EQRhGdT70/WHjR1C8ZBu', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 04:55:51', 'Online', '', ''),
(72, '', 'ABC Shop', 'kiki@gmail.com', 'kiki', '$2y$10$zgXZYOCy1NQRumGe2DCApeAW7djZfdPi60xlNv9eVj6ESxmtKmhny', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 05:17:20', 'Online', '', ''),
(73, '', 'ABC Shop', 'peke', 'keke', '$2y$10$./CcJf3q8fzTM6ZmUT3Mc.ijustrtu87IgSk5kE9RK3oBwBi0Ohkq', 'Tech', '../../uploads/', 'peke', 'o', 'haha', '1999-12-03', 0, '+639156446464', 'Male', 'bacoor', 'Active', '2018-07-25 05:18:27', 'Online', '', ''),
(74, '', 'ABC Shop', 'macmacdoringo@yahoo.com', 'gervin123', '$2y$10$uQ9tdHununa2AEB9tSba4.iHNqgV5JLqohBO6PbbRu.aMCbTBqnOm', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-07-25 05:20:03', 'Online', '', ''),
(75, '', 'R-SYSTEM', 'james@gmail.com', 'james', '$2y$10$ebpz./N9JPAbjBglFiUG8OfqOxfxHUmKHGZw.G5JErLIW/ZzPXGqi', 'Tech', '../../uploads/frozen3.jpg', 'james', 'g', 'ga', '2001-01-01', 0, '+639090909090', 'Male', 'ghjk', 'Active', '2018-08-15 01:19:24', 'Online', '', ''),
(76, '', 'Kio Service', 'neilgipaya@gmail.com', 'kiohoviera', '$2y$10$SnX.Ys9789oJ.onToNVqYexkotkkBoFfV2Pent7PEUia6M/PavEFy', 'Admin', '', 'Kio Corp', 'Sample Middle Name', 'Sample Last Name', '2018-12-31', 0, '091234567890', 'Male', 'Sample Address', 'Active', '2018-09-02 14:46:44', 'Online', '', ''),
(77, '', 'Kio Service', 'kiotech@email.com', 'tech', '$2y$10$rMyRqoAFghQ29P8y3rykNumQXABS9doNChro7wFzUvkYPD0oCDGkG', 'Tech', '../../uploads/Screenshot_1.jpg', 'Tech First Name', 'Tech Middle Name', 'Tech Last name', '2018-09-02', 0, '+639215388860', 'Male', 'Sample Address', 'Active', '2018-09-02 14:58:23', 'Online', '', ''),
(78, '', 'Kio Service', 'withexpertise@email.com', 'Sample', '$2y$10$dBpDMKUVIxn/O5o80XiTOeqd/5nLlGivEhtKJaIBdti6qYdm.JKX2', 'Tech', '../../uploads/', 'sample', 'sample', 'sample', '2018-01-31', 0, '+63912313', 'Female', 'Sample', 'Active', '2018-09-02 15:14:20', 'Online', '', 'Tubero'),
(79, '', 'Kio Service', 'sad@yahoo.com', '13', '$2y$10$EmqKQRtVFeW11Cr6QPUBF.vQQDrVP09Ppf7B01Ar4OZmiRxGoh1WC', 'Tech', '../../uploads/', 'asd', 'asd', 'asd', '2331-12-31', 0, '+639123', 'Female', '123', 'Active', '2018-09-17 22:52:15', 'Online', '', 'Tires,Over Hauling,Change Oil,Tune Up');

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
(1, '1', 'caldo', 'harus', 'tug tug', 'automa', 'kilomoto', 'wala din'),
(2, '1', 'jon', 'vill', 'sar', 'R-system', 'huh', 'wala'),
(3, '8', 'bon', 'b', 'nard', 'R-system', 'tumbs up sa services nyo', 'medyo babaan ang service fee'),
(4, '8', 'bon', 'b', 'nard', 'RRI AUTO SERVICE CENTER', 'not bad', 'need more technician to make more services');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiries`
--

CREATE TABLE `tbl_inquiries` (
  `id` int(11) NOT NULL,
  `company_name` text COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_inquiries`
--

INSERT INTO `tbl_inquiries` (`id`, `company_name`, `customer_name`, `content`) VALUES
(1, 'AUTOFIxxxx', 'Kiox Hovierax', 'asd'),
(2, 'Kio Comp', 'Kiox Hovierax', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `msg_info` text NOT NULL,
  `status` enum('Unread','Read') NOT NULL DEFAULT 'Unread',
  `dtcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_msg`
--

INSERT INTO `tbl_msg` (`id`, `user_id`, `msg_info`, `status`, `dtcreated`) VALUES
(1, '20', 'Reservation has been accepted, Please Expect our Arrival Soon', 'Read', '2018-09-03 13:24:22'),
(2, '20', 'Reservation has been Completed, Thank you for Availing our services', 'Read', '2018-09-03 13:28:46'),
(3, '1', 'Reservation has been accepted by, Please Expect our Arrival Soon', 'Unread', '2018-09-07 11:50:53'),
(4, '1', 'Reservation has been accepted byKio Service. You can go to the shop atSeptember 07, 2018 11:11:00and please be advised that 30 minutes late will void your contract. If you have further question you can contact us at 091234567890', 'Unread', '2018-09-07 11:51:19'),
(5, '1', 'Reservation has been Completed, Thank you for Availing our services', 'Unread', '2018-09-07 11:51:57'),
(6, '1', 'Reservation has been Completed, Thank you for Availing our services', 'Unread', '2018-09-07 11:52:00'),
(7, '20', 'Reservation has been accepted by Kio Service. You can go to the shop atSeptember 07, 2018 12:12:00and please be advised that 30 minutes late will void your contract. If you have further question you can contact us at 091234567890', 'Read', '2018-09-07 11:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `booking_id` text NOT NULL,
  `tech_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `tech_firstname` text NOT NULL,
  `tech_lastname` text NOT NULL,
  `ratings` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`id`, `company_name`, `booking_id`, `tech_id`, `customer_id`, `tech_firstname`, `tech_lastname`, `ratings`, `feedback`) VALUES
(5, 'R-system', 'BOOKING-C2ETaNvbmM', '15', '1', '', '', 4, 'Good Job'),
(20, 'R-system', 'BOOKING-mHoG9fKJ1d', '25', '8', 'R', 'ech1', 3, 'hfadbsfas'),
(42, 'R-system', 'BOOKING-lFAkgiPvtw', '25', '5', 'R', 'ech1', 4, 'Dg'),
(43, 'R-system', 'BOOKING-RL9JFxDKvE', '25', '8', 'R', 'ech1', 1, 'fasdf'),
(44, 'Kio Comp', 'BOOKING-6RlXkDhJUA', '24', '1', 'asd', 'asd', 3, ''),
(45, 'Kio Comp', 'BOOKING-Cl3kQvzgAJ', '0', '1', '', '', 1, ''),
(46, 'Kio Comp', 'BOOKING-EoO3YDcp1L', '0', '1', '', '', 4, ''),
(47, 'Kio Comp', 'BOOKING-R9hsbFXmxS', '30', '1', 'kio', 'kio', 4, ''),
(48, 'Kio Comp', 'BOOKING-R9hsbFXmxS', '30', '1', 'kio', 'kio', 4, ''),
(49, 'R-system', 'BOOKING-NV9hBb4Gi3', '29', '8', 'bon', 'sy', 3, 'feedback 3:33am'),
(50, 'R-system', 'BOOKING-TrHcyDwN1n', '25', '4', 'R', 'ech1', 2, 'feedback 3:34am'),
(51, 'RRI', 'BOOKING-PgZBb96arR', '26', '8', 'calbo', 'meron', 1, 'gfaskdg'),
(52, 'Kio Comp', 'BOOKING-nvPH2I8BfU', '24', '1', 'asd', 'asd', 1, ''),
(53, 'R-system', 'BOOKING-rBaOK0W5AT', '25', '8', 'R', 'ech1', 3, 'sdkngfasdg'),
(54, 'R-system', 'BOOKING-rBaOK0W5AT', '25', '8', 'R', 'ech1', 3, 'sdkngfasdg'),
(55, 'R-system', 'BOOKING-HYytZcObhf', '25', '10', 'R', 'ech1', 5, 'Weey'),
(56, 'RRI AUTO SERVICE CENTER', 'BOOKING-5ToEQ83Ril', '42', '13', 'Tan', 'Ibisate', 5, 'woq\r\n'),
(57, 'RRI AUTO SERVICE CENTER', 'BOOKING-54sWeyzIvo', '0', '8', '', '', 5, 'Guf'),
(58, 'RRI AUTO SERVICE CENTER', 'BOOKING-oNb4qCiJn3', '42', '8', 'Tan', 'Ibisate', 5, 'notbad'),
(59, 'RRI AUTO SERVICE CENTER', 'BOOKING-kJYZdsCT3a', '42', '8', 'Tan', 'Ibisate', 5, 'sda'),
(60, 'RRI AUTO SERVICE CENTER', 'BOOKING-kJYZdsCT3a', '42', '8', 'Tan', 'Ibisate', 5, 'sda'),
(61, 'R-system', 'BOOKING-zdRVu7HC0G', '0', '8', '', '', 1, ''),
(62, 'RRI AUTO SERVICE CENTER', 'BOOKING-EAi658bLId', '42', '8', 'Tan', 'Ibisate', 5, 'good'),
(63, 'POWERFIX AUTO SERVICES', 'BOOKING-eRc81aOIo4', '38', '8', 'powertech', 'powerfixtech', 4, 'ghd'),
(64, 'R-system', 'BOOKING-o81gC6WcHB', '53', '16', 'duffy', 'duck', 1, 'wlang kwenta'),
(65, 'Kio Service', 'BOOKING-tJUnOAYiux', '78', '20', 'sample', 'sample', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(11) NOT NULL,
  `reservation_id` text NOT NULL,
  `company_name` text NOT NULL,
  `company_id` varchar(250) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_firstname` text NOT NULL,
  `client_lastname` text NOT NULL,
  `car_model` text NOT NULL,
  `manufacturer` text NOT NULL,
  `comments` text NOT NULL,
  `service` text NOT NULL,
  `status` enum('Pending','Accepted','Completed') NOT NULL,
  `res_date` date NOT NULL,
  `res_time` time NOT NULL,
  `dtcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `reservation_id`, `company_name`, `company_id`, `client_id`, `client_firstname`, `client_lastname`, `car_model`, `manufacturer`, `comments`, `service`, `status`, `res_date`, `res_time`, `dtcreated`) VALUES
(2, '', 'AUTOMOTIVE SERVICE CENTER ', '22', 20, 'Kio', 'L', 'Sample', 'Sample', 'Sample\r\n', '', 'Pending', '2018-09-03', '19:58:25', '2018-09-03 11:58:25'),
(4, '', 'Kio Service', '25', 20, 'Kio', 'L', 'Sample', 'Sample', 'asd', '', 'Completed', '2018-09-03', '21:19:14', '2018-09-03 13:19:14'),
(5, '', 'AUTOMOTIVE SERVICE CENTER ', '22', 1, 'Kio', 'L', 'Sample', 'Sample', 'Sample ', '', 'Pending', '2018-09-07', '00:00:00', '2018-09-06 19:57:54'),
(6, '', 'AUTOMOTIVE SERVICE CENTER ', '22', 1, 'Kio', 'L', 'Sample', 'Sample', 'sample', '', 'Pending', '2018-09-07', '00:00:00', '2018-09-06 19:59:19'),
(7, '', 'Kio Service', '25', 1, 'Kio', 'L', 'Sample', 'Sample', 'sample', '', 'Completed', '2018-09-07', '03:03:00', '2018-09-06 19:59:47'),
(8, '', 'Kio Service', '25', 1, 'Kio', 'L', 'asd', 'asd', 'asd', '', 'Completed', '2018-09-07', '11:11:00', '2018-09-07 06:25:56'),
(9, '', 'Kio Service', '25', 20, 'Kio', 'L', 'Sample', 'Sample', 'Sample', '', 'Accepted', '2018-09-07', '12:12:00', '2018-09-07 11:55:34');

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
(8, 'R-system', 'OVER HEAT', 'Cooling system leaks, Wrong coolant concentration, Bad thermostat, Blocked coolant passageways, Faulty radiation, Worn/Burst hoses, Bad radiator fan, Loose or broken belt, Faulty water pump', '', 300),
(9, 'R-system', 'DRAINED BATTERY ', 'Bad alternator, Worn out battery, Faulty charging system, left something on, Electrical problem', '', 350),
(10, 'R-system', 'FLAT', 'Puncture by sharp object, Failure or Damage to the valve stem, Rubbed an ripped tire, Tire bead leaks, Separation of tire and rim by collision with another object', '', 450),
(18, 'R-system', 'DAMAGE TIRES AND WHEELS', 'Misalignment Camber wear Emergency braking Cuts and tears Impact damage ', '', 350),
(19, 'R-system', 'FAULTY SPARK PLUGS', 'Slow acceleration Poor fuel economy Engine is misfiring Difficulty starting the vehicle', '', 400),
(20, 'POWERFIX AUTO SERVICES', 'FLAT', 'Puncture by sharp object, Failure or Damage to the valve stem, Rubbed an ripped tire, Tire bead leaks, Separation of tire and rim by collision with another object', 'A', 400),
(21, 'POWERFIX AUTO SERVICES', 'DRAINED BATTERY ', 'Bad alternator, Worn out battery, Faulty charging system, left something on, Electrical problem', 'A', 500),
(22, 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'DAMAGE TIRES AND WHEELS', 'Misalignment Camber wear Emergency braking Cuts and tears Impact damage ', '', 300),
(23, 'AUTOMOTIVE SERVICE CENTER & MACHINE SHOP ', 'FAULTY SPARK PLUGS', 'Slow acceleration Poor fuel economy Engine is misfiring Difficulty starting the vehicle', '', 350),
(24, 'PRENS AUTO PARTS & SERVICES', 'DAMAGE TIRES AND WHEELS', 'Misalignment Camber wear Emergency braking Cuts and tears Impact damage ', 'A', 200),
(25, 'PRENS AUTO PARTS & SERVICES', 'FAULTY SPARK PLUGS', 'Slow acceleration Poor fuel economy Engine is misfiring Difficulty starting the vehicle', 'A', 250),
(26, 'PRENS AUTO PARTS & SERVICES', 'OVER HEAT', 'Cooling system leaks, Wrong coolant concentration, Bad thermostat, Blocked coolant passageways, Faulty radiation, Worn/Burst hoses, Bad radiator fan, Loose or broken belt, Faulty water pump', 'A', 270),
(27, 'PRENS AUTO PARTS & SERVICES', 'DRAINED BATTERY ', 'Bad alternator, Worn out battery, Faulty charging system, left something on, Electrical problem', 'A', 300),
(28, 'RRI AUTO SERVICE CENTER', 'OVER HEAT', 'Cooling system leaks, Wrong coolant concentration, Bad thermostat, Blocked coolant passageways, Faulty radiation, Worn/Burst hoses, Bad radiator fan, Loose or broken belt, Faulty water pump', 'C', 320),
(29, 'RRI AUTO SERVICE CENTER', 'DAMAGE TIRES AND WHEELS', 'Misalignment Camber wear Emergency braking Cuts and tears Impact damage ', 'C', 340),
(30, 'RRI AUTO SERVICE CENTER', 'FLAT', 'Puncture by sharp object, Failure or Damage to the valve stem, Rubbed an ripped tire, Tire bead leaks, Separation of tire and rim by collision with another object', 'C', 350),
(31, 'RRI AUTO SERVICE CENTER', 'DRAINED BATTERY ', 'Bad alternator, Worn out battery, Faulty charging system, left something on, Electrical problem', 'C', 370),
(32, 'RRI AUTO SERVICE CENTER', 'FAULTY SPARK PLUGS', 'Slow acceleration Poor fuel economy Engine is misfiring Difficulty starting the vehicle', 'C', 400),
(33, 'asd', 'a', 'a', 'a', 1),
(34, 'Kio Service', 'Vulcanize', 'Sample decsription', 'This is a sample category', 1000),
(35, 'Kio Service', 'Accuracy Score always return 0.0 using SVM and NB Algorithm in Tweeter Gathered Data', 'asdww', 'Reservation', 1233);

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
(14, '', 'kobe', '$2y$10$zlQFbUdkWYasmwA0Ib3OLeZYAt6XId06rbR6cvCSPrnHOY6bzs0Zi', 'kobe', 'v', 'santarin', 'kobe@gmail.com', '+639091526368', '', 'Bacoor Cavite', '0000-00-00', 'Active', '2018-07-25 03:23:48'),
(15, '', 'user', '$2y$10$MJo7zG5e6.f3AQkpN4A7vOMC8m9kyVmdGgjtjXiTVVm71VDGsWrqS', 'us', 'er', 'onetwothree', 'user@gmail.com', '+639123456789', '', '0816 than a 5 back or kacivite', '0000-00-00', 'Active', '2018-07-31 16:56:12'),
(16, '', 'user2', '$2y$10$DZE4HjTNZSiD941jvkTIvuRPBF.dLYb9JfoxmpTLW0Xzpr0YrkGM6', 'us', 'er', 'two', 'use2@gmail.com', '+639222222333', '', 'ussr2 jwiwbu', '0000-00-00', 'Active', '2018-07-31 16:59:02'),
(17, '', 'ace', '$2y$10$cL5.oH8DAy3rqx2g/7vm6.A6OuqjImsxYxe5iGkt/9dXvFu8gevt.', 'ace', 's', 'duke', 'saracanlaojuan@gmail.com', '+639104886689', '', 'las pinas\r\n', '0000-00-00', 'Active', '2018-07-31 17:03:07'),
(19, '', 'jacob', '$2y$10$pvoYOtveSJzP8dR41rgeDOMX/T5Jq27RtevH/XQWaOYwUkq.Wykz2', 'Jacob', 'Tan', 'Dioso', 'Diosojacob@gmail.com', '+639104886689', '', 'Las pinas', '0000-00-00', 'Active', '2018-08-28 15:48:44'),
(20, '', 'kio', '$2y$10$taysYmpDe7JwfbU9cldqe.ACBPjH0BXfdOaMXFALb8QD6T17xhHpG', 'Kio', 'H', 'L', 'neilgipaya@gmail.com', '09215388860', '', '8th Street Balimbing\r\nNorth Signal Village', '0000-00-00', 'Active', '2018-09-02 15:20:36');

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
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
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
-- Indexes for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_company_users`
--
ALTER TABLE `tbl_company_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_customer_concern`
--
ALTER TABLE `tbl_customer_concern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_inquiries`
--
ALTER TABLE `tbl_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
