-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 12:44 PM
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
-- Database: `computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`) VALUES
(1, 'Alphastar'),
(7, 'My Company is my company none '),
(13, 'asf'),
(14, 'Meri hai ye company'),
(15, 'Meri hai ye company'),
(16, 'Meri Nayi company');

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
  `work_for` int(11) DEFAULT NULL,
  `remarks` varchar(512) DEFAULT NULL,
  `complaint_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `hardware_id` int(11) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `grn` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `supplier` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`hardware_id`, `company`, `description`, `price`, `grn`, `name`, `state`, `supplier`) VALUES
(170, 1, 'Alphastar ka keyboard', 132, 44, 2, 0, NULL),
(172, 1, 'asd', 123, 1, 14, 0, NULL),
(173, 14, '3', 1, 3, 14, 0, NULL),
(174, 1, 'bjk', NULL, 1, 6, 1, NULL),
(175, 1, 'bkj', NULL, 1, 5, 1, NULL),
(176, 1, 'bjk', NULL, 1, 4, 1, NULL),
(177, 1, 'bjkb', NULL, 1, 1, 1, NULL),
(178, 1, 'jk', NULL, 1, 2, 1, NULL),
(179, 1, 'bkj', NULL, 1, 3, 1, NULL),
(180, 16, 'nln', NULL, 1, 6, 1, NULL),
(181, 16, 'li', NULL, 1, 5, 1, NULL),
(182, 16, 'ljkn', NULL, 1, 4, 1, NULL),
(183, 16, 'ln', NULL, 1, 1, 1, NULL),
(184, 16, 'lknkl', NULL, 1, 2, 1, NULL),
(185, 16, 'nk', NULL, 1, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_position`
--

