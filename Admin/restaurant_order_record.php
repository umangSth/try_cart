<?php
    include "../includes/dbh.inc.php";
    include 'restaurant_header.php';
    $R_Id = $_SESSION['R_Id'];
    $total=0;
    echo  '<br><br><br>';
    $sql = 'SELECT DISTINCT D_Date, UserId, deliveryboy_name, UserPhone FROM records WHERE R_Id="'.$R_Id.'"';
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
    echo ' Date : '.$row['D_Date'].'<br>';
    echo ' Customer Name :'.$row['UserId'].'<br>';
    echo ' Contact :'.$row['UserPhone'].'<br>'; 
    echo ' Delivery By :'.$row['deliveryboy_name'].'<br>'; 
    echo ' <div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning" >
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>';
    $query = 'SELECT Id, quantity, price FROM records WHERE D_Date="'.$row['D_Date'].'"';
    $queryfire=mysqli_query($conn, $query);
    while($record=mysqli_fetch_array($queryfire)){
        $sum=$record["quantity"]*$record["price"];
        $P_Name='SELECT name FROM products WHERE id="'.$record["Id"].'"';
        $name=  mysqli_query($conn, $P_Name);
       $aname = mysqli_fetch_array($name);
        echo '<tr>
        <td>'.$aname[0].'</td>
        <td>'.$record["quantity"].'</td>
        <td>'.$record["price"].'</td>
        <td>'.$sum.'</td> ';
        $total += $sum;       
    }
    echo'<tr><td> Total</td><td></td><td></td>
         <td>'.$total.'</td></tr>';
         $total=0;
    echo ' </tbody> 
     </table>
      </div>    
     <br><br><br>';
   }

?>

   


<?php 
    include 'footer.php'; 
?>