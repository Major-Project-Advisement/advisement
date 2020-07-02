-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2020 at 07:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advisement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UID` int(11) NOT NULL,
  `EmployeeID` tinytext NOT NULL,
  `Password` longtext NOT NULL,
  `FirstName` tinytext NOT NULL,
  `LastName` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `AdvisorID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `SchoolID` int(11) NOT NULL,
  `FirstName` tinytext DEFAULT NULL,
  `LastName` tinytext NOT NULL,
  `Email` tinytext DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `CreatedOn` date NOT NULL,
  `UpdatedOn` date DEFAULT NULL,
  `Title` tinytext NOT NULL,
  `Phone` tinytext NOT NULL,
  `Password` longtext NOT NULL,
  `Image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`AdvisorID`, `EmployeeID`, `SchoolID`, `FirstName`, `LastName`, `Email`, `IsActive`, `CreatedOn`, `UpdatedOn`, `Title`, `Phone`, `Password`, `Image`) VALUES
(5, 1201935, 1, 'Kerone', 'Creary', 'kerone.ant.creary@hotmail.com', 1, '2020-05-27', NULL, 'Mr.', '8762860850', '$2y$10$3ENBNZWw09BaRPWWr18f1eSvcJQjpE1rRCb/FHsG/E.iG/rYJ6iBe', 'null'),
(6, 1612783, 1, 'Kerone', 'Creary', 'kerone.ant.creary@hotmail.com', 1, '2020-05-27', NULL, 'Mr.', '8762860850', '$2y$10$LNnQ9r0a9wIZogCEevMrYOnqY5Lpd1gtkPpIbvFBRyt5Kjf8c95wu', '5ece20778721e5.88169612.jpeg'),
(7, 4534534, 1, 'Trudi-ann', 'Nicholson', 'trudiann.nicholson@gmail.com', 1, '2020-06-06', NULL, 'Miss', '8769194356', '$2y$10$oMDbMANMzJEBHkq69mqI9eCVokWeeEGWd2jDXjr386a15YMom7vde', '5edb0060911128.08752877.jpg'),
(9, 1234567, 1, 'Alex', 'King', 'test@email.com', 1, '2020-06-11', NULL, 'Dr.', '1234567890', '$2y$10$uDAp1TS2VVXxQ8BE7m0Gd.oOh80xjcUZnX2p8TwdyleImwexBLssa', '5ee1a2b2253072.09776216.jpg'),
(10, 1231231, 1, 'Alex', 'King', 'test@email.com', 1, '2020-06-15', NULL, 'Dr.', '1234567890', '$2y$10$xnm22rmMwA46SP3Ff06TCu1gYngfQRSw8ofQeB1XVGuS7vrWKbXNe', '5ee7eb6a7dc690.00503048.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `AttachmentID` int(11) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `FileSize` float NOT NULL,
  `MessageID` int(11) NOT NULL,
  `FileType` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editadvisor`
--

