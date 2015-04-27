-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 27 apr 2015 kl 12:31
-- Serverversion: 5.6.21
-- PHP-version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `rockfestival`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `anstalld`
--

CREATE TABLE IF NOT EXISTS `anstalld` (
`id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `personnummer` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `anstalld`
--

INSERT INTO `anstalld` (`id`, `namn`, `personnummer`) VALUES
(1, 'Sven Eriksson', '19830426-1234');

-- --------------------------------------------------------

--
-- Tabellstruktur `band`
--

CREATE TABLE IF NOT EXISTS `band` (
`id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `land` varchar(50) NOT NULL,
  `kontaktperson` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `bandmedlem`
--

CREATE TABLE IF NOT EXISTS `bandmedlem` (
`id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `fdatum` date NOT NULL,
  `band_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `namn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `genre`
--

INSERT INTO `genre` (`namn`) VALUES
('Blues'),
('Heavy metal'),
('Indierock'),
('Rock');

-- --------------------------------------------------------

--
-- Tabellstruktur `sakerhetsansvar`
--

CREATE TABLE IF NOT EXISTS `sakerhetsansvar` (
`id` int(11) NOT NULL,
  `anstalld_id` int(11) NOT NULL,
  `scen_id` int(11) NOT NULL,
  `starttid` datetime NOT NULL,
  `sluttid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `scen`
--

CREATE TABLE IF NOT EXISTS `scen` (
`id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `kapacitet` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `scen`
--

INSERT INTO `scen` (`id`, `namn`, `kapacitet`) VALUES
(1, 'Mallorcascenen', 1200),
(2, 'Dieseltältet', 150),
(3, 'Forumscenen', 400);

-- --------------------------------------------------------

--
-- Tabellstruktur `spelschema`
--

CREATE TABLE IF NOT EXISTS `spelschema` (
`id` int(11) NOT NULL,
  `band_id` int(11) NOT NULL,
  `scen_id` int(11) NOT NULL,
  `starttid` datetime NOT NULL,
  `sluttid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `anstalld`
--
ALTER TABLE `anstalld`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `personnummer` (`personnummer`);

--
-- Index för tabell `band`
--
ALTER TABLE `band`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `namn` (`namn`), ADD KEY `genre` (`genre`), ADD KEY `kontaktperson` (`kontaktperson`), ADD KEY `kontaktperson_2` (`kontaktperson`);

--
-- Index för tabell `bandmedlem`
--
ALTER TABLE `bandmedlem`
 ADD PRIMARY KEY (`id`), ADD KEY `band_id` (`band_id`);

--
-- Index för tabell `genre`
--
ALTER TABLE `genre`
 ADD PRIMARY KEY (`namn`);

--
-- Index för tabell `sakerhetsansvar`
--
ALTER TABLE `sakerhetsansvar`
 ADD PRIMARY KEY (`id`), ADD KEY `anstalld_id` (`anstalld_id`), ADD KEY `scen_id` (`scen_id`);

--
-- Index för tabell `scen`
--
ALTER TABLE `scen`
 ADD PRIMARY KEY (`id`);

--
-- Index för tabell `spelschema`
--
ALTER TABLE `spelschema`
 ADD PRIMARY KEY (`id`), ADD KEY `band_id` (`band_id`), ADD KEY `scen_id` (`scen_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anstalld`
--
ALTER TABLE `anstalld`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `band`
--
ALTER TABLE `band`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `bandmedlem`
--
ALTER TABLE `bandmedlem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `sakerhetsansvar`
--
ALTER TABLE `sakerhetsansvar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `scen`
--
ALTER TABLE `scen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `spelschema`
--
ALTER TABLE `spelschema`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `band`
--
ALTER TABLE `band`
ADD CONSTRAINT `band_kontakt` FOREIGN KEY (`kontaktperson`) REFERENCES `anstalld` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`namn`) ON UPDATE CASCADE;

--
-- Restriktioner för tabell `bandmedlem`
--
ALTER TABLE `bandmedlem`
ADD CONSTRAINT `bandmedlem_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `sakerhetsansvar`
--
ALTER TABLE `sakerhetsansvar`
ADD CONSTRAINT `sakerhet_anstalld` FOREIGN KEY (`anstalld_id`) REFERENCES `anstalld` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sakerhet_scen` FOREIGN KEY (`scen_id`) REFERENCES `scen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriktioner för tabell `spelschema`
--
ALTER TABLE `spelschema`
ADD CONSTRAINT `spelschema_band` FOREIGN KEY (`band_id`) REFERENCES `band` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `spelschema_scen` FOREIGN KEY (`scen_id`) REFERENCES `scen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
