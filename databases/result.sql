-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 05:00 PM
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
-- Database: `exam_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `roll_number` varchar(10) NOT NULL,
  `student_department` varchar(25) NOT NULL,
  `student_gmail` varchar(50) NOT NULL,
  `year` varchar(5) NOT NULL,
  `Batch` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `instructor_id` int(5) NOT NULL,
  `instructor_name` varchar(50) NOT NULL,
  `instructor_department` varchar(25) NOT NULL,
  `instructor_gmail` varchar(50) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  `exam_title` varchar(40) NOT NULL,
  `unique_exam_name` varchar(100) NOT NULL,
  `total_marks` int(5) NOT NULL,
  `secured_marks` int(5) NOT NULL,
  `entry_time` varchar(25) NOT NULL,
  `exit_time` varchar(25) NOT NULL,
  `devices` tinyint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