CREATE TABLE `editadvisor` (
  `AdvisorID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `EditedOn` int(11) NOT NULL,
  `Action` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editstudent`
--

CREATE TABLE `editstudent` (
  `EditedOn` date NOT NULL,
  `StudentID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `MeetingID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `AdvisorID` int(11) NOT NULL,
  `Topic` tinytext NOT NULL,
  `Date` date NOT NULL,
  `Description` tinytext NOT NULL,
  `Status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `Sender` int(11) DEFAULT NULL,
  `Recipient` int(11) DEFAULT NULL,
  `Subject` tinytext DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `SentOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageID`, `Sender`, `Recipient`, `Subject`, `Content`, `SentOn`) VALUES
(21, 12, 5, 'Test Sub', 'Test Message!!!!', '2020-07-01'),
(22, 12, 5, 'Subby', 'Hello There!', '2020-07-01'),
(23, 12, 5, 'New Sub', 'Ahhhh Message!!!', '2020-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `ModuleID` int(11) NOT NULL,
  `ModuleCode` tinytext NOT NULL,
  `Name` tinytext NOT NULL,
  `Type` tinytext DEFAULT NULL,
  `Credits` tinyint(4) DEFAULT NULL,
  `Major` tinytext DEFAULT NULL,
  `Prerequisite` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ModuleID`, `ModuleCode`, `Name`, `Type`, `Credits`, `Major`, `Prerequisite`) VALUES
(1, 'ANI1001', 'Animation Theory l', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(2, 'ANI1002', 'Animation Tools l', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'INT1001(C)'),
(3, 'ANI1003', 'Animation History l', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(4, 'ANI1003', 'Life Drawing and Practices', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(5, 'INT1001', 'Information Technology', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(6, 'ANI1005', 'Animation Theory I', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'ANI1001'),
(7, 'ANI1006', 'Animation Tools II', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'ANI1002 & ANI1001'),
(8, 'ANI1007', 'Dimensional Drawing 2D', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'ANI1004'),
(9, 'CAT1001', 'Writing Workshop I', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(10, 'MAT1047', 'College Math 1B', 'Compulsory', 4, 'Animation Production and Development(121-126 credits)', 'None'),
(11, 'CSP1001', 'Community Service Project', 'Compulsory', 1, 'Animation Production and Development(121-126 credits)', 'None'),
(12, 'ANI2001', 'Dynamic Anatomy I', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'ANI1007'),
(13, 'ANI2001', 'Critical Structures (Storyboard Concepts)', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'None'),
(14, 'ANI2003', 'Digital Media and Sound Effects', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'ANI1005 & ANI1006'),
(15, 'ANI2004', 'Storytelling for Animation I', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'CAT1001'),
(16, 'COM2014', 'Academic Writing II', 'Compulsory', 3, 'Animation Production and Development(121-126 credits)', 'CAT1001'),
(17, 'ANI2005', 'Dynamic Anatomy II', 'Compulsory', 4, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2001'),
(18, 'ANI2006', 'Introduction to Figure Analysis ', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2005(C)'),
(19, 'ENS3001', 'Environmental Studies', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'None'),
(20, 'ANI2007', 'Scriptwriting I', 'Compulsory', 4, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2004'),
(21, 'ANI2008', '2D Frame Development', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI1006'),
(22, 'ANI3001', '3D Modeling and Animation', 'Compulsory', 4, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2003 & ANI2008 '),
(23, 'CIT4024', 'IT Project Management ', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'INT1001 '),
(24, 'PSY1002 ', 'Introduction to Psychology', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'None'),
(25, 'HUM3010', 'Professional, Ethics and Legal Implications of Computing Systems', 'Compulsory', 3, '\r\nAnimation Production and Development(121 -126 credits)\r\n', 'CAT1001'),
(26, 'ANI3002', 'Animation Business Operations', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'CIT4024'),
(27, 'ANI3003', 'Dimensional Drawing 3D', 'Compulsory', 4, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI1007 & ANI3001'),
(28, 'ANI3004', 'Presentation Skills Theory', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2007'),
(29, 'RES302', 'Computing Research Methods', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'CAT1001'),
(30, 'ENT3003', 'Entrepreneurial Skills', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'None'),
(31, 'ANI4001', 'Animation Capstone Project', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'RES3024'),
(32, 'ANI4002', 'Animation Production', 'Compulsory', 3, 'Animation Production and Development(121 -126 credits)\r\n', 'ANI2003 & ANI3002'),
(33, 'CIT4036', 'Professional Development Seminar', 'Compulsory', 1, 'Animation Production and Development(121 -126 credits)\r\n', 'None'),
(34, 'CMP1024', 'Programming 1	', 'Compulsory', 4, 'IT/Computer Science\r\n', 'None'),
(35, 'INT1001', 'Information Technology', 'Compulsory', 3, 'IT/Computer Science', 'None'),
(36, 'COM1020	', 'Academic Writing I	', 'Compulsory', 3, 'IT/Computer Science', 'Proficiency Test'),
(37, 'MAT1047	', 'College Mathematics 1B', 'Compulsory', 4, 'IT/Computer Science', 'None'),
(38, 'CSP1010', 'Community Service Project	', 'Compulsory', 1, 'IT/Computer Science', 'None'),
(39, 'CMP1025', 'Programming 2	', 'Compulsory', 4, 'IT/Computer Science', 'CMP1024	'),
(40, 'MAT1008', 'Discrete Mathematics	', 'Compulsory', 4, 'IT/Computer Science', 'MAT1047	'),
(41, 'ENS3001 ', 'Environmental Studies \r\n', 'Compulsory', 3, 'IT/Computer Science', 'None'),
(42, 'COM2014', 'Academic Writing II	', 'Compulsory', 3, 'IT/Computer Science', 'COM1020	'),
(43, 'PSY1002	', 'Introduction to Psychology', 'Compulsory', 3, 'IT/Computer Science', 'None'),
(44, 'CIT2004	', 'Object-Oriented Programming Using C++	', 'Compulsory', 4, 'IT/Computer Science', 'CMP1025	'),
(45, 'STA2020	', 'Introductory Statistics	', 'Compulsory', 3, 'IT/Computer Science', 'MAT1047	'),
(46, 'CMP2018', 'Database Design	', 'Compulsory', 3, 'IT/Computer Science', 'INT1001	'),
(47, 'CIT2011', 'Web Programming	', 'Compulsory', 3, 'IT/Computer Science', 'INT1001	'),
(48, 'CMP1005	', 'Computer Logic & Digital Design	', 'Compulsory', 3, 'IT/Computer Science', 'INT1001	'),
(49, 'CMP2006 	', 'Data Structures	', 'Compulsory', 4, 'IT/Computer Science', 'CIT2004'),
(50, 'CMP2019', 'Software Engineering: Analysis & Design', 'Compulsory', 3, 'IT/Computer Science', 'INT1001 '),
(51, 'PHS1019', 'Physics for Computer Science', 'Compulsory', 4, 'IT/Computer Science', 'MAT1008 or MAT2003'),
(52, 'HUM3010', 'Professional, Ethics and Legal Implications of Computing Systems\r\n', 'Compulsory', 3, 'IT/Computer Science', 'CMP2019 (C) &COM1020'),
(53, 'CIT3002', 'Operating Systems', 'Compulsory', 3, 'IT/Computer Science', 'CMP2006 & CMP1005'),
(54, 'CIT4024', 'IT Project Management	', 'Compulsory', 3, 'IT/Computer Science', 'INT1001 '),
(55, 'RES3024', 'Computing Research Methods	', 'Compulsory', 3, 'IT/Computer Science', 'COM1020 	'),
(56, 'CIT3021', 'Foundations of Information Systems', 'Compulsory', 3, 'I.T\r\n', 'INT1001'),
(57, 'CIT3024', 'Enterprise Architecture & Infrastructure	', 'Compulsory', 4, 'IT - Information Systems(125 credits)\r\n', 'CIT3021 (C)'),
(58, 'CIT4031', 'IS Auditing', 'Compulsory', 4, 'IT - Information Systems(125 credits)\r\n', 'INT1001'),
(59, 'CIT4001', 'Software Implementation	', 'Compulsory', 3, 'I.T\r\n', 'CIT2019 '),
(60, 'CIT3025', 'IS Innovation & Emerging Technologies	', 'Compulsory', 4, 'IT - Information Systems(125 credits)\r\n', 'CIT3021'),
(61, 'CIT4023', 'E-Business Strategy & E-Commerce	', 'Compulsory', 4, 'IT - Information Systems(125 credits)\r\n', 'CIT3021 	'),
(62, 'MAN3001	', 'Organization and Management	', 'Compulsory', 3, 'I.T\r\n', 'None'),
(63, 'CIT4032', 'IS Strategy, Planning & Management', 'Compulsory', 4, 'IT - Information Systems(125 credits)\r\n', 'CIT3021 (C)	'),
(64, 'ENT3001', 'Entrepreneurship', 'Compulsory', 3, 'IT/Computer Science\r\n', 'None'),
(65, 'CIT4020', 'Computer Security	', 'Compulsory', 3, 'IT/Computer Science\r\n', 'CIT3002 & CMP2018	'),
(66, 'CIT4036', 'Professional Development Seminar	', 'Compulsory(Level4)', 1, 'IT/Computer Science\r\n', 'None'),
(67, 'PRJ4020', 'Major Project', 'Compulsory', 3, 'IT/Computer Science\r\n', 'RES3001 or RES302'),
(68, 'CIT4034', 'Web Systems Design & Implementation	', 'Compulsory', 4, 'IT – Multimedia (125 credits)\r\n', 'CIT2009/ CIT2011& CMP2018'),
(69, 'CIT3023', 'Introduction to Human Computer Interface', 'Compulsory', 4, 'IT – Multimedia (125 credits)\r\n', 'CIT2009/ CIT2011'),
(70, 'CIT3018', 'Computer Animation	', 'Compulsory', 4, 'IT – Multimedia (125 credits)\r\n', 'CIT2009/CIT2011'),
(71, 'CIT3028', 'Digital Graphics	', 'Compulsory', 4, 'IT – Multimedia (125 credits)\r\n', 'CIT2009/CIT2011'),
(72, 'CIT3020', 'Digital Video Effects	', 'Compulsory', 4, 'IT – Multimedia (125 credits)\r\n', 'CIT3018 or CIT3028'),
(73, 'CIT3029', 'Internship', 'Optional', 3, 'IT/Computer Science', 'None'),
(74, 'CIT3015	', 'Digital Communications/Telecommunications', 'Compulsory', 4, 'IT -Networking(125 credits)\r\n', 'CMP1026 & PHS1019 '),
(75, 'CIT4033', 'Distributed Systems	', 'Compulsory', 4, 'IT -Networking(125 credits)\r\n', 'CMP1026 & CIT3002'),
(76, 'CIT3014', 'Advanced Computer Networks	', 'Compulsory', 4, 'IT -Networking(125 credits)\r\n', 'CIT3015 	'),
(77, 'CIT3017', 'Network Administration & Technical Support	', 'Compulsory', 4, 'IT -Networking(125 credits)\r\n', 'CMP1026'),
(78, 'CIT4035', 'Network Management & Security	', 'Compulsory', 4, 'IT -Networking(125 credits)\r\n', 'CIT3017 	'),
(79, 'CIT3012', 'Advanced Databases 	', 'Compulsory', 4, 'IT - Enterprise Systems(125 credits)\r\n\r\n', 'CMP2018 '),
(80, 'CIT4009 	', 'Enterprise Computing I	', 'Compulsory', 4, 'IT - Enterprise Systems(125 credits)\r\n', 'CMP2018 	'),
(81, 'CIT4010', 'Enterprise Computing II	', 'Compulsory', 4, 'IT - Enterprise Systems(125 credits)\r\n', 'CIT4009'),
(82, 'CIT3013', 'Database Administration	', 'Compulsory', 4, 'IT - Enterprise Systems(125 credits)\r\n', 'CIT3012'),
(83, 'CMP4023', 'Data Warehousing & Data Mining	', 'Compulsory', 4, 'IT - Enterprise Systems(125 credits)\r\n', 'CIT3013	'),
(84, 'CIT3003', 'Analysis of Algorithms', 'Compulsory', 3, 'Computer Science(125 credits)\r\n', 'CMP2006 & MAT2003 or MAT1008'),
(85, 'CIT3009', 'Advanced Programming', 'Compulsory', 4, 'Computer Science(125 credits)\r\n\r\n', 'CIT3002 (T)	'),
(86, 'BIO3004', 'Introduction to Bio-Informatics', 'Compulsory', 3, 'Computer Science(125 credits)', 'N/A'),
(87, 'CMP3036', 'Introduction to Forensic Computing	', 'Compulsory', 3, 'Computer Science(125 credits)', 'PHS1019	'),
(88, 'STA2016 ', 'Design of Experiments ', 'Compulsory', 3, 'Computer Science(125 credits)', 'STA2020'),
(89, 'MAT2003', 'Calculus I', 'Compulsory', 3, 'Computer Science(125 credits)', 'MAT1047'),
(90, 'MAT1043', 'Linear Algebra', 'Compulsory', 3, 'Computer Science(125 credits)', 'MAT1047	'),
(91, 'CMP3011', 'Computer Organization & Architecture', 'Compulsory', 3, 'Computer Science(125 credits)', 'CMP1005'),
(92, 'CMP4011', 'Artificial Intelligence', 'Compulsory', 4, 'Computer Science(125 credits)', 'CIT3006'),
(93, 'CIT4004	', 'Analysis of Programming Languages', 'Compulsory', 3, 'Computer Science(125 credits)', 'CMP4011	');

-- --------------------------------------------------------

--
-- Table structure for table `passedmodules`
--

CREATE TABLE `passedmodules` (
  `StudentID` int(11) NOT NULL,
  `ModuleID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int(11) NOT NULL,
  `SchoolID` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `DateCreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `SchoolID`, `Name`, `DateCreated`) VALUES
(1, 1, 'Computer Science', '2020-06-09'),
(2, 1, 'IT - Enterprise Systems', '2020-06-09'),
(3, 1, 'IT - Networking', '2020-06-09'),
(4, 1, 'IT - Multimedia', '2020-06-09'),
(5, 1, 'IT - Information Systems', '2020-06-09'),
(6, 1, 'Animation Production and Development', '2020-06-09'),
(7, 2, 'Civil Engineering', '2020-06-09'),
(8, 2, 'Industrial Engineering', '2020-06-09'),
(9, 2, 'BSc Mechanical Engineering', '2020-06-09'),
(10, 2, 'B.Eng. in Chemical Engineering', '2020-06-09'),
(11, 2, 'B.Eng in Electrical Engineering (Instrumentation)', '2020-06-09'),
(12, 2, 'B.Eng in Electrical Engineering (Power)', '2020-06-09'),
(13, 2, 'B.Eng in Electrical Engineering (Communication)', '2020-06-09'),
(14, 2, 'B.Eng in Electrical Engineering (Computing)', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `programmodules`
--

CREATE TABLE `programmodules` (
  `ProgramID` int(11) NOT NULL,
  `ModuleID` int(11) NOT NULL,
  `Type` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `SchoolID` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Faculty` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`SchoolID`, `Name`, `Faculty`) VALUES
(1, 'School of Computing and Information Technology', 'Faculty of Engineering and Computing'),
(2, 'School of Engineering', 'Faculty of Engineering and Computing');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `AdvisorID` int(11) DEFAULT NULL,
  `ProgramID` int(11) DEFAULT NULL,
  `FirstName` tinytext DEFAULT NULL,
  `LastName` tinytext DEFAULT NULL,
  `Email` tinytext DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 1,
  `CreatedOn` date DEFAULT NULL,
  `UpdatedOn` date DEFAULT NULL,
  `Phone` tinytext DEFAULT NULL,
  `Password` longtext NOT NULL,
  `Level` tinyint(4) DEFAULT NULL,
  `Title` tinytext DEFAULT NULL,
  `Image` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UID`, `StudentID`, `AdvisorID`, `ProgramID`, `FirstName`, `LastName`, `Email`, `IsActive`, `CreatedOn`, `UpdatedOn`, `Phone`, `Password`, `Level`, `Title`, `Image`) VALUES
(12, 1234567, 5, 1, 'Alex', 'King', 'test@email.com', 1, '2020-06-10', NULL, '1234567890', '$2y$10$OSZsA51imzaACE0aWqoZtevL72SzS3GDh/SZ26M.buewy9u9IYjfm', NULL, 'Dr.', '5ee1377e0361a9.71063872.jpg'),
(13, 3213213, NULL, 1, 'Gregory', 'King', 'test@email.com', 1, '2020-06-16', NULL, '1234567890', '$2y$10$C842Vv8SVVA.RkNvlkNNgu2bZFmKmYtGd1iqKmgaVs8l.7qD2E1iO', NULL, 'Dr.', '5ee868ff1ffc18.30265553.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`AdvisorID`),
  ADD KEY `schoolID` (`SchoolID`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`AttachmentID`);

--
-- Indexes for table `editadvisor`
--
ALTER TABLE `editadvisor`
  ADD PRIMARY KEY (`AdminID`,`AdvisorID`),
  ADD KEY `advisorID` (`AdvisorID`);

--
-- Indexes for table `editstudent`
--
ALTER TABLE `editstudent`
  ADD PRIMARY KEY (`StudentID`,`AdminID`),
  ADD KEY `adminID` (`AdminID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`MeetingID`),
  ADD KEY `studentID` (`StudentID`),
  ADD KEY `advisorID` (`AdvisorID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `StudentID` (`Sender`) USING BTREE,
  ADD KEY `AdvisorID` (`Recipient`) USING BTREE;

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`ModuleID`);

--
-- Indexes for table `passedmodules`
--
ALTER TABLE `passedmodules`
  ADD PRIMARY KEY (`StudentID`,`ModuleID`),
  ADD KEY `moduleID` (`ModuleID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`),
  ADD KEY `schoolID` (`SchoolID`);

--
-- Indexes for table `programmodules`
--
ALTER TABLE `programmodules`
  ADD PRIMARY KEY (`ModuleID`,`ProgramID`),
  ADD KEY `programID` (`ProgramID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`SchoolID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `advisorID` (`AdvisorID`),
  ADD KEY `programID` (`ProgramID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `AdvisorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `AttachmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `MeetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `ModuleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `SchoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`attachmentID`) REFERENCES `message` (`messageID`);

--
-- Constraints for table `editadvisor`
--
ALTER TABLE `editadvisor`
  ADD CONSTRAINT `editadvisor_ibfk_1` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_3` FOREIGN KEY (`adminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `editstudent`
--
ALTER TABLE `editstudent`
  ADD CONSTRAINT `editstudent_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `editstudent_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`AdvisorID`);

--
-- Constraints for table `passedmodules`
--
ALTER TABLE `passedmodules`
  ADD CONSTRAINT `passedmodules_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `module` (`moduleID`),
  ADD CONSTRAINT `passedmodules_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `school` (`schoolID`);

--
-- Constraints for table `programmodules`
--
ALTER TABLE `programmodules`
  ADD CONSTRAINT `programmodules_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`programID`),
  ADD CONSTRAINT `programmodules_ibfk_2` FOREIGN KEY (`moduleID`) REFERENCES `module` (`moduleID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`programID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
