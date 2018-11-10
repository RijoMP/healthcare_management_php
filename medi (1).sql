-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 04:43 PM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(20) NOT NULL,
  `dep_head` int(10) NOT NULL,
  `dep_status` varchar(8) NOT NULL,
  PRIMARY KEY (`dep_id`),
  KEY `dep_head` (`dep_head`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`, `dep_head`, `dep_status`) VALUES
(1, 'Orthology', 123, 'active'),
(2, 'Nephrology', 1234, 'active'),
(3, 'Neurology', 123, 'active'),
(4, 'Pediatrics', 1323, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `d_id` int(5) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(20) NOT NULL,
  `d_adrs` varchar(50) NOT NULL,
  `d_gender` set('male','female','transgender','') NOT NULL,
  `d_dob` date NOT NULL,
  `d_doj` date NOT NULL,
  `d_phno` int(10) NOT NULL,
  `d_qua` varchar(20) NOT NULL,
  `d_wexp` varchar(50) NOT NULL,
  `d_email` varchar(20) NOT NULL,
  `d_dept` varchar(15) NOT NULL,
  `d_status` set('active','blocked','removed','') NOT NULL,
  PRIMARY KEY (`d_id`),
  UNIQUE KEY `d_email` (`d_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `d_adrs`, `d_gender`, `d_dob`, `d_doj`, `d_phno`, `d_qua`, `d_wexp`, `d_email`, `d_dept`, `d_status`) VALUES
(1, 'Akshay TS', 'Uffujf', 'male', '1994-10-05', '2018-10-19', 2147483647, 'FRCS', 'Two Years in Appollo Bangalore', 'akshayts@gmail.com', '1', 'active'),
(2, 'sid', 'Fititi', 'female', '1986-10-20', '2018-10-17', 2147483647, 'FRCS', 'Bhshd', 'sid@gmail.com', '2', 'active'),
(4, 'ggg', 'Gogigi', 'male', '2018-10-11', '2018-10-15', 833667555, 'ififof', 'Kfkffoof', 'hq@a.com', '4', 'active'),
(5, 'ufkckf', 'Ufifgi', 'male', '2018-10-11', '2018-10-10', 245356678, 'ififof', 'Jdfk', 'hq@a.comm', '3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `log_id` int(3) NOT NULL AUTO_INCREMENT,
  `log_uname` varchar(20) NOT NULL,
  `log_pwd` char(40) NOT NULL,
  `log_utype` varchar(15) NOT NULL,
  `log_status` set('active','blocked','deleted','') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `log_uname`, `log_pwd`, `log_utype`, `log_status`) VALUES
(1, 'admin', 'admin123', 'admin', 'active'),
(2, 'raju', 'raju123', 'doctor', 'active'),
(3, 'kartha', 'kartha123', 'head', 'active'),
(6, 'user', 'user123', 'user', 'active'),
(12, 'ghuuhhgghuhdrt@gmail', '', 'user', 'active'),
(13, 'ghuuhhgghuhdrt@gmail', 'y', 'user', 'active'),
(14, 'ghuuhhgghuhdrt@gmail', '45', 'user', 'active'),
(15, 'ghuuhhgghuhdrt@gmail', '45', 'user', 'active'),
(16, 'ghuuhhgghuhdrt@gmail', 'er', 'user', 'active'),
(17, 'ghuuhhgghuhdrt@gmail', 'er', 'user', 'active'),
(18, 'ghuuhhgghuhdrt@gmail', 'qw', 'user', 'active'),
(19, 'akshayts@gmail.com', '123', 'doctor', 'active'),
(20, 'sid@gmail.com', '123', 'doctor', 'active'),
(21, 'sid@gmail.comm', '', 'doctor', 'active'),
(22, 'hq@a.com', '123', 'doctor', 'active'),
(23, 'hq@a.comm', '123', 'doctor', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `res_id` int(10) NOT NULL AUTO_INCREMENT,
  `res_uname` varchar(20) NOT NULL,
  `res_did` varchar(10) NOT NULL,
  `res_date` date NOT NULL,
  `res_status` varchar(7) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`res_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=499 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_uname`, `res_did`, `res_date`, `res_status`) VALUES
