<?php


require 'dbh.inc.php';
$product_id= $_GET['del'];


$sql = 'SELECT id, image FROM products WHERE id='. (int)$product_id;
$result = mysqli_query($conn, $sql); 
$row = mysqli_fetch_array($result);
$imageDestination= '../img/product/'.$row['image'];
$sql = "DELETE FROM products where id = '$product_id'";
mysqli_query($conn, $sql);
if(!unlink($imageDestination)){
    header('location: ../index.php?error');
    echo $imageDestination;


}
else{
// header('location: ../index.php?sucessdelete');
}
echo $imageDestination;
var_dump($row);

?>