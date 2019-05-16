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
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="css/js/jquery.min.js"></script>
  <script src="css/js/bootstrap.min.js"></script>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
            <img src="img/logo.jpg" id="logo" height="60px">
           
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <a class="navbar-brand" href="index.php">FoodRocket</a>
      </ul>
          
            <?php
            if (isset($_SESSION['userId'])){
            echo '
            <ul class="nav navbar-nav navbar-right">
            <li>
            <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
            </form>
            </li>
            <li>
                    <img src="img/cart.png" id="img-cart">
                    <div id="shopping-cart">
                            <table id="cart-content" class="u-full-width">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <p></p>
                            </table>
                    </div>
                </li>
             </ul>';}

             else {
                 echo '
                 <ul class="nav navbar-nav navbar-right">
                 <li>
                <form action="includes/login.inc.php" method="POST" class="navbar-form">
                <div class="input-group">
                <input id="email" type="text" class="form-control" name="uid" placeholder="Email">
                 </div>
                 </li>
                 <li>
                 <div class="input-group">
                 <input id="password" type="password" class="form-control" name="pwd" placeholder="Password">
                  </div>
                  </li>
                  <li>
                 <button class="btn btn-default" type="submit" name="login-submit">Login </button>
                 </li>
                 <li>
                <div class="dropdown">
                </form>
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sign Up
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="customerSignup.php">Customer S.Up</a></li>
                  <li><a href="restaurantSignup.php">Restaurant S.Up</a></li>
                </ul>
              </div>
              </li>
             
        
               ';
             }
                ?>
            
                
            </div>
        </div>
    </nav>
</header>