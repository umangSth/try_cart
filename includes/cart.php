<?php
session_start();


$page='../index.php'; 


$conn = mysqli_connect("localhost", "root", "", "items");

function items(){
//    $get = mysqli_query('SELECT id, name, description, price FROM products WHERE quantity > 0 ORDER by id DESC');    
//     if (mysql_num_rows($get)== 0){
//         echo 'error';
//     }
//     else{
//         echo 'success';
//     }
}

if (isset($_GET['add'])){
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
    $conn = mysqli_connect("localhost", "root", "", "items");
    $get = 'SELECT * FROM products WHERE quantity > 0 ORDER by id DESC';   
    $result = mysqli_query($conn, $get); 
       while($get_row = mysqli_fetch_array($result)){
           $img_url = "http://localhost/try_cart/img/product/".$get_row["image"];
           echo '<img src="'.$img_url.'"><br>';
           echo '<p>'.$get_row['name'].'<br>'.$get_row['description'].
           '<br> &pound'.number_format($get_row['price'], 2).
           '<a href="includes/cart.php?add='.$get_row['id'].'">Add</a>
           ';
           echo '<a href="includes/delete.php?del='.$get_row['id'].'">Delete Item DB</a></p>';
       }    
}

function paypal_items(){
    $num = 0;
    $conn = mysqli_connect("localhost", "root", "", "items");
    foreach($_SESSION as $name => $value) {
        if($value != 0){
            if (substr($name, 0, 5)=='cart_'){
                $id=substr($name, 5, strlen($name)-5);
                $query = 'SELECT id, name, price, shipping FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$id);
                $get = mysqli_query($conn, $query);
                while ($get_row = mysqli_fetch_array($get)){
                    $num++; // paypal requires serially places special number so this variable does this
                    echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'>';
                    echo '<input type="hidden" name="item_name_'.$num.'" Value="'.$id.'">';
                    echo '<input type="hidden" name="amount_'.$num.'"value="'.$get_row['price'].'">';
                    echo '<input type="hidden" name="shipping_'.$num.'"value="'.$get_row['shipping'].'">';
                    echo '<input type="hidden" name="shipping_'.$num.'"value="'.$get_row['shipping'].'">';
                    echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';

                }
            }
        }
    }
}

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
                    echo $get_row['name'].' x '.$value.' @ &pound;'.number_format($get_row['price'], 2).' =  &pound;'.number_format($sub, 2).'<a href="includes/cart.php?remove='.$id.'">[-]</a><a href="includes/cart.php?add='.$id.'">[+]</a><a href="includes/cart.php?delete='.$id.'">[Delete]</a><br>';
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
        echo '<p>Total : &pound;'.number_format($total,2).'</p>';
        ?>
        <p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="umang.sth101@gmail.com"> <!--this is place where we place the email id of the customer for paypal checkout-->
        <!-- <input type="hidden" name="item_name" value="Item Name"> -->
        <!-- create a function to list cart -->
        <?php 
            paypal_items();
        ?>

        <input type="hidden" name="currency_code" value="GBP"><!-- this is currency place we have to change into rupees-->
        <input type="hidden" name="amount" value="<?php echo $total;?>">
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
        </form>
         </P>   
        <?php
    }
}
?>
