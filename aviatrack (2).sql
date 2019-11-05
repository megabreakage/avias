-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2019 at 10:19 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
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
(1, '5Y-BXB', '100', '213', 3, '2019-01-01', 1, 2, 1, 2, 30011.079994671, 25014, '2019-02-15', 1),
(18, '5Y-CGL', '200', '523', 3, '2019-01-01', 1, 2, 1, 0, 72700.69, 39000, '2019-01-01', 1),
(20, '5Y-NON', 'C208', '0036', 2, '1985-01-01', 5, 2, 2, 0, 22484.240003667, 30957, '2019-01-01', 1),
(21, '5Y-BUZ', '100', '723', 3, '2019-01-01', 1, 2, 2, 0, 56527.546666667, 55563, '2019-01-01', 1),
(23, '5Y-CGH', '300', '525', 1, '1998-11-08', 2, 2, 2, 0, 45992.2, 36880, '2019-01-01', 1),
(24, '5Y-BXC', '200', '7184', 1, '1997-07-27', 3, 2, 1, 0, 30179.3, 35993, '2019-01-01', 1),
(25, '5Y-MNN', '232', '1234', 3, '2019-07-10', 3, 2, 1, 0, 727, 345, '2019-01-01', 1);

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
(80, '00', 'GENERAL', 'Aircraft General'),
(81, '01', 'MAINTENANCE POLICY', 'Aircraft General'),
(82, '02', 'OPERATIONS', 'Aircraft General'),
(83, '03', 'SUPPORT', 'Aircraft General'),
(84, '04', 'AIRWORTHINESS LIMITATIONS', 'Aircraft General'),
(85, '05', 'TIME LIMITS/MAINTENANCE CHECKS', 'Aircraft General'),
(86, '06', 'DIMENSIONS AND AREAS', 'Aircraft General'),
(87, '07', 'LIFTING AND SHORING', 'Aircraft General'),
(88, '08', 'LEVELING AND WEIGHING', 'Aircraft General'),
(89, '09', 'TOWING AND TAXIING', 'Aircraft General'),
(90, '10', 'PARKING, MOORING, STORAGE AND RETURN TO SERVICE', 'Aircraft General'),
(91, '11', 'PLACARDS AND MARKINGS', 'Aircraft General'),
(92, '12', 'SERVICING', 'Aircraft General'),
(93, '14', 'HARDWARE AND GENERAL TOOLS', 'Aircraft General'),
(94, '18', 'VIBRATION AND NOISE ANALYSIS (HELICOPTER ONLY)', 'Aircraft General'),
(95, '20', 'STANDARD PRACTICES - AIRFRAME', 'Airframe Systems'),
(96, '21', 'AIR CONDITIONING', 'Airframe Systems'),
(97, '22', 'AUTO FLIGHT', 'Airframe Systems'),
(98, '23', 'COMMUNICATIONS', 'Airframe Systems'),
(99, '24', 'ELECTRICAL POWER', 'Airframe Systems'),
(100, '25', 'EQUIPMENT /FURNISHINGS', 'Airframe Systems'),
(101, '26', 'FIRE PROTECTION', 'Airframe Systems'),
(102, '27', 'FLIGHT CONTROLS', 'Airframe Systems'),
(103, '28', 'FUEL', 'Airframe Systems'),
(104, '29', 'HYDRAULIC POWER', 'Airframe Systems'),
(105, '30', 'ICE AND RAIN PROTECTION', 'Airframe Systems'),
(106, '31', 'INDICATING / RECORDING SYSTEM', 'Airframe Systems'),
(107, '32', 'LANDING GEAR', 'Airframe Systems'),
(108, '33', 'LIGHTS', 'Airframe Systems'),
(109, '34', 'NAVIGATION', 'Airframe Systems'),
(110, '35', 'OXYGEN', 'Airframe Systems'),
(111, '36', 'PNEUMATIC', 'Airframe Systems'),
(112, '37', 'VACUUM', 'Airframe Systems'),
(113, '38', 'WATER / WASTE', 'Airframe Systems'),
(114, '39', 'ELECTRICAL - ELECTRONIC PANELS AND MULTIPURPOSE COMPONENTS', 'Airframe Systems'),
(115, '40', 'MULTISYSTEM', 'Airframe Systems'),
(116, '41', 'WATER BALLAST', 'Airframe Systems'),
(117, '42', 'INTEGRATED MODULAR AVIONICS', 'Airframe Systems'),
(118, '44', 'CABIN SYSTEMS', 'Airframe Systems'),
(119, '45', 'ONBOARD MAINTENANCE SYSTEMS (OMS)', 'Airframe Systems'),
(120, '46', 'INFORMATION SYSTEMS', 'Airframe Systems'),
(121, '47', 'INERT GAS SYSTEM', 'Airframe Systems'),
(122, '48', 'IN FLIGHT FUEL DISPENSING', 'Airframe Systems'),
(123, '49', 'AIRBORNE AUXILIARY POWER', 'Airframe Systems'),
(124, '50', 'CARGO AND ACCESSORY COMPARTMENTS', 'Structure'),
(125, '51', 'STANDARD PRACTICES AND STRUCTURES - GENERAL', 'Structure'),
(126, '52', 'DOORS', 'Structure'),
(127, '53', 'FUSELAGE', 'Structure'),
(128, '54', 'NACELLES/PYLONS', 'Structure'),
(129, '55', 'STABILIZERS', 'Structure'),
(130, '56', 'WINDOWS', 'Structure'),
(131, '57', 'WINGS', 'Structure'),
(132, '60', 'STANDARD PRACTICES - PROP./ROTOR', 'Propeller/rotor'),
(133, '61', 'PROPELLORS/ PROPULSORS', 'Propeller/rotor'),
(134, '62', 'MAIN ROTOR(S)', 'Propeller/rotor'),
(135, '63', 'MAIN ROTOR DRIVE(S)', 'Propeller/rotor'),
(136, '64', 'TAIL ROTOR', 'Propeller/rotor'),
(137, '65', 'TAIL ROTOR DRIVE', 'Propeller/rotor'),
(138, '66', 'FOLDING BLADES/PYLON', 'Propeller/rotor'),
(139, '67', 'ROTORS FLIGHT CONTROL', 'Propeller/rotor'),
(140, '70', 'STANDARD PRACTICES ENGINE', 'Power plant'),
(141, '71', 'POWER PLANT', 'Power plant'),
(142, '72', 'ENGINE', 'Power plant'),
(143, '73', 'ENGINE FUEL AND CONTROL', 'Power plant'),
(144, '74', 'ENGINE IGNITION', 'Power plant'),
(145, '75', 'ENGINE AIR', 'Power plant'),
(146, '76', 'ENGINE CONTROLS', 'Power plant'),
(147, '77', 'ENGINE INDICATING', 'Power plant'),
(148, '78', 'ENGINE EXHAUST', 'Power plant'),
(149, '79', 'ENGINE OIL', 'Power plant'),
(150, '80', 'STARTING', 'Power plant'),
(151, '81', 'TURBOCHARGING', 'Power plant'),
(152, '82', 'WATER INJECTION', 'Power plant'),
(153, '83', 'ACCESSORY GEARBOXES', 'Power plant'),
(154, '84', 'PROPULSION AUGMENTATION', 'Power plant'),
(155, '85', 'FUEL CELL SYSTEMS', 'Power plant'),
(156, '91', 'CHARTS', 'Power plant'),
(157, '92', 'ELECTRICAL SYSTEM INSTALLATION', 'Power plant');

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
  `engine_hours` double NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engines`
--

INSERT INTO `engines` (`engine_id`, `aircraft_id`, `number`, `model`, `serial_number`, `engine_cycles`, `engine_hours`, `update_date`, `posted_by`) VALUES
(18, 18, 1, 'CF34', '6789098', 28750, 29800.05, '2019-01-18 12:19:54', 1),
(19, 18, 2, 'CF34B', '6789098', 28750, 29800.05, '2019-01-18 12:19:54', 1),
(22, 20, 1, 'PT6A-114A', 'PCE PC0657', 143392, 12265.483724292, '2019-01-18 13:03:39', 1),
(23, 21, 1, 'PW121', '1209788', 38191, 38679.515625, '2019-01-26 00:57:08', 1),
(24, 21, 2, 'PW121', '170345', 35508, 35587.05078125, '2019-01-26 00:57:08', 1),
(25, 23, 1, 'PW123B', 'PCE123205', 63160, 34766.1015625, '2019-01-28 13:45:42', 1),
(26, 23, 2, 'PW123B', 'PCE123223', 58910, 32833.6015625, '2019-01-28 13:45:42', 1),
(27, 24, 1, 'CF34-3B1', '873350', 28765, 29914.80078125, '2019-01-28 14:07:44', 1),
(28, 24, 2, 'CF34-3A1', '807304', 32619, 33576.5, '2019-01-28 14:07:44', 1),
(29, 25, 1, 'SFGF', '12345', 5679, 5678, '2019-10-08 20:56:01', 1),
(30, 25, 2, 'SFGF', '12345', 5679, 5678, '2019-10-08 20:56:01', 1);

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
-- Table structure for table `engine_trend_monitor`
--

CREATE TABLE `engine_trend_monitor` (
  `id` int(11) NOT NULL,
  `trend_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `engine_1` float NOT NULL,
  `engine_2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engine_trend_monitor`
