<?php


session_start();
unset($_SESSION['userId']);

unset($_SESSION['userUid']);

unset($_SESSION['userType']);

header("location: ../index.php");