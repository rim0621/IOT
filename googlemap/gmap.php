<?php 
    include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTS8e7OSQk8g3I007X0NHOA2puAQ8jX8A&callback=initMap" type="text/javascript"></script>
<meta charset="utf-8" />

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpL_eENVsML7Tw_NeslMumaCP0UHUTpdI"></script>
-->
<script>
var address='<? echo $row["address"] ?>'
alert(address);
var geocoder;
var map;
function initMap() {

   geocoder=new google.maps.Geocoder();
  var mapProp = {
    center:new google.maps.LatLng(124.3496, 33.3263),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
   map=new google.maps.Map(document.getElementById("map"),mapProp);
   codeAddress();
}

function codeAddress() 
{
  
  geocoder.geocode( {"address":address}, function(results, status) 
  {
    if (status == google.maps.GeocoderStatus.OK) 
    {
      map.setCenter(results[0].geometry.location);//center the map over the result
      //place a marker at the location
      var marker = new google.maps.Marker(
      {
          map: map,
          position: results[0].geometry.location
          
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
   }
  });
}
google.maps.event.addDomListener(window, 'load', initMap);

</script>
</head>
 
<body>
<div id="map" style="width:500px;height:380px;"></div>
</body>
 
</html>