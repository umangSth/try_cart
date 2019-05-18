<?php
     include "../includes/dbh.inc.php";
     include 'header.php';
     if(isset($_GET['delete'])){
         $id=$_GET['rid'];
        $sql = ' DELETE FROM restaurants WHERE R_Id="'.mysqli_real_escape_string($conn, (int)$user).'"';
        mysqli_query($conn, $sql);
     }
        
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Restaurants Name</th>
                                                <th>Restaurant Id</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>E-Mail</th>
                                                <th>delete</th>
                                                <th>Restaurant Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                           
                                                $sql = 'SELECT * FROM restaurants ORDER by R_Id ASC';
                                                $result=mysqli_query($conn, $sql);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo '<tr>
                                                    <td>'.$row["R_Name"].'</td>
                                                    <td>'.$row["R_Id"].'</td>
                                                    <td>'.$row["R_Address"].'</td>
                                                    <td>'.$row["R_Phone"].'</td>
                                                    <td>'.$row["R_Email"].'</td>
                                                    <td> <button><a href="restaurantsInfo.php?delete&rid='.$row["R_Id"].'">Delete </a></button></td>
                                                    <td>'.$row["R_User"].'</td>
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