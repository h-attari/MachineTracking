-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2018 at 11:18 AM
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
(16, 'Meri Nayi company'),
(17, 'Me hu na'),
(18, 'Koi mil gya'),
(19, 'Krish');

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
  `complaint_by` varchar(40) DEFAULT NULL,
  `processor` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `harddisk` int(11) DEFAULT NULL,
  `mouse` int(11) DEFAULT NULL,
  `keyboard` int(11) DEFAULT NULL,
  `monitor` int(11) DEFAULT NULL,
  `DOPR` date DEFAULT NULL,
  `completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_book`
--

INSERT INTO `complaint_book` (`complaint_book_id`, `Date_of_complaint`, `machine_id`, `complaint_details`, `priority`, `work_for`, `remarks`, `complaint_by`, `processor`, `ram`, `harddisk`, `mouse`, `keyboard`, `monitor`, `DOPR`, `completed`) VALUES
(3, '2018-07-11', 59, 'pata nhi', 5, 2, NULL, 'krish', 1, 1, NULL, NULL, NULL, NULL, '2018-07-18', -1),
(4, '2018-07-11', 60, 'dsfjlksdfj', 2, 3, 'adsd', 'krsi', 1, 1, NULL, NULL, NULL, NULL, '2018-07-10', 1),
(5, '2018-07-17', 61, 'as', 1, 3, 'sadsad', 'anrug', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, '2018-07-18', 63, 'sfsdf', 1, 3, 'asdsad', 'sfdafds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, '2018-07-18', 62, 'dfsd', 3, 3, 'asdsa', 'sdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, '2018-07-18', 64, 'gvxvdxf', 3, 4, NULL, 'gtrgtsrgvrd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `device_repair_history`
--

CREATE TABLE `device_repair_history` (
  `repair_history_id` int(11) NOT NULL,
  `hardware_id` int(11) DEFAULT NULL,
  `initial_date` date DEFAULT NULL,
  `final_date` date DEFAULT NULL,
  `fault` varchar(500) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_repair_history`
--

INSERT INTO `device_repair_history` (`repair_history_id`, `hardware_id`, `initial_date`, `final_date`, `fault`, `cost`) VALUES
(2, 302, '2018-07-17', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `hardware_id` int(11) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
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
(302, 19, 2, NULL, 1, 6, 3, 1),
(303, 19, 1, NULL, 1, 5, 0, 1),
(304, 19, 1, NULL, 1, 4, 1, 1),
(305, 19, 4, NULL, 1, 1, 1, 1),
(306, 19, 1, NULL, 1, 2, 1, 1),
(307, 19, 1, NULL, 1, 3, 2, 1),
(308, 19, 16, NULL, 1, 6, -1, 2),
(309, 19, 18, NULL, 1, 5, -1, 2),
(310, 19, NULL, NULL, 1, 4, 1, 2),
(311, 19, 1, NULL, 1, 1, 1, 2),
(312, 19, 6, NULL, 1, 2, 1, 2),
(313, 19, 9, NULL, 1, 3, 1, 2),
(314, 19, 15, NULL, 33, 6, 1, 1),
(315, 19, 17, NULL, 33, 5, 1, 1),
(316, 19, 11, NULL, 33, 4, 1, 1),
(317, 19, 1, NULL, 33, 1, 1, 1),
(318, 19, 6, NULL, 33, 2, 1, 1),
(319, 19, 9, NULL, 33, 3, 1, 1),
(320, 19, 15, NULL, 33, 6, 1, 1),
(321, 19, 17, NULL, 33, 5, 1, 1),
(322, 19, 11, NULL, 33, 4, 2, 1),
(323, 19, 1, NULL, 33, 1, 1, 1),
(324, 19, 6, NULL, 33, 2, 1, 1),
(325, 19, 9, NULL, 33, 3, 1, 1),
(326, 19, 15, NULL, 33, 6, 1, 1),
(327, 19, 17, NULL, 33, 5, 1, 1),
(328, 19, 11, NULL, 33, 4, 1, 1),
(329, 19, 1, NULL, 33, 1, 1, 1),
(330, 19, 6, NULL, 33, 2, 1, 1),
(331, 19, 9, NULL, 33, 3, 1, 1),
(332, 1, 15, NULL, 1, 6, 1, 3),
(333, 1, 19, NULL, 1, 5, 1, 3),
(334, 1, 11, NULL, 1, 4, 1, 3),
(335, 1, 1, NULL, 1, 1, 1, 3),
(336, 1, 8, NULL, 1, 2, 1, 3),
(337, 1, 9, NULL, 1, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hardware_complaint_book`
--

CREATE TABLE `hardware_complaint_book` (
  `hardware_complaint_book_id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `date_of_complaint` date DEFAULT NULL,
  `hardware_id` int(11) DEFAULT NULL,
  `complaint_details` varchar(512) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `work_for` int(11) DEFAULT NULL,
  `remarks` varchar(512) DEFAULT NULL,
  `complaint_by` varchar(40) DEFAULT NULL,
  `completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware_complaint_book`
--

INSERT INTO `hardware_complaint_book` (`hardware_complaint_book_id`, `date_of_complaint`, `hardware_id`, `complaint_details`, `priority`, `work_for`, `remarks`, `complaint_by`, `completed`) VALUES
(1, '2018-07-17', 302, 'as', 2, 2, NULL, 'a', NULL);

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

--
-- Dumping data for table `hardware_position`
--

INSERT INTO `hardware_position` (`hardware_position_id`, `hardware_id`, `lab_id`, `member_id`, `initial_date`, `final_date`) VALUES
(1, 307, NULL, 0, '2018-07-17', '0000-00-00'),
(2, 322, NULL, 0, '2018-07-17', '0000-00-00'),
(3, 302, NULL, 0, '2018-07-17', '2018-07-17');

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
(15, '1', 'CS'),
(16, '2', 'IT');

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
(59, '1', 303, 302, 304, '2018-07-08', 123, 'INACTIVE', '1', 307, 306, 305, 1),
(60, '12', 303, 303, 310, '2018-07-15', 20000, 'ACTIVE', 'Windows', 313, 312, 311, 1),
(61, '33', 315, 314, 316, '2018-07-01', 12345, 'ACTIVE', 'windows', 319, 318, 317, 33),
(62, '34', 321, 320, 322, '2018-07-01', 12345, 'INACTIVE', 'windows', 325, 324, 323, 33),
(63, '35', 327, 326, 328, '2018-07-01', 12345, 'INACTIVE', 'windows', 331, 330, 329, 33),
(64, '4433', 333, 332, 334, '2018-07-01', 1221321, 'INACTIVE', 'osx', 337, 336, 335, 1);

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
(5, '101', '1qwe', 'qwer', 'krishlalwani1@gmail.com', '4f2a91d6913739834ec9c3d4f9203534', NULL, NULL),
(6, '`123', 'qwertyuioplkjhgfdsazxcvbnm', 'qwertyuioplkjhgfdsazxcvbnmlkjh', 'uytr@123.23', '5434cd09280febb2d7f6abd3ca56c6dc', 2, 123),
(7, '54/', 'new', 'two', 'new@two.com', '8a33af00a68dfd27064174a2ff1b771c', 2, 2568);

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
(1, 'Mouse'),
(2, 'keyboard'),
(3, 'monitor'),
(4, 'harddisk'),
(5, 'processor'),
(6, 'ram'),
(17, 'Other');

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
(1, 61, 16, '2018-07-12', '2018-07-12'),
(2, 62, 15, '2018-07-16', '2018-07-18'),
(3, 64, 16, '2018-07-15', '1970-01-01'),
(4, 60, NULL, '2018-07-17', '1970-01-01'),
(5, 61, 16, '2018-07-15', '1970-01-01');

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
(3, 59, '2018-07-11', '0000-00-00', NULL, NULL),
(4, 60, '2018-07-10', '2018-07-17', 'fdgfd', 0),
(5, 61, '2018-07-12', '2018-07-15', 'ram ', 1000),
(6, 63, '2018-07-18', '0000-00-00', NULL, NULL),
(7, 62, '2018-07-18', '0000-00-00', NULL, NULL),
(9, 64, '2018-07-08', '0000-00-00', NULL, NULL);

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
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `spec_id` int(11) NOT NULL,
  `spec` varchar(50) DEFAULT NULL,
  `name_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`spec_id`, `spec`, `name_id`) VALUES
(1, 'Wireless Mouse', 1),
(2, 'Trackball Mouse', 1),
(4, 'Optical Mouse', 1),
(5, 'Laser Mouse', 1),
(6, 'Wired Membrane', 2),
(7, 'Wireless Membrane', 2),
(8, 'Wired Mechanical', 2),
(9, 'LCD', 3),
(10, 'LED', 3),
(11, '128 GB', 4),
(12, '256 GB', 4),
(13, '1 TB', 4),
(14, '2 TB', 4),
(15, '2 GB', 6),
(16, '1 GB', 6),
(17, 'Intel Pentium Dual Core', 5),
(18, 'Intel i3 Processors (Ivy Bridge)', 5),
(19, 'Intel i5 Processors', 5),
(20, 'Intel i7 Processors', 5),
(21, 'Wireless Mechanical', 2),
(22, 'CRT Monitor', 3),
(36, '33 GB', 6);

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
('IMB', 1),
('Me nhi hu na', 2),
('wetew', 3);

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
-- Table structure for table `system_transfer_report_history`
--

CREATE TABLE `system_transfer_report_history` (
  `system_transfer_report_history_id` int(11) NOT NULL,
  `system_transfer_report_id` int(11) DEFAULT NULL,
  `machine_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `temp_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `processor` int(11) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `mouse` int(11) DEFAULT NULL,
  `harddisk` int(11) DEFAULT NULL,
  `keyboard` int(11) DEFAULT NULL,
  `monitor` int(11) DEFAULT NULL
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
(1, '2018-07-16', 'dfd', 'dfsdfs', 'sdfdsf', '1', '2', '1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upgrade_history`
--

CREATE TABLE `upgrade_history` (
  `upgrade_history_id` int(11) NOT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `processori` int(11) DEFAULT NULL,
  `rami` int(11) DEFAULT NULL,
  `memoryi` int(11) DEFAULT NULL,
  `processorf` int(11) DEFAULT NULL,
  `ramf` int(11) DEFAULT NULL,
  `memoryf` int(11) DEFAULT NULL,
  `dateofupgrade` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upgrade_history`
--

INSERT INTO `upgrade_history` (`upgrade_history_id`, `machine_id`, `processori`, `rami`, `memoryi`, `processorf`, `ramf`, `memoryf`, `dateofupgrade`) VALUES
(1, 60, 309, 308, 310, 303, 303, 310, '2018-07-18');

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
-- Indexes for table `device_repair_history`
--
ALTER TABLE `device_repair_history`
  ADD PRIMARY KEY (`repair_history_id`),
  ADD KEY `fk_devicehistory_hardwareid` (`hardware_id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`hardware_id`),
  ADD KEY `FK_company` (`company`),
  ADD KEY `FK_name` (`name`),
  ADD KEY `supplier` (`supplier`),
  ADD KEY `fk_description` (`description`);

--
-- Indexes for table `hardware_complaint_book`
--
ALTER TABLE `hardware_complaint_book`
  ADD PRIMARY KEY (`hardware_complaint_book_id`),
  ADD KEY `fk_hardwarecomplaint_hardwareid` (`hardware_id`),
  ADD KEY `fk_hardware_workfor` (`work_for`);

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
  ADD KEY `fk_issue` (`name_of_hardware`);

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
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`spec_id`),
  ADD KEY `name_id` (`name_id`);

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
-- Indexes for table `system_transfer_report_history`
--
ALTER TABLE `system_transfer_report_history`
  ADD PRIMARY KEY (`system_transfer_report_history_id`),
  ADD KEY `FKK_SYSTRAN` (`system_transfer_report_id`),
  ADD KEY `FKK_MID` (`machine_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`temp_id`),
  ADD KEY `fk_machine_id` (`machine_id`),
  ADD KEY `fk_harddisk` (`harddisk`),
  ADD KEY `fk_keyboardd` (`keyboard`),
  ADD KEY `fk_mousee` (`mouse`),
  ADD KEY `fk_monitorr` (`monitor`),
  ADD KEY `fk_processorr` (`processor`),
  ADD KEY `fk_ramm` (`ram`);

--
-- Indexes for table `transfer_request`
--
ALTER TABLE `transfer_request`
  ADD PRIMARY KEY (`transfer_request_id`);

--
-- Indexes for table `upgrade_history`
--
ALTER TABLE `upgrade_history`
  ADD PRIMARY KEY (`upgrade_history_id`),
  ADD KEY `FK_Mid` (`machine_id`),
  ADD KEY `FK_proi` (`processori`),
  ADD KEY `FK_rami` (`rami`),
  ADD KEY `FK_memi` (`memoryi`),
  ADD KEY `FK_prof` (`processorf`),
  ADD KEY `FK_ramf` (`ramf`),
  ADD KEY `FK_memf` (`memoryf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `complaint_book`
--
ALTER TABLE `complaint_book`
  MODIFY `complaint_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `device_repair_history`
--
ALTER TABLE `device_repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `hardware_complaint_book`
--
ALTER TABLE `hardware_complaint_book`
  MODIFY `hardware_complaint_book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hardware_position`
--
ALTER TABLE `hardware_position`
  MODIFY `hardware_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue_request`
--
ALTER TABLE `issue_request`
  MODIFY `issue_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `repair_history`
--
ALTER TABLE `repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  MODIFY `system_transfer_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_transfer_report_history`
--
ALTER TABLE `system_transfer_report_history`
  MODIFY `system_transfer_report_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_request`
--
ALTER TABLE `transfer_request`
  MODIFY `transfer_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upgrade_history`
--
ALTER TABLE `upgrade_history`
  MODIFY `upgrade_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `device_repair_history`
--
ALTER TABLE `device_repair_history`
  ADD CONSTRAINT `fk_devicehistory_hardwareid` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `FK_company` FOREIGN KEY (`company`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_name` FOREIGN KEY (`name`) REFERENCES `name` (`name_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_description` FOREIGN KEY (`description`) REFERENCES `specification` (`spec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup_id`);

--
-- Constraints for table `hardware_complaint_book`
--
ALTER TABLE `hardware_complaint_book`
  ADD CONSTRAINT `fk_hardwarecomplaint_hardwareid` FOREIGN KEY (`hardware_id`) REFERENCES `hardware` (`hardware_id`);

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
  ADD CONSTRAINT `fk_issue` FOREIGN KEY (`name_of_hardware`) REFERENCES `hardware` (`hardware_id`);

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
-- Constraints for table `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`name_id`) REFERENCES `name` (`name_id`);

--
-- Constraints for table `system_transfer_report`
--
ALTER TABLE `system_transfer_report`
  ADD CONSTRAINT `fk_str` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_streport` FOREIGN KEY (`trid`) REFERENCES `transfer_request` (`transfer_request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_transfer_report_history`
--
ALTER TABLE `system_transfer_report_history`
  ADD CONSTRAINT `FKK_MID` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKK_SYSTRAN` FOREIGN KEY (`system_transfer_report_id`) REFERENCES `system_transfer_report` (`system_transfer_report_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `fk_harddisk` FOREIGN KEY (`harddisk`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keyboardd` FOREIGN KEY (`keyboard`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_machine_id` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_monitorr` FOREIGN KEY (`monitor`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mousee` FOREIGN KEY (`mouse`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_processorr` FOREIGN KEY (`processor`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ramm` FOREIGN KEY (`ram`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upgrade_history`
--
ALTER TABLE `upgrade_history`
  ADD CONSTRAINT `FK_Mid` FOREIGN KEY (`machine_id`) REFERENCES `machine` (`machine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_memf` FOREIGN KEY (`memoryf`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_memi` FOREIGN KEY (`memoryi`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_prof` FOREIGN KEY (`processorf`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_proi` FOREIGN KEY (`processori`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ramf` FOREIGN KEY (`ramf`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_rami` FOREIGN KEY (`rami`) REFERENCES `hardware` (`hardware_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
