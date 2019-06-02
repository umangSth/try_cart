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

if(isset($_GET['remove'])) {
    $_SESSION['cart_'.(int)$_GET['remove']]--;
    header('Location: '.$page);
}

if (isset ($_GET['delete'])) {
    $_SESSION['cart_'.(int)$_GET['delete']]='0';
    header('Location: '.$page);
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
        echo '<div class="container"><h1>Restaurant: '.$R_row['R_Name'].'</h1>';
        echo '<hr>';    
        while ($get_row=mysqli_fetch_array($result)){
            echo '<div style="height:500; breath:400px; float:left; ">';
            $img_url = "http://localhost/try_cart/img/product/".$get_row["image"];
            echo '<img src="'.$img_url.'" style="height:300px; breath:400px;"><br>';
            echo '<p>'.$get_row['name'].'</p><br>
            '.$get_row['description'].'
            <br> Rs'.number_format($get_row['price'], 2);
            if(isset($_SESSION['userType'])){ 
            if($userType == 'customer'){
            echo '<a href="includes/cart.php?add='.$get_row['id'].'">Add</a>';
            }}
            echo '</p></div>';
        }
        echo "</div>";  
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
                    echo $get_row['name'].' x '.$value.' @ Rs;'.number_format($get_row['price'], 2).' =  Rs;'.number_format($sub, 2).'<a href="includes/cart.php?remove='.$id.'">[-]</a><a href="includes/cart.php?add='.$id.'">[+]</a><a href="includes/cart.php?delete='.$id.'">[Delete]</a><br>';
                }
            }
            $total +=  $sub; // dont know why error is comming but code is running fine
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

