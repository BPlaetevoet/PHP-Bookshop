-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2014 at 04:32 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `boek`
--

CREATE TABLE IF NOT EXISTS `boek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_id` int(11) DEFAULT NULL,
  `titel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prijs` double NOT NULL,
  `auteur` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9138E4854296D31F` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `boek`
--

INSERT INTO `boek` (`id`, `genre_id`, `titel`, `prijs`, `auteur`) VALUES
(1, 3, 'Koning van Katoren', 17.95, 'D. Deschrijver'),
(2, 3, 'Fatasia 4', 24.95, 'Stillton');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filmgenre_id` int(11) DEFAULT NULL,
  `titel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prijs` double NOT NULL,
  `speelduur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2276111CD6602941` (`filmgenre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `filmgenre_id`, `titel`, `prijs`, `speelduur`) VALUES
(1, 1, 'Bourne Identity, The', 17.5, 100),
(2, 1, 'Bourne Supremacy, The', 17.5, 100),
(3, 2, 'Dodgeball', 12, 90),
(4, 5, 'Star Wars Episode 1', 20, 105),
(5, 6, 'Titanic', 14.5, 110),
(6, 1, 'Bourne Ultimatum, The', 17.5, 100),
(7, 2, 'Meet the fockers', 15, 95);

-- --------------------------------------------------------

--
-- Table structure for table `filmgenre`
--

CREATE TABLE IF NOT EXISTS `filmgenre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `filmgenre`
--

INSERT INTO `filmgenre` (`id`, `omschrijving`) VALUES
(1, 'actie'),
(2, 'komedie'),
(3, 'thriller'),
(4, 'drama'),
(5, 'science fiction'),
(6, 'romantiek');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `omschrijving` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `omschrijving`) VALUES
(1, 'Roman'),
(2, 'Wetenschappelijk'),
(3, 'Jeugd'),
(4, 'Misdaad'),
(5, 'Studie boeken'),
(6, 'Kinderboeken'),
(7, 'Vrije tijd');

-- --------------------------------------------------------

--
-- Table structure for table `plaats`
--

CREATE TABLE IF NOT EXISTS `plaats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(11) NOT NULL,
  `gemeente` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plaats_id` int(11) DEFAULT NULL,
  `naam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(52) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2DA17977935FAC7E` (`plaats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boek`
--
ALTER TABLE `boek`
  ADD CONSTRAINT `FK_9138E4854296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_2276111CD6602941` FOREIGN KEY (`filmgenre_id`) REFERENCES `filmgenre` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_2DA17977935FAC7E` FOREIGN KEY (`plaats_id`) REFERENCES `plaats` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
