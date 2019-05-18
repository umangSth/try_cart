<?php 
if (isset($_POST["latitude"])) {
    echo $_GET["id"];
    echo $_POST["latitude"];
    echo $_POST["longitude"];
    return;
}

?>



<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>



<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(loadDoc);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

// function showPosition(position) {
//   x.innerHTML = "Latitude: " + position.coords.latitude + 
//   "<br>Longitude: " + position.coords.longitude;
// }


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
  
  xhttp.send("latitude=" + position.coords.latitude + "&" + "longitude=" + position.coords.longitude );
}



</script>

</body>
</html>
