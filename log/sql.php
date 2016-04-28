<?php



	class queryHandler {

		private $db;

		public function __construct() {
			$host = "localhost";
			$userName = "root";
			$passWord = "";
			$dataBase = "ithaax_testdata";
		//	username: ithaax_testdata & pass: test123data
			$this->db = new mysqli($host, $userName, $passWord, $dataBase);
		}

		public function __destruct() {
			$this->db->close();
		}
		function getLim($lim2){
			return $lim2;
		}

		public function getDatalog() {
			$sq = "SELECT * FROM system_dataLogs
							JOIN gps_dataLogs
							ON system_dataLogs.id_system=gps_dataLogs.id_gps
							JOIN course_calculation_dataLogs
							ON system_dataLogs.id_system=course_calculation_dataLogs.id_course_calculation
							JOIN windsensor_dataLogs
							ON system_dataLogs.id_system=windsensor_dataLogs.id_windsensor
							JOIN compass_dataLogs
							ON system_dataLogs.id_system=compass_dataLogs.id_compass_model;";
			$result = $this->db->query($sq);
			$rows = array();

			while($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
			//print_r($rows);
			return $rows;
		}


	}

?>
