<?php
     include "../includes/dbh.inc.php";
    include 'header.php';
    if(isset($_GET['delete'])){
        $user=$_GET['idUser'];
       $sql = ' DELETE FROM users WHERE UserId="'.mysqli_real_escape_string($conn, (int)$user).'"';
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
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>User Contact</th>
                                                <th>Delete</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            include "../includes/dbh.inc.php";
                                                $sql = 'SELECT * FROM users ORDER by UserId ASC';
                                                $result=mysqli_query($conn, $sql);
                                                while($row=mysqli_fetch_array($result)){
                                                    echo '<tr>
                                                    <td>'.$row["UserId"].'</td>
                                                    <td>'.$row["UserName"].'</td>
                                                    <td>'.$row["UserEmail"].'</td>
                                                    <td>'.$row["UserPhone"].'</td>
                                                    <td> <button><a href="users.php?delete&idUser='.$row["UserId"].'">Delete </a></button></td>
                                                    
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