<?php 
include 'includes/dbh.inc.php';
include 'header.php';

if(isset($_GET['r_id'])){
    $R_Id=mysqli_real_escape_string($conn, (int)$_GET['r_id']);
    echo $R_Id;
}




?>







<?php 

include 'footer.php';
?>