-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 09:23 AM
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
  `gender` varchar(10) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `student_name`, `course_name`, `teacher_name`, `total_amount`, `payment_method`, `order_date`, `gender`, `time`) VALUES
(1, 'ORD1001', 'Alice Johnson', 'Mathematics 101', 'Mr. Smith', 150.00, 'Credit Card', '2025-02-07 08:23:48', 'Female', '2025-02-07 09:00:00'),
(2, 'ORD1002', 'Bob Lee', 'Physics 101', 'Dr. Brown', 200.00, 'PayPal', '2025-02-07 08:23:48', 'Male', '2025-02-07 09:30:00'),
(3, 'ORD1003', 'Charlie Kim', 'Computer Science 101', 'Prof. White', 180.00, 'Bank Transfer', '2025-02-07 08:23:48', 'Male', '2025-02-07 10:00:00'),
(4, 'ORD1004', 'Diana Wong', 'Biology 101', 'Mrs. Green', 160.00, 'Credit Card', '2025-02-07 08:23:48', 'Female', '2025-02-07 10:30:00'),
(5, 'ORD1005', 'Eva Green', 'Chemistry 101', 'Dr. Black', 175.00, 'Cash', '2025-02-07 08:23:48', 'Female', '2025-02-07 11:00:00');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `before_insert_order` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
    DECLARE new_order_id VARCHAR(20);

    -- 获取最大现有的order_id
    SELECT MAX(order_id) INTO new_order_id FROM orders;

    -- 如果没有订单，则设置为ORD1001
    IF new_order_id IS NULL THEN
        SET new_order_id = 'ORD1001';
    ELSE
        -- 提取当前的数字部分并加1
        SET new_order_id = CONCAT('ORD', LPAD(SUBSTRING(new_order_id, 4) + 1, 4, '0'));
    END IF;

    -- 设置新插入订单的order_id
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
