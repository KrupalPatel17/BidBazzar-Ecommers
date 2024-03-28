<?php

include("connect.php");
session_start();
$id = $_POST["ids"];
$user_id = $_SESSION['users_id'];
$user_name = $_SESSION['username'];
$bp = $_POST["bp"];

$sel = "SELECT * FROM tbl_auction WHERE a_id='$id'";
$result = mysqli_query($connect, $sel);
$check = mysqli_fetch_assoc($result);

$p_id = $check['product_id']; 
$p_name  = $check['p_name'];
$p_price = $check['p_price'];
$a_price = $check['bid_price'];

$update = "update tbl_auction set user_id='$user_id',a_price=$bp,user_name='$user_name' where a_id=$id";
$insert="INSERT INTO `tbl_user_auction`(`user_id`, `a_id`, `p_id`, `p_name`, `p_price`, `a_price`, `u_price`, `time`) VALUES ('$user_id','$id','$p_id','$p_name','$p_price','$a_price','$bp',NOW())";
// echo $sel;
// exit();
if (mysqli_query($connect, $update)) {
    mysqli_query($connect, $insert);
    echo 1;
    
} else {
    echo 0;
}



?>