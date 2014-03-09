-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2014 at 01:10 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteka`
--
CREATE DATABASE IF NOT EXISTS `biblioteka` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `biblioteka`;

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE IF NOT EXISTS `knjige` (
  `ID` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `godina_izdanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tehnologija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `br_strana` int(11) NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `dostupnost` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`ID`, `naziv`, `autor`, `godina_izdanja`, `tehnologija`, `br_strana`, `opis`, `dostupnost`) VALUES
(101, 'Design Patterns in C# ', 'Jean Paul V.A ', '2011', ' C # ', 250, 'Jean Paul is a Microsoft MVP and Architect working on Microsoft Technologies for the past 12 years. He is passionate about SharePoint, ASP.NET and C#. In the academic side he do hold a BS in Computer Science & MBA.  ', 0),
(102, 'Codebright', 'Dayle Rees', '2012', 'PHP-Laravel', 370, 'Web application development using Laravel 4', 0),
(105, 'Javascript  ', 'Brendan Eich ', '2004', 'Javascript  ', 399, 'JavaScript (JS) is an interpreted computer programming language. As part of web browsers, implementations allow client-side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed. ', 0),
(106, 'Web Development Solutions', 'Christian Heilmann ', '2010', 'AJAX, Javascript', 124, 'As a web user, you''ll no doubt have noticed some of the breathtaking applications available in today''s modern web, such as Google Maps and Flickrdesktop applications than the old style web sites you are used to.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `knjiga_id` int(11) NOT NULL,
  `korisnik_id` int(11) unsigned NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `ocena` int(11) NOT NULL,
  `vreme` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `knjiga_id` (`knjiga_id`,`korisnik_id`),
  KEY `korisnik_id` (`korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `knjiga_id`, `korisnik_id`, `komentar`, `ocena`, `vreme`) VALUES
(46, 101, 1, 'super je knjiga.', 5, '2014-03-19 10:25:37'),
(47, 101, 2, 'dobra je knjiga', 4, '2014-03-19 08:22:23'),
(48, 101, 3, 'bas je dobra', 3, NULL),
(49, 101, 1, 'ddddddd', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Janko', 'Mionic', 'jankom@outlook.com', '$2y$10$Ei9t2NyfK6OT9FsgeMu32.pCuArh3na3nCT5JatqCmWRNkgRC5wf6', '2014-03-07 16:04:25', '2014-03-07 16:04:25'),
(2, 'Marko', 'Markovic', 'marko@dev.com', '$2y$10$/VG.ErcPhlkxHJMc3rDu4.Yj094Ol3ObibCg16s.sB5HMdocXSIW6', '2014-03-07 16:47:19', '2014-03-07 16:47:19'),
(3, 'Goran', 'Petrovic', 'goran@gmail.com', '$2y$10$Ql2zQeGbkAJd2hJVpYObJuoxrrcit7gAHdYsX6FyXt/H8s2N2cSE6', '2014-03-07 18:17:24', '2014-03-07 18:17:24'),
(4, 'Stefan', 'Petrovic', 'stefan@gmail.com', '$2y$10$OG7Zl2zJAIrGPUw43K4cc.d6akV90BdUo5WWD8oVUmG5YTljcVEha', '2014-03-08 22:05:28', '2014-03-08 22:05:28'),
(5, 'Tamara', 'Mitric', 'tamara@gmail.com', '$2y$10$YVhQ/LwVK.9t68Y37tA1Cu6qbmvzt1sRCmdaA2z0ZhuX0IqWIOKUO', '2014-03-08 23:42:37', '2014-03-08 23:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `zaduzenja`
--

CREATE TABLE IF NOT EXISTS `zaduzenja` (
  `zaduzenje_id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik_id` int(11) unsigned NOT NULL,
  `knjiga_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `datum_vracanja` date NOT NULL,
  PRIMARY KEY (`zaduzenje_id`),
  KEY `korisnik_id` (`korisnik_id`,`knjiga_id`),
  KEY `knjiga_id` (`knjiga_id`),
  KEY `korisnik_id_2` (`korisnik_id`,`knjiga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `zaduzenja`
--

INSERT INTO `zaduzenja` (`zaduzenje_id`, `korisnik_id`, `knjiga_id`, `datum`, `datum_vracanja`) VALUES
(15, 1, 101, '2014-03-04', '2014-03-25'),
(16, 2, 102, '2014-03-18', '2014-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `zeljene_knjige`
--

CREATE TABLE IF NOT EXISTS `zeljene_knjige` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_knjige` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tehnologija` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik_id` (`korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`knjiga_id`) REFERENCES `knjige` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk5` FOREIGN KEY (`korisnik_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zaduzenja`
--
ALTER TABLE `zaduzenja`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`korisnik_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`knjiga_id`) REFERENCES `knjige` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
