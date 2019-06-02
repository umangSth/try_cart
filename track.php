<?php include "header.php";





function get_ip(){
  if(isset($_SERVER['HTTP_CLIENT_IP'])){
    return $_SERVER['HTTP_CLIENT_IP'];
  }
  elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else {
    return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
  }
}

// $ip = get_ip();
// echo $ip;

$ip= '27.34.22.102';



$geoplugin = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=27.34.22.102'));
if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
 
	$lat = $geoplugin['geoplugin_latitude'];
  $long = $geoplugin['geoplugin_longitude'];

}
  echo $lat;
  
  echo $long;




  


?>







<link href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" rel="stylesheet"/>

<script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>

<br><br><br>

<div id="osm-map"></div>
  
   <script>
//MAP 

// Where you want to render the map.
var element = document.getElementById('osm-map');

// Height has to be set. You can do this in CSS too.
element.style = 'height:400px;';

// Create Leaflet map on map element.
var map = L.map(element);

// Add OSM tile leayer to the Leaflet map.
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



function setLocation(lat, long){

    // Target's GPS coordinates.
var target = L.latLng(lat, long);
// Set map's center to target with zoom 14.
map.setView(target, 14);

// Place a marker on the same location.
L.marker(target).addTo(map);
}

//MAP

var lat = "<?php echo $lat;?>";


var long = "<?php echo $long;?>";



setLocation(lat, long);




</script>




<?php 
include 'footer.php';
?>
