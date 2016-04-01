--
-- Recreates database 'mliljebl'
--

DROP DATABASE IF EXISTS mliljebl;
CREATE DATABASE mliljebl;
USE mliljebl;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `uNo` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `uFirstName` varchar(30) NOT NULL,
  `uLastName` varchar(30) NOT NULL,
  `uLogin` varchar(30) NOT NULL,
  `uPass` char(64) NOT NULL,
  UNIQUE (uLogin)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `datalogs` (
	`id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`logtime` TIMESTAMP,
	`sc_command` INTEGER,
	`rc_command` INTEGER,
	`cc_dtw` INTEGER,
	`cc_btw` INTEGER,
	`cc_cts` INTEGER,
	`cc_tack` INTEGER,
	`ws_buffersize` INTEGER,
	`ws_sensormodel` varchar(30),
	`ws_direction` INTEGER,
	`ws_speed` INTEGER,
	`ws_temperature` INTEGER,
	`rs_position` INTEGER,
	`ss_position` INTEGER,
	`gps_timestamp` varchar(30),
	`gps_latitude` DOUBLE,
	`gps_longitude` DOUBLE,
	`gps_altitude` DOUBLE,
	`gps_speed` DOUBLE,
	`gps_heading` DOUBLE,
	`gps_mode` INTEGER,
	`gps_satellites` INTEGER
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
