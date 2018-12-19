-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 03:34 AM
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
(4, '', 'x', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-03-31 22:29:51', 'Active'),
(5, '', 'x', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-04-01 10:18:16', 'Active'),
(6, '', 'x', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-04-01 10:43:15', 'Active'),
(7, '../../uploads', 'xx', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-04-02 09:50:39', 'Active'),
(8, '../../uploads', 'xx', 'x', 'x', 'x', 'x', '00:00:00', '00:00:00', '2018-04-02 09:51:12', 'Active'),
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
  `isOnline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company_users`
--

INSERT INTO `tbl_company_users` (`id`, `company_id`, `company_name`, `email`, `username`, `password`, `role`, `profile`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `contact`, `gender`, `address`, `status`, `dtcreated`, `isOnline`) VALUES
(2, '', '', 'asd@yahoo.com', 'asd', '$2y$10$hLJ/dI/oEYrMpLPFHbuPleydceA1ATW5/1A.Lq0wFFPwmVU5PDvBu', 'Staff', '../../uploads/image003.png', 'asdsaxz', 'asdxxasd', 'asd', '2018-12-31', 0, '+639215388860', 'Male', 'asd', 'Active', '2018-04-02 14:10:41', ''),
(11, '', 'Aviarthard Software Solutions', 'neilgipaya@gmail.com', 'kio', '$2y$10$RmTSj.LIUVxYdc5LzjGGiOosjC6Mtrg/GEonhFWSGrU2Bztly/QQ.', 'Admin', '', '', '', '', '0000-00-00', 0, '', 'Male', '', 'Active', '2018-04-05 22:58:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `company_name`, `title`, `description`, `category`) VALUES
(1, 'Aviarthard Software Solutions', 'asdxxasd', 'asdxxasd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
