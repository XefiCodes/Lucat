-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2022 at 09:42 AM
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
  `cid` int(255) NOT NULL AUTO_INCREMENT,
  `pid` int(255) NOT NULL,
  `cid_reply` int(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `cmt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `fkcomment` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

DROP TABLE IF EXISTS `commissions`;
CREATE TABLE IF NOT EXISTS `commissions` (
  `coid` int(255) NOT NULL AUTO_INCREMENT,
  `Image` longblob,
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `txt` varchar(255) DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `priceMin` int(11) DEFAULT NULL,
  `priceMax` int(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `close` varchar(3) NOT NULL,
  PRIMARY KEY (`coid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `heart`
--

DROP TABLE IF EXISTS `heart`;
CREATE TABLE IF NOT EXISTS `heart` (
  `hid` int(255) NOT NULL AUTO_INCREMENT,
  `id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `liked` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`hid`),
  KEY `fkheart` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(255) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(255) NOT NULL AUTO_INCREMENT,
  `Image` longblob,
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `txt` varchar(255) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagged`
--

DROP TABLE IF EXISTS `tagged`;
CREATE TABLE IF NOT EXISTS `tagged` (
  `tagged_id` int(255) NOT NULL AUTO_INCREMENT,
  `pid` int(255) DEFAULT NULL,
  `tag` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`tagged_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tid` int(255) NOT NULL AUTO_INCREMENT,
  `tag` varchar(75) NOT NULL,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof_pic` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `tweets` int(11) DEFAULT NULL,
  `follower_array` text,
  `following_array` text,
  `comment_stat` varchar(255) DEFAULT NULL,
  `bio` text,
  `loc` text,
  `website_link` text,
  `dob` date DEFAULT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `prof_pic`, `cover_pic`, `signup_date`, `user_closed`, `tweets`, `follower_array`, `following_array`, `comment_stat`, `bio`, `loc`, `website_link`, `dob`, `status`) VALUES
(1, 'Dragmanouts', 'Dragmaba@yahoo.com', '8ce87b8ec346ff4c80635f667d1592ae', 'https://i.imgur.com/qiwcrKS.png', 'https://i.imgur.com/qiwcrKS.png', '2022-05-19', 'no', 0, ',', ',', '', 'Web, Design & Hip-Hop\r\nPartner/UI Designer @spade_be\r\nMusician in @dashboxmusic\r\n', 'Namur, Belgium', 'exibit.be', '1978-06-20', 'Offline now'),
(2, 'Xenonph', 'Nashinsorio@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 'https://i.imgur.com/qiwcrKS.png', 'https://i.imgur.com/qiwcrKS.png', '2022-05-29', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active now');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
