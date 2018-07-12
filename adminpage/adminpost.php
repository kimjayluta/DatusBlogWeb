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
            background-color: white;
            padding: 6px;
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
            border:2px solid #bfbfbf6b;
            margin-left: 10px
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
        .myBtn{
            width: 37px;
            border-radius: 4px;
            border: 1px solid #0000005e;
        }
        .title{
            width: 41rem;
            height: 24px;
            border-radius: 6px;
            border: 1px solid black;
        }
        .myForm{
            margin-left: 40px;
        }
        #submit{
            height: 38px;
            width: 112px;
            background-color: #0275d8;
            color: white;
            border-radius: 6px;
            border: 1px solid #6ca9de;
            margin-left: 37rem;
        }
        #submit:hover{
            background-color: blue;
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
</head>
<body  onload="iFrameOn();">
<nav class="nav">
    <div class="container">
        <h2>DatosAnalyticos</h2>
    </div>
</nav>
<!--Content-->
<div class="container">
    <div class="row">
        <div class="colOne">
           <ul>
               <li><a href="#" class="link">All post</a></li>
               <li><a href="#" class="link">Updates</a></li>
               <li><a href="#" class="link">Create new post</a></li>
               <li><a href="#" class="link">Reports</a></li>
               <li><a href="#" class="link">Contact us</a></li>
           </ul>
        </div>
        <div>
            <div class="colTwo">
                <h3 style="margin-left: 38px;">Create a new post:</h3>
                <form  class="myForm" action="../functions/postfunction.php" name="myForm" id="myForm" method="post">
                    <h4>Title:  <input type="text" name="title" class="title"></h4>
                    <!--Transferring the input data from iframe to textarea-->
                    <textarea name="myTextArea" id="myTextArea"   cols="100" rows="14" style="display: none;"></textarea>
                    <iframe name="richTextField" id="richTextField" style="border: 1px solid #000000; width: 700px; height: 300px;"></iframe>
                    <input type="submit" id="submit" onclick="submit_form();" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>