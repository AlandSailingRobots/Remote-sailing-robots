<?php

	class Model {

		private $db;
		private $tpl = "";
		private $data = "";

		public function __construct() {
			require_once "sql.php";
			$this->db = new queryHandler();
			$this->tpl = "pages/main.html";
		}

		public function notify($var) {
			$this->data = $this->db->getConfigs();
		}

		public function getTemplate() {
			return $this->tpl;
		}

		public function getConfigs() {
			return $this->data;
		}
	}
?>