-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2019 at 01:29 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aviatrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts`
--

CREATE TABLE `aircrafts` (
  `aircraft_id` int(11) NOT NULL,
  `aircraft_reg` varchar(20) NOT NULL,
  `series` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_date` date DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `engines` int(11) NOT NULL,
  `engine_type_id` int(50) NOT NULL,
  `propellers` int(11) NOT NULL,
  `cum_hours` double NOT NULL,
  `cum_cycles` int(11) NOT NULL,
  `nextCofA` date NOT NULL,
  `posted_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aircrafts`
--

INSERT INTO `aircrafts` (`aircraft_id`, `aircraft_reg`, `series`, `serial_number`, `manufacturer_id`, `manufacturer_date`, `model_id`, `engines`, `engine_type_id`, `propellers`, `cum_hours`, `cum_cycles`, `nextCofA`, `posted_by`) VALUES
(1, '5Y-BXB', '100', '213', 3, '2019-01-01', 1, 2, 1, 2, 30007.98, 25007, '2019-02-15', 1),
(2, '5Y-BXC', '100', '7184', 1, '2019-01-01', 3, 2, 1, 0, 35600.5, 26500, '2018-10-18', 1),
(3, '5Y-CGF', '200', '7373', 1, '2019-01-01', 4, 2, 1, 0, 32500.03, 27600, '2018-09-25', 1),
(4, '5Y-CGH', '315', '525', 3, '2019-01-01', 2, 2, 1, 2, 28050.45, 23005, '2019-03-28', 1),
(18, '5Y-CGL', '200', '523', 3, '2019-01-01', 1, 2, 1, 0, 72700.69, 39000, '2019-01-01', 1),
(20, '5Y-NON', 'C208', '0036', 2, '1985-01-01', 5, 2, 2, 0, 22464.23, 30929, '2019-01-01', 1),
(21, '5Y-BUZ', '100', '723', 3, '2019-01-01', 1, 2, 2, 0, 56500.55, 55495, '2019-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_models`
--

CREATE TABLE `aircraft_models` (
  `model_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `make` varchar(25) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `engines` int(11) NOT NULL,
  `craft_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aircraft_models`
--

INSERT INTO `aircraft_models` (`model_id`, `model`, `make`, `manufacturer`, `engines`, `craft_type`) VALUES
(1, 'DHC 8-102', 'Dash 8', 'Bombadier', 2, 'Fixed Wing'),
(2, 'DHC 8-315', 'Dash 8', 'Bombadier', 2, 'Fixed Wing'),
(3, 'CRJ - 100', 'CRJ', 'Bombadier', 2, 'Fixed Wing'),
(4, 'CRJ - 200', 'CRJ', 'Bombadier', 2, 'Fixed Wing'),
(5, 'C208', 'Caravan', 'Cessna', 1, 'Fixed Wing'),
(6, 'C208B', 'Caravan', 'Cessna', 1, 'Fixed Wing');

-- --------------------------------------------------------

--
-- Table structure for table `ata_chapters`
--

CREATE TABLE `ata_chapters` (
  `ata_chapter_id` int(11) NOT NULL,
  `ata_chapter` varchar(25) NOT NULL,
  `ata_name` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ata_chapters`
--

INSERT INTO `ata_chapters` (`ata_chapter_id`, `ata_chapter`, `ata_name`, `category`) VALUES
(1, '00', 'General', 'Aircraft General'),
(2, '01', 'Maintenance Policy', 'Aircraft General'),
(3, '02', 'Operations', 'Aircraft General'),
(4, '03', 'Support', 'Aircraft General'),
(5, '04', 'Airwothiness Limitations', 'Aircraft General'),
(6, '05', 'Time Limits/Maintenance Checks', 'Aircraft General'),
(7, '06', 'Dimensions and Areas', 'Aircraft General'),
(8, '07', 'Lifting and Shoring', 'Aircraft General'),
(9, '08', 'Levelling and Weighing', 'Aircraft General'),
(10, '09', 'Towing and Taxing', 'Aircraft General'),
(11, '10', 'Parking, Mooring, Storage and return to Service', 'Aircraft General'),
(12, '11', 'Placards and Markings', 'Aircraft General'),
(13, '12', 'Servicing', 'Aircraft General'),
(14, '14', 'Hardware and General Tools', 'Aircraft General'),
(15, '18', 'Variations and Nose Analysis(Helicopter only)', 'Aircraft General'),
(16, '32', 'Landing Gear', 'Airframe Systems');

-- --------------------------------------------------------

--
-- Table structure for table `comp_cat`
--

CREATE TABLE `comp_cat` (
  `comp_cat_id` int(11) NOT NULL,
  `comp_cat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp_cat`
--

INSERT INTO `comp_cat` (`comp_cat_id`, `comp_cat`) VALUES
(1, 'Airframe'),
(2, 'Engine 1'),
(3, 'Engine 2'),
(4, 'Propeller 1'),
(5, 'Propeller 2');

-- --------------------------------------------------------

--
-- Table structure for table `engines`
--

CREATE TABLE `engines` (
  `engine_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `engine_cycles` int(11) NOT NULL,
  `engine_hours` float NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engines`
--

INSERT INTO `engines` (`engine_id`, `aircraft_id`, `number`, `model`, `serial_number`, `engine_cycles`, `engine_hours`, `update_date`, `posted_by`) VALUES
(18, 18, 1, 'CF34', '6789098', 28750, 29800, '2019-01-18 12:19:54', 1),
(19, 18, 2, 'CF34B', '6789098', 28750, 29800, '2019-01-18 12:19:54', 1),
(22, 20, 1, 'PT6A-114A', 'PCE PC0657', 143364, 12245.2, '2019-01-18 13:03:39', 1),
(23, 21, 1, 'PW121', '1209788', 38120, 38650.7, '2019-01-26 00:57:08', 1),
(24, 21, 2, 'PW121', '170345', 35440, 35560.7, '2019-01-26 00:57:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `engineTypes`
--

CREATE TABLE `engineTypes` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineTypes`
--

INSERT INTO `engineTypes` (`id`, `type`) VALUES
(1, 'Turbo Fan'),
(2, 'Turbo Prop'),
(3, 'Rotor Craft');

-- --------------------------------------------------------

--
-- Table structure for table `engine_models`
--

CREATE TABLE `engine_models` (
  `engine_model_id` int(11) NOT NULL,
  `engine_model` varchar(25) NOT NULL,
  `manufacturer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `techlog` varchar(25) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `origin` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `takeoff` datetime NOT NULL,
  `landing` datetime NOT NULL,
  `hours` float NOT NULL,
  `cycles` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `techlog`, `aircraft_id`, `origin`, `destination`, `takeoff`, `landing`, `hours`, `cycles`, `date_posted`, `posted_by`) VALUES
(2, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.93, 1, '2019-01-19 00:00:00', 1),
(3, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.93, 1, '2019-01-19 00:00:00', 1),
(4, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.87, 2, '2019-01-19 00:00:00', 1),
(5, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.87, 2, '2019-01-19 00:00:00', 1),
(6, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.67, 1, '2019-01-19 00:00:00', 1),
(7, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(8, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(9, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(10, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(11, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(12, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(13, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(14, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(15, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(16, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(17, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(18, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(19, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(20, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(21, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(22, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(23, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(24, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(25, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(26, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(27, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(28, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(29, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(30, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(31, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(32, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(33, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(34, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(35, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(36, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(37, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(38, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(39, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(40, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(41, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(42, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(43, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(44, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(45, '11526', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.65, 1, '2019-01-19 00:00:00', 1),
(46, '34567', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.38, 2, '2019-01-18 00:00:00', 1),
(47, '34567', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.38, 2, '2019-01-18 00:00:00', 1),
(48, '34567', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.38, 2, '2019-01-18 00:00:00', 1),
(49, '34567', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.38, 2, '2019-01-18 00:00:00', 1),
(50, '98787', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.5, 1, '2019-01-19 00:00:00', 1),
(51, '98787', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.5, 1, '2019-01-19 00:00:00', 1),
(52, '98787', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.5, 1, '2019-01-19 00:00:00', 1),
(53, '56436', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.9, 2, '2019-01-19 00:00:00', 1),
(54, '56436', 20, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.9, 2, '2019-01-19 00:00:00', 1),
(55, '56789', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2.42, 2, '2019-01-21 00:00:00', 1),
(56, '56789', 1, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2.42, 2, '2019-01-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_types`
--

CREATE TABLE `inspection_types` (
  `inspection_id` int(11) NOT NULL,
  `inspection` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_types`
--

INSERT INTO `inspection_types` (`inspection_id`, `inspection`) VALUES
(1, 'Boroscope'),
(2, 'Discard'),
(3, 'Functional Check'),
(4, 'DVI'),
(5, 'Inspection'),
(6, 'Life Limit'),
(7, 'Major Inspection'),
(8, 'Mechanical'),
(9, 'OP'),
(10, 'Operational'),
(11, 'Overhaul'),
(12, 'Renew'),
(13, 'Replace'),
(14, 'restoration'),
(15, 'Servicing'),
(16, 'Torque Check'),
(17, 'Visual'),
(18, 'Visual & Mechanical'),
(19, 'Visual & NDT'),
(20, 'Weight Check');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`) VALUES
(1, 'HKNW'),
(2, 'HKJK'),
(3, ' HKKT'),
(4, 'HKUK'),
(5, 'HKLO'),
(6, 'HKEL'),
(7, 'HKMO'),
(8, 'HKLU'),
(9, 'HKML');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL DEFAULT '1',
  `origin` varchar(5) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `takeoff` datetime NOT NULL,
  `landing` datetime NOT NULL,
  `hours` float NOT NULL,
  `cycles` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `flight_id`, `origin`, `destination`, `takeoff`, `landing`, `hours`, `cycles`, `date_posted`) VALUES
(1, 3, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:55:45'),
(2, 4, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21'),
(3, 4, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21'),
(4, 5, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21'),
(5, 5, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_type`
--

CREATE TABLE `maintenance_type` (
  `maint_type_id` int(11) NOT NULL,
  `maint_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance_type`
--

INSERT INTO `maintenance_type` (`maint_type_id`, `maint_type`) VALUES
(1, 'Initial'),
(2, 'Repeat'),
(3, 'Discard'),
(4, 'Threshold');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer`, `address`, `phone_number`) VALUES
(1, 'Bombadier Canada Inc.', '', ''),
(2, 'Cessna', '', ''),
(3, 'De Havilland Inc.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `propellers`
--

CREATE TABLE `propellers` (
  `propeller_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `serial_number` varchar(25) NOT NULL,
  `propeller_cycles` int(11) NOT NULL,
  `propeller_hours` float NOT NULL,
  `posted_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propellers`
--

INSERT INTO `propellers` (`propeller_id`, `aircraft_id`, `number`, `model`, `serial_number`, `propeller_cycles`, `propeller_hours`, `posted_by`) VALUES
(5, 18, 1, 'DF567677', '98799', 1020, 1120, 1),
(6, 18, 2, 'DF567677', '6578', 1020, 1120, 1),
(9, 20, 1, 'McCauley', '993223', 9, 15789.5, 1),
(10, 21, 1, 'McCauley', '780419', 0, 1750.45, 1),
(11, 21, 2, 'McCauley', '678334', 0, 1679.72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `task_card` varchar(25) DEFAULT NULL,
  `task` text NOT NULL,
  `description` text,
  `part_name` varchar(25) DEFAULT NULL,
  `part_number` varchar(25) DEFAULT NULL,
  `serial_number` varchar(25) DEFAULT NULL,
  `schedule_type_id` int(11) NOT NULL,
  `task_category_id` int(11) NOT NULL,
  `schedule_cat_id` int(11) NOT NULL,
  `comp_cat_id` int(11) NOT NULL,
  `inspection_id` int(11) NOT NULL,
  `ata_chapter_id` int(11) NOT NULL,
  `zone` varchar(25) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `reference` text,
  `cum_cycles` int(11) NOT NULL,
  `cum_hours` double NOT NULL,
  `last_done_cycles` int(11) NOT NULL,
  `last_done_hours` double NOT NULL,
  `date_checked` datetime NOT NULL,
  `next_due_cycles` int(11) NOT NULL,
  `next_due_hours` double NOT NULL,
  `next_due_date` datetime NOT NULL,
  `life_limit_cycles` int(11) NOT NULL,
  `life_limit_hours` double NOT NULL,
  `life_limit_calendar` int(11) NOT NULL,
  `life_limit_period` varchar(1) NOT NULL,
  `alarm_cycles` int(11) NOT NULL,
  `alarm_hours` double NOT NULL,
  `alarm_calendar` int(11) NOT NULL,
  `alarm_period` varchar(1) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` text,
  `posted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `aircraft_id`, `task_card`, `task`, `description`, `part_name`, `part_number`, `serial_number`, `schedule_type_id`, `task_category_id`, `schedule_cat_id`, `comp_cat_id`, `inspection_id`, `ata_chapter_id`, `zone`, `location`, `reference`, `cum_cycles`, `cum_hours`, `last_done_cycles`, `last_done_hours`, `date_checked`, `next_due_cycles`, `next_due_hours`, `next_due_date`, `life_limit_cycles`, `life_limit_hours`, `life_limit_calendar`, `life_limit_period`, `alarm_cycles`, `alarm_hours`, `alarm_calendar`, `alarm_period`, `date_posted`, `notes`, `posted_by`) VALUES
(4, 21, '', '1A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 01:56:57', '', 1),
(5, 21, '', '2A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 1000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 01:57:15', '', 1),
(6, 21, '', '3A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 1500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 02:11:27', '', 1),
(7, 21, '', '4A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 2000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 02:40:54', NULL, 1),
(8, 21, '', '5A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 2500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 03:00:00', NULL, 1),
(9, 21, '', '6A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 3000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 05:37:57', NULL, 1),
(10, 21, '', '9A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 4500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 05:52:04', NULL, 1),
(11, 21, '', '1C CHECK', '', NULL, NULL, NULL, 3, 5, 7, 1, 5, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 5000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 19:59:07', NULL, 1),
(12, 21, '', '2C CHECK', '', NULL, NULL, NULL, 3, 5, 7, 1, 5, 6, NULL, NULL, NULL, 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 10000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 19:59:18', NULL, 1),
(14, 21, '', '3C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 15000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:18:03', NULL, 1),
(17, 21, '', '4C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 20000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:28:40', NULL, 1),
(18, 21, '', '5C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 25000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:36:30', NULL, 1),
(19, 21, '', '6C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 6, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 0, 30000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:42:46', NULL, 1),
(20, 21, '', '', NULL, 'SHOCK STRUT', NULL, '08MDT0758', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-26 21:28:45', NULL, 1),
(21, 21, '', '', NULL, 'DRAG STRUT', NULL, 'DCL451/95', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 01:41:14', NULL, 1),
(22, 21, '', '', NULL, 'TRAILING ARM', NULL, 'DCL-433', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:11:45', NULL, 1),
(23, 21, '', '', NULL, 'OUTTER CYLINDER', NULL, 'O7ALT0010', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:17:52', NULL, 1),
(24, 21, '', '', NULL, 'INNER CYLINDER', NULL, 'SN07WHM', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:20:28', NULL, 1),
(25, 21, '', '', NULL, 'PISTON SCHOCK STRUT', NULL, 'S10174', 2, 2, 1, 1, 11, 16, '', 'NLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:24:24', NULL, 1),
(26, 21, '', '', NULL, 'AXLE', NULL, '07MBM1349', 2, 2, 1, 1, 11, 16, '', '', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:29:58', NULL, 1),
(27, 21, '', '', NULL, 'MLG SHOCK STRUT', NULL, '11MDT0781', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:22:12', NULL, 1),
(28, 21, '', '', NULL, 'MLG DRAG STRUT', NULL, 'DCL685/96', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:25:59', NULL, 1),
(29, 21, '', '', NULL, 'MLG YOKE ASSY', NULL, 'DCL639/95', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:28:19', NULL, 1),
(30, 21, '', '', NULL, 'MLG STABILIZER', NULL, 'DCL705/95', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:31:00', NULL, 1),
(31, 21, '', '', NULL, 'MLG PISTON', NULL, '10WHM160', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:34:17', NULL, 1),
(32, 21, '', '', NULL, 'MLG CYLINDER', NULL, '09EXC1578', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:36:45', NULL, 1),
(33, 21, '', '', NULL, 'MLG UPPER TQ LINK', NULL, '09EXC1744', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:40:19', NULL, 1),
(34, 21, '', '', NULL, 'MLG LOWER TQ LINK', NULL, '10EXC1578', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:42:27', NULL, 1),
(35, 21, '', '', NULL, 'MLG PIN STRUT TO YOKE', NULL, '11EXC5938', 2, 2, 1, 1, 11, 16, '', 'LH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:45:18', NULL, 1),
(36, 21, '', '', NULL, 'SHOCK STRUT', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:12:24', NULL, 1),
(37, 21, '', '', NULL, 'MLG DRAG STRUT', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:13:52', NULL, 1),
(38, 21, '', '', NULL, 'MLG YOKE ASSY', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:15:06', NULL, 1),
(39, 21, '', '', NULL, 'MLG STABILIZER STAY', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:15:58', NULL, 1),
(40, 21, '', '', NULL, 'MLG PISTON', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:17:01', NULL, 1),
(41, 21, '', '', NULL, 'MLG CYLINDER', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:18:47', NULL, 1),
(42, 21, '', '', NULL, 'MLG UPPER TQ LINK', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:19:32', NULL, 1),
(43, 21, '', '', NULL, 'MLG LOWER TQ LINK', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:20:49', NULL, 1),
(44, 21, '', '', NULL, 'MLG PIN STRUT TO YOKE', NULL, '', 2, 2, 1, 1, 11, 16, '', 'RH MLG', '', 0, 0, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:22:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_category`
--

CREATE TABLE `schedule_category` (
  `schedule_cat_id` int(11) NOT NULL,
  `schedule_category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_category`
--

INSERT INTO `schedule_category` (`schedule_cat_id`, `schedule_category`) VALUES
(1, 'AWL'),
(2, 'CPCP'),
(3, 'EWIS'),
(4, 'FSL'),
(5, 'LUMP'),
(6, 'OOP'),
(7, 'Routine'),
(8, 'Safe Life'),
(9, 'SIP');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_details`
--

CREATE TABLE `schedule_details` (
  `schedule_details_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `maint_type_id` int(11) NOT NULL,
  `cycles` int(11) NOT NULL,
  `hours` double NOT NULL,
  `calendar` int(11) NOT NULL,
  `period` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_details`
--

INSERT INTO `schedule_details` (`schedule_details_id`, `schedule_id`, `maint_type_id`, `cycles`, `hours`, `calendar`, `period`) VALUES
(1, 4, 2, 0, 500, 3, 'M'),
(2, 5, 2, 0, 1000, 6, 'M'),
(3, 6, 2, 0, 1500, 9, 'M'),
(4, 7, 2, 0, 2000, 12, 'M'),
(5, 8, 2, 0, 2500, 15, 'M'),
(6, 9, 2, 0, 3000, 18, 'M'),
(7, 10, 1, 0, 4500, 21, 'M'),
(10, 11, 2, 0, 5000, 24, 'M'),
(11, 12, 2, 0, 10000, 36, 'M'),
(12, 14, 2, 0, 15000, 48, 'M'),
(13, 17, 2, 0, 20000, 60, 'M'),
(14, 18, 2, 0, 25000, 72, 'M'),
(15, 19, 2, 0, 30000, 84, 'M'),
(16, 20, 2, 25000, 0, 10, 'Y'),
(18, 21, 2, 25000, 0, 10, 'Y'),
(20, 22, 2, 25000, 0, 10, 'Y'),
(21, 23, 2, 25000, 0, 10, 'Y'),
(22, 24, 2, 25000, 0, 10, 'Y'),
(23, 25, 2, 25000, 0, 10, 'Y'),
(24, 26, 2, 25000, 0, 10, 'Y'),
(25, 27, 2, 30000, 0, 12, 'Y'),
(26, 28, 2, 30000, 0, 12, 'Y'),
(27, 29, 2, 30000, 0, 12, 'Y'),
(28, 30, 2, 30000, 0, 12, 'Y'),
(29, 31, 2, 30000, 0, 12, 'Y'),
(30, 32, 2, 30000, 0, 12, 'Y'),
(31, 33, 2, 30000, 0, 12, 'Y'),
(32, 34, 2, 30000, 0, 12, 'Y'),
(33, 35, 2, 30000, 0, 12, 'Y'),
(34, 36, 2, 30000, 0, 12, 'Y'),
(35, 37, 2, 30000, 0, 12, 'Y'),
(36, 38, 2, 30000, 0, 12, 'Y'),
(37, 39, 2, 30000, 0, 12, 'Y'),
(38, 40, 2, 30000, 0, 12, 'Y'),
(39, 41, 2, 30000, 0, 12, 'Y'),
(40, 42, 2, 30000, 0, 12, 'Y'),
(41, 43, 2, 30000, 0, 12, 'Y'),
(42, 44, 2, 30000, 0, 12, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_types`
--

CREATE TABLE `schedule_types` (
  `type_id` int(11) NOT NULL,
  `schedule_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_types`
--

INSERT INTO `schedule_types` (`type_id`, `schedule_type`) VALUES
(1, 'Appliance'),
(2, 'Component'),
(3, 'Inspection');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_workpacks`
--

CREATE TABLE `schedule_workpacks` (
  `schedule_workpack_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `task_card` varchar(25) NOT NULL,
  `task` text NOT NULL,
  `description` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_category`
--

CREATE TABLE `task_category` (
  `task_category_id` int(11) NOT NULL,
  `task_category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_category`
--

INSERT INTO `task_category` (`task_category_id`, `task_category`) VALUES
(1, 'OC'),
(2, 'HT'),
(3, 'HSI'),
(4, 'CM'),
(5, 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `post` varchar(25) NOT NULL,
  `department` varchar(45) NOT NULL,
  `password` varchar(99) NOT NULL,
  `photo` varchar(99) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `tel`, `post`, `department`, `password`, `photo`, `date_added`) VALUES
(1, 'Martin', 'Njuguna', 'martin.njau@live.com', '0727905402', 'Software Support', 'Engineering', 'm@in/20xiv', 'martin.jpg', '2019-01-19 04:10:50'),
(2, '', '', '', '0727905402', '', '', '', '', '2019-01-19 04:10:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircrafts`
--
ALTER TABLE `aircrafts`
  ADD PRIMARY KEY (`aircraft_id`),
  ADD KEY `model_id` (`model_id`),
  ADD KEY `engine_type_id` (`engine_type_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `aircraft_models`
--
ALTER TABLE `aircraft_models`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `ata_chapters`
--
ALTER TABLE `ata_chapters`
  ADD PRIMARY KEY (`ata_chapter_id`);

--
-- Indexes for table `comp_cat`
--
ALTER TABLE `comp_cat`
  ADD PRIMARY KEY (`comp_cat_id`);

--
-- Indexes for table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`engine_id`),
  ADD KEY `aircraft_id` (`aircraft_id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `engineTypes`
--
ALTER TABLE `engineTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engine_models`
--
ALTER TABLE `engine_models`
  ADD PRIMARY KEY (`engine_model_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `aircraft_id` (`aircraft_id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `inspection_types`
--
ALTER TABLE `inspection_types`
  ADD PRIMARY KEY (`inspection_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  ADD PRIMARY KEY (`maint_type_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `propellers`
--
ALTER TABLE `propellers`
  ADD PRIMARY KEY (`propeller_id`),
  ADD KEY `aircraft_id` (`aircraft_id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `aircraft_id` (`aircraft_id`),
  ADD KEY `schedule_type_id` (`schedule_type_id`),
  ADD KEY `schedule_category_id` (`schedule_cat_id`),
  ADD KEY `comp_cat_id` (`comp_cat_id`),
  ADD KEY `ata_chapter_id` (`ata_chapter_id`),
  ADD KEY `posted_by` (`posted_by`),
  ADD KEY `inspection_id` (`inspection_id`),
  ADD KEY `task_category_id` (`task_category_id`);

--
-- Indexes for table `schedule_category`
--
ALTER TABLE `schedule_category`
  ADD PRIMARY KEY (`schedule_cat_id`);

--
-- Indexes for table `schedule_details`
--
ALTER TABLE `schedule_details`
  ADD PRIMARY KEY (`schedule_details_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `maint_type_id` (`maint_type_id`);

--
-- Indexes for table `schedule_types`
--
ALTER TABLE `schedule_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `schedule_workpacks`
--
ALTER TABLE `schedule_workpacks`
  ADD PRIMARY KEY (`schedule_workpack_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`task_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircrafts`
--
ALTER TABLE `aircrafts`
  MODIFY `aircraft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `aircraft_models`
--
ALTER TABLE `aircraft_models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ata_chapters`
--
ALTER TABLE `ata_chapters`
  MODIFY `ata_chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `comp_cat`
--
ALTER TABLE `comp_cat`
  MODIFY `comp_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `engine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `engineTypes`
--
ALTER TABLE `engineTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `engine_models`
--
ALTER TABLE `engine_models`
  MODIFY `engine_model_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `inspection_types`
--
ALTER TABLE `inspection_types`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `maintenance_type`
--
ALTER TABLE `maintenance_type`
  MODIFY `maint_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `propellers`
--
ALTER TABLE `propellers`
  MODIFY `propeller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `schedule_category`
--
ALTER TABLE `schedule_category`
  MODIFY `schedule_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedule_details`
--
ALTER TABLE `schedule_details`
  MODIFY `schedule_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `schedule_types`
--
ALTER TABLE `schedule_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule_workpacks`
--
ALTER TABLE `schedule_workpacks`
  MODIFY `schedule_workpack_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `task_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aircrafts`
--
ALTER TABLE `aircrafts`
  ADD CONSTRAINT `aircrafts_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `aircraft_models` (`model_id`),
  ADD CONSTRAINT `aircrafts_ibfk_2` FOREIGN KEY (`engine_type_id`) REFERENCES `engineTypes` (`id`),
  ADD CONSTRAINT `aircrafts_ibfk_3` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`manufacturer_id`),
  ADD CONSTRAINT `aircrafts_ibfk_4` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `engines`
--
ALTER TABLE `engines`
  ADD CONSTRAINT `engines_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`aircraft_id`),
  ADD CONSTRAINT `engines_ibfk_2` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`aircraft_id`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `propellers`
--
ALTER TABLE `propellers`
  ADD CONSTRAINT `propellers_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`aircraft_id`),
  ADD CONSTRAINT `propellers_ibfk_2` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`aircraft_id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`schedule_type_id`) REFERENCES `schedule_types` (`type_id`),
  ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`schedule_cat_id`) REFERENCES `schedule_category` (`schedule_cat_id`),
  ADD CONSTRAINT `schedules_ibfk_4` FOREIGN KEY (`comp_cat_id`) REFERENCES `comp_cat` (`comp_cat_id`),
  ADD CONSTRAINT `schedules_ibfk_5` FOREIGN KEY (`ata_chapter_id`) REFERENCES `ata_chapters` (`ata_chapter_id`),
  ADD CONSTRAINT `schedules_ibfk_6` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `schedules_ibfk_7` FOREIGN KEY (`inspection_id`) REFERENCES `inspection_types` (`inspection_id`),
  ADD CONSTRAINT `schedules_ibfk_8` FOREIGN KEY (`task_category_id`) REFERENCES `task_category` (`task_category_id`);

--
-- Constraints for table `schedule_details`
--
ALTER TABLE `schedule_details`
  ADD CONSTRAINT `schedule_details_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`),
  ADD CONSTRAINT `schedule_details_ibfk_2` FOREIGN KEY (`maint_type_id`) REFERENCES `maintenance_type` (`maint_type_id`);

--
-- Constraints for table `schedule_workpacks`
--
ALTER TABLE `schedule_workpacks`
  ADD CONSTRAINT `schedule_workpacks_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
