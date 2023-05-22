-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(30) NOT NULL,
  `Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `C_ID` int(4) NOT NULL,
  `Dept_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `engineering`
--

CREATE TABLE `engineering` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `S_ID` int(6) NOT NULL,
  `C_ID` int(4) NOT NULL,
  `Status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `C_ID` int(4) NOT NULL,
  `C_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(106, 'Ayesha Akhter', 'ayesha123@gmail.com', 'Female', 'ayesha123'),
(107, 'Anjuma Islam', 'anjuma123@gmail.com', 'Female', 'anjuma123'),
(108, 'Farhana akhter', 'farhana123@gmail.com', 'Female', 'farhana123'),
(109, 'Jannatul Ferdaus', 'jannat123@gmail.com', 'Female', 'jannatul123'),
(110, 'Johnathon Wick', 'john123@gmail.com', 'Male', 'abcde');

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
  `Pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_ID`, `Name`, `Mail`, `Ph_No`, `Specialization`, `Pass`) VALUES
(5000, 'Mia Mahmudul Hoque Shaon', 'houque2021@gmail.com', '01600000001', 'Computer Science', 'asdfg56'),
(5001, 'Nazmul Islam Srabon', 'srabon2022@gmail.com', '01600000002', 'Business Studies', 'asdfg57'),
(5002, 'Asif Rahman', 'asif2024@gmail.com', '01600000004', 'Medical Sciences', 'asdfg58'),
(5003, 'Nafiz Ahmed', 'nafiz2025@gmail.com', '01600000005', 'General Education', 'asdft59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
