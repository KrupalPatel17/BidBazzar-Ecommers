<?php
session_start();
include("connect.php");

if (isset($_POST['btnsave'])) {
    $pid = $_GET['pid'];
    $sno = $_POST['sno'];
    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $pdetails = $_POST['pdetails'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Check if a new image is uploaded
    if ($_FILES["uploadfile"]["error"] == 0) {
        $filename = $_FILES["uploadfile"]["name"];
        $tmpname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "img/" . $filename;
        move_uploaded_file($tmpname, $folder);

        $update = "UPDATE tbl_product SET `s_no`='$sno', p_name='$pname', p_image='$folder', category='$category', p_detail='$pdetails', p_quantity='$quantity', p_price='$price' WHERE product_id=$pid";
    } else {
        // If no new image uploaded, keep the existing image
        $update = "UPDATE tbl_product SET `s_no`='$sno', p_name='$pname', category='$category', p_detail='$pdetails', p_quantity='$quantity', p_price='$price' WHERE product_id=$pid";
    }

    if (mysqli_query($connect, $update)) {
        echo '<script>alert("Your Account Has Been Update Successfully")</script>';
        header("location: vender_product.php");
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

if (isset($_GET['pid'])) {
    $sel = "select * from tbl_product where product_id=$_GET[pid]";
    $res = mysqli_query($connect, $sel);
    $data = mysqli_fetch_row($res);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Bazzar</title>
     <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>


</head>

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #2C3E50;
      color: #2C3E50;
    }
    .container {
      margin-top: 50px;
      color: white;
    }
    .profile-form {
      background-color: #800080;
      padding: 30px;
      border-radius: 10px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    .btn {
      width: 100%;
    }
  </style>
</head>
<body>

<?php include 'vender_navbar.php'; ?>
    <form   action="" method="POST"  enctype="multipart/form-data">
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="profile-form">
          <h2>Product Edit</h2>
          <input type="hidden" name="confirm_delete" value="yes">
            <div class="form-group">
              <label for="email">Serial Number</label>
              <input type="text" class="form-control" id="email" placeholder="Enter email" name="sno" value="<?php echo $data[0]; ?>">
            </div>
            <div class="form-group">
              <label for="phone">Product Name</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="pname" value="<?php echo $data[2]; ?>">
            </div>
            <div class="form-group">
            <label for="productImage">Product Image</label>
            <div class="custom-file">
             <input type="file" class="custom-file-input" id="productImage"  name="uploadfile" >
            <label class="custom-file-label" for="productImage"><?php echo $data[3]; ?></label>
            </div>
            <div class="form-group">
              <label for="address">Category</label>
              <input type="text" class="form-control" id="address" rows="3" placeholder="Enter address" name="category" value="<?php echo $data[4]; ?>">
            </div>
            <div class="form-group">
              <label for="username">Product Details</label>
              <textarea class="form-control" id="address" rows="3" placeholder="Enter address" name="pdetails"><?php echo $data[5]; ?></textarea>
            </div>
            <div class="form-group">
              <label for="address">Quentity</label>
              <input type="number" class="form-control" id="address" rows="3" placeholder="Enter address" name="quantity" value="<?php echo $data[6]; ?>">
            </div>
            <div class="form-group">
              <label for="address">Price</label>
              <input type="number" class="form-control" id="address" rows="3" placeholder="Enter address" name="price" value="<?php echo $data[7]; ?>">
            </div>
            <input type="submit" class="btn btn-primary"  value="Save Changes" name="btnsave">
             
        
        </div>
      </div>
    </div>
  </div>



</form>
</body>
</html>
