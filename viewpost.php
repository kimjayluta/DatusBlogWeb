<?php
    session_start();
    include "functions/database.php";
    @$loggedId = $_SESSION['id'];
    @$loggedType = $_SESSION['type'];
    if (!isset($_SESSION['user']) && isset($_SESSION['id']) && isset($_SESSION['type'])){
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
    <style>
        body{
            margin: 0;
            background-color: whitesmoke;
            font-family: Arial, sans-serif;
        }
        .nav{
            height: 53px;
            background-color: white;
            margin-bottom: 25px;
            border-bottom: 2px solid #d8d7d7;
            width: auto;
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
            border-left: 2px solid #d8d7d7;
        }
        .link{
            text-decoration: none;
            color: #000;
            font-size: 16px;
            text-align: center;
        }
        .cmsec{
            margin-left: 16rem;
            background-color: white;
            width: 824px;
            padding: 5px;
            border:1px solid #d4d3d3;
        }
        .comment{
            width: 807px;
            border-radius: 5px;
            margin-left: 9px;
            margin-top: 9px;
        }
        .commentBtn{
            margin-left: 44rem;
            width: 113px;
            height: 30px;
            border-radius: 3px;
            border: 2px solid #d4d3d3;
        }
        .commentcard{
            margin-top: 4px;
            border: 1px solid #d8d7d7;
            padding: 9px;
            width: 814px;
            margin-left: 257px;
            background-color: #ececec;
            font-family: sans-serif;
        }
        .commentBtn:hover{
            background-color: #949292;
            border:1px solid #d4d3d3;
        }
        .active{
            background: whitesmoke;
        }
        #logout{
            float: right;
            margin-top:10px;
            font-size: 21px;
            color: #a5a2a2;
            text-decoration: none;
        }
        #reply{
            font-size: 15px;
            text-decoration: none;
            color: #5262d6;
            margin-left: 47rem;
        }
        #reply:hover{
            color: blue;
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
</head>
<body>
<nav class="nav">
    <div class="container">
        <h2  style="margin: 6px 0 10px 0;float: left">DatosAnalyticos</h2>
        <a href="functions/lslfunction.php?logout" type="submit" id="logout" name="logout"><i class="fas fa-sign-out-alt"  ></i>Logout</a>
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
                    echo ' <li><a href="#" class="link"><i class="fas fa-edit fa-lg" style="color: #a5a2a2;"></i> View reports</a></li>';
                } else{
                    echo '<li><a href="sendreport.php" class="link">&nbsp;<i class="fas fa-file fa-lg" style="color: #a5a2a2;"></i>&nbsp;&nbsp;Report</a></li>';
                }
                ?>
                <li><a href="#" class="link"><i class="fas fa-phone fa-lg" style="color: #a5a2a2;"></i>&nbsp;Contact us</a></li>
            </ul>
        </div>
        <div id="qpost">
            <?php
                $postid = $_GET['id'];
                $query = mysqli_query($connect,"SELECT posts.*,users.username FROM posts,users WHERE posts.user_id=users.id AND posts.id ='$postid'  ORDER BY `id` DESC");
                $posts = array();
                while ($row = mysqli_fetch_array($query)){
                    array_push($posts,$row);
                }
                $query = mysqli_query($connect, "SELECT * FROM likepost WHERE user_id = '$loggedId' AND post_id = '$postid'");
                foreach ($posts as $v){
                    echo '<div class="colTwo">';
                        echo "<div>";
                        echo "<h3>".$v['title']."</h3>";
                        echo "<small>".$v['username']." | ".$v['posted_at']."</small><hr/>";
                        echo "<p>".$v['description']."</p>";
                        if (!mysqli_num_rows($query) > 0){
                            echo "<a href='functions/postfunction.php?id=".$postid."'>".$v['likes']."  Like</a><br>";
                        }else{
                            echo "<a href='functions/postfunction.php?id=".$postid."'>".$v['likes']." Unlike</a>";
                        }
                        echo "</div>";
                    echo '</div>';
                    echo '<div class="cmsec">';
                        echo '<form action="functions/postfunction.php?id='.$postid.'" name="comment" method="post">';
                        echo '<textarea name="comment" class="comment" id="" rows="3" placeholder="Comment here:"></textarea><br>';
                        echo ' <button type="submit" name="cmnt"class="commentBtn">Submit</button>';
                        echo '</form>';
                        echo'</div>';
                }
            ?>
        </div>
        <!--Comment query-->
        <?php
        $query = mysqli_query($connect,"SELECT comments.*,users.username FROM comments,users WHERE comments.comment_by = users.id AND post_id = '$postid' ORDER BY id DESC");
        $comment = array();
        while ($row = mysqli_fetch_array($query)){
            array_push($comment,$row);
        }
        foreach ($comment as $c){
            echo '<div class="commentcard">
                              <small>'.$c['username'].' | '.$c['comment_at'].'</small>
                              <p>'.$c['comment_text'].'</p>
                              <a href="#" id="reply">Reply |</a>
                         </div>';
        }
        ?>
    </div>
</div>
<script src="js/smooth-scroll.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
</body>
</html>