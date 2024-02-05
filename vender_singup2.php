<?php
    session_start();
    include("connect.php");
    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

    if(isset($_POST['btnsubmit'])){

      $vename=$_SESSION['vdname'];
      $vemail=$_SESSION['vemail'];
      $vaddress=$_SESSION['vaddress'];
      $vphne=$_SESSION['vphne'];
      $vuname=$_SESSION['vusername'];
      $vpassword=$_SESSION['vpassword'];

      $encpassword = md5( $vpassword);

      $vdshopnm=($_POST['vdshopnm']);
      $vdshopno=($_POST['vdshopno']);
      $vdshopadd=($_POST['vdshopadd']);
      $vdshoppincode=($_POST['vdshoppincode']);
      $vdshopgst=($_POST['vdshopgst']);
      $vdbank=($_POST['vdbank']);
      $vdshopacc=($_POST['vdshopacc']);

      $insert = "insert into tbl_vender values(0,'$vename','$vemail','$vaddress',$vphne,'$vuname','$encpassword','$vdshopnm',$vdshopno,'$vdshopadd',$vdshoppincode,$vdshopgst,'$vdbank',$vdshopacc)";
      if (mysqli_query($connect, $insert)){
         

        
          $_SESSION['votp']=$votp;
          $_SESSION['vemail']=$vemail;
          header("location:verification.php");
      }
      else {
           echo "Fail" or die(mysqli_error($connect));
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
                <input type="text" name="vdshopnm" placeholder="Shop Name">
                <input type="text" name="vdshopno" placeholder="Shop's Number">
                <input type="text" name="vdshopadd" placeholder="Shop Address(Area/City/State)" />
                <input type="text" name="vdshoppincode" placeholder="Pincode">
                <input type="text" name="vdshopgst" placeholder="GST No.">
                <input type="text" name="vdbank" placeholder="Bank Name">
                <input type="number" name="vdshopacc" placeholder="Account No.">
                <input type="Submit" value="SingUp" id="button" name="btnsubmit"/>
   
  </div>
</div>
</form>
</body>
</html>