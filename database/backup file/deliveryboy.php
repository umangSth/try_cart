

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<form class="navbar-form navbar-right" action="../includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-info" name="logout-submit">Logout</button>
</form>



<?php
session_start();

include '../includes/dbh.inc.php';
$total = 0;
$sum = 0;

$name = $_SESSION['userId'];
$R_Id = $_SESSION['R_Id'];

echo 'Deliveryboy Name: '.$name;
echo '<br><br><br>';
$sql_Res = 'SELECT R_Name FROM restaurants WHERE R_Id = "'.$R_Id.'"';
$Res = mysqli_query($conn, $sql_Res);
$Res_name = mysqli_fetch_array($Res);
echo 'Restaurant name : '.$Res_name["R_Name"];

$sql = 'SELECT DISTINCT UserId, UserAddress, UserContact FROM Bill_Table WHERE Deliveryboy_name="'.$name.'"';
$Result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($Result)){
    echo '<br>';
    echo 'UserName :'.$row['UserId'];
    echo '<br>UserAddress :'.$row['UserAddress'];
    echo '<br>UserContact :'.$row['UserContact'];


    $sql_order = 'SELECT Id, quantity, price FROM order_list WHERE status="OnTheWay" AND (R_Id="'.$R_Id.'" AND UserId="'.$row["UserId"].'")';
    $order=mysqli_query($conn, $sql_order);
    echo '<div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning" >
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>';
    
    while($get_row = mysqli_fetch_array($order)){
        $sql_product = 'SELECT name FROM products WHERE id = "'.$get_row['Id'].'"';
        $product = mysqli_query($conn, $sql_product);
        $pro_name = mysqli_fetch_array($product);
        
        echo '<tr>                                 
        <td>'.$pro_name["name"].'</td>
        <td>'.$get_row["price"].'</td>
        <td>'.$get_row["quantity"].'</td>';
        $sum = ($get_row["quantity"]*$get_row["price"]);
        echo '<td>'.$sum.'</td>';
        $total += $sum;
    }
    echo '</tbody></table></div>';
    echo 'Total : '.$total.'<br>';
    echo '<a class="btn btn-info" href="location.php?id='.$name.'">Start Track</a> ';
    echo "             ";
    echo '<a class="btn btn-info" href="#">Done Delivery</a> ';
    $total = 0;
    echo '<br><br><br><br><br>';



   
}











include 'footer.php';


?>



















            
         
