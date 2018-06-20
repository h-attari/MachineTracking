-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2018 at 10:18 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint_book`
--

CREATE TABLE `complaint_book` (
  `complaint_book_id` int(11) NOT NULL,
  `Date_of_complaint` date DEFAULT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `complaint_details` varchar(512) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `work_for` varchar(50) DEFAULT NULL,
  `remarks` varchar(512) DEFAULT NULL,
  `complaint_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_book`
--

INSERT INTO `complaint_book` (`complaint_book_id`, `Date_of_complaint`, `machine_id`, `complaint_details`, `priority`, `work_for`, `remarks`, `complaint_by`) VALUES
(1, '2018-06-20', 1, 'Not working properly', 3, NULL, NULL, 'Krish Lalwani'),
(2, '2018-06-20', 2, 'RAM NOT WORKING', 5, NULL, NULL, 'Anurag'),
(3, '2018-06-20', 3, 'RAM NOT WORKING', 5, NULL, NULL, 'Anurag'),
(6, '2018-06-20', 4, 'SOME FAULT', 4, NULL, NULL, 'Anurag'),
(7, '2018-06-20', 5, 'Hello World', 2, 'Pankaj', 'Good Morning', 'Krish'),
(8, '2018-06-20', 5, 'new hello', 4, 'Pankaj', NULL, 'Krish');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `name`, `department`) VALUES
(3, '002', NULL),
(4, '001', NULL),
(5, '003', NULL),
(6, '004', NULL),
(8, 'B', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(11) NOT NULL,
  `MAC_ADDR` varchar(30) DEFAULT NULL,
  `processor` varchar(30) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `memory` varchar(20) DEFAULT NULL,
  `DOP` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `MAC_ADDR`, `processor`, `ram`, `memory`, `DOP`, `price`, `state`) VALUES
(1, '01', 'intel', '4 GB', '128 GB', '2012-09-23', 12999, 'ACTIVE'),
(2, '03', 'intel i5', '8 GB', '500 GB', '2017-04-08', 30000, 'INACTIVE'),
(3, '10', 'intel i5', '4 GB', '320 GB', '2018-02-02', 39000, 'ACTIVE'),
(4, '1101', 'intel i5', '8 GB', '1 TB', '2018-05-01', 45000, 'ACTIVE'),
(5, '1010', 'i3', '4 GB', '1 TB', '2018-06-08', 13000, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `machine_id`, `lab_id`, `initial_date`, `final_date`) VALUES
(1, 1, 4, '2007-05-05', '2008-05-05'),
(2, 1, 3, '2008-05-05', '2009-05-05'),
(3, 1, 3, '2009-06-06', '0000-00-00'),
(4, 2, 5, '2017-04-08', '2018-01-01'),
(5, 2, 3, '2018-02-02', '2018-03-03'),
(6, 3, 6, '2018-02-02', '2018-06-20'),
(7, 1, 4, '2018-05-31', '0000-00-00'),
(8, 2, 4, '2018-05-31', '2018-05-31'),
(9, 2, 4, '2018-05-31', '2018-05-31'),
(10, 2, 5, '2018-05-31', '2018-05-31'),
(11, 4, 8, '2018-02-02', '2018-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `repair_history`
--

CREATE TABLE `repair_history` (
  `repair_history_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL,
  `fault` varchar(500) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_history`
--

INSERT INTO `repair_history` (`repair_history_id`, `machine_id`, `initial_date`, `final_date`, `fault`, `cost`) VALUES
(2, 1, '2009-05-05', '2009-06-06', 'RAM IC FAULT', 3000),
(3, 2, '2018-01-01', '2018-02-02', 'COOLING FAN ERROR', 2000),
(4, 2, '2018-03-03', '2018-05-31', 'Hard Disk Crash', 4000),
(5, 2, '2018-05-31', '2018-05-31', 'COOLING FAN ERROR', 5000),
(6, 2, '2018-05-31', '0000-00-00', NULL, NULL),
(7, 3, '2018-06-20', '0000-00-00', NULL, NULL),
(8, 4, '2018-06-20', '0000-00-00', NULL, NULL),
(9, 5, '2018-06-20', '2018-06-25', 'Good Morning', 1000),
(10, 5, '2018-06-20', '2018-06-28', 'Good Morning', 100);

-- --------------------------------------------------------

--
-- Table structure for table `system_transfer_report`
--

CREATE TABLE `system_transfer_report` (
  `system_transfer_report_id` int(11) NOT NULL,
  `department` varchar(30) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `purpose` text,
  `date_of_assignment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_request`
--

CREATE TABLE `transfer_request` (
  `transfer_request_id` int(11) NOT NULL,
  `date_of_request` date DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `purpose` text,
  `processor` varchar(100) DEFAULT NULL,
  `ram` varchar(10) DEFAULT NULL,
  `hdd` varchar(10) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_request`
--

INSERT INTO `transfer_request` (`transfer_request_id`, `date_of_request`, `name`, `department`, `purpose`, `processor`, `ram`, `hdd`, `os`, `quantity`) VALUES
(1, '2018-06-20', 'Krish', 'IT', 'for project development', '', '', NULL, '', 2),
(2, '2018-06-20', 'Anurag', 'IT', 'for project development', '', '', NULL, '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint_book`
--
ALTER TABLE `complaint_book`
  ADD PRIMARY KEY (`complaint_book_id`),
  ADD KEY `fk_1` (`machine_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `machine_id` (`machine_id`),
  ADD KEY `lab_id` (`lab_id`);

--
-- Indexes for table `repair_history`
--
ALTER TABLE `repair_history`
  ADD PRIMARY KEY (`repair_history_id`),
  ADD KEY `machine_id` (`machine_id`);

--
-- Indexes for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD PRIMARY KEY (`system_transfer_report_id`),
  ADD KEY `fk_str` (`lab_id`);

--
-- Indexes for table `transfer_request`
--
ALTER TABLE `transfer_request`
  ADD PRIMARY KEY (`transfer_request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint_book`
--
ALTER TABLE `complaint_book`
  MODIFY `complaint_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `repair_history`
--
ALTER TABLE `repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  MODIFY `system_transfer_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_request`
--
ALTER TABLE `transfer_request`
  MODIFY `transfer_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint_book`
--
ALTER TABLE `complaint_book`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repair_history`
--
ALTER TABLE `repair_history`
  ADD CONSTRAINT `repair_history_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD CONSTRAINT `fk_str` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
