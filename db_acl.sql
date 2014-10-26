-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2014 at 06:18 AM
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
  `features_id` varchar(15) NOT NULL,
  `features_name` varchar(30) DEFAULT NULL,
  `features_descr` varchar(30) DEFAULT NULL,
  `features_perm` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`features_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` varchar(15) NOT NULL,
  `role_name` varchar(30) DEFAULT NULL,
  `role_purpose` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_features`
--

CREATE TABLE IF NOT EXISTS `role_features` (
  `role_id` varchar(15) NOT NULL,
  `features_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE IF NOT EXISTS `role_users` (
  `role_id` varchar(15) NOT NULL,
  `user_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(15) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_designation` varchar(30) DEFAULT NULL,
  `user_department` varchar(30) DEFAULT NULL,
  `user_joined` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
