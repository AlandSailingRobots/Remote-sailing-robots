/*this is a massive file that handles all of the js code on the live site*/
$("#boatCanvas").hide();
$("#pingCanvas").hide();
$("#map").hide();
var showMap = false;
var layerBoatHeading = null;
var layerBoatHeadingctx = null;
var layerCompasHeading = null;
var layerCompasHeadingctx = null;
var layerWaypoint = null;
var layerWaypointctx = null;
var layerHeading = null;
var layerHeadingctx = null;
var layerTWD = null;
var layerTWDctx = null;
var layerCanvasctx = null;
var pingCanvasctx = null;
var layerCanvas = null;
var pingCanvas = null;

var boat = null;
var mainsail = null;
var jib = null;
var rudder = null;
var trueWindArrow = null;

var compass = null;
var heading = null;
var waypoint = null;
var tacking = null;
var ping = null;
var compasHeading = null;

var vHEADING = 0;
var vWIND = 0;
var vSAIL = 0;
var vRUDDER = 0;
var vWAYPOINT = 0;
var vCTS = 0;
var vTACKING = 0;
var vTWD = 0;
var vGpsHeading = 0;
var vCompasHeading = 0;

var latestId = -1;
var currentId = -1;

$(document).ready(function(){
	document.getElementById("map").disabled = true;
	document.getElementById("map").style.visibility = "hidden";
	initBoat();
	drawBoat();
	resizeDiv();
	getWaypoints();
	setUpdateTimer(3000);
});
$(window).resize(function() {
	$("#boatCanvas").hide();
	sleep(1000, resizeDiv);
});

function resizeDiv() {
	var width = window.innerWidth;
	var height = window.innerHeight;
	if( width < height ) {
		setCanvasSize(width);
	} else {
		setCanvasSize(height);
	}
	$("#boatCanvas").fadeIn(600);
}

function setCanvasSize(size) {
	layerBoatHeading.style.width = 500 + 'px';
	layerBoatHeading.style.height = 500 + 'px';

	layerCompasHeading.style.width = 500 + 'px';
	layerCompasHeading.style.height = 500 + 'px';
	layerWaypoint.style.width = 500 + 'px';
	layerWaypoint.style.height = 500 + 'px';
	layerHeading.style.width = 500 + 'px';
	layerHeading.style.height = 500 + 'px';

	layerTWD.style.width = 500 + 'px';
	layerTWD.style.height = 500 + 'px';
	layerCanvas.style.width = 500 + 'px';
	layerCanvas.style.height = 500 + 'px';
	pingCanvas.style.width = 500 + 'px';
	pingCanvas.style.height = 500 + 'px';
}

function sleep(millis, callback) {
    setTimeout(function()
            { callback(); }
    , millis);
}

function setUpdateTimer(interval) {
	setInterval('run()', interval);
}

