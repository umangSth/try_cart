

<?php


require 'includes/dbh.inc.php';

echo "<form action='dummy.php' method='POST'>
        <input type='text' name='user'>
        <button type='submit' name='submit'>something</button>
    </form>";


products();

    function products(){
        global $conn;
         

         $get_R='SELECT * FROM restaurants ORDER by R_Id ASC';
         $result_R= mysqli_query($conn, $get_R);
         while ($R_row=mysqli_fetch_array($result_R)){
            $get = 'SELECT * FROM products WHERE quantity > 0 and R_ID = '.$R_row['R_Id'].' ORDER by R_Id ASC';   
            $result = mysqli_query($conn, $get);   
            echo  'a'; 
            while ($get_row=mysqli_fetch_array($result)){
                echo 'b';
            }     
            
             } 
         }
     

