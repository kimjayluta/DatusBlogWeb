<?php
session_start();

include "database.php";

@$loggedId = $_SESSION['id'];
@$loggedType = $_SESSION['type'];
@$post_id = $_GET['id'];
//Admin post function
if (isset($_POST['adminpost'])){
    $title = $_POST['title'];
    $desc = $_POST['text'];
    $reportType = $_POST['type'];
    if (isset($title) && isset($desc)){
        if ($reportType == 0 ){
            $query = mysqli_query($connect,"INSERT INTO posts(`title`,`description`,`posted_at`,`user_id`) VALUES ('$title','$desc',now(),$loggedId)");
            if ($query == true){
                if ($loggedType  == 1){
                    header("location: ../adminpost.php");
                } else{
                    header("location: ../sendreport.php");
                }
            } else{
                echo "Error: uploading a data";
                exit;
            }
        }else{
            $query = mysqli_query($connect,"INSERT INTO report(`title`,`description`,`send_at`,`user_id`) VALUES ('$title','$desc',now(),$loggedId)");
            if ($query == true){
                header("location: ../sendreport.php");
            } else{
                echo "Error: uploading a data";
                exit;
            }
        }
    }
}
//Comment function
else if (isset($_POST['cmnt'])){
    $comment = $_POST['comment'];
    if (isset($comment) && isset($post_id)){
        $sql = "INSERT INTO comments(`comment_text`,`comment_by`,`post_id`,`comment_at`) VALUES ('$comment','$loggedId','$post_id',now());";
        $query = mysqli_query($connect,$sql);
        if ($query == true){

            $sql = "UPDATE posts SET comments = comments + 1 WHERE id ='$post_id'";
            $query = mysqli_query($connect,$sql);

            header("location: ../viewpost.php?id=$post_id");
        }else{
            echo "Error: uploading a data";
            exit;
        }
    }
}
//Like function
else if(isset($_GET['id'])){
    $query = mysqli_query($connect,"SELECT * FROM likepost WHERE user_id = '$loggedId' AND post_id = '$post_id'");
    if (!mysqli_num_rows($query) > 0){

        $sql = "UPDATE posts SET likes = likes + 1 WHERE id ='$post_id'";
        $query = mysqli_query($connect,$sql);

        if ($query == true){

            $sql = "INSERT INTO likepost(`post_id`,`user_id`) VALUES ('$post_id','$loggedId')";
            mysqli_query($connect,$sql);

            header("location: ../viewpost.php?id=$post_id");
        }else{
            echo "Error: uploading data";
            exit;
        }
    }else{
        $sql = "UPDATE posts SET likes=likes-1 WHERE id='$post_id'";
        $query = mysqli_query($connect,$sql);
        if ($query == true){

            $sql = "DELETE FROM likepost WHERE post_id = '$post_id' AND user_id = '$loggedId'";
            mysqli_query($connect,$sql);

            header("location: ../viewpost.php?id=$post_id");
        } else{
            echo "Error: uploading data";
            exit;
        }
    }

}
//reply function
else if(isset($_POST['reply'])) {
    $pId = $_GET['pid'];
    $cmtId = $_GET['commentId'];
    $reply = $_POST['replyArea'];
    if (isset($cmtId) && isset($reply) && isset($pId)) {
        if ($reply < 160){
            $query = mysqli_query($connect, "INSERT INTO reply(`reply_text`,`reply_at`,`comment_id`,`reply_by`,`post_id`) VALUES('$reply',now(),'$cmtId','$loggedId','$pId')");
            if ($query == true){
                header("location: ../viewpost.php?id=$pId&commentId=$cmtId");
            }else{
                echo  "Error: uploading data";
                exit;
            }
        } else{
            echo "your reply is too long";
            exit;
        }
    }
}