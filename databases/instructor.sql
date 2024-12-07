-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 06:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination_with_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(45) NOT NULL,
  `instructor_id` varchar(500) NOT NULL,
  `instructor_name` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `phone_number` int(10) NOT NULL,
  `files` varchar(50) NOT NULL,
  `department` varchar(500) NOT NULL,
  `post` varchar(500) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `passwords` varchar(8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `devices` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `instructor_id`, `instructor_name`, `dob`, `phone_number`, `files`, `department`, `post`, `batch`, `gender`, `username`, `gmail`, `passwords`, `created_at`, `devices`) VALUES
(1, '101', 'Albert', '2022-11-02', 2147483647, 'bfirst.jpeg', 'CA/IT', 'Head of Department', 'Self Financed', 'Male', 'alberteinstein', 'albert@gmail.com', 'Al@12345', '2022-11-05 13:15:31', 0),
(2, '102', 'Mary ', '2022-11-04', 2147483647, 'gthird.jpeg', 'CA/IT', 'Assistant Professor', 'Self Financed', 'Female', 'Mary', 'mary@gmail.com', 'Ma@12345', '2022-11-05 13:45:42', 0),
(3, '103', 'Jessica', '2022-11-04', 2147483647, 'gfirst.jpeg', 'Computer Science', 'Head of Department', 'Aided', 'Female', 'Jessica', 'jessy@gmail.com', 'Jessy@12', '2022-11-05 13:49:46', 0),
(4, '104', 'David Michael', '2022-11-10', 2147483647, 'bfirst.jpeg', 'Mathematics', 'Assistant Professor', 'Aided', 'Male', 'David ', 'david@gmail.com', 'D@vid123', '2022-11-05 13:52:31', 0),
(5, '105', 'Joseph David', '2022-11-17', 2147483647, 'bfirst.jpeg', 'Computer Science', 'Assistant Professor', 'Aided', 'Male', 'Joseph ', 'joseph@gmail.com', 'Jose@123', '2022-11-05 13:55:43', 0),
(6, '106', 'Jennifer', '2022-11-19', 2147483647, 'gfirst.jpeg', 'Mathematics', 'Head of Department', 'Aided', 'Female', 'Jennifer', 'jenny@gmail.com', 'Jenny@20', '2022-11-05 13:59:29', 0),
(9, '107', 'sooraj', '2022-11-01', 96694964, 'pexels-daria-shevtsova-1580625.jpg', 'Zoology', 'Head of Department', 'Self Financed', 'Male', 'sooraj', 'sooraj@gmail.com', 'So@12345', '2022-11-05 17:58:09', 0),
(10, '108', 'harish', '2022-11-10', 968484, 'clear.png', 'Psycology', 'Assistant Professor', 'Self Financed', 'Male', 'sriharish', 'sriharishkumar17@gmail.com', 'Sri@1234', '2022-11-07 07:28:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