(2, 'Iff8', '5', '2018-10-09', 'pending'),
(468, '9tr9', '2', '2018-10-18', 'pending'),
(469, 'Otfo', '2', '2018-10-19', 'pending'),
(470, 'Ofgo', '2', '2018-10-19', 'pending'),
(471, 'Offo', '1', '2018-10-18', 'pending'),
(472, 'Iffi', '5', '2018-10-17', 'pending'),
(473, 'Kffo', '1', '2018-10-18', 'pending'),
(474, 'user', '5', '2018-10-19', 'pending'),
(475, 'user', '5', '2018-10-19', 'pending'),
(476, 'user', '5', '2018-10-19', 'pending'),
(477, 'user', '5', '2018-10-19', 'pending'),
(478, 'user', '5', '2018-10-19', 'pending'),
(479, 'user', '5', '2018-10-19', 'pending'),
(480, 'user', '5', '2018-10-19', 'pending'),
(481, 'user', '5', '2018-10-19', 'pending'),
(482, 'user', '5', '2018-10-19', 'pending'),
(483, 'user', '5', '2018-10-19', 'pending'),
(484, 'user', '5', '2018-10-19', 'pending'),
(485, 'user', '5', '2018-10-19', 'pending'),
(486, 'user', '3', '2018-10-19', 'pending'),
(487, 'user', '5', '2018-10-20', 'pending'),
(488, 'user', '7', '2018-10-18', 'pending'),
(489, 'user', '6', '2018-10-20', 'pending'),
(490, 'user', '7', '2018-10-19', 'pending'),
(491, 'user', '7', '2018-10-19', 'pending'),
(492, 'user', '4', '2018-10-20', 'pending'),
(493, 'user', '3', '2018-10-18', 'pending'),
(494, 'user', '3', '2018-10-18', 'pending'),
(495, 'user', '3', '2018-10-18', 'pending'),
(496, 'user', '3', '2018-10-18', 'pending'),
(497, 'user', '1', '2018-10-19', 'pending'),
(498, 'user', '5', '2018-10-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `s_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(20) NOT NULL,
  `s_adrs` varchar(30) NOT NULL,
  `s_phone` int(13) NOT NULL,
  `s_gender` set('male','female','tg','') NOT NULL,
  `s_dob` int(10) NOT NULL,
  `s_job` varchar(20) NOT NULL,
  `s_dept` varchar(20) NOT NULL,
  `s_status` varchar(10) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_email` varchar(25) NOT NULL,
  `u_adrs` varchar(50) NOT NULL,
  `u_dob` int(10) NOT NULL,
  `u_sex` varchar(10) NOT NULL,
  `u_blood` varchar(3) NOT NULL,
  `u_doj` int(11) NOT NULL,
  `u_status` varchar(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_adrs`, `u_dob`, `u_sex`, `u_blood`, `u_doj`, `u_status`) VALUES
(1, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(2, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(3, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(4, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(46, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(6, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(7, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(8, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(9, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(10, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(11, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(12, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(13, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(14, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(15, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(16, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(17, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(18, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(19, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(20, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(21, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(22, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(23, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(24, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(25, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(26, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(27, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(28, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(29, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(30, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(31, 'Ra', 'a@b.com', 'Vhh', 18, 'male', 'A+', 2147483647, 'active'),
(32, 'Df', 'a@b.com', 'Fhffg', 4, 'Female', 'B-', 475678988, 'active'),
(47, 'J', 'ghuuhhgghuhdrt@gmail.com', 'H', 2018, 'male', 'A+', 1539536244, 'ACTIVE'),
(48, 'J', 'ghuuhhgghuhdrt@gmail.com', 'H', 2018, 'male', 'A+', 1539536321, 'ACTIVE'),
(49, 'hcare', 'ghuuhhgghuhdrt@gmail.com', 'Fjh', 2018, 'male', 'A+', 1539536358, 'ACTIVE'),
(50, 'hcare', 'ghuuhhgghuhdrt@gmail.com', 'Fjh', 2018, 'male', 'A+', 1539536366, 'ACTIVE'),
(51, 'raju', 'ghuuhhgghuhdrt@gmail.com', 'Hj', 2018, 'male', 'A+', 1539536668, 'active'),
(52, 'raju', 'ghuuhhgghuhdrt@gmail.com', 'Hj', 2018, 'male', 'A+', 1539536794, 'active'),
(53, 'Yuj', 'ghuuhhgghuhdrt@gmail.com', 'Guj', 2018, 'male', '', 1539618192, 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
