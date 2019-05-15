
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Courses to Shopping Cart</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom1.css">
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
<header>
    <nav>
        <div class="main-wrapper">
       
            <ul>
                <li><img src="img/logo.jpg" id="logo" height="60px"></li>
                <li><a href="index.php">FoodRocket</a></li>
            </ul>
            <div class="nav-login">
            <?php
            if (isset($_SESSION['userId'])){
            echo '
            <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
            </form>
            <ul>
            <li class="submenu">
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
                 echo '<form action="includes/login.inc.php" method="POST">
                 <input type="text" name="uid" placeholder= "Username/e-mail">
                 <input type="password" name="pwd" placeholder= "password">
                 <button type="submit" name="login-submit">Login </button>
                </form>
                <a href="signup.php">Sign Up</a>';
             }
                ?>
            
                
            </div>
        </div>
    </nav>
</header>