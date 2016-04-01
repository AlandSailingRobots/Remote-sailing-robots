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
					<td>".$row["sc_cmd_clse"]."</td>
					<td>".$row["sc_cmd_beam"]."</td>
					<td>".$row["sc_cmd_brd"]."</td>
					<td>".$row["sc_cmd_run"]."</td>
					<td>".$row["sc_ang_beam"]."</td>
					<td>".$row["sc_ang_brd"]."</td>
					<td>".$row["sc_ang_run"]."</td>
					<td>".$row["rc_cmd_xtrm"]."</td>
					<td>".$row["rc_cmd_med"]."</td>
					<td>".$row["rc_cmd_sml"]."</td>
					<td>".$row["rc_cmd_mid"]."</td>
					<td>".$row["rc_ang_med"]."</td>
					<td>".$row["rc_ang_sml"]."</td>
					<td>".$row["rc_ang_mid"]."</td>
					<td>".$row["cc_ang_tack"]."</td>
					<td>".$row["cc_ang_sect"]."</td>
					<td>".$row["ws_modl"]."</td>
					<td>".$row["ws_chan"]."</td>
					<td>".$row["ws_port"]."</td>
					<td>".$row["ws_baud"]."</td>
					<td>".$row["ws_buff"]."</td>
					<td>".$row["mc_port"]."</td>
					<td>".$row["rs_chan"]."</td>
					<td>".$row["rs_spd"]."</td>	
					<td>".$row["rs_acc"]."</td>
					<td>".$row["ss_chan"]."</td>
					<td>".$row["ss_spd"]."</td>
					<td>".$row["ss_acc"]."</td>
					</tr>";
			}
			return "<div id='boatCanvas'>
				<canvas width='900px' height='900px' id='pingCanvas'></canvas>
				<canvas width='900px' height='900px' id='layerCanvas'></canvas>
			</div>
			<div id='boatData'>
				<div id='dataName'></div>
				<div id='dataValue'></div>
			</div>
			<div id='loglist'>
				<table id='datalog' class='display' cellspacing='0' width='100%'>
			        <thead>
			            <tr>
			                <th>id</th>
							<th>sc_cmd_clse</th>
							<th>sc_cmd_beam</th>
							<th>sc_cmd_brd</th>
							<th>sc_cmd_run</th>
							<th>sc_ang_beam</th>
							<th>sc_ang_brd</th>
							<th>sc_ang_run</th>
							<th>rc_cmd_xtrm</th>
							<th>rc_cmd_med</th>
							<th>rc_cmd_sml</th>
							<th>rc_cmd_mid</th>
							<th>rc_ang_med</th>
							<th>rc_ang_sml</th>
							<th>rc_ang_mid</th>
							<th>cc_ang_tack</th>
							<th>cc_ang_sect</th>
							<th>ws_modl</th>
							<th>ws_chan</th>
							<th>ws_port</th>
							<th>ws_baud</th>
							<th>ws_buff</th>
							<th>mc_port</th>
							<th>rs_chan</th>
							<th>rs_spd</th>
							<th>rs_acc</th>
							<th>ss_chan</th>
							<th>ss_spd</th>
							<th>ss_acc</th>
			            </tr>
			        </thead>
			        <tbody>".$table."</tr>
			        </tbody>
			    </table>
			</div>";
		}
	}
?>