<?php

include "../includes/dbh.inc.php";
include 'restaurant_header.php';
if(isset($_GET['delete'])){
    $id=$_GET['id'];
   $sql = ' DELETE FROM products WHERE id="'.mysqli_real_escape_string($conn, (int)$id).'"';
   mysqli_query($conn, $sql);
   
}

?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" style="height:500px;">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th class="text-right">price</th>
                                                <th>Delete</th>
                                                <th>Description</th>
                                                <th>Restaurant_Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            include "../includes/dbh.inc.php";
                                            $rid = $_SESSION['R_Id'];
                                                $sql = 'SELECT * FROM products WHERE R_Id = "'.$rid.'"ORDER by id ASC';
                                                $result=mysqli_query($conn, $sql);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo '<tr>
                                                    <td>'.$row["id"].'</td>
                                                    <td>'.$row["name"].'</td>
                                                    <td>'.$row["price"].'</td>
                                                    <td> <button><a href="restaurant_product.php?delete&id='.$row["id"].'">Delete </a></button></td>
                                                    <td>'.$row["description"].'</td>
                                                    <td>'.$row["R_Id"].'</td>
                                                    </tr>';
                                                }
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


    <?php 
    
        include 'footer.php';
    
    ?>