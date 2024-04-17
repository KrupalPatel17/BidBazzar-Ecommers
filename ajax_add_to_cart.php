<?php
include("connect.php");
session_start();
$id = $_POST["ids"];

$sel = "SELECT * FROM tbl_product WHERE product_id='$id'";
$result = mysqli_query($connect, $sel);
$cunt = mysqli_fetch_assoc($result);

$sno = $cunt['s_no'];
$p_name = $cunt['p_name'];
$p_image = $cunt['p_image'];
$category = $cunt['category'];
$details = $cunt['p_detail'];
$p_price = $cunt['p_price'];
$uid = $_SESSION['users_id'];

$insert = "insert into tbl_addtocart values($id,$uid,$sno,'$p_name','$p_image','$category','$details',$p_price)";
if (mysqli_query($connect, $insert)) {
  $_SESSION['product_ids'] = $id;
  echo 1;
} else {
  echo 0;
}

//     $filename= $_FILES["uploadfile"]["name"];
//      $tmpname= $_FILES["uploadfile"]["tmp_name"];
//      $folder ="img/".$filename;
//      move_uploaded_file($tmpname,$folder);


//       $sno= $_POST['txtpsno'];
//       $p_name = $_POST['txtpname'];
//       $category = $_POST['txtpcat'];
//       $p_detail = $_POST['txtpdetail'];
//       $p_quantity = $_POST['txtpqty'];
//       $p_price = $_POST['txtpprice'];
//       $veid=$_SESSION['vender_id'];
//       $insert = "insert into tbl_product values('$sno',0,'$p_name','$folder','$category','$p_detail','$p_quantity','$p_price','$veid')";
//       if (mysqli_query($connect, $insert)) {
//           echo '<script>alert("Product Inserted Successfully")</script>';
//       } else {
//         echo '<script>alert("You Must Enter Unique Serial Number")</script>';
//   }

// if(mysqli_query($connect,$del)){

//     echo 1;
// }
// else{
//     echo 0;
// }
