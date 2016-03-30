<?php

class DBConnection {

	private $dbconn;

	function __construct() {

		$host = 'localhost';
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
			$sql = "SELECT id
					FROM datalogs
					ORDER BY id
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
			$sql = "SELECT *
					FROM datalogs
					ORDER BY id
					DESC LIMIT 1;"
					;
			$result = $this->query($sql);
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
