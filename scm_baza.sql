-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 24, 2020 at 08:33 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scm`
--

-- --------------------------------------------------------

--
-- Table structure for table `domovi`
--

DROP TABLE IF EXISTS `domovi`;
CREATE TABLE IF NOT EXISTS `domovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_doma` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domovi`
--

INSERT INTO `domovi` (`id`, `naziv_doma`) VALUES
(1, 'Stari dom'),
(2, 'Novi dom');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_croatian_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `type`, `email`, `password`, `name`) VALUES
(1, 1, 'test@test.com', 'test12345', 'Super Admin'),
(2, 2, 'amanda.sucic@scm.ba', 'amanda123', 'Amanda Sučić');

-- --------------------------------------------------------

--
-- Table structure for table `menza`
--

DROP TABLE IF EXISTS `menza`;
CREATE TABLE IF NOT EXISTS `menza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `predjelo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `glavno_jelo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desert` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menza`
--

INSERT INTO `menza` (`id`, `datum`, `predjelo`, `glavno_jelo`, `desert`) VALUES
(5, '2020-05-23', 'Juha od gljiva', 'Lasagne', 'Kolač od višnje'),
(4, '2020-05-22', 'Juha od rajčice', 'Pileća šnicla', 'Tiramisu');

-- --------------------------------------------------------

--
-- Table structure for table `obavijesti`
--

DROP TABLE IF EXISTS `obavijesti`;
CREATE TABLE IF NOT EXISTS `obavijesti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `naslov` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obavijesti`
--

INSERT INTO `obavijesti` (`id`, `datum`, `naslov`, `tekst`) VALUES
(1, '2020-05-20', 'Uplata stanarine', 'Poštovani studenti,\r\n\r\nObaviještavamo Vas da za nastavak korištenja doma morate podmiriti\r\nstanarinu za naredni mjesec. S obzirom da je mjesec veljača kraći od\r\ndrugih mjeseci i stanarina za ovaj mjesec će iznositi nešto manje nego inače.\r\nStanarina iznosi 155 KM, a uplatu na račun doma možete izvršiti u razdoblju od\r\n31.1-5.2.2020 godine.\r\n\r\nLijep pozdrav!\r\nUprava doma');

-- --------------------------------------------------------

--
-- Table structure for table `problemi`
--

DROP TABLE IF EXISTS `problemi`;
CREATE TABLE IF NOT EXISTS `problemi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sobe` int(11) NOT NULL,
  `id_doma` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `problem` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_rijesen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problemi`
--

INSERT INTO `problemi` (`id`, `id_sobe`, `id_doma`, `id_korisnika`, `problem`, `problem_rijesen`) VALUES
(1, 3, 1, 1, 'Brava na vratim ne funkcionira. ', 1),
(2, 3, 1, 1, 'Razbijen prozor!', 0),
(3, 3, 1, 1, 'Internet ne radi', 0),
(4, 3, 1, 1, 'Pukla cijev u kupaonici.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

DROP TABLE IF EXISTS `rezervacije`;
CREATE TABLE IF NOT EXISTS `rezervacije` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_korisnika` int(11) NOT NULL,
  `id_sobe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `id_korisnika`, `id_sobe`) VALUES
(7, 4, 3),
(11, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sobe`
--

DROP TABLE IF EXISTS `sobe`;
CREATE TABLE IF NOT EXISTS `sobe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broj_sobe` int(11) NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `id_doma` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sobe`
--

INSERT INTO `sobe` (`id`, `broj_sobe`, `kapacitet`, `id_doma`) VALUES
(1, 100, 3, 1),
(2, 100, 4, 2),
(3, 101, 3, 1),
(4, 101, 2, 2),
(5, 102, 4, 1),
(6, 103, 2, 1),
(7, 102, 3, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