CREATE TABLE `hardware_position` (
  `hardware_position_id` int(11) NOT NULL,
  `hardware_id` int(11) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue_request`
--

CREATE TABLE `issue_request` (
  `issue_report_id` int(11) NOT NULL,
  `department` varchar(30) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `purpose` text,
  `date_of_request` date DEFAULT NULL,
  `name_of_hardware` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_request`
--

INSERT INTO `issue_request` (`issue_report_id`, `department`, `id`, `purpose`, `date_of_request`, `name_of_hardware`) VALUES
(3, 'CS', 0, 'Halwa', '2018-07-09', 1);

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
(15, '1', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(11) NOT NULL,
  `MAC_ADDR` varchar(30) DEFAULT NULL,
  `processor` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `memory` int(11) NOT NULL,
  `DOP` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `os` varchar(30) DEFAULT NULL,
  `monitor` int(11) NOT NULL,
  `keyboard` int(11) NOT NULL,
  `mouse` int(11) NOT NULL,
  `grn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `MAC_ADDR`, `processor`, `ram`, `memory`, `DOP`, `price`, `state`, `os`, `monitor`, `keyboard`, `mouse`, `grn`) VALUES
(43, '134', 181, 180, 182, '2001-12-21', 0, 'ACTIVE', 'lnk', 185, 184, 183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `id` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass_word` varchar(512) DEFAULT NULL,
  `role` int(5) DEFAULT NULL,
  `contact_no` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `id`, `first_name`, `last_name`, `email`, `pass_word`, `role`, `contact_no`) VALUES
(0, '0', 'Krish', 'Lalwani', 'krishlalwani1@gmail.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL),
(2, '11', 'new', 'one', 'new@one.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL),
(3, '12', 'new', 'two', 'new@two.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL),
(4, '111', 'Harsh', 'Manglani', 'harsh@manglani.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL),
(5, '101', '1qwe', 'qwer', 'krishlalwani1@gmail.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `name_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`name_id`, `name`) VALUES
(1, 'mouse'),
(2, 'keyboard'),
(3, 'monitor'),
(4, 'memory'),
(5, 'processor'),
(6, 'ram'),
(12, 'Other'),
(13, 'Me hu ghadi'),
(14, 'Mobile'),
(15, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `software_id` int(11) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `grn` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supname` varchar(30) DEFAULT NULL,
  `sup_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supname`, `sup_id`) VALUES
('IMB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system_transfer_report`
--

CREATE TABLE `system_transfer_report` (
  `system_transfer_report_id` int(11) NOT NULL,
  `department` varchar(30) DEFAULT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `purpose` text,
  `date_of_assignment` date DEFAULT NULL,
  `trid` int(11) DEFAULT NULL
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
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `complaint_book`
--
ALTER TABLE `complaint_book`
  ADD PRIMARY KEY (`complaint_book_id`),
  ADD KEY `fk_1` (`machine_id`),
  ADD KEY `FK1` (`work_for`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`hardware_id`),
  ADD KEY `FK_company` (`company`),
  ADD KEY `FK_name` (`name`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `hardware_position`
--
ALTER TABLE `hardware_position`
  ADD PRIMARY KEY (`hardware_position_id`),
  ADD KEY `FK_HW` (`hardware_id`),
  ADD KEY `FK_LAB` (`lab_id`),
  ADD KEY `FK_MEM` (`member_id`);

--
-- Indexes for table `issue_request`
--
ALTER TABLE `issue_request`
  ADD PRIMARY KEY (`issue_report_id`),
  ADD KEY `fK_issue` (`name_of_hardware`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`),
  ADD KEY `fk_processor` (`processor`),
  ADD KEY `fk_ram` (`ram`),
  ADD KEY `fk_memory` (`memory`),
  ADD KEY `fk_monitor` (`monitor`),
  ADD KEY `fk_keyboard` (`keyboard`),
  ADD KEY `fk_mouse` (`mouse`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`name_id`);

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
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`software_id`),
  ADD KEY `FK_company2` (`company`),
  ADD KEY `FK_name2` (`name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD PRIMARY KEY (`system_transfer_report_id`),
  ADD KEY `fk_str` (`lab_id`),
  ADD KEY `fk_streport` (`trid`);

--
-- Indexes for table `transfer_request`
--
ALTER TABLE `transfer_request`
  ADD PRIMARY KEY (`transfer_request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `complaint_book`
--
ALTER TABLE `complaint_book`
  MODIFY `complaint_book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `hardware_position`
--
ALTER TABLE `hardware_position`
  MODIFY `hardware_position_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_request`
--
ALTER TABLE `issue_request`
  MODIFY `issue_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair_history`
--
ALTER TABLE `repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  MODIFY `system_transfer_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_request`
--
ALTER TABLE `transfer_request`
  MODIFY `transfer_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint_book`
--
ALTER TABLE `complaint_book`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`work_for`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `FK_company` FOREIGN KEY (`company`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_name` FOREIGN KEY (`name`) REFERENCES `name` (`name_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup_id`);

--
-- Constraints for table `hardware_position`
--
ALTER TABLE `hardware_position`
  ADD CONSTRAINT `FK_HW` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LAB` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEM` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue_request`
--
ALTER TABLE `issue_request`
  ADD CONSTRAINT `fK_issue` FOREIGN KEY (`name_of_hardware`) REFERENCES `name` (`name_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `machine`
--
ALTER TABLE `machine`
  ADD CONSTRAINT `fk_keyboard` FOREIGN KEY (`keyboard`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_memory` FOREIGN KEY (`memory`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_monitor` FOREIGN KEY (`monitor`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mouse` FOREIGN KEY (`mouse`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_processor` FOREIGN KEY (`processor`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ram` FOREIGN KEY (`ram`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `FK_company2` FOREIGN KEY (`company`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_name2` FOREIGN KEY (`name`) REFERENCES `name` (`name_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD CONSTRAINT `fk_str` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_streport` FOREIGN KEY (`trid`) REFERENCES `transfer_request` (`transfer_request_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;