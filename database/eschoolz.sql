-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 03:40 PM
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
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(10) NOT NULL,
  `academic` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y',
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `academic`, `status`, `description`) VALUES
(7, '2020-2021', 'Y', ''),
(9, '2019-2020', 'N', '2019'),
(10, '2022-2023', 'Y', ''),
(11, '2018-2019', 'Y', ''),
(12, '2017-2018', 'Y', ''),
(13, '2016-2017', 'Y', ''),
(14, '2015-2016', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `areamaster`
--

CREATE TABLE `areamaster` (
  `id` int(10) NOT NULL,
  `areaname` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areamaster`
--

INSERT INTO `areamaster` (`id`, `areaname`, `amount`, `status`) VALUES
(1, 'Alangayam', '3000.00', 'Y'),
(2, 'Vaniyambadi', '2000.00', 'Y'),
(3, 'Nimiyampattu', '1000.00', 'Y'),
(4, 'Mallekunta', '1000.00', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `bankdeposit`
--

CREATE TABLE `bankdeposit` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `transid` varchar(20) NOT NULL,
  `depositdate` date NOT NULL,
  `compcode` varchar(100) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `acctno` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymethod` varchar(50) NOT NULL,
  `paytype` varchar(50) NOT NULL,
  `referenceno` varchar(100) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdon` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdeposit`
--

INSERT INTO `bankdeposit` (`id`, `transid`, `depositdate`, `compcode`, `bankname`, `acctno`, `amount`, `paymethod`, `paytype`, `referenceno`, `notes`, `createdby`, `createdon`) VALUES
(006, '00006', '2019-10-10', 'INST-1', 'Indian Bank', '', '2000.00', 'Cash', 'Sales', '9999', 'added', 'Administrator', '2019-10-10 10:15:53'),
(005, '00005', '2019-10-10', 'Demo1', 'Indian Bank', '', '90000.00', 'Cash', 'Sales', '909090', 'added', 'Administrator', '2019-10-10 10:02:29'),
(007, '00007', '2019-12-24', 'INST-1', 'Indian Bank', '', '4500.00', 'Cash', 'Sales', '999', 'kkk', 'Administrator', '2019-12-24 13:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `id` int(5) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`id`, `bloodgroup`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'A1+'),
(4, 'A1-'),
(5, 'A1B+'),
(6, 'A1B-'),
(7, 'A2+'),
(8, 'A2-'),
(9, 'A2B+'),
(10, 'A2B-'),
(11, 'B+'),
(12, 'B-'),
(13, 'B1+'),
(14, 'O+'),
(15, 'O-'),
(16, 'AB+'),
(17, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `description`) VALUES
(1, 'Staff Child Discount', 'Staff Children'),
(2, 'Trustee Child Discount', 'Financially Weak Student'),
(3, 'Sibling Discount', 'Sibling in Instituion');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `class` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `description`) VALUES
(1, 'LKG', ''),
(2, 'UKG', ''),
(3, 'Ist STD', ''),
(4, 'IInd STD', ''),
(5, 'IIIrd STD', ''),
(6, 'IV STD', ''),
(7, 'V STD', '');

-- --------------------------------------------------------

--
-- Table structure for table `compbank`
--

CREATE TABLE `compbank` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `orgid` varchar(25) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `ctype` varchar(25) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `bankname` varchar(25) DEFAULT NULL,
  `acctno` varchar(20) NOT NULL,
  `acctname` varchar(40) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `ifsc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compbank`
--

INSERT INTO `compbank` (`id`, `orgid`, `name`, `ctype`, `location`, `bankname`, `acctno`, `acctname`, `acctype`, `branch`, `ifsc`) VALUES
(008, 'Demo1', NULL, NULL, NULL, 'Indian Bank', '12333455677', 'saassaa', 'Savings', 'vellore', '8989899');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `description`, `status`) VALUES
(3, 'dsf', '', 'Y'),
(4, '$designation', '$desc', 'Y'),
(6, 'sfsfs', '', 'Y'),
(8, 'Trustees Management', '', 'N'),
(9, 'PG Asistant', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `expenseacctmaster`
--

CREATE TABLE `expenseacctmaster` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenseacctmaster`
--

INSERT INTO `expenseacctmaster` (`id`, `accountname`, `description`) VALUES
(001, 'Advertising & Marketing', 'Advertising & Marketing'),
(002, 'Automobile Expense', 'Automobile Expense'),
(003, 'Consultant Expense', 'Consultant Expense'),
(004, 'Credit Card Charges', 'Credit Card Charges'),
(005, 'IT & Internet Expense', 'IT & Internet Expense'),
(006, 'Lodging', 'Lodging'),
(007, 'Meals and Entertainment', 'Functions'),
(008, 'Office Supplies', 'office'),
(009, 'Other Expense', 'Other Expense'),
(010, 'Printing and Staionary', 'Printing and Staionary'),
(011, 'Rent Expense', 'Rent Expense'),
(012, 'Repairs & Maintenance', 'Repairs & Maintenance'),
(013, 'Salaries & Employee Wages', 'Salaries & Employee Wages'),
(014, 'Telephone Expense', 'Telephone Expense'),
(015, 'Travel Expense', 'Travel Expense'),
(016, 'Employee Reimbursement', 'Employee Reimbursement'),
(020, 'Employee Advance', 'Employee Advance'),
(021, 'Bills', 'Vendor/Contrator Bills'),
(022, 'Diesel Expense', 'Diesel Expense'),
(023, 'Staionary Expense', 'Staionary Expense'),
(024, 'Trustee Loan', 'rustee Loan');

-- --------------------------------------------------------

--
-- Table structure for table `expensenoteslog`
--

CREATE TABLE `expensenoteslog` (
  `id` int(10) NOT NULL,
  `voucherid` varchar(100) NOT NULL,
  `payeeid` varchar(50) NOT NULL,
  `payee` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amtadjusted` decimal(10,2) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensenoteslog`
--

INSERT INTO `expensenoteslog` (`id`, `voucherid`, `payeeid`, `payee`, `amount`, `amtadjusted`, `reason`, `createdby`, `updatedby`, `createdon`, `updatedon`) VALUES
(1, '1', '1', 'Raghu Books Store', '1100.00', '0.00', 'asasfdf', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(2, '2', '', 'Kuppusamy', '300.00', '0.00', 'Diesel Expenses', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(3, '2', '', 'Kuppusamy', '300.00', '0.00', 'Others', '', '', '0000-00-00', '2022-02-25'),
(4, '2', '', 'Kuppusamy', '300.00', '0.00', 'Others', '', '', '0000-00-00', '2022-02-25'),
(5, '3', '', 'Gugan', '500.00', '0.00', '', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(6, '4', '', 'kuberan', '566.00', '0.00', '', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(7, '1', '', 'Raghu Books Store', '1100.00', '0.00', 'Others', '', '', '0000-00-00', '2022-02-25'),
(8, '3', '', 'Gugan', '500.00', '0.00', 'Others', '', '', '0000-00-00', '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expense_no` varchar(20) NOT NULL,
  `expense_date` varchar(15) NOT NULL,
  `expense_total_amount` decimal(10,2) NOT NULL,
  `expense_paid_thru` varchar(100) NOT NULL,
  `expense_bank` varchar(15) NOT NULL,
  `expense_cheque_status` varchar(15) NOT NULL,
  `expense_ref_no` varchar(255) NOT NULL,
  `expense_payee_type` varchar(50) NOT NULL,
  `expense_payee` varchar(200) NOT NULL,
  `expense_invoice_no` varchar(20) NOT NULL,
  `expense_handler` varchar(50) NOT NULL,
  `expense_notes` text NOT NULL,
  `expense_items` text NOT NULL,
  `expense_updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `expense_status` varchar(15) NOT NULL,
  `expense_file_src` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_no`, `expense_date`, `expense_total_amount`, `expense_paid_thru`, `expense_bank`, `expense_cheque_status`, `expense_ref_no`, `expense_payee_type`, `expense_payee`, `expense_invoice_no`, `expense_handler`, `expense_notes`, `expense_items`, `expense_updated_on`, `expense_status`, `expense_file_src`) VALUES
(1, 'EXP01', '2020-02-10', '100.00', 'Cheque', '002', 'Cleared', '111', 'Vendor', 'abc', '', 'Lento', '', '[{\"expense_category\":\"Rent Expense\",\"expense_desc\":\"ss\",\"expense_amount\":100}]', '2020-02-10 09:15:05', 'Created', '');

-- --------------------------------------------------------

--
-- Table structure for table `feesconfig`
--

CREATE TABLE `feesconfig` (
  `id` int(11) NOT NULL,
  `feescode` varchar(50) NOT NULL,
  `academic` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `feesname` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `duedate` date DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y',
  `createdby` varchar(50) DEFAULT NULL,
  `createdon` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feesconfig`
--

INSERT INTO `feesconfig` (`id`, `feescode`, `academic`, `class`, `gender`, `feesname`, `amount`, `duedate`, `status`, `createdby`, `createdon`) VALUES
(1, '1', '2022-2023', 'LKG', 'A', 'Tuition Fee', 1000, '2022-02-20', 'Y', NULL, NULL),
(2, '2', '2022-2023', 'LKG', 'M', 'Uniform Fees -Boys', 500, '0000-00-00', 'Y', NULL, NULL),
(3, '3', '2022-2023', 'LKG', 'F', 'Uniform Fees - Girls', 1000, '0000-00-00', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feesdiscount`
--

CREATE TABLE `feesdiscount` (
  `id` int(10) NOT NULL,
  `disctype` varchar(50) NOT NULL,
  `discname` varchar(100) NOT NULL,
  `feesname` varchar(100) NOT NULL,
  `discpercentage` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdon` date NOT NULL,
  `approvedby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feeshead`
--

CREATE TABLE `feeshead` (
  `id` int(11) NOT NULL,
  `feesname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeshead`
--

INSERT INTO `feeshead` (`id`, `feesname`, `description`) VALUES
(1, 'Tuition Fee', 'Tuition Fee'),
(4, 'Annual Fee', 'Annual Fee'),
(5, 'Term I', 'Term 1'),
(6, 'Term 2', 'Term 2'),
(7, 'Term 3', 'Term 3'),
(11, 'Uniform Fees -Boys', 'Boys Uniform Fees'),
(12, 'Uniform Fees - Girls', 'Uniform Fees - Girls');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(1) UNSIGNED NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groupname`, `description`) VALUES
(1, 'Admin', 'Unrestricted Access to All Modules. Administrator'),
(9, 'General Manager', 'General Manager'),
(10, 'Senior Manager Commercial', 'Senior Manager Commercial'),
(11, 'Manager', 'Senior Manager - Quality Assurance'),
(12, 'Executive', 'Stores Executive');

-- --------------------------------------------------------

--
-- Table structure for table `instprofile`
--

CREATE TABLE `instprofile` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `orgid` varchar(15) NOT NULL,
  `instname` varchar(100) NOT NULL,
  `instype` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `workphone` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `web` varchar(40) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `regdon` date NOT NULL,
  `primaryflag` int(20) NOT NULL DEFAULT 0,
  `image` varchar(155) DEFAULT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `createdon` datetime DEFAULT current_timestamp(),
  `createdby` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedon` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedby` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instprofile`
--

INSERT INTO `instprofile` (`id`, `orgid`, `instname`, `instype`, `address`, `city`, `country`, `state`, `zip`, `workphone`, `mobile`, `email`, `web`, `regno`, `regdon`, `primaryflag`, `image`, `signature`, `createdon`, `createdby`, `updatedon`, `updatedby`) VALUES
(004, 'INST-1', 'Bhairava Group of Instituitions', '1', '125-old hall street', 'London', 'IN', 'TN', '635001', '', '9677575757', 'saravanas.office@gmail.com', '', '123456', '2019-12-31', 1, 'upload/SBN(Bhairavar)-TamilFontLogo.jpg', '-Bhairava', '2019-10-10 10:15:11', '2019-10-10 10:15:11', '2019-10-10 10:15:11', '2019-10-10 10:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `new_admission`
--

CREATE TABLE `new_admission` (
  `id` int(11) NOT NULL,
  `admissionid` varchar(50) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `admission_date` varchar(30) NOT NULL,
  `class` varchar(100) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mothername` varchar(255) NOT NULL,
  `aadharnumber` varchar(255) NOT NULL,
  `address` varchar(700) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fmobile` varchar(50) NOT NULL,
  `mmobile` varchar(50) NOT NULL,
  `travel` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1. Hostel 2. Van 3. Day Scholar',
  `pickup_place` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1. Active 2. In-active 3. Closed 4. Deleted',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_admission`
--

INSERT INTO `new_admission` (`id`, `admissionid`, `studentname`, `gender`, `dob`, `admission_date`, `class`, `fathername`, `mothername`, `aadharnumber`, `address`, `city`, `pincode`, `email`, `fmobile`, `mmobile`, `travel`, `pickup_place`, `status`, `created_on`, `created_by`) VALUES
(1, 'ADSN2021-0000', 'ASDASDA', 'Male', '10-10-2010', '2020-05-22 21:12:50', 'VIII', '', '', '', 'xdsadsadfd', 'dasdsad', 354354, 'dsds@dasfd.dsad', '9095112233', '4325345436', 1, 'dasdasd', 1, '2020-05-23 01:12:50', '0'),
(2, 'ADSN2021-0002', 'ASDASDA', 'Male', '10-10-2010', '2020-05-22 21:23:31', 'VIII', '', '', '', 'xdsadsadfd', 'dasdsad', 354354, 'dsds@dasfd.dsad', '9095112233', '4325345436', 1, 'dasdasd', 1, '2020-05-23 01:23:31', '0'),
(3, 'ADSN2021-0003', 'ASDASDA', 'Male', '10-10-2010', '2020-05-22 21:24:55', 'VIII', '', '', '', 'xdsadsadfd', 'dasdsad', 354354, 'dsds@dasfd.dsad', '9095112233', '4325345436', 1, 'dasdasd', 1, '2020-05-23 01:24:55', '0'),
(4, '2021-0004', 'SADASDAD', 'Male', '10-10-2000', '2020-05-22 21:26:44', 'IX', '', '', '', 'czfdsfs', 'cxxv', 453254, 'sdfds@dsadas.dsfs', '9095112233', '3243253454', 1, 'eefsfsd', 1, '2020-05-23 01:26:44', '0'),
(5, '2021-0005', 'QQQQQQ', 'Male', '15-10-1999', '2020-05-22 21:30:37', 'IX', 'AAAAAAAAA', 'BBBBBBBB', '999999999999', 'dsadsafsdfs', 'hhhhh', 843853, 'cxz@dsf.fsd', '9999999999', '9874653165', 1, 'uuuuuu', 1, '2020-05-23 01:30:37', '0'),
(6, '2021-0006', 'BHAIRAVA', 'Male', '22/12/2000', '2020-05-23 05:35:56', 'LKG', 'DEMMO', 'TETEST', '344455', 'Ggg', 'Kffg', 76655, 'saravanas.office@gmail.com', '9677573737', '', 1, 'Test', 1, '2020-05-23 09:35:56', '0'),
(7, '2021-0007', 'JANESSHA', 'Male', '12/11/2000', '2020-05-25 08:31:32', 'III', 'DEMO', 'DEMOSCRAP', '12333', '99', 'jjj', 888, 'saravanas.office@gmail.com', '9677573737', '9677573737', 1, 'SAS', 1, '2020-05-25 12:31:32', '0'),
(8, '2021-0008', 'BHAIRAVA', 'Male', '22/12/2000', '2020-05-25 08:44:54', 'LKG', 'DEMMO', 'TETEST', '344455', 'Ggg', 'Kffg', 76655, '', '9677573737', '9677573737', 1, 'Test', 1, '2020-05-25 12:44:54', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payeedetails`
--

CREATE TABLE `payeedetails` (
  `id` int(10) NOT NULL,
  `payeename` varchar(100) NOT NULL,
  `payeetype` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdon` date NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payeedetails`
--

INSERT INTO `payeedetails` (`id`, `payeename`, `payeetype`, `mobile`, `location`, `description`, `createdon`, `status`) VALUES
(1, 'Saravanakumar', '1', 2147483647, 'Bargur', 'Flower Decorator', '2020-08-01', '1'),
(2, 'Meghana', '2', 2147483647, 'Krishnagiri', 'Rice Supplier', '2020-08-01', '1'),
(3, 'Murugan', '3', 2147483647, 'krishnagiri', 'samayal master', '2020-08-01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payeemaster`
--

CREATE TABLE `payeemaster` (
  `id` int(10) NOT NULL,
  `payeeid` varchar(25) NOT NULL,
  `payeename` varchar(100) NOT NULL,
  `payeetype` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `createdon` date NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '1',
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payeemaster`
--

INSERT INTO `payeemaster` (`id`, `payeeid`, `payeename`, `payeetype`, `amount`, `mobile`, `location`, `description`, `createdon`, `createdby`, `status`, `notes`) VALUES
(1, '1', 'Raghu Books Store', 'Supplier', 0, 2147483647, 'Bargur', 'Books Vendor', '2022-02-25', 'Administrator', '1', ''),
(2, '2', 'Kumaresan', 'Contrator', 5000, 787656453, 'Alangayam', 'Building Contractor Advances', '2022-02-25', 'Administrator', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `payeemasterlog`
--

CREATE TABLE `payeemasterlog` (
  `id` int(10) NOT NULL,
  `payeeid` varchar(100) NOT NULL,
  `payee` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amtadjusted` decimal(10,2) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updatedby` varchar(100) DEFAULT NULL,
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payeemasterlog`
--

INSERT INTO `payeemasterlog` (`id`, `payeeid`, `payee`, `amount`, `amtadjusted`, `reason`, `createdby`, `updatedby`, `createdon`, `updatedon`) VALUES
(1, '1', 'Raghu Books Store', '1000.00', '0.00', '', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(2, '1', 'Raghu Books Store', '1100.00', '100.00', 'Data Entry Mistake', '', 'Administrator', '0000-00-00', '2022-02-25'),
(3, '2', 'Kumaresan', '5000.00', '0.00', '', 'Administrator', NULL, '2022-02-25', '0000-00-00'),
(4, '2', 'Kumaresan', '5000.00', '0.00', 'Others', '', 'Administrator', '0000-00-00', '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `recordexpense`
--

CREATE TABLE `recordexpense` (
  `id` int(11) NOT NULL,
  `voucherid` varchar(50) NOT NULL,
  `payeeid` varchar(50) NOT NULL,
  `category` varchar(250) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `description` varchar(155) NOT NULL,
  `payee` varchar(100) DEFAULT NULL,
  `payeetype` varchar(100) NOT NULL,
  `paymentmode` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `createdon` date NOT NULL,
  `updatedby` varchar(100) NOT NULL,
  `updatedon` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recordexpense`
--

INSERT INTO `recordexpense` (`id`, `voucherid`, `payeeid`, `category`, `reference`, `description`, `payee`, `payeetype`, `paymentmode`, `amount`, `notes`, `image`, `createdby`, `createdon`, `updatedby`, `updatedon`, `status`) VALUES
(1, '1', '1', 'Advertising & Marketing', '12345678', 'Books Vendor', 'Raghu Books Store', 'Supplier', 'Bank Transfer', '1100.00', 'Others', NULL, 'Administrator', '2022-02-25', 'Administrator', '2022-02-25', '1'),
(2, '2', '', 'Advertising & Marketing', 'UID: 655476656', 'Van No 2 Diesel Expenses', 'Kuppusamy', '', 'Bank Transfer', '300.00', 'Others', NULL, 'Administrator', '2022-02-25', 'Administrator', '2022-02-25', '1'),
(3, '3', '', 'Advertising & Marketing', '', 'diesel', 'Gugan', 'Employee', 'Cash', '500.00', 'Others', NULL, 'Administrator', '2022-02-25', 'Administrator', '2022-02-25', '1'),
(4, '4', '', 'Staionary Expense', '', '', 'kuberan', 'Employee', 'Cash', '566.00', '', NULL, 'Administrator', '2022-02-25', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(10) NOT NULL,
  `routeno` varchar(100) NOT NULL,
  `driverName` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `pickuppoints` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `routeno`, `driverName`, `mobile`, `pickuppoints`) VALUES
(4, '1', 'fggfh', 13221321, 'Array'),
(5, '3', 'dsfdsf', 21321, 'Array'),
(6, '5', 'dfgfdg', 32543534, 'Array'),
(7, '6', 'ddd', 765678, 'Array'),
(8, '8', 'asdas', 324324532, 'Alangayam'),
(9, '8', 'asdas', 324324532, 'Vaniyambadi'),
(10, '9', 'dsfds', 123123123, 'Alangayam'),
(11, '9', 'dsfds', 123123123, 'Vaniyambadi'),
(12, '56', 'dgfdgfd', 2321312, 'Nimiyampattu'),
(13, '56', 'dgfdgfd', 2321312, 'Mallekunta'),
(14, '123', 'asfdsaf', 21312, 'Alangayam'),
(15, '123', 'asfdsaf', 21312, 'Mallekunta'),
(16, '789', 'demo', 123457890, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(10) NOT NULL,
  `section` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `description`) VALUES
(1, 'A', ''),
(2, 'B', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentprofile`
--

CREATE TABLE `studentprofile` (
  `id` int(10) NOT NULL,
  `academic` varchar(50) DEFAULT NULL,
  `batch` varchar(100) NOT NULL,
  `admissionno` varchar(100) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(60) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `caste` varchar(100) DEFAULT NULL,
  `fathername` varchar(100) DEFAULT NULL,
  `mothername` varchar(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `aadhaar` varchar(50) DEFAULT NULL,
  `emis` varchar(100) DEFAULT NULL,
  `rte` varchar(50) DEFAULT NULL,
  `oldschoolname` varchar(155) NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `altmobno` varchar(10) DEFAULT NULL,
  `routeno` varchar(100) DEFAULT NULL,
  `areaname` varchar(100) DEFAULT NULL,
  `vanfees` decimal(10,2) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Y',
  `vanflag` varchar(10) NOT NULL DEFAULT 'N',
  `discount` varchar(15) NOT NULL,
  `image_name` varchar(155) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(30) DEFAULT NULL,
  `validtill` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentprofile`
--

INSERT INTO `studentprofile` (`id`, `academic`, `batch`, `admissionno`, `firstname`, `lastname`, `gender`, `dob`, `doa`, `class`, `section`, `bloodgroup`, `nationality`, `religion`, `community`, `caste`, `fathername`, `mothername`, `category`, `aadhaar`, `emis`, `rte`, `oldschoolname`, `occupation`, `address`, `city`, `zip`, `email`, `mobile`, `altmobno`, `routeno`, `areaname`, `vanfees`, `status`, `vanflag`, `discount`, `image_name`, `image`, `createdon`, `createdby`, `validtill`) VALUES
(2, '2022-2023', '2020-2021', '100', 'Janessha Sri S', 'S', 'F', '0000-00-00', '0000-00-00', 'LKG', 'A', 'A+', '1', 'Hindu', 'BC', 'sadhu', 'Saravanakumar', 'Santhi', 'Staff Child Discount', '123345678', 'St Pauls Matric Schools', NULL, '', '', '125-4,1233', 'Bargur', '', 'saravanas.office@gmail.com', '9677573737', '', '1', 'Vaniyambadi', '0.00', 'Y', 'Y', '', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(3, '2022-2023', '2020-2021', '200', 'Meghana', 'S', 'F', '0000-00-00', '0000-00-00', 'IIIrd STD', 'A', 'A+', '1', 'Hindu', 'BC', 'sadghu', 'saravanakumar', 'santhi', 'Staff Child Discount', '789899009', '9098766', NULL, '', '', '126', 'bargur', '', '', '9677573737', '', '1', 'Vaniyambadi', '0.00', 'Y', 'Y', '', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(4, '2022-2023', '2021', '300', 'Juhi', 'S', 'F', '0000-00-00', '0000-00-00', 'UKG', 'A', NULL, NULL, NULL, 'BC', 'sadhu', 'Saravanakumar', 'Santhi', 'Sibling Discount', '123345678', 'St Pauls Matric Schools', NULL, 'St Kanaga Dasa School', NULL, '125-4,1233', 'Bargur', NULL, 'saravanas.office@gmail.com', '9677573737', NULL, '3', 'Mallekunta', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(5, '2022-2023', '2019', '400', 'Pattu', 'S', 'F', '0000-00-00', '0000-00-00', 'LKG', 'A', NULL, NULL, NULL, 'BC', 'sadghu', 'saravanakumar', 'santhi', 'Sibling Discount', '789899009', '9098766', NULL, 'st pauls school', NULL, '126', 'bargur', NULL, '', '9677573737', NULL, '4', 'Alangayam', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(6, '2022-2023', '2021', '500', 'Sonakshi', 'S', 'F', '0000-00-00', '0000-00-00', 'LKG', 'A', NULL, NULL, NULL, 'BC', 'sadhu', 'Saravanakumar', 'Santhi', 'Staff Child Discount', '123345678', 'St Pauls Matric Schools', NULL, 'St Kanaga Dasa School', NULL, '125-4,1233', 'Bargur', NULL, 'saravanas.office@gmail.com', '9677573737', NULL, '3', 'Vaniyambadi', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(7, '2022-2023', '2019', '600', 'Balaji', 'M', 'M', '0000-00-00', '0000-00-00', 'IX STD', 'A', NULL, NULL, NULL, 'BC', 'sadghu', 'saravanakumar', 'santhi', 'Staff Child Discount', '789899009', '9098766', NULL, 'st pauls school', NULL, '126', 'bargur', NULL, '', '9677573737', NULL, '2', 'Nimiyampattu', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(8, '2022-2023', '2021', '700', 'Santhosh', 'M', 'M', '0000-00-00', '0000-00-00', 'VII STD', 'A', NULL, NULL, NULL, 'BC', 'sadhu', 'Saravanakumar', 'Santhi', 'Sibling Discount', '123345678', 'St Pauls Matric Schools', NULL, 'St Kanaga Dasa School', NULL, '125-4,1233', 'Bargur', NULL, 'saravanas.office@gmail.com', '9677573737', NULL, '1', 'Mallekunta', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35'),
(9, '2022-2023', '2019', '800', 'Raghu', 'S', 'M', '0000-00-00', '0000-00-00', 'LKG', 'A', NULL, NULL, NULL, 'BC', 'sadghu', 'saravanakumar', 'santhi', 'Sibling Discount', '789899009', '9098766', NULL, 'st pauls school', NULL, '126', 'bargur', NULL, '', '9677573737', NULL, '3', 'Alangayam', NULL, 'Y', 'Y', 'Y', NULL, 0x75706c6f61642f4a616e65737368617372694c617465737450686f746f2e6a706567, '2022-02-24 06:44:35', NULL, '2022-02-24 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `transportmaster`
--

CREATE TABLE `transportmaster` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `transname` varchar(40) NOT NULL,
  `vtype` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportmaster`
--

INSERT INTO `transportmaster` (`id`, `transname`, `vtype`) VALUES
(001, 'ARC Parcel Services', 'Truck');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE `usergroups` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `groupid` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(1) UNSIGNED NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `repass` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `groupname` varchar(35) NOT NULL,
  `compcode` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `image_name` varchar(155) NOT NULL,
  `image` longblob DEFAULT NULL,
  `emailverified` varchar(10) NOT NULL DEFAULT '0',
  `createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(30) DEFAULT NULL,
  `validtill` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `userid`, `username`, `firstname`, `lastname`, `designation`, `gender`, `useremail`, `userpassword`, `repass`, `mobile`, `address`, `groupname`, `compcode`, `status`, `image_name`, `image`, `emailverified`, `createdon`, `createdby`, `validtill`) VALUES
(1, 'DAPL001', 'Administrator', 'Brindhavan Matric Hr. Sec.', 'School', 'Administrator', 'F', 'saravanas.office@gmail.com', 'eSchoolz@2022', 'eSchoolz@2022', '9443745302', 'Thuthikulam Village, Namakkal-Dt', 'Admin', 'INST-1', '1', 'upload/brindavan.jpeg', NULL, 'Y', '2019-02-05 09:37:45', NULL, '2019-02-05 09:37:45'),
(2, 'Lahe-2', 'Janessha', 'Janessha Sri', 'S', 'ss', '2', 'saravanas.office@gmail.com', 'Demo@123', 'Demo@123', '9677573737', 'rr', 'Admin', 'INST-1', '1', 'upload/', NULL, '0', '2021-09-26 04:35:30', NULL, '2021-09-26 04:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_repass` varchar(255) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_role` varchar(25) NOT NULL,
  `user_status` varchar(10) NOT NULL DEFAULT '0',
  `image_name` varchar(155) NOT NULL,
  `image` longblob NOT NULL,
  `user_createdon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_forgot_password`
--

CREATE TABLE `user_forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_forgot_password`
--

INSERT INTO `user_forgot_password` (`id`, `email`, `token`, `createdon`) VALUES
(1, 'saravanas.office@gmail.com', '8e5710705445a85cc571c5903456d17a', '2018-11-26 05:36:07'),
(2, 'rasaafactory@gmail.com', '93b718e8f7a5724f54a07ac23eb802f2', '2019-02-06 03:42:30'),
(3, 'rasaafactory@gmail.com', '75165928c8cc1948f9f5d1fc4136ee5c', '2019-02-06 03:45:12'),
(4, 'rasaafactory@gmail.com', '92b131a5c4b9e3b8a226d8755f3a5279', '2019-03-07 08:34:36'),
(5, 'rasaafactory@gmail.com', 'b697d315e7cc6695058dad5358be91e9', '2019-03-19 06:48:03'),
(6, 'saravanas.office@gmail.com', 'e787444bff81b01995dc60e862433c42', '2019-09-10 14:29:47'),
(7, 'saravanas.office@gmail.com', '470a78a4330ba83a94cf06b1a582a4c5', '2019-09-10 14:33:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areamaster`
--
ALTER TABLE `areamaster`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areaname` (`areaname`);

--
-- Indexes for table `bankdeposit`
--
ALTER TABLE `bankdeposit`
  ADD UNIQUE KEY `depost` (`id`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class` (`class`);

--
-- Indexes for table `compbank`
--
ALTER TABLE `compbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenseacctmaster`
--
ALTER TABLE `expenseacctmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensenoteslog`
--
ALTER TABLE `expensenoteslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feesconfig`
--
ALTER TABLE `feesconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feesdiscount`
--
ALTER TABLE `feesdiscount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feeshead`
--
ALTER TABLE `feeshead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instprofile`
--
ALTER TABLE `instprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_admission`
--
ALTER TABLE `new_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payeedetails`
--
ALTER TABLE `payeedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payeemaster`
--
ALTER TABLE `payeemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payeemasterlog`
--
ALTER TABLE `payeemasterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recordexpense`
--
ALTER TABLE `recordexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentprofile`
--
ALTER TABLE `studentprofile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admissionno` (`admissionno`);

--
-- Indexes for table `transportmaster`
--
ALTER TABLE `transportmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_forgot_password`
--
ALTER TABLE `user_forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `areamaster`
--
ALTER TABLE `areamaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bankdeposit`
--
ALTER TABLE `bankdeposit`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `compbank`
--
ALTER TABLE `compbank`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenseacctmaster`
--
ALTER TABLE `expenseacctmaster`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `expensenoteslog`
--
ALTER TABLE `expensenoteslog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feesconfig`
--
ALTER TABLE `feesconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feesdiscount`
--
ALTER TABLE `feesdiscount`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feeshead`
--
ALTER TABLE `feeshead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instprofile`
--
ALTER TABLE `instprofile`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_admission`
--
ALTER TABLE `new_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payeedetails`
--
ALTER TABLE `payeedetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payeemaster`
--
ALTER TABLE `payeemaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payeemasterlog`
--
ALTER TABLE `payeemasterlog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recordexpense`
--
ALTER TABLE `recordexpense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentprofile`
--
ALTER TABLE `studentprofile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transportmaster`
--
ALTER TABLE `transportmaster`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_forgot_password`
--
ALTER TABLE `user_forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
