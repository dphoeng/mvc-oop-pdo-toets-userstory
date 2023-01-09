-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2023 at 11:36 AM
-- Server version: 5.7.31
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auto`
--

DROP TABLE IF EXISTS `Auto`;
CREATE TABLE IF NOT EXISTS `Auto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(8) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `InstructeurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `AutoInstructeur` (`InstructeurId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Auto`
--

INSERT INTO `Auto` (`Id`, `Kenteken`, `Type`, `InstructeurId`) VALUES
(1, 'AU-67-IO', 'Golf', 3),
(2, 'TH-78-KL', 'Ferrari', 2),
(3, '90-KL-TR', 'Fiat 500', 4),
(4, 'YY-OP-78', 'Mercedes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `CapitalCity` varchar(100) NOT NULL,
  `Continent` enum('Noord-Amerika','Zuid-Amerika','Afrika','Oceani&euml;','Europa','Azi&euml;','Antartica') NOT NULL,
  `Population` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `Name`, `CapitalCity`, `Continent`, `Population`) VALUES
(5, 'The Netherlands', 'Amsterdam', 'Europa', 18000000),
(6, 'Japan', 'Tokyo', 'Azi&euml;', 200000000),
(7, 'Curryland', 'Ketchup', 'Europa', 101);

-- --------------------------------------------------------

--
-- Table structure for table `Instructeur`
--

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructeur`
--

INSERT INTO `Instructeur` (`Id`, `Email`, `Naam`) VALUES
(1, 'groen@mail.nl', 'Groen'),
(2, 'manhoi@google.com', 'Manhoi'),
(3, 'zoyi@google.sp', 'Zoyi'),
(4, 'berthold@gmail.com', 'Berthold'),
(5, 'denekamp@gmail.com', 'Denekamp');

-- --------------------------------------------------------

--
-- Table structure for table `Kilometerstand`
--

