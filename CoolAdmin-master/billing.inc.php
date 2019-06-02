<?php

include '../includes/dbh.inc.php';

if(isset($_POST['signup-submit'])){
    $UserId= $_POST['UserId'];
    $deliveryboy_name =  $_POST['deliveryboy_name'];
    

    $query = 'SELECT * FROM deliveryboy';
    $queryfire = mysqli_query($conn, $query);
    while($get_row = mysqli_fetch_array($queryfire)){

        if($deliveryboy_name == $get_row['deliveryboy_name']){
            
            $sql =  'SELECT  UserId, UserAddress, UserPhone, GROUP_CONCAT(Order_Id SEPARATOR ", ") as orders
            FROM order_list WHERE status="Ready" AND (UserId = "'.$UserId.'" AND R_Id = "'.$get_row["R_Id"].'") GROUP BY UserId';

            $result =  mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {   
                   $bill_sql = 'INSERT INTO bill_table (Order_Ids_List, UserId, UserContact, UserAddress, Deliveryboy_name, Deliveryboy_Contact)
               VALUES ("'.$row["orders"].'", "'.$UserId.'", "'.$row["UserPhone"].'", "'.$row["UserAddress"].'", "'.$deliveryboy_name.'", "'.$get_row["deliveryboy_contact"].'"  )';

               mysqli_query($conn, $bill_sql);

               echo "<br>".$UserId."  <br> ".$row['orders'] ."<br>".$row['UserAddress']."  <br> ".$row['UserPhone'];
                $status_sql = 'UPDATE order_list SET status="OnTheWay" WHERE (status="Ready" AND UserId = "'.$UserId.'" AND R_Id = "'.$get_row["R_Id"].'")';
            mysqli_query($conn, $status_sql);
            }       
        }
    }
    header('location: order.php');
    
}

else {
    header('location: order.php');
}
