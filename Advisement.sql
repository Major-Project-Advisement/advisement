-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 01, 2020 at 12:15 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Advisement`
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
  `LastName` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `AdvisorID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `SchoolID` int(11) NOT NULL,
  `FirstName` tinytext,
  `LastName` tinytext NOT NULL,
  `Email` tinytext,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `CreatedOn` date NOT NULL,
  `UpdatedOn` date DEFAULT NULL,
  `Title` tinytext NOT NULL,
  `Phone` tinytext NOT NULL,
  `Password` longtext NOT NULL,
  `Image` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`AdvisorID`, `EmployeeID`, `SchoolID`, `FirstName`, `LastName`, `Email`, `IsActive`, `CreatedOn`, `UpdatedOn`, `Title`, `Phone`, `Password`, `Image`) VALUES
(9, 1234567, 1, 'Alex', 'King', 'test@email.com', 1, '2020-06-11', NULL, 'Dr.', '1234567890', '$2y$10$uDAp1TS2VVXxQ8BE7m0Gd.oOh80xjcUZnX2p8TwdyleImwexBLssa', '5ee1a2b2253072.09776216.jpg'),
(10, 1231231, 1, 'Alex', 'King', 'test@email.com', 1, '2020-06-15', NULL, 'Dr.', '1234567890', '$2y$10$xnm22rmMwA46SP3Ff06TCu1gYngfQRSw8ofQeB1XVGuS7vrWKbXNe', '5ee7eb6a7dc690.00503048.jpg'),
(11, 4260148, 1, 'Kareem', 'Abraham', 'kcreary@bluechipstrategies.com', 1, '2020-06-30', NULL, 'Dr.', '8765573822', '$2y$10$pRT86GtJxDqtE9o4MRWnduFkQ51WF/nAImWp/GaUiwUw3PwAL5Amy', '5efada7a62e372.69547335.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `AttachmentID` int(11) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `FileSize` float NOT NULL,
  `MessageID` int(11) NOT NULL,
  `FileType` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentmodules`
--

CREATE TABLE `currentmodules` (
  `StudentID` int(11) NOT NULL,
  `ModuleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currentmodules`
--

INSERT INTO `currentmodules` (`StudentID`, `ModuleID`) VALUES
(16, 10),
(16, 36),
(16, 38),
(16, 42);

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
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `InboxID` int(11) NOT NULL,
  `AdvisorID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL
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
  `StudentID` int(11) DEFAULT NULL,
  `Subject` tinytext,
  `Content` longtext,
  `SentOn` date NOT NULL,
  `InboxID` int(11) NOT NULL,
  `AdvisorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `ModuleID` int(11) NOT NULL,
  `ModuleCode` tinytext NOT NULL,
  `Name` tinytext NOT NULL,
  `Type` tinytext,
  `Credits` tinyint(4) DEFAULT NULL,
  `Major` tinytext,
  `Prerequisite` tinytext
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
  `Grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passedmodules`
--

INSERT INTO `passedmodules` (`StudentID`, `ModuleID`, `Grade`) VALUES
(15, 24, NULL),
(15, 25, NULL),
(15, 34, NULL),
(15, 39, NULL),
(15, 47, NULL),
(15, 56, NULL),
(16, 5, NULL),
(16, 16, NULL),
(16, 19, NULL),
(16, 23, NULL),
(16, 25, NULL),
(16, 33, NULL),
(16, 34, NULL),
(16, 35, NULL),
(16, 37, NULL),
(16, 39, NULL),
(16, 41, NULL),
(16, 43, NULL),
(16, 44, NULL),
(16, 47, NULL),
(16, 50, NULL),
(16, 51, NULL),
(16, 52, NULL),
(16, 53, NULL),
(16, 54, NULL),
(16, 55, NULL),
(16, 56, NULL),
(16, 59, NULL),
(16, 62, NULL),
(16, 64, NULL),
(16, 65, NULL),
(16, 66, NULL),
(16, 67, NULL),
(16, 80, NULL),
(16, 81, NULL),
(16, 90, NULL);

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
  `Type` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmodules`
--

INSERT INTO `programmodules` (`ProgramID`, `ModuleID`, `Type`) VALUES
(3, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(6, 1, NULL),
(3, 2, NULL),
(4, 2, NULL),
(5, 2, NULL),
(6, 2, NULL),
(3, 3, NULL),
(4, 3, NULL),
(5, 3, NULL),
(6, 3, NULL),
(3, 4, NULL),
(4, 4, NULL),
(5, 4, NULL),
(6, 4, NULL),
(1, 5, NULL),
(2, 5, NULL),
(3, 5, NULL),
(4, 5, NULL),
(5, 5, NULL),
(6, 5, NULL),
(3, 6, NULL),
(4, 6, NULL),
(5, 6, NULL),
(6, 6, NULL),
(3, 7, NULL),
(4, 7, NULL),
(5, 7, NULL),
(6, 7, NULL),
(3, 8, NULL),
(4, 8, NULL),
(5, 8, NULL),
(6, 8, NULL),
(3, 9, NULL),
(4, 9, NULL),
(5, 9, NULL),
(6, 9, NULL),
(1, 10, NULL),
(2, 10, NULL),
(3, 10, NULL),
(4, 10, NULL),
(5, 10, NULL),
(6, 10, NULL),
(1, 11, NULL),
(2, 11, NULL),
(3, 11, NULL),
(4, 11, NULL),
(5, 11, NULL),
(6, 11, NULL),
(3, 12, NULL),
(4, 12, NULL),
(5, 12, NULL),
(6, 12, NULL),
(3, 13, NULL),
(4, 13, NULL),
(5, 13, NULL),
(6, 13, NULL),
(3, 14, NULL),
(4, 14, NULL),
(5, 14, NULL),
(6, 14, NULL),
(3, 15, NULL),
(4, 15, NULL),
(5, 15, NULL),
(6, 15, NULL),
(1, 16, NULL),
(2, 16, NULL),
(3, 16, NULL),
(4, 16, NULL),
(5, 16, NULL),
(6, 16, NULL),
(3, 17, NULL),
(4, 17, NULL),
(5, 17, NULL),
(6, 17, NULL),
(3, 18, NULL),
(4, 18, NULL),
(5, 18, NULL),
(6, 18, NULL),
(2, 19, NULL),
(3, 19, NULL),
(4, 19, NULL),
(5, 19, NULL),
(6, 19, NULL),
(3, 20, NULL),
(4, 20, NULL),
(5, 20, NULL),
(6, 20, NULL),
(3, 21, NULL),
(4, 21, NULL),
(5, 21, NULL),
(6, 21, NULL),
(3, 22, NULL),
(4, 22, NULL),
(5, 22, NULL),
(6, 22, NULL),
(1, 23, NULL),
(2, 23, NULL),
(3, 23, NULL),
(4, 23, NULL),
(5, 23, NULL),
(6, 23, NULL),
(1, 24, NULL),
(2, 24, NULL),
(3, 24, NULL),
(4, 24, NULL),
(5, 24, NULL),
(6, 24, NULL),
(1, 25, NULL),
(2, 25, NULL),
(3, 25, NULL),
(4, 25, NULL),
(5, 25, NULL),
(6, 25, NULL),
(3, 26, NULL),
(4, 26, NULL),
(5, 26, NULL),
(6, 26, NULL),
(3, 27, NULL),
(4, 27, NULL),
(5, 27, NULL),
(6, 27, NULL),
(3, 28, NULL),
(4, 28, NULL),
(5, 28, NULL),
(6, 28, NULL),
(1, 29, NULL),
(2, 29, NULL),
(3, 29, NULL),
(4, 29, NULL),
(5, 29, NULL),
(6, 29, NULL),
(3, 30, NULL),
(4, 30, NULL),
(5, 30, NULL),
(6, 30, NULL),
(3, 31, NULL),
(4, 31, NULL),
(5, 31, NULL),
(6, 31, NULL),
(3, 32, NULL),
(4, 32, NULL),
(5, 32, NULL),
(6, 32, NULL),
(1, 33, NULL),
(2, 33, NULL),
(3, 33, NULL),
(4, 33, NULL),
(5, 33, NULL),
(6, 33, NULL),
(1, 34, NULL),
(2, 34, NULL),
(3, 34, NULL),
(4, 34, NULL),
(5, 34, NULL),
(6, 34, NULL),
(1, 35, NULL),
(2, 35, NULL),
(3, 35, NULL),
(4, 35, NULL),
(5, 35, NULL),
(6, 35, NULL),
(1, 36, NULL),
(2, 36, NULL),
(3, 36, NULL),
(4, 36, NULL),
(5, 36, NULL),
(6, 36, NULL),
(1, 37, NULL),
(2, 37, NULL),
(3, 37, NULL),
(4, 37, NULL),
(5, 37, NULL),
(6, 37, NULL),
(1, 38, NULL),
(2, 38, NULL),
(3, 38, NULL),
(4, 38, NULL),
(5, 38, NULL),
(6, 38, NULL),
(1, 39, NULL),
(2, 39, NULL),
(3, 39, NULL),
(4, 39, NULL),
(5, 39, NULL),
(6, 39, NULL),
(1, 40, NULL),
(2, 40, NULL),
(3, 40, NULL),
(4, 40, NULL),
(5, 40, NULL),
(6, 40, NULL),
(1, 41, NULL),
(2, 41, NULL),
(3, 41, NULL),
(4, 41, NULL),
(5, 41, NULL),
(6, 41, NULL),
(1, 42, NULL),
(2, 42, NULL),
(3, 42, NULL),
(4, 42, NULL),
(5, 42, NULL),
(6, 42, NULL),
(1, 43, NULL),
(2, 43, NULL),
(3, 43, NULL),
(4, 43, NULL),
(5, 43, NULL),
(6, 43, NULL),
(1, 44, NULL),
(2, 44, NULL),
(3, 44, NULL),
(4, 44, NULL),
(5, 44, NULL),
(6, 44, NULL),
(1, 45, NULL),
(2, 45, NULL),
(3, 45, NULL),
(4, 45, NULL),
(5, 45, NULL),
(6, 45, NULL),
(1, 46, NULL),
(2, 46, NULL),
(3, 46, NULL),
(4, 46, NULL),
(5, 46, NULL),
(6, 46, NULL),
(1, 47, NULL),
(2, 47, NULL),
(3, 47, NULL),
(4, 47, NULL),
(5, 47, NULL),
(6, 47, NULL),
(1, 48, NULL),
(2, 48, NULL),
(3, 48, NULL),
(4, 48, NULL),
(5, 48, NULL),
(6, 48, NULL),
(1, 49, NULL),
(2, 49, NULL),
(3, 49, NULL),
(4, 49, NULL),
(5, 49, NULL),
(6, 49, NULL),
(1, 50, NULL),
(2, 50, NULL),
(3, 50, NULL),
(4, 50, NULL),
(5, 50, NULL),
(6, 50, NULL),
(1, 51, NULL),
(2, 51, NULL),
(3, 51, NULL),
(4, 51, NULL),
(5, 51, NULL),
(6, 51, NULL),
(1, 52, NULL),
(2, 52, NULL),
(3, 52, NULL),
(4, 52, NULL),
(5, 52, NULL),
(6, 52, NULL),
(1, 53, NULL),
(2, 53, NULL),
(3, 53, NULL),
(4, 53, NULL),
(5, 53, NULL),
(6, 53, NULL),
(1, 54, NULL),
(2, 54, NULL),
(3, 54, NULL),
(4, 54, NULL),
(5, 54, NULL),
(6, 54, NULL),
(1, 55, NULL),
(2, 55, NULL),
(3, 55, NULL),
(4, 55, NULL),
(5, 55, NULL),
(6, 55, NULL),
(2, 56, NULL),
(3, 56, NULL),
(4, 56, NULL),
(5, 56, NULL),
(6, 56, NULL),
(3, 57, NULL),
(4, 57, NULL),
(5, 57, NULL),
(6, 57, NULL),
(3, 58, NULL),
(4, 58, NULL),
(5, 58, NULL),
(6, 58, NULL),
(1, 59, NULL),
(2, 59, NULL),
(3, 59, NULL),
(4, 59, NULL),
(5, 59, NULL),
(6, 59, NULL),
(3, 60, NULL),
(4, 60, NULL),
(5, 60, NULL),
(6, 60, NULL),
(3, 61, NULL),
(4, 61, NULL),
(5, 61, NULL),
(6, 61, NULL),
(2, 62, NULL),
(3, 62, NULL),
(4, 62, NULL),
(5, 62, NULL),
(6, 62, NULL),
(3, 63, NULL),
(4, 63, NULL),
(5, 63, NULL),
(6, 63, NULL),
(1, 64, NULL),
(2, 64, NULL),
(3, 64, NULL),
(4, 64, NULL),
(5, 64, NULL),
(6, 64, NULL),
(1, 65, NULL),
(2, 65, NULL),
(3, 65, NULL),
(4, 65, NULL),
(5, 65, NULL),
(6, 65, NULL),
(1, 66, NULL),
(2, 66, NULL),
(3, 66, NULL),
(4, 66, NULL),
(5, 66, NULL),
(6, 66, NULL),
(1, 67, NULL),
(2, 67, NULL),
(3, 67, NULL),
(4, 67, NULL),
(5, 67, NULL),
(6, 67, NULL),
(3, 68, NULL),
(4, 68, NULL),
(5, 68, NULL),
(6, 68, NULL),
(3, 69, NULL),
(4, 69, NULL),
(5, 69, NULL),
(6, 69, NULL),
(3, 70, NULL),
(4, 70, NULL),
(5, 70, NULL),
(6, 70, NULL),
(3, 71, NULL),
(4, 71, NULL),
(5, 71, NULL),
(6, 71, NULL),
(3, 72, NULL),
(4, 72, NULL),
(5, 72, NULL),
(6, 72, NULL),
(3, 73, NULL),
(4, 73, NULL),
(5, 73, NULL),
(6, 73, NULL),
(3, 74, NULL),
(4, 74, NULL),
(5, 74, NULL),
(6, 74, NULL),
(3, 75, NULL),
(4, 75, NULL),
(5, 75, NULL),
(6, 75, NULL),
(3, 76, NULL),
(4, 76, NULL),
(5, 76, NULL),
(6, 76, NULL),
(3, 77, NULL),
(4, 77, NULL),
(5, 77, NULL),
(6, 77, NULL),
(3, 78, NULL),
(4, 78, NULL),
(5, 78, NULL),
(6, 78, NULL),
(3, 79, NULL),
(4, 79, NULL),
(5, 79, NULL),
(6, 79, NULL),
(2, 80, NULL),
(3, 80, NULL),
(4, 80, NULL),
(5, 80, NULL),
(6, 80, NULL),
(2, 81, NULL),
(3, 81, NULL),
(4, 81, NULL),
(5, 81, NULL),
(6, 81, NULL),
(2, 82, NULL),
(3, 82, NULL),
(4, 82, NULL),
(5, 82, NULL),
(6, 82, NULL),
(2, 83, NULL),
(3, 83, NULL),
(4, 83, NULL),
(5, 83, NULL),
(6, 83, NULL),
(1, 84, NULL),
(3, 84, NULL),
(4, 84, NULL),
(5, 84, NULL),
(6, 84, NULL),
(1, 85, NULL),
(3, 85, NULL),
(4, 85, NULL),
(5, 85, NULL),
(6, 85, NULL),
(1, 86, NULL),
(3, 86, NULL),
(4, 86, NULL),
(5, 86, NULL),
(6, 86, NULL),
(3, 87, NULL),
(4, 87, NULL),
(5, 87, NULL),
(6, 87, NULL),
(1, 88, NULL),
(3, 88, NULL),
(4, 88, NULL),
(5, 88, NULL),
(6, 88, NULL),
(1, 89, NULL),
(3, 89, NULL),
(4, 89, NULL),
(5, 89, NULL),
(6, 89, NULL),
(1, 90, NULL),
(2, 90, NULL),
(3, 90, NULL),
(4, 90, NULL),
(5, 90, NULL),
(6, 90, NULL),
(1, 91, NULL),
(3, 91, NULL),
(4, 91, NULL),
(5, 91, NULL),
(6, 91, NULL),
(1, 92, NULL),
(3, 92, NULL),
(4, 92, NULL),
(5, 92, NULL),
(6, 92, NULL),
(1, 93, NULL),
(3, 93, NULL),
(4, 93, NULL),
(5, 93, NULL),
(6, 93, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `SchoolID` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Faculty` tinytext
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
  `FirstName` tinytext,
  `LastName` tinytext,
  `Email` tinytext,
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `CreatedOn` date DEFAULT NULL,
  `UpdatedOn` date DEFAULT NULL,
  `Phone` tinytext,
  `Password` longtext NOT NULL,
  `Level` tinyint(4) DEFAULT NULL,
  `Title` tinytext,
  `Image` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UID`, `StudentID`, `AdvisorID`, `ProgramID`, `FirstName`, `LastName`, `Email`, `IsActive`, `CreatedOn`, `UpdatedOn`, `Phone`, `Password`, `Level`, `Title`, `Image`) VALUES
(13, 1234568, NULL, 1, 'Jonesy', 'Jones', 'ker1android@gmail.com', 1, '2020-06-16', NULL, '1212121212', '$2y$10$UmBpf2Jpxm7qFCBY3OLhWeIyVP4VKAAIwXWdBn09.6LnG6cNsR7Pm', NULL, 'Miss', '5ee85aa6b3dc85.23733280.jpg'),
(15, 1201935, NULL, 2, 'Kerone', 'Creary', 'kerone.ant.creary@hotmail.com', 1, '2020-06-27', NULL, '8762860850', '$2y$10$iR8XUkcz/fSQ7LGadynm.OhjYPzqlnwj6DZqTqlThjZBUpI2qBKWy', NULL, 'Mr', '5ef6d0497f0741.08211091.jpg'),
(16, 2860850, NULL, 2, 'Trudi-ann', 'Nicholson', 'trudiann.nicholson@gmail.com', 1, '2020-06-29', NULL, '8769194356', '$2y$10$wHYZhI4Xw.II6tzJClKY0OS.iANVazq0GBsPTf3zvFFu9xVsM/qaO', NULL, 'Miss', '5ef9b710318a03.16997221.jpg');

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
-- Indexes for table `currentmodules`
--
ALTER TABLE `currentmodules`
  ADD PRIMARY KEY (`ModuleID`,`StudentID`),
  ADD KEY `currentmodules_ibfk_2` (`StudentID`);

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
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`InboxID`),
  ADD KEY `studentID` (`StudentID`),
  ADD KEY `advisorID` (`AdvisorID`);

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
  ADD KEY `studentID` (`StudentID`),
  ADD KEY `inboxID` (`InboxID`),
  ADD KEY `advisorID` (`AdvisorID`);

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
  MODIFY `AdvisorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `AttachmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `InboxID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `MeetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`AttachmentID`) REFERENCES `message` (`MessageID`);

