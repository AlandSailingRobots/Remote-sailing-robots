/*This js file handles the setting of waypoint's. When you leftclick on the map
	a marker will be set and the longitude and latitude is stored in a js obj/array.
	When you rightclick the marker is removed from the map and the obj/array.*/

var waypointsObj;
var map;
var loadedWaypoints = [];
var newWaypoints = [];
var markers = {};
var drag_lng_status;
var drag_lat_status;
var drag_id_status;

var ajaxBusy;

var latestId;

$(document).ready(function(){
	drag_lng_status = document.getElementById ('lngStatus');
	drag_lat_status = document.getElementById ('latStatus');
	drag_id_status = document.getElementById ('idStatus');

	ajaxBusy = false;

	$(document).ajaxStart( function() {
		ajaxBusy = true;
	}).ajaxStop( function() {
		ajaxBusy = false;
	});

	getWaypoints();
});


function initMap() {
	console.log("initMap started");

	var mapCenter = new google.maps.LatLng(60.093610472518066, 19.938812255859375);
	if (typeof waypointsObj[0] != 'undefined'){
		mapCenter = new google.maps.LatLng(Number(waypointsObj[0].latitude), Number(waypointsObj[0].longitude));
	}

	map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 13,
	  center: mapCenter
	});

	map.addListener('click', function(event) {
	placeMarker(event.latLng, map);
	});

	for (var i = 0; i < waypointsObj.length; i++) {

	  var waypointMarkers = new google.maps.Marker({
		  position: new google.maps.LatLng(waypointsObj[i].latitude, waypointsObj[i].longitude),
		  map: map,
		  draggable: true,
		  icon :'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
		  title: "Waypoint id: " + waypointsObj[i].id_waypoint + " Lng: " + waypointsObj[i].latitude,
		  db_id: waypointsObj[i].id_waypoint
	  });

	  loadedWaypoints.push(waypointMarkers);
	  latestId = Number(waypointsObj[i].id_waypoint) + 1;
	  //console.log("Last entry: " + loadedWaypoints[loadedWaypoints.length-1].title + " POS: " + loadedWaypoints[loadedWaypoints.length-1].position.lng());

	  google.maps.event.addListener(waypointMarkers, 'drag', function() {
		  if (drag_lat_status!=null && drag_lng_status!=null){
			  drag_lat_status.value = this.position.lat();
			  drag_lng_status.value = this.position.lng();
			  drag_id_status.value = this.db_id;
		  }
		//console.log("Waypoint " + this.db_id + " new position: " + this.position.lng());
		});
	}
};

function insertNewWaypoints(){

	var wp_data;
	var wps = [];

	//TODO: Array not needed for wps; restructure insertWaypoint.php and clean
	for (var i = 0; i < newWaypoints.length; i++){
		if(newWaypoints[i] != null){
			wp_data = {
				id: newWaypoints[i].db_id,
				position: {latitude: newWaypoints[i].position.lat(), longitude: newWaypoints[i].position.lng()}
			}
			wps[0] = wp_data;

			$.ajax({
				type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
				url         : 'insertWaypoint.php', // the url where we want to POST
				data        : {json: JSON.stringify(wps)}, // our data object
				dataType    : 'text', // what type of data do we expect back from the server
				   error: function(xhr, ajaxOptions, thrownError){
					   alert(thrownError);
				   }
			})
				.done(function(data) {
					// log data to the console so we can see
					//console.log("INSERTION ATTEMPTED: " + data);
				});
		}
	}
}

//Calls insertnewwaypoints when done
function updateWaypoints(){

	var wp_data;
	var wps = [];

	for (var i = 0; i < loadedWaypoints.length; i++){
		if(loadedWaypoints[i] != null){
			wp_data = {
				id: loadedWaypoints[i].db_id,
				position: {latitude: loadedWaypoints[i].position.lat(), longitude: loadedWaypoints[i].position.lng()}
			}
			wps.push(wp_data);
		}
	}

	$.ajax({
		type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
		url         : 'updateWaypoints.php', // the url where we want to POST
		data        : {json: JSON.stringify(wps)}, // our data object
		dataType    : 'text', // what type of data do we expect back from the server
		   error: function(xhr, ajaxOptions, thrownError){
			   //alert(thrownError);
			   console.log("ERROR HAPPENED IN UPDATEWAYPOINTS");
		   }
	})
		.done(function(data) {
			//console.log("RESPONES: " + data);
		});

	insertNewWaypoints();
}

//Calls initmap when done
function getWaypoints() {
	//Keep track of current id for later insertions
	latestId = 1;
	loadedWaypoints = [];
	newWaypoints = [];
	$.ajax({
		url: '../live/dbapi.php',
		data: {'action': "getWaypoints"},
		success: function(data) {
			waypointsObj = jQuery.parseJSON(data);
			//console.log(data);
			initMap();
		},
		error: function(errorThrown) {
			console.log(errorThrown);
		}
	});
}

var bindMarkerEvents = function(marker) {
    google.maps.event.addListener(marker, "rightclick", function (e) {
        var markerId = e.latLng.lat() + '_' + e.latLng.lng();
        var marker = markers[markerId];
        removeMarker(marker, markerId);
    });
	google.maps.event.addListener(marker, 'drag', function() {
		if (drag_lat_status!=null && drag_lng_status!=null){
			drag_lat_status.value = this.position.lat();
			drag_lng_status.value = this.position.lng();
			drag_id_status.value = this.db_id;
		}
	  //console.log("Waypoint " + this.db_id + " new position: " + this.position.lng());
	  });
}

//[es] do later
function removeLastMarker(){

	if (newWaypoints.size() > 0){}

}

function placeMarker(latLng, map) {
	var markerId = latLng.lat() + '_' + latLng.lng();
 	var marker = new google.maps.Marker({
		position: latLng,
		map: map,
		draggable: true,
		db_id: latestId,
		title: "New marker, id: " + latestId
	});
	newWaypoints.push(marker);
	markers[markerId] = marker;
	latestId++;
	bindMarkerEvents(marker);
}

var removeMarker = function (marker, markerId) {
 	marker.setMap(null);
	delete markers[markerId];
}
