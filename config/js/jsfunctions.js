	/*This js file handles the setting of waypoint's. When you leftclick on the map
		a marker will be set and the longitude and latitude is stored in a js obj/array.
		When you rightclick the marker is removed from the map and the obj/array.*/

	var waypointsObj;
	var map;
	var loadedWaypoints = [];
	var setRadius = 15;

	//Used for displaying "selected waypoint" on the webpage
	var drag_lng_status;
	var drag_lat_status;
	var drag_id_status;

	var radius_setting_box;

	var ajaxBusy;
	var latestId;

	$(document).ready(function(){
		drag_lng_status = document.getElementById ('lngStatus');
		drag_lat_status = document.getElementById ('latStatus');
		drag_id_status = document.getElementById ('idStatus');
		radius_setting_box = document.getElementById('radSetting');


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
			  title: "Waypoint id: " + waypointsObj[i].id_waypoint + " radius: " + waypointsObj[i].radius,
			  db_id: waypointsObj[i].id_waypoint,
			  radius: waypointsObj[i].radius,
			  index: i
		  });

		  loadedWaypoints.push(waypointMarkers);
		  latestId = Number(waypointsObj[i].id_waypoint) + 1;
		  //console.log("Last entry: " + loadedWaypoints[loadedWaypoints.length-1].title + " POS: " + loadedWaypoints[loadedWaypoints.length-1].position.lng());

		  bindMarkerEvents(waypointMarkers);
		}
	};

	//Insert new and update are both to be replaced by this, running once to kill all waypoints and inserting new ones
	function waypointsToDatabase(){
		//Iterate array "loadedwaypoints"
		//Do not store id in wp_data
		//Call insertwaypoints instead of updatewaypoints

		var wp_data;
		var wps = [];

		for (var i = 0; i < loadedWaypoints.length; i++){
			if(loadedWaypoints[i] != null){
				wp_data = {
					position: {latitude: loadedWaypoints[i].position.lat(), longitude: loadedWaypoints[i].position.lng(), radius: loadedWaypoints[i].radius}
				}
				wps.push(wp_data);

			}
		}

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

		refreshWhenReady();

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
	        var marker = this;
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

	function placeMarker(latLng, map) {
		setRadius = radius_setting_box.value;

		if (isNaN(setRadius)){
			console.log("Radius not numeric, defaulting to 15");
			setRadius = 15;
		}

		var markerId = latLng.lat() + '_' + latLng.lng();
	 	var marker = new google.maps.Marker({
			position: latLng,
			map: map,
			draggable: true,
			db_id: latestId,
			index: latestId - 1,
			radius: setRadius,
			title: "New marker, id: " + latestId
		});
		loadedWaypoints.push(marker);
		latestId++;
		bindMarkerEvents(marker);
	}

	var removeMarker = function (marker, markerId) {
	 	marker.setMap(null);
		delete loadedWaypoints[marker.index];
		console.log(marker.index + " deleted.");
	}
