-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:17 PM
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
-- Database: `eschool2`
--

-- --------------------------------------------------------

--
-- Table structure for table `salrystructure`
--

CREATE TABLE `salrystructure` (
  `id` int(11) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `basicsal` int(10) NOT NULL DEFAULT 0,
  `MA` int(10) NOT NULL,
  `CA` int(10) NOT NULL,
  `HRA` int(10) NOT NULL,
  `PF` varchar(30) NOT NULL,
  `PT` decimal(10,0) NOT NULL,
  `TDS` decimal(5,2) NOT NULL,
  `grosssal` int(15) NOT NULL,
  `academic` varchar(50) NOT NULL,
  `createdon` date NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salrystructure`
--

INSERT INTO `salrystructure` (`id`, `empid`, `type`, `basicsal`, `MA`, `CA`, `HRA`, `PF`, `PT`, `TDS`, `grosssal`, `academic`, `createdon`, `createdby`, `status`) VALUES
(1, 'EMPID-3', '', 112, 0, 0, 0, '12', '0', '0.00', 6789, '2022-23', '2022-04-15', 'Administrator', 'Y'),
(2, 'EMPID-5', '', 6000, 11, 11, 11, '12', '100', '0.00', 12000, '2022-23', '2022-04-15', 'Administrator', 'Y'),
(3, 'EMPID-13', '', 3500, 12, 11, 11, '12', '100', '0.00', 25000, '2022-23', '2022-04-15', 'Administrator', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salrystructure`
--
ALTER TABLE `salrystructure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salrystructure`
--
ALTER TABLE `salrystructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
