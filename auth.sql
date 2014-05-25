-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2014 at 05:50 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentbody` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `commentbody`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'this post is commented', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 5, '2nd comment', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 5, 'hello', '2014-05-23 20:46:21', '2014-05-23 20:46:21'),
(4, 10, 5, 'see coment in table', '2014-05-23 22:02:11', '2014-05-23 22:02:11'),
(5, 1, 5, 'ddfdjh dfhjhdf jdfjhgjf gjfg ', '2014-05-23 22:03:25', '2014-05-23 22:03:25'),
(6, 1, 5, 'hellooooo\r\n', '2014-05-23 22:05:27', '2014-05-23 22:05:27'),
(7, 1, 5, 'another comment', '2014-05-23 22:20:10', '2014-05-23 22:20:10'),
(8, 1, 5, 'hdfccchgdhgcd', '2014-05-23 22:20:25', '2014-05-23 22:20:25'),
(9, 1, 5, 'another commentsssss', '2014-05-23 22:36:11', '2014-05-23 22:36:11'),
(10, 1, 5, 'ashjahsjhashahs  sds dsdhsjhdjshjhsj dsdjshjhsjds', '2014-05-23 22:44:30', '2014-05-23 22:44:30'),
(11, 1, 5, 'hghghghg', '2014-05-24 12:11:56', '2014-05-24 12:11:56'),
(12, 1, 5, 'jsdhsjdhsjjdhsj', '2014-05-25 10:31:20', '2014-05-25 10:31:20'),
(13, 1, 5, 'mdhdsjdf', '2014-05-25 12:24:37', '2014-05-25 12:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 5, 'My First Post', 'Hello, this is my first post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 5, 'hello', 'another post', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, 'Check If Sending Post Work', 'I think this will work here i am sending my first post. welcome u r near to finish.', '2014-05-23 13:52:26', '2014-05-23 13:52:26'),
(5, 5, 'My Second Post', 'Check If it update the user_id field in table post', '2014-05-23 13:58:33', '2014-05-23 13:58:33'),
(6, 5, 'My Third Post', 'check user_id in post table', '2014-05-23 14:01:56', '2014-05-23 14:01:56'),
(7, 5, 'jdsjdsdjh', 'sjhdjshds sjhsh jhdsjfh dhfjd h', '2014-05-23 14:16:30', '2014-05-23 14:16:30'),
(8, 5, 'an action', 'ugu hu h  jhj hjhjjh', '2014-05-23 18:19:53', '2014-05-23 18:19:53'),
(9, 5, 'asdfgh', 'shjhsjjhsjhsh', '2014-05-23 21:21:50', '2014-05-23 21:21:50'),
(10, 5, 'Check if Working', 'dsjfhsdj djshfjh dfhdjhf dfhdfjh dfhjhdfjhgdfkj hgjdfh jhdf jhjdfhjdhf gjhdfjghjdf hg jdfhjhdfgjhdfj gh jdfhg jdfhjdfh jhdfgj h', '2014-05-23 22:01:55', '2014-05-23 22:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_temp` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `password_temp`, `code`, `active`, `created_at`, `updated_at`, `remember_token`) VALUES
(5, 'mayankkumariiitm@gmail.com', 'mayankiiitm', '$2y$10$8qF3DS6Mwlo93DVEkObNRO/CDC5cmIG1xHFPmZJr.yPS8CZkl9M8W', '', '', 1, '2014-05-21 21:48:16', '2014-05-25 15:50:11', 'T81RdkWo64MJsnZ4np5k0V6neuuAlLgS8mqSM5YT6dUtiE5phi9gI9PMprXM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
