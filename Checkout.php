<?php include "header.php";?>
<?php 

$page='/Checkout.php'; 


include 'includes/dbh.inc.php';


if (isset($_GET['add'])){
    $sql= 'SELECT id, quantity FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$_GET['add']);
    $quantity=mysqli_query($conn, $sql);
    while ($quantity_row = mysqli_fetch_array($quantity)){
        if ($quantity_row['quantity']!=$_SESSION['cart_'.(int)$_GET['add']]){
            $_SESSION['cart_'.(int)$_GET['add']]+='1';
        }
    }
    header('Location: Checkout.php'); 
}

if(isset($_GET['remove'])) {
    $_SESSION['cart_'.(int)$_GET['remove']]--;
    header('Location: Checkout.php');
}

if (isset ($_GET['delete'])) {
    $_SESSION['cart_'.(int)$_GET['delete']]='0';
    header('Location: Checkout.php');
}

function cart2() {

    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            ";



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
                    echo '<tbody>
                    <tr>
                    <td>'.$get_row['name'].'</td>
                    <td> '.$value.'</td>
                    <td>  Rs'.number_format($get_row['price'], 2).'</td>
                    <td>  Rs'.number_format($sub, 2).'<a href="Checkout.php?remove='.$id.'">[-]</a>
                    <a href="Checkout.php?add='.$id.'">[+]</a>
                    <a href="Checkout.php?delete='.$id.'">[Delete]</a>
                    </td>
                    </tbody>';
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
        echo "<div class='container'>
        </tbody></table>
        
        <p>Total : Rs ".number_format($total,2)."</p>

        <a href='Checkout.php?checkout' class='btn btn-info' role='button'>Pay On Delivery</a>
        <li>Extra charge will be Added</li>
        
        <br>
        <form action='https://www.paypal.com/cgi-bin/webscr' method='post'>
        <input type='hidden' name='cmd' value='_cart'>
        <input type='hidden' name='upload' value='1'>
        <input type='hidden' name='business' value='umang.sth101@gmail.com'> <!--this is place where we place the email id of the customer for paypal checkout-->
        "; 
        paypal_items();
        echo "<input type='hidden' name='currency_code' value='GBP'><!-- this is currency place we have to change into rupees-->
        <input type='hidden' name='amount' value='".$total."'>
        <input type='image' src='http://www.paypal.com/en_US/i/btn/x-click-but03.gif' name='submit' alt='Make payments with PayPal - it`s fast, free and secure!'>
        </form>
        </div>
           
        ";
      
    }
}


if (isset($_GET['checkout'])){

    $total = '0';
    $userId = $_SESSION['userId'];
    $userAddress = $_SESSION['userAddress'];
    $userPhone = $_SESSION['userPhone'];
    foreach($_SESSION as $name => $value){
        if ($value > 0) {
            if(substr($name, 0, 5) == 'cart_'){
               $id = substr($name, 5, (strlen($name)-5));//this will help to take id of item by subtracting the above cart_
                $query = 'SELECT id, name, price, R_Id FROM products WHERE id='.mysqli_real_escape_string($conn, (int)$id);
                $get = mysqli_query($conn, $query);
                while ($get_row = mysqli_fetch_array($get)){
                    // $sub = $get_row['price']*$value;
                    // echo '<tbody><tr><td>'.$get_row['name'].'</td><td> '.$value.'</td><td>  &pound;'.number_format($get_row['price'], 2).'</td><td>  &pound;'.number_format($sub, 2).'<a href="Checkout.php?remove='.$id.'">[-]</a><a href="Checkout.php?add='.$id.'">[+]</a><a href="Checkout.php?delete='.$id.'">[Delete]</a></td></tbody>';
                    $sql = 'INSERT INTO  order_list (UserId, R_Id, Id, quantity, price, UserAddress, UserPhone) values (?,?,?,?,?,?,?)'; #insert value in table in sql
                    // $sql = 'SELECT * FROM order_list';
				    $stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
                    printf("Error: %s\n", mysqli_error($conn));; #checkks if stmt and sql statement works together 
                    exit();
                }
                
				else {
					mysqli_stmt_bind_param($stmt,"siiiisi", $userId ,$get_row["R_Id"],$get_row["id"], $value, $get_row["price"], $userAddress, $userPhone);
					mysqli_stmt_execute($stmt);
					
				}
                }
            }
            unset($_SESSION['cart_'.$id]);
            // $total +=  $sub; 
        }
        // else{
        //     echo 'Your cart is empty.';
        // } 
    }
    echo '<h1> Your Order is under process</h1>';
}    

 ?>




    
<?php 
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







cart2();


include 'footer.php';
?>
