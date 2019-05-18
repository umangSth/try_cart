<?php


session_start();
unset($_SESSION['userId']);

unset($_SESSION['userUid']);

unset($_SESSION['userType']);

unset($_SESSION['R_Id']);

header("location: ../index.php");