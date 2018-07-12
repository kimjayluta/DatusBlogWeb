<?php
include "database.php";
if (isset($_POST['login'])){
    $usn = $_POST['username'];
    $pswd = $_POST['password'];
    if (isset($usn,$pswd)){

       if (DB::query("SELECT username FROM `users` WHERE username=:usn", array(':usn'=>$usn))){
           $result = DB::query("SELECT `password` FROM `users` WHERE username=:usn",array(':usn'=>$usn))[0];
           if (password_verify($pswd,$result['password'])){
               session_start();
               $_SESSION['loginses'] = $usn;
               $_SESSION['type'] = $result["type"];
               header("location: ../index.php");

           }else{
               header("location: ../login.php?error=usnorpwd");
               exit;
           }
       }else{
           header("location: ../login.php?error=usnorpwd1");
           exit;
       }
    }
}
//Signup
if (isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $usn = $_POST['username'];
    $pswd = $_POST['password'];
    $email = $_POST['email'];
    $error = "";

    if (isset($firstname,$lastname,$usn,$pswd,$email)){
        if (preg_match('/[a-zA-Z]+/',$firstname)){
            if (preg_match('/[a-zA-Z]+/',$lastname)){
                if (!DB::query("SELECT username FROM `users` WHERE username=:usn",array(':usn'=>$usn))){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if (strlen($pswd) >=3 && strlen($pswd) <=60){
                            if (!DB::query("SELECT email FROM `users` WHERE username=:usn",array(':usn'=>$usn))[0]['email']){
                                DB::query("INSERT INTO `users` VALUES ('',:usn,:pswd,:email,:fn,:ln,0)",array(':usn'=>$usn,':pswd'=>password_hash($pswd,PASSWORD_BCRYPT),':email'=>$email,':fn'=>$firstname,':ln'=>$lastname));
                                session_start();
                                $_SESSION['signup'] = $usn;
                                $error = "../index.php";
                            }else{
                                $error = "../signup.php?error=eme";
                            }
                        }else{
                            $error = "../signup.php?error=pw";
                        }
                    }else{
                        $error = "../signup.php?error=em";
                    }
                }else{
                    $error = "../signup.php?error=un";
                }
            }else{
                $error = "../signup.php?error=ln";
            }
        }else{
            $error = "../signup.php?error=fn";
        }
    }
    header("location: $error");
    exit;

}