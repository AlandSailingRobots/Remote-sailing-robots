
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
var wind = null;
var trueWindArrow = null;
//var gpsHeading = null;
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

$(function() {
	$( "#boatDataGps" ).draggable();
	$( "#boatDataCourse" ).draggable();
	$( "#boatDataWindSensor" ).draggable();
	$( "#boatDataSystem" ).draggable();
	$( "#boatDataCompass" ).draggable();
});

$(document).ready(function(){
	document.getElementById("map").disabled = true;
	document.getElementById("map").style.visibility = "hidden";
	initBoat();
	drawBoat();
	resizeDiv();
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
	layerBoatHeading.style.width = size + 'px';
	layerBoatHeading.style.height = size + 'px';

	layerCompasHeading.style.width = size + 'px';
	layerCompasHeading.style.height = size + 'px';
	layerWaypoint.style.width = size + 'px';
	layerWaypoint.style.height = size + 'px';
	layerHeading.style.width = size + 'px';
	layerHeading.style.height = size + 'px';

	layerTWD.style.width = size + 'px';
	layerTWD.style.height = size + 'px';
	layerCanvas.style.width = size + 'px';
	layerCanvas.style.height = size + 'px';
	pingCanvas.style.width = size + 'px';
	pingCanvas.style.height = size + 'px';
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
		getLatestData();
		getLatestGpsData();
		getLatestCourseCalculationData();
		getLatestWindSensorData();
		getLatestSystemData();
		getLatestCompassData();
		getLatestLatitudeLongitudeData();
		currentId = latestId;
	}
}
function checkLatestId() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "idcheck"},
		success: function(data) {
			var obj = jQuery.parseJSON(data);
			latestId = parseInt(obj.id);
			$("#pingCanvas").hide().fadeIn(50, function() {
				$("#pingCanvas").fadeOut(350);
			});
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getdata"},
		success: function(data) {

			var dataObj = jQuery.parseJSON(data);
			console.log(dataObj);
			updateBoat(dataObj);
			drawBoat();

		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestGpsData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getGpsData"},

		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateGpsData(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestCourseCalculationData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getCourseCalculationData"},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateCourseCalculationData(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestWindSensorData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getWindSensorData"},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateWindSensorData(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestSystemData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getSystemData"},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateSystemData(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestCompassData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getCompassData"},
		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateCompassData(dataObj);
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function getLatestLatitudeLongitudeData() {

	$.ajax({
		url: 'dbapi.php',
		data: {'action': "getLongitudeLatitudeData"},
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

function map(dataObj) {
		var latLong = {lat: Number(dataObj.gps_lat), lng: Number(dataObj.gps_lon)}
		var mapDiv = document.getElementById("map");
		var map = new google.maps.Map(mapDiv, {
			center: latLong,
			zoom: 14
		});
		var marker = new google.maps.Marker({
			position: latLong,
			map: map,
			title: 'sailingrobots'
		});
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
	wind = new Image();
	wind.src = "images/windArrow.png";

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

function updateBoat(data) {
	vHEADING = parseFloat(data.heading);
	vWIND = parseFloat(data.direction);
	vSAIL = parseFloat(data.sail_command_sail);
	vRUDDER = parseFloat(data.rudder_command_rudder);
	vWAYPOINT = parseFloat(data.bearing_to_waypoint);
	vCTS = parseFloat(data.course_to_steer);
	vTACKING = parseFloat(data.tack);
	vTWD = parseFloat(data.true_wind_direction_calc);
	vGpsHeading = parseFloat(data.heading);
	vCompasHeading = parseFloat(data.heading);

	vSAIL = (((vSAIL-5824)/(7424-5824))*60)-60;
	vRUDDER = ((((vRUDDER-4352)/(7616-4352))*90)-45)*-1;
	vWIND = vWIND+180;
	if(vWIND > 360) {
		vWIND = vWIND -360;
	}

	var dataNames = "";
	var dataValues = "";
	Object.keys(data).forEach(function(key) {
		if(isNaN(key)) {
			dataNames +="<p>"+key+"</p>";
			dataValues += "<p>"+data[key]+"</p>";
		}
	});
	$("#dataName").html(dataNames);
	$("#dataValue").html(dataValues);
}
function updateGpsData(dataGps){
	var dataNamesGps = "";
	var dataValuesGps = "";
	Object.keys(dataGps).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesGps +="<p>"+key+"</p>";
			dataValuesGps += "<p>"+dataGps[key]+"</p>";
		}
	});
	$("#dataNameGps").html(dataNamesGps);
	$("#dataValueGps").html(dataValuesGps);
}

function updateCourseCalculationData(dataCourse){
	var dataNamesCourse = "";
	var dataValuesCourse = "";
	Object.keys(dataCourse).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesCourse +="<p>"+key+"</p>";
			dataValuesCourse += "<p>"+dataCourse[key]+"</p>";
		}
	});
	$("#dataNamesCourse").html(dataNamesCourse);
	$("#dataValuesCourse").html(dataValuesCourse);
}

function updateWindSensorData(dataWindSensor){
	var dataNamesWindSensor = "";
	var dataValuesWindSensor = "";
	Object.keys(dataWindSensor).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesWindSensor +="<p>"+key+"</p>";
			dataValuesWindSensor += "<p>"+dataWindSensor[key]+"</p>";
		}
	});
	$("#dataNamesWindSensor").html(dataNamesWindSensor);
	$("#dataValuesWindSensor").html(dataValuesWindSensor);
}

