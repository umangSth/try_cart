<?php
if (isset($_POST["signup-submit"])) {

	

	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
	$mobileNumber = $_POST['phone'];
	$address = $_POST['address'];

	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($mobileNumber
	) || empty($address) ){
		header("Location:../customerSignup.php?error=emptyfields&uid=".$username."&mail=".$email."&phone=".$mobileNumber."&address=".$address);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
		header("Location:../customerSignup.php?error=invalidmailuid");
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  #filter_validate_email checks if email is valid or not
		header("Location:../customerSignup.php?error=invalidmail&uid=".$username."&mail=&phone=".$mobileNumber."&address=".$address);
		exit(); 
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {  #filter_validate_email checks if email is valid or not
		header("Location:../customerSignup.php?error=invaliduid&uid=&mail=".$email."&phone=".$mobileNumber."&address=".$address);
		exit();
	}
	elseif (!preg_match("/^[0-9]*$/", $mobileNumber)) {  #checks if the mobile number is valid or not
		header("Location:../customerSignup.php?error=invalidphone&uid=".$username."&mail=".$email."&phone=''&address=".$address);
		exit();
	}
	elseif ($password !== $passwordRepeat) {
		header("Location:../customerSignup.php?error=passwordcheck&uid=".$username."&mail=".$email."&phone=".$mobileNumber."&address=".$address);
		exit();
		# code...
	}
	else {
		$sql = "SELECT UserName FROM users WHERE UserName=?";
		$stmt = mysqli_stmt_init($conn); #check connection between database and user login
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../customerSignup.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);	
			if ($resultCheck > 0) {
				header("Location:../customerSignup.php?error=usertaken&&uid=".$username."&mail=''&phone=".$mobileNumber."&address=".$address);
				exit();

			}
			else{
				$sql = "INSERT INTO users (UserName, UserEmail, UserAddress, UserPhone, UserPassword) VALUES (?, ?, ?, ?, ?)"; #insert value in table in sql
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location:../customerSignup.php?error=sqlerror"); #checkks if stmt and sql statement works together 
					exit();
				}
				else {
					$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"sssis",$username, $email, $address, $mobileNumber, $hashedpwd );
					mysqli_stmt_execute($stmt);
					header("Location:../customerSignup.php?signup=success"); 
					exit();

				}
			}		
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

} 
else {
	header("Location: ../customerSignup.php");
	exit();
}