<?php 
    include('config2.php');
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=(-------)=initMap" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<meta charset="utf-8" />
<script>

function initMap() {
	 var map;
   var LeighLab = new google.maps.LatLng(15,0);
   var mapOptions = {
   center: LeighLab,
   zoom: 2,
   mapTypeId: google.maps.MapTypeId.ROADMAP,
  };
	map = new google.maps.Map(document.getElementById("map"), mapOptions);
	var data = [
		{"user_address":"JAWALAKHEL, NEPAL","no_of_address":"13"},
		{"user_address":"Kathmandu,Nepal","no_of_address":"28"},
		{"user_address":"KIRTIPUR, NEPAL","no_of_address":"29"},
		{"user_address":"WASHINGTON, UNITED STATES","no_of_address":"17"}];

	var markers=[];
	var markerCluster = new MarkerClusterer(map, markers);

 geocoder = new google.maps.Geocoder();
 data.forEach(function(mapData,idx) {
  geocoder.geocode({'address': mapData.user_address}, function(results, status){
   if (status == google.maps.GeocoderStatus.OK) {
    position=results[0].geometry.location;
    var marker = new google.maps.Marker({
     map: map,
     position: position,
     title:mapData.no_of_address
    });
		alert(marker);
    markers.push(marker);
    markerCluster.addMarker(marker);
   }
  });
 });
}

google.maps.event.addDomListener(window, 'load', initMap);
</script>
 
</head>
 
<body>
	<div id="map" style="width:500px;height:380px;"></div>

</body>
 
</html>
