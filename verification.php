<?php
session_start();
if (isset($_SESSION['username'])) {
  header("location:home.php");
}

  if(isset($_POST['btnsubmit'])){
    $cotp=$_POST['otp'];
    
    if(isset($_SESSION['otp'])){
      $otp=$_SESSION['otp'];
      if($otp==$cotp){
        
        header("location:index.php");
    } else{
      echo '<script>alert("Your OTP Was Wrong Plase Try Againg")</script>';
    }
  }
   
  if(isset($_SESSION['votp'])){
    $votp=$_SESSION['votp'];
    if($votp==$cotp){
      
      header("location:index.php");
  } else{
    echo '<script>alert("Your OTP Was Wrong Plase Try Againg")</script>';
  }
}
 }


?>
<!-- <?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// $otp= rand(111111,999999);
// require 'Mailer/vendor/autoload.php';

// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->isSMTP();
//     $mail->Host       = 'smtp.gmail.com';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'patelkrupal679@gmail.com'; // Your Gmail email address
//     $mail->Password   = 'gvoi wbtn whnu joic';        // Your Gmail password
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;
   

//     //Recipients
//     $mail->setFrom('patelkrupal679@gmail.com', 'Punisher');
//     $mail->addAddress('krupal561@gmail.com', 'Krupal');

//     //Content
//     $mail->isHTML(true);
//     $mail->Subject = 'Subject';
//     $mail->Body    = "<p> hello $otp </p>";

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singup.css">
    <title>Document</title>
</head>
<body>
<form action="" method ="POST"> 
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  
  <div class="center">
   
  <h2><b>Bid Bazzar</b></h2>
  <h1>Verify email address</h1>
    <h5>To verify your email, we've sent a One Time<br>
    Password (OTP) to <u><?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}else{ echo $_SESSION['vemail'];}  ?> </u></h5>
    <input type="text" placeholder="OTP" name="otp"/>
   
    <input type="Submit" value="Submit" id="button" name="btnsubmit"/>
  
   
  </div>
</div>
</form>
</body>
</html>