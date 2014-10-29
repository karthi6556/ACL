-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2014 at 06:58 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_acl`
--

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `features_id` varchar(15) NOT NULL DEFAULT '',
  `features_name` varchar(30) DEFAULT NULL,
  `features_descr` varchar(50) DEFAULT NULL,
  `features_perm` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`features_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`features_id`, `features_name`, `features_descr`, `features_perm`) VALUES
('FEAT01', 'Medical', 'Medical allowance', 'Y'),
('FEAT02', 'Travel', 'Travel Allowance', 'Y'),
('FEAT03', 'Insurance', 'Insurance Allowance', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` varchar(15) NOT NULL DEFAULT '',
  `role_name` varchar(30) DEFAULT NULL,
  `role_purpose` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_purpose`) VALUES
('1', 'Accounts', 'Accountant'),
('ROLE02', 'Accounts', 'Accountant'),
('ROLE03', 'Accounts', 'Accountant'),
('ROLE04', 'ACTOR', 'In Cine Field'),
('ROLE05', 'SWDevelop', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `role_features`
--

CREATE TABLE IF NOT EXISTS `role_features` (
  `role_id` varchar(15) NOT NULL DEFAULT '',
  `features_id` varchar(15) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE IF NOT EXISTS `role_users` (
  `role_id` varchar(15) NOT NULL DEFAULT '',
  `user_id` varchar(15) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `user_name` varchar(50) DEFAULT NULL,
  `user_designation` varchar(30) DEFAULT NULL,
  `user_department` varchar(30) DEFAULT NULL,
  `user_joined` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_designation`, `user_department`, `user_joined`) VALUES
('USER01', 'Karthi', 'MCA', 'DS', '2014-10-06'),
('USER010', 'Hari', 'Medical', 'MBS', '2014-10-13'),
('USER011', 'Gajesh', 'Actor', 'CIN', '2014-10-30'),
('USER012', 'JKR', 'asdad', 'MNH', '2014-10-15'),
('USER013', 'lhlj', 'jkjk', 'GHD', '2014-10-07'),
('USER02', 'Karthik', 'MBA', 'CS', '2014-10-06'),
('USER03', 'JK', 'CS', 'IT', '2014-10-02'),
('USER04', 'dffdjh', 'mbnb', 'mnb', '2014-09-29'),
('USER05', 'kbhkjk', 'MCA', 'jhg', '2014-10-03'),
('USER06', 'karthi', 'Computer', 'MCA', '2014-06-04'),
('USER07', 'JK2', 'dfdf', 'MCA', '2014-09-29'),
('USER08', 'JK2', 'dfdf', 'MCA', '0000-00-00'),
('USER09', 'jhk', 'bhj', 'MBG', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
