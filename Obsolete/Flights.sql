-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 02:04 AM
-- Server version: 5.0.96
-- PHP Version: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mtomlin`
--

-- --------------------------------------------------------

--
-- Table structure for table `Flights`
--

CREATE TABLE IF NOT EXISTS `Flights` (
  `F_Id` int(11) NOT NULL auto_increment,
  `From` varchar(255) NOT NULL,
  `Dest_count` varchar(255) NOT NULL,
  `Dest_city` varchar(255) NOT NULL,
  `Airline` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date_Out` date NOT NULL,
  `Date_Ret` date NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration` time NOT NULL,
  `Stops` int(11) NOT NULL,
  PRIMARY KEY  (`F_Id`),
  UNIQUE KEY `F_Id` (`F_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `Flights`
--

INSERT INTO `Flights` (`F_Id`, `From`, `Dest_count`, `Dest_city`, `Airline`, `Price`, `Date_Out`, `Date_Ret`, `Start_Time`, `Duration`, `Stops`) VALUES
(1, 'Southampton', 'Czech Republic', 'Prague', 'CSA, FlyBE', 359, '2015-02-26', '2015-03-05', '07:15:00', '08:30:00', 1),
(2, 'Southampton', 'Czech Republic', 'Prague', 'Air France, FlyBE', 359, '2015-02-26', '2015-03-05', '07:15:00', '11:35:00', 1),
(3, 'Southampton', 'Czech Republic', 'Prague', 'Air France, FlyBE', 585, '2015-02-26', '2015-03-05', '07:15:00', '06:45:00', 1),
(4, 'Southampton', 'China', 'Beijing', 'Air France, FlyBE', 699, '2015-02-26', '2015-03-05', '14:30:00', '17:55:00', 1),
(5, 'Southampton', 'China', 'Beijing', 'KLM, FlyBE, Air France', 918, '2015-02-26', '2015-03-05', '07:15:00', '18:40:00', 2),
(6, 'Southampton', 'China', 'Beijing', 'China Southern, FlyBE, KLM', 972, '2015-02-26', '2015-03-05', '17:55:00', '29:00:00', 1),
(7, 'Southampton', 'England', 'London', 'KLM Cityhopper, Eastern Airways', 450, '2015-02-26', '2015-03-05', '07:55:00', '05:55:00', 2),
(8, 'Southampton', 'England', 'London', 'FlyBE, KLM', 649, '2015-02-26', '2015-03-05', '17:55:00', '13:45:00', 1),
(9, 'Southampton', 'England', 'London', 'KLM, Cityjet, Eastern Airways', 455, '2015-02-26', '2015-03-05', '07:55:00', '05:35:00', 2),
(10, 'Southampton', 'Italy', 'Rome', 'Air France, FlyBE', 293, '2015-02-26', '2015-03-05', '07:15:00', '07:45:00', 1),
(11, 'Southampton', 'Italy', 'Rome', 'Alitalia, FlyBE', 374, '2015-02-26', '2015-03-05', '14:30:00', '06:35:00', 1),
(12, 'Southampton', 'Italy', 'Rome', 'Alitalia, FlyBE', 425, '2015-02-26', '2015-03-05', '07:15:00', '06:25:00', 1),
(13, 'Southampton', 'Turkey', 'Istanbul', 'Air France, FlyBE', 294, '2015-02-26', '2015-03-05', '07:15:00', '07:45:00', 1),
(14, 'Southampton', 'Turkey', 'Istanbul', 'Air France, FlyBE', 303, '2015-02-26', '2015-03-05', '18:05:00', '18:25:00', 1),
(15, 'Southampton', 'Turkey', 'Istanbul', 'KLM, Eastern Airways', 594, '2015-02-26', '2015-03-05', '07:55:00', '14:50:00', 3),
(16, 'Heathrow', 'Turkey', 'Istanbul', 'Air France', 175, '2015-02-26', '2015-03-05', '12:15:00', '09:15:00', 1),
(17, 'Heathrow', 'Turkey', 'Istanbul', 'Alitalia', 183, '2015-02-26', '2015-03-05', '06:45:00', '16:25:00', 1),
(18, 'Heathrow', 'Turkey', 'Istanbul', 'Alitalia', 183, '2015-02-27', '2015-03-02', '06:45:00', '16:25:00', 1),
(19, 'Heathrow', 'Turkey', 'Istanbul', 'British Airways', 187, '2015-02-27', '2015-03-02', '06:20:00', '03:50:00', 0),
(20, 'Heathrow', 'Italy', 'Rome', 'Swiss', 193, '2015-02-27', '2015-03-02', '08:50:00', '16:25:00', 1),
(21, 'Heathrow', 'Italy', 'Rome', 'Alitalia', 232, '2015-02-27', '2015-03-02', '06:45:00', '03:50:00', 0),
(22, 'Heathrow', 'Italy', 'Rome', 'Alitalia', 256, '2015-02-27', '2015-03-02', '20:00:00', '16:25:00', 0),
(23, 'Heathrow', 'Czech Republic', 'Prague', 'Swiss', 193, '2015-02-27', '2015-03-02', '18:40:00', '13:10:00', 1),
(24, 'Heathrow', 'Czech Republic', 'Prague', 'Lufthansa', 225, '2015-02-27', '2015-03-02', '11:05:00', '04:00:00', 1),
(25, 'Heathrow', 'Czech Republic', 'Prague', 'LOT', 240, '2015-02-27', '2015-03-02', '06:30:00', '04:40:00', 1),
(26, 'Heathrow', 'China', 'Beijing', 'Lufthansa', 690, '2015-02-27', '2015-03-02', '13:30:00', '12:00:00', 1),
(27, 'Heathrow', 'China', 'Beijing', 'Air China, SAS', 744, '2015-02-27', '2015-03-02', '13:50:00', '11:50:00', 1),
(28, 'Heathrow', 'China', 'Beijing', 'British Airways', 770, '2015-02-27', '2015-03-02', '11:05:00', '09:55:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
