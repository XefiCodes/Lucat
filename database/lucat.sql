-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2022 at 12:54 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cid_reply` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `cmt` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `heart`
--

DROP TABLE IF EXISTS `heart`;
CREATE TABLE IF NOT EXISTS `heart` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`hid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1, 2, 'adsf'),
(2, 1, 2, 'a'),
(3, 1, 2, 'hi'),
(4, 2, 3, 'wa'),
(5, 2, 3, 'pakyu'),
(6, 3, 2, 'you suck'),
(7, 2, 3, 'asdf'),
(8, 3, 2, 'ffffffff'),
(9, 2, 3, 'ads;flkjasdf'),
(10, 3, 2, 'asdfjk;alkjdsf;jlkasdf');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `Image` longblob,
  `username` varchar(50) NOT NULL,
  `txt` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof_pic` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `signup_date` date NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL,
  `comment_stat` varchar(255) NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `prof_pic`, `cover_pic`, `bio`, `signup_date`, `user_closed`, `friend_array`, `comment_stat`, `status`) VALUES
(1, 'Kindiaz', 'Kindiaz@yahoo.com', '8ce87b8ec346ff4c80635f667d1592ae', 'https://i.imgur.com/qiwcrKS.png', 'https://i.imgur.com/qiwcrKS.png', '', '2022-05-05', 'no', ',', '', ''),
(2, 'Edgymofo', 'Nashinsorio@gmail.com', 'c69874b898abb180ac71bd99bc16f8fb', 'https://i.imgur.com/qiwcrKS.png', 'https://i.imgur.com/qiwcrKS.png', '', '2022-05-18', 'no', ',', '', 'Active now'),
(3, 'Kekw', 'Pogkekw@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'https://i.imgur.com/qiwcrKS.png', 'https://i.imgur.com/qiwcrKS.png', '', '2022-05-25', 'no', '', '', 'Active now');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
