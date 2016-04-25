-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 10:14 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithaax_testdata`
--
CREATE DATABASE IF NOT EXISTS `ithaax_testdata` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ithaax_testdata`;

-- --------------------------------------------------------

--
-- Table structure for table `compass_dataLogs`
--

DROP TABLE IF EXISTS `compass_dataLogs`;
CREATE TABLE `compass_dataLogs` (
  `id_compass_model` int(11) NOT NULL,
  `heading` int(11) NOT NULL,
  `pitch` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `compass_dataLogs`
--

INSERT INTO `compass_dataLogs` (`id_compass_model`, `heading`, `pitch`, `roll`, `Timestamp`) VALUES
(1, 1337, 1337, 1337, '2016-04-20 14:18:09'),
(2, 1337, 1337, 1337, '2016-04-20 14:18:09'),
(53, 1337, 1337, 1337, '2016-04-21 07:53:48'),
(54, 1337, 1337, 1337, '2016-04-21 07:53:49'),
(55, 1337, 1337, 1337, '2016-04-21 07:53:51'),
(56, 1337, 1337, 1337, '2016-04-21 07:53:53'),
(57, 1337, 1337, 1337, '2016-04-21 07:53:54'),
(58, 1337, 1337, 1337, '2016-04-21 07:53:56'),
(59, 1337, 1337, 1337, '2016-04-21 07:53:57'),
(60, 1337, 1337, 1337, '2016-04-21 07:53:59'),
(61, 1337, 1337, 1337, '2016-04-21 07:54:00'),
(62, 1337, 1337, 1337, '2016-04-21 07:54:02'),
(63, 1337, 1337, 1337, '2016-04-21 07:54:04'),
(64, 1337, 1337, 1337, '2016-04-21 07:54:05'),
(65, 1337, 1337, 1337, '2016-04-21 07:54:07'),
(66, 1337, 1337, 1337, '2016-04-21 07:54:08'),
(67, 1337, 1337, 1337, '2016-04-21 07:54:10'),
(68, 1337, 1337, 1337, '2016-04-21 07:54:11'),
(69, 1337, 1337, 1337, '2016-04-21 07:54:13'),
(70, 1337, 1337, 1337, '2016-04-21 07:55:12'),
(71, 1337, 1337, 1337, '2016-04-21 07:55:15'),
(72, 1337, 1337, 1337, '2016-04-21 07:55:17'),
(73, 1337, 1337, 1337, '2016-04-21 07:55:20'),
(74, 1337, 1337, 1337, '2016-04-21 07:55:22'),
(75, 1337, 1337, 1337, '2016-04-21 07:55:25'),
(76, 1337, 1337, 1337, '2016-04-21 07:55:28'),
(77, 1337, 1337, 1337, '2016-04-21 07:55:30'),
(78, 1337, 1337, 1337, '2016-04-21 07:55:33'),
(79, 1337, 1337, 1337, '2016-04-22 13:32:48'),
(80, 1337, 1337, 1337, '2016-04-22 13:32:50'),
(81, 1337, 1337, 1337, '2016-04-22 13:32:51'),
(82, 1337, 1337, 1337, '2016-04-22 13:32:53'),
(83, 1337, 1337, 1337, '2016-04-22 13:32:54'),
(84, 1337, 1337, 1337, '2016-04-22 13:33:43'),
(85, 1337, 1337, 1337, '2016-04-22 13:33:44'),
(86, 1337, 1337, 1337, '2016-04-22 13:33:46'),
(87, 1337, 1337, 1337, '2016-04-22 13:33:47'),
(88, 1337, 1337, 1337, '2016-04-22 13:33:49'),
(89, 1337, 1337, 1337, '2016-04-22 13:33:51'),
(90, 1337, 1337, 1337, '2016-04-22 13:33:53'),
(91, 1337, 1337, 1337, '2016-04-22 13:33:54'),
(92, 1337, 1337, 1337, '2016-04-22 13:33:56'),
(93, 1337, 1337, 1337, '2016-04-22 13:33:58'),
(94, 1337, 1337, 1337, '2016-04-22 13:33:59'),
(95, 1337, 1337, 1337, '2016-04-22 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `sc_cmd_clse`, `sc_cmd_beam`, `sc_cmd_brd`, `sc_cmd_run`, `sc_ang_beam`, `sc_ang_brd`, `sc_ang_run`, `rc_cmd_xtrm`, `rc_cmd_med`, `rc_cmd_sml`, `rc_cmd_mid`, `rc_ang_med`, `rc_ang_sml`, `rc_ang_mid`, `cc_ang_tack`, `cc_ang_sect`, `ws_modl`, `ws_chan`, `ws_port`, `ws_baud`, `ws_buff`, `mc_port`, `rs_chan`, `rs_spd`, `rs_acc`, `ss_chan`, `ss_spd`, `ss_acc`) VALUES
(1, 40, 44, 44, 33, 33, 80, 33, 43, 33, 44, 5984, 88, 30, 10, 40, 44, 'CV7', 5, '/dev/ttyAMA0', 4800, 10, '77', 4, 0, 0, 6, 0, 55),
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
-- Table structure for table `config_updated`
--

DROP TABLE IF EXISTS `config_updated`;
CREATE TABLE `config_updated` (
  `updated` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config_updated`
--

INSERT INTO `config_updated` (`updated`, `id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_calculation_config`
--

DROP TABLE IF EXISTS `course_calculation_config`;
CREATE TABLE `course_calculation_config` (
  `id` int(11) NOT NULL,
  `tack_angle` double NOT NULL,
  `tack_max_angle` double NOT NULL,
  `tack_min_speed` double NOT NULL,
  `sector_angle` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_calculation_config`
--

INSERT INTO `course_calculation_config` (`id`, `tack_angle`, `tack_max_angle`, `tack_min_speed`, `sector_angle`) VALUES
(1, 33.33, 44.99, 66.11, 33.22);

-- --------------------------------------------------------

--
-- Table structure for table `course_calculation_dataLogs`
--

DROP TABLE IF EXISTS `course_calculation_dataLogs`;
CREATE TABLE `course_calculation_dataLogs` (
  `id_course_calculation` int(11) NOT NULL,
  `distance_to_waypoint` double NOT NULL,
  `bearing_to_waypoint` double NOT NULL,
  `course_to_steer` double NOT NULL,
  `tack` tinyint(1) NOT NULL,
  `going_starboard` tinyint(1) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_calculation_dataLogs`
--

INSERT INTO `course_calculation_dataLogs` (`id_course_calculation`, `distance_to_waypoint`, `bearing_to_waypoint`, `course_to_steer`, `tack`, `going_starboard`, `Timestamp`) VALUES
(51, 1337, 53, 1337, 1, 1, '2016-04-20 15:02:10'),
(52, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:48'),
(53, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:49'),
(54, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:51'),
(55, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:53'),
(56, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:54'),
(57, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:56'),
(58, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:57'),
(59, 1337, 53, 1337, 1, 1, '2016-04-21 07:53:59'),
(60, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:00'),
(61, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:02'),
(62, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:04'),
(63, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:05'),
(64, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:07'),
(65, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:08'),
(66, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:10'),
(67, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:12'),
(68, 1337, 53, 1337, 1, 1, '2016-04-21 07:54:13'),
(69, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:12'),
(70, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:15'),
(71, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:17'),
(72, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:20'),
(73, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:22'),
(74, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:25'),
(75, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:28'),
(76, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:30'),
(77, 1337, 53, 1337, 1, 1, '2016-04-21 07:55:33'),
(78, 1337, 53, 1337, 1, 1, '2016-04-22 13:32:48'),
(79, 1337, 53, 1337, 1, 1, '2016-04-22 13:32:50'),
(80, 1337, 53, 1337, 1, 1, '2016-04-22 13:32:51'),
(81, 1337, 53, 1337, 1, 1, '2016-04-22 13:32:53'),
(82, 1337, 53, 1337, 1, 1, '2016-04-22 13:32:55'),
(83, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:43'),
(84, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:44'),
(85, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:46'),
(86, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:48'),
(87, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:50'),
(88, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:51'),
(89, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:53'),
(90, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:55'),
(91, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:56'),
(92, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:58'),
(93, 1337, 53, 1337, 1, 1, '2016-04-22 13:33:59'),
(94, 1337, 53, 1337, 1, 1, '2016-04-22 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `datalogs`
--

DROP TABLE IF EXISTS `datalogs`;
CREATE TABLE `datalogs` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datalogs`
--

INSERT INTO `datalogs` (`id`, `boat_id`, `srv_time`, `gps_time`, `gps_lat`, `gps_lon`, `gps_spd`, `gps_head`, `gps_sat`, `sc_cmd`, `rc_cmd`, `ss_pos`, `rs_pos`, `cc_dtw`, `cc_btw`, `cc_cts`, `cc_tack`, `ws_dir`, `ws_spd`, `ws_tmp`, `wpt_cur`, `cfg_id`, `cfg_rev_srv`, `cfg_rev_boat`, `rte_id`, `rte_rev_srv`, `rte_rev_boat`) VALUES
(15646, 'BOAT01', '2016-04-01 13:58:43', '0000-00-00 00:00:00', 60.10330348, 19.86780839, 0.939, 333.5789, 0, 6500, 3968, 0, 0, 429.5815213, 109.4564597, 109.4564597, 0, 0, 1.806049513e-40, 2, 1, 10, 'cfg666', 'test', 5, 'rte666', 'test'),
(15664, 'BOAT01', '2016-04-18 15:01:54', '0000-00-00 00:00:00', 60.107429, 19.923938, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 53, 1337, 1, 1337, 1337, 1337, 1337, 10, 'cfg666', NULL, 5, 'rte666', NULL),
(15665, 'BOAT01', '2016-04-18 15:01:57', '0000-00-00 00:00:00', 60.107429, 19.923938, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 53, 1337, 1, 1337, 1337, 1337, 1337, 10, 'cfg666', NULL, 5, 'rte666', NULL),
(15666, 'BOAT01', '2016-04-19 09:56:37', '0000-00-00 00:00:00', 60.107429, 19.923938, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 53, 1337, 1, 1337, 1337, 1337, 1337, 10, 'cfg666', NULL, 5, 'rte666', NULL),
(15667, 'BOAT01', '2016-04-19 09:56:40', '0000-00-00 00:00:00', 60.107429, 19.923938, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 1337, 53, 1337, 1, 1337, 1337, 1337, 1337, 10, 'cfg666', NULL, 5, 'rte666', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

DROP TABLE IF EXISTS `fleet`;
CREATE TABLE `fleet` (
  `id` int(11) NOT NULL,
  `boat_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `boat_pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cfg_id` int(11) DEFAULT NULL,
  `cfg_rev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rte_id` int(11) DEFAULT NULL,
  `rte_rev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `boat_id`, `boat_pwd`, `cfg_id`, `cfg_rev`, `rte_id`, `rte_rev`) VALUES
(1, 'BOAT01', 'PWD01', 10, 'cfg666', 5, 'rte666'),
(2, 'BOAT02', 'PWD01', 1, 'cfg0001', 2, 'rte0002');

-- --------------------------------------------------------

--
-- Table structure for table `gps_dataLogs`
--

DROP TABLE IF EXISTS `gps_dataLogs`;
CREATE TABLE `gps_dataLogs` (
  `id_gps` int(11) NOT NULL,
  `time` time NOT NULL,
  `latitude` double NOT NULL,
  `speed` double NOT NULL,
  `heading` double NOT NULL,
  `satellites_used` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gps_dataLogs`
--

INSERT INTO `gps_dataLogs` (`id_gps`, `time`, `latitude`, `speed`, `heading`, `satellites_used`, `longitude`, `Timestamp`) VALUES
(84, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(85, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(86, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(87, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(88, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(89, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(90, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(91, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(92, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(93, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(94, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(95, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(96, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(97, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(98, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(99, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(100, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(101, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(102, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(103, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(104, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(105, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(106, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(107, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:17:24'),
(108, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:18:09'),
(109, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:18:10'),
(110, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:18:10'),
(111, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:18:11'),
(112, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:18:11'),
(113, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:30'),
(114, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:30'),
(115, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:31'),
(116, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:32'),
(117, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:32'),
(118, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:26:33'),
(119, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:17'),
(120, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:18'),
(121, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:18'),
(122, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:19'),
(123, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:52'),
(124, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:52'),
(125, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:53'),
(126, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:54'),
(127, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:55'),
(128, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:36:55'),
(129, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:39:14'),
(130, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:39:15'),
(131, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:39:15'),
(132, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:39:16'),
(133, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:39:17'),
(134, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:48'),
(135, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:49'),
(136, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:50'),
(137, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:50'),
(138, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:51'),
(139, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:52'),
(140, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:53'),
(141, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:53'),
(142, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:54'),
(143, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 14:59:54'),
(144, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:01:51'),
(145, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:01:51'),
(146, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:01:52'),
(147, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:01:53'),
(148, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:01:53'),
(149, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:05'),
(150, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:05'),
(151, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:06'),
(152, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:07'),
(153, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:07'),
(154, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:08'),
(155, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:08'),
(156, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:09'),
(157, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:10'),
(158, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-20 15:02:10'),
(159, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-21 07:53:48'),
(160, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:32:48'),
(161, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:32:50'),
(162, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:32:51'),
(163, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:32:53'),
(164, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:32:54'),
(165, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:43'),
(166, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:44'),
(167, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:46'),
(168, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:48'),
(169, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:50'),
(170, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:51'),
(171, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:53'),
(172, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:54'),
(173, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:56'),
(174, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:58'),
(175, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:33:59'),
(176, '00:00:00', 60.107429, 1337, 1337, 1337, 19.923938, '2016-04-22 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `maestro_controller_config`
--

DROP TABLE IF EXISTS `maestro_controller_config`;
CREATE TABLE `maestro_controller_config` (
  `id` int(11) NOT NULL,
  `port` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `gps_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `gps_time`, `type`, `msg`, `log_id`) VALUES
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
CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `rte_id` int(11) DEFAULT NULL,
  `wpt_id` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `rte_id`, `wpt_id`, `lat`, `lon`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `rudder_command_config`
--

DROP TABLE IF EXISTS `rudder_command_config`;
CREATE TABLE `rudder_command_config` (
  `id` int(11) NOT NULL,
  `extreme_command` int(11) NOT NULL,
  `midship_command` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rudder_servo_config`
--

DROP TABLE IF EXISTS `rudder_servo_config`;
CREATE TABLE `rudder_servo_config` (
  `id` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `acceleration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sailing_robot_config`
--

DROP TABLE IF EXISTS `sailing_robot_config`;
CREATE TABLE `sailing_robot_config` (
  `id` int(11) NOT NULL,
  `flag_heading_compass` tinyint(1) NOT NULL,
  `loop_time` double NOT NULL,
  `scanning` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sail_command_config`
--

DROP TABLE IF EXISTS `sail_command_config`;
CREATE TABLE `sail_command_config` (
  `id` int(11) NOT NULL,
  `close_reach_command` int(11) NOT NULL,
  `run_command` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sail_servo_config`
--

DROP TABLE IF EXISTS `sail_servo_config`;
CREATE TABLE `sail_servo_config` (
  `id` int(11) NOT NULL,
  `channel` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `acceleration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_dataLogs`
--

DROP TABLE IF EXISTS `system_dataLogs`;
CREATE TABLE `system_dataLogs` (
  `id_system` int(11) NOT NULL,
  `boat_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sail_command_sail` int(11) NOT NULL,
  `rudder_command_rudder` int(11) NOT NULL,
  `sail_servo_position` int(11) NOT NULL,
  `rudder_servo_position` int(11) NOT NULL,
  `waypoint_id` int(11) NOT NULL,
  `true_wind_direction_calc` double NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_dataLogs`
--

INSERT INTO `system_dataLogs` (`id_system`, `boat_id`, `sail_command_sail`, `rudder_command_rudder`, `sail_servo_position`, `rudder_servo_position`, `waypoint_id`, `true_wind_direction_calc`, `Timestamp`) VALUES
(51, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-20 15:02:10'),
(52, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-20 15:02:10'),
(53, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:48'),
(54, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:49'),
(55, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:51'),
(56, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:53'),
(57, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:54'),
(58, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:56'),
(59, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:57'),
(60, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:53:59'),
(61, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:00'),
(62, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:02'),
(63, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:03'),
(64, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:05'),
(65, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:07'),
(66, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:08'),
(67, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:10'),
(68, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:11'),
(69, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:54:13'),
(70, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:12'),
(71, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:15'),
(72, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:17'),
(73, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:20'),
(74, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:22'),
(75, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:25'),
(76, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:28'),
(77, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:30'),
(78, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-21 07:55:33'),
(79, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:28:59'),
(80, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:29:01'),
(81, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:18'),
(82, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:19'),
(83, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:48'),
(84, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:49'),
(85, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:51'),
(86, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:53'),
(87, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:32:54'),
(88, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:43'),
(89, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:44'),
(90, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:46'),
(91, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:47'),
(92, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:49'),
(93, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:51'),
(94, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:53'),
(95, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:54'),
(96, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:56'),
(97, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:58'),
(98, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:33:59'),
(99, 'BOAT01', 1337, 1337, 1337, 1337, 1337, 1337.1337, '2016-04-22 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `waypoint_routing_config`
--

DROP TABLE IF EXISTS `waypoint_routing_config`;
CREATE TABLE `waypoint_routing_config` (
  `id` int(11) NOT NULL,
  `radius_ratio` double NOT NULL,
  `sail_adjust_time` double NOT NULL,
  `adjust_degree_limit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `windsensor_config`
--

DROP TABLE IF EXISTS `windsensor_config`;
CREATE TABLE `windsensor_config` (
  `id` int(11) NOT NULL,
  `port` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `baud_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `windsensor_dataLogs`
--

DROP TABLE IF EXISTS `windsensor_dataLogs`;
CREATE TABLE `windsensor_dataLogs` (
  `id_windsensor` int(11) NOT NULL,
  `direction` int(11) NOT NULL,
  `speed` double NOT NULL,
  `temperature` double NOT NULL,
  `Server time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `windsensor_dataLogs`
--

INSERT INTO `windsensor_dataLogs` (`id_windsensor`, `direction`, `speed`, `temperature`, `Server time`) VALUES
(51, 1337, 1337, 1337, '2016-04-20 15:02:10'),
(52, 1337, 1337, 1337, '2016-04-21 07:53:48'),
(53, 1337, 1337, 1337, '2016-04-21 07:53:49'),
(54, 1337, 1337, 1337, '2016-04-21 07:53:51'),
(55, 1337, 1337, 1337, '2016-04-21 07:53:53'),
(56, 1337, 1337, 1337, '2016-04-21 07:53:54'),
(57, 1337, 1337, 1337, '2016-04-21 07:53:56'),
(58, 1337, 1337, 1337, '2016-04-21 07:53:57'),
(59, 1337, 1337, 1337, '2016-04-21 07:53:59'),
(60, 1337, 1337, 1337, '2016-04-21 07:54:00'),
(61, 1337, 1337, 1337, '2016-04-21 07:54:02'),
(62, 1337, 1337, 1337, '2016-04-21 07:54:04'),
(63, 1337, 1337, 1337, '2016-04-21 07:54:05'),
(64, 1337, 1337, 1337, '2016-04-21 07:54:07'),
(65, 1337, 1337, 1337, '2016-04-21 07:54:08'),
(66, 1337, 1337, 1337, '2016-04-21 07:54:10'),
(67, 1337, 1337, 1337, '2016-04-21 07:54:12'),
(68, 1337, 1337, 1337, '2016-04-21 07:54:13'),
(69, 1337, 1337, 1337, '2016-04-21 07:55:12'),
(70, 1337, 1337, 1337, '2016-04-21 07:55:15'),
(71, 1337, 1337, 1337, '2016-04-21 07:55:17'),
(72, 1337, 1337, 1337, '2016-04-21 07:55:20'),
(73, 1337, 1337, 1337, '2016-04-21 07:55:22'),
(74, 1337, 1337, 1337, '2016-04-21 07:55:25'),
(75, 1337, 1337, 1337, '2016-04-21 07:55:28'),
(76, 1337, 1337, 1337, '2016-04-21 07:55:30'),
(77, 1337, 1337, 1337, '2016-04-21 07:55:33'),
(78, 1337, 1337, 1337, '2016-04-22 13:32:48'),
(79, 1337, 1337, 1337, '2016-04-22 13:32:50'),
(80, 1337, 1337, 1337, '2016-04-22 13:32:51'),
(81, 1337, 1337, 1337, '2016-04-22 13:32:53'),
(82, 1337, 1337, 1337, '2016-04-22 13:32:55'),
(83, 1337, 1337, 1337, '2016-04-22 13:33:43'),
(84, 1337, 1337, 1337, '2016-04-22 13:33:44'),
(85, 1337, 1337, 1337, '2016-04-22 13:33:46'),
(86, 1337, 1337, 1337, '2016-04-22 13:33:48'),
(87, 1337, 1337, 1337, '2016-04-22 13:33:50'),
(88, 1337, 1337, 1337, '2016-04-22 13:33:51'),
(89, 1337, 1337, 1337, '2016-04-22 13:33:53'),
(90, 1337, 1337, 1337, '2016-04-22 13:33:55'),
(91, 1337, 1337, 1337, '2016-04-22 13:33:56'),
(92, 1337, 1337, 1337, '2016-04-22 13:33:58'),
(93, 1337, 1337, 1337, '2016-04-22 13:33:59'),
(94, 1337, 1337, 1337, '2016-04-22 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `wind_vane_config`
--

DROP TABLE IF EXISTS `wind_vane_config`;
CREATE TABLE `wind_vane_config` (
  `id` int(11) NOT NULL,
  `use_self_steering` tinyint(1) NOT NULL,
  `wind_sensor_self_steering` tinyint(1) NOT NULL,
  `self_steering_intervall` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xbee_config`
--

DROP TABLE IF EXISTS `xbee_config`;
CREATE TABLE `xbee_config` (
  `id` int(11) NOT NULL,
  `send` tinyint(1) NOT NULL,
  `recieve` tinyint(1) NOT NULL,
  `send_logs` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compass_dataLogs`
--
ALTER TABLE `compass_dataLogs`
  ADD PRIMARY KEY (`id_compass_model`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_updated`
--
ALTER TABLE `config_updated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_calculation_config`
--
ALTER TABLE `course_calculation_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_calculation_dataLogs`
--
ALTER TABLE `course_calculation_dataLogs`
  ADD PRIMARY KEY (`id_course_calculation`);

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
-- Indexes for table `gps_dataLogs`
--
ALTER TABLE `gps_dataLogs`
  ADD PRIMARY KEY (`id_gps`);

--
-- Indexes for table `maestro_controller_config`
--
ALTER TABLE `maestro_controller_config`
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
-- Indexes for table `rudder_command_config`
--
ALTER TABLE `rudder_command_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rudder_servo_config`
--
ALTER TABLE `rudder_servo_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sailing_robot_config`
--
ALTER TABLE `sailing_robot_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sail_command_config`
--
ALTER TABLE `sail_command_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sail_servo_config`
--
ALTER TABLE `sail_servo_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_dataLogs`
--
ALTER TABLE `system_dataLogs`
  ADD PRIMARY KEY (`id_system`);

--
-- Indexes for table `waypoint_routing_config`
--
ALTER TABLE `waypoint_routing_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `windsensor_config`
--
ALTER TABLE `windsensor_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `windsensor_dataLogs`
--
ALTER TABLE `windsensor_dataLogs`
  ADD PRIMARY KEY (`id_windsensor`);

--
-- Indexes for table `wind_vane_config`
--
ALTER TABLE `wind_vane_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xbee_config`
--
ALTER TABLE `xbee_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compass_dataLogs`
--
ALTER TABLE `compass_dataLogs`
  MODIFY `id_compass_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `config_updated`
--
ALTER TABLE `config_updated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_calculation_config`
--
ALTER TABLE `course_calculation_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course_calculation_dataLogs`
--
ALTER TABLE `course_calculation_dataLogs`
  MODIFY `id_course_calculation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `datalogs`
--
ALTER TABLE `datalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15668;
--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gps_dataLogs`
--
ALTER TABLE `gps_dataLogs`
  MODIFY `id_gps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `maestro_controller_config`
--
ALTER TABLE `maestro_controller_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2078;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rudder_command_config`
--
ALTER TABLE `rudder_command_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rudder_servo_config`
--
ALTER TABLE `rudder_servo_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sailing_robot_config`
--
ALTER TABLE `sailing_robot_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sail_command_config`
--
ALTER TABLE `sail_command_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sail_servo_config`
--
ALTER TABLE `sail_servo_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_dataLogs`
--
ALTER TABLE `system_dataLogs`
  MODIFY `id_system` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `waypoint_routing_config`
--
ALTER TABLE `waypoint_routing_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `windsensor_config`
--
ALTER TABLE `windsensor_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `windsensor_dataLogs`
--
ALTER TABLE `windsensor_dataLogs`
  MODIFY `id_windsensor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `wind_vane_config`
--
ALTER TABLE `wind_vane_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xbee_config`
--
ALTER TABLE `xbee_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
