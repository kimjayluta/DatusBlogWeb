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
    <link rel="stylesheet" href="css/editPage.css">
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
            <div class='colTwo'>

            <?php
                //For editing post
                @ $getPostId   = $_GET['pId'];
                @ $getReportId = $_GET['rpId'];

                //For comment kinukua ang duwang id post id ska comment id
                @ $getCommentId = $_GET['cmId'];
                @ $getCmPostId  = $_GET['cpId'];

                //for comment in report
                @ $getComIdrep = $_GET['comRepId'];
                @ $getRepId    = $_GET['reportId'];

                //for editng reply in a post
                @ $getReplyId     = $_GET['replyId'];
                @ $getPostReplyId = $_GET['postid'];

                //for editing reply in a report
                @ $getReply_id  = $_GET['replypostid'];
                @ $getReport_id = $_GET['post_id'];

                //For editing post
                if (isset($getPostId)){
                    $sql = "SELECT * FROM posts WHERE id = '$getPostId'";
                    $query = mysqli_query($connect,$sql);

                    $posts = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($posts,$row);
                    }
                    foreach ($posts as $p){
                        echo '<form action="functions/editFunction.php?upId='.$getPostId.'" method="post">
                            <input type="text" name="title" class="title" placeholder=" Title here:" required="required" value="'.$p['title'].'">
                            <textarea rows="3" name="text" required="required">'.$p['description'].'</textarea>
                            <div style="text-align: right; margin-top: 22px;">
                                <button type="submit" name="update" class="likeBtn" style="border: 1px solid;">Update</button>
                                <a href="viewpost.php?id='.$getPostId.'" class="cancelBtn">Cancel</a>
                            </div>   
                          </form> ';
                    }
                }
                //For editing report
                if (isset($getReportId)){
                    $sql = "SELECT * FROM report WHERE id = '$getReportId'";
                    $query = mysqli_query($connect,$sql);

                    $report = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($report,$row);
                    }
                    foreach ($report as $rp){
                        echo '<form action="functions/editFunction.php?repId='.$getReportId.'" method="post">
                            <input type="text" name="title" class="title" placeholder=" Title here:" required="required" value="'.$rp['title'].'">
                            <textarea rows="3" name="text" required="required">'.$rp['description'].'</textarea>
                            <div style="text-align: right; margin-top: 22px;">
                                <button type="submit" name="update" class="likeBtn" style="border: 1px solid;">Update</button>
                                <a href="viewreport_user.php?rpid='.$getReportId.'" class="cancelBtn">Cancel</a>
                            </div>   
                          </form> ';
                    }
                }

                //For editing comment in post
                if (isset($getCommentId,$getCmPostId)){
                    $sql = "SELECT * FROM comments WHERE id = '$getCommentId'";
                    $query = mysqli_query($connect,$sql);

                    $comment = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($comment,$row);
                    }
                    foreach ($comment as $cm){
                        echo '<form action="functions/editFunction.php?cpId='.$getCmPostId.'&comId='.$getCommentId.'" method="post">
                            <textarea rows="3" name="comment_text" required="required">'.$cm['comment_text'].'</textarea>
                            <div style="text-align: right; margin-top: 22px;">
                                <button type="submit" name="commentUpdate" class="likeBtn" style="border: 1px solid;">Update</button>
                                <a href="viewpost.php?id='.$getCmPostId.'" class="cancelBtn">Cancel</a>
                            </div>   
                          </form> ';
                    }
                }

                //For editing comment in a report
                if (isset($getComIdrep,$getRepId)){
                    $sql = "SELECT * FROM comments WHERE id = '$getComIdrep'";
                    $query = mysqli_query($connect,$sql);

                    $commentReport = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($commentReport,$row);
                    }
                    foreach ($commentReport as $cr){
                        echo '<form action="functions/editFunction.php?reportId='.$getRepId.'&comRepId='.$getComIdrep.'" method="post">
                                <textarea rows="3" name="reportText" required="required">'.$cr['comment_text'].'</textarea>
                                <div style="text-align: right; margin-top: 22px;">
                                    <button type="submit" name="commentUpdate" class="likeBtn" style="border: 1px solid;">Update</button>
                                    <a href="viewreport_user.php?rpid='.$getRepId.'" class="cancelBtn">Cancel</a>
                                </div>   
                              </form> ';
                    }
                }

                //For editing reply in a post
                if (isset($getReplyId,$getPostReplyId)){

                    $sql = "SELECT * FROM reply WHERE id = '$getReplyId'";
                    $query = mysqli_query($connect,$sql);

                    $reply = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($reply,$row);
                    }
                    foreach ($reply as $r){
                        echo '<form action="functions/editFunction.php?postid='.$getPostReplyId.'&replyId='.$getReplyId.'" method="post">
                                <textarea rows="3" name="reply_text" required="required">'.$r['reply_text'].'</textarea>
                                <div style="text-align: right; margin-top: 22px;">
                                    <button type="submit" name="replyUpdate" class="likeBtn" style="border: 1px solid;">Update</button>
                                    <a href="viewpost.php?id='.$getPostReplyId.'" class="cancelBtn">Cancel</a>
                                </div>   
                              </form> ';
                    }
                }

                //For editing reply in a report
                if (isset($getReply_id,$getReport_id)){

                    $sql = "SELECT * FROM reply WHERE id = '$getReply_id'";
                    $query = mysqli_query($connect,$sql);

                    $reply_report = array();
                    while ($row = mysqli_fetch_array($query)){
                        array_push($reply_report,$row);
                    }
                    foreach ($reply_report as $r){
                        echo '<form action="functions/editFunction.php?rprt_id='.$getReport_id.'&rply_id='.$getReply_id.'" method="post">
                                    <textarea rows="3" name="replyrep_text" required="required">'.$r['reply_text'].'</textarea>
                                    <div style="text-align: right; margin-top: 22px;">
                                        <button type="submit" name="replyUpdate" class="likeBtn" style="border: 1px solid;">Update</button>
                                        <a href="viewreport_user.php?rpid='.$getReport_id.'" class="cancelBtn">Cancel</a>
                                    </div>   
                                  </form> ';
                    }
                }
            ?>
        </div>
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
</body>
</html>