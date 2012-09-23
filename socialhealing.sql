-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2012 at 12:16 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialhealing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `name`, `description`, `date_added`) VALUES
(1, 0, 'Crime', 'Crime all', '0000-00-00 00:00:00'),
(2, 1, 'Murderer', 'The act of killing each other', '0000-00-00 00:00:00'),
(3, 0, 'Politics', 'Politics', '2012-04-26 00:00:00'),
(4, 0, 'Religion', 'Religion issues', '2012-04-26 00:00:00'),
(5, 0, 'Resource Distribution', 'Resource Distribution', '2012-04-26 00:00:00'),
(6, 1, 'Robery', 'Robery', '2012-04-27 00:00:00'),
(7, 1, 'Forcebly rape', 'Forcebly rape', '2012-04-27 00:00:00'),
(8, 3, 'Corruption', 'Corruption', '2012-04-27 00:00:00'),
(9, 3, 'Hate Speech', 'Hate Speech', '2012-04-27 00:00:00'),
(10, 3, 'Election', 'Elections', '0000-00-00 00:00:00'),
(11, 0, 'Tribal Conflicts', 'Tribal Conflicts', '0000-00-00 00:00:00'),
(12, 0, 'Natural Harzad', 'Natural Harzad', '0000-00-00 00:00:00'),
(13, 0, 'War', 'War', '0000-00-00 00:00:00'),
(14, 0, 'News', 'News', '0000-00-00 00:00:00'),
(15, 1, 'Violence against Woman', 'Violence against Woman', '0000-00-00 00:00:00'),
(16, 3, 'Embezzment of funds(CDF)', 'Embezzment of funds', '0000-00-00 00:00:00'),
(17, 3, 'IDP', 'IDP', '0000-00-00 00:00:00'),
(18, 11, 'Election', 'Conflicts due to Elections', '0000-00-00 00:00:00'),
(21, 11, 'Resource Allocation', 'Conflicts due to Resource Allocation', '0000-00-00 00:00:00'),
(22, 11, 'Public employment', 'Conflict due to Public employment', '0000-00-00 00:00:00'),
(23, 4, 'Doctrine', 'Doctrine', '0000-00-00 00:00:00'),
(24, 4, 'Biasness', 'Biasness', '0000-00-00 00:00:00'),
(25, 5, 'Natural Resources', 'Natural Resources', '0000-00-00 00:00:00'),
(26, 5, 'Social Amenities', 'Social Amenities e.g Schools and Hospital', '0000-00-00 00:00:00'),
(27, 5, 'Infrastructure', 'Infrastructure e.g Roads', '0000-00-00 00:00:00'),
(28, 13, 'Community war', 'War between Communities', '0000-00-00 00:00:00'),
(29, 12, 'Slides', 'Slides', '0000-00-00 00:00:00'),
(30, 0, 'Others', 'If not in the list', '0000-00-00 00:00:00'),
(31, 30, 'others', 'like fun,enjoy', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `like` int(11) DEFAULT NULL,
  `unlike` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `comment`, `like`, `unlike`, `date_added`) VALUES
(1, 0, 14, 'very sad :(', NULL, NULL, '2012-05-09 20:08:20'),
(2, 0, 14, 'very sad :(', NULL, NULL, '2012-05-09 20:10:23'),
(3, 0, 14, 'very sad :(', NULL, NULL, '2012-05-09 20:12:09'),
(4, 0, 2, 'very sad :(', NULL, NULL, '2012-05-09 20:14:33'),
(5, 0, 14, 'very sad :((((((', NULL, NULL, '2012-05-10 12:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eveny_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(50) NOT NULL,
  `org_email` varchar(50) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `county_id` int(11) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eveny_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eveny_id`, `org_name`, `org_email`, `event_name`, `county_id`, `venue`, `start_date`, `end_date`, `time`, `description`, `image`, `date_added`) VALUES
(1, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '0000-00-00', '0000-00-00', '9-00am-4-00pm', 'Its a peace event', 'birds1.jpg', '2012-05-10 10:37:23'),
(2, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '0000-00-00', '0000-00-00', '9-00am-4-00pm', 'peace', '1.jpg', '2012-05-10 10:58:20'),
(3, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '11.jpg', '2012-05-10 11:33:52'),
(4, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '12.jpg', '2012-05-10 11:45:15'),
(5, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '13.jpg', '2012-05-10 11:45:31'),
(6, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '14.jpg', '2012-05-10 11:45:59'),
(7, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '15.jpg', '2012-05-10 11:46:58'),
(8, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '16.jpg', '2012-05-10 12:02:59'),
(9, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '17.jpg', '2012-05-10 12:04:31'),
(10, 'Peace Org', 'peace@gmail.com', 'Peace making', 30, 'Ihub', '2012-05-14', '2012-05-21', '9-00am-4-00pm', 'peace', '18.jpg', '2012-05-10 12:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(50) NOT NULL,
  `county_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(25) DEFAULT NULL,
  `Geolocation` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `parent_id`, `name`, `Geolocation`) VALUES
