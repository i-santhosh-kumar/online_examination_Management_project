-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 02:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `upload` varchar(50) NOT NULL,
  `favqus` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `favplace` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `roll_number` varchar(10) NOT NULL,
  `years` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `favlanguage` varchar(100) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `pass_word` varchar(8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `devices` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `dob`, `phonenumber`, `upload`, `favqus`, `gender`, `favplace`, `department`, `batch`, `roll_number`, `years`, `semester`, `favlanguage`, `shift`, `username`, `gmail`, `pass_word`, `created_at`, `devices`) VALUES
(1, 'Josh S', '2004-03-31', '9876543210', 'bfirst.jpeg', 'family and friends', 'Male', 'India', 'CA/IT', '2020-2023', '22SUCA01  ', 'I', 'I', 'English', 'Self Financed', 'Josh ', 'josh@students.tcarts.in', 'Ss@12345', '2022-11-04 15:16:41', 0),
(2, 'Charles A ', '2004-02-02', '9944478234', 'bfirst.jpeg', 'happiness', 'Male', 'France', 'CA/IT', '2022-2025', '22SUCA02', 'I', 'I', 'English', 'Self Financed', 'Charles', 'charles@students.tcarts.in', 'charles0', '2022-11-04 15:19:09', 0),
(3, 'Beryl C ', '2004-05-05', '8765432019', 'gfirst.jpeg', 'peace of mind', 'Female', 'USA', 'CA/IT', '2022-2025', '22SUCA03', 'I', 'I', 'French', 'Self Financed', 'Beryl ', 'beryl@students.tcarts.in', 'beryl03', '2022-11-04 15:25:02', 0),
(4, 'Jonathan G', '2003-05-05', '8765432109', 'bsecond.jpeg', 'happiness', 'Male', 'France', 'CA/IT', '2021-2024', '21SUCA01', 'II', 'III', 'Tamil', 'Aided', 'Jonathan', 'jonathan@students.tcarts.in', 'jonathan', '2022-11-04 15:28:34', 0),
(5, 'Martina A ', '2003-10-02', '8765432190', 'gsecond.jpeg', 'career and future', 'Female', 'France', 'CA/IT', '2021-2024', '21SUCA02', 'II', 'III', 'Mandarin', 'Self Financed', 'Martina', 'martina@students.tcarts.in', 'martina0', '2022-11-04 15:33:13', 0),
(6, 'Rajesh R', '2002-03-03', '9342321825', 'bthird.jpeg', 'career and future', 'Male', 'Korea', 'CA/IT', '2020-2023', '20SUCA01', 'III', 'V', 'French', 'Self Financed', 'Rajesh', 'rajesh@students.tcarts.in', 'rajesh01', '2022-11-04 15:35:20', 0),
(7, 'Hamshini V', '2002-12-12', '7654321980', 'gthird.jpeg', 'happiness', 'Female', 'France', 'CA/IT', '2020-2023', '20SUCA02', 'III', 'V', 'English', 'Self Financed', 'Hamshini', 'hamshini@students.tcarts.in', 'hamshini', '2022-11-04 15:39:18', 0),
(8, 'Hepsy Joannah A', '2022-11-01', '8194949', 'pexels-daria-shevtsova-1580625.jpg', 'career and future', 'Female', 'USA', 'CA/IT', '2020-2023', '20SUCA03', 'III', 'V', 'Mandarin', 'Self Financed', 'Hepsy', 'hepsyjoannah@students.tcarts.in', '12345678', '2022-11-05 09:34:05', 0),
(9, 'alagar R', '2022-11-17', '61484', 'pexels-rodrigo-souza-2531709.jpg', 'family and friends', 'Male', 'USA', 'Commerce', '2020-2023', '20suca04', 'III', 'V', 'English', 'Self Financed', 'alagar', 'alagar@gmail.com', 'Sri@1234', '2022-11-05 18:14:56', 0),
(10, 'Rithish G', '2004-01-04', '876543210', 'flower.jpg', 'happiness', 'Male', 'USA', 'CA/IT', '2022-2025', '22SUCA04', 'I', 'I', 'French', 'Self Financed', 'rithishg', 'rithish@students.tcarts.in', 'Rithi@12', '2022-11-14 13:04:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

