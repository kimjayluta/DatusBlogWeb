<?php
session_start();
include "functions/database.php";
@$loggedId = $_SESSION['id'];
@$loggedType = $_SESSION['type'];
if (!isset($_SESSION['user']) && isset($_SESSION['id']) && isset($_SESSION['type'])){
    header("location: login.php");
    exit;
}else{
    if ($loggedType < 1){
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
    <style>
        *{
            font-family: Arial, sans-serif;
        }
        body{
            margin: 0;
            background-color: whitesmoke;
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
            height: 410px;
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
        .title{
            width: 789px;
            margin-bottom: 11px;
            height: 33px;
            border: 1px solid #d4d4d4;
        }
        .myForm{
            margin-left: 9px;
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
        #submit{
            height: 38px;
            width: 120px;
            background-color:#ffffff00;
            color: black;
            border-radius: 6px;
            border: 1px solid #222222;
            margin-left: 42rem;
            margin-top: 14px;
        }
        #submit:hover{
            background-color: #000000;
            color: white;
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
    <title>Datus Analyticus| Blog</title>
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
        <a href="functions/lslfunction.php?logout" type="submit" id="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
                   echo ' <li  class="active"><a href="adminpost.php" class="link"><i class="fas fa-pen-alt fa-lg" ></i> Post</a></li>';
                   echo ' <li><a href="adminpost.php" class="link"><i class="fas fa-edit fa-lg" style="color: #a5a2a2;"></i> View reports</a></li>';
               } else{
                   echo '<li><a href="sendreport.php" class="link">&nbsp;<i class="fas fa-file fa-lg" style="color: #a5a2a2;"></i>&nbsp;&nbsp;Report</a></li>';
               }
               ?>
               <li><a href="#" class="link"><i class="fas fa-phone fa-lg" style="color: #a5a2a2;"></i>&nbsp;Contact us</a></li>
           </ul>
        </div>
        <div>
            <div class="colTwo">
                <h3 style="margin-left: 8px;">Create a new post:</h3>
                <form  class="myForm" action="functions/postfunction.php" name="myForm" id="myForm" method="post">
                    <input type="text" name="title" class="title" placeholder=" Title here:" required="required">
                    <!--Transferring the input data from iframe to textarea-->
                    <div class="froala">
                    <textarea name="text" required="required"></textarea>
                    <select name="type" id="report" style="display: none;quotes: ;">
                        <option value="0">Public</option>
                    </select>
                    <input type="submit" id="submit"  name="adminpost" value="Submit" />
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