-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2018 at 01:08 PM
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
  `complaint_by` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_book`
--

INSERT INTO `complaint_book` (`complaint_book_id`, `Date_of_complaint`, `machine_id`, `complaint_details`, `priority`, `work_for`, `remarks`, `complaint_by`) VALUES
(1, '2018-07-10', 47, 'bc', 2, 2, NULL, 'bc'),
(2, '2018-07-10', 55, '36589', 3, 3, NULL, 'jk');

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
(170, 1, 'Alphastar ka keyboard', 132, 44, 2, 1, NULL),
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
(185, 16, 'nk', NULL, 1, 3, 1, NULL),
(186, 7, 'Me15', NULL, 999, NULL, 1, NULL),
(187, 7, 'Me15', NULL, 999, 5, 1, NULL),
(188, 7, 'Me15', NULL, 999, NULL, 1, NULL),
(189, 7, 'Me15', NULL, 999, 1, 1, NULL),
(190, 7, 'Me15', NULL, 999, 2, 1, NULL),
(191, 7, 'Me15', NULL, 999, 3, 1, NULL),
(192, 7, 'Me16', NULL, 999, NULL, 1, NULL),
(193, 7, 'Me16', NULL, 999, 5, 1, NULL),
(194, 7, 'Me16', NULL, 999, NULL, 1, NULL),
(195, 7, 'Me16', NULL, 999, 1, 1, NULL),
(196, 7, 'Me16', NULL, 999, 2, 1, NULL),
(197, 7, 'Me16', NULL, 999, 3, 1, NULL),
(198, 17, 'Me hu na', NULL, 123, 6, 1, NULL),
(199, 17, 'Mehu na', NULL, 123, 5, 1, NULL),
(200, 17, 'Me hu na', NULL, 123, NULL, 0, NULL),
(201, 17, 'me hu na', NULL, 123, 1, 0, NULL),
(202, 17, 'Me hu na', NULL, 123, 2, 0, NULL),
(203, 17, 'Me hu na', NULL, 123, 3, 0, NULL),
(204, 17, 'Me hu na', NULL, 123, 6, 1, NULL),
(205, 17, 'Mehu na', NULL, 123, 5, 1, NULL),
(206, 17, 'Me hu na', NULL, 123, 4, 1, NULL),
(207, 17, 'me hu na', NULL, 123, 1, 1, NULL),
(208, 17, 'Me hu na', NULL, 123, 2, 1, NULL),
(209, 17, 'Me hu na', NULL, 123, 3, 1, NULL),
(210, 18, 'Me hu na1', NULL, 123, 6, 1, NULL),
(211, 18, 'Mehu na1', NULL, 123, 5, 1, NULL),
(212, 18, 'Me hu na1', NULL, 123, 4, 1, NULL),
(213, 18, 'me hu na1', NULL, 123, 1, 1, NULL),
(214, 18, 'Me hu na1', NULL, 123, 2, 1, NULL),
(215, 18, 'Me hu na1', NULL, 123, 3, 1, NULL),
(216, 7, 'b', NULL, 456, NULL, 1, NULL),
(217, 7, '16', NULL, 456, 5, 1, NULL),
(218, 7, 'hbhi', NULL, 456, 4, 1, NULL),
(219, 7, 'bi', NULL, 456, 1, 1, NULL),
(220, 7, 'buib', NULL, 456, 2, 0, NULL),
(221, 7, 'bib', NULL, 456, 3, 1, NULL),
(222, 1, 'canvas', 151, 12, 14, 0, NULL),
(223, 1, 'nwlifnkqlkl', NULL, 1, NULL, 1, NULL),
(224, 1, 'wofn', NULL, 1, 5, 1, NULL),
(225, 1, 'nl', NULL, 1, 4, 1, NULL),
(226, 1, 'nkln', NULL, 1, 1, 1, NULL),
(227, 1, 'kln', NULL, 1, 2, 1, NULL),
(228, 1, 'lk', NULL, 1, 3, 1, NULL),
(229, 1, 'nwlifnkqlkl', NULL, 1, NULL, 1, NULL),
(230, 1, 'wofn', NULL, 1, 5, 1, NULL),
(231, 1, 'nl', NULL, 1, 4, 1, NULL),
(232, 1, 'nkln', NULL, 1, 1, 1, NULL),
(233, 1, 'kln', NULL, 1, 2, 1, NULL),
(234, 1, 'lk', NULL, 1, 3, 1, NULL),
(235, 1, 'nwlifnkqlkl', NULL, 1, NULL, 1, NULL),
(236, 1, 'wofn', NULL, 1, 5, 1, NULL),
(237, 1, 'nl', NULL, 1, 4, 1, NULL),
(238, 1, 'nkln', NULL, 1, 1, 1, NULL),
(239, 1, 'kln', NULL, 1, 2, 1, NULL),
(240, 1, 'lk', NULL, 1, 3, 1, NULL),
(241, 1, 'nwlifnkqlkl', NULL, 1, NULL, 1, NULL),
(242, 1, 'wofn', NULL, 1, 5, 1, NULL),
(243, 1, 'nl', NULL, 1, 4, 1, NULL),
(244, 1, 'nkln', NULL, 1, 1, 1, NULL),
(245, 1, 'kln', NULL, 1, 2, 1, NULL),
(246, 1, 'lk', NULL, 1, 3, 1, NULL),
(247, 1, 'nwlifnkqlkl', NULL, 1, NULL, 1, NULL),
(248, 1, 'wofn', NULL, 1, 5, 1, NULL),
(249, 1, 'nl', NULL, 1, 4, 1, NULL),
(250, 1, 'nkln', NULL, 1, 1, 1, NULL),
(251, 1, 'kln', NULL, 1, 2, 1, NULL),
(252, 1, 'lk', NULL, 1, 3, 1, NULL),
(253, 19, 'intel i5', 2000, 122, 5, 1, 1),
(254, 13, '5 mb', NULL, 2015, 6, 1, 1),
(255, 13, '*******', NULL, 2015, 5, 1, 1),
(256, 13, '1 gb', NULL, 2015, 4, 1, 1),
(257, 13, '36', NULL, 2015, 1, 1, 1),
(258, 13, 'kjh', NULL, 2015, 2, 1, 1),
(259, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(260, 13, '5 mb', NULL, 2015, 6, 1, 1),
(261, 13, '*******', NULL, 2015, 5, 1, 1),
(262, 13, '1 gb', NULL, 2015, 4, 1, 1),
(263, 13, '36', NULL, 2015, 1, 1, 1),
(264, 13, 'kjh', NULL, 2015, 2, 1, 1),
(265, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(266, 13, '5 mb', NULL, 2015, 6, 1, 1),
(267, 13, '*******', NULL, 2015, 5, 0, 1),
(268, 13, '1 gb', NULL, 2015, 4, 1, 1),
(269, 13, '36', NULL, 2015, 1, 1, 1),
(270, 13, 'kjh', NULL, 2015, 2, 1, 1),
(271, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(272, 13, '5 mb', NULL, 2015, 6, 1, 1),
(273, 13, '*******', NULL, 2015, 5, 1, 1),
(274, 13, '1 gb', NULL, 2015, 4, 1, 1),
(275, 13, '36', NULL, 2015, 1, 1, 1),
(276, 13, 'kjh', NULL, 2015, 2, 1, 1),
(277, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(278, 13, '5 mb', NULL, 2015, 6, 1, 1),
(279, 13, '*******', NULL, 2015, 5, 1, 1),
(280, 13, '1 gb', NULL, 2015, 4, 1, 1),
(281, 13, '36', NULL, 2015, 1, 1, 1),
(282, 13, 'kjh', NULL, 2015, 2, 1, 1),
(283, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(284, 13, '5 mb', NULL, 2015, 6, 1, 1),
(285, 13, '*******', NULL, 2015, 5, 1, 1),
(286, 13, '1 gb', NULL, 2015, 4, 1, 1),
(287, 13, '36', NULL, 2015, 1, 1, 1),
(288, 13, 'kjh', NULL, 2015, 2, 1, 1),
(289, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1),
(290, 13, '5 mb', NULL, 2015, 6, 1, 1),
(291, 13, '*******', NULL, 2015, 5, 1, 1),
(292, 13, '1 gb', NULL, 2015, 4, 1, 1),
(293, 13, '36', NULL, 2015, 1, 1, 1),
(294, 13, 'kjh', NULL, 2015, 2, 1, 1),
(295, 13, 'hjkk 90\'', NULL, 2015, 3, 1, 1);

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
(43, '134', 181, 180, 182, '2001-12-21', 50, 'ACTIVE', 'lnk', 185, 184, 183, 1),
(44, '1', 199, 198, 218, '2018-07-07', 123, 'ACTIVE', 'Me hu na', 203, 202, 201, 123),
(45, '13', 205, 204, 206, '2018-07-07', 123, 'ACTIVE', 'Me hu na', 209, 208, 207, 123),
(46, '14', 211, 210, 212, '2018-07-07', 123, 'ACTIVE', 'Me hu na1', 215, 214, 213, 123),
(47, '31', 217, 216, 182, '2012-12-12', 12, 'INACTIVE', 'ui', 221, 170, 219, 456),
(48, '16', 224, 223, 225, '2033-12-31', 0, 'ACTIVE', 'nlk', 228, 227, 226, 1),
(49, '17', 230, 229, 231, '2033-12-31', 0, 'ACTIVE', 'nlk', 234, 233, 232, 1),
(50, '18', 236, 235, 237, '2033-12-31', 0, 'ACTIVE', 'nlk', 240, 239, 238, 1),
(51, '19', 242, 241, 243, '2033-12-31', 0, 'ACTIVE', 'nlk', 246, 245, 244, 1),
(52, '20', 248, 247, 249, '2033-12-31', 0, 'ACTIVE', 'nlk', 252, 251, 250, 1),
(53, '60', 255, 254, 256, '2018-11-13', 2, 'ACTIVE', '23', 259, 258, 257, 2015),
(54, '61', 261, 260, 262, '2018-11-13', 2, 'ACTIVE', '23', 265, 264, 263, 2015),
(55, '62', 253, 266, 268, '2018-11-13', 2, 'INACTIVE', '23', 271, 270, 269, 2015),
(56, '63', 273, 272, 274, '2018-11-13', 2, 'ACTIVE', '23', 277, 276, 275, 2015),
(57, '64', 279, 278, 280, '2018-11-13', 2, 'ACTIVE', '23', 283, 282, 281, 2015);

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
(1, 'mouse'),
(2, 'keyboard'),
(3, 'monitor'),
(4, 'harddisk'),
(5, 'processor'),
(6, 'ram'),
(12, 'Other'),
(13, 'Me hu ghadi'),
(14, 'Mobile'),
(15, ''),
(16, 'Other'),
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
(1, 47, 15, '2012-12-12', '2018-07-07'),
(2, 48, 15, '2012-12-12', '1970-01-01'),
(3, 44, 15, '2018-07-03', '1970-01-01'),
(4, 45, 15, '2018-07-03', '1970-01-01'),
(5, 46, 15, '2018-07-03', '1970-01-01'),
(6, 55, 15, '2018-10-24', '2018-01-01'),
(7, 56, 15, '2018-10-24', '1970-01-01'),
(8, 57, 15, '2018-10-24', '1970-01-01');

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
(1, 47, '2018-07-07', '0000-00-00', NULL, NULL),
(2, 55, '2018-01-01', '0000-00-00', NULL, NULL);

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
('IMB', 1),
('Me nhi hu na', 2);

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
(1, 44, 199, 198, 218, 253, 198, 218, '2018-07-10'),
(2, 44, 253, 198, 218, 199, 198, 218, '2018-07-10'),
(3, 55, 267, 266, 268, 253, 266, 268, '2018-07-10');

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
  MODIFY `complaint_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

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
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `repair_history`
--
ALTER TABLE `repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `software_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `upgrade_history`
--
ALTER TABLE `upgrade_history`
  MODIFY `upgrade_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
