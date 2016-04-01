$("#boatCanvas").hide();
$("#pingCanvas").hide();

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
var gpsHeading = null;
var compass = null;
var heading = null;
var waypoint = null;
var tacking = null;
var ping = null;

var vHEADING = 0;
var vWIND = 0;
var vSAIL = 0;
var vRUDDER = 0;
var vWAYPOINT = 0;
var vCTS = 0;
var vTACKING = 0;
var vTWD = 0;
var vGpsHeading = 0;

var latestId = -1;
var currentId = -1;


$(document).ready(function(){
	initBoat();
	resizeDiv();
	drawBoat();
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
		data: {'action': "getData"},

		success: function(data) {
			var dataObj = jQuery.parseJSON(data);
			updateBoat(dataObj);
			drawBoat();
			//window.alert("hej");
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
			//window.alert(dataGps);
			var dataObj = jQuery.parseJSON(data);
			updateGpsData(dataObj);
			drawBoat();
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

function initBoat() {
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
	gpsHeading = new Image();
	gpsHeading.src = "images/GpsHeading.png";

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
	vHEADING = parseFloat(data.gps_head);
	vWIND = parseFloat(data.ws_dir);
	vSAIL = parseFloat(data.sc_cmd);
	vRUDDER = parseFloat(data.rc_cmd);
	vWAYPOINT = parseFloat(data.cc_btw);
	vCTS = parseFloat(data.cc_cts);
	vTACKING = parseFloat(data.cc_tack);
	vTWD = parseFloat(data.twd);
	vGpsHeading = parseFloat(data.heading);

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

function updateGpsData(dataGps) {

	var dataValuesGps = "";
	var dataNamesGps = "";
	Object.keys(dataGps).forEach(function(key) {
		if(isNaN(key)) {
			dataNamesGps +="<p>"+key+"</p>";
			dataValuesGps += "<p>"+dataGps[key]+"</p>";
		}
	});

	$("#dataNameGps").html(dataNamesGps);
	$("#dataValueGps").html(dataValuesGps);
}

function drawBoat() {
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

	layerCanvasctx.clearRect(0,0,layerCanvas.width,layerCanvas.height);
	layerCanvasctx.save();
	if(vTACKING === 1) {
		layerCanvasctx.drawImage(tacking,0,0);
	}


	layerCanvasctx.drawImage(compass,0,0);
	layerCanvasctx.translate(layerCanvas.width/2, layerCanvas.height/2);
	layerCanvasctx.rotate(vCTS*Math.PI/180);
	layerCanvasctx.drawImage(heading,-layerCanvas.width/2,-layerCanvas.width/2);

	//true wind direction
	layerCanvasctx.rotate((vTWD - vCTS)*Math.PI/180);
	layerCanvasctx.drawImage(trueWindArrow,-layerCanvas.width/2,-layerCanvas.width/2);

	layerCanvasctx.rotate((vWAYPOINT-vTWD)*Math.PI/180);
	layerCanvasctx.drawImage(waypoint,-layerCanvas.width/2,-layerCanvas.width/2);


	// GPS heading
	layerCanvasctx.rotate((vGpsHeading-vWAYPOINT)*Math.PI/180);
	layerCanvasctx.drawImage(gpsHeading,-layerCanvas.width/2,-layerCanvas.width/2);


	layerCanvasctx.rotate((vHEADING-vGpsHeading)*Math.PI/180);
	layerCanvasctx.drawImage(boat,-layerCanvas.width/2,-layerCanvas.height/2);

	layerCanvasctx.rotate((vWIND)*Math.PI/180);
	layerCanvasctx.drawImage(wind,-layerCanvas.width/2,-layerCanvas.width/2);

	layerCanvasctx.rotate((maindir*vSAIL-vWIND)*Math.PI/180);
	layerCanvasctx.drawImage(mainsail,-layerCanvas.width/2,-layerCanvas.width/2);

	layerCanvasctx.rotate((-maindir*vSAIL)*Math.PI/180);
	layerCanvasctx.translate(0,-layerCanvas.height/6);
	layerCanvasctx.rotate(jibdir*vSAIL*Math.PI/180);
	layerCanvasctx.drawImage(jib,-layerCanvas.width/2,-layerCanvas.width/2);


	// roder
	layerCanvasctx.rotate(-jibdir*vSAIL*Math.PI/180);
	layerCanvasctx.translate(0,(layerCanvas.height/6)+(layerCanvas.height/3.6));
	layerCanvasctx.rotate(vRUDDER*Math.PI/180);
	layerCanvasctx.drawImage(rudder,-layerCanvas.width/2,-layerCanvas.width/2);


	layerCanvasctx.restore();

	$("#pingCanvas").hide().fadeIn(50, function() {
		$("#pingCanvas").fadeOut(350);
	});

}
