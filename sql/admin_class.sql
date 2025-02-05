-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 08:50 AM
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
-- Table structure for table `admin_class`
--

CREATE TABLE `admin_class` (
  `class_id` varchar(20) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(50) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `capacity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_class`
--

INSERT INTO `admin_class` (`class_id`, `subject_id`, `year`, `day`, `time`, `teacher`, `capacity`) VALUES
('Eng0001', 11245, 'Year 1', 'Monday', '2:30pm - 4:30pm', 'Mr.John', '20/30'),
('Eng2001', 22534, 'Year 2', 'Monday', '5:00pm - 7:00pm', 'Mr.John', '20/30'),
('Mat0003', 11132, 'Year 1', 'Wednesday', '2:30pm - 4:30pm', 'Mr.David', '20/30'),
('Mat2003', 22134, 'Year 2', 'Wednesday', '5:00pm - 7:00pm', 'Mr.David', '20/30'),
('Mly0002', 11351, 'Year 1', 'Tuesday', '2:30pm - 4:30pm', 'Ms.Lily', '20/30'),
('Mly2002', 22345, 'Year 2', 'Tuesday', '5:00pm - 7:00pm', 'Ms.Lily', '20/30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_class`
--
ALTER TABLE `admin_class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_class`
--
ALTER TABLE `admin_class`
  ADD CONSTRAINT `admin_class_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `admin_subject` (`subject_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
