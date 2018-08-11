<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DatosAnalyticos</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
<div class="card">
    <h2 style="text-align: center">DatosAnalyticos</h2>
    <form action="functions/lslfunction.php" method="post">
        <input type="text" name="firstname" placeholder="Fist name" class="signup"><br>
        <input type="text" name="lastname" placeholder="Last name" class="signup"><br>
        <input type="email" name="email" placeholder="Email" class="signup"><br>
        <input type="text" name="username" placeholder="Username" class="signup"><br>
        <input type="password" name="password" placeholder="Password" class="signup"><br>
        <button type="submit" name="signup" class="btnSignup">Submit</button>
        <small>Already have account? <a href="login.php" style="text-decoration: none;">Login here!</a></small>
    </form>
</div>
</body>
</html>