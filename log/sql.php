<?php
	class queryHandler {

		private $db;

		public function __construct() {
			// $userName = "root";
			// $passWord = "";
			// $db = new PDO('mysql:host=localhost;dbname=ithaax_testdata',$userName, $passWord);
		//	$host = "localhost";

			//$dataBase = "ithaax_testdata";
		//	username: ithaax_testdata & pass: test123data
		//	$this->db = new mysqli($host, $userName, $passWord, $dataBase);
		}

		public function __destruct() {
		//	$this->db->close();
		}

		public function getDatalog() {

			//	username: ithaax_testdata & pass: test123data
			$userName = "root";
			$passWord = "";
			$db = new PDO('mysql:host=localhost;dbname=ithaax_testdata',$userName, $passWord);

				$sql = "SELECT * FROM system_dataLogs
								JOIN gps_dataLogs
								ON system_dataLogs.id_system=gps_dataLogs.id_gps
								JOIN course_calculation_dataLogs
								ON system_dataLogs.id_system=course_calculation_dataLogs.id_course_calculation
								JOIN windsensor_dataLogs
								ON system_dataLogs.id_system=windsensor_dataLogs.id_windsensor
								JOIN compass_dataLogs
								ON system_dataLogs.id_system=compass_dataLogs.id_compass_model
								LIMIT 2000;";

				$stmt = $db->prepare($sql);
				$stmt->execute();
				$result = array();
				while($row = $stmt->fetch() ){
					$result[] = $row;
			}

			return $result;
	}

}
?>
