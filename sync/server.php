<?php

	class ASRService {

		private $db;

		function __construct() {
			$this->db = new mysqli("localhost","ithaax_testdata","test123data","ithaax_testdata");
		//	$this->db = new mysqli("localhost","root","","ithaax_testdata");
		}

		function __destruct() {
			$this->db->close();
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
