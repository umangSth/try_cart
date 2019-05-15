<?php

require 'dbh.inc.php';

if(isset($_POST['submit'])){
    $productDescription = $_POST['productDescription'];
    $deliveryCharge = $_POST['deliveryCharge'];
    $productImage = $_FILES['productImage'];
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $price = $_POST['price'];

    
    // this all, represent the different parameter in a image  
    $productImageName = $_FILES['productImage']['name'];
    $productImageTmpName = $_FILES['productImage']['tmp_name'];
    $productImageSize = $_FILES['productImage']['size'];
    $productImageError = $_FILES['productImage']['error'];
    $productImageType = $_FILES['productImage']['type'];

    
    $productImageExt = explode('.', $productImageName);//this will explode or break the name like 'abc.jpg' through the dot . symbol 
    $productImageActualExt = strtolower(end($productImageExt));//this end will select the second part of the above result which in example is jpg


    //we are fixing the type of image we will allow to upload
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($productImageActualExt, $allowed)) {
        if($productImageError === 0){
            if($productImageSize < 5000000){
               
                $productImageDestination = '../img/product/'.$productImageName;
                move_uploaded_file($productImageTmpName, $productImageDestination);
                $sql = "INSERT INTO  products (name, description, price, shipping, image) VALUES ('$productName', '$productDescription', '$price', '$deliveryCharge','$productImageName')";
                mysqli_query($conn, $sql);
                header("Location: ../CoolAdmin-master/admin.php?uploadsuccess");

            } else {
                echo 'your image to big';
            }
        } else {
            echo " there was an error uploading your image!";
        }
    } else {
        echo "You cannot upload images of this type!";
    }

}







