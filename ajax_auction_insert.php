<?php
include("connect.php");
session_start();
$id = $_POST["aids"];
$vid = $_SESSION['vender_id'];
$sel = "SELECT * FROM tbl_product WHERE product_id='$id'";
$result = mysqli_query($connect, $sel);
$cunt = mysqli_fetch_assoc($result);

$sno = $cunt['s_no'];
$p_name = $cunt['p_name'];
$p_image = $cunt['p_image'];
$category = $cunt['category'];
$details = $cunt['p_detail'];
$p_price = $cunt['p_price'];
$a_price = $_POST['stprice'];
$bid_price = $_POST['stprice'];
$time = $_POST['atime'];
$f_time = $_POST['atime'];
$date = $_POST['adate'];
$uname="No One Does Bid Yet";

$insert = "INSERT INTO `tbl_auction`(`product_id`, `v_id`, `s_no`, `p_name`, `p_image`, `category`, `p_details`, `p_price`,`a_price`,`date`,`time`,`f_time`,`c_time`,`user_id`,`bid_price`,`user_name`) VALUES ('$id','$vid','$sno','$p_name','$p_image','$category','$details','$p_price','$a_price','$date','$time','$time',NOW(),0,'$bid_price','$uname')";

if (mysqli_query($connect, $insert)) {

    echo 1;
} else {
    echo 0;
}
