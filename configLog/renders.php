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
			$this->tpl['content'] = $content->render($this->model->getConfigs());
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


				<div id='updateConfig'>
				<form action='updateConfigDb.php' method='POST'>
				  <select name='configs'>
				    <option value='sc_cmd_clse'>sc_cmd_clse</option>
				    <option value='sc_cmd_beam'>sc_cmd_beam</option>
				    <option value='sc_cmd_brd' selected>sc_cmd_brd</option>
				    <option value='sc_cmd_run' >sc_cmd_run</option>
				    <option value='sc_ang_beam'>sc_ang_beam</option>
				    <option value='sc_ang_brd'>sc_ang_brd</option>
				    <option value='sc_ang_run'>sc_ang_run</option>
				    <option value='rc_cmd_xtrm' >rc_cmd_xtrm</option>
				    <option value='rc_cmd_med'>rc_cmd_med</option>
				    <option value='rc_cmd_sml'>rc_cmd_sml</option>
				    <option value='rc_cmd_mid'>rc_cmd_mid</option>
				    <option value='rc_ang_med' >rc_ang_med</option>
				    <option value='rc_ang_sml'>rc_ang_sml</option>
				    <option value='rc_ang_mid'>rc_ang_mid</option>
				    <option value='cc_ang_tack'>cc_ang_tack</option>
				    <option value='cc_ang_sect' >cc_ang_sect</option>
				    <option value='ws_modl'>ws_modl</option>
				    <option value='ws_chan'>ws_chan</option>
				    <option value='ws_port'>ws_port</option>
				    <option value='ws_baud' >ws_baud</option>
				    <option value='ws_buff'>ws_buff</option>
				    <option value='mc_port'>mc_port</option>
				    <option value='rs_chan'>rs_chan</option>
				    <option value='rs_spd' >rs_spd</option>
				    <option value='rs_acc'>rs_acc</option>
				    <option value='ss_chan'>ss_chan</option>
				    <option value='ss_spd'>ss_spd</option>
				    <option value='ss_acc' >ss_acc</option>

				  </select>
				  <br>
				  New value for config: <input type='text' name='configInput'><br>
				  Password: <input type='password' name='password'><br><br>
				  <input type='submit' value='Update' name='configSubmit'>
				</form>

				</div>

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