<?php
include("connect.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

    <?php
        if(isset($_POST['btnlogout'])){
            unset($_SESSION['username']);
            header("location:login.php");
        }
    ?>

<body>
    <form action="" method="POST">
    home page
    <input type="submit" name="btnlogout" value="Logout">
</form>
</body>
</html>