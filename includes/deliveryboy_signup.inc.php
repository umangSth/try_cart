<?php
if (isset($_POST["signup-submit"])) {
	session_start();
	$R_Id=$_SESSION['R_Id'];

	require 'dbh.inc.php';

	$deliveryboy_name = $_POST['deliveryboy_name'];
	$deliveryboy_contact = $_POST['deliveryboy_contact'];
	$deliveryboy_email = $_POST['deliveryboy_email'];
	$deliveryboy_password = $_POST['deliveryboy_password'];
	$deliveryboy_repassword = $_POST['deliveryboy_repassword'];
	

	if (empty($deliveryboy_name) || empty($deliveryboy_contact) || empty($deliveryboy_email) || empty($deliveryboy_password) || empty($deliveryboy_repassword)){
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=emptyfields&uid=".$deliveryboy_name."&mail=".$deliveryboy_email."&phone=".$deliveryboy_contact);
		exit();
	}
	elseif (!filter_var($deliveryboy_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $deliveryboy_name) ){
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=invalidmailuid");
	}
	elseif (!filter_var($deliveryboy_email, FILTER_VALIDATE_EMAIL)) {  #filter_validate_email checks if email is valid or not
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=invalidmail=".$deliveryboy_email);
		exit(); 
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $deliveryboy_name)) {  #filter_validate_email checks if email is valid or not
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=invaliduid=".$deliveryboy_name);
		exit();
	}
	elseif (!preg_match("/^[0-9]*$/", $deliveryboy_contact)) {  #checks if the mobile number is valid or not
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=invalidphone=".$deliveryboy_contact);
		exit();
	}
	elseif ($deliveryboy_password !== $deliveryboy_repassword) {
		header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=passwordcheck&mail=".$deliveryboy_email."&uid=".$deliveryboy_name);
		exit();
		# code...
	}
	else {
		$sql = "SELECT deliveryboy_name FROM deliveryboy WHERE deliveryboy_name=?";
		$stmt = mysqli_stmt_init($conn); #check connection between database and user login
		
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=sqlerror1");
			
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$deliveryboy_name);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);	
			if ($resultCheck > 0) {
				header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=usertaken&mail=".$deliveryboy_email);
				exit();

			}
			else{
				$sql = "INSERT INTO deliveryboy (deliveryboy_name, deliveryboy_contact, deliveryboy_email, R_Id, deliveryboy_password) VALUES (?, ?, ?, ?, ?)"; #insert value in table in sql
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location:../CoolAdmin-master/deliveryboy_signup.php?error=sqlerror2"); #checkks if stmt and sql statement works together 
					exit();
				}
				else {
					$hashedpwd = password_hash($deliveryboy_password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"sisis",$deliveryboy_name, $deliveryboy_contact, $deliveryboy_email, $R_Id, $hashedpwd );
					mysqli_stmt_execute($stmt);
					$success= 'Signup Successful!!!';
					header("Location:../CoolAdmin-master/deliveryboy_signup.php?signup=success"); 
					exit();

				}
			}		
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

} 
else {
	header("Location: ../CoolAdmin-master/deliveryboy_signup.php");
	exit();
}