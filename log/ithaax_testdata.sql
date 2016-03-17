-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:56 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ithaax_testdata`
--
CREATE DATABASE IF NOT EXISTS `ithaax_testdata` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ithaax_testdata`;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL,
  `sc_cmd_clse` int(11) DEFAULT NULL,
  `sc_cmd_beam` int(11) DEFAULT NULL,
  `sc_cmd_brd` int(11) DEFAULT NULL,
  `sc_cmd_run` int(11) DEFAULT NULL,
  `sc_ang_beam` int(11) DEFAULT NULL,
  `sc_ang_brd` int(11) DEFAULT NULL,
  `sc_ang_run` int(11) DEFAULT NULL,
  `rc_cmd_xtrm` int(11) DEFAULT NULL,
  `rc_cmd_med` int(11) DEFAULT NULL,
  `rc_cmd_sml` int(11) DEFAULT NULL,
  `rc_cmd_mid` int(11) DEFAULT NULL,
  `rc_ang_med` int(11) DEFAULT NULL,
  `rc_ang_sml` int(11) DEFAULT NULL,
  `rc_ang_mid` int(11) DEFAULT NULL,
  `cc_ang_tack` int(11) DEFAULT NULL,
  `cc_ang_sect` int(11) DEFAULT NULL,
  `ws_modl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ws_chan` int(11) DEFAULT NULL,
  `ws_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ws_baud` int(11) DEFAULT NULL,
  `ws_buff` int(11) DEFAULT NULL,
  `mc_port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rs_chan` int(11) DEFAULT NULL,
  `rs_spd` int(11) DEFAULT NULL,
  `rs_acc` int(11) DEFAULT NULL,
  `ss_chan` int(11) DEFAULT NULL,
  `ss_spd` int(11) DEFAULT NULL,
  `ss_acc` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configs`
--

REPLACE INTO `configs` (`id`, `sc_cmd_clse`, `sc_cmd_beam`, `sc_cmd_brd`, `sc_cmd_run`, `sc_ang_beam`, `sc_ang_brd`, `sc_ang_run`, `rc_cmd_xtrm`, `rc_cmd_med`, `rc_cmd_sml`, `rc_cmd_mid`, `rc_ang_med`, `rc_ang_sml`, `rc_ang_mid`, `cc_ang_tack`, `cc_ang_sect`, `ws_modl`, `ws_chan`, `ws_port`, `ws_baud`, `ws_buff`, `mc_port`, `rs_chan`, `rs_spd`, `rs_acc`, `ss_chan`, `ss_spd`, `ss_acc`) VALUES
(1, 7424, 6600, 6200, 5824, 120, 80, 40, 7616, 7000, 6500, 5984, 60, 30, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 10, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(2, 3968, 5500, 6500, 8000, 120, 80, 40, 6912, 6500, 6000, 5440, 60, 30, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 10, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(3, 4800, 5500, 6000, 6500, 120, 80, 40, 6250, 6000, 5750, 5440, 80, 40, 15, 60, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 10, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(4, 4800, 5500, 6000, 6500, 120, 80, 40, 6250, 6000, 5750, 5440, 60, 20, 10, 60, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 10, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(5, 4800, 5500, 6000, 6500, 120, 80, 40, 6912, 6200, 5750, 5440, 60, 15, 5, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(6, 4800, 5500, 6000, 6500, 120, 80, 40, 6912, 6200, 5750, 5440, 60, 20, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(7, 4800, 5500, 6000, 6500, 120, 80, 40, 6912, 6200, 5750, 5440, 80, 30, 15, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(8, 4800, 5500, 6000, 6500, 120, 80, 40, 3968, 4680, 5130, 5440, 60, 20, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(9, 4800, 5500, 6000, 6500, 120, 80, 40, 6203, 6202, 6201, 5440, 60, 20, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0),
(10, 4800, 5500, 6000, 6500, 120, 80, 40, 5900, 5800, 5700, 5440, 30, 20, 10, 45, 5, 'CV7', 5, '/dev/ttyAMA0', 4800, 1, '/dev/ttyACM0', 4, 0, 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `datalogs`
--

DROP TABLE IF EXISTS `datalogs`;
CREATE TABLE IF NOT EXISTS `datalogs` (
  `id` int(11) NOT NULL,
  `boat_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `srv_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gps_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gps_lat` double DEFAULT NULL,
  `gps_lon` double DEFAULT NULL,
  `gps_spd` double DEFAULT NULL,
  `gps_head` double DEFAULT NULL,
  `gps_sat` int(11) DEFAULT NULL,
  `sc_cmd` int(11) DEFAULT NULL,
  `rc_cmd` int(11) DEFAULT NULL,
  `ss_pos` int(11) DEFAULT NULL,
  `rs_pos` int(11) DEFAULT NULL,
  `cc_dtw` double DEFAULT NULL,
  `cc_btw` double DEFAULT NULL,
  `cc_cts` double DEFAULT NULL,
  `cc_tack` int(11) DEFAULT NULL,
  `ws_dir` int(11) DEFAULT NULL,
  `ws_spd` double DEFAULT NULL,
  `ws_tmp` int(11) DEFAULT NULL,
  `wpt_cur` int(11) DEFAULT NULL,
  `cfg_id` int(11) DEFAULT NULL,
  `cfg_rev_srv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfg_rev_boat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rte_id` int(11) DEFAULT NULL,
  `rte_rev_srv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rte_rev_boat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15647 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datalogs`
