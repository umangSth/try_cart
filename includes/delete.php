<?php
session_start();

echo 'something';
require 'dbh.inc.php';

$sql = "SELECT * FROM menu_cart";
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($result);
$imageDestination= '../img/product/'.$row['image'];
$image_id= $_GET['del'];
$sql = "DELETE FROM menu_cart where id = '$image_id'";
mysqli_query($conn, $sql);
if(!unlink($imageDestination)){
    header('location: ../index.php?error');
}
else{
header('location: ../index.php?sucessdelete');
}


?>