<?php
include("connect.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
?>
<?php
   
   if(isset($_POST['btnlogout'])){
       unset($_SESSION['username']);
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
<input type="submit" name="btnlogout" value="Logout">
</form>
</body>
</html>