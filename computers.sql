-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2018 at 08:31 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

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
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `name`) VALUES
(3, '002'),
(4, '001'),
(5, '003');

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
(1, '01', 'intel', '3 GB', '128 GB', '2012-09-23', 12999, 'ACTIVE'),
(2, '03', 'intel i5', '8 GB', '500 GB', '2017-04-08', 30000, 'ACTIVE');

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
(5, 2, 3, '2018-02-02', '0000-00-00');

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
(3, 2, '2018-01-01', '2018-02-02', 'COOLING FAN ERROR', 2000);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `repair_history`
--
ALTER TABLE `repair_history`
  MODIFY `repair_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `machine` CHANGE `MAC_ADDR` `MAC_ADDR` INT(11) NULL DEFAULT NULL;
