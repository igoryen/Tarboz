-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2014 at 08:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prj666`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE IF NOT EXISTS `tbl_report` (
  `rep_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_reason` varchar(100) DEFAULT NULL,
  `rep_entity_for_report` varchar(45) DEFAULT NULL,
  `rep_entity_id` int(11) DEFAULT NULL,
  `rep_reported_by` int(11) DEFAULT NULL,
  `rep_reported_on` datetime DEFAULT NULL,
  PRIMARY KEY (`rep_report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`rep_report_id`, `rep_reason`, `rep_entity_for_report`, `rep_entity_id`, `rep_reported_by`, `rep_reported_on`) VALUES
(1, 'hatred', 'user', 1, 1, '2014-10-27 00:00:00'),
(2, 'spam', 'comment', 1, 1, '2014-10-28 00:00:00'),
(3, 'bad', 'comment', 3, 0, '2014-10-28 15:55:48'),
(4, 'bad', 'comment', 3, 0, '2014-10-28 15:56:25'),
(5, 'bad1', 'comment', 3, 0, '2014-10-28 16:00:26'),
(6, 'bad3', 'comment', 4, 1, '2014-10-28 16:00:39'),
(7, 'bad4', 'comment', 4, 0, '2014-10-28 16:04:12'),
(8, 'bad5', 'comment', 4, 1, '2014-10-28 16:08:10'),
(13, 'bad6', 'comment', 6, 1, '2014-10-28 17:21:55'),
(14, 'report7', 'comment', 6, 1, '2014-10-28 17:25:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
