-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:32 PM
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
-- Database: `ermsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `rate` varchar(250) NOT NULL,
  `ha` varchar(250) NOT NULL,
  `ta` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `department`, `rate`, `ha`, `ta`, `salary`) VALUES
(1, 'Programmer', '60,000', '30,000', '10,000', '100,000'),
(2, 'Web developer', '60,000', '30,000', '10,000', '100,000'),
(3, 'security officers', '40,000', '10,000', '10,000', '60,000'),
(4, 'Cleaners', '40,000', '10,000', '10,000', '60,000'),
(5, 'Receptionist', '40,000', '10,000', '10,000', '60,000'),
(6, 'Drivers', '40,000', '10,000', '10,000', '60,000'),
(7, 'Indoor staff', '50,000', '20,000', '10,000', '80,000'),
(8, 'Engineering', '50,000', '10,000', '10,000', '70,000');

-- --------------------------------------------------------

--
-- Table structure for table `empprofile`
--

CREATE TABLE `empprofile` (
  `ID` int(250) NOT NULL,
  `profilpic` varchar(20) NOT NULL,
  `Firstname` varchar(250) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `Empcode` int(250) NOT NULL,
  `EmpDept` varchar(250) NOT NULL,
  `EmpDesignation` varchar(250) NOT NULL,
  `EmpContactNo` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `EmpJoingdate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empprofile`
--

INSERT INTO `empprofile` (`ID`, `profilpic`, `Firstname`, `Lastname`, `Empcode`, `EmpDept`, `EmpDesignation`, `EmpContactNo`, `email`, `gender`, `password`, `EmpJoingdate`) VALUES
(1, 'img2.jpg', 'Alfred', 'Akpan', 1, 'Computer Science', 'Faculty of Computer Science', '01074883634', 'alfred@gmail.com', 'male', 'alfred111', '01/01/2023'),
(3, 'img3.jpg', 'Jerry', 'Chukwuma', 2, 'Computer Science', 'Faculty of Computer Science', '07059918791', 'jerryaneke3@gmail.com', 'male', 'jerry111', '02/01/2023'),
(4, 'img4.jpg', 'Nelson', 'Sam', 3, 'engineering', 'Faculty of engineering', '09073665338', 'nelson@gmail.com', 'male', 'nelson111', '03/01/2023'),
(6, 'doctor3.jfif', 'Chidi', 'Frank', 4, 'Programmer', 'faculty', '0705912345', 'chidi@gmail.com', 'male', 'chidi111', '04/01/2023');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `ID` int(250) NOT NULL,
  `Fullname` varchar(250) NOT NULL,
  `wd` varchar(250) NOT NULL,
  `Hours` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`ID`, `Fullname`, `wd`, `Hours`) VALUES
(1, 'Alfred Akpan', 'Programmer', '20/01/2023-30/01/2023'),
(3, 'Jerry Chukwuma', 'Web developer', '28/01/2023-01/02/2023'),
(4, 'Nelson Sam', 'Engineering', '23/01/2023-30/01/2023'),
(6, 'Chidi', 'Programmer', '28/01/2023-01/02/2023');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `ID` int(12) NOT NULL,
  `month` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`ID`, `month`) VALUES
(1, 'January'),
(2, 'Feburary'),
(3, 'March'),
(4, 'April'),
(5, 'MAY'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(250) NOT NULL,
  `profilpic` varchar(200) NOT NULL,
  `Fullname` varchar(200) NOT NULL,
  `wd` varchar(200) NOT NULL,
  `Hours` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `month` varchar(250) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `ha` varchar(200) NOT NULL,
  `ta` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `paydate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `profilpic`, `Fullname`, `wd`, `Hours`, `email`, `month`, `rate`, `ha`, `ta`, `salary`, `paydate`) VALUES
(1, 'img2.jpg', 'Alfred Akpan', 'programmer', '27 days', 'alfred@gmail.com', 'January', '40,000', '10,000', '20,000', '70,000', '30/12/2022'),
(3, 'img3.jpg', 'Jerry Chukwuma', 'Web Developoer', '30 days', 'jerryaneke3@gmail.com', 'January', '50,000', '10,000', '20,000', '80,000', '30/12/2022'),
(4, 'img4.jpg', 'Nelson Sam', 'Engineering', '31 days', 'nelson@gmail.com', 'january', '50,000', '10,000', '10,000', '70,000', '30/12/2022'),
(6, 'hospital.jfif', 'Chidi', 'Programmer', '30 days', 'chidi@gmail.com', 'January', '50,000', '20,000', '10,000', '80,000', '30/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminuserName` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminuserName`, `email`, `Password`, `AdminRegdate`) VALUES
(1, 'Jerry', 'jerryaneke3@gmail.com', 'jerry111', '2019-02-07 16:52:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `empprofile`
--
ALTER TABLE `empprofile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empprofile`
--
ALTER TABLE `empprofile`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
