-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 20 maj 2015 kl 14:39
-- Serverversion: 5.6.24
-- PHP-version: 5.6.8

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `anstalld`
--

INSERT INTO `anstalld` (`id`, `namn`, `personnummer`) VALUES
(1, 'Sven Eriksson', '19830426-1234'),
(2, 'Jimmy Lindström', '19790730-1234'),
(3, 'Andreas Indal', '19931222-1234'),
(4, 'Lisa Svensson', '19840227-2345');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `band`
--

INSERT INTO `band` (`id`, `namn`, `genre`, `land`, `kontaktperson`) VALUES
(1, 'Blomstermåla Rockers', 'Blues', 'Sverige', 1),
(2, 'Metallica', 'Thrash metal', 'USA', 3),
(3, 'Foo Fighters', 'Rock', 'USA', 2),
(4, 'Iron Maiden', 'Heavy metal', 'UK', 2),
(5, 'Young Guns', 'Alternativ', 'UK', 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `bandmedlem`
--

CREATE TABLE IF NOT EXISTS `bandmedlem` (
  `id` int(11) NOT NULL,
  `namn` varchar(50) NOT NULL,
  `fdatum` date NOT NULL,
  `band_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `bandmedlem`
--

INSERT INTO `bandmedlem` (`id`, `namn`, `fdatum`, `band_id`) VALUES
(1, 'Lars Ulrich', '1900-11-20', 2),
(2, 'James Hetfield', '1900-11-20', 2),
(3, 'Robert Trujillo', '1900-11-20', 2),
(4, 'Kirk Hammett', '1900-11-20', 2),
(5, 'Dave Grohl', '1900-11-20', 3),
(6, 'Taylor Hawkins', '1900-11-20', 3),
(7, 'Nate Mendel', '1900-11-20', 3),
(8, 'Chris Shiflett', '1900-11-20', 3),
(9, 'Patt Smear', '1900-11-20', 3),
(10, 'Björn Johansson', '1900-11-20', 1),
(11, 'Glenn Glenn', '1900-11-20', 1),
(12, 'Göran Andersson', '1900-11-20', 1),
(13, 'Berit Ljung', '1900-11-20', 1),
(14, 'Jonas Ljung', '1900-11-20', 1),
(15, 'Steve Harris', '1900-11-20', 4),
(16, 'Dave Murray', '1900-11-20', 4),
(17, 'Bruce Dickinson', '1900-11-20', 4),
(18, 'Adrian Smith', '1900-11-20', 4),
(19, 'Nicko McBrain', '1900-11-20', 4),
(20, 'Janick Gers', '1900-11-20', 4),
(21, 'Gustav Wood', '1900-01-01', 5),
(22, 'Fraser Taylor', '1900-01-01', 5),
(23, 'John Taylor', '1900-01-01', 5),
(24, 'Simon Mitchell', '1900-01-01', 5),
(25, 'Ben Joliffe', '1900-01-01', 5);

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
('Alternativ'),
('Blues'),
('Heavy metal'),
('Indierock'),
('Rock'),
('Thrash metal');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `sakerhetsansvar`
--

INSERT INTO `sakerhetsansvar` (`id`, `anstalld_id`, `scen_id`, `starttid`, `sluttid`) VALUES
(1, 1, 2, '2015-06-18 12:00:00', '2015-06-18 16:00:00'),
(2, 2, 2, '2015-06-18 08:00:00', '2015-06-18 12:00:00'),
(3, 3, 1, '2015-06-18 12:00:00', '2015-06-18 16:00:00'),
(4, 1, 1, '2015-06-18 16:00:00', '2015-06-18 20:00:00'),
(5, 4, 1, '2015-06-18 08:00:00', '2015-06-18 12:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `spelschema`
--

INSERT INTO `spelschema` (`id`, `band_id`, `scen_id`, `starttid`, `sluttid`) VALUES
(3, 1, 1, '2015-06-18 12:00:00', '2015-06-18 15:00:00'),
(5, 3, 1, '2015-06-18 09:00:00', '2015-06-18 12:00:00'),
(6, 2, 2, '2015-06-18 18:00:00', '2015-06-18 21:00:00'),
(7, 4, 1, '2015-06-19 18:00:00', '2015-06-19 21:00:00');

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
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `sakerhetsansvar_person_tid` (`anstalld_id`,`starttid`), ADD UNIQUE KEY `sakerhetsansvar_scen_tid` (`scen_id`,`starttid`), ADD KEY `anstalld_id` (`anstalld_id`), ADD KEY `scen_id` (`scen_id`);

--
-- Index för tabell `scen`
--
ALTER TABLE `scen`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `spelschema`
--
ALTER TABLE `spelschema`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `spelschema_scen_tid` (`scen_id`,`starttid`), ADD KEY `band_id` (`band_id`), ADD KEY `scen_id` (`scen_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `anstalld`
--
ALTER TABLE `anstalld`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `bandmedlem`
--
ALTER TABLE `bandmedlem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT för tabell `sakerhetsansvar`
--
ALTER TABLE `sakerhetsansvar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `scen`
--
ALTER TABLE `scen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `spelschema`
--
ALTER TABLE `spelschema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
