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

		public function render($data) {
			$table="";
		//	print_r($data);
		/*	foreach($data as $row) {
				$table = $table."<tr>
						<td>".$row["id_system"]."</td>
						<td>".$row["boat_id"]."</td>
						<td>".$row["sail_command_sail"]."</td>
						<td>".$row["rudder_command_rudder"]."</td>
						<td>".$row["sail_servo_position"]."</td>
						<td>".$row["rudder_servo_position"]."</td>
						<td>".$row["waypoint_id"]."</td>
						<td>".$row["true_wind_direction_calc"]."</td>
						<td>".$row["id_gps"]."</td>
						<td>".$row["time"]."</td>
						<td>".$row["latitude"]."</td>
						<td>".$row["speed"]."</td>
						<td>".$row["heading"]."</td>
						<td>".$row["satellites_used"]."</td>
						<td>".$row["longitude"]."</td>
						<td>".$row["id_course_calculation"]."</td>
						<td>".$row["distance_to_waypoint"]."</td>
						<td>".$row["bearing_to_waypoint"]."</td>
						<td>".$row["course_to_steer"]."</td>
						<td>".$row["tack"]."</td>
						<td>".$row["going_starboard"]."</td>
						<td>".$row["id_windsensor"]."</td>
						<td>".$row["direction"]."</td>
						<td>".$row["speed"]."</td>
						<td>".$row["temperature"]."</td>
						<td>".$row["id_compass_model"]."</td>
						<td>".$row["heading"]."</td>
						<td>".$row["pitch"]."</td>
						<td>".$row["roll"]."</td>
					</tr>";
			}*/
			return $table;
		}
	}
?>
