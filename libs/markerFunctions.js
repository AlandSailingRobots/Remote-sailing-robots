

    // Used for drawing waypoint markers with linefollowing and radius illustrations

    var markerMap;
    var loadedWaypoints = [];
    var latestId;
    var pathLine;

    var trailLine;
    var trailLimit = -1;

    function markerFunctions_resetLoadedWaypoints(){
        latestId = 1;
        loadedWaypoints = [];
    }

    function markerFunctions_getLoadedWaypoints(){
        return loadedWaypoints;
    }

    function markerFunctions_setMarkerMap(map){
        pathLine = null;
        markerMap = map;
    }

    function markerFunctions_placeMarker(latLng, setId, setIndex, setRadius, isNew) {
        //port
        //setRadius = radius_setting_box.value;

        if (isNaN(setRadius)){
            console.log("Radius not numeric, defaulting to 15");
            setRadius = 15;
        }

        var marker = new google.maps.Marker({
            position: latLng,
            map: markerMap,
            draggable: true,
            db_id: setId,
            index: setIndex,
            radius: setRadius,
            title: ""
        });

        if (isNew){
            marker.db_id = latestId;
            marker.index = latestId - 1;
            marker.title = "Planned waypoint, id: " + marker.db_id;
            latestId++;
        }else{
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green.png');
            marker.title = "Waypoint, id: " + setId;
            latestId = Number(setId) + 1;
        }

        loadedWaypoints.push(marker);
        markerFunctions_renderMarkerRadius(marker);
        return marker;
    }

    function markerFunctions_updateMarkerPosition(marker){
        marker.circle.setCenter(marker.position);
        markerFunctions_redrawLine();
    }

	function markerFunctions_renderMarkerRadius(marker){
		var radiusCircle = new google.maps.Circle({
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			map: markerMap,
			center: marker.position,
			radius: Number(marker.radius)
		  });
		marker.circle = radiusCircle;
	}

    var markerFunctions_removeMarker = function (marker) {
        marker.setMap(null);
        marker.circle.setMap(null);
        delete loadedWaypoints[marker.index];
        console.log(marker.index + " deleted.");
        markerFunctions_redrawLine();
    }

    function markerFunctions_initPolylines(){
        var newPathData = [];
        var newBluePathData = [];
        var corridorsArr = [];

        pathLine = new google.maps.Polyline({
        path: newPathData,
        geodesic: true,
        strokeColor: '#009900',
        strokeOpacity: 1.0,
        strokeWeight: 2,
        corridors: corridorsArr
        });

        pathLine.setMap(markerMap);

    }

    function markerFunctions_renderLine(target){

        if (pathLine == null){
            markerFunctions_initPolylines();
        }

        var pathArray = pathLine.getPath().getArray();
        var po = pathArray[pathArray.length - 1];
        var newPathData = pathLine.getPath();
        newPathData.push(target.position);
        pathLine.setPath(newPathData);

        if (po != null){
            markerFunctions_renderCorridor(po,target);
        }
    }
    function markerFunctions_redrawLine(){
        var newPathData = [];
        pathLine.setPath(newPathData);
        //rightCorridor.setPath(newPathData);
        //leftCorridor.setPath(newPathData);

        for (var i = 0; i < pathLine.corridors.length; i++){
            pathLine.corridors[i].setMap(null);
        }

        pathLine.corridors = [];

        for (var i = 0; i < loadedWaypoints.length; i++){
            if(loadedWaypoints[i] != null){
                //newPathData.push(loadedWaypoints[i].position);
                markerFunctions_renderLine(loadedWaypoints[i]);
            }
        }
        //pathLine.setPath(newPathData);
    }

    //Draws a complete trail line with a json position log object and a defined range
    //Returns array of all route points drawn
    function markerFunctions_drawTrailInRange(data, startId, endId){

		//Stores IDs for the path points for retreival on listener events. THere's probably a better way to do this.
		var pointArray = [];

		if (data != null){
			var count = 0;
			var routeIndex = 0;

			   for(var i = 0; i <= data.length-1; i++){

				   if(data[i].route_started == 1){
					   count++;
					   if(count >=2){
						   //This could lead to problems with pointarray and route range input and should probably be rewritten
						   console.log("routes reset! (route_started found twice or more)");
						   markerFunctions_initTrail();
						   count = 0;
					   }
				   }
				   if(Number(data[i].latitude)>0 && Number(data[i].longitude)>0){
					   if (endId >= Number(data[i].id_gps) && startId <= Number(data[i].id_gps)){
						   markerFunctions_renderTrail(Number(data[i].latitude), Number(data[i].longitude)); //Potential error, revisit tomorrow (tuesday)
						   pointArray[routeIndex] = data[i].id_gps;
						   routeIndex++;

					   }else{
						   console.log("A step was ignored (Out of range)"); //"Range" referring to min and max values in log display
					   }
				   }
				}

            return pointArray;

		}else console.log("[jsfunctions.js: 127]: No route found for selected entry.");
    }

    //Old function for finding clicked points on a polyline
    function markerFunctions_setTrailClickable(clickable){
        // //Marker that moves to mark currently selected log point on line
        //
        // path_marker = new google.maps.Marker({
        //     position: {lat: Number(0), lng:  Number(0)},
        //     map: m_map,
        //     title: 'path_marker',
        //     id: -1
        // });
        //
        // path_marker.setVisible(false);
        // path_marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
        //
        // google.maps.event.addListener(path_marker, 'click', function(f){
        //   var lookUpWindow = confirm("The database id of this position data is " + path_marker.get('id') + ".\nOpen log page in new window?");
        //   if (lookUpWindow == true) {
        //       //Problematic due to session
        //       var number = 0;
        //       var newPage = "info.php?number="+ number +"&name=id_gps&table=gps_dataLogs&id=" + path_marker.id;
        //       //window.location.href = newPage;
        //       window.open(newPage);
        //   }
        // });
        //
        // //
        //
        // //Listeners
        // //http://stackoverflow.com/questions/6170176/google-maps-polyline-click-on-section-of-polyline-and-return-id
        // google.maps.event.addListener(path, 'click', function(h) {
        //    console.log("Trail clicked");
        //    var latlng=h.latLng;
        //    var needle = {
        //        minDistance: 9999999999, //silly high
        //        index: -1,
        //        latlng: null,
        //        id: -1
        //    };
        //
        //    path.getPath().forEach(function(routePoint, index){
        //        var dist = google.maps.geometry.spherical.computeDistanceBetween(latlng, routePoint);
        //        if (dist < needle.minDistance){
        //           needle.minDistance = dist;
        //           needle.index = index;
        //           needle.latlng = routePoint;
        //           needle.id = idLookupTable[index];
        //        }
        //    });
        //
        //    // The closest point in the polyline
        //    alert("Marker created at closest referenced point on polyline.");
        //
        //    path_marker.id = needle.id;
        //    path_marker.setPosition(needle.latlng);
        //    path_marker.setVisible(true);
        // });
    }

    //Limit amount of possible points in the trail. -1 = infinite (default)
    function markerFunctions_setTrailLimit(newLimit){
        trailLimit = newLimit;
    }

    //Used for direct boat tracking, no corridors
    function markerFunctions_renderTrail(targetLat, targetLng){

        if (trailLine == null){
            markerFunctions_initTrail();
        }

        //Zero check filters out mock results
        var newPathData = trailLine.getPath().getArray();

        var trailLength = newPathData.length;

        if (trailLimit != -1 && trailLength >= trailLimit){

            newPathData.shift();

        }

        var newPoint = new google.maps.LatLng(targetLat, targetLng);
        newPathData.push(newPoint);
        trailLine.setPath(newPathData);
        trailLine.setMap(markerMap);




    }

    function markerFunctions_initTrail(){
        var newPathData = [];

        //Remove old trail if exists
        if (trailLine != null){
            trailLine.setMap(null);
        }

        trailLine = new google.maps.Polyline({
            path: newPathData,
            geodesic: true,
            strokeColor: '#000000',
            strokeOpacity: 0.4,
            strokeWeight: 2
        });
        trailLine.setMap(markerMap);
        return trailLine;
    }

    function markerFunctions_renderCorridor(origin, target){

        //Hardcoded for now - should mirror "max_tack_angle" or something in the control system
        var corridorRadius = 20;

        var lineAnglePt1 = Math.atan2(Number(target.position.lat()) - Number(origin.lat()), Number(target.position.lng()) - Number(origin.lng()));
        var currentLineAngle = lineAnglePt1 * 180 / Math.PI;
        //var currentLineAngle = lineAnglePt1;
        var resultAngle = currentLineAngle * -1;
        var newRightCorridorData = [];
        var newLeftCorridorData = [];

        var newPos = new google.maps.LatLng(target.position.lat(), target.position.lng());
        var newPosRight = newPos.destinationPoint(resultAngle, corridorRadius / 1000);
        var newPosLeft = newPos.destinationPoint(resultAngle - 180, corridorRadius / 1000)
        var newPosOriginRight = origin.destinationPoint(resultAngle, corridorRadius / 1000);
        var newPosOriginLeft = origin.destinationPoint(resultAngle + 180, corridorRadius / 1000);

        newRightCorridorData.push(newPosOriginRight);
        newRightCorridorData.push(newPosRight);
        newLeftCorridorData.push(newPosOriginLeft);
        newLeftCorridorData.push(newPosLeft);


        var right = new google.maps.Polyline({
        path: newRightCorridorData,
        geodesic: true,
        strokeColor: '#4444ff',
        strokeOpacity: 0.4,
        strokeWeight: 2
        });

        var left = new google.maps.Polyline({
        path: newLeftCorridorData,
        geodesic: true,
        strokeColor: '#4444ff',
        strokeOpacity: 0.4,
        strokeWeight: 2
        });

        right.setMap(markerMap);
        left.setMap(markerMap);
        pathLine.corridors.push(right);
        pathLine.corridors.push(left);

        //newLeftCorridorData.push(newPosLeft);
        //rightCorridor.setPath(newRightCorridorData);
        //leftCorridor.setPath(newLeftCorridorData);
        //pathLine.path.push(target.position);
    }

    Number.prototype.toRad = function() {
        return this * Math.PI / 180;
    }

    Number.prototype.toDeg = function() {
        return this * 180 / Math.PI;
    }

    google.maps.LatLng.prototype.destinationPoint = function(brng, dist) {
        dist = dist / 6371;
        brng = brng.toRad();

        var lat1 = this.lat().toRad(), lon1 = this.lng().toRad();

        var lat2 = Math.asin(Math.sin(lat1) * Math.cos(dist) +
                            Math.cos(lat1) * Math.sin(dist) * Math.cos(brng));

        var lon2 = lon1 + Math.atan2(Math.sin(brng) * Math.sin(dist) *
                                    Math.cos(lat1),
                                    Math.cos(dist) - Math.sin(lat1) *
                                    Math.sin(lat2));

        if (isNaN(lat2) || isNaN(lon2)) return null;

        return new google.maps.LatLng(lat2.toDeg(), lon2.toDeg());
    }
