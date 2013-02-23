-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2010 at 10:50 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_guests`
--

CREATE TABLE IF NOT EXISTS `active_guests` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_guests`
--


-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE IF NOT EXISTS `active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_users`
--

INSERT INTO `active_users` (`username`, `timestamp`) VALUES
('07030cm1', 1260348086);

-- --------------------------------------------------------

--
-- Table structure for table `banned_users`
--

CREATE TABLE IF NOT EXISTS `banned_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banned_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `bran_id` int(11) NOT NULL AUTO_INCREMENT,
  `bran_name` varchar(255) NOT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bran_id`, `bran_name`) VALUES
(1, 'cme'),
(2, 'it'),
(3, 'mech'),
(4, 'civil'),
(5, 'ece'),
(6, 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `exam_res`
--

CREATE TABLE IF NOT EXISTS `exam_res` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `result` int(11) NOT NULL,
  `for` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `top_id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `exam_res`
--

INSERT INTO `exam_res` (`exam_id`, `result`, `for`, `timestamp`, `top_id`, `username`) VALUES
(1, 24, 30, 1268921662, 1, 'admin'),
(2, 33, 40, 1268921662, 2, 'admin'),
(3, 8, 10, 1268921662, 2, 'admin'),
(4, 8, 10, 1268921662, 2, 'admin'),
(5, 8, 10, 1268921662, 2, 'admin'),
(6, 8, 10, 1268921662, 2, 'admin'),
(17, 0, 10, 1260347049, 1, 'admin'),
(8, 8, 10, 1268921662, 2, 'admin'),
(9, 8, 10, 1268921662, 2, 'admin'),
(10, 8, 10, 1268921662, 2, 'admin'),
(11, 8, 10, 1268921662, 2, 'admin'),
(12, 8, 10, 1268921662, 2, 'admin'),
(15, 2, 10, 1260341904, 1, '07030cm1'),
(16, 0, 10, 1260341904, 1, '07030cm1'),
(18, 0, 10, 1260347049, 1, 'admin'),
(19, 1, 10, 1260347163, 1, 'admin'),
(20, 3, 10, 1260347298, 1, 'admin'),
(21, 3, 10, 1260347438, 1, 'admin'),
(22, 2, 10, 1260347461, 1, 'admin'),
(23, 3, 10, 1260347481, 1, 'admin'),
(24, 2, 10, 1260347755, 1, 'admin'),
(25, 3, 10, 1260348052, 1, '07030cm1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_text` text NOT NULL,
  `q_op1` varchar(255) NOT NULL,
  `q_op2` varchar(255) NOT NULL,
  `q_op3` varchar(255) NOT NULL,
  `q_op4` varchar(255) NOT NULL,
  `q_ans` int(2) NOT NULL,
  `top_id` int(11) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_text`, `q_op1`, `q_op2`, `q_op3`, `q_op4`, `q_ans`, `top_id`) VALUES
(1, 'what is ip', 'internet protocol', 'iolpol', 'lo', 'annd', 1, 1),
(2, 'what is tcp', 'trnasfer control protocol', 'tfr', 'jhj', 'hgj', 1, 1),
(3, 'what is my no', '50', '54', '555', '125', 1, 1),
(4, 'who is the father of computers', 'charless babbage', 'bill gates', 'bill clinton', 'charles newton', 1, 1),
(5, 'what is 25+32', '57', '58', '35', '45', 1, 1),
(6, 'what is 20*10', '340', '200', '150', '100', 2, 1),
(7, 'hai who is founder of aanm and vvrsr college', 'aanm', 'vvrsr', 'both aanm & vvrsr', 'none', 3, 1),
(8, 'what is caqpital of andhra', 'hyd', 'vjw', 'gnt', 'gdl', 1, 1),
(9, 'who is president of india', 'prathiba patil', 'abdul kalam', 'nolm', 'jopmsd', 1, 1),
(10, 'what is yashoons no', '10', '20', '30', '25', 1, 1),
(11, 'what is my name', 'ravi ', 'teja', 'raviteja', 'hai', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(255) NOT NULL,
  `bran_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_title`, `bran_id`) VALUES
(1, 'computer networks', 1),
(3, 'oops through c++', 1),
(4, 'java', 1),
(7, 'operating system', 1),
(6, 'adbms', 1),
(8, 'software engineering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `top_id` int(11) NOT NULL AUTO_INCREMENT,
  `top_title` varchar(255) NOT NULL,
  `sub_id` int(11) NOT NULL,
  PRIMARY KEY (`top_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`top_id`, `top_title`, `sub_id`) VALUES
(1, 'osi reference model', 1),
(2, 'tcp/ip reference model', 1),
(3, 'network topologies', 1),
(4, 'lan components', 1),
(5, 'classes and objects', 3),
(6, 'constructors destructors', 3),
(7, 'arrays,pointers strings', 3),
(8, 'function overloading operator overloading', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) DEFAULT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  `branch_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`, `branch_id`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'd3f0b93bf63fefad081eb1f2cbb59d10', 9, 't@in.com', 1260347843, 1),
('07030cm1', '2496230b2612d0bd9a54707a08aeb408', '6f64a43eb73d49a912d99fec0c5b14b0', 1, 't@in.com', 1260348086, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
