<?php

class DBConnection {

	private $dbconn;

	function __construct() {

		//$user = 'ithaax_testdata';
		$user = 'root';
	//	$pass = 'test123data';
		$pass = '';
		$host = 'localhost';

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

	public function getLatestData($table, $id) {

		try {
			$sql = "SELECT *
					FROM $table
					ORDER BY $id
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
