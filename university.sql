-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2018 at 02:47 AM
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
  `course_name` varchar(30) NOT NULL,
  `section` varchar(5) NOT NULL,
  `days` varchar(30) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `t_email` varchar(30) NOT NULL,
  `t_name` varchar(30) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_course`
--

INSERT INTO `available_course` (`id`, `course_name`, `section`, `days`, `time_slot`, `t_email`, `t_name`, `course_code`) VALUES
(1, 'w', 'A', 'Mon - Wed - Fri', '1 to 2', 'mohsin@gmail.com', 'Mohsin Ghani', 'w'),
(2, 'w', 'A', 'Mon - Wed - Fri', '2 to 3', 'mohsin@gmail.com', 'Mohsin Ghani', 'w'),
(3, 'w', 'A', 'Tue - Thu - Sat', '1 to 2', 'mohsin@gmail.com', 'Mohsin Ghani', 'w');

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
('w', 'w', 'BS-CS'),
('555', 'Software', 'BS-CS');

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
('Mohsin', 'jimovera@emailsy.info', '2018-05-10', 'BS-CS', '1'),
('Mohsin', 'mohsin@gmail.com', '2018-05-01', 'BS-CS', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `s_email`, `course_id`) VALUES
(9, 'jimovera@emailsy.info', 3);

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
('sp16-bs-0065', 'jimovera@emailsy.info', 1),
('Mohsin Ghani', 'mohsin@gmail.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
