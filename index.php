<?php include "header.php";?>
<?php require "includes/cart.php";

  
if(isset($_GET['remove'])) {
      $_SESSION['cart_'.(int)$_GET['remove']]--;
      
  }
  
  if (isset($_GET['delete'])) {
      $_SESSION['cart_'.(int)$_GET['delete']]='0';
      
  }
 ?>


 <div class="container-fluid hero-image" style="background-image: url(img/1.jpg);">
            <div class="hero-text">
                                <h2>Wanna eat something</h2>
                                <form action="search.php" method="POST">
                                    <input type="text" name="search" placeholder="Search" style="color: black;">
                                    <button type="submit" name="submit-search" style="color: black;">Search</button>
                              </form>
            </div>
 </div>
    
        


    <?php
          
          cart(); 
          echo '<br><br>';
          restaurant_name();?>
    <br><br>
     <?php products(); ?>




<?php 
include 'footer.php';
?>
