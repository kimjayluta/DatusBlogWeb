<?php
    session_start();
    include "functions/database.php";
    if (!isset($_SESSION['loginses'])){
        header("location: ../login.php");
        exit;
    }else{
        if ($_SESSION['type'] == 1){
            echo "You are admin!";
        }else{
            echo "You are a member";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body{
            margin: 0;
            background-color: whitesmoke;
        }
        *{
            font-family: Arial, sans-serif;
        }
        .nav{
            background-color: white;
            padding: 6px;
            margin-bottom: 25px;
            border-bottom: 2px solid #d8d7d7;
        }
        .container{
            width: 1100px;
            padding: 6px;
            margin: auto;
        }
        .colOne{
            background: white;
            width: 171px;
            float: left;
            border-bottom:2px solid #bfbfbf6b;
            margin-left: 10px;
        }
        .colTwo{
            width: 800px;
            margin-left: 16rem;
            padding: 17px;
            background-color: white;
            margin-bottom: 8px;
            font-family: sans-serif;
            border-bottom: 2px solid #d8d7d7;
        }
        .link{
            text-decoration: none;
            color: #000;
            font-size: 16px;
            text-align: center;
        }
        .active{
            background: whitesmoke;
        }
        ul{
            list-style: none;
            padding-left: 0 !important;
        }
        ul>li{
            font-family: sans-serif;
            padding: 10px;
        }
        li:hover{
            background-color: whitesmoke;
        }
    </style>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datus Analyticus| Blog</title>
</head>
<body>
<nav class="nav">
    <div class="container">
        <h2>DatosAnalyticus</h2>
    </div>
</nav>
<!--Content-->
<div class="container">
    <div class="row">
        <div class="colOne">
            <ul>
                <li class="active"><a href="index.php" class="link">All post</a></li>
                <li><a href="#" class="link">Updates</a></li>
                <li><a href="#" class="link">Report / Suggestion</a></li>
                <li><a href="#" class="link">Contact us</a></li>
            </ul>
        </div>
        <div>
            <?php
                $posts = DB::query("SELECT title,posted_at,id FROM posts ORDER BY `id` DESC");
                foreach ($posts as $p){
                    echo "<div class='colTwo'>";
                    echo " <a href='viewpost.php?id=".$p['id']."' style='text-decoration-line:none; color: black; font-size: 22px;'><strong style='color:blue;'>[Update]</strong>".$p['title']."</a><br>";
                    echo "<small>Kim Jay | ".$p['posted_at']." </small>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>