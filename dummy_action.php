<?php 
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #f3f3f3;
            font-family: arial;
        }
        .article-container {
            width: 900px;
            background-color: #fff;
            padding: 30px;
        }
        .article-box {
            padding-bottom: 30px;
            width: 100%;
        }
        input {
            padding: 0px 20px;
            width: 300px;
            height: 40px;
            font-size: 22px;
        }
        button {
            width: 100px;
            height: 44px;
            font-size: 22px;
        }
        
    </style>


</head>
<body>
   
   <h1> Search Page </h1>

   <div class="article-container">
   <?php 
        if (isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%' OR a_author LIKE '%$search%' OR a_date LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);
            echo "There are ".$queryResult." result!";
            if($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo '<div class="article-box ">
                    <h3>'.$row["a_title"].'</h3>
                    <p>'.$row["a_text"].'</p>
                    <p>'.$row["a_date"].'</p>
                    <p>'.$row["a_author"].'</p>
                </div>';
                }
            }
            else {
                echo "There are no results matching your search!";
            }
        }
        
   ?>
   </div>