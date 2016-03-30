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

var latestId = -1;
var currentId = -1;


$(document).ready(function(){
	initBoat();
	resizeDiv();
	drawBoat();
	setUpdateTimer(10000);
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
			updateBoat(dataObj);
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
	layerCanvasctx.rotate((vWAYPOINT-vCTS)*Math.PI/180);
	layerCanvasctx.drawImage(waypoint,-layerCanvas.width/2,-layerCanvas.width/2);
	layerCanvasctx.rotate((vHEADING-vWAYPOINT)*Math.PI/180);
	layerCanvasctx.drawImage(boat,-layerCanvas.width/2,-layerCanvas.height/2);
	layerCanvasctx.rotate((vWIND)*Math.PI/180);
	layerCanvasctx.drawImage(wind,-layerCanvas.width/2,-layerCanvas.width/2);
	layerCanvasctx.rotate((maindir*vSAIL-vWIND)*Math.PI/180);
	layerCanvasctx.drawImage(mainsail,-layerCanvas.width/2,-layerCanvas.width/2);
	layerCanvasctx.rotate((-maindir*vSAIL)*Math.PI/180);
	layerCanvasctx.translate(0,-layerCanvas.height/6);
	layerCanvasctx.rotate(jibdir*vSAIL*Math.PI/180);
	layerCanvasctx.drawImage(jib,-layerCanvas.width/2,-layerCanvas.width/2);
	layerCanvasctx.rotate(-jibdir*vSAIL*Math.PI/180);
	layerCanvasctx.translate(0,(layerCanvas.height/6)+(layerCanvas.height/3.6));
	layerCanvasctx.rotate(vRUDDER*Math.PI/180);
	layerCanvasctx.drawImage(rudder,-layerCanvas.width/2,-layerCanvas.width/2);
	layerCanvasctx.restore();

	$("#pingCanvas").hide().fadeIn(50, function() {
		$("#pingCanvas").fadeOut(350);
	});

}
