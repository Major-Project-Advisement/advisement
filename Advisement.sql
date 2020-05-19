-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 12:19 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Advisement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UID` int(11) NOT NULL,
  `employeeID` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `fname` tinytext NOT NULL,
  `lname` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisorID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `fname` tinytext,
  `lname` tinytext NOT NULL,
  `email` int(11) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` date NOT NULL,
  `updatedon` date NOT NULL,
  `title` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachmentID` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filesize` float NOT NULL,
  `messageID` int(11) NOT NULL,
  `filetype` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editadvisor`
--

CREATE TABLE `editadvisor` (
  `advisorID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `editedon` int(11) NOT NULL,
  `action` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `editstudent`
--

CREATE TABLE `editstudent` (
  `editedon` date NOT NULL,
  `studentID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inboxID` int(11) NOT NULL,
  `advisorID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `meetingID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `advisorID` int(11) NOT NULL,
  `topic` tinytext NOT NULL,
  `date` date NOT NULL,
  `description` tinytext NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `subject` tinytext,
  `content` longtext,
  `sentOn` date NOT NULL,
  `inboxID` int(11) NOT NULL,
  `advisorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `moduleID` int(11) NOT NULL,
  `moduleCode` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `type` tinytext,
  `credits` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passedmodules`
--

CREATE TABLE `passedmodules` (
  `studentID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programID` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `name` tinyint(4) NOT NULL,
  `datecreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmodules`
--

CREATE TABLE `programmodules` (
  `programID` int(11) NOT NULL,
  `moduleID` int(11) NOT NULL,
  `type` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolID` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `faculty` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `advisorID` int(11) DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  `fname` tinytext,
  `lname` tinytext,
  `email` tinytext,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `createdon` date DEFAULT NULL,
  `updatedon` date DEFAULT NULL,
  `phone` tinytext,
  `password` longtext NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`advisorID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachmentID`);

--
-- Indexes for table `editadvisor`
--
ALTER TABLE `editadvisor`
  ADD PRIMARY KEY (`adminID`,`advisorID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `editstudent`
--
ALTER TABLE `editstudent`
  ADD PRIMARY KEY (`studentID`,`adminID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inboxID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`meetingID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `inboxID` (`inboxID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `passedmodules`
--
ALTER TABLE `passedmodules`
  ADD PRIMARY KEY (`studentID`,`moduleID`),
  ADD KEY `moduleID` (`moduleID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexes for table `programmodules`
--
ALTER TABLE `programmodules`
  ADD PRIMARY KEY (`moduleID`,`programID`),
  ADD KEY `programID` (`programID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `advisorID` (`advisorID`),
  ADD KEY `programID` (`programID`);

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
  MODIFY `advisorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inboxID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `moduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `editadvisor_ibfk_1` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`),
  ADD CONSTRAINT `editadvisor_ibfk_3` FOREIGN KEY (`adminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `editstudent`
--
ALTER TABLE `editstudent`
  ADD CONSTRAINT `editstudent_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `editstudent_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`UID`);

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `meeting_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`UID`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`inboxID`) REFERENCES `inbox` (`inboxID`),
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`);

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
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`advisorID`) REFERENCES `advisor` (`advisorID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`programID`) REFERENCES `program` (`programID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
