<?php

	class queryHandler {
  
		private $db;

		public function __construct() {
			//username: ithaax_testdata & pass: test123data
			$this->db = new mysqli("localhost","root", "", "ithaax_testdata");
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