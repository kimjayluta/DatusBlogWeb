<?php
session_start();
include "functions/database.php";
@$loggedId = $_SESSION['id'];
@$loggedType = $_SESSION['type'];
if (!isset($_SESSION['user']) && isset($_SESSION['id']) && isset($_SESSION['type'])){
    header("location: login.php");
    exit;
}else{
    if ($loggedType == 1){
        header("location: index.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/sendreport.css">
    <title>Datus Analyticus| Report</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="nav">
    <div class="container">
        <h2 style="margin: 6px 0 10px 0;float: left;">DatosAnalyticos</h2>
        <a href="functions/lslfunction.php?logout" type="submit" id="logout"><i class="fas fa-sign-out-alt" ></i>Logout</a>
    </div>
</nav>
<!--Content-->
<div class="container">
    <div class="row">
        <div class="colOne">
            <ul>
                <li><a href="index.php" class="link" ><i class="fas fa-home fa-lg" style="color: #a5a2a2;"></i> Home</a></li>
                <li><a href="updates.php" class="link"><i class="fas fa-edit fa-lg" style="color: #a5a2a2;"></i> Updates</a></li>
                <?php
                if ($loggedType > 0){
                    echo ' <li><a href="adminpost.php" class="link"><i class="fas fa-pen-alt fa-lg" style="color: #a5a2a2;"></i>  Post</a></li>';
                    echo ' <li><a href="sent_reports.php" class="link"><i class="fas fa-envelope-open" style="color: #a5a2a2;"></i> View reports</a></li>';
                } else{
                    echo '<li  class="active"><a href="report.php" class="link">&nbsp;<i class="fas fa-file fa-lg" ></i>&nbsp;&nbsp;Report</a></li>';
                }
                ?>
                <li><a href="#" class="link"><i class="fas fa-phone fa-lg" style="color: #a5a2a2;"></i>&nbsp;Contact us</a></li>
            </ul>
            <a href="sendreport.php" class="createReport">Create a report?</a>
        </div>
        <div>
            <div class="colTwo">
                <h3 style="margin-left: 8px;">Create report:</h3>
                <form  class="myForm" action="functions/postfunction.php" name="myForm" id="myForm" method="post">
                    <input type="text" name="title" class="title" placeholder=" Title here:" required="required">
                    <div class="froala">
                        <textarea name="text" required="required"></textarea>
                        <select name="type" id="report">
                            <option value="1">Private</option>
                            <option value="0">Public</option>
                        </select>
                        <input type="submit" id="submit"  name="adminpost" value="Submit" />
                        <p style="font-size: 12px; color: #adadad;">{ Note: If you choose public your report will be posted in post page. If you report on private your report will derictly send to admin }</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>
<!-- Initialize the editor. -->
<script> $(function() { $('textarea').froalaEditor() }); </script></body>
<script src="js/smooth-scroll.js"></script>
</body>
</html>