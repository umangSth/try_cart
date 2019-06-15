<?php 

include 'header.php';
if(isset($_SESSION['userType']) == 'restaurant'){
    header('location: restaurantpage.php');
}
elseif(isset($_SESSION['userType']) == 'admin'){
    header('location: admin.php');
}
elseif(isset($_SESSION['userType']) == 'customer'){
    header('location: ../index.php');
}
   


?>




        <br><br><br><br>
        <div class="container">
        <form action="http://localhost/try_cart/includes/upload.php" method="POST" enctype="multipart/form-data">
        <div>
        <div>
            
            <textarea name="productName"  placeholder= "Enter the name of the Product"></textarea>

            <textarea name="productDescription" placeholder="Enter the description of the product." class="form-control cc-name valid"></textarea>

            <textarea name="price" class="form-control cc-name valid" placeholder="Enter the price of the product"></textarea>

            <textarea name="deliveryCharge" class="form-control cc-name valid" placeholder="Enter the shipping price of the product"></textarea>

           

           

        </div>
        <input type="file" name="productImage">
        <div>
        
        <button type="submit" name="submit">Upload</button>
        </form>


        </div>


        <?php 

            include 'footer.php';
        ?>



















            
         
