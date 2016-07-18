-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2016 at 11:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artglom`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE IF NOT EXISTS `arts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  `meduim` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL,
  `price` bigint(50) NOT NULL,
  `rightp` bigint(50) NOT NULL,
  `leftp` bigint(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `postImg` varchar(200) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `follownum` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `star` varchar(10) NOT NULL,
  `Superstar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `admin`, `title`, `meduim`, `style`, `price`, `rightp`, `leftp`, `user_id`, `postImg`, `type`, `size`, `username`, `url`, `follownum`, `subject`, `postDate`, `star`, `Superstar`) VALUES
(21, 'checked', 'hgh`', 'Acrylic', 'Abstract', 5, 5, 5, 0, '2.jpg', '', 0, '', '', '', 'Acrylic', '2015-11-25 17:02:31', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE IF NOT EXISTS `blog_members` (
  `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$v5Be4p8tZ1Rn9pYedHgVyemYYUQ9pLs7oWHMxNSZbTQfisrIk0bB.', 'Ahmed@spellad.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
