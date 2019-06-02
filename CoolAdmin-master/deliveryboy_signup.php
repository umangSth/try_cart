<?php    
    require "restaurant_header.php"
?>
<br>
<br>
<br>
<br>

<div class="container">
   
        <h2>Deliveryboy Signup</h2>
        <br>
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
  
        <form action="../includes/deliveryboy_signup.inc.php" method="POST">
        <div class="form-group">
            <label for="email">Deliveryboy Username</label>
            <input type="text" class="form-control" name="deliveryboy_name" placeholder="Deliveryboy_Name">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
        </div>
        <div class="form-group">
            <label for="email">Deliveryboy Contact</label>
            <input type="text" class="form-control" name="deliveryboy_contact" placeholder="Deliveryboy Contact">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
        </div>
        <div class="form-group">
            <label for="email">Deliveryboy Email</label>
            <input type="text" class="form-control" name="deliveryboy_email" placeholder="Deliveryboy Email">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
        </div>
        
        <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" name="deliveryboy_password" placeholder="Password">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
        </div>
        <div class="form-group">
            <label for="pwd">Password Repeat</label>
            <input type="password" class="form-control" name="deliveryboy_repassword" placeholder="Password Repeat">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
        </div>
            <button class="btn btn-info" type="submit" name="signup-submit">Sign Up</button>
        </form>
    
</div>



<?php 
    require "footer.php";
?>
   

 