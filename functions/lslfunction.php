<?php
include "database.php";
if (isset($_POST['login'])){
    session_start();
    @$usn = $_POST['username'];
    @$pswd = $_POST['password'];
    if (isset($usn,$pswd)){
        $query = mysqli_query($connect, "SELECT * FROM `users` WHERE username ='$usn' ");
        $fetch = mysqli_fetch_array($query);

        if (mysqli_num_rows($query) > 0){
            if (password_verify($pswd,$fetch['password'])){
                $userType = $fetch['type'];
                $_SESSION['user'] = $usn;
                $_SESSION['id'] = $fetch['id'];
                $_SESSION['type'] = $userType;
                header("location: ../index.php");
            } else{
                header('location: ../login.php?error=uspw');
                exit;
            }
        } else{
            header('location: ../login.php?error=uspw1');
            exit;
        }
    }
}elseif (isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $usn = $_POST['username'];
    $pswd = $_POST['password'];
    $email = $_POST['email'];
    $error = "";

    if (isset($firstname,$lastname,$usn,$pswd,$email)){
        if (preg_match('/[a-zA-Z]+/',$firstname)){
            if (preg_match('/[a-zA-Z]+/',$lastname)){
                $query = mysqli_query($connect,"SELECT * FROM `users` WHERE username = '$usn'");
                $fetch  = mysqli_fetch_array($query);
                if (!mysqli_num_rows($query) > 0){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if (strlen($pswd) >=3 && strlen($pswd) <=60){
                            if (!$email == $fetch['email']){
                                $newpass = password_hash($pswd,PASSWORD_BCRYPT);
                                $query = mysqli_query($connect,"INSERT INTO users(`username`,`password`,`email`,`firstname`,`lastname`,`type`) VALUES ('$usn','$newpass','$email','$firstname','$lastname',0)");
                                if ($query == true){
                                    session_start();

                                    $_SESSION['user'] = $usn;
                                    $_SESSION['type'] = 0;

                                    $error = "../index.php";
                                }else{
                                    echo "fck";
                                    exit;
                                }
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

} else{
    if(isset($_GET['logout'])){
        session_start();
        session_destroy();
        unset($_SESSION['id'],$_SESSION['type'],$_SESSION['user']);
        header('location: ../login.php');
        exit;
    }
}
