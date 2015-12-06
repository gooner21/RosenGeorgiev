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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Схема на данните от таблица `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `image`, `postMessage`, `date`, `views`) VALUES
(55, 'zzz', 'dadaa', '11928_499561813431902_339174570_n1.jpg', 'dadaaaa', '2015-11-30 20:05:00', 83),
(57, 'dadad', 'asdasa', 'Arsenal+Salary+list+2014.jpg', 'asdasdasasdd', '2015-11-30 20:17:07', 0),
(58, 'dfgdg', 'dfgdfgdfg', 'Arsenal-Training.jpg', 'adfgdfgsdasdasasdd', '2015-11-30 20:17:26', 0),
(59, 'qweqe', 'qweq', 'Arsenal+Salary+list+20141.jpg', 'qwe', '2015-11-30 20:17:49', 1),
(61, 'asdad', 'asd', 'Arsenal-Training1.jpg', 'hgfsdasahgf', '2015-11-30 20:18:22', 1),
(62, 'asd', 'asd', '11928_499561813431902_339174570_n2.jpg', 'ADSA', '2015-11-30 20:20:43', 0),
(63, 'ad11', 'da11', '11928_499561813431902_339174570_n3.jpg', 'dadada11', '2015-11-30 20:42:50', 4),
(64, 'ssss1', 'ssssss1', 'E-tron_(Audi)_at_IAA_-_front.JPG', 'ssadasd', '2015-12-02 21:16:33', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
(11, 'dada', 'dada@abv.bg', 'dadada'),
(12, 'a', 'a@abv.bg', 'aaaaa'),
(13, 'dads', 'penco21@abv.bg', 'dasdasd'),
(14, 'da', 'deadzonem@abv.bg', 'asdasd'),
(15, 'dad', 'deadzonem@abv.bg', 'asdasd'),
(16, 'asd', 'deadzonem@abv.bg', 'dasdasd'),
(17, 'asd', 'deadzonem@abv.bg', 'dasdasd');

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
-- Структура на таблица `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `comments` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `comment`
--

INSERT INTO `comment` (`id`, `name`, `comments`) VALUES
(1, 'asd', 'asd'),
(2, 'asd', 'asd'),
(3, 'asd', 'asd'),
(4, 'asdasd', 'asdasd'),
(5, 'aaa', 'aaa');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'deadzonem', 'deadzonem@abv.bg', '$2y$10$HIMhDjO.YnnrAx6GkuvbGu7l6g1rdRbuptlNvrA7/cfq01soQdNtq', 'default.jpg', '2015-11-26 19:26:36', NULL, 1, 0, 0),
(2, 'dada', 'dada@abv.bg', '$2y$10$mv/vRINJzpA5Bq8YtXQoF.7Gt0owVs0zuGHTyx0nYL3E3lKfO19ii', 'default.jpg', '2015-11-30 20:04:17', NULL, 0, 0, 0),
(3, 'sasa', 'sad@asd.com', '$2y$10$Ur7ZSJG9e6En2741pWSzl.nv0FR7wbK0jZ9fSwXghnCkIRTO7ukVO', 'default.jpg', '2015-11-30 20:43:34', NULL, 0, 0, 0),
(4, 'asdad', 'zdasd@zxczf.bg', '$2y$10$VNqHHsg5cOGswULMXvE2peW.pTNweVIx1JHMuffzBFIg06QYRJVNe', 'default.jpg', '2015-12-02 21:08:33', NULL, 0, 0, 0),
(5, 'zazaza', 'zaza@abv.bg', '$2y$10$kyHS3Oc4KJCEdHQ5NbQ0UeShNc..bSSu13DIPWBFbj/TGZR2jMTr6', 'default.jpg', '2015-12-02 21:09:07', NULL, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
