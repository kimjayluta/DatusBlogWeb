<?php
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['type'])&& isset($_SESSION['id'])){
        header("location: index.php");
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
    <title>DatosAnalyticos</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="card">
    <h2 style="text-align: center">DatosAnalyticos</h2>
   <form action="functions/lslfunction.php" method="post">
       <input type="text" name="username" placeholder="Username" class="login"><br>
       <input type="password" name="password" placeholder="Password" class="login"><br>
       <button type="submit" name="login" class="btnLogin">Login</button>
       <small>You dont have account? <a href="signup.php" style="text-decoration: none;">Register now!</a></small>
   </form>
</div>
</body>
</html>