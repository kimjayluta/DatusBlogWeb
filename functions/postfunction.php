<?php
include "database.php";

if (isset($_POST['adminpost'])){
    $title = $_POST['title'];
    $desc = $_POST['myTextArea'];
    if (isset($title) && isset($desc)){
        DB::query("INSERT INTO posts VALUES ('',:title,:description,now(),0,11)",array(':title'=>$title,':description'=>$desc));
        header("location: ../adminpost.php");
    }
}
if (isset($_POST['cmnt'])){
    $comment = $_POST['comment'];
    $post_id = $_GET['id'];

    if (isset($comment) && isset($post_id)){
        if (strlen($comment) <= 160){
            DB::query("INSERT INTO comments VALUES ('',:comment,:postid,0,now())",array(':comment'=>$comment,':postid'=>$post_id));
            header("location: ../viewpost.php?id=$post_id");
        }else{
            echo "your post is too long!";
            exit;
        }
    }
}