<?php    
    require "header.php"
?>

<section class="main-container">



<!-- signup success message -->
<?php 
    if(isset($_GET['signup']))
    if($_GET['signup']=='success'){
            {echo '<h2>signup successful</h2>';}}
?>

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
        
            <p class="error">
             <?php if(isset($_GET['uid'])){
                    if($_GET['uid']=='')
                        {echo 'Please Enter the UserName!!';}}?>
            </p>
            <input type="text" name="uid" placeholder="Username" value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['uid']);}
                                                                        ?>">


            <p class="error">
             <?php if(isset($_GET['mail'])){
                    if($_GET['mail']=='')
                        {echo 'Please Enter the Email!!';}}?>
            </p>
            <input type="text"  name="email" placeholder="E-mail"  value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['mail']);} ?>">
             <p class="error">
             <?php if(isset($_GET['address'])){
                    if($_GET['address']=='')
                        {echo 'Please Enter the Address!!';}}?>
            </p>
            <input type="text" name="address" placeholder="Address"  value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['address']);} ?>">


           <p class="error">
             <?php if(isset($_GET['phone'])){
                    if($_GET['phone']=='')
                        {echo 'Please Enter the phone!!';}}?>
            </p>
            <input type="text" name="phone" placeholder="Phone Number"  value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['phone']);} ?>">
            
            <input type="password" name="pwd" placeholder="Password">
      
            <input type="password" name="pwd-repeat" placeholder="Repeat Password">
           
            <button type="submit" name="signup-submit">Sign Up</button>
        </form>
    </div>
</section>



<?php 
    require "footer.php";
?>
   

