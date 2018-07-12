<?php
include "functions/database.php";
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
        }
        .nav{
            background-color: white;
            padding: 6px;
            text-align: center;
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
        <h2>DATUS ANALYTICUS</h2>
    </div>
</nav>
<!--Content-->
<div class="container">
    <div class="row">
        <div class="colOne">
            <ul>
                <li class="active"><a href="#" class="link">All post</a></li>
                <li><a href="#" class="link">Updates</a></li>
                <li><a href="#" class="link">Suggest</a></li>
                <li><a href="#" class="link">Report</a></li>
                <li><a href="#" class="link">Contact us</a></li>
            </ul>
        </div>
        <div>
            <?php
                $postid = $_GET['id'];
                $vpost = DB::query("SELECT * FROM posts WHERE id=:id",array(':id'=>$postid));
                foreach ($vpost as $v){
                    echo '<div class="colTwo">';
                        echo "<div>";
                        echo "<h3>".$v['title']."</h3>";
                        echo "<small>Kim jay | ".$v['posted_at']."</small><hr/>";
                        echo "<p>".$v['description']."</p>";
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
            <!--Comment query-->
            <?php
                $comment = DB::query("SELECT * FROM comments WHERE post_id = :post_id ORDER BY `id` DESC",array(':post_id'=>$postid));
                foreach ($comment as $c){
                    echo '<div class="commentcard">
                              <small>Kim Jay luta | '.$c['comment_at'].'</small>
                              <p>'.$c['comment_text'].'</p>
                              <a href="#" id="reply">Reply |</a>
                         </div>';
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>