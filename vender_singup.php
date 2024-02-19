<?php
 session_start();
 include("connect.php");
    if(isset($_POST['btnsubmit'])){
        $vname=($_POST['vdname']);
        $vemail=($_POST['vdemail']);
        $vaddress=($_POST['vaddress']);
        $vphne=($_POST['vdphone']);
        $vusername=($_POST['vusername']);
        $vpassword=($_POST['vpassword']);

        $_SESSION['vdname'] = $vname;
        $_SESSION['vemail'] = $vemail;
        $_SESSION['vaddress'] = $vaddress;
        $_SESSION['vphne'] = $vphne;
        $_SESSION['vusername'] = $vusername;
        $_SESSION['vpassword'] = $vpassword;

        header("location:vender_singup2.php");
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
                <input type="text" name="vdname" placeholder="Vendor's Name" required>
                <input type="email" name="vdemail" placeholder="Vendor's Email" >
                <input type="text"  name="vaddress"placeholder="Vendor Address"/>
                <input type="text" name="vdphone" placeholder="Vendor's Phone no."> 
                <input type="text" placeholder="User Name" name="vusername"/>
                <input type="password" placeholder="Password" name="vpassword"/>
                <input type="password" placeholder="Conform Password"/>
                <p><b>Already Have An Account?<a href="login.php">LOGIN</a></b></p>
                 <input type="Submit" value="Next" id="button" name="btnsubmit"/>
   
  </div>
</div>
</form>
</body>
</html>