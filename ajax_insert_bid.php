<?php

include("connect.php");
session_start();
$id = $_POST["ids"];
$user_id = $_SESSION['users_id'];
$user_name = $_SESSION['username'];
$bp = $_POST["bp"];

$sel = "SELECT * FROM tbl_auction WHERE a_id='$id'";
$update = "update tbl_auction set user_id='$user_id',a_price=$bp,user_name='$user_name' where a_id=$id";
// echo $update;
// exit();
if (mysqli_query($connect, $update)) {
    echo 1;
} else {
    echo 0;
}