--

INSERT INTO `engine_trend_monitor` (`id`, `trend_id`, `flight_id`, `engine_1`, `engine_2`) VALUES
(1, 14, 103, 275, 270),
(2, 11, 103, 28, 31),
(3, 14, 104, 275, 270),
(4, 11, 104, 28, 31),
(5, 1, 105, 200000, 20000),
(6, 14, 105, 175, 177),
(33, 14, 103, 11, 45);

-- --------------------------------------------------------

--
-- Table structure for table `engine_trend_types`
--

CREATE TABLE `engine_trend_types` (
  `trend_id` int(11) NOT NULL,
  `trend` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engine_trend_types`
--

INSERT INTO `engine_trend_types` (`trend_id`, `trend`) VALUES
(1, 'CRZ'),
(2, 'EGT'),
(3, 'Fuel Flow'),
(4, 'Gas Gen (ng)'),
(5, 'IAS'),
(6, 'ITT'),
(7, 'NH'),
(8, 'NL'),
(9, 'OAT'),
(10, 'Oil Pressures (psi)'),
(11, 'Oil Temp'),
(12, 'Pressure Altitude (pa)'),
(13, 'Prop RPM (np)'),
(14, 'Start (ITT)'),
(15, 'Suction'),
(16, 'TGT'),
(17, 'Torque');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `techlog` varchar(25) NOT NULL,
  `techlog_type` varchar(25) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `hours` float NOT NULL,
  `cycles` int(11) NOT NULL,
  `flight_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` int(11) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `techlog`, `techlog_type`, `aircraft_id`, `hours`, `cycles`, `flight_date`, `posted_by`, `date_posted`) VALUES
(2, '11526', 'scheduled', 1, 0.379967, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(3, '11526', 'scheduled', 1, 0.93, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(4, '11526', 'scheduled', 1, 1.61667, 3, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(5, '11526', 'scheduled', 1, 1.87, 2, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(6, '11526', 'scheduled', 1, 0.67, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(7, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(8, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(9, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(10, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(11, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(12, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(13, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(14, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(15, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(16, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(17, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(18, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(19, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(20, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(21, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(22, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(23, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(24, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(25, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(26, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(27, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(28, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(29, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(30, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(31, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(32, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(33, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(34, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(35, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(36, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(37, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(38, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(39, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(40, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(41, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(42, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(43, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(44, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(45, '11526', 'scheduled', 1, 0.65, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(46, '34567', 'scheduled', 20, 1.38, 2, '2019-01-18 00:00:00', 1, '2019-02-09 03:42:38'),
(47, '34567', 'scheduled', 20, 1.38, 2, '2019-01-18 00:00:00', 1, '2019-02-09 03:42:38'),
(48, '34567', 'scheduled', 20, 1.38, 2, '2019-01-18 00:00:00', 1, '2019-02-09 03:42:38'),
(49, '34567', 'scheduled', 20, 1.38, 2, '2019-01-18 00:00:00', 1, '2019-02-09 03:42:38'),
(50, '98787', 'scheduled', 20, 0.5, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(51, '98787', 'scheduled', 20, 0.5, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(52, '98787', 'scheduled', 20, 0.5, 1, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(53, '56436', 'scheduled', 20, 0.9, 2, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(54, '56436', 'scheduled', 20, 0.9, 2, '2019-01-19 00:00:00', 1, '2019-02-09 03:42:38'),
(55, '56789', 'scheduled', 1, 2.42, 2, '2019-01-21 00:00:00', 1, '2019-02-09 03:42:38'),
(56, '56789', 'scheduled', 1, 2.42, 2, '2019-01-21 00:00:00', 1, '2019-02-09 03:42:38'),
(57, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(58, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(59, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(60, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(61, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(62, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(63, '7890', 'scheduled', 20, 3.23667, 5, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(64, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(65, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(66, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(67, '7890', 'scheduled', 20, 1.57, 2, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(68, '99030', 'scheduled', 20, 0.413334, 1, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(69, '99030', 'scheduled', 20, 0.33, 1, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(70, '99030', 'scheduled', 20, 0.33, 1, '2019-01-28 00:00:00', 1, '2019-02-09 03:42:38'),
(71, '33088', 'scheduled', 21, 2.79667, 3, '2019-01-06 00:00:00', 1, '2019-02-09 03:42:38'),
(72, '33088', 'scheduled', 21, 2.38, 2, '2019-01-06 00:00:00', 1, '2019-02-09 03:42:38'),
(73, '33088', 'scheduled', 21, 2.38, 2, '2019-01-06 00:00:00', 1, '2019-02-09 03:42:38'),
(74, '33088', 'scheduled', 21, 2.38, 2, '2019-01-06 00:00:00', 1, '2019-02-09 03:42:38'),
(75, '33079', 'scheduled', 21, 2.52, 3, '2019-01-02 00:00:00', 1, '2019-02-09 03:42:38'),
(76, '33068', 'scheduled', 21, 2.18, 6, '2018-12-28 00:00:00', 1, '2019-02-09 03:42:38'),
(77, '33063', 'scheduled', 21, 2.52, 3, '2018-12-24 00:00:00', 1, '2019-02-09 03:42:38'),
(78, '33069', 'scheduled', 21, 2.18, 6, '2018-12-29 00:00:00', 1, '2019-02-09 03:42:38'),
(79, '33070', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 03:58:31'),
(80, '33070', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 03:58:34'),
(81, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:06:21'),
(82, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:06:24'),
(83, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:07:06'),
(84, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:09:39'),
(85, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:15:37'),
(86, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:16:35'),
(87, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:19:57'),
(88, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:20:26'),
(89, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:21:28'),
(90, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:22:41'),
(91, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:23:16'),
(92, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:23:36'),
(93, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:23:48'),
(94, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:24:36'),
(95, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:25:15'),
(96, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:26:03'),
(97, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:28:05'),
(98, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:29:04'),
(99, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:31:04'),
(100, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:39:59'),
(101, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:40:02'),
(102, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:40:39'),
(103, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:41:34'),
(104, '33071', 'scheduled', 21, 0.03, 1, '2018-12-30 00:00:00', 1, '2019-02-09 04:42:15'),
(105, '33072', 'scheduled', 21, 2.18, 6, '2018-12-31 00:00:00', 1, '2019-02-09 04:55:07');

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
(9, 'HKML'),
(11, 'HKWJ'),
(12, 'HKSJ'),
(13, 'HKOK'),
(14, 'HKTB'),
(15, 'HKKE');

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
(4, 5, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21'),
(5, 5, 'HKJK', 'HKNW', '2019-01-19 04:00:00', '2019-01-19 04:56:00', 0.933333, 1, '2019-01-19 05:56:21'),
(7, 63, 'HKJK', 'HKNW', '2019-01-28 00:10:00', '2019-01-28 00:40:00', 0.5, 1, '2019-01-28 01:40:09'),
(8, 63, 'HKEL', 'HKJK', '2019-01-28 00:49:00', '2019-01-28 01:53:00', 1.06667, 1, '2019-01-28 01:40:09'),
(9, 64, 'HKJK', 'HKNW', '2019-01-28 00:10:00', '2019-01-28 00:40:00', 0.5, 1, '2019-01-28 01:43:51'),
(10, 64, 'HKEL', 'HKJK', '2019-01-28 00:49:00', '2019-01-28 01:53:00', 1.06667, 1, '2019-01-28 01:43:51'),
(11, 65, 'HKJK', 'HKNW', '2019-01-28 00:10:00', '2019-01-28 00:40:00', 0.5, 1, '2019-01-28 01:44:51'),
(12, 65, 'HKEL', 'HKJK', '2019-01-28 00:49:00', '2019-01-28 01:53:00', 1.06667, 1, '2019-01-28 01:44:51'),
(13, 66, 'HKJK', 'HKNW', '2019-01-28 00:10:00', '2019-01-28 00:40:00', 0.5, 1, '2019-01-28 01:45:56'),
(14, 66, 'HKEL', 'HKJK', '2019-01-28 00:49:00', '2019-01-28 01:53:00', 1.06667, 1, '2019-01-28 01:45:56'),
(15, 67, 'HKJK', 'HKNW', '2019-01-28 00:10:00', '2019-01-28 00:40:00', 0.5, 1, '2019-01-28 02:32:39'),
(16, 67, 'HKEL', 'HKJK', '2019-01-28 00:49:00', '2019-01-28 01:53:00', 1.06667, 1, '2019-01-28 02:32:39'),
(18, 69, 'HKJK', 'HKNW', '2019-01-28 02:45:00', '2019-01-28 03:05:00', 0.333333, 1, '2019-01-28 02:41:44'),
(19, 70, 'HKJK', 'HKNW', '2019-01-28 02:45:00', '2019-01-28 03:05:00', 0.333333, 1, '2019-01-28 03:00:20'),
(20, 71, 'HKUK', 'HKNW', '2019-01-06 11:28:00', '2019-01-06 12:43:00', 1.25, 1, '2019-01-28 11:41:45'),
(21, 71, 'HKNW', 'HKUK', '2019-01-06 13:37:00', '2019-01-06 14:45:00', 1.13333, 1, '2019-01-28 11:41:45'),
(22, 72, 'HKUK', 'HKNW', '2019-01-06 11:28:00', '2019-01-06 12:43:00', 1.25, 1, '2019-01-28 11:42:10'),
(23, 72, 'HKNW', 'HKUK', '2019-01-06 13:37:00', '2019-01-06 14:45:00', 1.13333, 1, '2019-01-28 11:42:10'),
(24, 73, 'HKUK', 'HKNW', '2019-01-06 11:28:00', '2019-01-06 12:43:00', 1.25, 1, '2019-01-28 11:46:56'),
(25, 73, 'HKNW', 'HKUK', '2019-01-06 13:37:00', '2019-01-06 14:45:00', 1.13333, 1, '2019-01-28 11:46:56'),
(26, 74, 'HKUK', 'HKNW', '2019-01-06 11:28:00', '2019-01-06 12:43:00', 1.25, 1, '2019-01-28 12:03:59'),
(27, 74, 'HKNW', 'HKUK', '2019-01-06 13:37:00', '2019-01-06 14:45:00', 1.13333, 1, '2019-01-28 12:03:59'),
(28, 75, 'HKMO', 'HKNW', '2019-01-02 11:39:00', '2019-01-02 12:50:00', 1.18333, 1, '2019-01-28 16:52:34'),
(29, 75, 'HKUK', 'HKMO', '2019-01-02 13:17:00', '2019-01-02 13:29:00', 0.2, 1, '2019-01-28 16:52:34'),
(30, 75, 'HKNW', 'HKUK', '2019-01-02 13:49:00', '2019-01-02 14:57:00', 1.13333, 1, '2019-01-28 16:52:34'),
(31, 76, 'HKNW', 'HKJK', '2018-12-28 07:39:00', '2018-12-28 07:41:00', 0.0333333, 1, '2019-01-29 11:39:05'),
(32, 76, 'HKEL', 'HKNW', '2018-12-28 08:35:00', '2018-12-28 09:23:00', 0.8, 1, '2019-01-29 11:39:05'),
(33, 76, 'HKTB', 'HKEL', '2018-12-28 09:39:00', '2018-12-28 10:13:00', 0.566667, 1, '2019-01-29 11:39:05'),
(34, 76, 'HKOK', 'HKTB', '2018-12-28 10:28:00', '2018-12-28 10:35:00', 0.116667, 1, '2019-01-29 11:39:05'),
(35, 76, 'HKKE', 'HKOK', '2018-12-28 10:48:00', '2018-12-28 10:58:00', 0.166667, 1, '2019-01-29 11:39:05'),
(36, 76, 'HKNW', 'HKKE', '2018-12-28 11:40:00', '2018-12-28 12:10:00', 0.5, 1, '2019-01-29 11:39:05'),
(37, 77, 'HKMO', 'HKNW', '2018-12-24 11:39:00', '2018-12-24 12:52:00', 1.21667, 1, '2019-01-29 11:56:21'),
(38, 77, 'HKUK', 'HKMO', '2018-12-24 13:30:00', '2018-12-24 13:38:00', 0.133333, 1, '2019-01-29 11:56:21'),
(39, 77, 'HKNW', 'HKUK', '2018-12-24 13:54:00', '2018-12-24 15:04:00', 1.16667, 1, '2019-01-29 11:56:21'),
(40, 78, 'HKNW', 'HKJK', '2018-12-29 07:39:00', '2018-12-29 07:41:00', 0.0333333, 1, '2019-02-09 03:39:57'),
(41, 78, 'HKEL', 'HKNW', '2018-12-29 08:35:00', '2018-12-29 09:23:00', 0.8, 1, '2019-02-09 03:39:57'),
(42, 78, 'HKTB', 'HKEL', '2018-12-29 09:39:00', '2018-12-29 10:13:00', 0.566667, 1, '2019-02-09 03:39:57'),
(43, 78, 'HKOK', 'HKTB', '2018-12-29 10:28:00', '2018-12-29 10:35:00', 0.116667, 1, '2019-02-09 03:39:57'),
(44, 78, 'HKKE', 'HKOK', '2018-12-29 10:48:00', '2018-12-29 10:58:00', 0.166667, 1, '2019-02-09 03:39:57'),
(45, 78, 'HKNW', 'HKKE', '2018-12-29 11:40:00', '2018-12-29 12:10:00', 0.5, 1, '2019-02-09 03:39:57'),
(46, 79, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 03:58:31'),
(47, 80, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 03:58:34'),
(48, 81, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:06:21'),
(49, 82, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:06:24'),
(50, 83, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:07:06'),
(51, 84, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:09:39'),
(52, 85, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:15:37'),
(53, 86, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:16:35'),
(54, 87, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:19:58'),
(55, 88, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:20:26'),
(56, 89, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:21:28'),
(57, 90, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:22:41'),
(58, 91, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:23:16'),
(59, 92, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:23:36'),
(60, 93, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:23:48'),
(61, 94, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:24:36'),
(62, 95, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:25:15'),
(63, 96, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:26:03'),
(64, 97, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:28:05'),
(65, 98, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:29:04'),
(66, 99, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:31:05'),
(67, 100, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:39:59'),
(68, 101, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:40:02'),
(69, 102, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:40:39'),
(70, 103, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:41:34'),
(71, 104, 'HKJK', 'HKNW', '2018-12-30 07:39:00', '2018-12-30 07:41:00', 0.0333333, 1, '2019-02-09 04:42:15'),
(72, 105, 'HKJK', 'HKNW', '2018-12-31 07:39:00', '2018-12-31 07:41:00', 0.0333333, 1, '2019-02-09 04:55:07'),
(73, 105, 'HKNW', 'HKEL', '2018-12-31 08:35:00', '2018-12-31 09:23:00', 0.8, 1, '2019-02-09 04:55:07'),
(74, 105, 'HKEL', 'HKTB', '2018-12-31 09:39:00', '2018-12-31 10:13:00', 0.566667, 1, '2019-02-09 04:55:07'),
(75, 105, 'HKTB', 'HKOK', '2018-12-31 10:28:00', '2018-12-31 10:35:00', 0.116667, 1, '2019-02-09 04:55:07'),
(76, 105, 'HKOK', 'HKKE', '2018-12-31 10:48:00', '2018-12-31 10:58:00', 0.166667, 1, '2019-02-09 04:55:07'),
(77, 105, 'HKKE', 'HKNW', '2018-12-31 11:40:00', '2018-12-31 12:10:00', 0.5, 1, '2019-02-09 04:55:07'),
(80, 4, 'HKNW', 'HKLO', '2019-01-19 15:15:00', '2019-01-19 15:48:00', 0.55, 1, '2019-03-09 23:59:10'),
(81, 4, 'HKLO', 'HKNW', '2019-01-19 16:12:00', '2019-01-19 16:44:00', 0.533333, 1, '2019-03-10 00:01:27'),
(82, 4, 'HKLO', 'HKNW', '2019-01-19 16:12:00', '2019-01-19 16:44:00', 0.533333, 1, '2019-03-10 00:02:47'),
(126, 71, 'HKUK', 'HKNW', '2019-01-06 15:15:00', '2019-01-06 15:40:00', 0.416667, 1, '2019-03-10 04:18:19'),
(127, 68, 'HKNW', ' HKKT', '2019-01-28 15:15:00', '2019-01-28 15:40:00', 0.416667, 1, '2019-03-10 05:52:04'),
(128, 2, 'HKNW', 'HKJK', '2019-01-19 13:10:00', '2019-01-19 13:33:00', 0.383333, 1, '2019-03-11 20:07:19');

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
-- Table structure for table `pireps`
--

CREATE TABLE `pireps` (
  `pirep_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `defect` text NOT NULL,
  `ata_chapter_id` int(11) NOT NULL,
  `deferred` varchar(3) NOT NULL,
  `limitations` text NOT NULL,
  `mel_reference` varchar(45) NOT NULL,
  `dfr_reason` text NOT NULL,
  `dfr_category` varchar(1) NOT NULL,
  `dfr_date` datetime DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `rectification` text NOT NULL,
  `techlog_number` varchar(25) NOT NULL,
  `cleared_date` datetime DEFAULT NULL,
  `wo_number` varchar(45) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pireps`
--

INSERT INTO `pireps` (`pirep_id`, `flight_id`, `defect`, `ata_chapter_id`, `deferred`, `limitations`, `mel_reference`, `dfr_reason`, `dfr_category`, `dfr_date`, `exp_date`, `rectification`, `techlog_number`, `cleared_date`, `wo_number`, `remarks`) VALUES
(1, 68, 'RUDDER TRIM KNOB LOOSE AND VERY SENSITIVE WHEN TRIMMING', 107, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'C', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(2, 68, 'ENGINE NO.1 STARTER STARTING ON ITS OWN  WITHOUT START .CIRCUIT SELECTION', 80, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'A', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(3, 69, 'RUDDER TRIM KNOB LOOSE AND VERY SENSITIVE WHEN TRIMMING', 107, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'C', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(4, 69, 'ENGINE NO.1 STARTER STARTING ON ITS OWN  WITHOUT START .CIRCUIT SELECTION', 80, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'A', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(5, 70, 'RUDDER TRIM KNOB LOOSE AND VERY SENSITIVE WHEN TRIMMING', 107, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'C', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(6, 70, 'ENGINE NO.1 STARTER STARTING ON ITS OWN  WITHOUT START .CIRCUIT SELECTION', 80, 'Yes', 'N/A', 'N/A', 'Insufficient time', 'A', '2019-01-28 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(8, 71, 'POST FLIGHT INSPECTION DUE', 85, '0', '', '', '', '', NULL, NULL, '', '', '2019-01-31 00:00:00', '', ''),
(10, 72, 'POST FLIGHT INSPECTION DUE', 85, '0', '', '', '', '', NULL, NULL, '', '', '2019-01-31 00:00:00', '', ''),
(15, 76, 'ENGINE FAIL TO START', 80, 'No', '', '', '', '', NULL, NULL, '', '', '2019-01-31 00:00:00', '', ''),
(16, 76, 'MAINT TIRE SLOW PUNCTURE', 107, 'No', '', '', '', '', NULL, NULL, '', '', '2019-01-31 00:00:00', '', ''),
(17, 77, 'JACK INPUT F/O INTERMITTENT', 80, 'No', '', '', '', '', NULL, NULL, '', '', '2019-01-31 00:00:00', '', ''),
(18, 79, 'ENGINE 1 FAILED TO START', 142, 'No', '', '', '', '', '2019-01-31 00:00:00', '2019-01-31 00:00:00', '', '', '2019-01-31 00:00:00', '', ''),
(20, 102, 'ENGINE FAIL TO START', 142, 'No', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ENGINE INSPECTED ACCORDING TO AMM-72-00', '33071', '2018-12-30 00:00:00', 'BUZ/2560/12/18', 'FOUND SATIS'),
(21, 103, 'ENGINE FAIL TO START', 142, 'No', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ENGINE INSPECTED ACCORDING TO AMM-72-00', '33071', '2018-12-30 00:00:00', 'BUZ/2560/12/18', 'FOUND SATIS'),
(22, 104, 'ENGINE FAIL TO START', 142, 'No', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ENGINE INSPECTED ACCORDING TO AMM-72-00', '33071', '2018-12-30 00:00:00', 'BUZ/2560/12/18', 'FOUND SATIS'),
(23, 105, '#1 ENGINE FAIL TO START', 142, 'No', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '#1 STARTER GEN REPLACED ACCORDING TO AMM-72-00', '33072', '2018-12-31 00:00:00', 'N/A', 'FOUND SATIS'),
(24, 69, 'DEFECT', 98, 'Yes', 'N/A', 'N/A', 'LACK OF SPARES', 'C', '2019-03-12 00:00:00', '2019-03-12 00:00:00', 'N/A', 'N/A', '2019-03-12 00:00:00', 'N/A', 'N/A');

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
(9, 20, 1, 'McCauley', '993223', 37, 15809.8, 1),
(10, 21, 1, 'McCauley', '780419', 71, 1779.97, 1),
(11, 21, 2, 'McCauley', '678334', 68, 1706.72, 1),
(12, 23, 1, '14SF-23', '20070715', 0, 18557.7, 1),
(13, 23, 2, '14SF-23', '2010120982', 0, 12012.7, 1),
(14, 25, 1, '-', '-', 0, 0, 1);

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
  `part_name` varchar(45) DEFAULT NULL,
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
(4, 21, '', '1A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 01:56:57', '', 1),
(5, 21, '', '2A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 1000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 01:57:15', '', 1),
(6, 21, '', '3A CHECK', '', '', '', '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 1500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 02:11:27', '', 1),
(7, 21, '', '4A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 2000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 02:40:54', NULL, 1),
(8, 21, '', '5A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 2500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 03:00:00', NULL, 1),
(9, 21, '', '6A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 3000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 05:37:57', NULL, 1),
(10, 21, '', '9A CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 4500, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 05:52:04', NULL, 1),
(11, 21, '', '1C CHECK', '', NULL, NULL, NULL, 3, 5, 7, 1, 5, 85, NULL, NULL, NULL, 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 5000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 19:59:07', NULL, 1),
(12, 21, '', '2C CHECK', '', NULL, NULL, NULL, 3, 5, 7, 1, 5, 85, NULL, NULL, NULL, 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 10000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 19:59:18', NULL, 1),
(14, 21, '', '3C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:18:03', NULL, 1),
(17, 21, '', '4C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 20000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:28:40', NULL, 1),
(18, 21, '', '5C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 25000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:36:30', NULL, 1),
(19, 21, '', '6C CHECK', NULL, '', NULL, '', 3, 5, 7, 1, 5, 85, '', '', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 0, 30000, '2019-03-31 00:00:00', 0, 0, 0, 'M', 0, 100, 2, 'M', '2019-01-26 20:42:46', NULL, 1),
(20, 21, 'N/A', ' ', NULL, 'SHOCK STRUT', '8800-137', '08MDT0758', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-08 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-26 21:28:45', NULL, 1),
(21, 21, '', ' ', NULL, 'DRAG STRUT', '8200-105', 'DCL451/95', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 01:41:14', NULL, 1),
(22, 21, '', ' ', NULL, 'TRAILING ARM', '8834-3', 'DCL-433', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:11:45', NULL, 1),
(23, 21, '', '  ', NULL, 'OUTTER CYLINDER', '8818-17', 'O7ALT0010', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:17:52', NULL, 1),
(24, 21, '', ' ', NULL, 'INNER CYLINDER', '8805-1', 'SN07WHM', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:20:28', NULL, 1),
(25, 21, '', ' ', NULL, 'PISTON SCHOCK STRUT', '8812-1', 'S10174', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:24:24', NULL, 1),
(26, 21, '', ' ', NULL, 'AXLE', '8832-1', '07MBM1349', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 25000, 0, '2029-01-01 00:00:00', 60000, 0, 10, 'Y', 1000, 0, 6, 'M', '2019-01-27 03:29:58', NULL, 1),
(27, 21, '', ' ', NULL, 'MLG SHOCK STRUT', '10100-113', '11MDT0781', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:22:12', NULL, 1),
(28, 21, '', ' ', NULL, 'MLG DRAG STRUT', '10200-7', 'DCL685/96', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:25:59', NULL, 1),
(29, 21, '', ' ', NULL, 'MLG YOKE ASSY', '10300-3', 'DCL639/95', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:28:19', NULL, 1),
(30, 21, '', ' ', NULL, 'MLG STABILIZER', '10400-105', 'DCL705/95', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:31:00', NULL, 1),
(31, 21, '', '', NULL, 'MLG PISTON', NULL, '10WHM160', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:34:17', NULL, 1),
(32, 21, '', '', NULL, 'MLG CYLINDER', NULL, '09EXC1578', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:36:45', NULL, 1),
(33, 21, '', '', NULL, 'MLG UPPER TQ LINK', NULL, '09EXC1744', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:40:19', NULL, 1),
(34, 21, '', '', NULL, 'MLG LOWER TQ LINK', NULL, '10EXC1578', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:42:27', NULL, 1),
(35, 21, '', '', NULL, 'MLG PIN STRUT TO YOKE', NULL, '11EXC5938', 2, 2, 1, 1, 11, 107, '', 'LH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 05:45:18', NULL, 1),
(36, 21, '', '', NULL, 'SHOCK STRUT', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:12:24', NULL, 1),
(37, 21, '', '', NULL, 'MLG DRAG STRUT', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:13:52', NULL, 1),
(38, 21, '', '', NULL, 'MLG YOKE ASSY', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:15:06', NULL, 1),
(39, 21, '', '', NULL, 'MLG STABILIZER STAY', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:15:58', NULL, 1),
(40, 21, '', '', NULL, 'MLG PISTON', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:17:01', NULL, 1),
(41, 21, '', '', NULL, 'MLG CYLINDER', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:18:47', NULL, 1),
(42, 21, '', '', NULL, 'MLG UPPER TQ LINK', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:19:32', NULL, 1),
(43, 21, '', '', NULL, 'MLG LOWER TQ LINK', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:20:49', NULL, 1),
(44, 21, '', '', NULL, 'MLG PIN STRUT TO YOKE', NULL, '', 2, 2, 1, 1, 11, 107, '', 'RH MLG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '2031-01-08 00:00:00', 60000, 0, 12, 'Y', 1000, 0, 6, 'M', '2019-01-27 06:22:06', NULL, 1),
(45, 21, '', ' ', NULL, 'LP IMPELLER', '3038060', '3F307', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 14:45:12', NULL, 1),
(46, 21, '', '', NULL, 'HP IMPELLER', NULL, 'A001HXY8', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 15:37:57', NULL, 1),
(47, 21, '', '', NULL, '', NULL, '', 2, 2, 8, 2, 2, 142, '', '', '', 62, 19.856666666667, 0, 0, '0000-00-00 00:00:00', 0, 0, '1970-01-01 00:00:00', 0, 0, 0, 'D', 0, 0, 0, 'D', '2019-01-29 16:15:05', NULL, 1),
(48, 21, '', '', NULL, '', NULL, '', 2, 2, 8, 2, 2, 142, '', '', '', 62, 19.856666666667, 0, 0, '0000-00-00 00:00:00', 0, 0, '1970-01-01 00:00:00', 0, 0, 0, 'D', 0, 0, 0, 'D', '2019-01-29 16:18:56', NULL, 1),
(49, 21, '', '', NULL, '', NULL, '', 2, 2, 8, 2, 2, 142, '', '', '', 62, 19.856666666667, 0, 0, '0000-00-00 00:00:00', 0, 0, '1970-01-01 00:00:00', 0, 0, 0, 'D', 0, 0, 0, 'D', '2019-01-29 16:19:48', NULL, 1),
(50, 21, '', '', NULL, '', NULL, '', 2, 2, 8, 2, 2, 142, '', '', '', 62, 19.856666666667, 0, 0, '0000-00-00 00:00:00', 0, 0, '1970-01-01 00:00:00', 0, 0, 0, 'D', 0, 0, 0, 'D', '2019-01-29 16:20:03', NULL, 1),
(51, 21, '', '', NULL, 'HP TURBINE FRONT COVER', NULL, 'A000RNF7', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:26:23', NULL, 1),
(52, 21, '', '', NULL, 'HP TURBINE REAR COVER', NULL, 'A001W361', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:28:36', NULL, 1),
(53, 21, '', '', NULL, 'HP TURBINE DISC', NULL, 'A002FHN5', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:30:53', NULL, 1),
(54, 21, '', '', NULL, 'HP TURBINE BLADES', NULL, 'VARIOUS', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:48:31', NULL, 1),
(55, 21, '', '', NULL, 'INTERCHANGE SEAL', NULL, 'TPAA7487', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:50:22', NULL, 1),
(56, 21, '', '', NULL, 'POWER TURBINE DISC STAGE 1', NULL, '97A643', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '1970-01-01 00:00:00', 30000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:52:22', NULL, 1),
(57, 21, '', '', NULL, 'POWER TURBINE DISC STAGE 2', NULL, '26B912', 2, 2, 8, 2, 2, 142, '', 'LH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '1970-01-01 00:00:00', 30000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-29 16:54:34', NULL, 1),
(58, 21, '', '', NULL, 'LP IMPELLER', NULL, 'A002N6XC', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:31:11', NULL, 1),
(59, 21, '', '', NULL, 'HP IMPELLER', NULL, 'A002XW4T', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:33:51', NULL, 1),
(60, 21, '', '', NULL, 'HP TURBINE FRONT COVER', NULL, 'A00392CE', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:36:13', NULL, 1),
(61, 21, '', '', NULL, 'HP TURBINE REAR COVER', NULL, 'A00396E8', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:38:37', NULL, 1),
(62, 21, '', '', NULL, 'HP TURBINE DISC', NULL, 'A00034Y7F', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:40:29', NULL, 1),
(63, 21, '', '', NULL, 'HP TURBINE BLADES', NULL, 'VARIOUS', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:43:07', NULL, 1),
(64, 21, '', '', NULL, 'INTERCHANGE SEAL', NULL, 'UAAC996', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:44:45', NULL, 1),
(65, 21, '', '', NULL, 'LP TURBINE DISC', NULL, 'A0034Y7F', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:47:12', NULL, 1),
(66, 21, '', '', NULL, 'POWER TURBINE DISC STAGE 1', NULL, 'A002XF58', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 30000, 0, '1970-01-01 00:00:00', 30000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:49:21', NULL, 1),
(67, 21, '', '', NULL, 'POWER TURBINE DISC STAGE 2', NULL, 'A002X3HL', 2, 2, 8, 3, 2, 142, '', 'RH ENG', '', 62, 19.856666666667, 0, 0, '2019-01-01 00:00:00', 15000, 0, '1970-01-01 00:00:00', 15000, 0, 0, 'D', 1000, 0, 0, 'D', '2019-01-30 15:51:59', NULL, 1),
(68, 21, '', '', NULL, 'HUB', NULL, '900-23', 2, 2, 8, 4, 2, 133, '', 'LH PROP', '', 39, 5.5566666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-01 10:51:31', NULL, 1),
(69, 21, '', '', NULL, 'BLADE NO. 1', NULL, '2013090062', 2, 2, 8, 4, 2, 133, '', 'RH PROP', '', 39, 5.5566666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-01 10:56:32', NULL, 1),
(70, 21, '', '', NULL, 'BLADE NO. 2', NULL, '2013090062', 2, 2, 8, 4, 2, 133, '', 'LH PROP', '', 39, 5.5566666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-01 10:58:35', NULL, 1),
(71, 21, '', '', NULL, 'BLADE NO. 3', NULL, '873397-23', 2, 2, 8, 4, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:00:50', NULL, 1),
(72, 21, '', '', NULL, 'BLADE NO. 4', NULL, '873397-23', 2, 2, 8, 4, 2, 142, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:03:19', NULL, 1),
(73, 21, '', '', NULL, 'ACTUATOR', NULL, '920310', 2, 2, 8, 4, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:05:51', NULL, 1),
(74, 21, '', '', NULL, 'TRANSFER TUBE', NULL, '98-09-026', 2, 2, 8, 4, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:07:55', NULL, 1),
(75, 21, '', '', NULL, 'PCU', NULL, '891123', 2, 2, 8, 4, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:10:05', NULL, 1),
(76, 21, '', '', NULL, 'PCU BALL SCREW', NULL, '850722', 2, 2, 8, 4, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 15000, '1970-01-01 00:00:00', 0, 15000, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:12:17', NULL, 1),
(77, 21, '', '', NULL, 'HUB', NULL, '900-23', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:14:30', NULL, 1),
(78, 21, '', '', NULL, 'BLADE NO. 1', NULL, '2006120397', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:16:27', NULL, 1),
(79, 21, '', '', NULL, 'BLADE NO. 2', NULL, '866438-15', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:17:51', NULL, 1),
(80, 21, '', '', NULL, 'BLADE NO. 3', NULL, '2013090062', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:19:15', NULL, 1),
(81, 21, '', '', NULL, 'BLADE NO. 4', NULL, '890443-23', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:20:40', NULL, 1),
(82, 21, '', '', NULL, 'ACTUATOR', NULL, 'PPI1010254', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:22:23', NULL, 1),
(83, 21, '', '', NULL, 'TRANSFER TUBE', NULL, '9703038', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:25:02', NULL, 1),
(84, 21, '', '', NULL, 'PCU', NULL, '870548', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:26:59', NULL, 1),
(85, 21, '', '', NULL, 'PCU BALL SCREW', NULL, '960216', 2, 2, 8, 5, 2, 133, '', '', '', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 10500, '1970-01-01 00:00:00', 0, 10500, 0, 'D', 0, 1000, 0, 'D', '2019-02-13 11:29:07', NULL, 1),
(86, 21, '2420/11', 'RESTORATION', NULL, 'AC GENERATOR', '31708-00A1', '98010', 1, 2, 3, 1, 14, 99, '', 'LH ENG', 'DHC-8 MPM 2420/11', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 50000, '2019-01-01 00:00:00', 0, 0, 0, 'D', 0, 500, 0, 'D', '2019-02-16 02:37:19', NULL, 1),
(87, 21, '2420/11', 'RESTORATION', NULL, 'AC GENERATOR RH', '31708-001A', '97016', 1, 2, 3, 3, 14, 99, '', 'RH ENG', 'DHC-8 MPM 2420/11', 1, 0.41666666666667, 0, 0, '2019-01-01 00:00:00', 0, 5000, '2019-01-01 00:00:00', 0, 60000, 0, 'D', 0, 500, 0, 'D', '2019-02-16 03:35:59', NULL, 1),
(88, 21, '', ' ', NULL, 'SHOCK STRUT', '', '08MDT0758', 2, 2, 1, 1, 11, 107, '', 'NLG', '', 1, 0.41666666666667, 0, 0, '0000-00-00 00:00:00', 0, 0, '1970-01-01 00:00:00', 0, 0, 0, 'D', 0, 0, 0, 'D', '2019-02-19 13:48:11', NULL, 1);

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
(42, 44, 2, 30000, 0, 12, 'Y'),
(43, 45, 3, 15000, 0, 0, 'D'),
(44, 46, 3, 15000, 0, 0, 'D'),
(45, 51, 3, 15000, 0, 0, 'D'),
(46, 52, 3, 15000, 0, 0, 'D'),
(47, 53, 3, 15000, 0, 0, 'D'),
(48, 54, 3, 15000, 0, 0, 'D'),
(49, 55, 3, 15000, 0, 0, 'D'),
(50, 56, 3, 30000, 0, 0, 'D'),
(51, 57, 3, 30000, 0, 0, 'D'),
(52, 58, 3, 15000, 0, 0, 'D'),
(53, 59, 3, 15000, 0, 0, 'D'),
(54, 60, 3, 1500, 0, 0, 'D'),
(55, 61, 3, 15000, 0, 0, 'D'),
(56, 62, 3, 15000, 0, 0, 'D'),
(57, 63, 3, 15000, 0, 0, 'D'),
(59, 65, 3, 15000, 0, 0, 'D'),
(60, 66, 3, 30000, 0, 0, 'D'),
(61, 67, 3, 15000, 0, 0, 'D'),
(62, 68, 3, 0, 10500, 0, 'D'),
(63, 69, 3, 0, 10500, 0, 'D'),
(64, 70, 3, 0, 10500, 0, 'D'),
(65, 71, 3, 0, 15000, 0, 'D'),
(66, 72, 3, 0, 15000, 0, 'D'),
(67, 73, 3, 0, 15000, 0, 'D'),
(68, 74, 3, 0, 15000, 0, 'D'),
(69, 75, 3, 0, 15000, 0, 'D'),
(70, 76, 3, 0, 15000, 0, 'D'),
(71, 77, 3, 0, 10500, 0, 'D'),
(72, 78, 3, 0, 10500, 0, 'D'),
(73, 79, 3, 0, 10500, 0, 'D'),
(74, 80, 3, 0, 10500, 0, 'D'),
(75, 81, 3, 0, 10500, 0, 'D'),
(76, 82, 3, 0, 10500, 0, 'D'),
(77, 83, 3, 0, 10500, 0, 'D'),
(78, 84, 3, 0, 10500, 0, 'D'),
(79, 85, 3, 0, 10500, 0, 'D'),
(82, 86, 2, 0, 10000, 0, 'D'),
(85, 87, 3, 0, 60000, 0, 'D'),
(92, 21, 2, 25000, 0, 0, 'D'),
(102, 20, 2, 25000, 0, 0, 'D');

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
  `username` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `user_role_id` int(2) NOT NULL,
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

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `user_role_id`, `tel`, `post`, `department`, `password`, `photo`, `date_added`) VALUES
(1, 'Martin', 'Njuguna', 'martin', 'martin.njau@live.com', 1, '0727905402', 'Software Support', 'Engineering', '07a022abfe3e49946b1ea1d6bc2b421a', 'martin.jpg', '2019-01-19 04:10:50'),
(2, 'David', 'Martin', 'breakage', 'njaumn.mn@gmail.com', 2, '0727905402', 'I.T officer', 'Engineering', '1cbfb724ceee46cd879df7c7cfbe7dca', 'photo.jpg', '2019-01-19 04:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(25) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `user_role`, `description`) VALUES
(1, 'admin', 'Administrator.\r\nHas full control over the system'),
(2, 'user', 'Can enter and view data only'),
(3, 'supervisor', 'Can enter, view, edit and save data but cannot approve documents'),
(4, 'manager', 'Can enter, view and save data, approve documents and create/delete accounts but cannot edit data');

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
-- Indexes for table `engine_trend_monitor`
--
ALTER TABLE `engine_trend_monitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trend_id` (`trend_id`);

--
-- Indexes for table `engine_trend_types`
--
ALTER TABLE `engine_trend_types`
  ADD PRIMARY KEY (`trend_id`);

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
-- Indexes for table `pireps`
--
ALTER TABLE `pireps`
  ADD PRIMARY KEY (`pirep_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `ata_chapter_id` (`ata_chapter_id`);

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
  ADD KEY `posted_by` (`posted_by`),
  ADD KEY `inspection_id` (`inspection_id`),
  ADD KEY `task_category_id` (`task_category_id`),
  ADD KEY `ata_chapter_id` (`ata_chapter_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircrafts`
--
ALTER TABLE `aircrafts`
  MODIFY `aircraft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `aircraft_models`
--
ALTER TABLE `aircraft_models`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ata_chapters`
--
ALTER TABLE `ata_chapters`
  MODIFY `ata_chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `comp_cat`
--
ALTER TABLE `comp_cat`
  MODIFY `comp_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `engine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
-- AUTO_INCREMENT for table `engine_trend_monitor`
--
ALTER TABLE `engine_trend_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `engine_trend_types`
--
ALTER TABLE `engine_trend_types`
  MODIFY `trend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `inspection_types`
--
ALTER TABLE `inspection_types`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
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
-- AUTO_INCREMENT for table `pireps`
--
ALTER TABLE `pireps`
  MODIFY `pirep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `propellers`
--
ALTER TABLE `propellers`
  MODIFY `propeller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `schedule_category`
--
ALTER TABLE `schedule_category`
  MODIFY `schedule_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedule_details`
--
ALTER TABLE `schedule_details`
  MODIFY `schedule_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
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
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Constraints for table `engine_trend_monitor`
--
ALTER TABLE `engine_trend_monitor`
  ADD CONSTRAINT `engine_trend_monitor_ibfk_1` FOREIGN KEY (`trend_id`) REFERENCES `engine_trend_types` (`trend_id`);

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
-- Constraints for table `pireps`
--
ALTER TABLE `pireps`
  ADD CONSTRAINT `pireps_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `pireps_ibfk_2` FOREIGN KEY (`ata_chapter_id`) REFERENCES `ata_chapters` (`ata_chapter_id`);

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
  ADD CONSTRAINT `schedules_ibfk_6` FOREIGN KEY (`posted_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `schedules_ibfk_7` FOREIGN KEY (`inspection_id`) REFERENCES `inspection_types` (`inspection_id`),
  ADD CONSTRAINT `schedules_ibfk_8` FOREIGN KEY (`task_category_id`) REFERENCES `task_category` (`task_category_id`),
  ADD CONSTRAINT `schedules_ibfk_9` FOREIGN KEY (`ata_chapter_id`) REFERENCES `ata_chapters` (`ata_chapter_id`);

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`user_role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
