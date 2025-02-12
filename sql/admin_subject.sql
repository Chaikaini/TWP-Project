-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 01:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `description` text DEFAULT NULL,
  `teacher` varchar(255) NOT NULL,
  `rating` decimal(3,1) NOT NULL DEFAULT 0.0,
  `image` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_subject`
--

INSERT INTO `admin_subject` (`subject_ID`, `subject`, `year`, `price`, `description`, `teacher`, `rating`, `image`, `page`) VALUES
(11132, 'Year 1 Math', 'Year 1', 510.00, NULL, 'Mr. David', 4.6, 'img/math.jpg', 'Year 1 Math class.html'),
(11245, 'Year 1 English', 'Year 1', 510.00, NULL, 'Mr. John', 4.5, 'img/english.jpg', 'Year 1 English class.html'),
(11351, 'Year 1 Malay', 'Year 1', 510.00, NULL, 'Ms. Lily', 4.3, 'img/malay.jpg', 'Year 1 Malay class.html'),
(22134, 'Year 2 Math ', 'Year 2', 510.00, NULL, 'Mr. David', 4.5, 'img/math.jpg', 'Year 2 Math class.html'),
(22345, 'Year 2 Malay', 'Year 2', 510.00, NULL, 'Ms. Lily', 4.2, 'img/malay.jpg', 'Year 2 Malay class.html'),
(22534, 'Year 2 English', 'Year 2', 510.00, NULL, 'Mr. John', 4.8, 'img/english.jpg', 'Year 2 English class.html');

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
  MODIFY `subject_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22574;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
