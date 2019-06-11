<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Courses to Shopping Cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/js/jquery.min.js"></script>
  <script src="css/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/googlemap.js"></script>
 
    <style>
.hero-image {

  background-color: #cccccc;
  height: 550px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

    

        #map{
          width:100%;
          height: 100%;
          border: 1px solid blue; 
        }

        .error {color: #FF0000;}
        .affix {
             top: 0;
             width: 100%;
             z-index: 9999 !important;
            }

        .affix + .container-fluid {
          padding-top: 70px;
         }
    </style>
</head>
<body>


<header>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
         <img src="img/logo.jpg" id="logo" height="55px">
         <a class="navbar-brand" href="index.php">FoodRocket</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php 
        if(isset($_SESSION{'userType'})){
          if($_SESSION['userType'] =='admin'){
            echo "<li class='active'><a href='CoolAdmin-master/admin.php'>Into Admin</a></li>";
          }
          else if($_SESSION['userType'] == 'restaurant'){
              echo "<li class='active'><a href='CoolAdmin-master/restaurantpage.php'>Into Restaurant Admin</a></li>";
            }
          }          
        ?> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
      <?php
            if (isset($_SESSION['userId'])){
            echo '
            
            <li>
            <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                    <a class="btn btn-info" href="track.php">Track</a>
            </form>
            </li>
             ';}
             else {
              echo '
              <li>
               <form action="includes/login.inc.php" method="POST" class="navbar-form">
                <input id="email" type="text" class="form-control" name="uid" placeholder="Email">
                <input id="password" type="password" class="form-control" name="pwd" placeholder="Password">
                <button class="btn btn-default" type="submit" name="login-submit">Login </button>
                </form>
              </li>
              <li>
              <a class="dropdown-toggle btn btn-info" data-toggle="dropdown" href="#">Sign-Up<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="customerSignup.php">Customer S.Up</a></li>
                  <li><a href="restaurantSignup.php">Restaurant S.Up</a></li>
                </ul>
           </li>
            ';
          }
          ?>
      </ul>
    </div>
  </div>
</nav>
</header>






