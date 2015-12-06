-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci`
--

-- --------------------------------------------------------

--
-- Структура на таблица `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `postMessage` text NOT NULL,
  `date` datetime NOT NULL,
  `views` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Схема на данните от таблица `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `image`, `postMessage`, `date`, `views`) VALUES
(55, 'dadaa', 'dadaa', '11928_499561813431902_339174570_n1.jpg', 'dadaaaa', '2015-11-30 20:05:00', 0),
(57, 'dadad', 'asdasa', 'Arsenal+Salary+list+2014.jpg', 'asdasdasasdd', '2015-11-30 20:17:07', 0),
(58, 'dfgdg', 'dfgdfgdfg', 'Arsenal-Training.jpg', 'adfgdfgsdasdasasdd', '2015-11-30 20:17:26', 0),
(59, 'qweqe', 'qweq', 'Arsenal+Salary+list+20141.jpg', 'qwe', '2015-11-30 20:17:49', 0),
(61, 'asdad', 'asd', 'Arsenal-Training1.jpg', 'hgfsdasahgf', '2015-11-30 20:18:22', 1),
(62, 'asd', 'asd', '11928_499561813431902_339174570_n2.jpg', 'ADSA', '2015-11-30 20:20:43', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `ci`
--

CREATE TABLE IF NOT EXISTS `ci` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Схема на данните от таблица `ci`
--

INSERT INTO `ci` (`id`, `fullName`, `email`, `message`) VALUES
(3, 'Rosen', 'dada@abv.bg', 'proba'),
(4, 'Rosen', 'dada@abv.bg', 'proba'),
(5, 'asdasd', 'asdas@asdasd.com', 'asdasdasd'),
(6, 'dsdf', 'sad@asd.com', 'asdasd'),
(7, 'sdfsdf', 'asdad@abv.bg', 'asdasd'),
(8, 'asd', 'deadzonem@abv.bg', 'asdasd'),
(9, 'asdas', 'asdasd@abv.bg', 'asd'),
(10, 'Rosen', 'deadzonem4@abv.bg', 'prob4'),
(11, 'dada', 'dada@abv.bg', 'dadada');

-- --------------------------------------------------------

--
-- Структура на таблица `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'deadzonem', 'deadzonem@abv.bg', '$2y$10$HIMhDjO.YnnrAx6GkuvbGu7l6g1rdRbuptlNvrA7/cfq01soQdNtq', 'default.jpg', '2015-11-26 19:26:36', NULL, 0, 0, 0),
(2, 'dada', 'dada@abv.bg', '$2y$10$mv/vRINJzpA5Bq8YtXQoF.7Gt0owVs0zuGHTyx0nYL3E3lKfO19ii', 'default.jpg', '2015-11-30 20:04:17', NULL, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
