-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 09:31 AM
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
-- Database: `manage_equipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case`
--

CREATE TABLE `tbl_case` (
  `case_id` int(4) NOT NULL,
  `case_name` varchar(15) NOT NULL,
  `case_get_eq` varchar(30) NOT NULL,
  `case_get_serial` varchar(35) NOT NULL,
  `case_add_eq` varchar(30) NOT NULL,
  `case_add_serial` varchar(35) NOT NULL,
  `case_sup` varchar(10) NOT NULL,
  `case_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_case`
--

INSERT INTO `tbl_case` (`case_id`, `case_name`, `case_get_eq`, `case_get_serial`, `case_add_eq`, `case_add_serial`, `case_sup`, `case_date`) VALUES
(56, 'get', 'GN 8000 MPA', '0ALI43YBC', '', '', 'Bird', '2018-08-30 14:52:40'),
(57, 'get', 'JABRA GN 2000', '0TEA0RH76D', '', '', 'Ae', '2018-08-30 15:01:53'),
(58, 'get', 'JABRA GN 2400', '0TEA0RH76D-001', '', '', 'Ae', '2018-08-30 15:40:14'),
(59, 'get', 'JABRA GN 2400', '0TEA0RH76D-002', '', '', 'Ae', '2018-08-30 15:40:34'),
(60, 'get', 'JABRA GN 2400', '0TEA0RH76D-004', '', '', 'Duen', '2018-08-30 15:42:07'),
(61, 'get', 'Jabra 850-09', '0UCBOJBR5GE', '', '', 'Bird', '2018-08-30 15:43:00'),
(62, 'get', 'Jabra 850-09', '0UCBOJBR5GA', '', '', 'Kang', '2018-08-30 15:52:46'),
(63, 'get', 'GN 8000 MPA', '0ALI43YBC', '', '', 'Kang', '2018-08-30 15:54:12'),
(64, 'get', 'JABRA GN 2000', '0TEA0RH76D', '', '', 'Ae', '2018-08-30 15:55:35'),
(65, 'get', 'JABRA GN 2400', '0TEA0RH76D-002', '', '', 'Duen', '2018-08-30 15:57:00'),
(66, 'add', '', '', 'GN 8000 MPA', '0ALI43YBC', 'Kang', '2018-08-30 16:30:58'),
(67, 'add', '', '', 'Jabra 850-09', '0UCBOJBR5GA', 'Ae', '2018-08-30 16:31:52'),
(68, 'add', '', '', 'JABRA GN 2000', '0TEA0RH76D', 'Bird', '2018-08-30 16:33:32'),
(69, 'add', '', '', 'JABRA GN 2400', '0TEA0RH76D-002', 'Kang', '2018-08-30 16:35:19'),
(70, 'add', '', '', 'Jabra 850-09', '0UCBOJBR5GN', 'Kang', '2018-08-30 16:35:44'),
(71, 'get', 'JABRA GN 2000', '0TEA0RH76D', '', '', 'Kang', '2018-08-30 16:37:14'),
(72, 'get', 'GN 8000 MPA', '0ALI43YBC', '', '', 'Bird', '2018-08-30 16:38:02'),
(73, 'get', 'Jabra 850-09', '0UCBOJBR5GA', '', '', 'Kang', '2018-08-31 09:02:43'),
(74, 'add', '', '', 'Jabra 850-09', '0UCBOJBR5GA', 'Bird', '2018-08-31 09:04:47'),
(75, 'add', '', '', 'GN 8000 MPA', '0ALI43YBC', 'Kang', '2018-08-31 09:56:25'),
(76, 'add', '', '', 'JABRA GN 2000', '0TEA0RH76D', 'Kang', '2018-08-31 09:57:27'),
(77, 'get', 'JABRA GN 2000', '0TEA0RH76D', '', '', 'Kang', '2018-08-31 09:57:38'),
(78, 'change', 'Jabra 850-09', '0UCBOJBR5GA', 'JABRA GN 2000', '0TEA0RH76D', 'Kang', '2018-08-31 10:48:20'),
(79, 'change', 'Jabra 850-09', '0UCBOJBR5GA', 'JABRA GN 2000', '0TEA0RH76D', 'Duen', '2018-08-31 10:59:45'),
(80, 'change', 'GN 8000 MPA', '0ALI43YBC', 'Jabra 850-09', '0UCBOJBR5GA', 'Ae', '2018-08-31 11:01:31'),
(81, 'get', 'Jabra 850-09', '0UCBOJBR5GA', '', '', 'Kang', '2018-08-31 11:07:15'),
(82, 'add', '', '', 'Jabra 850-09', '0UCBOJBR5GA', 'Bird', '2018-08-31 11:07:26'),
(83, 'change', 'Jabra 850-09', '0UCBOJBR5GA', 'GN 8000 MPA', '0ALI43YBC', 'Duen', '2018-08-31 11:08:13'),
(84, 'change', 'GN 8000 MPA', '0ALI43YBC', 'Jabra 850-09', '0UCBOJBR5GA', 'Bird', '2018-08-31 11:10:17'),
(85, 'add', '', '', 'DELL OptiPlex 3010', 'DELL OptiPlex 3010-001', 'Bird', '2018-09-07 12:50:05'),
(86, 'add', '', '', 'DELL OptiPlex 3010', 'DELL OptiPlex 3010-006', 'Ae', '2018-09-07 12:50:27'),
(87, 'add', '', '', 'Jabra 850-09', 'Jabra 850-09-001', 'Kang', '2018-09-10 17:15:13'),
(88, 'get', 'Jabra 850-09', '0UCB0KV07FA002', '', '', 'Kang', '2018-09-10 17:17:16'),
(89, 'change', 'Jabra 850-09', 'Jabra 850-09-001', 'DELL Optiplex 3050', 'Dell 3050-003', 'Bird', '2018-09-10 17:21:19'),
(90, 'add', '', '', 'DELL OptiPlex 3010', 'DELL OptiPlex 3010-005', 'Kang', '2018-09-12 12:01:47'),
(91, 'add', '', '', 'DELL Optiplex 3050', 'Dell 3050-001', 'Aum', '2018-09-12 12:02:04'),
(92, 'change', 'DELL Optiplex 3050|Computer', 'Dell 3050-001', 'DELL Optiplex 3050|Computer', 'Dell 3050-002', 'Kang', '2018-09-12 12:05:18'),
(93, 'add', '', '', 'Headset JABRA GN 9120', 'JABRA GN 9120-001', 'Bird', '2018-09-12 12:15:36'),
(94, 'add', '', '', 'Headset JABRA GO 6400BS', 'JABRA GO 6400BS-002', 'Kang', '2018-09-12 12:16:07'),
(95, 'add', '', '', 'Headset JABRA GO 6400BS', 'JABRA GO 6400BS-003', 'Bird', '2018-09-12 12:16:17'),
(96, 'add', '', '', 'DELL OptiPlex 3010', 'OptiPlex3010-002', 'Kang', '2018-09-12 12:56:14'),
(97, 'add', '', '', 'DELL OptiPlex 3010', 'OptiPlex3010-007', 'Bird', '2018-09-12 12:56:26'),
(98, 'add', '', '', 'DELL OptiPlex 3010', 'OptiPlex3010-004', 'Ae', '2018-09-12 12:57:08'),
(99, 'add', '', '', 'Optical Mouse USB', 'OpticalMouseUSB-007', 'Kang', '2018-09-12 13:01:38'),
(100, 'add', '', '', 'JABRA GN 2000', 'JABRAGN2000-001', 'Kang', '2018-09-12 13:19:56'),
(101, 'add', '', '', 'JABRA GN 2000', 'JABRAGN2000-002', 'Duen', '2018-09-12 13:20:09'),
(102, 'change', 'JABRA GN 2000|Headset', 'JABRAGN2000-002', 'JABRA GN 2400|Headset', '0TEA0RH76D-002', 'Kang', '2018-09-12 13:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `eq_id` int(3) NOT NULL,
  `eq_name` varchar(40) NOT NULL,
  `eq_serial_number` varchar(30) NOT NULL,
  `eq_type` varchar(30) NOT NULL,
  `eq_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`eq_id`, `eq_name`, `eq_serial_number`, `eq_type`, `eq_status`) VALUES
(86, 'JABRA GN 2400', '0TEA0RH76D-001', 'Headset', 'in'),
(87, 'JABRA GN 2400', '0TEA0RH76D-002', 'Headset', 'out'),
(88, 'JABRA GN 2400', '0TEA0RH76D-003', 'Headset', 'in'),
(89, 'JABRA GN 2400', '0TEA0RH76D-004', 'Headset', 'in'),
(93, 'Jabra 850-09', '0UCB0KV07FA002', 'Amplifier', 'broken'),
(94, 'Jabra 850-09', '0UCB0KV07FA003', 'Amplifier', 'out'),
(95, 'Jabra 850-09', '0UCB0KV07FA004', 'Amplifier', 'out'),
(96, 'GN 8000 MPA', '0UCBOJBR5GA001', 'Amplifier', 'in'),
(100, 'DELL OptiPlex 3010', 'OptiPlex3010-001', 'Computer', 'in'),
(101, 'DELL OptiPlex 3010', 'OptiPlex3010-002', 'Computer', 'out'),
(102, 'DELL OptiPlex 3010', 'OptiPlex3010-003', 'Computer', 'in'),
(103, 'DELL OptiPlex 3010', 'OptiPlex3010-004', 'Computer', 'out'),
(104, 'DELL OptiPlex 3010', 'OptiPlex3010-005', 'Computer', 'broken'),
(105, 'DELL OptiPlex 3010', 'OptiPlex3010-006', 'Computer', 'in'),
(106, 'DELL OptiPlex 3010', 'OptiPlex3010-007', 'Computer', 'out'),
(107, 'DELL Optiplex 3050', 'Optiplex3050-001', 'Computer', 'in'),
(108, 'DELL Optiplex 3050', 'Optiplex3050-002', 'Computer', 'in'),
(109, 'DELL Optiplex 3050', 'Optiplex3050-003', 'Computer', 'in'),
(110, 'DELL Optiplex 3050', 'Optiplex3050-004', 'Computer', 'in'),
(111, 'DELL Optiplex 3050', 'Optiplex3050-005', 'Computer', 'in'),
(112, 'DELL Optiplex 360', 'Optiplex360-001', 'Computer', 'in'),
(113, 'DELL Optiplex 360', 'Optiplex360-002', 'Computer', 'in'),
(114, 'DELL Optiplex 360', 'Optiplex360-003', 'Computer', 'in'),
(115, 'LCD Mornitor', 'LCDMornitor-001', 'Monitor', 'in'),
(116, 'LCD Mornitor', 'LCDMornitor-002', 'Monitor', 'in'),
(117, 'LCD Mornitor', 'LCDMornitor-003', 'Monitor', 'in'),
(118, 'LCD Mornitor', 'LCDMornitor-004', 'Monitor', 'in'),
(119, 'LCD Mornitor', 'LCDMornitor-005', 'Monitor', 'in'),
(120, 'LCD Mornitor', 'LCDMornitor-006', 'Monitor', 'in'),
(121, 'Optical Mouse USB', 'OpticalMouseUSB-001', 'Mouse', 'in'),
(122, 'Optical Mouse USB', 'OpticalMouseUSB-002', 'Mouse', 'in'),
(123, 'Optical Mouse USB', 'OpticalMouseUSB-003', 'Mouse', 'in'),
(124, 'Optical Mouse USB', 'OpticalMouseUSB-004', 'Mouse', 'in'),
(125, 'Optical Mouse USB', 'OpticalMouseUSB-005', 'Mouse', 'in'),
(126, 'Optical Mouse USB', 'OpticalMouseUSB-006', 'Mouse', 'in'),
(127, 'Optical Mouse USB', 'OpticalMouseUSB-007', 'Mouse', 'out'),
(128, 'DELL Monitor W14P1917STH', 'MonitorW14P1917STH001', 'Monitor', 'in'),
(129, 'DELL Monitor W14P1917STH', 'MonitorW14P1917STH002', 'Monitor', 'in'),
(130, 'DELL Monitor W14P1917STH', 'MonitorW14P1917STH003', 'Monitor', 'in'),
(131, 'Logitech Mouse M100R USB', 'M100RUSB-001', 'Mouse', 'in'),
(132, 'Logitech Mouse M100R USB', 'M100RUSB-002', 'Mouse', 'in'),
(133, 'Logitech Mouse M100R USB', 'M100RUSB-003', 'Mouse', 'in'),
(134, 'Logitech Mouse M100R USB', 'M100RUSB-004', 'Mouse', 'in'),
(135, 'DELL Optical Mouse MS116', 'OpticalMouseMS116-001', 'Mouse', 'in'),
(136, 'DELL Optical Mouse MS116', 'OpticalMouseMS116-002', 'Mouse', 'in'),
(137, 'DELL Optical Mouse MS116', 'OpticalMouseMS116-003', 'Mouse', 'in'),
(138, 'Keyboard USB', 'KeyboardUSB-001', 'Keyboard', 'in'),
(139, 'Keyboard USB', 'KeyboardUSB-002', 'Keyboard', 'in'),
(140, 'Keyboard USB', 'KeyboardUSB-003', 'Keyboard', 'in'),
(141, 'Keyboard USB', 'KeyboardUSB-004', 'Keyboard', 'in'),
(142, 'Keyboard USB', 'KeyboardUSB-005', 'Keyboard', 'in'),
(143, 'Keyboard USB', 'KeyboardUSB-006', 'Keyboard', 'in'),
(144, 'Keyboard USB', 'KeyboardUSB-007', 'Keyboard', 'in'),
(145, 'Keyboard USB', 'KeyboardUSB-008', 'Keyboard', 'in'),
(146, 'Keyboard USB', 'KeyboardUSB-009', 'Keyboard', 'in'),
(147, 'Keyboard USB', 'KeyboardUSB-010', 'Keyboard', 'in'),
(148, 'Keyboard USB', 'KeyboardUSB-011', 'Keyboard', 'in'),
(149, 'Keyboard USB', 'KeyboardUSB-012', 'Keyboard', 'in'),
(150, 'Keyboard USB', 'KeyboardUSB-013', 'Keyboard', 'in'),
(151, 'JABRA GN 2000', 'JABRAGN2000-001', 'Headset', 'out'),
(152, 'JABRA GN 2000', 'JABRAGN2000-002', 'Headset', 'in'),
(153, 'JABRA GN 2000', 'JABRAGN2000-003', 'Headset', 'in'),
(154, 'JABRA GN 2000', 'JABRAGN2000-004', 'Headset', 'in'),
(155, 'JABRA GN 2000', 'JABRAGN2000-005', 'Headset', 'in'),
(156, 'JABRA GN 2000', 'JABRAGN2000-006', 'Headset', 'in'),
(157, 'JABRA GN 2000', 'JABRAGN2000-007', 'Headset', 'in'),
(158, 'JABRA GN 2400', 'JABRAGN2400-010', 'Headset', 'in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_name`
--

CREATE TABLE `tbl_equipment_name` (
  `eq_name_id` int(3) NOT NULL,
  `eq_name_name` varchar(30) NOT NULL,
  `eq_name_type` varchar(30) NOT NULL,
  `eq_name_expirydate` varchar(50) NOT NULL,
  `eq_name_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment_name`
--

INSERT INTO `tbl_equipment_name` (`eq_name_id`, `eq_name_name`, `eq_name_type`, `eq_name_expirydate`, `eq_name_status`) VALUES
(101, 'DELL OptiPlex 3010', 'Computer', '22/06/2563', 'show'),
(103, 'JABRA GN 2000', 'Headset', 'Expired', 'show'),
(106, 'Jabra 850-09', 'Amplifier', '24/07/2562', 'show'),
(107, 'GN 8000 MPA', 'Amplifier', 'Expired', 'show'),
(108, 'JABRA GN 2400', 'Headset', '22/06/2563', 'show'),
(104, 'DELL Optiplex 3050', 'Computer', '22/06/2563', 'show'),
(105, 'Keyboard USB', 'Keyboard', '24/09/2561', 'hide'),
(109, 'LCD Mornitor', 'Monitor', '24/09/2561', 'hide'),
(102, 'DELL Optiplex 360', 'Computer', '25/08/2565', 'hide'),
(110, 'DELL Monitor W14P1917STH', 'Monitor', '25/08/2562', 'hide'),
(111, 'Optical Mouse USB', 'Mouse', '03/05/2562', 'show'),
(112, 'Logitech Mouse M100R USB', 'Mouse', '03/05/2562', 'hide'),
(113, 'DELL Optical Mouse MS116', 'Mouse', '03/05/2562', 'hide'),
(114, 'DELL Keyboard KB216', 'Keyboard', '27/09/2561', 'hide'),
(115, 'Logitech Keyboard K120', 'Keyboard', '26/06/2562', 'hide'),
(116, 'APC BACK-UPS CS 650VA', 'UPS', 'Expired', 'hide'),
(117, 'CLEANLINE ML-850Q', 'UPS', 'Expired', 'hide'),
(118, 'Leonics UPS BLUE-800VA/400W', 'UPS', '21/08/2562', 'hide'),
(119, 'IP Phone CISCO SPA502G', 'IP Phone', 'Expired', 'hide'),
(121, 'Headset JABRA GN 9120', 'Wireless Headset', 'Expired', 'show'),
(122, 'Headset JABRA PRO 925', 'Wireless Headset', 'Expired', 'show'),
(120, 'Headset JABRA GO 6400BS', 'Wireless Headset', 'Expired', 'show');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_type`
--

CREATE TABLE `tbl_equipment_type` (
  `eq_type_id` int(3) NOT NULL,
  `eq_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment_type`
--

INSERT INTO `tbl_equipment_type` (`eq_type_id`, `eq_type_name`) VALUES
(201, 'Computer'),
(202, 'Monitor'),
(203, 'Mouse'),
(204, 'Keyboard'),
(205, 'UPS'),
(206, 'IP Phone'),
(207, 'Headset'),
(208, 'Amplifier'),
(209, 'Wireless Headset');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mb_id` int(4) NOT NULL,
  `mb_fname` varchar(30) NOT NULL,
  `mb_lname` varchar(30) NOT NULL,
  `mb_pass` varchar(25) NOT NULL,
  `mb_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mb_id`, `mb_fname`, `mb_lname`, `mb_pass`, `mb_type`) VALUES
(2001, 'Kang', '', '', 'sup'),
(2002, 'Ae', '', '', 'sup'),
(2003, 'Bird', '', '', 'sup'),
(2004, 'Aum', '', '', 'sup'),
(2005, 'Duen', '', '', 'sup'),
(2006, 'Kam', '', '', 'sup'),
(2007, 'So', '', '', 'sup'),
(8017, 'Rittikiert', 'Seankamlang', '1234', 'admin'),
(8019, 'sommhai', 'kaidee', '123456', 'it'),
(8020, 'sirichai', 'rukthomg', '123456', 'it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_case`
--
ALTER TABLE `tbl_case`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_case`
--
ALTER TABLE `tbl_case`
  MODIFY `case_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `eq_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
