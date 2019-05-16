<?php    
    require "header.php"
?>

<section class="main-container">
    <div Class="main-wrapper">
        <h2>Signup</h2>
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
  
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <p class="error"> <?php echo isset($_GET['$nameErr']);?></p>
            <input type="text" name="email" placeholder="E-mail">
            
            <input type="text" name="address" placeholder="Address">
           
            <input type="text" name="phone" placeholder="Phone Number">
            
            <input type="password" name="pwd" placeholder="Password">
      
            <input type="password" name="pwd-repeat" placeholder="Repeat Password">
           
            <button type="submit" name="signup-submit">Sign Up</button>
        </form>
    </div>
</section>



<?php 
    require "footer.php";
?>
   

 