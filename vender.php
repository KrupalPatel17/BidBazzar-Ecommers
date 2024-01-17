<?php
include("connect.php");
  if(isset($_POST['vdsubmit']))
  {
  $vname=($_POST['vdname']);
  $vphne=($_POST['vdphone']);
  $vemail=($_POST['vdemail']);
  $vshopnm=($_POST['vdshopnm']);
  $vshopno=($_POST['vdshopno']);
  $vshoparea=($_POST['vdshoparea']);
  $vshopcity=($_POST['vdshopcity']);
  $vshopstate=($_POST['vdshopstate']);
  $vshoppin=($_POST['vdshoppincode']);
  $vshopgst=($_POST['vdshopgst']);
  $vshopacc=($_POST['vdshopacc']);
 $select="select id from vendor where vendor_email='$vemail'";
 $select2="select id from vendor where gst='$vshopgst'";
 $result = mysqli_query($connect, $select);
 $count = mysqli_num_rows($result);
 $result2=mysqli_query($connect, $select2);
 $count2 = mysqli_num_rows($result2);
     if ($count > 0) {
         echo "Error: Email-id is already registered";
    }
    elseif($count2 > 0){
        echo "GST Number is already registered";
    }
    else{
        $vinsert="insert into vendor values(0,'$vname',$vphne,'$vemail','$vshopnm',$vshopno,'$vshoparea','$vshopcity','$vshopstate',$vshoppin,'$vshopgst','$vshopacc')";
        if(mysqli_query($connect,$vinsert))
             {
                 header("location:product.php");
             }
        else{
         echo "error in insertion";
         }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendor's details</title>
    <link rel="stylesheet" href="style_vendor.css">
    </head>
<body>
    <center>
        <div class="container">
        <form method="post">
                <br><br>
                <h2><u>Vendor's Details</u></h2>
                <input type="text" name="vdname" placeholder="vendor's Name" required>
                <input type="text" name="vdphone" placeholder="vendor's Phone no."><br><br>
                <input type="email" name="vdemail" placeholder="vendor's Email">
                <input type="text" name="vdshopnm" placeholder="Shop name"><br><br>
                <input type="text" name="vdshopno" placeholder="shop's number">
                <input type="text" name="vdshoparea" placeholder="area"><br><br>
                <input type="text" name="vdshopcity" placeholder="city">
                <input type="text" name="vdshopstate" placeholder="state"><br><br>
                <input type="text" name="vdshoppincode" placeholder="Pincode">
                <input type="text" name="vdshopgst" placeholder="GST No."><br><br>
                <input type="text" name="vdshopacc" placeholder="Account No."><br><br>
                <input type="submit" value="Submit" name="vdsubmit">
                </form> 
        </div>
    </center>
</body>
</html>