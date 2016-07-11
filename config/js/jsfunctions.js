	/*This js file handles the setting of waypoint's. When you leftclick on the map
		a marker will be set and the longitude and latitude is stored in a js obj/array.
		When you rightclick the marker is removed from the map and the obj/array.*/

	var waypointsObj;
	var map;
	var setRadius = 15;

	//Used for displaying "selected waypoint" on the webpage
	var drag_lng_status;
	var drag_lat_status;
	var drag_id_status;

	var radius_setting_box;

	var ajaxBusy;

	$(document).ready(function(){
		drag_lng_status = document.getElementById ('lngStatus');
		drag_lat_status = document.getElementById ('latStatus');
		drag_id_status = document.getElementById ('idStatus');
		radius_setting_box = document.getElementById('radSetting');
		ajaxBusy = false;

		console.log("Document ready");
		//Basically an "include"
		$.getScript("../libs/markerFunctions.js", function(){
		   console.log("markerFunctions.js included");
		   getWaypoints();

		});

		$(document).ajaxStart( function() {
			ajaxBusy = true;
		}).ajaxStop( function() {
			ajaxBusy = false;
		});

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
			var newMarker = placeMarker(event.latLng, -1, -1, radius_setting_box.value, true);
			bindMarkerEvents(newMarker);
			renderLine(newMarker);
		});

		initMarkers(map);
		boatMarker();
	}

	function initMarkers(setMap){
		markerFunctions_setMarkerMap(map);

		for (var i = 0; i < waypointsObj.length; i++) {

			var newMarker = placeMarker(new google.maps.LatLng(waypointsObj[i].latitude, waypointsObj[i].longitude),
			 	waypointsObj[i].id_waypoint,i, waypointsObj[i].radius, false);

			bindMarkerEvents(newMarker);
			renderLine(newMarker);
	  }
	}

	function boatMarker(){
		$.ajax({
			url: '../live/dbapi.php',
			data: {'action': "getGpsData"},
			type: 'POST',
			success: function(data) {
				//var temp = jQuery.parseJSON(data);
				var posObj = jQuery.parseJSON(data);
				var boatPos = {lat: Number(posObj.latitude), lng: Number(posObj.longitude)};
				console.log(posObj.latitude);
				var boatMarker = new google.maps.Marker({
					position: boatPos,
					map: map,
					icon :'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
					title: "Boat position"
				});

			},
			error: function(errorThrown) {
				console.log(errorThrown);
			}
		});


	}

	//Insert new and update are both to be replaced by this, running once to kill all waypoints and inserting new ones
	function waypointsToDatabase(){
		//Iterate array "loadedwaypoints"
		//Do not store id in wp_data
		//Call insertwaypoints instead of updatewaypoints

		var wp_data;
		var wps = [];
		var existing = markerFunctions_getLoadedWaypoints();

		for (var i = 0; i < existing.length; i++){
			if(existing[i] != null){
				wp_data = {
					position: {latitude: existing[i].position.lat(), longitude: existing[i].position.lng(), radius: existing[i].radius}
				}
				wps.push(wp_data);

			}
		}

		console.log(JSON.stringify(wps));

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
		console.log("Running getWaypoints");
		markerFunctions_resetLoadedWaypoints();
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
	        var marker = this;
	        removeMarker(marker);
	    });
		google.maps.event.addListener(marker, 'drag', function() {
			if (drag_lat_status!=null && drag_lng_status!=null){
				drag_lat_status.value = this.position.lat();
				drag_lng_status.value = this.position.lng();
				drag_id_status.value = this.db_id;
				updateMarkerPosition(this);
			}
		  //console.log("Waypoint " + this.db_id + " new position: " + this.position.lng());
		  });
	}