DROP TABLE IF EXISTS `Kilometerstand`;
CREATE TABLE IF NOT EXISTS `Kilometerstand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AutoId` int(11) DEFAULT NULL,
  `Datum` date NOT NULL,
  `KmStand` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `KilometerstandAuto` (`AutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Kilometerstand`
--

INSERT INTO `Kilometerstand` (`Id`, `AutoId`, `Datum`, `KmStand`) VALUES
(1, 4, '2022-12-05', 70788),
(2, 2, '2022-12-05', 12670),
(3, 1, '2022-12-06', 60345),
(4, 3, '2022-12-07', 21300),
(5, 1, '2022-12-07', 60900),
(6, 1, '2022-12-12', 414141),
(7, 1, '2022-12-12', 414),
(8, 1, '2022-12-12', 414),
(9, 1, '2022-12-12', 34223552),
(10, 2, '2022-12-12', 123455),
(11, 4, '2022-12-12', 686869);

-- --------------------------------------------------------

--
-- Table structure for table `Leerling`
--

DROP TABLE IF EXISTS `Leerling`;
CREATE TABLE IF NOT EXISTS `Leerling` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Leerling`
--

INSERT INTO `Leerling` (`Id`, `Naam`) VALUES
(3, 'Konijn'),
(4, 'Slavink'),
(6, 'Otto');

-- --------------------------------------------------------

--
-- Table structure for table `Les`
--

DROP TABLE IF EXISTS `Les`;
CREATE TABLE IF NOT EXISTS `Les` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` datetime NOT NULL,
  `LeerlingId` int(11) DEFAULT NULL,
  `InstructeurId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `LesInstructeur` (`InstructeurId`),
  KEY `LesLeerling` (`LeerlingId`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Les`
--

INSERT INTO `Les` (`Id`, `Datum`, `LeerlingId`, `InstructeurId`) VALUES
(45, '2022-05-20 00:00:00', 3, 1),
(46, '2022-05-20 00:00:00', 6, 3),
(47, '2022-05-21 00:00:00', 4, 2),
(48, '2022-05-21 00:00:00', 6, 3),
(49, '2022-05-22 00:00:00', 3, 1),
(50, '2022-05-28 00:00:00', 4, 2),
(51, '2022-06-01 00:00:00', 3, 2),
(52, '2022-06-12 00:00:00', 3, 1),
(53, '2022-06-22 00:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Mankement`
--

DROP TABLE IF EXISTS `Mankement`;
CREATE TABLE IF NOT EXISTS `Mankement` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AutoId` int(11) DEFAULT NULL,
  `Datum` date NOT NULL,
  `Mankement` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `MankementAuto` (`AutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Mankement`
--

INSERT INTO `Mankement` (`Id`, `AutoId`, `Datum`, `Mankement`) VALUES
(1, 4, '2023-01-04', 'Profiel rechterbandminderdan 2 mm'),
(2, 2, '2023-01-02', 'Rechter achterlicht kapot'),
(3, 1, '2023-01-02', 'Spiegellinks afgebroken'),
(4, 2, '2023-01-06', 'Bumper rechtsachter ingedeukt'),
(5, 2, '2023-01-08', 'Radio kapot'),
(19, 2, '2023-01-09', 'Auto is kaduk!'),
(20, 2, '2023-01-09', '1234512345');

-- --------------------------------------------------------

--
-- Table structure for table `Onderwerp`
--

DROP TABLE IF EXISTS `Onderwerp`;
CREATE TABLE IF NOT EXISTS `Onderwerp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LesId` int(11) DEFAULT NULL,
  `Onderwerp` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `OnderwerpLes` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2371 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Onderwerp`
--

INSERT INTO `Onderwerp` (`Id`, `LesId`, `Onderwerp`) VALUES
(2343, 45, 'File parkeren'),
(2344, 46, 'Achteruit rijden'),
(2345, 49, 'File parkeren'),
(2346, 49, 'Invoegen snelweg'),
(2347, 50, 'Achteruit rijden'),
(2348, 52, 'Achteruit rijden'),
(2349, 52, 'Invoegen snelweg'),
(2350, 52, 'File parkeren'),
(2351, 45, 'Curry'),
(2352, 49, 'Harry Potter'),
(2353, 45, 'Po'),
(2354, 45, 'pops'),
(2355, 45, 'my boi'),
(2356, 45, 'Curry'),
(2357, 45, 'aaa'),
(2358, 45, 'Curry'),
(2359, 45, 'Pooo'),
(2360, 45, 'pops'),
(2361, 45, 'ioqw'),
(2362, 51, 'Curry'),
(2363, 45, 'Curry'),
(2364, 45, 'Curry'),
(2365, 45, ''),
(2366, 45, ' '),
(2367, 45, 'da'),
(2368, 45, 'sss'),
(2369, 45, 'qweq'),
(2370, 45, 'dasfw');

-- --------------------------------------------------------

--
-- Table structure for table `Opmerking`
--

DROP TABLE IF EXISTS `Opmerking`;
CREATE TABLE IF NOT EXISTS `Opmerking` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `LesId` int(11) DEFAULT NULL,
  `Opmerking` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `OpmerkingLes` (`LesId`)
) ENGINE=InnoDB AUTO_INCREMENT=1131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Opmerking`
--

INSERT INTO `Opmerking` (`Id`, `LesId`, `Opmerking`) VALUES
(1123, 45, 'File parkeren kan beter'),
(1124, 46, 'Beter in spiegel kijken'),
(1125, 49, 'Opletten op aankomend verkeer'),
(1126, 49, 'Langer doorrijden bij invoegen'),
(1127, 50, 'Langzaam aan'),
(1128, 52, 'Beter in spiegels kijken'),
(1129, 52, 'Richtingaanwijzer aan'),
(1130, 45, 'Curry says');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Auto`
--
ALTER TABLE `Auto`
  ADD CONSTRAINT `AutoInstructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Kilometerstand`
--
ALTER TABLE `Kilometerstand`
  ADD CONSTRAINT `KilometerstandAuto` FOREIGN KEY (`AutoId`) REFERENCES `Auto` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Les`
--
ALTER TABLE `Les`
  ADD CONSTRAINT `LesInstructeur` FOREIGN KEY (`InstructeurId`) REFERENCES `Instructeur` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `LesLeerling` FOREIGN KEY (`LeerlingId`) REFERENCES `Leerling` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Mankement`
--
ALTER TABLE `Mankement`
  ADD CONSTRAINT `MankementAuto` FOREIGN KEY (`AutoId`) REFERENCES `Auto` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Onderwerp`
--
ALTER TABLE `Onderwerp`
  ADD CONSTRAINT `OnderwerpLes` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Opmerking`
--
ALTER TABLE `Opmerking`
  ADD CONSTRAINT `OpmerkingLes` FOREIGN KEY (`LesId`) REFERENCES `Les` (`Id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
