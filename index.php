<?php
    session_start();
    include "functions/database.php";
    @$loggedId = $_SESSION['id'];
    @$loggedType = $_SESSION['type'];
    if (!isset($_SESSION['user']) && !isset($_SESSION['type'])&& !isset($_SESSION['id'])){
        header("location: login.php");
        exit;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datus Analyticus| Blog</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<nav class="nav">
    <div class="container">
        <h2  style="margin: 6px 0 10px 0; float: left;">DatosAnalyticos</h2>
        <a href="functions/lslfunction.php?logout" type="submit" id="logout"><i class="fas fa-sign-out-alt"  ></i>Logout</a>
    </div>
</nav>
<!--Content-->
<div class="container">
    <div class="row">
        <div class="colOne">
            <ul>
                <li class="active"><a href="index.php" class="link" ><i class="fas fa-home fa-lg"></i> Home</a></li>
                <li><a href="updates.php" class="link"><i class="fas fa-edit fa-lg" style="color: #a5a2a2;"></i> Updates</a></li>
                <?php
                    if ($loggedType > 0){
                        echo ' <li><a href="adminpost.php" class="link"><i class="fas fa-pen-alt fa-lg" style="color: #a5a2a2;"></i>  Post</a></li>';
                        echo ' <li><a href="sent_reports.php" class="link"><i class="fas fa-envelope-open" style="color: #a5a2a2;"></i> View reports</a></li>';
                    } else{
                        echo '<li><a href="report.php" class="link">&nbsp;<i class="fas fa-file fa-lg" style="color: #a5a2a2;"></i>&nbsp;&nbsp;Report</a></li>';
                    }
                ?>
                <li><a href="#" class="link"><i class="fas fa-phone fa-lg" style="color: #a5a2a2;"></i>&nbsp;Contact us</a></li>
            </ul>
        </div>
        <div>
            <?php
                $query = mysqli_query($connect,"SELECT posts.*,users.username FROM posts,users WHERE posts.user_id = users.id ORDER BY posted_at DESC");
                $posts = array();
                 while ($row = mysqli_fetch_array($query)){
                     array_push($posts,$row);
                 }
                 mysqli_free_result($query);
                foreach ($posts as $p){
                    echo "<div class='colTwo'>";
                    if ($p['user_id'] == 2){
                        echo " <a href='viewpost.php?id=".$p['id']."' style='text-decoration-line:none; color: black; font-size: 22px;'><strong style='color:blue;'>[Update] </strong>".$p['title']."</a><br>";
                    } else{
                        echo " <a href='viewpost.php?id=".$p['id']."' style='text-decoration-line:none; color: black; font-size: 22px;'><strong style='color:#bd5f3c;'>[Notice] </strong>".$p['title']."</a><br>";
                    }
                    echo "<small>".$p['username']." | ".$p['posted_at']." </small>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>
<script src="js/smooth-scroll.js"></script>
</body>
</html>