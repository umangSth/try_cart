



<?php 
    include 'restaurant_header.php';

?>
<br><br>
<br>
<br>
   <main class="my-form">         
        <div class="container-fluid  height-full">
        <form action="../includes/upload.php" method="POST" class="form-group" enctype="multipart/form-data">
       
        
            
            <textarea name="productName"  placeholder= "Enter the name of the Product" class="form-control cc-name valid" required="required"></textarea><br>

            <textarea name="productDescription" placeholder="Enter the description of the product." class="form-control cc-name valid" required="required"></textarea><br>

            <textarea name="price" class="form-control cc-name valid" placeholder="Enter the price of the product" required="required"></textarea><br>

            <textarea name="deliveryCharge" class="form-control cc-name valid" placeholder="Enter the shipping price of the product" required="required"></textarea><br>

            <p>Enter category Name by which we will group the food of similar character</p>
            <textarea name="categories" class="form-control cc-name valid" placeholder="Enter the category of the food" required="required"></textarea><br>

        
        <input type="file" name="productImage">
        <br>
        <button type="submit" class="btn btn-success" name="submit">Upload</button>
        </form>


        </div>
    </main>

    <br><br><br><br>



<?php 


include 'footer.php';


?>



















            
         