function updateSystemData(dataSystem){
	var dataNamesSystem = "";
	var dataValuesSystem = "";
	Object.keys(dataSystem).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesSystem +="<p>"+key+"</p>";
			dataValuesSystem += "<p>"+dataSystem[key]+"</p>";
		}
	});
	$("#dataNamesSystem").html(dataNamesSystem);
	$("#dataValuesSystem").html(dataValuesSystem);
}

function updateCompassData(dataCompass){
	var dataNamesCompass = "";
	var dataValuesCompass = "";
	Object.keys(dataCompass).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesCompass +="<p>"+key+"</p>";
			dataValuesCompass += "<p>"+dataCompass[key]+"</p>";
		}
	});
	$("#dataNamesCompass").html(dataNamesCompass);
	$("#dataValuesCompass").html(dataValuesCompass);
}

function drawBoat() {
/*	if(test() == true){
		window.alert("boo");
	}*/
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

	layerTWDctx.clearRect(0,0,layerCanvas.width,layerCanvas.height);
	layerTWDctx.save();

	layerHeadingctx.clearRect(0,0,layerCanvas.width, layerCanvas.height);
	layerHeadingctx.save();

	layerWaypointctx.clearRect(0,0,layerCanvas.width, layerCanvas.height);
	layerWaypointctx.save();

	layerCompasHeadingctx.clearRect(0,0,layerCanvas.width, layerCanvas.height);
	layerCompasHeadingctx.save();

	layerBoatHeadingctx.clearRect(0,0,layerCanvas.width, layerCanvas.height);
	layerBoatHeadingctx.save();

	layerCanvasctx.clearRect(0,0,layerCanvas.width,layerCanvas.height);
	layerCanvasctx.save();
	if(vTACKING === 1) {
		layerCanvasctx.drawImage(tacking,0,0);
		layerTWDctx.drawImage(tacking,0,0);
		layerHeadingctx.drawImage(tacking,0,0);
		layerWaypointctx.drawImage(tacking,0,0);
		layerCompasHeadingctx.drawImage(tacking,0,0);
		layerBoatHeadingctx.drawImage(tacking,0,0);

	}


	layerCanvasctx.drawImage(compass,0,0);
	layerCanvasctx.translate(layerCanvas.width/2, layerCanvas.height/2);


	layerTWDctx.drawImage(compass,0,0);
	layerTWDctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerTWDctx.rotate(vTWD * Math.PI/180);
	layerTWDctx.drawImage(trueWindArrow,-layerTWD.width/2,-layerTWD.width/2);


	layerHeadingctx.drawImage(compass,0,0);
	layerHeadingctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerHeadingctx.rotate(vCTS*Math.PI/180);
	layerHeadingctx.drawImage(heading,-layerCanvas.width/2,-layerCanvas.width/2);


	layerWaypointctx.drawImage(compass,0,0);
	layerWaypointctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerWaypointctx.rotate(vWAYPOINT*Math.PI/180);
	layerWaypointctx.drawImage(waypoint,-layerCanvas.width/2,-layerCanvas.width/2);



	// compass heading
	layerCompasHeadingctx.drawImage(compass,0,0);
	layerCompasHeadingctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerCompasHeadingctx.rotate((vCompasHeading)*Math.PI/180);
	layerCompasHeadingctx.drawImage(compasHeading,-layerCanvas.width/2,-layerCanvas.width/2);

	layerBoatHeadingctx.drawImage(compass,0,0);
	layerBoatHeadingctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerBoatHeadingctx.rotate(vHEADING*Math.PI/180);
	layerBoatHeadingctx.drawImage(boat,-layerCanvas.width/2,-layerCanvas.height/2);

	layerBoatHeadingctx.rotate((vWIND)*Math.PI/180);
	layerBoatHeadingctx.drawImage(wind,-layerCanvas.width/2,-layerCanvas.width/2);

	layerBoatHeadingctx.rotate((maindir*vSAIL-vWIND)*Math.PI/180);
	layerBoatHeadingctx.drawImage(mainsail,-layerCanvas.width/2,-layerCanvas.width/2);


	layerBoatHeadingctx.rotate((-maindir*vSAIL)*Math.PI/180);
	layerBoatHeadingctx.translate(0,-layerCanvas.height/6);
	layerBoatHeadingctx.rotate(jibdir*vSAIL*Math.PI/180);
	layerBoatHeadingctx.drawImage(jib,-layerCanvas.width/2,-layerCanvas.width/2);

	// roder
	layerBoatHeadingctx.rotate(-jibdir*vSAIL*Math.PI/180);
	layerBoatHeadingctx.translate(0,(layerCanvas.height/6)+(layerCanvas.height/3.6));
	layerBoatHeadingctx.rotate(vRUDDER*Math.PI/180);
	layerBoatHeadingctx.drawImage(rudder,-layerCanvas.width/2,-layerCanvas.width/2);


	layerBoatHeadingctx.restore();
	layerCompasHeadingctx.restore();
	layerWaypointctx.restore();
	layerHeadingctx.restore();
	layerCanvasctx.restore();
	layerTWDctx.restore();

	$("#pingCanvas").hide().fadeIn(50, function() {
		$("#pingCanvas").fadeOut(350);
	});

}
