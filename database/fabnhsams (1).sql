-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 11:50 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fabnhsams`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` bigint(40) NOT NULL,
  `Department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `Department`) VALUES
(582442288, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `AttendanceID` bigint(40) NOT NULL,
  `att_Date` date NOT NULL,
  `att_TimeIn` time(6) NOT NULL,
  `att_TimeOut` time(6) NOT NULL,
  `EmployeeID` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`AttendanceID`, `att_Date`, `att_TimeIn`, `att_TimeOut`, `EmployeeID`) VALUES
(1, '2020-04-16', '17:33:00.000000', '17:33:00.000000', 832060422),
(3, '2020-04-16', '17:36:00.000000', '17:36:00.000000', 832060422),
(4, '2020-04-16', '17:36:00.000000', '17:36:00.000000', 832060422);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` bigint(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Age` int(10) NOT NULL,
  `UserID` bigint(40) NOT NULL,
  `ScheduleID` bigint(40) NOT NULL,
  `FingerprintID` bigint(40) NOT NULL,
  `AttendanceID` bigint(40) NOT NULL,
  `DepartmentID` bigint(40) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Name`, `Address`, `Age`, `UserID`, `ScheduleID`, `FingerprintID`, `AttendanceID`, `DepartmentID`, `Status`) VALUES
(832060422, 'Rone Jean Aguilera', 'Lodlod, Lipa City, Batangas', 21, 2496181266, 0, 0, 0, 582442288, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(10) NOT NULL,
  `EmployeeID` bigint(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(6) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`id`, `EmployeeID`, `Name`, `Date`, `Time`, `Status`) VALUES
(1, 832060422, 'Rone Jean Aguilera', '2020-04-16', '17:33:00.000000', 'Timed-In'),
(3, 832060422, 'Rone Jean Aguilera', '2020-04-16', '17:36:00.000000', 'Timed-In'),
(4, 832060422, 'Rone Jean Aguilera', '2020-04-16', '17:36:00.000000', 'Timed-Out'),
(5, 832060422, 'Rone Jean Aguilera', '2020-04-16', '17:36:00.000000', 'Timed-In'),
(6, 832060422, 'Rone Jean Aguilera', '2020-04-16', '17:36:00.000000', 'Timed-Out');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` varchar(20) NOT NULL,
  `schedule` varchar(40) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `endTime` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `schedule`, `startTime`, `endTime`) VALUES
('HAWE', 'HAWE', '14:22', '15:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` bigint(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `username`, `password`) VALUES
(2496181266, 'arjayaguilera', 'arjayaguilera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`AttendanceID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `UserID` (`UserID`,`ScheduleID`,`AttendanceID`,`DepartmentID`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `AttendanceID` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
