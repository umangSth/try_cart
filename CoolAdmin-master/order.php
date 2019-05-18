<?php
     include "../includes/dbh.inc.php";
    include 'restaurant_header.php';
 
    






?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>User Name</th>
                                                <th>Product Id</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th> User Address</th>
                                                <th>User Contact</th>
                                                <th> location</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            include "../includes/dbh.inc.php";
                                            
                                            $Rid=$_SESSION['R_Id'];

                                                $sql = 'SELECT * FROM order_list WHERE R_Id ="'.$Rid.'" ORDER by Order_id ASC';
                                                $result=mysqli_query($conn, $sql);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo '<tr>
                                                    <td>'.$row["Order_Id"].'</td>
                                                    <td>'.$row["UserId"].'</td>
                                                    <td>'.$row["Id"].'</td>
                                                    <td>'.$row["quantity"].'</td>
                                                    <td>'.$row["price"].'</td>
                                                    <td>'.$row["UserAddress"].'</td>
                                                    <td>'.$row["UserPhone"].'</td>
                                                    <td><a href="location.php?id='.$row["UserId"].'">track</a></td>
                                                   
                                                
                                                    
                                                    ';
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


    <?php 
 
    
        include 'footer.php';
    
    ?>