<?php    
    require "header.php"
?>
<br><br><br><br>
<section class="main-container">
    <div class="container">
        <h2>Restaurant Signup form</h2>
         <form action="includes/restaurantSignup.inc.php" method="POST">
                <div class="form-group">
                     <label for="email">Restaurant Name:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Restaurant Name" name="R_Name">
                </div>
                
                <div class="form-group">
                     <label for="email">Email :</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Email Address" name="R_Email">
                </div>
                <div class="form-group">
                     <label for="email">Address:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Address" name="R_Address">
                </div>
                <div class="form-group">
                     <label for="email">Contact Number:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Contact" name="R_Phone">
                </div>
                <div class="form-group">
                     <label for="email">Restaurant Owner:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Owner Name" name="R_Owner">
                </div>
                 <div class="form-group">
                     <label for="email">Restaurant PAN No.:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Restaurant PAN No." name="R_Pan">
                </div>
                <div class="form-group">
                     <label for="email">Username:</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Username" name="R_Username">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                     <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="R_Password">
                </div>
                <div class="form-group">
                    <label for="pwd">Password Check:</label>
                     <input type="password" class="form-control" id="pwd" placeholder="Re-Enter password" name="R_RePassword">
                </div>
             <div class="checkbox">
             <label><input type="checkbox" name="remember"> Remember me</label>
             </div>
             <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <br><br><br><br>
        <!-- <?php
            // if(isset($_GET['error'])){
            //     if ($_GET['error'] == "emptyfields") {
            //         echo '<p>Fill in fields!</p>';
            //     }
            //     else if ($_GET['error'] == "invaliduidmail"){
            //         echo '<p>Invalid Username and e-mail!</p>';
            //     }s
            //     else if ($_GET['error'] == "invaliduid"){
            //         echo '<p>Invalid username!</p>';
            //     }
            //     else if ($_GET['error'] == "invalidmail"){
            //         echo '<p>Invalid e-mail!</p>';
            //     }
            //     else if ($_GET['error'] == "passwordcheck"){
            //         echo '<p>Your password do not match!</p>';
            //     }
            //     else if ($_GET['error'] == "usertaken"){
            //         echo '<p>Username is already taken!</p>';
            //     }
            // }
            // else if (isset($_GET['signup']) == "success"){
            //     echo '<p>Signup Successful!</p>';
            // }
        ?> -->
  
  



<?php 

    require "footer.php";
?>
   

 