--

REPLACE INTO `datalogs` (`id`, `boat_id`, `srv_time`, `gps_time`, `gps_lat`, `gps_lon`, `gps_spd`, `gps_head`, `gps_sat`, `sc_cmd`, `rc_cmd`, `ss_pos`, `rs_pos`, `cc_dtw`, `cc_btw`, `cc_cts`, `cc_tack`, `ws_dir`, `ws_spd`, `ws_tmp`, `wpt_cur`, `cfg_id`, `cfg_rev_srv`, `cfg_rev_boat`, `rte_id`, `rte_rev_srv`, `rte_rev_boat`) VALUES
(15646, 'BOAT01', '2014-09-19 09:00:46', '0000-00-00 00:00:00', 60.10330348, 19.86780839, 0.939, 333.5789, 0, 6500, 3968, 0, 0, 429.5815213, 109.4564597, 109.4564597, 0, 0, 1.806049513e-40, 2, 1, 10, 'cfg666', NULL, 5, 'rte666', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

DROP TABLE IF EXISTS `fleet`;
CREATE TABLE IF NOT EXISTS `fleet` (
  `id` int(11) NOT NULL,
  `boat_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfg_id` int(11) DEFAULT NULL,
  `cfg_rev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rte_id` int(11) DEFAULT NULL,
  `rte_rev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fleet`
--

REPLACE INTO `fleet` (`id`, `boat_id`, `boat_pwd`, `cfg_id`, `cfg_rev`, `rte_id`, `rte_rev`) VALUES
(1, 'BOAT01', 'PWD01', 10, 'cfg666', 5, 'rte666'),
(2, 'BOAT02', 'PWD01', 1, 'cfg0001', 2, 'rte0002');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `gps_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2078 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

REPLACE INTO `messages` (`id`, `gps_time`, `type`, `msg`, `log_id`) VALUES
(2009, '0000-00-00 00:00:00', 'message', 'setupDB()&done', NULL),
(2010, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', NULL),
(2011, '0000-00-00 00:00:00', 'message', 'config&state&updated', NULL),
(2012, '0000-00-00 00:00:00', 'message', 'route&state&updated', NULL),
(2013, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', NULL),
(2014, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2015, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2016, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2017, '0000-00-00 00:00:00', 'message', 'setupDB()&done', NULL),
(2018, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', NULL),
(2019, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', NULL),
(2020, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2021, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2022, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2023, '0000-00-00 00:00:00', 'message', 'setupGPS()&done', NULL),
(2024, '0000-00-00 00:00:00', 'message', 'setupCourseCalculation()&done', NULL),
(2025, '0000-00-00 00:00:00', 'message', 'setupRudderCommand()&done', NULL),
(2026, '0000-00-00 00:00:00', 'message', 'setupSailCommand()&done', NULL),
(2027, '0000-00-00 00:00:00', 'message', 'setupWaypoint()&done', NULL),
(2028, '0000-00-00 00:00:00', 'message', 'setupDB()&done', NULL),
(2029, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', NULL),
(2030, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', NULL),
(2031, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2032, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2033, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2034, '0000-00-00 00:00:00', 'message', 'setupGPS()&done', NULL),
(2035, '0000-00-00 00:00:00', 'message', 'setupCourseCalculation()&done', NULL),
(2036, '0000-00-00 00:00:00', 'message', 'setupRudderCommand()&done', NULL),
(2037, '0000-00-00 00:00:00', 'message', 'setupSailCommand()&done', NULL),
(2038, '0000-00-00 00:00:00', 'message', 'setupWaypoint()&done', NULL),
(2039, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6768'),
(2040, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6768'),
(2041, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', '6768'),
(2042, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2043, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2044, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2045, '0000-00-00 00:00:00', 'message', 'setupGPS()&done', NULL),
(2046, '0000-00-00 00:00:00', 'message', 'setupCourseCalculation()&done', NULL),
(2047, '0000-00-00 00:00:00', 'message', 'setupRudderCommand()&done', NULL),
(2048, '0000-00-00 00:00:00', 'message', 'setupSailCommand()&done', NULL),
(2049, '0000-00-00 00:00:00', 'message', 'setupWaypoint()&done', NULL),
(2050, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6784'),
(2051, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6784'),
(2052, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', '6784'),
(2053, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2054, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2055, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2056, '0000-00-00 00:00:00', 'message', 'setupGPS()&done', NULL),
(2057, '0000-00-00 00:00:00', 'message', 'setupCourseCalculation()&done', NULL),
(2058, '0000-00-00 00:00:00', 'message', 'setupRudderCommand()&done', NULL),
(2059, '0000-00-00 00:00:00', 'message', 'setupSailCommand()&done', NULL),
(2060, '0000-00-00 00:00:00', 'message', 'setupWaypoint()&done', NULL),
(2061, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6904'),
(2062, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6904'),
(2063, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6904'),
(2064, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6904'),
(2065, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6904'),
(2066, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6904'),
(2067, '0000-00-00 00:00:00', 'message', 'setupDB()&done', '6904'),
(2068, '0000-00-00 00:00:00', 'message', 'setupHTTPSync()&done', '6904'),
(2069, '0000-00-00 00:00:00', 'message', 'setupMaestro()&done', '6904'),
(2070, '0000-00-00 00:00:00', 'message', 'setupRudderServo()&done', NULL),
(2071, '0000-00-00 00:00:00', 'message', 'setupSailServo()&done', NULL),
(2072, '0000-00-00 00:00:00', 'message', 'setupWindSensor()&done', NULL),
(2073, '0000-00-00 00:00:00', 'message', 'setupGPS()&done', NULL),
(2074, '0000-00-00 00:00:00', 'message', 'setupCourseCalculation()&done', NULL),
(2075, '0000-00-00 00:00:00', 'message', 'setupRudderCommand()&done', NULL),
(2076, '0000-00-00 00:00:00', 'message', 'setupSailCommand()&done', NULL),
(2077, '0000-00-00 00:00:00', 'message', 'setupWaypoint()&done', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL,
  `rte_id` int(11) DEFAULT NULL,
  `wpt_id` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `routes`
--

REPLACE INTO `routes` (`id`, `rte_id`, `wpt_id`, `lat`, `lon`) VALUES
(1, 1, 1, 60.10358, 19.867784),
(2, 1, 2, 60.103677, 19.865273),
(3, 1, 3, 60.104489, 19.866818),
(4, 2, 1, 60.0774, 19.872817),
(8, 3, 1, 60.102017, 19.875117),
(6, 2, 2, 60.084467, 19.897334),
(7, 2, 3, 60.070434, 19.897384),
(11, 4, 2, 60.102017, 19.875117),
(10, 3, 2, 60.103733, 19.86575),
(12, 4, 1, 60.103733, 19.86575),
(13, 5, 1, 60.103889, 19.866667);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datalogs`
--
ALTER TABLE `datalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `datalogs`
--
ALTER TABLE `datalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15647;
--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2078;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
