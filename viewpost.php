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
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/viewpost.css">
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
                    echo ' <li><a href="sent_reports.php" class="link"><i class="fas fa-envelope-open" style="color: #a5a2a2;"></i> View reports</a></li>';
                } else{
                    echo '<li><a href="report.php" class="link">&nbsp;<i class="fas fa-file fa-lg" style="color: #a5a2a2;"></i>&nbsp;&nbsp;Report</a></li>';
                }
                ?>
                <li><a href="#" class="link"><i class="fas fa-phone fa-lg" style="color: #a5a2a2;"></i>&nbsp;Contact us</a></li>
            </ul>
        </div>
        <div id="qpost">
            <?php
                @$postid = $_GET['id'];
                $query = mysqli_query($connect,"SELECT posts.*,users.username FROM posts,users WHERE posts.user_id=users.id AND posts.id ='$postid'  ORDER BY `id` DESC");
                $posts = array();
                while ($row = mysqli_fetch_array($query)){
                    array_push($posts,$row);
                }
                $query = mysqli_query($connect, "SELECT * FROM likepost WHERE user_id = '$loggedId' AND post_id = '$postid'");
                foreach ($posts as $v) {
                    echo '<div class="colTwo">';
                        echo "<h3>" . $v['title'] . "</h3>";
                            if($loggedId == $v['user_id']){
                                echo '<div class="editDeleteBtn">
                                        <a href="editPage.php?pId='.$postid.'" class="editDelete">Edit |</a>
                                        <a href="#" id="delete" class="editDelete">Delete</a>
                                      </div>';
                            }
                        echo "<small>" . $v['username'] . " | " . $v['posted_at'] . "</small><hr/>";
                        echo "<p>" . $v['description'] . "</p>";
                        echo "<div style='text-align: center; margin-top: 22px;'>";
                        if (!mysqli_num_rows($query) > 0) {
                            echo "<a href='functions/postfunction.php?id=" . $postid . "'class='likeBtn'>" . $v['likes'] . "&nbsp;Like</a>";
                        } else {
                            echo "<a href='functions/postfunction.php?id=" . $postid . "' class='likeBtn'>" . $v['likes'] . " &nbsp;Unlike</a>";
                        }
                        echo "<a href='comment.php?id=".$postid."' class='cmtBtn'>" .$v['comments']. "&nbsp;Comment</a>";
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        <!--Comment query-->
        <?php
        $query = mysqli_query($connect,"SELECT comments.*,users.username FROM users,comments WHERE comments.comment_by = users.id AND comments.post_id = '$postid' ORDER BY comments.id DESC");
        $comment = array();
        while ($row = mysqli_fetch_array($query)){
            array_push($comment,$row);
        }


        @ $sql = "SELECT reply.*,users.username FROM reply,users WHERE reply.post_id = '$postid' AND reply.reply_by = users.id ";
        @ $query = mysqli_query($connect, $sql);
        $reply = array();
        while ($row = mysqli_fetch_array($query)){
            $reply[$row['comment_id']][] = $row;
        }
        foreach ($comment as $c){
            $commentId = $c['id'];
            echo '<div class="commentcard" data-id="'.$commentId.'">
                    <small style="float: left;">'.$c['username'].' | '.$c['comment_at'].'</small>';
                    if($loggedId == $c['comment_by']){
                        echo '<div class="editDeleteBtn">
                                <a href="editPage.php?cmId='.$commentId.'&cpId='.$postid.'"  class="editDelete">Edit |</a>
                                <a href="#" id="delete" class="editDelete">Delete</a>
                              </div>';
                    }else{
                        echo '<a href="javascript:void(0)" class="reply">Reply</a>';
                    }
            echo '<p>'.$c['comment_text'].'</p>';

            echo '  <div class="replysec">
                        <hr>
                        <form action="functions/postfunction.php?cmId='.$c['id'].'&pid='.$postid.'"  method="post">
                            <textarea name="replyArea" class="replyArea textarea"  rows="3" placeholder="&nbsp;@'.$c['username'].'"></textarea><br>
                            <div class="replyBtn">
                                <button class="rbtn">Cancel </button>
                                <button type="submit" name="reply" class="rbtn">Submit </button>
                            </div>
                        </form>
                    </div>
                  </div>';

            if (isset($reply[$commentId])){

                foreach ($reply[$commentId] as $r){
                    echo '<div class="replycard" >
                        <small>'.@$r['username'].' | '.@$r['reply_at'].'</small>';
                        if($loggedId == $r['reply_by']){
                            echo '<div class="editDeleteBtn">
                                    <a href="editPage.php?replyId='.$r['id'].'&postid='.$postid.'" class="editDelete">Edit |</a>
                                    <a href="#" id="delete" class="editDelete">Delete</a>
                                  </div>';
                        }
                    echo '<p>'.@$r['reply_text'].'</p>';
                    echo'<div class="replysection" style="display: none;"><hr>
                        <form action="functions/postfunction.php?commentId='.$c['id'].'&pid='.$postid.'"  method="post">
                            <textarea name="replyArea" class="replyArea textarea"  rows="3" placeholder="&nbsp;@'.$c['username'].'"></textarea><br>
                            <div class="replyBtn">
                                <button class="rbtn">Cancel </button>
                                <button type="submit" name="reply" class="rbtn">Submit </button>
                            </div>
                        </form>
                    </div>
                  </div>';

                }
            }

        }
        ?>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>
<!-- Initialize the editor. -->
<script> $(function() { $('textarea').froalaEditor() }); </script>
<script src="js/smooth-scroll.js"></script>
<script>
    $(document).ready(function(){
        $(".reply").on('click',function(){
            $(this).parents(".commentcard").find(".replysec").slideToggle();
        });
    });

    $(function() {
        $('.textarea').froalaEditor({
            // Set the file upload URL.
            imageUploadURL: 'upload_image.php',
            /*imageUploadParams: {
             id: 'my_editor'
             }*/
        })
    });
</script>
</body>
</html>