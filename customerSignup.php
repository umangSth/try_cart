<?php    
    require "header.php"
?>





<!-- signup success message -->




<div class="container">
<div class="signup-form">
    <form action="includes/Signup.inc.php" method="POST">
    <div class="col-md-6 mx-auto text-center">
        <div class="header-title">
        <?php 
            if(isset($_GET['signup']))
                if($_GET['signup']=='success'){
                  {echo '<h2 style="color:#4864a0;">signup successful</h2>';}}
        ?>
            <h1>Signup</h1>
            <p>It's free and only takes a minute.</p>
        <div>
    </div> 
		<hr>
        <div class="form-group">
        <p class="error">
             <?php if(isset($_GET['error'])){
                    if($_GET['error']=='invaliduid')
                        {echo 'Username should have alphabet and number!!';}
                    else if($_GET['error']=='usertaken'){
                        echo 'Username already taken, type another!!';
                    }
                        }?>
            </p>
        <input type="text" class="form-control my-input" id="ex3" name="uid" placeholder="Username" required="required" value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['uid']);}
                                                                        ?>"> 
        </div>
        
        <div class="form-group">
            <p class="error">
             <?php if(isset($_GET['error'])){
                    if($_GET['error']=='invalidmail')
                        {echo 'Enter proper Email Address';}}?>
            </p>
        	<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['mail']);} ?>">
        </div>

        <div class="form-group">
        <p class="error">
             <?php if(isset($_GET['error'])){
                    if($_GET['error']=='')
                        {echo 'Please Enter the Address!!';}}?>
            </p>
            <input type="text" class="form-control" name="address" placeholder="Address" required="required" value="<?php 
                                                                                      if(isset($_GET['error']))
                                                                                      {echo ($_GET['address']);} ?>">
        </div>

        <div class="form-group">
            <p class="error">
            <?php if(isset($_GET['error'])){
                    if($_GET['error']=='invalidphone')
                        {echo 'Please Enter the proper phone number!!';}}?>
            </p>
            <input type="text" class="form-control" name="phone" placeholder="Contact Number" required="required"  value="<?php 
                                                                                if(isset($_GET['error']))
                                                                                {echo ($_GET['phone']);} ?>">
        </div>

		<div class="form-group">
            <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <p class="error">
                 <?php if(isset($_GET['error'])){
                    if($_GET['error']=='passwordcheck')
                        {echo 'password donot match!!';}}?>
            </p>
            <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="signup-submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
        </div>
		<p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp; Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
    </form>
</div>
</div>