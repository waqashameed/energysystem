-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 01:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `energysystemmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyzer`
--

CREATE TABLE `analyzer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `analyzerunit` varchar(5) NOT NULL,
  `isavailable` int(11) NOT NULL DEFAULT '0',
  `creationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analyzer`
--

INSERT INTO `analyzer` (`id`, `name`, `description`, `analyzerunit`, `isavailable`, `creationdate`) VALUES
(29, 'G_MonthlyEnergy1', 'Analyzer 1.', 'MH', 0, '2018-05-13'),
(32, 'G1_MonthlyEnergy1', 'Analyzer 2 ', 'MPH', 0, '2018-05-13'),
(34, 'G2_MonthlyEnergy1', 'Analyzer 3', 'MH', 0, '2018-05-13'),
(35, 'S1_MonthlyEnergy1', 'Analyzer 4', 'MH', 0, '2018-05-13'),
(36, 'S2_MonthlyEnergy1', 'Analyzer 5', 'MH', 0, '2018-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `analyzerreading`
--

CREATE TABLE `analyzerreading` (
  `excel_id` int(12) NOT NULL,
  `date` datetime NOT NULL,
  `monthnumber` int(12) NOT NULL,
  `valueunits` varchar(250) NOT NULL,
  `analyzerid` int(250) NOT NULL,
  `billgenerated` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analyzerreading`
--

