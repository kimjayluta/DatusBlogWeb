<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DatosAnalyticos</title>
    <style>
        body{
            margin: 0;
            background-color: whitesmoke;
        }
        *{
            font-family: Arial,sans-serif;
        }
        .card{
            margin: 120px auto auto;
            padding: 20px 36px 36px;
            background-color: white;
            width: 290px;
            height: 284px;
            border-radius: 15px;
        }
        .login{
            margin-bottom: 35px;
            width: 291px;
            height: 33px;
            border: 1px solid white;
            border-bottom-color: black;
        }
        .btnLogin{
            border: 1px solid white;
            width: 291px;
            height: 35px;
            border-radius: 13px;
            margin-top: 13px;
            margin-bottom: 15px;
        }
        .btnLogin:hover{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
<div class="card">
    <h2 style="text-align: center">DatosAnalyticos</h2>
   <form action="functions/lslfunction.php" method="post">
           <input type="text" name="username" placeholder="Username" class="login"><br>
       <input type="text" name="password" placeholder="Password" class="login"><br>
       <button type="submit" name="login" class="btnLogin">Login</button>
       <small>You dont have account? <a href="signup.php" style="text-decoration: none;">Register now!</a></small>
   </form>
</div>
</body>
</html>