<?php

	class View {

		private $model;
		private $css;
		private $tpl;

		public function __construct($model) {
			$this->tpl = Array('sidebar' => "", 'content' => "", 'css' => "");
			$this->css = Array('main' => "styles/main.css", 'table' => "styles/table.css");
			$this->model = $model;

			$sidebar = new Sidebar();
			$content = new Content();
			$this->tpl['sidebar'] = $sidebar->render();
			$this->tpl['content'] = $content->render($this->model->getDatalog());
		}

		public function render() {
			foreach($this->css as $c) {
				$this->tpl['css'] = $this->tpl['css'] . "<LINK href='".$c."' rel='stylesheet' type='text/css'>";
			}
			require_once $this->model->getTemplate();
		}
	}

	class Sidebar {

		private $logo;
		private $login;
		private $menu;
		private $button;

		public function __construct() {
			$this->logo = "images/asr_logo_name.png";
		}

		public function setLogo($logo) {
			$this->logo = $logo;
		}

		public function render() {
			$rendLogo = "<div id='logo'><a href='index.php'>
			<img border='0' src='".$this->logo."' width='216' height='120'>
			</a></div>";
			return $rendLogo;
		}
	}

	class Content {

		public function __construct() {

		}

		public function render($data) {
			$table="";
			foreach($data as $row) {
				$table = $table."<tr>
					<td>".$row["id"]."</td>
					<td>".$row["gps_time"]."</td>
					<td>".$row["gps_lat"]."</td>
					<td>".$row["gps_lon"]."</td>
					<td>".$row["gps_spd"]."</td>
					<td>".$row["gps_head"]."</td>
					<td>".$row["gps_sat"]."</td>
					<td>".$row["sc_cmd"]."</td>
					<td>".$row["rc_cmd"]."</td>
					<td>".$row["ss_pos"]."</td>
					<td>".$row["rs_pos"]."</td>
					<td>".$row["cc_dtw"]."</td>
					<td>".$row["cc_btw"]."</td>
					<td>".$row["cc_cts"]."</td>
					<td>".$row["cc_tack"]."</td>
					<td>".$row["ws_dir"]."</td>
					<td>".$row["ws_spd"]."</td>
					<td>".$row["ws_tmp"]."</td>
					<td>".$row["cfg_id"]."</td>
					<td>".$row["cfg_rev_srv"]."</td>
					<td>".$row["cfg_rev_boat"]."</td>
					<td>".$row["rte_id"]."</td>
					<td>".$row["rte_rev_srv"]."</td>
					<td>".$row["rte_rev_boat"]."</td>
					</tr>";
			}
			return "<div id='boatCanvas'>
				<canvas width='900px' height='900px' id='pingCanvas'></canvas>
				<canvas width='900px' height='900px' id='layerCanvas'></canvas>
				<div id='map'></div>
			</div>
			<div id='boatData'>
				<div id='dataName'></div>
				<div id='dataValue'></div>
				<input type='button' value='maps/boat' onclick='hideShowMapBoat()' />
			</div>
			<div id='loglist'>
				<table id='datalog' class='display' cellspacing='0' width='100%'>
			        <thead>
			            <tr>
			                <th>id</th>
							<th>gps_time</th>
							<th>gps_lat</th>
							<th>gps_long</th>
							<th>gps_speed</th>
							<th>gps_head</th>
							<th>gps_sat</th>
							<th>sc_com</th>
							<th>rc_com</th>
							<th>ss_pos</th>
							<th>rs_pos</th>
							<th>cc_dtw</th>
							<th>cc_btw</th>
							<th>cc_cts</th>
							<th>cc_tack</th>
							<th>ws_dir</th>
							<th>ws_spd</th>
							<th>ws_tmp</th>
							<th>cfg_id</th>
							<th>cfg_rev_srv</th>
							<th>cfg_rev_boat</th>
							<th>rte_id</th>
							<th>rte_rev_srv</th>
							<th>rte_rev_boat</th>
			            </tr>
			        </thead>
			        <tbody>".$table."</tr>
			        </tbody>
			    </table>
			</div>";
		}
	}
?>
