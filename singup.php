<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
include("connect.php");


if (isset($_SESSION['username'])) {
    header("location:home.php");
    }    
     if (isset($_POST['btnsubmit'])) {
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encpassword = md5( $password);
        $select = "select user_id from tbl_user where username='$username'";
        $result = mysqli_query($connect, $select);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo '<script>alert("Error: User Name Is Already Registered Please Take Another")</script>';
        } else {
            $insert = "insert into tbl_user values(0,'$email','$address',$phone,'$username','$encpassword')";
            if (mysqli_query($connect, $insert)){
                


                $_SESSION['otp']=$otp;
                $_SESSION['email']=$email;
                header("location:index.php");
            }
            else {
                 echo "Fail" or die(mysqli_error($connect));
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singup.css">
</head>

<body>

<form action="" method ="POST"> 
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  
  <div class="center">
   
  <h2><b>Bid Bazzar</b></h2>
    <input type="email" placeholder="Email" name="email"/>
    <input type="text" placeholder="Address" name="address"/>
    <input type="numbers" placeholder="Phone Number" name="phone"/>
    <input type="text" placeholder="User Name" name="username"/>
    <input type="password" placeholder="Password" name="password"/>
    <input type="password" placeholder="Conform Password"/>
    <p><b>Already Have An Account?<a href="index.php">LOGIN</a></b></p>
    <input type="Submit" value="SingUp" id="button" name="btnsubmit"/>
   
  </div>
</div>
</form>
</body>
</html>
