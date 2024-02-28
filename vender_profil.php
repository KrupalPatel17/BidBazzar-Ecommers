<?php

session_start();
  include("connect.php");
  
  if (!isset($_SESSION['vusername'])) {
   header("location:login.php");
}

if(isset($_POST['btnlogout'])){
    unset($_SESSION['vusername']);
    unset($_SESSION['vender_id']);
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <?php  include("vender_navbar.php"); ?>
    <input type="submit" name="btnlogout" value="Logout">
    </form>
</body>
</html>