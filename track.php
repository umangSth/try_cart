<?php include "header.php";
require 'includes/dbh.inc.php';

$user=$_SESSION['userId'];
$sql = 'SELECT latitude, longitude FROM tracking WHERE UserId="'.$user.'"';
$result=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);



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

var timer =  setInterval(timer, 5000);

function setLocation(lat, long){

    // Target's GPS coordinates.
var target = L.latLng(lat, long);
// Set map's center to target with zoom 14.
map.setView(target, 14);

// Place a marker on the same location.
L.marker(target).addTo(map);

}

function timer(){
    window.location='track.php';
}

//MAP

var lat = "<?php echo $row[0];?>";

var long = "<?php echo $row[1];?>";


setLocation(lat, long);

</script>




<?php 

include 'footer.php';
?>
