<?php

$page='../index.php'; 


include 'dbh.inc.php';


if (isset($_GET['add'])){
    session_start();
    $sql= 'SELECT id, quantity FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$_GET['add']);
    $quantity=mysqli_query($conn, $sql);
    while ($quantity_row = mysqli_fetch_array($quantity)){
        if ($quantity_row['quantity']!=$_SESSION['cart_'.(int)$_GET['add']]){
            $_SESSION['cart_'.(int)$_GET['add']]+='1';
        }
    }
    header('Location: '.$page); 
}



Function restaurant_name(){
    global $conn;
    $sql = 'SELECT R_Name FROM restaurants ORDER BY R_Id ASC ';
    $result=mysqli_query($conn, $sql);
    echo '<div class="container"><table class="table"><thead><tr>';
    while($row=mysqli_fetch_array($result)){
        
        echo '<th><h4><a href="#'.$row['R_Name'].'">'.$row['R_Name'].'</a></h4></th>';
        
    }
    echo '</tr></thead></table></div>';

}

function products(){
   global $conn;
    $get_R='SELECT * FROM restaurants ORDER by R_Id ASC';
    $result_R= mysqli_query($conn, $get_R);
    if(isset($_SESSION['userType'])){
    $userType = $_SESSION['userType'];
    }    
    while ($R_row=mysqli_fetch_array($result_R)){
        $get = 'SELECT * FROM products WHERE quantity > 0 and R_ID = '.$R_row['R_Id'].' ORDER by R_Id ASC';   
        $result = mysqli_query($conn, $get); 
        echo '<div class="container" id="'.$R_row['R_Name'].'"><h1><a href="restaurant_pg.php?r_id='.$R_row["R_Id"].'">Restaurant: '.$R_row['R_Name'].'</a></h1>';
        echo '<hr>'; 
        echo '<div class="row">'; 
        while ($get_row=mysqli_fetch_array($result)){
            echo '<div class="col-md-4">';
            echo '<div class="thumbnail">';
            $img_url = "img/product/".$get_row["image"];
            echo '<img src="'.$img_url.'"  width="304" height="236" class="img-rounded" alt="Cinque Terre"><br>';
            echo '<p>'.$get_row['name'].'</p>
            <p>Description: '.$get_row['description'].'</p>
             Rs'.number_format($get_row['price'], 2);
            if(isset($_SESSION['userType'])){ 
              if($userType == 'customer'){
                     echo '<p><a href="includes/cart.php?add='.$get_row['id'].'" class="btn btn-info">Add</a></p>';
                }
            }
            echo '</div></div>';
            
        }
       echo '</div></div>';
    }
}


// function paypal_items(){
//     $num = 0;
//     $conn = mysqli_connect("localhost", "root", "", "items");
//     foreach($_SESSION as $name => $value) {
//         if($value != 0){
//             if (substr($name, 0, 5)=='cart_'){
//                 $id=substr($name, 5, strlen($name)-5);
//                 $query = 'SELECT id, name, price, shipping FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$id);
//                 $get = mysqli_query($conn, $query);
//                 while ($get_row = mysqli_fetch_array($get)){
//                     $num++; // paypal requires serially places special number so this variable does this
//                     echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'>';
//                     echo '<input type="hidden" name="item_name_'.$num.'" Value="'.$id.'">';
//                     echo '<input type="hidden" name="amount_'.$num.'"value="'.$get_row['price'].'">';
//                     echo '<input type="hidden" name="shipping_'.$num.'"value="'.$get_row['shipping'].'">';
//                     echo '<input type="hidden" name="shipping_'.$num.'"value="'.$get_row['shipping'].'">';
//                     echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';

//                 }
//             }
//         }
//     }
// }

function cart() {
    $conn = mysqli_connect("localhost", "root", "", "items");
    $total= 0;
    $sub=0;
    
    foreach($_SESSION as $name => $value){
        if ($value > 0) {
            if(substr($name, 0, 5) == 'cart_'){
               $id = substr($name, 5, (strlen($name)-5));//this will help to take id of item by subtracting the above cart_
                $query = 'SELECT id, name, price FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$id);
                $get = mysqli_query($conn, $query);
                while ($get_row = mysqli_fetch_array($get)){
                    $sub = $get_row['price']*$value;
                    echo $get_row['name'].' x '.$value.' @ Rs;'.number_format($get_row['price'], 2).' =  Rs;'.number_format($sub, 2).'<a href="index.php?remove='.$id.'">[-]</a>
                    <a href="includes/cart.php?add='.$id.'">[+]</a>
                    <a href="index.php?delete='.$id.'">[Delete]</a><br>';
                }
            }
            $total +=  $sub; 
        }
        // else{
        //     echo 'Your cart is empty.';
        // } 
        
    }    
    
    if($total == 0) {
    echo 'Your cart is empty';
    }
    else {
        echo '<p>Total : Rs;'.number_format($total,2).'</p>';
        echo '<p><h2><a href="Checkout.php">Check Out</a></h2></p>';
    }
}
?>



