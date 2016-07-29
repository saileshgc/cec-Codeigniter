// JavaScript Document

var geocoder;
var map;
var marker;
  
var markersArray = [];

function initialize() {
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(lat, lng);
	var myOptions = {
		zoom: zoomLevel,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
	google.maps.event.addListener(map, 'zoom_changed', function() {
		zoomLevel = map.getZoom();
		document.getElementById("event_zoom_level").value = zoomLevel;
	});
	
	google.maps.event.addListener(map, 'click', function(event) {
		positionMarker(event.latLng);
	});


	document.getElementById("event_zoom_level").value = zoomLevel;
	
	positionMarker(latlng);
	
}

function positionMarker(latlng)
{
	//remove previously positioned markers
	deleteOverlays();
	//create marker
	marker = new google.maps.Marker({
		map:map,
		draggable:true,
		animation: google.maps.Animation.DROP,
		position: latlng
	});
	markersArray.push(marker);
	
	//get marker latitude-longitude
	markerPosition(latlng);
	
	google.maps.event.addListener(marker, "dragend", function() {
		markerPosition(marker.position);
	});
}

function deleteOverlays() {
	if (markersArray) 
	{
		for (i in markersArray) 
		{
			markersArray[i].setMap(null);
		}
		markersArray.length = 0;
	}
}

function markerPosition(latlng)
{
	document.getElementById("event_lat").value = latlng.lat();
	document.getElementById("event_lng").value = latlng.lng();
}

function locateEvent() 
{
	//var index = document.getElementById('event_state_id').selectedIndex;
	//var state = document.getElementById('event_state_id').options[index].text;	
	var street = document.getElementById("event_address").value;
	var city = document.getElementById("event_city").value;
	//var street = document.getElementById("street").value;
	var address = street + ' ' + city;
	//alert(address);return;
	geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) 
		{
			map.setCenter(results[0].geometry.location);
			
			
			latlng = results[0].geometry.location;
			
			positionMarker(latlng);
			
		} 
		else 
		{
			alert("Geocode was not successful for the following reason: " + status);
		}
	});
}


google.maps.event.addDomListener(window, 'load', initialize);
