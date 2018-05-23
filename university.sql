-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2018 at 06:13 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_course`
--

DROP TABLE IF EXISTS `available_course`;
CREATE TABLE IF NOT EXISTS `available_course` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(200) NOT NULL,
  `section` varchar(5) NOT NULL,
  `days` varchar(30) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_course`
--

INSERT INTO `available_course` (`id`, `course_name`, `section`, `days`, `time_slot`, `t_email`, `t_name`, `course_code`) VALUES
(5, 'Introduction to Computer Science - I', 'A', 'Mon - Wed - Fri', '1 to 2', 'teacher@gmail.com', 'Arbaz Khan', 'BSCS-301'),
(6, 'Introduction to Computer Science - I', 'A', 'Mon - Wed - Fri', '1 to 2', 'teacher1@gmail.com', 'Suhail Ali', 'BSCS-301'),
(7, 'Introduction to Computer Science - I', 'A', 'Tue - Thu - Sat', '1 to 2', 'teacher@gmail.com', 'Arbaz Khan', 'BSCS-301'),
(8, 'English', 'A', 'Mon - Wed - Fri', '3 to 4', 'teacher@gmail.com', 'Arbaz Khan', 'BSCS-309'),
(9, 'Introduction to Computer Science - I', 'A', 'Tue - Thu - Sat', '5 to 6', 'teacher@gmail.com', 'Arbaz Khan', 'BSCS-301'),
(10, 'Introduction to Computer Science - I', 'A', 'Mon - Wed - Fri', '5 to 6', 'teacher@gmail.com', 'Arbaz Khan', 'BSCS-301'),
(11, 'Physics - II (Electricity and Magnetism)', 'A', 'Mon - Wed - Fri', '1 to 2', 'teacher2@gmail.com', 'Zuhair', 'BSCS308'),
(12, 'Mathematics - I (Calculus)', 'A', 'Tue - Thu - Sat', '2 to 3', 'teacher2@gmail.com', 'Zuhair', 'BSCS-303'),
(13, 'Software Engineering', 'A', 'Mon - Wed - Fri', '7 to 8', 'teacher2@gmail.com', 'Zuhair', 'CS3110'),
(14, 'Redux', 'A', 'Mon - Wed - Fri', '20 to 21', 'teacher@gmail.com', 'Arbaz Khan', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `offered_course`
--

DROP TABLE IF EXISTS `offered_course`;
CREATE TABLE IF NOT EXISTS `offered_course` (
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `program` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered_course`
--

INSERT INTO `offered_course` (`code`, `name`, `program`) VALUES
('BSCS-301', 'Introduction to Computer Science - I', 'BS-CS'),
('BSCS-303', 'Mathematics - I (Calculus)', 'BS-CS'),
('BSCS-305', 'Statistics and Data Analysis', 'BS-CS'),
('BSCS-307', 'Physics - I (General Physics)', 'BS-CS'),
('BSCS-309', 'English', 'BS-CS'),
('BSCS-311', 'Islamic Learning', 'BS-CS'),
('222', 'SE', 'BS-CS'),
('BSCS-306', 'Probability and Statistical Methods', 'BS-CS'),
('BSCS308', 'Physics - II (Electricity and Magnetism)', 'BS-CS'),
('BSCS-401', 'Digital Computer Design Fundamentals', 'BS-CS'),
('CS3110', 'Software Engineering', 'BS-CS'),
('1212', 'Redux', 'BS-CS');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `program` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `email`, `dob`, `program`, `password`) VALUES
('Mohsin Naqvi', 'mohsin1@gmail.com', '2018-05-21', 'BS-CS', '1'),
('muhamamd soban', 'mohammedsoban1@GMAIL.COM', '2221-02-06', 'BS-CS', '1'),
('Muzammil', 'student@gmail.com', '2018-05-17', 'BS-CS', '1'),
('Kashan', 'student2@gmail.com', '2018-05-01', 'BS-CS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `s_email` varchar(30) NOT NULL,
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `s_email`, `course_id`) VALUES
(25, 'mohammedsoban1@GMAIL.COM', 5),
(26, 'mohammedsoban1@GMAIL.COM', 7),
(27, 'student@gmail.com', 6),
(24, 'mohsin1@gmail.com', 8),
(28, 'student2@gmail.com', 12),
(29, 'student2@gmail.com', 9),
(30, 'student2@gmail.com', 13),
(31, 'student@gmail.com', 14);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`name`, `email`, `password`) VALUES
('Arbaz Khan', 'teacher@gmail.com', 1),
('Suhail Ali', 'teacher1@gmail.com', 1),
('Zuhair', 'teacher2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_lecture`
--

DROP TABLE IF EXISTS `t_lecture`;
CREATE TABLE IF NOT EXISTS `t_lecture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `lec_type` varchar(200) NOT NULL,
  `file_path` varchar(2000) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lecture`
--

INSERT INTO `t_lecture` (`id`, `title`, `course_name`, `lec_type`, `file_path`, `t_name`, `t_email`) VALUES
(2, 'Networks Types', 'Introduction to Computer Science - I', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/Doc.aspx?sourcedoc={f63a1a44-2d48-4fa2-b43f-8b2385f9b3f9}&action=embedview&wdStartOn=1', 'Arbaz Khan', 'teacher@gmail.com'),
(3, 'Database Diagrams', 'Introduction to Computer Science - I', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/Doc.aspx?sourcedoc={067c90fb-683b-4174-90cb-9f96379a18d2}&action=embedview&wdStartOn=1', 'Arbaz Khan', 'teacher@gmail.com'),
(4, 'Soft', 'English', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/WopiFrame.aspx?sourcedoc={ba8e2b9e-6d82-46b1-b791-db6b05bb35dc}&action=embedview&wdAr=1.3333333333333333', 'Arbaz Khan', 'teacher@gmail.com'),
(5, 'SE', 'Physics - II (Electricity and Magnetism)', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/WopiFrame.aspx?sourcedoc={19d3cdcd-b2e1-4bd9-90cc-217054ba56e4}&action=embedview&wdAr=1.3333333333333333', 'Zuhair', 'teacher2@gmail.com'),
(6, 'Title', 'Software Engineering', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/WopiFrame.aspx?sourcedoc={b764c444-1206-4112-80ad-f15a24f03596}&action=embedview&wdAr=1.3333333333333333', 'Zuhair', 'teacher2@gmail.com'),
(7, 'Reduxxx', 'Introduction to Computer Science - I', 'ppt', 'https://pern-my.sharepoint.com/personal/sp16bs0065_maju_edu_pk/_layouts/15/WopiFrame.aspx?sourcedoc={ba8e2b9e-6d82-46b1-b791-db6b05bb35dc}&action=embedview&wdAr=1.3333333333333333', 'Arbaz Khan', 'teacher@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
