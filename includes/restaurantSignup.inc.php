<?php
if (isset($_POST["submit"])) {

	require 'dbh.inc.php';

	$R_Name = $_POST['R_Name'];
	$R_Email = $_POST['R_Email'];
	$R_Address = $_POST['R_Address'];
	$R_Phone = $_POST['R_Phone'];
	$R_Owner = $_POST['R_Owner'];
	$R_Pan = $_POST['R_Pan'];
	$R_Username=$_POST['R_Username'];
	$R_Password = $_POST['R_Password'];
	$R_RePassword = $_POST['R_RePassword'];
	
	

	if (empty($R_Name) || empty($R_Email) || empty($R_Address) || empty($R_Phone) || empty($R_Owner) || empty($R_Pan) || empty($R_Username) || empty($R_Password) || empty($R_RePassword) ){
		header("Location:../restaurantSignup.php?error=emptyfields&name=".$R_Name."&mail=".$R_Email."&address=".$R_Address."&phone=".$R_Phone."&owner=".$R_Owner."&pan=".$R_Pan."&username=".$R_Username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $R_Name) ){ //check the name
		header("Location:../restaurantSignup.php?error=invalidname&name=".$R_Name);
	}
	elseif (!filter_var($R_Email, FILTER_VALIDATE_EMAIL)) {  #filter_validate_email checks if email is valid or not
		header("Location:../restaurantSignup.php?error=invalidmail&mail=".$R_Email);
		exit(); 
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $R_Address)) {  #filter_address checks is valid or not
		header("Location:../restaurantSignup.php?error=invalidaddress&address=".$R_Address);
		exit();
	}
	elseif (!preg_match("/^[0-9]*$/", $R_Phone) && $R_Phone == 10) {  #checks if the mobile number is valid or not
		header("Location:../restaurantSignup.php?error=invalidphone&phone=".$R_Phone);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z]*$/", $R_Owner)) {  #checks if the owner name is valid or not
		header("Location:../restaurantSignup.php?error=invalidownername&=".$R_Owner);
		exit();
	}
	elseif (!preg_match("/^[0-9]*$/", $R_Pan) && $R_Pan == 10) {  #checks if the pan number is valid or not
		header("Location:../restaurantSignup.php?error=invalidpan=".$R_Pan);
		exit();
	}

	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $R_Username) ){ //check the username
		header("Location:../restaurantSignup.php?error=invalidusername=".$R_Username);
	}
	elseif ($R_Password !== $R_RePassword) {
		header("Location:../restaurantSignup.php?error=passwordcheck&name=".$R_Name."&mail=".$R_Email."&address=".$R_Address."&phone=".$R_Phone."&owner=".$R_Owner."&pan=".$R_Pan."&username=".$R_Username);
		exit();
		# code check if enter password match
	}
	else {
		$sql = "SELECT R_User FROM restaurants WHERE R_User=?";
		$stmt = mysqli_stmt_init($conn); #check connection between database and user login
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../restaurantSignup.php?error=sqlerror1");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$R_User);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);	
			if ($resultCheck > 0) {
				header("Location:../restaurantSignup.php?error=usertaken&mail=".$R_Email);
				exit();
			}
			else{
				$sql = "INSERT INTO restaurants (R_Name, R_Email, R_Address, R_Phone, R_Owner, R_Pan, R_User, R_Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; #insert value in table in sql
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location:../restaurantSignup.php?error=sqlerror2"); #checkks if stmt and sql statement works together 
					exit();
			}
				else {
					$hashedpwd = password_hash($R_Password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"sssisiss",$R_Name, $R_Email, $R_Address, $R_Phone, $R_Owner, $R_Pan, $R_Username, $hashedpwd );
					mysqli_stmt_execute($stmt);
					header("Location:../restaurantSignup.php?signup=success"); 
					exit();

				}
			}		
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

} 
else {
	header("Location: ../restaurantSignup.php");
	exit();
}