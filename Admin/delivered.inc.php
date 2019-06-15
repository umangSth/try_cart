<?php

include '../includes/dbh.inc.php';

if(isset($_POST['submit-order'])){
    $UserId= $_POST['UserName'];
    $R_Id=$_POST['R_Id'];
    $deliveryboy_name =  $_POST['deliveryboy_name'];
    $timestamp=$_POST['timestamp'];
    $sql='SELECT * FROM order_list WHERE UserId="'.$UserId.'" AND (R_Id="'.$R_Id.'" AND status="OnTheWay")';
    $result=mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $query = 'INSERT INTO records (UserId, R_Id, D_Date, Id, quantity, price, deliveryboy_name, UserPhone, UserAddress) VALUES ("'.$UserId.'", "'.$R_Id.'", "'.$timestamp.'", "'.$row["Id"].'", "'.$row["quantity"].'", "'.$row["price"].'", "'.$deliveryboy_name.'", "'.$row["UserPhone"].'", "'.$row["UserAddress"].'")';
        mysqli_query($conn, $query);
    }
    
    $sql='DELETE FROM order_list WHERE UserId="'.$UserId.'" AND (R_Id="'.$R_Id.'" AND status="OnTheWay")';
    mysqli_query($conn, $sql);
    $sql='DELETE FROM bill_table WHERE UserId="'.$UserId.'" AND Deliveryboy_name= "'.$deliveryboy_name.'"';
    mysqli_query($conn, $sql);
    $sql='DELETE FROM tracking WHERE UserId="'.$UserId.'" AND Deliveryboy_name= "'.$deliveryboy_name.'"';
    mysqli_query($conn, $sql);
}

