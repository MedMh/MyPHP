-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 01:18 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_php_db`
--
CREATE DATABASE IF NOT EXISTS `my_php_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `my_php_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `code_cours` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `level_c` varchar(1) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`code_cours`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `code_quest` varchar(20) NOT NULL,
  `enonce` text NOT NULL,
  `rep_just` text NOT NULL,
  `rep_a` text NOT NULL,
  `rep_b` text NOT NULL,
  `rep_c` text NOT NULL,
  `code_test` varchar(20) NOT NULL,
  PRIMARY KEY (`code_quest`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `code_rep` varchar(20) NOT NULL,
  `response` text NOT NULL,
  `code_topic` varchar(20) NOT NULL,
  `date_rep` date NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_c`
--

DROP TABLE IF EXISTS `test_c`;
CREATE TABLE IF NOT EXISTS `test_c` (
  `code_test` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `etat` varchar(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`code_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `code_topic` varchar(20) NOT NULL,
  `topic` text NOT NULL,
  `login` varchar(50) NOT NULL,
  `date_post` date NOT NULL,
  PRIMARY KEY (`code_topic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level_cl` varchar(1) NOT NULL DEFAULT 'B',
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
