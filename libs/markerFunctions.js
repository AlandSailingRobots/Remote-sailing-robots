

    // Used for drawing waypoint markers with linefollowing and radius illustrations

    var markerMap;
    var loadedWaypoints = [];
    var latestId;
    var pathLine;

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

    function placeMarker(latLng, setId, setIndex, setRadius, isNew) {
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
            marker.title = "New marker, id: " + marker.db_id;
            latestId++;
        }else{
            marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green.png');
            marker.title = "Marker, id: " + setId;
            latestId = Number(setId) + 1;
        }

        loadedWaypoints.push(marker);
        renderMarkerRadius(marker);
        return marker;
    }

    function updateMarkerPosition(marker){
        marker.circle.setCenter(marker.position);
        redrawLine();
    }

	function renderMarkerRadius(marker){
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

    var removeMarker = function (marker) {
        marker.setMap(null);
        marker.circle.setMap(null);
        delete loadedWaypoints[marker.index];
        console.log(marker.index + " deleted.");
        redrawLine();
    }

    function initPolylines(){
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

    function renderLine(target){

        if (pathLine == null){
            initPolylines();
        }

        var pathArray = pathLine.getPath().getArray();
        var po = pathArray[pathArray.length - 1];
        var newPathData = pathLine.getPath();
        newPathData.push(target.position);
        pathLine.setPath(newPathData);

        if (po != null){
            renderCorridor(po,target);
        }
    }



    function redrawLine(){
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
                renderLine(loadedWaypoints[i]);
            }
        }
        //pathLine.setPath(newPathData);
    }

    function renderCorridor(origin, target){

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
