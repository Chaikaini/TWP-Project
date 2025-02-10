-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 03:00 AM
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
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `student_name`, `course_name`, `teacher_name`, `total_amount`, `payment_method`, `order_date`, `time`) VALUES
(1, 'ORD1001', 'Yuna', 'Year 1 Math', 'Mr. David', 610.00, 'JomPAY', '2025-02-07 08:23:48', 'Wednesday 2.30pm-4.30pm'),
(2, 'ORD1002', 'Bob Lee', 'Year 2 Malay', 'Ms.Lily', 610.00, 'TNG', '2025-02-07 08:23:48', 'Tuesday 5:00pm - 7:00pm'),
(3, 'ORD1003', 'Anna', 'Year 1 Math', 'Mr. David', 610.00, 'JomPay', '2025-02-07 08:23:48', 'Wednesday 2:30pm-4:30pm');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `before_insert_order` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE new_order_id VARCHAR(20);

   
    SELECT MAX(order_id) INTO new_order_id FROM orders;

    
    IF new_order_id IS NULL THEN
        SET new_order_id = 'ORD1001';
    ELSE
       
        SET new_order_id = CONCAT('ORD', LPAD(SUBSTRING(new_order_id, 4) + 1, 4, '0'));
    END IF;

    
    SET NEW.order_id = new_order_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
