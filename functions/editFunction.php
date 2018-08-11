<?php
session_start();

include "database.php";

//Updating post and reports
if(isset($_POST['update'])){

    //for post
    @$updateId = $_GET['upId'];
    $updateTitle = $_POST['title'];
    $updateDesc = $_POST['text'];

    //for report
    @$updateReportId = $_GET['repId'];
    $updateReportTitle = $_POST['title'];
    $updateReportDesc = $_POST['text'];

    //Updating post
    if (isset($updateTitle,$updateDesc,$updateId)){

        $sql = "UPDATE posts SET `title` = '$updateTitle', `description` = '$updateDesc',`posted_at` = now() WHERE `id` = '$updateId' ";
        $query = mysqli_query($connect,$sql);

        if ($query == true){

            header("location: ../viewpost.php?id=$updateId");

        } else {
            echo "Error: Updating data!";
        }
    }

    //Updating private report
    if (isset($updateReportTitle,$updateReportDesc,$updateReportId)){

        $sql = "UPDATE report SET `title` = '$updateReportTitle', `description` = '$updateReportDesc',`send_at` = now() WHERE `id` = '$updateReportId' ";
        $query = mysqli_query($connect,$sql);

        if ($query == true){

            header("location: ../viewreport_user.php?rpid=$updateReportId");
        } else {

            echo "Error: Updating data!";
        }
    }
}


//For comment update function
if (isset($_POST['commentUpdate'])) {

    //For post
    @$updateComId = $_GET['comId'];
    @$updatePostId = $_GET['cpId'];
    $updateComText = $_POST['comment_text'];

    //For reports
    @$updateComRepId = $_GET['comRepId'];
    @$updateRepId = $_GET['reportId'];
    $updateRepComText = $_POST['reportText'];

    //For updating comment in post
    if (isset($updateComText, $updatePostId, $updateComId)) {

        $sql = "UPDATE comments SET `comment_text` = '$updateComText',`comment_at` = now() WHERE `id` = '$updateComId' AND `post_id` = '$updatePostId' ";
        $query = mysqli_query($connect, $sql);

        if ($query == true) {

            header("location: ../viewpost.php?id=$updatePostId");
        } else {

            echo "Error: Updating data!";
        }
    }

    //For updating comment in a private report
    if (isset($updateComRepId, $updateRepId, $updateRepComText)) {

        $sql = "UPDATE comments SET `comment_text` = '$updateRepComText',`comment_at` = now() WHERE `id` = '$updateComRepId' AND `report_id` = '$updateRepId'";
        $query = mysqli_query($connect, $sql);

        if ($query == true) {

            header("location: ../viewreport_user.php?rpid=$updateRepId");
        } else {

            echo "Error: Updating data!";
        }
    }
}

//For updating reply
if (isset($_POST['replyUpdate'])) {

    //For post
    @$replyId = $_GET['replyId'];
    @$replyPostId = $_GET['postid'];
    $replyText = $_POST['reply_text'];

    //For reports
    @$reply_id = $_GET['rply_id'];
    @$replyReportId = $_GET['rprt_id'];
    @$replyReportText = $_POST['replyrep_text'];

    //For updating comment in post
    if (isset($replyId, $replyPostId, $replyText)) {

        $sql = "UPDATE reply SET `reply_text` = '$replyText',`reply_at` = now() WHERE `id` = '$replyId' AND `post_id` = '$replyPostId' ";
        $query = mysqli_query($connect, $sql);

        if ($query == true) {

            header("location: ../viewpost.php?id=$replyPostId");
        } else {

            echo "Error: Updating data!";
        }
    }

    //For updating comment in a private report
    if (isset($reply_id, $replyReportId, $replyReportText)) {

        $sql = "UPDATE reply SET `reply_text` = '$replyReportText',`reply_at` = now() WHERE `id` = '$reply_id' AND `report_id` = '$replyReportId'";
        $query = mysqli_query($connect, $sql);

        if ($query == true) {

            header("location: ../viewreport_user.php?rpid=$replyReportId");
        } else {

            echo "Error: Updating data!";
        }
    }
}