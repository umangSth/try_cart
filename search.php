<?php 
include 'includes/dbh.inc.php';
include 'header.php';


?>
<body>
   
   <h1> Search Page </h1>

   <div class="container">
   <?php 
        if (isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR price LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
            echo "There are ".$queryResult." result!";
            if($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo '<div style="height:500; breath:400px; float:left; ">';
                    $img_url = "img/product/".$row["image"];
                    echo '<img src="'.$img_url.'" style="height:300px; breath:400px;"><br>';
                    echo '<p>'.$row['name'].'</p><br>
                    '.$row['description'].'
                    <br> Rs'.number_format($row['price'], 2);
                    if(isset($_SESSION['userType'])){ 
                    if($userType == 'customer'){
                    echo '<a href="includes/cart.php?add='.$row['id'].'">Add</a>';
                }
            }
        }}


            else {
                echo "There are no results matching your search!";
            }
        }
        
   ?>
   </div>


<?php 

include 'footer.php';
?>