function run() {
	checkLatestId();
	if(!isNaN(latestId) && latestId !== currentId) {
		getLatestData("getGpsData");
		getLatestData("getCourseCalculationData");
		getLatestData("getWindSensorData");
		getLatestData("getSystemData");
		getLatestData("getCompassData");
		currentId = latestId;
	}
}
function checkLatestId() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "idcheck"},
		success: function(data) {
			var obj = jQuery.parseJSON(data);
			latestId = parseInt(obj.id_system);
			$("#pingCanvas").hide().fadeIn(50, function() {
				$("#pingCanvas").fadeOut(350);
			});
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestData(table) {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': table},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data)
			updateBoat();
			drawBoat();
			updateData(dataObj);
			if (dataObj.hasOwnProperty('id_gps')) {
				updateMarker(dataObj);
			}

		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getWaypoints() {
	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getWaypoints"},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			map(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}


function hideShowMapBoat() {
	if(showMap == true) {
		document.getElementById("map").disabled = true;
		document.getElementById("map").style.visibility = "hidden";
		document.getElementById("boatCanvas").disabled = false;
		document.getElementById("boatCanvas").style.visibility = "visible";
		showMap = false;
	}
	else{
		document.getElementById("map").disabled = false;
		document.getElementById("map").style.visibility = "visible";
		document.getElementById("boatCanvas").disabled = true;
		document.getElementById("boatCanvas").style.visibility = "hidden";
		showMap = true;
	}
}

function updateMarker(dataObj) {
			var latLong = {lat: Number(dataObj.latitude), lng: Number(dataObj.longitude)}
		marker.setPosition(latLong);
}
function map(waypointsObj) {
		var latLong = {lat: Number(waypointsObj[0].latitude), lng: Number(waypointsObj[0].longitude)}
		var mapDiv = document.getElementById("map");
		 mapvar = new google.maps.Map(mapDiv, {
			center: latLong,
			zoom: 14
		});

			marker = new google.maps.Marker({
			map: mapvar,
			title: 'sailingrobots'
		});

		for (var i = 0; i < waypointsObj.length; i++) {
			var waypointMarkers = new google.maps.Marker({
 				position: new google.maps.LatLng(waypointsObj[i].latitude, waypointsObj[i].longitude),
				map: mapvar,
				icon :'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
				title: 'waypoints'
			});
		}

}


function initBoat() {
	layerBoatHeading = document.getElementById("layerBoatHeading");
	layerBoatHeadingctx = layerBoatHeading.getContext("2d");

	layerCompasHeading = document.getElementById("layerCompasHeading");
	layerCompasHeadingctx = layerCompasHeading.getContext("2d");

	layerWaypoint = document.getElementById("layerWaypoint");
	layerWaypointctx = layerWaypoint.getContext("2d");

	layerTWD = document.getElementById("layerTWD");
	layerTWDctx = layerTWD.getContext("2d");

	layerHeading = document.getElementById("layerHeading");
	layerHeadingctx = layerHeading.getContext("2d");

	layerCanvas = document.getElementById("layerCanvas");
	layerCanvasctx = layerCanvas.getContext("2d");

	pingCanvas = document.getElementById("pingCanvas");
	pingCanvasctx = pingCanvas.getContext("2d");

	ping = new Image();
	ping.src = "images/ping.png";
	boat = new Image();
	boat.src = "images/boat.png";
	mainsail = new Image();
	mainsail.src = "images/mainsail.png";
	jib = new Image();
	jib.src = "images/jib.png";
	rudder = new Image();
	rudder.src = "images/rudder.png";

	compasHeading = new Image();
	compasHeading.src = "images/compasHeading.png"

	trueWindArrow = new Image();
	trueWindArrow.src = "images/trueWindDirection.png";

	compass = new Image();
	compass.src = "images/compass.png";
	heading = new Image();
	heading.src = "images/headingArrow.png";
	waypoint = new Image();
	waypoint.src = "images/waypointArrow.png";
	tacking = new Image();
	tacking.src = "images/tacking.png";

	pingCanvasctx.drawImage(ping,0,0);

}
function updateBoat() {
	vSailMin = 5824;
	vSailMax = 7424;
	vSAIL = (((vSAIL-vSailMin)/(vSailMax-vSailMin))*60)-60;
	vRUDDER = ((((vRUDDER-4352)/(7616-4352))*90)-45)*-1;
	vWIND = vWIND+180;
	if(vWIND > 360) {
		vWIND = vWIND -360;
	}
}


function updateData(dataObj){
	var dataNames = "";
	var dataValues = "";
	Object.keys(dataObj).forEach(function(key) {
		if(isNaN(key)) {
			dataNames +="<p>"+key+"</p>";
			dataValues += "<p>"+dataObj[key]+"</p>";
		}
	});

	if (dataObj.hasOwnProperty('id_gps')) {
		vGpsHeading = parseFloat(dataObj.heading);
		$("#dataNameGps").html(dataNames);
		$("#dataValueGps").html(dataValues);
	}
	if (dataObj.hasOwnProperty('id_course_calculation')) {
			vWAYPOINT = parseFloat(dataObj.bearing_to_waypoint);
		$("#dataNamesCourse").html(dataNames);
		$("#dataValuesCourse").html(dataValues);
	}
	if (dataObj.hasOwnProperty('id_windsensor')) {
			$("#dataNamesWindSensor").html(dataNames);
			$("#dataValuesWindSensor").html(dataValues);
	}
	if (dataObj.hasOwnProperty('id_system')) {

		$("#dataNamesSystem").html(dataNames);
		$("#dataValuesSystem").html(dataValues);
	}
	if (dataObj.hasOwnProperty('id_compass_model')) {
		console.log("dasfdsa");
		vCompasHeading = parseFloat(dataObj.heading);
		$("#dataNamesCompass").html(dataNames);
		$("#dataValuesCompass").html(dataValues);
	}
}

function drawBoat() {
	clearRectLayer(layerTWDctx);
	clearRectLayer(layerHeadingctx);
	clearRectLayer(layerWaypointctx);
	clearRectLayer(layerCompasHeadingctx);
	clearRectLayer(layerBoatHeadingctx);
	clearRectLayer(layerCanvasctx);

	if(vTACKING === 1) {
		drawZeroPosition(layerCanvasctx, tacking);
		drawZeroPosition(layerTWDctx, tacking);
		drawZeroPosition(layerHeadingctx, tacking);
		drawZeroPosition(layerWaypointctx, tacking);
		drawZeroPosition(layerCompasHeadingctx, tacking);
		drawZeroPosition(layerCompasHeadingctx, tacking);
	}

	drawCompass();
	drawTWD();
	drawHeading();
	drawWaypoint();
	drawCompasHeading();
	draw_BoatHeading_Rudder_And_Sails();

	restoreLayer(layerBoatHeadingctx);
	restoreLayer(layerCompasHeadingctx);
	restoreLayer(layerWaypointctx);
	restoreLayer(layerHeadingctx);
	restoreLayer(layerCanvasctx);
	restoreLayer(layerTWDctx);
	}

	$("#pingCanvas").hide().fadeIn(50, function() {
		$("#pingCanvas").fadeOut(350);
	});

	function drawCompass() {
		drawZeroPosition(layerCompasHeadingctx, tacking);
		translateCanvas(layerCanvasctx);
	}
	function drawTWD() {
		drawComponent(layerTWDctx, vTWD, trueWindArrow);
	}
	function drawHeading() {
		drawComponent(layerHeadingctx, vGpsHeading, heading);
	}
	function drawWaypoint() {
		drawComponent(layerWaypointctx, vWAYPOINT, waypoint);
	}
	function drawCompasHeading() {
		drawComponent(layerCompasHeadingctx, vCompasHeading, compasHeading);
	}
	function drawComponent(layerctx, vValue, image) {
		layerctx.drawImage(compass,0,0);
		translateCanvas(layerctx);
		rotateCanvas(layerctx, vValue);
		drawImage(layerctx, image);
	}

	function draw_BoatHeading_Rudder_And_Sails() {
		var jibdir = 1;
		if (vWIND > 180 && vWIND < 210) {
			jibdir = -1;
		}
		if (vWIND >= 0 && vWIND < 150) {
			jibdir = -1;
		}
		var maindir = 1;
		if (vWIND < 180) {
			maindir = -1;
		}
		var radians = Math.PI/180;

		drawComponent(layerBoatHeadingctx, vCompasHeading, boat);
		rotateCanvas(layerBoatHeadingctx, vWIND);
		layerBoatHeadingctx.rotate((maindir*vSAIL-vWIND)*radians);
		layerBoatHeadingctx.drawImage(mainsail,-layerCanvas.width/2,-layerCanvas.width/2);
		layerBoatHeadingctx.rotate((-maindir*vSAIL) * radians);
		layerBoatHeadingctx.translate(0,-layerCanvas.height/6);
		layerBoatHeadingctx.rotate(jibdir*vSAIL*radians);
		layerBoatHeadingctx.drawImage(jib,-layerCanvas.width/2,-layerCanvas.width/2);
		layerBoatHeadingctx.rotate(-jibdir*vSAIL*radians);
		layerBoatHeadingctx.translate(0,(layerCanvas.height/6)+(layerCanvas.height/3.6));
		layerBoatHeadingctx.rotate(vRUDDER*radians);
		layerBoatHeadingctx.drawImage(rudder,-layerCanvas.width/2,-layerCanvas.width/2);
	}

	function drawZeroPosition(layerctx, image) {
		layerctx.drawImage(image,0,0);
	}

	function restoreLayer(layerctx){
		layerctx.restore();
	}

	function translateCanvas(layerctx) {
		layerctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	}

	function rotateCanvas(layerctx, vValue) {
		var radians = Math.PI/180;
		layerctx.rotate(vValue * radians);
	}

	function drawImage(layerctx, image) {
		layerctx.drawImage(image,-layerCanvas.width/2,-layerCanvas.width/2);
	}

	function clearRectLayer(layerctx) {
		layerctx.clearRect(0,0,layerCanvas.width,layerCanvas.height);
		layerctx.save();
	}
