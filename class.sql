-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 10:38 AM
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
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_fname` varchar(30) NOT NULL,
  `Admin_lname` varchar(30) NOT NULL,
  `Admin_email` varchar(50) NOT NULL,
  `Admin_contact` bigint(12) NOT NULL,
  `Admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `A_ID` int(11) NOT NULL,
  `A_S_ID` int(11) NOT NULL,
  `A_B_ID` int(11) NOT NULL,
  `A_fees` int(6) NOT NULL,
  `A_date` date NOT NULL,
  `A_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `Att_ID` int(11) NOT NULL,
  `Att_S_ID` int(11) NOT NULL,
  `Att_B_ID` int(11) NOT NULL,
  `Att_status` tinyint(1) NOT NULL,
  `Att_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `B_ID` int(11) NOT NULL,
  `B_name` text NOT NULL,
  `B_venue` text NOT NULL,
  `B_fees` int(6) NOT NULL,
  `B_F_ID` int(11) NOT NULL,
  `B_startdate` date NOT NULL,
  `B_enddate` date NOT NULL,
  `B_duration` varchar(30) NOT NULL,
  `B_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `E_ID` int(11) NOT NULL,
  `E_reason` text NOT NULL,
  `E_amount` int(10) NOT NULL,
  `E_Admin_ID` int(11) NOT NULL,
  `E_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `F_ID` int(11) NOT NULL,
  `F_fname` varchar(30) NOT NULL,
  `F_lname` varchar(30) NOT NULL,
  `F_contact` bigint(12) NOT NULL,
  `F_email` varchar(20) NOT NULL,
  `F_address` varchar(200) NOT NULL,
  `F_qualification` varchar(30) NOT NULL,
  `F_experience` decimal(2,2) NOT NULL,
  `F_picture` varchar(100) NOT NULL,
  `F_about` text NOT NULL,
  `F_DOJ` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`F_ID`, `F_fname`, `F_lname`, `F_contact`, `F_email`, `F_address`, `F_qualification`, `F_experience`, `F_picture`, `F_about`, `F_DOJ`) VALUES
(1, 'mohid', 'kazi', 8097643647, 'mohid@gmail.com', 'vashi', 'b.e', '0.99', '', 'engineer', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `feepayment`
--

CREATE TABLE `feepayment` (
  `Fee_ID` int(11) NOT NULL,
  `Fee_S_ID` int(11) NOT NULL,
  `Fee_A_ID` int(11) NOT NULL,
  `Fee_amount` int(6) NOT NULL,
  `Fee_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fsalary`
--

CREATE TABLE `fsalary` (
  `FS_ID` int(11) NOT NULL,
  `FS_F_ID` int(11) NOT NULL,
  `FS_amount` int(11) NOT NULL,
  `FS_comment` varchar(50) NOT NULL,
  `FS_DOP` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` int(11) NOT NULL,
  `S_Roll` varchar(15) NOT NULL,
  `S_fname` varchar(30) NOT NULL,
  `S_lname` varchar(30) NOT NULL,
  `S_contact` bigint(12) NOT NULL,
  `S_email` varchar(100) NOT NULL,
  `S_address` varchar(200) NOT NULL,
  `S_institute` varchar(100) NOT NULL,
  `S_branch` varchar(50) NOT NULL,
  `S_year` varchar(20) NOT NULL,
  `S_DOA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supportstaff`
--

CREATE TABLE `supportstaff` (
  `SS_ID` int(11) NOT NULL,
  `SS_fname` varchar(30) NOT NULL,
  `SS_lname` varchar(30) NOT NULL,
  `SS_contact` bigint(12) NOT NULL,
  `SS_email` varchar(50) NOT NULL,
  `SS_address` varchar(100) NOT NULL,
  `SS_DOJ` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testmarks`
--

CREATE TABLE `testmarks` (
  `Test_ID` int(11) NOT NULL,
  `Test_A_ID` int(11) NOT NULL,
  `Test_Marks` int(3) NOT NULL,
  `Test_Type` varchar(20) NOT NULL,
  `Test_Comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `TT_ID` int(11) NOT NULL,
  `TT_B_ID` int(11) NOT NULL,
  `TT_Start_Mon` time NOT NULL,
  `TT_End_Mon` time NOT NULL,
  `TT_Start_Tue` time NOT NULL,
  `TT_End_Tue` time NOT NULL,
  `TT_Start_Wed` time NOT NULL,
  `TT_End_Wed` time NOT NULL,
  `TT_Start_Thu` time NOT NULL,
  `TT_End_Thu` time NOT NULL,
  `TT_Start_Fri` time NOT NULL,
  `TT_End_Fri` time NOT NULL,
  `TT_Start_Sat` time NOT NULL,
  `TT_End_Sat` time NOT NULL,
  `TT_Start_Sun` time NOT NULL,
  `TT_End_Sun` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`Att_ID`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `feepayment`
--
ALTER TABLE `feepayment`
  ADD PRIMARY KEY (`Fee_ID`);

--
-- Indexes for table `fsalary`
--
ALTER TABLE `fsalary`
  ADD PRIMARY KEY (`FS_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `supportstaff`
--
ALTER TABLE `supportstaff`
  ADD PRIMARY KEY (`SS_ID`);

--
-- Indexes for table `testmarks`
--
ALTER TABLE `testmarks`
  ADD PRIMARY KEY (`Test_ID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`TT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `Att_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `E_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feepayment`
--
ALTER TABLE `feepayment`
  MODIFY `Fee_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fsalary`
--
ALTER TABLE `fsalary`
  MODIFY `FS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supportstaff`
--
ALTER TABLE `supportstaff`
  MODIFY `SS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testmarks`
--
ALTER TABLE `testmarks`
  MODIFY `Test_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `TT_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
