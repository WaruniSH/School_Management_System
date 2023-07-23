-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 05:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `courseName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `message`, `courseName`) VALUES
(1, 'waruni', 'warunisha1@gmail.com', 770176818, 'gggggggggggggggggg', 'Web Development'),
(3, 'Kavindi', 'kavindi1@gmail.com', 708899786, 'I want to get admission', 'Graphic Design'),
(4, 'Pasindu', 'pasinduk@gmail.com', 77084562, 'I want to apply', 'Web Development'),
(9, 'nimal', 'nimal@gmail.com', 707788675, 'sadfasdawdasd', 'Web Development'),
(10, 'nimal', 'asd@gmail.com', 787750081, 'Enroll', ' Graphic Design'),
(11, 'Sandamali', 'pkbiz1998@gmail.com', 787750081, 'I want join with this course', 'Digital Marketing'),
(12, 'Nethu', 'pkbiz1998@gmail.com', 713453143, 'I want to join class', 'Graphic Design');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(15) NOT NULL,
  `courseName` varchar(50) DEFAULT NULL,
  `courseDuration` varchar(50) DEFAULT NULL,
  `courseDescription` varchar(100) DEFAULT NULL,
  `courseStatus` varchar(30) DEFAULT NULL,
  `courseImage` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseDuration`, `courseDescription`, `courseStatus`, `courseImage`) VALUES
(4, 'Web Development', '06 months', 'Best Course for Web development ', 'available', 'courseImage/Web-Development-Course.jpg'),
(5, 'Graphic Design', '1 year', 'Best Course For Learn Graphic designing ', 'available', 'courseImage/graphic.jpg'),
(6, 'Digital Marketing', '1 1/2 year', 'Best Course for digital marketing   ', 'available', 'courseImage/marketing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_course`
--

CREATE TABLE `enrolled_course` (
  `enrollment_id` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_course`
--

INSERT INTO `enrolled_course` (`enrollment_id`, `courseID`, `username`, `payment`) VALUES
(1, 6, 'kanchana', 'Paid'),
(2, 4, 'Sadeesha', 'Unpaid'),
(6, 6, 'student', 'Paid'),
(47, 5, 'Nethuu', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `description` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(6, 'John', ' Very good Web developer sir  ', 'image/john.jpg'),
(7, 'Nithika', 'Good Digital Marketing Teacher', 'image/Nithika.jpg'),
(8, 'Shamli', '   Graphic Designer    ', 'image/Shamli.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', 770176818, 'admin@gmail.com', 'admin', '1234'),
(2, 'student', 776814768, 'student@gmail.com', 'student', '1234'),
(15, 'kanchana', 718915875, 'kanchana1@gmail.com', 'student', '1234'),
(18, 'Sadeesha', 770176980, 'sadeesha123@gmail.com', 'student', '1234'),
(74, 'Nethuu', 787750081, 'pkbiz1998@gmail.com', 'student', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `enrolled_course`
--
ALTER TABLE `enrolled_course`
  ADD UNIQUE KEY `enrollment_id` (`enrollment_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `enrolled_course`
--
ALTER TABLE `enrolled_course`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
