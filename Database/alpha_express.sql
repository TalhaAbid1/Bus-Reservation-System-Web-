-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 06:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpha_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `USERNAME` varchar(255) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PHONE` decimal(11,0) NOT NULL CHECK (`PHONE` between 0 and 99999999999),
  `ID_CARD` decimal(13,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`USERNAME`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`, `PHONE`, `ID_CARD`) VALUES
('archie', 'archie', 'andrews', 'archie@gmail.com', 'qwerty130', '310203040', '1234567891028'),
('farhad', 'Farhad', 'Raza', 'rfarhadraza@gmail.com', 'plmokn', '3456378152', '3460139778025'),
('ian', 'ian', 'halder', 'ian@gmail.com', 'qwerty129', '333203040', '1234567891027'),
('paul', 'paul', 'wesely', 'paul@gmail.com', 'qwerty128', '310203040', '1234567891026'),
('quyoom', 'abdul', 'quyoom', 'quyoom@gmail.com', 'qwerty125', '310203040', '1234567891023'),
('tabid', 'talha', 'abid', 'talhaabid@gmail.com', 'qwerty126', '3001002005', '1234567891024'),
('timran', 'talha', 'imran', 'talhaimran@gmail.com', 'qwerty127', '340003040', '1234567891025');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(31) NOT NULL,
  `res_date` date NOT NULL,
  `res_schedule` varchar(255) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `reserved_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_date`, `res_schedule`, `seat_no`, `reserved_by`) VALUES
(1, '2021-03-23', 's1', 2, 'quyoom'),
(1, '2021-03-23', 's1', 3, 'quyoom'),
(2, '2021-03-20', 's5', 1, 'tabid'),
(2, '2021-03-20', 's5', 2, 'tabid'),
(3, '2021-03-19', 's4', 9, 'timran'),
(4, '2021-03-18', 's2', 20, 'paul'),
(5, '2021-03-16', 's6', 10, 'ian'),
(6, '2021-03-17', 's7', 4, 'tabid'),
(6, '2021-03-17', 's7', 5, 'tabid');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` varchar(255) NOT NULL,
  `Class` varchar(225) NOT NULL,
  `Departure_time` varchar(255) DEFAULT NULL,
  `Departure_date` varchar(255) NOT NULL,
  `Price` int(225) NOT NULL,
  `Leaving_from` varchar(225) NOT NULL,
  `going_to` varchar(225) NOT NULL,
  `bus_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `Class`, `Departure_time`, `Departure_date`, `Price`, `Leaving_from`, `going_to`, `bus_no`) VALUES
('s1', 'BUSINESS', '08:00 AM', '2022-09-25', 1000, 'GUJRANWALA', 'LAHORE', 1010),
('s10', 'ECONOMY', '10:00 PM', '2022-08-26', 200, 'NEW YORK', 'GUJRANWALA', 1080),
('s2', 'BUSINESS', '04:00 PM', '2022-08-27', 1000, 'LAHORE', 'GUJRANWALA', 1010),
('s3', 'BUSINESS', '04:00 PM', '2021-03-26', 500, 'MULTAN', 'ISLAMABAD', 1011),
('s4', 'BUSINESS', '08:00 AM', '2021-03-27', 1500, 'PESHAWAR', 'RAWALPINDI', 1020),
('s5', 'BUSINESS', '04:00 PM', '2021-03-27', 2000, 'SARGODHA', 'GUJRANWALA', 1030),
('s6', 'ECONOMY', '12:00 PM', '2020-03-28', 300, 'KOHAT', 'MARDAN', 1040),
('s7', 'ECONOMY', '03:00 PM', '2020-03-29', 900, 'SAKHAR', 'KARACHI', 1050),
('s8', 'ECONOMY', '07:00 PM', '2020-03-30', 800, 'KARACHI', 'LAHORE', 1020),
('s9', 'ECONOMY', '09:00 PM', '2020-03-24', 700, 'GUJRANWALA', 'DASKA', 1070);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `NUMBER` int(11) NOT NULL,
  `MODEL` int(11) NOT NULL,
  `TOTAL_SEATS` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`NUMBER`, `MODEL`, `TOTAL_SEATS`) VALUES
(1010, 2020, 30),
(1011, 2016, 30),
(1020, 2019, 20),
(1030, 2010, 40),
(1040, 2018, 25),
(1050, 2019, 20),
(1060, 2017, 40),
(1070, 2016, 25),
(1080, 2014, 45),
(1090, 2015, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `ID_CARD` (`ID_CARD`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`,`seat_no`,`res_schedule`),
  ADD KEY `res_schedule` (`res_schedule`),
  ADD KEY `reserved_by` (`reserved_by`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `bus_no` (`bus_no`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`NUMBER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`res_schedule`) REFERENCES `schedule` (`s_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`reserved_by`) REFERENCES `customer` (`USERNAME`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus_no`) REFERENCES `vehicle` (`NUMBER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
