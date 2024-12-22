-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 11:04 AM
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
-- Database: `conveyance-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(11) NOT NULL,
  `rider_name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `rider_name`, `email`, `phone`, `password`) VALUES
(1, 'Rohit', 'admin@rohit.com', '7503629170', '$2y$10$xQRroNqREv4ws62HGHxvUeeYOpAwGqllAE1bv9.mIinnzXmof1WjG'),
(12, 'Dharampal', 'dharampal@rohit.com', '9555424849', '$2y$10$lUwrkB65GxArUseYlrEv1O2ERRNQzlMDi8sbaOGVnW5Do9Bo.wVBy'),
(13, 'Karan Kumar', 'karan@rohit.com', '9873333660', '$2y$10$oGx/7BTFtcVFQgVmN9wjwOMfzYAPjkWeVQKkgVVdrTI867CupB1Y2'),
(14, 'Lalit Kumar', 'lalit@rohit.com', '9999618106', '$2y$10$lXLdByVKgw3AmBvEupCOReBvF4iGrJI0AF7ufY9wnxaVZwI/VVMIa');

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `ride_id` int(10) NOT NULL,
  `rider_id` int(3) NOT NULL,
  `rider_name` text NOT NULL,
  `sender_name` text NOT NULL,
  `w_date` date NOT NULL,
  `work_type` text NOT NULL,
  `start_from` text NOT NULL,
  `end_to` text NOT NULL,
  `km` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rides`
--

INSERT INTO `rides` (`ride_id`, `rider_id`, `rider_name`, `sender_name`, `w_date`, `work_type`, `start_from`, `end_to`, `km`) VALUES
(14, 0, 'Lalit Kumar', 'Naushad Alam', '2024-12-06', 'official', 'Noida', 'Noida sector 101', 331),
(15, 0, 'Lalit Kumar', 'Naushad Alam', '2024-12-09', 'official', 'Noida', 'Noida sector 101', 331),
(16, 0, 'Lalit Kumar', 'Naushad Alam', '2024-12-01', 'official', 'Noida', 'Noida sector 101', 331),
(17, 14, 'Lalit Kumar', 'Rohit Kumar', '2024-12-13', 'official', 'Noida', 'Delhi', 123),
(18, 14, 'Lalit Kumar', 'Rohit Kumar', '2024-12-20', 'official', 'Noida', 'Delhi', 111),
(19, 13, 'Karan Kumar', 'Rohit Kumar', '2024-12-22', 'official', 'Noida', 'Gurgaon', 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`ride_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ride_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
