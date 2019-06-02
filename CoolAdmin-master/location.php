<?php 
if (isset($_POST["latitude"])) {
    echo $_GET["id"];
    echo $_POST["latitude"];
    echo $_POST["longitude"];
   
    return;
}


/*
1. CSS responsive and pretti
2. Database save
3. timer 
4. access data to myorder page in user
5. code optimize
6. Tracking
    when pressed track
      if post:
        check if user exists in traking table if so update
        if not insert

*/


?>



<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>



<button onclick="getLocation()">Try It</button>

<p id="demo"></p>


<link href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" rel="stylesheet"/>
<div id="osm-map"></div>
<script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>


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


var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(loadDoc, locationError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude + 
//   "<br>Longitude: " + position.coords.longitude;
// }

function locationError(error){
    x.innerHTML = "ERROR !!!!!!!!!" + error;
}


function loadDoc(position) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", window.location.href, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(position);
  console.log(window.location.href);

  setLocation(position.coords.latitude,position.coords.longitude );
  
  xhttp.send("latitude=" + position.coords.latitude + "&" + "longitude=" + position.coords.longitude );
}






</script>




<?php

  echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));

?>

</body>
</html>
