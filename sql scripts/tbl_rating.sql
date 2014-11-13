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
-- Table structure for table `tbl_rating`
--

CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `rat_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rat_entity_id` varchar(25) NOT NULL,
  `rat_like_user_id` int(11) DEFAULT NULL,
  `rat_dislike_user_id` int(11) DEFAULT NULL,
  `rat_created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`rat_rating_id`),
  KEY `tblRating_tblUser_rat_rating_dislike_user_id_FK_idx` (`rat_dislike_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rat_rating_id`, `rat_entity_id`, `rat_like_user_id`, `rat_dislike_user_id`, `rat_created_on`) VALUES
(1, 'ent5', 2, 0, NULL),
(2, 'ent4', 2, 1, NULL),
(7, 'com45', NULL, 1, '2014-10-29 04:06:52'),
(9, 'com4', NULL, 1, '2014-10-28 23:00:12'),
(10, 'com61', 2, 0, '2014-10-29 04:06:49'),
(24, 'com61', NULL, 1, '2014-10-29 04:15:59'),
(25, 'com63', NULL, 1, '2014-11-03 06:41:52'),
(27, 'ent5', NULL, 1, '2014-11-03 07:46:56'),
(28, 'ent13', 1, 0, '2014-11-03 07:47:55'),
(29, 'ent13', 2, 0, '2014-11-03 08:03:22'),
(30, 'ent13', 3, 0, '2014-11-03 08:04:44'),
(31, 'ent13', 4, 0, '2014-11-03 08:05:33'),
(32, 'ent11', 1, 0, '2014-11-03 08:06:07'),
(33, 'ent11', 3, 0, '2014-11-03 08:08:08'),
(34, 'ent38', 1, 0, '2014-11-03 08:09:08'),
(35, 'ent38', 2, 0, '2014-11-03 08:09:22'),
(36, 'ent38', 3, 0, '2014-11-03 08:10:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
