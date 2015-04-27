-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2015 at 11:48 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rockfestival`
--

-- --------------------------------------------------------

--
-- Table structure for table `anstalld`
--

CREATE TABLE IF NOT EXISTS `anstalld` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(50) NOT NULL,
  `personnummer` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE IF NOT EXISTS `band` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `land` varchar(50) NOT NULL,
  `kontaktperson` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `namn` (`namn`),
  KEY `genre` (`genre`),
  KEY `kontaktperson` (`kontaktperson`),
  KEY `kontaktperson_2` (`kontaktperson`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `bandmedlem`
--

CREATE TABLE IF NOT EXISTS `bandmedlem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(50) NOT NULL,
  `fdatum` date NOT NULL,
  `band_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `band_id` (`band_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `namn` varchar(50) NOT NULL,
  PRIMARY KEY (`namn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`namn`) VALUES
('Blues'),
('Heavy metal'),
('Indierock'),
('Rock');

-- --------------------------------------------------------

--
-- Table structure for table `sakerhetsansvar`
--

CREATE TABLE IF NOT EXISTS `sakerhetsansvar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anstalld_id` int(11) NOT NULL,
  `scen_id` int(11) NOT NULL,
  `starttid` datetime NOT NULL,
  `sluttid` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `anstalld_id` (`anstalld_id`),
  KEY `scen_id` (`scen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scen`
--

CREATE TABLE IF NOT EXISTS `scen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namn` varchar(50) NOT NULL,
  `kapacitet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `scen`
--

INSERT INTO `scen` (`id`, `namn`, `kapacitet`) VALUES
(1, 'Mallorcascenen', 1200),
(2, 'Dieseltältet', 150),
(3, 'Forumscenen', 400);

-- --------------------------------------------------------

--
-- Table structure for table `spelschema`
--

CREATE TABLE IF NOT EXISTS `spelschema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `band_id` int(11) NOT NULL,
  `scen_id` int(11) NOT NULL,
  `starttid` datetime NOT NULL,
  `sluttid` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `band_id` (`band_id`),
  KEY `scen_id` (`scen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `band`
--
ALTER TABLE `band`
  ADD CONSTRAINT `band_kontakt` FOREIGN KEY (`kontaktperson`) REFERENCES `anstalld` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`namn`) ON UPDATE CASCADE;

--
-- Constraints for table `bandmedlem`
--
ALTER TABLE `bandmedlem`
  ADD CONSTRAINT `bandmedlem_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sakerhetsansvar`
--
ALTER TABLE `sakerhetsansvar`
  ADD CONSTRAINT `sakerhet_scen` FOREIGN KEY (`scen_id`) REFERENCES `scen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sakerhet_anstalld` FOREIGN KEY (`anstalld_id`) REFERENCES `anstalld` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spelschema`
--
ALTER TABLE `spelschema`
  ADD CONSTRAINT `spelschema_scen` FOREIGN KEY (`scen_id`) REFERENCES `scen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spelschema_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;