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
			}
			return "<div id='mapBtn'>
					<input type='button' value='maps/boat' onclick='hideShowMapBoat()' />
			</div>
			<div id='boatCanvas'>
				<canvas width='900px' height='900px' id='pingCanvas'></canvas>
				<canvas width='900px' height='900px' id='layerCanvas'></canvas>
				<canvas width='900px' height='900px' id='layerHeading'></canvas>
				<canvas width='900px' height='900px' id='layerTWD'></canvas>
				<canvas width='900px' height='900px' id='layerWaypoint'></canvas>
				<canvas width='900px' height='900px' id='layerCompasheading'></canvas>
				<canvas width='900px' height='900px' id='layerBoat'></canvas>

				<div id='map'></div>

			</div>
			<div id='boatData'>
					<div id='boatDataGps' draggable=true>
						<h2>Gps Data</h2>
						<div id='dataNameGps' ></div>
						<div id='dataValueGps'></div>
					</div>
					<div id='boatDataCourse' draggable=true>
						<h2>CourseData</h2>
						<div id='dataNamesCourse'></div>
						<div id='dataValuesCourse'></div>
					</div>
					<div id='boatDataWindSensor' draggable=true>
						<h2>WindSensorData</h2>
						<div id='dataNamesWindSensor'></div>
						<div id='dataValuesWindSensor'></div>
					</div>
					<div id='boatDataSystem' draggable=true>
						<h2>SystemDataLogs</h2>
						<div id='dataNamesSystem'></div>
						<div id='dataValuesSystem'></div>
					</div>
					<div id='boatDataCompass' draggable=true>
						<h2>CompassData</h2>
						<div id='dataNamesCompass'></div>
						<div id='dataValuesCompass'></div>
					</div>
				</div>

			<div id='loglist'>
				<table id='datalog' class='display' cellspacing='0' width='100%'>
			        <thead>
			            <tr>
										<th>id_system</th>
										<th>boat_id</th>
										<th>sail_command_sail</th>
										<th>rudder_command_rudder</th>
										<th>sail_servo_position</th>
										<th>rudder_servo_position</th>
										<th>waypoint_id</th>
										<th>true_wind_direction_calc</th>
										<th>id_gps</th>
										<th>time</th>
										<th>latitude</th>
										<th>speed</th>
										<th>heading</th>
										<th>satellites_used</th>
										<th>longitude</th>
										<th>id_course_calculation</th>
										<th>distance_to_waypoint</th>
										<th>bearing_to_waypoint</th>
										<th>course_to_steer</th>
										<th>tack</th>
										<th>going_starboard</th>
										<th>id_windsensor</th>
										<th>direction</th>
										<th>speed</th>
										<th>temperature</th>
										<th>id_compass_model</th>
										<th>heading</th>
										<th>pitch</th>
										<th>roll</th>

			            </tr>
			        </thead>
			        <tbody>".$table."</tr>
			        </tbody>
			    </table>
			</div>";
		}
	}
?>
