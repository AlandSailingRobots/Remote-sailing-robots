 
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/main.css">

<title>Page Title</title>
</head>
<body>

	<h1>Configuration page</h1>
	
	<div id="wrapper">
	    <div id="inner1">
			<?php
				require('getConfigs/get_course_calculation_config.php');
			?>
		</div>
	    <div id="inner2">
			<?php
				require('getConfigs/get_maestro_controller_config.php');
			?>
		</div>
		<div id="inner3">
			<?php
				require('getConfigs/get_rudder_command_config.php');
			?>
		</div>
	</div>

	<div id="wrapper">
	    <div id="inner1">
			<?php
				require('getConfigs/get_rudder_servo_config.php');
			?>
		</div>
		<div id="inner2">
			<?php
				require('getConfigs/get_sailing_robot_config.php');
			?>
		</div>
		<div id="inner3 ">
			<?php
				require('getConfigs/get_sail_command_config.php');
			?>
		</div>
	</div>

	<div id="wrapper">
	    <div id="inner1">
			<?php
				require('getConfigs/get_sail_servo_config.php');
			?>
		</div>
		<div id="inner2">
			<?php
				require('getConfigs/get_waypoint_routing_config.php');
			?>
		</div>
		<div id="inner3">
			<?php
				require('getConfigs/get_windsensor_config.php');
			?>
		</div>
	</div>

	<div id="wrapper">
	    <div id="inner1">
			<?php
				require('getConfigs/get_wind_vane_config.php');
			?>
		</div>
		<div id="inner2">
			<?php
				require('getConfigs/get_xbee_config.php');
			?>
		</div>
	</div>

</body>
</html> 

