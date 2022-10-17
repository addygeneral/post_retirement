-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 05:41 AM
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
-- Database: `post_retirement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Rank` varchar(100) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Age` int(50) NOT NULL,
  `Institution` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Av_postretirement` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `Rank`, `EmailId`, `Password`, `Gender`, `Dob`, `Age`, `Institution`, `Address`, `Av_postretirement`, `Phonenumber`, `Status`, `RegDate`, `role`, `location`) VALUES
(1, 'Sam', 'Doe', 'Prof', 'samd@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '15 June 1984', 43, 'UCC', 'Tema', '10', '02398746', 1, '2022-09-11 07:00:10', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(11, 'Knust', 'Reg', '', 'knustr@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '20 December 1975', 0, 'KNUST', 'Kumasi', '10', '028376354', 1, '2022-09-11 07:06:42', 'Reg', 'NO-IMAGE-AVAILABLE.jpg'),
(12, 'Dan', 'Kay', 'Snr Lect', 'dank@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '12 February 2015', 67, 'UCC', 'Ejisu', '-385', '092873365', 1, '2022-09-11 07:16:14', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(13, 'Ucc', 'Reg', '', 'uccr@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '08 September 2022', 0, 'UCC', 'Cape', '10', '09872654', 1, '2022-09-11 07:38:32', 'Reg', 'NO-IMAGE-AVAILABLE.jpg'),
(14, 'Benice', 'Usla', 'Prof', 'benu@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '13 September 1979', 0, 'UCC', 'Elmina', '14', '03987644543', 1, '2022-09-12 05:49:42', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(15, 'test', 'one', '', 'tes@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '14 September 2022', 43, 'UG', 'nm', '123', '09837645', 1, '2022-09-12 06:43:19', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(16, 'test', 'two', '', 'tes2@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '14 September 2022', 74, 'KNUST', 'new', '34', '098273645', 1, '2022-09-12 07:05:11', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(17, 'Test', 'three', '', 'test3@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '04 September 2022', 45, 'KNUST', 'tem', '123', '93847673829', 1, '2022-09-12 07:14:20', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(18, 'test', 'fr', '', 'test4@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '14 September 2022', 12, 'UCC', 'ty', '73', '9873', 1, '2022-09-12 07:18:30', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(19, 'test', 'fiv', 'Prof', 'test5@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '22 September 2022', 27, 'KNUST', 'tyr', '23', '987465', 1, '2022-09-12 07:22:32', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(20, 'Dummy', 'Lecturer', 'Prof', 'dummytech@knust.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '10 February 2022', 62, 'KNUST', 'Tema', '553', '098738736', 1, '2022-09-16 14:53:02', 'Staff', 'Screenshot (15).png'),
(21, 'aaa', 'sssssss', 'Associate Prof', 'aaaa@gtec.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '11 May 2022', 0, 'UCC', 'qwerty', '134', '5654323567', 1, '2022-09-18 02:04:41', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(22, 'James', 'Dee', 'Prof', 'james@ug.com', 'c000ccf225950aac2a082a59ac5e57ff', 'male', '04 January 2000', 22, 'UG', 'Tema', '1200', '98765432', 1, '2022-09-19 01:10:50', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(23, 'reg', 'ug', 'Prof', 'regug@ug.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '02 May 1990', 32, 'UG', 'Accra', '76542', '0876543', 1, '2022-09-19 01:25:24', 'REG', 'NO-IMAGE-AVAILABLE.jpg'),
(24, 'Try', 'Me', 'Prof', 'tryme@gmail.com', 'c000ccf225950aac2a082a59ac5e57ff', 'female', '07 June 1975', 47, 'KNUST', 'Nmwe', '3650', '03847', 1, '2022-09-19 05:29:24', 'Staff', 'NO-IMAGE-AVAILABLE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblinstitutions`
--

CREATE TABLE `tblinstitutions` (
  `id` int(11) NOT NULL,
  `InstitutionName` varchar(150) DEFAULT NULL,
  `InstitutionShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinstitutions`
--

INSERT INTO `tblinstitutions` (`id`, `InstitutionName`, `InstitutionShortName`, `CreationDate`) VALUES
(4, 'University of Cape Coast', 'UCC', '2022-09-11 06:37:32'),
(5, 'Kwame Nkrumah University of Science & Technology', 'KNUST', '2022-09-11 06:38:08'),
(6, 'University of Ghana', 'UG', '2022-09-11 06:38:36'),
(7, 'Ghana Tertiary Education Commission', 'GTEC', '2022-09-11 06:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblpostretirements`
--

CREATE TABLE `tblpostretirements` (
  `id` int(11) NOT NULL,
  `PostretirementType` varchar(110) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `File` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `registra_remarks` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `num_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpostretirements`
--

INSERT INTO `tblpostretirements` (`id`, `PostretirementType`, `FromDate`, `ToDate`, `Description`, `File`, `image`, `PostingDate`, `AdminRemark`, `registra_remarks`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`, `num_days`) VALUES
(80, '5 Years', '08-09-2022', '23-09-2022', 'jk', 'Screenshot (3).png', '', '2022-09-26', NULL, '', NULL, 0, 0, 0, 20, 16),
(81, '2 Years', '01-09-2022', '30-09-2022', 'kl', 'Screenshot (16).png', '', '2022-09-26', 'mm', '', '2022-09-26 12:41:48 ', 1, 0, 1, 20, 30),
(82, '1 Year', '02-09-2022', '04-09-2022', 'nnbb', 'Jerry.docx', '', '2022-09-26', NULL, '', NULL, 0, 0, 0, 20, 3),
(83, '2 Years', '10-09-2022', '11-09-2022', 'mnb', 'Networking For Dummies.pdf ( PDFDrive ).pdf', '', '2022-09-26', NULL, '', NULL, 0, 0, 1, 20, 2),
(84, '2 Years', '02-09-2022', '03-09-2022', 'kkkkk', 'Jerry.docx', '', '2022-09-26', NULL, '', NULL, 0, 0, 1, 20, 2),
(85, '2 Years', '01-09-2022', '02-09-2022', 'nn', 'Networking For Dummies.pdf ( PDFDrive ).pdf', '', '2022-09-26', 'approved\r\n', '', '2022-09-26 23:08:39 ', 1, 0, 1, 20, 2),
(86, '2 Years', '09-09-2022', '10-09-2022', 'mkk', 'addyjoel_(1)[1].docx', '', '2022-09-26', 'mmm', 'bbbnb', '2022-09-26 23:10:25 ', 1, 1, 1, 20, 2),
(87, '2 Years', '16-09-2022', '17-09-2022', 'iiio', 'Networking For Dummies.pdf ( PDFDrive ).pdf', '', '2022-09-26', 'now', 'deal', '2022-09-26 12:49:53 ', 1, 1, 1, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpostretirementtype`
--

CREATE TABLE `tblpostretirementtype` (
  `id` int(11) NOT NULL,
  `PostretirementType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpostretirementtype`
--

INSERT INTO `tblpostretirementtype` (`id`, `PostretirementType`, `Description`, `date_from`, `date_to`, `CreationDate`) VALUES
(9, '5 Years', 'Renewal After 5 years', '2022-09-01', '2027-07-31', '2022-09-11 06:40:44'),
(10, '2 Years', 'Renewal after 2 Years', '2022-09-01', '2024-08-30', '2022-09-11 06:41:31'),
(11, '1 Year', 'Renewal after 1 Year', '2022-09-01', '2023-08-31', '2022-09-11 06:43:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblinstitutions`
--
ALTER TABLE `tblinstitutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpostretirements`
--
ALTER TABLE `tblpostretirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblpostretirementtype`
--
ALTER TABLE `tblpostretirementtype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblinstitutions`
--
ALTER TABLE `tblinstitutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpostretirements`
--
ALTER TABLE `tblpostretirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tblpostretirementtype`
--
ALTER TABLE `tblpostretirementtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
