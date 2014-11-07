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
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `com_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_text` varchar(500) DEFAULT NULL,
  `com_rating_id` int(11) DEFAULT NULL,
  `com_created_by` int(11) DEFAULT NULL,
  `com_entry_id` varchar(25) DEFAULT NULL,
  `com_is_visible` varchar(1) DEFAULT 'Y',
  `com_created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`com_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`com_comment_id`, `com_text`, `com_rating_id`, `com_created_by`, `com_entry_id`, `com_is_visible`, `com_created_on`) VALUES
(1, 'This is awesome. Thanks', 1, 1, '1', 'Y', '2014-10-01 00:00:00'),
(2, 'It''s not accurate!!!', 2, 1, '2', 'Y', '2014-10-02 00:00:00'),
(3, 'I like it', 2, 2, '3', 'Y', '2014-10-03 00:00:00'),
(4, 'It''s helpful', 2, 2, '4', 'Y', '2014-10-05 00:00:00'),
(5, 'Non sense, very bad interpretation', 1, 1, '5', 'Y', '2014-10-06 00:00:00'),
(6, 'Not catch the main idea', 1, 2, '5', 'Y', '2014-10-07 00:00:00'),
(45, 'test', NULL, 1, '5', 'Y', '2014-10-25 10:01:26'),
(46, 'test1', NULL, 1, '5', 'N', '2014-10-25 09:21:25'),
(47, 'test5!!', NULL, 1, '5', 'Y', '2014-10-29 03:43:07'),
(60, 'I !! you', NULL, 1, '5', 'Y', '2014-10-27 23:55:18'),
(61, 'test6', NULL, 1, '5', 'Y', '2014-10-28 18:58:43'),
(63, 'test9', NULL, 1, '5', 'Y', '2014-11-03 06:55:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tblComment_tblRating_com_comment_created_by_FK` FOREIGN KEY (`com_created_by`) REFERENCES `tbl_user` (`usr_user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblComment_tblRating_com_comment_rating_id_FK` FOREIGN KEY (`com_rating_id`) REFERENCES `tbl_rating` (`rat_rating_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
