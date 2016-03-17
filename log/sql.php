<?php

	class queryHandler {
  
		private $db;

		public function __construct() {
			$host = "localhost";
			$userName = root;
			$passWord = "";
			$dataBase = "ithaax_testdata";
			//username: ithaax_testdata & pass: test123data
			$this->db = new mysqli($host, $userName, $passWord, $host);
		}

		public function __destruct() {
			$this->db->close();
		}

		public function getDatalog() {
			$sq = "SELECT * FROM datalogs";

			$result = $this->db->query($sq);
			$rows = array();

			while($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}

			return $rows;
		}
	}

?>