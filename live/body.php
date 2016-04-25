<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<html>
<body>
	<div id='mapbtn'>
			<input type="button" value="maps/boat" onclick="hideShowMapBoat()" />
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
	<div id='map'></div>
	<div id='boatCanvas'>
		<canvas width='900px' height='900px' id='pingCanvas' ></canvas>
		<canvas width='900px' height='900px' id='layerCanvas'></canvas>
		<canvas width='900px' height='900px' id='layerHeading'></canvas>
		<canvas width='900px' height='900px' id='layerTWD'></canvas>
		<canvas width='900px' height='900px' id='layerWaypoint'></canvas>
		<canvas width='900px' height='900px' id='layerCompasHeading'></canvas>
		<canvas width='900px' height='900px' id='layerBoatHeading'></canvas>
	</div>




</body>
</html>
