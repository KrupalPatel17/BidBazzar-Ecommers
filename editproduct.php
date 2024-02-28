<?php
session_start();
include("connect.php");

$ide=$_POST["pids"];

$sel="select * from tbl_product where product_id='$ide'";
$result=mysqli_query($connect,$sel);
$check = mysqli_fetch_assoc($result);
$userid=$check['vid'];
$_SESSION['pid']=$userid;
echo $_SESSION['pid'];
echo $check;
// if(mysqli_query($connect,$sel)){
//     $result = mysqli_fetch_assoc($check);
//      echo 1;
//  }
//  else{
//      echo 0;
//  }

?>