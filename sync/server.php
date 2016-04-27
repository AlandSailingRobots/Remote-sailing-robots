<?php

	class ASRService {

		private $db;

		function __construct() {
			$this->db = new mysqli("localhost","ithaax_testdata","test123data","ithaax_testdata");
	//		$this->db = new mysqli("localhost","root","","ithaax_testdata");
		}

		function __destruct() {
			$this->db->close();
		}

		function checkIfNewConfigs() {
			$sql = "SELECT updated FROM config_updated";
			$result = $this->db->query($sql)->fetch_assoc();
			return $result['updated'];
		}

		function setConfigsUpdated() {
			$sql = "UPDATE config_updated SET updated = 0 where id=1";
			$result = $this->db->query($sql);
			$result->close();
		}

	  function getDatalog($boat) {
			$sq = "SELECT * FROM datalogs";
			if($result = $this->db->query($sq, MYSQLI_USE_RESULT)) {
				$rows;
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				$result->close();
				return $rows;
			} else {
				return new SoapFault("Server","Something went wrong");
			}
		}

		function getDatalogGps($boat) {
			$sq = "SELECT gps_time, gps_lat, gps_lon, gps_spd, gps_head, gps_sat
					FROM datalogs";
			if($result = $this->db->query($sq, MYSQLI_USE_RESULT)) {
				$rows;
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				$result->close();
				return $rows;
			} else {
				return new SoapFault("Server","Something went wrong");
			}
		}

		function getConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM configs WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$sc_cmd_clse,
				$sc_cmd_beam,
				$sc_cmd_brd,
				$sc_cmd_run,
				$sc_ang_beam,
				$sc_ang_brd,
				$sc_ang_run,
				$rc_cmd_xtrm,
				$rc_cmd_med,
				$rc_cmd_sml,
				$rc_cmd_mid,
				$rc_ang_med,
				$rc_ang_sml,
				$rc_ang_mid,
				$cc_ang_tack,
				$cc_ang_sect,
				$ws_modl,
				$ws_chan,
				$ws_port,
				$ws_baud,
				$ws_buff,
				$mc_port,
				$rs_chan,
				$rs_spd,
				$rs_acc,
				$ss_chan,
				$ss_spd,
				$ss_acc
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"sc_cmd_clse" => $sc_cmd_clse,
				"sc_cmd_beam" => $sc_cmd_beam,
				"sc_cmd_brd" => $sc_cmd_brd,
				"sc_cmd_run" => $sc_cmd_run,
				"sc_ang_beam" => $sc_ang_beam,
				"sc_ang_brd" => $sc_ang_brd,
				"sc_ang_run" => $sc_ang_run,
				"rc_cmd_xtrm" => $rc_cmd_xtrm,
				"rc_cmd_med" => $rc_cmd_med,
				"rc_cmd_sml" => $rc_cmd_sml,
				"rc_cmd_mid" => $rc_cmd_mid,
				"rc_ang_med" => $rc_ang_med,
				"rc_ang_sml" => $rc_ang_sml,
				"rc_ang_mid" => $rc_ang_mid,
				"cc_ang_tack" => $cc_ang_tack,
				"cc_ang_sect" => $cc_ang_sect,
				"ws_modl" => $ws_modl,
				"ws_chan" => $ws_chan,
				"ws_port" => $ws_port,
				"ws_baud" => $ws_baud,
				"ws_buff" => $ws_buff,
				"mc_port" => $mc_port,
				"rs_chan" => $rs_chan,
				"rs_spd" => $rs_spd,
				"rs_acc" => $rs_acc,
				"ss_chan" => $ss_chan,
				"ss_spd" => $ss_spd,
				"ss_acc" => $ss_acc
			);
			$stmt->close();
			return json_encode($config);
		}

		function getAllConfigs($boat) {
			return $this->getCourseCalculationConfig($boat) . $this->getMaestroControllerConfig($boat)
			. $this->getRudderCommandConfig($boat). $this->getRudderServoConfig($boat) . $this->getSailingRobotConfig($boat)
			. $this->getSailCommandConfig($boat) .  $this->getSailServoConfig($boat) . $this->getWaypointRoutingConfig($boat)
			. $this->getWindSensorConfig($boat). $this->getWindVaneConfig($boat);
		}

		function getCourseCalculationConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM course_calculation_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$tack_angle,
				$tack_max_angle,
				$tack_min_speed,
				$sector_angle
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"tack_angle" => $tack_angle,
				"tack_max_angle" => $tack_max_angle,
				"tack_min_speed" => $tack_min_speed,
				"sector_angle" => $sector_angle
			);
			$stmt->close();
			return json_encode($config);
		}

		function getMaestroControllerConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM maestro_controller_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$port
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"port" => $port
			);
			$stmt->close();
			return json_encode($config);
		}

		function getRudderCommandConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM rudder_command_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$extreme_command,
				$midship_command
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"extreme_command" => $extreme_command,
				"midship_command" => $midship_command
			);
			$stmt->close();
			return json_encode($config);
		}

		function getRudderServoConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM rudder_servo_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$channel,
				$speed,
				$acceleration
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"channel" => $channel,
				"speed" => $speed,
				"acceleration" => $acceleration
			);
			$stmt->close();
			return json_encode($config);
		}

		function getSailingRobotConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM sailing_robot_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$flag_heading_compass,
				$loop_time,
				$scanning
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"flag_heading_compass" => $flag_heading_compass,
				"loop_time" => $loop_time,
				"scanning" => $scanning
			);
			$stmt->close();
			return json_encode($config);
		}

		function getSailCommandConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM sail_command_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$close_reach_command,
				$run_command
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"close_reach_command" => $close_reach_command,
				"run_command" => $run_command
			);
			$stmt->close();
			return json_encode($config);
		}

		function getSailServoConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM sail_servo_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$channel,
				$speed,
				$acceleration
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"channel" => $channel,
				"speed" => $speed,
				"acceleration" => $acceleration
			);
			$stmt->close();
			return json_encode($config);
		}

		function getWaypointRoutingConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM waypoint_routing_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$radius_ratio,
				$sail_adjust_time,
				$adjust_degree_limit
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"radius_ratio" => $radius_ratio,
				"sail_adjust_time" => $sail_adjust_time,
				"adjust_degree_limit" => $adjust_degree_limit
			);
			$stmt->close();
			return json_encode($config);
		}

		function getWindSensorConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM windsensor_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$port,
				$baud_rate
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"port" => $port,
				"baud_rate" => $baud_rate
			);
			$stmt->close();
			return json_encode($config);
		}

		function getWindVaneConfig($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT * FROM wind_vane_config WHERE id = ?;");
			$stmt->bind_param("i", $setup["cfg_id"]);
			$stmt->execute();
			$stmt->bind_result(
				$id,
				$use_self_steering,
				$wind_sensor_self_steering,
				$self_steering_intervall
			);
			$stmt->fetch();
			$config[] = array(
				"id" => 1,
				"use_self_steering" => $use_self_steering,
				"wind_sensor_self_steering" => $wind_sensor_self_steering,
				"self_steering_intervall" => $self_steering_intervall
			);
			$stmt->close();
			return json_encode($config);
		}




		function getRoute($boat) {
			$setup = $this->getFleetData($boat);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT wpt_id, lat, lon FROM routes WHERE rte_id = ?;");
			$stmt->bind_param("i", $setup["rte_id"]);
			$stmt->execute();
			$stmt->bind_result($wpt_id, $lat, $lon);
			$route;
			while($stmt->fetch())
				$route[] = array("id" => $wpt_id, "lat" => $lat, "lon" => $lon);
			$stmt->close();
			return json_encode($route);
		}

		function getFleetData($boat) {
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT cfg_id, cfg_rev, rte_id, rte_rev FROM fleet WHERE boat_id = ?;");
			$stmt->bind_param("s", $boat);
			$stmt->execute();
			$stmt->bind_result($cfg_id, $cfg_rev, $rte_id, $rte_rev);
			$stmt->fetch();
			$setup = array("cfg_id" => $cfg_id, "cfg_rev" => $cfg_rev, "rte_id" => $rte_id, "rte_rev" => $rte_rev);
			$stmt->close();
			return $setup;
		}

		function getSetup($boat) {
			$setup = $this->getFleetData($boat);
			$data[] = array(
				"id" => 1,
				"cfg_rev" => $setup["cfg_rev"],
				"rte_rev" => $setup["rte_rev"]
			);
			return json_encode($data);
		}

		function getUser($boat, $pwd) {
			/*
			$stmt = $this->db->stmt_init();
			$stmt->prepare("SELECT COUNT(*) FROM fleet WHERE boat_id = ? AND boat_pwd = ?;");
			$stmt->bind_param("ss", $boat, $pwd);
			$stmt->execute();
			$stmt->bind_result($rows);
			$stmt->fetch();
			$stmt->close();*/
			$rows = 0;
			if($this->db->ping()) {
				$rows = 1;
			}
			return $rows;
		}

		function pushLogs($boat, $data) {
			$setup = $this->getFleetData($boat);
			$data = json_decode($data,true);
			$stmt = $this->db->stmt_init();
			$stmt->prepare("INSERT INTO datalogs VALUES(NULL,?,NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
			$result;
			$foreignKey;
			foreach($data["datalogs"] as $row) {
				$stmt->bind_param("ssddddiiiiidddiidiiississ",
					$boat,
					$row["gps_time"],
					$row["gps_lat"],
					$row["gps_lon"],
					$row["gps_spd"],
					$row["gps_head"],
					$row["gps_sat"],
					$row["sc_cmd"],
					$row["rc_cmd"],
					$row["ss_pos"],
					$row["rs_pos"],
					$row["cc_dtw"],
					$row["cc_btw"],
					$row["cc_cts"],
					$row["cc_tack"],
					$row["ws_dir"],
					$row["ws_spd"],
					$row["ws_tmp"],
					$row["wpt_cur"],
					$setup["cfg_id"],
					$setup["cfg_rev"],
					$row["cfg_rev"],
					$setup["rte_id"],
					$setup["rte_rev"],
					$row["rte_rev"]
				);
				/*
					<message>{"datalogs":[{"id":"laiva","gps_time":"0000-00-00 00:00:00","gps_lat":"1.0","gps_lon":"1.0","gps_spd":"1.0","gps_head":"1.0",
					"gps_sat":"1","sc_cmd":"1","rc_cmd":"1","ss_pos":"1","rs_pos":"1","cc_dtw":"1.0","cc_btw":"1.0","cc_cts":"1.0","cc_tack":"1",
					"ws_dir":"1","ws_spd":"1.0","ws_tmp":"1","wpt_cur":"1","cfg_rev":"1","rte_rev":"1"}]}</message>
				*/


				$stmt->execute();

				if($stmt->affected_rows === 1) {
					$foreignKey[$row["id"]] = $stmt->insert_id;
					$result[] = array("tab" => "datalogs", "id" => $row["id"]);
				} else {
					$foreignKey[$row["id"]] = NULL;
				}
			}
			$stmt->close();
			$stmt = $this->db->stmt_init();
			$stmt->prepare("INSERT INTO messages VALUES(NULL,?,?,?,?);");
			foreach($data["messages"] as $row) {
				$stmt->bind_param("sssi",
					$row["gps_time"],
					$row["type"],
					$row["msg"],
					$foreignKey[$row["log_id"]]
				);
				$stmt->execute();

				if($stmt->affected_rows  === 1) {
					$result[] = array("tab" => "messages", "id" => $row["id"]);
				}
			}
			$stmt->close();
			return json_encode($result);
		}

		function pushWaypoint($data){
			$data = json_decode($data,true);
			$waypoint = $this->db->stmt_init();
			$waypoint->prepare("INSERT INTO waypoints VALUES(NULL,?,?,?,NULL);");

			foreach($data["waypoints"] as $row) {
				$waypoint->bind_param("ddi",

					$row["latitude"],
					$row["longitude"],
					$row["radius"]
				);
					$waypoint->execute();
				}
				$waypoint->close();
				return json_decode($data);
		}

	function pushAllLogs($boat, $data) {

			$data = json_decode($data,true);

			$compassStmt = $this->db->stmt_init();
			$courseCalculationStmt = $this->db->stmt_init();
			$gpsStmt = $this->db->stmt_init();
			$systemStmt = $this->db->stmt_init();
			$windSensorStmt = $this->db->stmt_init();


			$compassStmt->prepare("INSERT INTO compass_dataLogs VALUES(NULL,?,?,?, NULL);");
			$courseCalculationStmt->prepare("INSERT INTO course_calculation_dataLogs VALUES(NULL,?,?,?,?,?,NULL);");
			$gpsStmt->prepare("INSERT INTO gps_dataLogs VALUES(NULL,?,?,?,?,?,?,NULL);");
			$systemStmt->prepare("INSERT INTO system_dataLogs VALUES(NULL,?,?,?,?,?,?,?,NULL);");
			$windSensorStmt->prepare("INSERT INTO windsensor_dataLogs VALUES(NULL,?,?,?,NULL);");


			foreach($data["gps_datalogs"] as $row) {
				$gpsStmt->bind_param("sdddid",
					$row["time"],
					$row["latitude"],
					$row["speed"],
					$row["heading"],
					$row["satellites_used"],
					$row["longitude"]
				);
					$gpsStmt->execute();
				}
			foreach($data["course_calculation_datalogs"] as $row) {
				$courseCalculationStmt->bind_param("dddii",
					$row["distance_to_waypoint"],
					$row["bearing_to_waypoint"],
					$row["course_to_steer"],
					$row["tack"],
					$row["going_starboard"]
				);
					$courseCalculationStmt->execute();
				}
			foreach($data["compass_datalogs"] as $row) {
				$compassStmt->bind_param("iii",
					$row["heading"],
					$row["pitch"],
					$row["roll"]
				);
					$compassStmt->execute();
				}
			foreach($data["windsensor_datalogs"] as $row) {
				$windSensorStmt->bind_param("idd",
					$row["direction"],
					$row["speed"],
					$row["temperature"]
				);
					$windSensorStmt->execute();
				}


			foreach($data["system_datalogs"] as $row) {
				$systemStmt->bind_param("siiiiid",
					$boat,
					$row["sail_command_sail_state"],
					$row["rudder_command_rudder_state"],
					$row["sail_servo_position"],
					$row["rudder_servo_position"],
					$row["waypoint_id"],
					$row["true_wind_direction_calc"]

				);
					$systemStmt->execute();

				if($systemStmt->affected_rows === 1) {
					$foreignKey[$row["id"]] = $systemStmt->insert_id;
					$result[] = array("tab" => "system_dataLogs", "id_system" => $row["id"]);
				} else {
					$foreignKey[$row["id"]] = NULL;
				}
			}

			$systemStmt->close();
			$windSensorStmt->close();
			$compassStmt->close();
			$courseCalculationStmt->close();
			$gpsStmt->close();

			return json_encode($result);
		}
	}
	//when in non-wsdl mode the uri option must be specified
	$options=array('uri'=>'http://localhost/');
	//create a new SOAP server
	$server = new SoapServer(NULL,$options);
	//attach the API class to the SOAP Server
	$server->setClass('ASRService');
	//start the SOAP requests handler
	$server->handle();
?>
