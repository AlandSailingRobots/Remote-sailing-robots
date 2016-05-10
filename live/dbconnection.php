<?php

class DBConnection {

	private $dbconn;

	function __construct() {

		$host = 'localhost';
		$user = 'ithaax_testdata';
		//$user = 'root';
		$pass = 'test123data';
		//$pass = '';
	//	$user = 'ithaax_testdata';
		$user = 'root';
		//$pass = 'test123data';
		$pass = '';
		$dbname = 'ithaax_testdata';

		try {
			$this->dbconn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo 'Connected to DB<br/>';
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function getLatestID() {

		try {
			$sql = "SELECT id_system
					FROM system_dataLogs
					ORDER BY id_system
					DESC LIMIT 1;"
					;
			$result = $this->query($sql);
		} catch (PDOException $e) {
			die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
		}
		return $result;
	}

	public function getLatestData() {

		try {
			$sql = "SELECT * FROM system_dataLogs
							JOIN gps_dataLogs
							ON system_dataLogs.id_system=gps_dataLogs.id_gps
							JOIN course_calculation_dataLogs
							ON system_dataLogs.id_system=course_calculation_dataLogs.id_course_calculation
							JOIN windsensor_dataLogs
							ON system_dataLogs.id_system=windsensor_dataLogs.id_windsensor
							JOIN compass_dataLogs
							ON system_dataLogs.id_system=compass_dataLogs.id_compass_model
            	ORDER BY system_dataLogs.id_system
              DESC LIMIT 1;";
			$result = $this->query($sql);
		} catch (PDOException $e) {
			die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
		}
		return $result;
	}

	public function getLatestGpsData() {

		try {
			$sql = "SELECT *
					FROM gps_dataLogs
					ORDER BY id_gps
					DESC LIMIT 1;";
			$result = $this->query($sql);
		} catch (PDOException $e) {
			die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
		}
		return $result;
	}

public function getLatestCourseCalculationData() {

	try {
		$sql = "SELECT *
		FROM course_calculation_dataLogs
		ORDER BY id_course_calculation
		DESC LIMIT 1;";
	$result = $this->query($sql);
	} catch (PDOException $e) {
		die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
	}
	return $result;
	}

		public function getLatestWindSensorData() {

	try {
		$sql = "SELECT *
		FROM windsensor_dataLogs
		ORDER BY id_windsensor
		DESC LIMIT 1;";
	$result = $this->query($sql);
	} catch (PDOException $e) {
		die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
	}
	return $result;
	}

	public function getLatestSystemData() {

	try {
		$sql = "SELECT *
		FROM system_dataLogs
		ORDER BY id_system
		DESC LIMIT 1;";
	$result = $this->query($sql);
	} catch (PDOException $e) {
		die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
	}
	return $result;
	}

	public function getLatestCompassData() {

	try {
		$sql = "SELECT *
		FROM compass_dataLogs
		ORDER BY id_compass_model
		DESC LIMIT 1;";
	$result = $this->query($sql);
	} catch (PDOException $e) {
		die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
	}
	return $result;
	}

	public function getWaypoints() {
		try {
			$sql = "SELECT *
			FROM waypoints;";
			$result = $this->queryAll($sql);
		} catch (PDOException $e) {
			die("Woah, you wrote some crappy sql statement - lol. This went wrong: " . $e->getMessage());
		}
		return $result;
	}

	private function query($sql) {
		$sth = $this->dbconn->prepare($sql);
		$sth->execute();
		return $sth->fetch();
	}

	private function queryAll($sql) {
		$sth = $this->dbconn->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
}

//when in non-wsdl mode the uri option must be specified
$options=array('uri'=>'http://localhost/');
//create a new SOAP server
$server = new SoapServer(NULL,$options);
//attach the API class to the SOAP Server
$server->setClass('DBConnection');
//start the SOAP requests handler
$server->handle();

?>
