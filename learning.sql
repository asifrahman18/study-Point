-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 06:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pass`) VALUES
('admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL,
  `T_ID` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`C_ID`, `C_Name`, `T_ID`, `description`, `category`) VALUES
(2004, 'Test', 5003, 'Test Description', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `teacherID` int(11) NOT NULL,
  `lecture` int(10) NOT NULL,
  `pdf` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `C_ID` int(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`teacherID`, `lecture`, `pdf`, `name`, `C_ID`, `type`) VALUES
(5003, 1, 'DOCTYPE-html.txt', 'JOY BANGLA', 4003, ''),
(5003, 1, 'SDA_Batch_1_Pitch_Decks.pdf', 'Lol', 4004, ''),
(5003, 2, 'binod.pdf', 'poco', 4004, ''),
(5003, 1, 'cse311-assignment.pdf', 'Upload test', 3008, ''),
(5003, 1, 'SDA_Batch_1_Pitch_Decks.pdf', 'Assignment 1', 3007, 'assignment'),
(5003, 2, 'cse311-assignment.pdf', 'Lecture 2', 3007, 'lecture');

-- --------------------------------------------------------

--
-- Table structure for table `engineering`
--

CREATE TABLE `engineering` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL,
  `T_ID` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `engineering`
--

INSERT INTO `engineering` (`C_ID`, `C_Name`, `T_ID`, `description`, `category`) VALUES
(3007, 'Database', 5003, 'DBMS', 'Engineering'),
(3008, 'Database', 5003, '44', 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `S_ID` int(6) NOT NULL,
  `C_ID` int(4) NOT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`S_ID`, `C_ID`, `Status`) VALUES
(101, 3008, 'enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL,
  `T_ID` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`C_ID`, `C_Name`, `T_ID`, `description`, `category`) VALUES
(4003, 'Politics', 5003, 'Joy Bangla', 'General'),
(4004, 'Bangla', 5003, 'JOY BANGLA', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL,
  `T_ID` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_file`
--

CREATE TABLE `pdf_file` (
  `pdf` varchar(300) NOT NULL,
  `mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_file`
--

INSERT INTO `pdf_file` (`pdf`, `mail`) VALUES
('binod.pdf', ''),
('ER-Diagram.pdf', 'ppp@gmail.com'),
('L04_Draft.pdf', 'josim@uddin.com'),
('Lab Report Template.pdf', 'nasir@gmail.com'),
('', 'nafiz2025@gmail.com'),
('', 'nafiz2025@gmail.com'),
('', 'nafiz2025@gmail.com'),
('cse311-assignment.pdf', 'teacher.est@gmail.co');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_ID`, `Name`, `Mail`, `Gender`, `Pass`) VALUES
(101, 'rahin', 'rahin123@gmail.com', 'Male', '12345'),
(102, 'Gus', 'gus@gmail.com', 'Male', '123456'),
(103, 'Anisul Islam', 'anis123@gmail.com', 'Male', 'anisul123'),
(104, 'Jahidul Islam', 'jahid123@gmail.com', 'Male', 'jahidul123'),
(105, 'Atikul Islam', 'atik123@gmail.com', 'Male', 'atikul123'),
(108, 'Farhana akhter', 'farhana123@gmail.com', 'Female', 'farhana123'),
(109, 'Jannatul Ferdaus', 'jannat123@gmail.com', 'Female', 'jannatul123'),
(110, 'Johnathon Wick', 'john123@gmail.com', 'Male', 'abcde'),
(111, 'Nasir', 'nasir@gmail.com', 'Male', 'nasir123');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_ID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Ph_No` varchar(20) DEFAULT NULL,
  `Specialization` varchar(30) DEFAULT NULL,
  `Pass` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_ID`, `Name`, `Mail`, `Ph_No`, `Specialization`, `Pass`, `status`) VALUES
(5000, 'Mia Mahmudul Hoque Shaon', 'houque2021@gmail.com', '01600000001', 'Computer Science', 'asdfg56', 'verified'),
(5001, 'Nazmul Islam Srabon', 'srabon2022@gmail.com', '01600000002', 'Business Studies', 'asdfg57', 'verified'),
(5002, 'Asif Rahman', 'asif2024@gmail.com', '01600000004', 'Medical Sciences', 'asdfg58', 'verified'),
(5003, 'Nafiz Ahmed', 'nafiz2025@gmail.com', '01600000005', '', 'asdft59', 'verified'),
(5004, 'jossim', 'jossim@gmail.com', '01451296365', NULL, '4545', 'unverified'),
(5006, 'jossim', 'mayor@gmail.com', '01451296365', NULL, '123456', 'unverified'),
(5007, 'nazmul', 'nazmul@gmail.com', '01451296365', NULL, '4545', 'Verified'),
(5008, 'jossim', 'jossim3@gmail.com', '01451296365', 'Math', '12345', 'Verified'),
(5009, 'ppp', 'pp@gmail.com', '01451296365', NULL, '7878', 'Verified'),
(5010, 'ppp', 'ppp@gmail.com', '01451296365', NULL, '4545', 'unverified'),
(5011, 'jossim', 'josim@uddin.com', '01451296365', NULL, '8785', 'unverified'),
(5012, 'Nasir', 'nasir@gmail.com', '01451296365', NULL, '789456', 'unverified'),
(5013, 'Nasir hossain', 'nasir@hossain.com', '01451296365', 'OS', '585885', 'verified'),
(5015, 'testTeacher', 'teacher.est@gmail.com', '01451296365', 'Chemistry', '78963', 'unverified'),
(5016, 'tews', 'test@test.com', '01451296365', '1', '4444', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `experience` varchar(20) DEFAULT NULL,
  `qualification` varchar(300) DEFAULT NULL,
  `specialization` varchar(300) DEFAULT NULL,
  `prevExp` varchar(300) DEFAULT NULL,
  `other` varchar(300) DEFAULT NULL,
  `pdf` varchar(300) DEFAULT NULL,
  `mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`experience`, `qualification`, `specialization`, `prevExp`, `other`, `pdf`, `mail`) VALUES
('15', 'HSC', 'English', 'None', 'None', NULL, 'mail'),
(NULL, NULL, NULL, NULL, NULL, 'hello', 'mail'),
('', '', '', '', '', NULL, 'nafiz2025@gmail.com'),
('1', 'BSC', 'Chemistry', 'None', 'Programming', NULL, 'teacher.est@gmail.co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `engineering`
--
ALTER TABLE `engineering`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `C_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `engineering`
--
ALTER TABLE `engineering`
  MODIFY `C_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3009;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `C_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4005;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `C_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5017;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
