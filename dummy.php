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
    
<form action="dummy_action.php" method="POST">
    <input type="text" name="search" placeholder="Search">
    <button type="submit" name="submit-search">Search</button>
</form>
<h1> Front page </h1>
<h2> All articles: </h2>
<div class="article-container">
    <?php
        $sql = "SELECT * FROM article";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        if($queryResults > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo '<div class="article-box ">
                    <h3>'.$row["a_title"].'</h3>
                    <p>'.$row["a_text"].'</p>
                    <p>'.$row["a_date"].'</p>
                    <p>'.$row["a_author"].'</p>
                </div>';
            }
        }

    ?>
</div>

</body>
</html>