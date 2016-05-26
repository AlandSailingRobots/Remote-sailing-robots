/*This js file handles the setting of waypoint's. When you leftclick on the map
	a marker will be set and the longitude and latitude is stored in a js obj/array.
	When you rightclick the marker is removed from the map and the obj/array.*/
$(document).ready(function(){
	initMap();
});

var markers = {};
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: 60.09703380216225 , lng: 19.933834075927734}
  });

  map.addListener('click', function(event) {
    placeMarker(event.latLng, map);
  });
};

var bindMarkerEvents = function(marker) {
    google.maps.event.addListener(marker, "rightclick", function (e) {
        var markerId = e.latLng.lat() + '_' + e.latLng.lng();
        var marker = markers[markerId];
        removeMarker(marker, markerId);
    });
}

function placeMarker(latLng, map) {
	var markerId = latLng.lat() + '_' + latLng.lng();
  var marker = new google.maps.Marker({
    position: latLng,
    map: map,
		id: 'marker_' + markerId
  });
	markers[markerId] = marker;
	bindMarkerEvents(marker);
}

var removeMarker = function (marker, markerId) {
 	marker.setMap(null);
	delete markers[markerId];
}
