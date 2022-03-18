-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 11:17 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschoolz`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentsattendance`
--

CREATE TABLE `studentsattendance` (
  `id` int(11) NOT NULL,
  `admissionno` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `academic` varchar(50) NOT NULL,
  `attendance` varchar(50) NOT NULL DEFAULT 'P',
  `fathername` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdon` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsattendance`
--

INSERT INTO `studentsattendance` (`id`, `admissionno`, `firstname`, `lastname`, `class`, `section`, `academic`, `attendance`, `fathername`, `mobile`, `createdby`, `createdon`, `status`) VALUES
(2, '400', 'Janessha Sri', 'S', 'I', 'A', '2022-2023', 'P', 'Saravanakumar', '9678765432', '', '0000-00-00', 'Y'),
(3, '100', 'Sanju S', 'S', 'LKG', 'C', '2022-2023', 'P', 'suresh', '9677573737', '', '0000-00-00', 'Y'),
(4, '200', 'Meghana S', 'S', 'LKG', 'B', '2022-2023', 'P', 'Saravanakumar', '9677573737', '', '0000-00-00', 'Y'),
(5, '500', 'Sri Balaji', 'M', 'LKG', 'A', '2022-2023', 'A', 'Murugan', '9677573737', '', '2022-03-18', 'Y'),
(6, '600', 'Bhairava', 'Swamy', 'LKG', 'A', '2022-2023', 'A', 'Murugan', '9677573737', '', '2022-03-15', 'Y'),
(7, '700', 'Jan', 'Sri', 'LKG', 'A', '2022-2023', 'P', 'Murugan', '9677573737', '', '0000-00-00', 'Y'),
(8, '900', 'Sanju S', 'S', 'LKG', 'C', '2022-2023', 'P', 'suresh', '9677573737', '', '0000-00-00', 'Y'),
(9, '1000', 'Meghana S', 'S', 'LKG', 'B', '2022-2023', 'P', 'Saravanakumar', '9677573737', '', '0000-00-00', 'Y'),
(10, '5678', 'Demo', 'S', 'LKG', 'B', '2022-2023', 'P', 'Saravanakumar', '9677573737', '', '0000-00-00', 'Y'),
(11, '1234', 'Demo', 'S', 'LKG', 'C', '2022-2023', 'P', 'suresh', '9677573737', '', '0000-00-00', 'Y'),
(12, '300', 'Sonakshi', 'S', 'UKG', 'A', '2022-2023', 'A', 'Suresh', '9090909090', '', '2022-03-17', 'Y'),
(13, '6789', 'ff', 'ff', 'II', 'A', '2021-2022', 'P', 'dsdsadfs', '1234567890', '', '0000-00-00', 'Y'),
(14, '567', 'Raghu', 'Prasad', 'LKG', 'A', '2021-2022', 'P', 'Raam', '456789098', '', '0000-00-00', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentsattendance`
--
ALTER TABLE `studentsattendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentsattendance`
--
ALTER TABLE `studentsattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
