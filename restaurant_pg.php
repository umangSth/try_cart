<?php 
include 'includes/dbh.inc.php';
include 'header.php';
?>
<style>

    .wrapper{
            display: flex;
            justify-content: space-between;
        }
       
        .sidebar{
            width:25%;
            height: 25vh;
        }
 
         .sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 60px;
        }
        
</style>



 <div class="container-fluid hero-image" style="background-image: url(img/2.jpg);">
            <div class="hero-text">
                                <h2>Wanna eat something</h2>
                                <form action="search.php" method="POST">
                                    <input type="text" name="search" placeholder="Search" style="color: black;">
                                    <button type="submit" name="submit-search" style="color: black;">Search</button>
                              </form>
            </div>
 </div>
<br>
<br>
<br>

<div class="wrapper">
    <div class="sidebar">
        <nav class="col-sm-2">
            <ul class="nav nav-pills nav-stacked">
      <?php 
         if(isset($_GET['r_id'])){
            $R_Id=mysqli_real_escape_string($conn, (int)$_GET['r_id']);
        }
        $sql = 'SELECT DISTINCT categories FROM products WHERE R_Id="'.$R_Id.'"';
         $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)){
                $cat = $row['categories'];
                echo '<li><a href="#'.$cat.'">'.$cat.'</a></li>';
        }
      ?>
            </ul>
        </nav>
    </div>
<div class="main">

<?php category(); ?>
</div>
</div>




<?php 
function category(){
    global $conn;
    if(isset($_GET['r_id'])){
        $R_Id=mysqli_real_escape_string($conn, (int)$_GET['r_id']);
    }
    if(isset($_SESSION['userType'])){
        $userType = $_SESSION['userType'];
        }  
    $sql = 'SELECT DISTINCT categories FROM products WHERE R_Id="'.$R_Id.'"';
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($result)){
        $cat = $row['categories'];
        echo '<p>.</p>';
        echo '<hr>';
        echo '<br>';
        $get = 'SELECT * FROM products WHERE categories="'.$cat.'" AND R_Id = "'.$R_Id.'"';   
        $result2 = mysqli_query($conn, $get); 
        echo '<div id="'.$cat.'">';
      
        // echo '<div class="row">'; 
        while ($get_row=mysqli_fetch_array($result2)){
            echo '<div class="col-sm-4" style="margin-top:20px;">';
            echo '<div class="card" >';
            $img_url = "img/product/".$get_row["image"];
            echo '<img src="'.$img_url.'" class="card-img-top" width="280px" height="200" alt="Cinque Terre"><br>';
            echo '<p class="card-title">'.$get_row['name'].'</p>
            <p class="card-text">Description: '.$get_row['description'].'</p>
             Rs'.number_format($get_row['price'], 2);
            if(isset($_SESSION['userType'])){ 
              if($userType == 'customer'){
                     echo '<p><a href="includes/cart.php?add='.$get_row['id'].'" class="btn btn-info">Add</a></p>';
                }
            }
            echo '<br></div></div>';           
        }
       echo '</div>';  
         
    
     
    }
 }

?>




