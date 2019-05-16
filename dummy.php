

<?php


require 'includes/dbh.inc.php';

echo "<form action='dummy.php' method='POST'>
        <input type='text' name='user'>
        <button type='submit' name='submit'>something</button>
    </form>";



if(isset($_POST['submit'])){
    
    $user=$_POST['user'];
    $query="SELECT * FROM users WHERE  UserName='".$user."'";
    $result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
        echo $row['userType'];
		if($row['userType'] == 'admin' || 'customer')
		{
			login();
        }
	}

	$query2='SELECT * FROM restaurants WHERE  R_User="'.$user.'"';
	$result2 = mysqli_query($conn, $query2);
	while($row = mysqli_fetch_array($result2)){
		if($row['userType']=='restaurant'){
			restaurantlogin();
		}
    }
}


function login(){
    echo  'admin||coustomer';
}

function restaurantlogin(){
    echo 'restaurant';
}
