-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2018 at 12:48 PM
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
  `company` varchar(30) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `grn` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`hardware_id`, `company`, `description`, `price`, `grn`, `name`, `state`) VALUES
(2, 'inbuilt', 'intel i5', NULL, 11, 'processor', 1),
(3, 'inbuilt', '4 GB', NULL, 11, 'ram', 1),
(4, 'inbuilt', '320 GB', NULL, 11, 'harddisk', 1),
(5, 'inbuilt', 'laser', NULL, 11, 'mouse', 1),
(6, 'inbuilt', 'big', NULL, 11, 'keyboard', 0),
(7, 'inbuilt', '15 inch', NULL, 11, 'monitor', 1),
(8, 'asi', 'big', 1000, 12, 'keyboard', 1),
(9, 'inbuilt', '8 GB', NULL, 15, 'ram', 1),
(10, 'inbuilt', 'intel i5', NULL, 15, 'processor', 1),
(11, 'inbuilt', '500 GB', NULL, 15, 'harddisk', 1),
(12, 'inbuilt', 'laser', NULL, 15, 'mouse', 1),
(13, 'inbuilt', 'rubber', NULL, 15, 'keyboard', 1),
(14, 'inbuilt', '15 inch', NULL, 15, 'monitor', 1),
(15, 'inbuilt', '133', NULL, 123, 'ram', 1),
(16, 'inbuilt', 'i5', NULL, 123, 'processor', 1),
(17, 'inbuilt', '929', NULL, 123, 'harddisk', 1),
(18, 'inbuilt', 'jrjr', NULL, 123, 'mouse', 1),
(19, 'inbuilt', 'jrjr', NULL, 123, 'keyboard', 1),
(20, 'inbuilt', 'krkr', NULL, 123, 'monitor', 1),
(21, 'inbuilt', 'jhv', NULL, 1234, 'ram', 1),
(22, 'inbuilt', 'asvdjv', NULL, 1234, 'processor', 1),
(23, 'inbuilt', 'jhvjh', NULL, 1234, 'harddisk', 1),
(24, 'inbuilt', 'vhjv', NULL, 1234, 'mouse', 1),
(25, 'inbuilt', 'jhv', NULL, 1234, 'keyboard', 1),
(26, 'inbuilt', 'jv', NULL, 1234, 'monitor', 1),
(27, 'inbuilt', 'gjhbj', NULL, 425, 'ram', 1),
(28, 'inbuilt', 'ghjvbj', NULL, 425, 'processor', 1),
(29, 'inbuilt', 'jhbjh', NULL, 425, 'harddisk', 1),
(30, 'inbuilt', 'jhjh', NULL, 425, 'mouse', 1),
(31, 'inbuilt', 'jh', NULL, 425, 'keyboard', 1),
(32, 'inbuilt', 'jh', NULL, 425, 'monitor', 1),
(33, 'inbuilt', 'bkb', NULL, 2, 'ram', 1),
(34, 'inbuilt', 'jk', NULL, 2, 'processor', 1),
(35, 'inbuilt', 'jkbj', NULL, 2, 'harddisk', 1),
(36, 'inbuilt', 'kbjk', NULL, 2, 'mouse', 1),
(37, 'inbuilt', 'bjk', NULL, 2, 'keyboard', 1),
(38, 'inbuilt', 'bjkb', NULL, 2, 'monitor', 1),
(39, 'inbuilt', 'hk', NULL, 10, 'ram', 1),
(40, 'inbuilt', 'e', NULL, 10, 'processor', 1),
(41, 'inbuilt', 'kbk', NULL, 10, 'harddisk', 1),
(42, 'inbuilt', 'bkb', NULL, 10, 'mouse', 1),
(43, 'inbuilt', 'knk', NULL, 10, 'keyboard', 1),
(44, 'inbuilt', 'nkn', NULL, 10, 'monitor', 1),
(45, 'inbuilt', 'nk', NULL, 1000, 'ram', 1),
(46, 'inbuilt', 'g', NULL, 1000, 'processor', 1),
(47, 'inbuilt', 'nkn', NULL, 1000, 'harddisk', 1),
(48, 'inbuilt', 'knk', NULL, 1000, 'mouse', 1),
(49, 'inbuilt', 'nkn', NULL, 1000, 'keyboard', 1),
(50, 'inbuilt', 'n', NULL, 1000, 'monitor', 1);

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
(30, '46545', 23, 22, 24, '2018-05-09', 346354, 'ACTIVE', 'juhgjhg', 27, 26, 25, 425),
(31, '89', 28, 27, 29, '2002-01-31', 0, 'ACTIVE', 'jk', 32, 31, 30, 2),
(32, '102', 34, 33, 35, '2021-02-12', 0, 'ACTIVE', 'knk', 38, 37, 36, 10),
(33, '1', 40, 39, 41, '2012-12-12', 0, 'ACTIVE', 'knk', 44, 43, 42, 1000);

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
  `pass_word` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `id`, `first_name`, `last_name`, `email`, `pass_word`) VALUES
(0, '0', 'Krish', 'Lalwani', 'krishlalwani1@gmail.com', '4f2a91d6913739834ec9c3d4f9203534'),
(2, '11', 'new', 'one', 'new@one.com', '4f2a91d6913739834ec9c3d4f9203534'),
(3, '12', 'new', 'two', 'new@two.com', '4f2a91d6913739834ec9c3d4f9203534'),
(4, '111', 'Harsh', 'Manglani', 'harsh@manglani.com', '4f2a91d6913739834ec9c3d4f9203534'),
(5, '101', '1qwe', 'qwer', 'krishlalwani1@gmail.com', '4f2a91d6913739834ec9c3d4f9203534');

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
  `company` varchar(30) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `grn` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`hardware_id`);

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
  ADD PRIMARY KEY (`software_id`);

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
-- AUTO_INCREMENT for table `complaint_book`
--
ALTER TABLE `complaint_book`
  MODIFY `complaint_book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
-- Constraints for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD CONSTRAINT `fk_str` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_streport` FOREIGN KEY (`trid`) REFERENCES `transfer_request` (`transfer_request_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