INSERT INTO `analyzerreading` (`excel_id`, `date`, `monthnumber`, `valueunits`, `analyzerid`, `billgenerated`) VALUES
(1, '2018-02-01 00:00:00', 1, '19782.0', 29, 0),
(2, '2018-02-01 00:00:00', 1, '5632842.0', 32, 0),
(3, '2018-02-01 00:00:00', 1, '5837736.0', 34, 0),
(4, '2018-02-01 00:00:00', 1, '22999.0', 35, 0),
(5, '2018-02-01 00:00:00', 1, '0.0', 36, 0),
(6, '2018-03-01 00:00:00', 2, '19782.0', 29, 1),
(7, '2018-03-01 00:00:00', 2, '5753202.0', 32, 1),
(8, '2018-03-01 00:00:00', 2, '5941042.0', 34, 1),
(9, '2018-03-01 00:00:00', 2, '24281.0', 35, 1),
(10, '2018-03-01 00:00:00', 2, '0.0', 36, 1),
(11, '2018-04-01 00:00:00', 3, '50863.0', 29, 1),
(12, '2018-04-01 00:00:00', 3, '7670077.0', 32, 1),
(13, '2018-04-01 00:00:00', 3, '8491506.0', 34, 1),
(14, '2018-04-01 00:00:00', 3, '53377.0', 35, 1),
(15, '2018-04-01 00:00:00', 3, '0.0', 36, 1),
(16, '2018-05-01 00:00:00', 4, '529735.0', 29, 0),
(17, '2018-05-01 00:00:00', 4, '11614666.0', 32, 0),
(18, '2018-05-01 00:00:00', 4, '13614420.0', 34, 0),
(19, '2018-05-01 00:00:00', 4, '111399.0', 35, 0),
(20, '2018-05-01 00:00:00', 4, '0.0', 36, 0),
(21, '2018-06-01 00:00:00', 5, '2792113.0', 29, 0),
(22, '2018-06-01 00:00:00', 5, '13470494.0', 32, 0),
(23, '2018-06-01 00:00:00', 5, '14086651.0', 34, 0),
(24, '2018-06-01 00:00:00', 5, '135706.0', 35, 0),
(25, '2018-06-01 00:00:00', 5, '0.0', 36, 0),
(26, '2018-07-01 00:00:00', 6, '2792113.0', 29, 0),
(27, '2018-07-01 00:00:00', 6, '13470494.0', 32, 0),
(28, '2018-07-01 00:00:00', 6, '14086651.0', 34, 0),
(29, '2018-07-01 00:00:00', 6, '135706.0', 35, 0),
(30, '2018-07-01 00:00:00', 6, '0.0', 36, 0),
(31, '2018-08-01 00:00:00', 7, '2792113.0', 29, 0),
(32, '2018-08-01 00:00:00', 7, '13470494.0', 32, 0),
(33, '2018-08-01 00:00:00', 7, '14086651.0', 34, 0),
(34, '2018-08-01 00:00:00', 7, '135706.0', 35, 0),
(35, '2018-08-01 00:00:00', 7, '0.0', 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `duedate` date NOT NULL,
  `prevmonthunits` double NOT NULL,
  `currentmonthunits` double NOT NULL,
  `units` double NOT NULL,
  `amount` double NOT NULL,
  `note` text NOT NULL,
  `analyzerid` int(11) NOT NULL,
  `issuedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `month`, `year`, `duedate`, `prevmonthunits`, `currentmonthunits`, `units`, `amount`, `note`, `analyzerid`, `issuedate`) VALUES
(72, 3, 2018, '2018-11-15', 19782, 50863, 31081, 404053, '', 29, '2018-11-06'),
(73, 3, 2018, '2018-11-15', 5753202, 7670077, 1916875, 24919375, '', 32, '2018-11-06'),
(74, 3, 2018, '2018-11-15', 5941042, 8491506, 2550464, 33156032, '', 34, '2018-11-06'),
(75, 3, 2018, '2018-11-15', 24281, 53377, 29096, 378248, '', 35, '2018-11-06'),
(76, 3, 2018, '2018-11-15', 0, 0, 0, 0, '', 36, '2018-11-06'),
(77, 2, 2018, '2018-11-15', 19782, 19782, 0, 0, '', 29, '2018-11-06'),
(78, 2, 2018, '2018-11-15', 5632842, 5753202, 120360, 1564680, '', 32, '2018-11-06'),
(79, 2, 2018, '2018-11-15', 5837736, 5941042, 103306, 1342978, '', 34, '2018-11-06'),
(80, 2, 2018, '2018-11-15', 22999, 24281, 1282, 16666, '', 35, '2018-11-06'),
(81, 2, 2018, '2018-11-15', 0, 0, 0, 0, '', 36, '2018-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contactnumber` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationdate` date NOT NULL,
  `analyzerid` int(11) NOT NULL,
  `isadmin` int(1) NOT NULL DEFAULT '0',
  `isdisabled` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `contactnumber`, `email`, `password`, `creationdate`, `analyzerid`, `isadmin`, `isdisabled`) VALUES
(6, 'Rashid', '03331234567', 'rashid@hotmail.com', '7d0ba610dea3dbcc848a97d8dfd767ae', '2018-07-29', 29, 0, 0),
(7, 'Waqas', '03121234567', 'waqas@hotmail.com', '57a2e1f5c2ee57e7ab421e03944cb727', '2018-07-29', 0, 1, 1),
(8, 'Sajid', '03211234567', 'sajid@hotmail.com', '30220cfd902d347400efcfef5ca9d655', '2018-07-29', 34, 0, 0),
(9, 'Saad', '03341234567', 'saad@hotmail.com', '347602146a923872538f3803eb5f3cef', '2018-07-31', 32, 0, 0),
(11, 'Ahmed Abbas', '03001234567', 'ahmeda@hotmail.com', '9193ce3b31332b03f7d8af056c692b84', '2018-10-21', 36, 0, 0),
(12, 'Salman Ahmed', '03331234567', 'salman_15@yahoo.com', '03346657feea0490a4d4f677faa0583d', '2018-10-31', 35, 0, 0),
(13, 'Zeeshan Omar', '03001234567', 'zeeshan@gmail.com', '6a8b34a9e786ff641b9b122cd1891722', '2018-10-31', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyzer`
--
ALTER TABLE `analyzer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `analyzerreading`
--
ALTER TABLE `analyzerreading`
  ADD PRIMARY KEY (`excel_id`),
  ADD KEY `analyzerid` (`analyzerid`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyzer`
--
ALTER TABLE `analyzer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `analyzerreading`
--
ALTER TABLE `analyzerreading`
  MODIFY `excel_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analyzerreading`
--
ALTER TABLE `analyzerreading`
  ADD CONSTRAINT `analyzerreading_ibfk_1` FOREIGN KEY (`analyzerid`) REFERENCES `analyzer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