(1, 0, 'Baringo', '(0.512912, 35.952537)'),
(2, 0, 'Bomet', '(-0.690131, 35.278005)'),
(3, 0, 'Bungoma', '(0.737046, 34.672536)'),
(4, 0, 'Busia', '(0.428414, 34.210571)'),
(5, 0, 'Elgeyo Marakwet', '(0.806011, 35.564093)'),
(6, 0, 'Embu', '(-0.5982, 37.653906)'),
(7, 0, 'Garissa', '(-0.564679, 40.408457)'),
(8, 0, 'Homabay', ''),
(9, 0, 'Isiolo', '(0.949302, 38.614718)'),
(10, 0, 'Kajiado', '(-2.221971, 36.980268)'),
(11, 0, 'Kakamega', '(0.308499, 34.654844)'),
(12, 0, 'Kericho', '(-0.297842, 35.319833)'),
(13, 0, 'Kiambu', '(-1.060698, 36.79929)'),
(14, 0, 'Kilifi', '(-3.279972, 39.63501)'),
(15, 0, 'Kirinyaga', '(-0.517766, 37.302006)'),
(16, 0, 'Kisii', '(-0.782524, 34.766895)'),
(17, 0, 'Kisumu', '(-0.167225, 34.953647)'),
(18, 0, 'Kitui', '(-1.519146, 38.376101)'),
(19, 0, 'Kwale', '(-4.242667, 39.174233)'),
(20, 0, 'Laikipia', '(0.311627, 36.814178)'),
(21, 0, 'Lamu', '(-2.03752, 40.688214)'),
(22, 0, 'Machakos', '(-1.327138, 37.352277)'),
(23, 0, 'Makueni', '(-2.211917, 37.865047)'),
(24, 0, 'Mandera', '(3.46712, 40.704671)'),
(25, 0, 'Marsabit', '(2.772167, 37.76822)'),
(26, 0, 'Meru', '(0.159398, 37.750761)'),
(27, 0, 'Migori', '(-1.008592, 34.42681)'),
(28, 0, 'Mombasa', '(-3.998813, 39.632129)'),
(29, 0, 'Muranga', ''),
(30, 0, 'Nairobi', '(-1.296975, 36.844534)'),
(31, 0, 'Nakuru', '(-0.385212, 36.036261)'),
(32, 0, 'Nandi', '(0.143371, 35.156125)'),
(33, 0, 'Narok', '(-1.227452, 35.686784)'),
(34, 0, 'Nyamira', '(-0.644917, 34.955612)'),
(35, 0, 'Nyandarua', '(-0.374727, 36.494076)'),
(36, 0, 'Nyeri', '(-0.407168, 36.965186)'),
(37, 0, 'Samburu', '(1.183862, 37.184377)'),
(38, 0, 'Siaya', '(0.06, 34.29)'),
(39, 0, 'Taita Taveta', '(-3.551502, 38.376101)'),
(40, 0, 'Tana River', '(-1.584971, 39.536272)'),
(41, 0, 'Tharaka Nithi', '(-0.227324, 37.882411)'),
(42, 0, 'Trans Nzoia', '(1.030597, 34.949297)'),
(43, 0, 'Turkana', '(3.318344, 35.401457)'),
(44, 0, 'Uasin Gichu', ''),
(45, 0, 'Vihiga', '(0.3, 34.93333)'),
(46, 0, 'Wajir', '(1.895541, 40.07933)'),
(47, 0, 'West Pokot', '(1.575837, 35.316901)');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `poll` text NOT NULL,
  `opn_yes` int(11) NOT NULL,
  `opn_no` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_title` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `place_id` int(11) NOT NULL,
  `like` int(11) DEFAULT NULL,
  `unlike` int(11) DEFAULT NULL,
  `image` text,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_title`, `category_id`, `description`, `place_id`, `like`, `unlike`, `image`, `date_added`) VALUES
(1, 0, 'Bomb', 8, 'Bomb in a church', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(2, 0, 'Bomb', 2, 'Bomb in a church', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(3, 0, 'Bomb', 2, 'Bomb in a church', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(4, 0, 'Bomb attack', 2, 'Bomb in town', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(5, 0, 'Bomb attack', 2, 'Bomb in town', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(6, 0, 'Bomb', 2, 'bomb', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(7, 0, 'Bomb', 15, 'bomb', 30, NULL, NULL, '', '0000-00-00 00:00:00'),
(14, 0, 'Murderer', 6, 'Someone was killed in a robery', 31, NULL, NULL, '1_(2)1.jpg', '0000-00-00 00:00:00'),
(15, 0, 'Coming Home', 31, 'Going to Mombasa', 1, NULL, NULL, '1.jpg', '0000-00-00 00:00:00'),
(16, 0, 'Coming Home', 31, 'Going to Mombasa', 1, NULL, NULL, '11.jpg', '0000-00-00 00:00:00'),
(17, 0, 'Coming Home', 31, 'Going To Mombasa Soon', 1, NULL, NULL, '12.jpg', '0000-00-00 00:00:00'),
(18, 0, 'No image', 31, 'Testing ni image', 1, NULL, NULL, 'no_image.jpg', '0000-00-00 00:00:00'),
(19, 0, 'No image', 31, 'Testing no image', 1, NULL, NULL, 'NO_IMAGE1.jpg', '0000-00-00 00:00:00'),
(20, 0, 'Testing no image', 31, 'N0 image', 1, NULL, NULL, 'NO_IMAGE11.jpg', '0000-00-00 00:00:00'),
(21, 0, 'Testing', 31, 'testing', 1, NULL, NULL, 'No_image.png', '0000-00-00 00:00:00'),
(22, 0, 'Testing', 31, 'testing', 1, NULL, NULL, 'No_image1.png', '0000-00-00 00:00:00'),
(23, 0, 'Testing', 31, 'testing', 1, NULL, NULL, 'No_image2.png', '2012-05-09 18:00:53'),
(25, 0, 'Bomb in churc', 2, 'Bomb in a church', 30, NULL, NULL, 'images.jpg', '2012-05-10 12:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `county_id` int(11) NOT NULL,
  `image` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
