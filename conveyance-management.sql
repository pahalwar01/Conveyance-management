-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 07:29 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` text NOT NULL,
  `admin_phone` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`) VALUES
(1, 'Rohit Kumar', 'admin@rohit.com', '7503629170', '$2y$10$QV.s9cimopfTmhgYgDhsLOnDeMNM2ny3KFh2WRNZs3dcevqqyDmX.');

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
(1, 'Rohit kumar', 'admin@rohit.com', '7503629170', '$2y$10$6hKKIgn7Tk5UQoBHWQyyge9qLckKx7y0p4s7fjmogb8SNkw308OLu'),
(2, 'Dharampal', 'dharampal@rohit.com', '9555424849', '$2y$10$oN9cUqQs7mcJs5NUKz8vPe98PjVbrv0lQq15.7pdZpuSJb/lrSRXG'),
(3, 'Lalit Kumar', 'lalit@rohit.com', '9999618106', '$2y$10$7MsBZxbFr1fLUd7GnJWp0./qdaoPbZO3WN/TLMt5qwQaeWFqwAQw.'),
(4, 'Karan Kumar', 'karan@rohit.com', '9873333660', '$2y$10$NUMWon265YivVZ4vfch/MebuUXAiCsvDr/eE/L.veB0Y17gascPpi');

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
(4, 1, 'Rohit kumar', 'Naresh Dhawan', '2025-01-02', 'cheque pickup', 'Noida Sector 45', 'Faridabad', 111),
(5, 6, 'Dharampal', 'Ajay', '2024-12-29', 'laptop', 'Noida Sector 45', 'Faridabad', 88),
(10, 1, 'Rohit kumar', 'Ajay', '2025-02-01', 'Oggifbkhjbdf', 'Noida Sector 41', 'Faridabad', 321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ride_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
