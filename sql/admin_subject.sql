-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 01:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_subject`
--

CREATE TABLE `admin_subject` (
  `subject_ID` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_subject`
--

INSERT INTO `admin_subject` (`subject_ID`, `subject`, `year`, `price`, `description`) VALUES
(11132, 'Math', 'Year 1', 510.00, NULL),
(11245, 'English', 'Year 1', 510.00, NULL),
(11351, 'Malay', 'Year 1', 510.00, NULL),
(22134, 'Math 2', 'Year 2', 510.00, NULL),
(22345, 'Malay 2', 'Year 2', 510.00, NULL),
(22534, 'English 2', 'Year 2', 510.00, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_subject`
--
ALTER TABLE `admin_subject`
  ADD PRIMARY KEY (`subject_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_subject`
--
ALTER TABLE `admin_subject`
  MODIFY `subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22546;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
