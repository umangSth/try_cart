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
                               
                                        
                                            <?php
                                            include "../includes/dbh.inc.php";
                                            
                                            $Rid=$_SESSION['R_Id'];
                                            $query = 'SELECT DISTINCT UserId FROM order_list';
                                            $queryfire = mysqli_query($conn, $query);
                                            while($ans=mysqli_fetch_array($queryfire)){
                                                echo "<h3>".$ans['UserId']."</h3><hr>";
                                                $userId = $ans['UserId'];
                                                echo ' <div class="table-responsive table--no-card m-b-30">
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
                                                            <th> Status</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                                $sql = 'SELECT * FROM order_list WHERE R_Id ="'.$Rid.'" AND UserId="'.$userId.'" ORDER by Order_id ASC';
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
                                                    <td><div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      '.$row['status'].'
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                      <a class="dropdown-item" href="#">ordered</a>
                                                      <a class="dropdown-item" href="billing.inc.php?ready&orderid='.$row["Order_Id"].'">Ready</a>
                                                      <a class="dropdown-item" href="#">Ontheway</a>
                                                    </div></div></td> 
                                                    ';

                                                }
                                                echo ' 
                                                </tbody> 
                                                </table>
                                                </div>
                                                <form action="billing.inc.php" method="post">
                                                <div class="form-group row">
                                                    <div class="col-xs-2">
                                                        <label for="ex1">Deliveryboy Name</label>
                                                        
                                                        <input class="form-control" id="ex1" type="hidden" name="UserId" type="text" value="'.$ans["UserId"].'">
                                                        <input class="form-control" id="ex1" name="deliveryboy_name" type="text">
                                                    <button class="btn btn-info" type="submit" name="signup-submit">Confirm</button>
                                                    </div>
                                                </div>
                                                </form>
                                            

                                                <!-- <a class="btn btn-info" href="location.php?id='.$row["UserId"].'">track</a> -->
                                                ';
                                                
                                                echo '<br><br>
                                                <br><br>';
                                            }
                                            ?>
                                      
                               
                                     
                                    </div>
                            </div>
                            <div>
                            </div>
  
    <?php 
    
   
    
 
    
        include 'footer.php';
    
    ?>