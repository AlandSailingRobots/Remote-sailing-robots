<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<html>
<body>
	
	<div id='boatCanvas'>	 
		<canvas width='900px' height='900px' id='pingCanvas' ></canvas>
		<canvas width='900px' height='900px' id='layerCanvas'></canvas>
		<canvas width='900px' height='900px' id='layerHeading'></canvas>
		<canvas width='900px' height='900px' id='layerTWD'></canvas>
		<canvas width='900px' height='900px' id='layerWaypoint'></canvas>
		<canvas width='900px' height='900px' id='layerCompasHeading'></canvas>
		<canvas width='900px' height='900px' id='layerBoatHeading'></canvas>
	</div>

	<div id='boatDataGps'>
		<h2>Gps Data</h2>
		<div id='dataNameGps'></div>
		<div id='dataValueGps'></div>
		<h2>CourseData</h2>
		<div id='dataNamesCourse'></div>
		<div id='dataValuesCourse'></div>
		<h2>WindSensorData</h2>
		<div id='dataNamesWindSensor'></div>
		<div id='dataValuesWindSensor'></div>
		<h2>SystemDataLogs</h2>
		<div id='dataNamesSystem'></div>
		<div id='dataValuesSystem'></div>
		<h2>CompassData</h2>
		<div id='dataNamesCompass'></div>
		<div id='dataValuesCompass'></div>
		<div id='map'></div>
	</div>
</body>
</html>
