<?php

	class queryHandler {

		private $db;

		public function __construct() {
			$host = "localhost";
			$userName = "ithaax_testdata";
			$passWord = "test123data";
			$dataBase = "ithaax_testdata";
			//username: ithaax_testdata & pass: test123data
			$this->db = new mysqli($host, $userName, $passWord, $dataBase);
		}

		public function __destruct() {
			$this->db->close();
		}

		public function getConfigs() {
			$sq = "SELECT * FROM configs";

			$result = $this->db->query($sq);
			$rows = array();

			while($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}

			return $rows;
		}
	}

?>
