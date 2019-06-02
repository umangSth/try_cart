<?php


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



























// using an api to get data for visitor//deliveryboy

// $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
// if($query && $query['status'] == 'success'){
//   echo "ISP :".$query['isp']."<br/>";
//   echo "Country :".$query['country']."<br/>";
//   echo "Country Code :".$query['countryCode']."<br/>";
//   echo "Region Name :".$query['regionName']."<br/>";
//   echo "City :".$query['city']."<br/>";
//   echo "Zip :".$query['zip']."<br/>";
//   echo "Latitude :".$query['lat']."<br/>";
//   echo "Longitude :".$query['lon']."<br/>";
//   echo "TimeZone :".$query['timezone']."<br/>";
//   echo "ORG :".$query['org']."<br/>";
//   echo "AS :".$query['as']."<br/>";

// }

// else {
//   echo "something is wrong!!!";
// }