--
-- Constraints for table `currentmodules`
--
ALTER TABLE `currentmodules`
  ADD CONSTRAINT `currentmodules_ibfk_1` FOREIGN KEY (`ModuleID`) REFERENCES `module` (`ModuleID`) ON DELETE CASCADE,
  ADD CONSTRAINT `currentmodules_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`) ON DELETE CASCADE;

--
-- Constraints for table `editadvisor`
--
ALTER TABLE `editadvisor`
  ADD CONSTRAINT `editadvisor_ibfk_1` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_2` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_3` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `editstudent`
--
ALTER TABLE `editstudent`
  ADD CONSTRAINT `editstudent_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `editstudent_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`InboxID`) REFERENCES `inbox` (`InboxID`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`);

--
-- Constraints for table `passedmodules`
--
ALTER TABLE `passedmodules`
  ADD CONSTRAINT `passedmodules_ibfk_1` FOREIGN KEY (`ModuleID`) REFERENCES `module` (`ModuleID`) ON DELETE CASCADE,
  ADD CONSTRAINT `passedmodules_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`UID`) ON DELETE CASCADE;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`SchoolID`) REFERENCES `school` (`SchoolID`);

--
-- Constraints for table `programmodules`
--
ALTER TABLE `programmodules`
  ADD CONSTRAINT `programmodules_ibfk_1` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`) ON DELETE CASCADE,
  ADD CONSTRAINT `programmodules_ibfk_2` FOREIGN KEY (`ModuleID`) REFERENCES `module` (`ModuleID`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`AdvisorID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ProgramID`) REFERENCES `program` (`ProgramID`);