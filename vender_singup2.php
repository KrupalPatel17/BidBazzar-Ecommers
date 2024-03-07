<?php
session_start();
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['username'])) {
  header("location:vender_homepage.php");
}


if (isset($_POST['btnsubmit'])) {

  $vename = $_SESSION['vdname'];
  $vemail = $_SESSION['vemail'];
  $vaddress = $_SESSION['vaddress'];
  $vphne = $_SESSION['vphne'];
  $vuname = $_SESSION['vusername'];
  $vpassword = $_SESSION['vpassword'];

  $encpassword = md5($vpassword);

  $vdshopnm = ($_POST['vdshopnm']);
  $vdshopno = ($_POST['vdshopno']);
  $vdshopadd = ($_POST['vdshopadd']);
  $vdshoppincode = ($_POST['vdshoppincode']);
  $vdshopgst = ($_POST['vdshopgst']);
  $vdbank = ($_POST['vdbank']);
  $vdshopacc = ($_POST['vdshopacc']);
  $select = "select vid from tbl_vender where vuser_name='$vuname'";
  $uselect = "select user_id from tbl_user where username='$vuname'";
  $result = mysqli_query($connect, $select);
  $uresult = mysqli_query($connect, $uselect);
  $count = mysqli_num_rows($result);
  $ucount = mysqli_num_rows($uresult);
  if ($count > 0) {
    echo '<script>alert("Error: User Name Is Already Registered Please Take Another")</script>';
  } elseif ($ucount > 0) {
    echo '<script>alert("Error: User Name Is Already Registered Please Take Another")</script>';
  } else {
    $insert = "insert into tbl_vender values(0,'$vename','$vemail','$vaddress',$vphne,'$vuname','$encpassword','$vdshopnm',$vdshopno,'$vdshopadd',$vdshoppincode,$vdshopgst,'$vdbank',$vdshopacc)";
    if (mysqli_query($connect, $insert)) {

      $votp = rand(111111, 999999);

      $body = "<p> Dear $vuname,<br>

        Thank you for choosing bid Bazzere for your online shopping needs.<br>
        To ensure the security of your account, we have initiated the verification process for your email address.<br><br>

        Please find below your one-time password (OTP) for verification:<br><br>        

        <b>OTP: <u>$votp</u></b><br><br>

        Kindly use this OTP to verify your email address by entering it on the verification page.<br> 
        If you did not initiate this process or have any concerns regarding the security of your <br>
        account, please contact our customer support immediately.<br><br>

        We appreciate your cooperation in maintaining the security of your account. If you <br>
        have any further questions or require assistance, feel free to reach out to us.<br><br>

        Best regards,<br><br>

        Bid Bazzer Your Shopping Patner</p>";

      require 'Mailer/vendor/autoload.php';
      $mail = new PHPMailer(true);

      try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'patelkrupal679@gmail.com'; // Your Gmail email address
        $mail->Password   = 'gvoi wbtn whnu joic';        // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('patelkrupal679@gmail.com', 'Bid Bazzer');
        $mail->addAddress($vemail, $vuname);

        //Content
        $mail->isHTML(true);
        $mail->Subject = ' Your One-Time Password (OTP) for Verification';
        $mail->Body    = "<p> $body </p>";

        $mail->send();
        echo 'Message has been sent';
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }


      $_SESSION['votp'] = $votp;
      $_SESSION['vemail'] = $vemail;
      header("location:verification.php");
    } else {
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

  <form action="" method="POST">
    <div class="container" onclick="onclick">
      <div class="top"></div>
      <div class="bottom"></div>

      <div class="center">

        <h2><b>Bid Bazzar</b></h2>
        <input type="text" name="vdshopnm" placeholder="Shop Name">
        <input type="text" name="vdshopno" placeholder="Shop's Number">
        <input type="text" name="vdshopadd" placeholder="Shop Address(Area/City/State)" />
        <input type="text" name="vdshoppincode" placeholder="Pincode">
        <input type="text" name="vdshopgst" placeholder="GST No.">
        <input type="text" name="vdbank" placeholder="Bank Name">
        <input type="number" name="vdshopacc" placeholder="Account No.">
        <input type="Submit" value="SingUp" id="button" name="btnsubmit" />

      </div>
    </div>
  </form>
</body>

</html>