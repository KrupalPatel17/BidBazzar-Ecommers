<?php

session_start();
include("connect.php");

if (!isset($_SESSION['vusername'])) {
  header("location:login.php");
}

include("connect.php");
if (isset($_POST['btnadd'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tmpname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "img/" . $filename;
  move_uploaded_file($tmpname, $folder);


  $sno = $_POST['txtpsno'];
  $p_name = $_POST['txtpname'];
  $category = $_POST['txtpcat'];
  $p_detail = $_POST['txtpdetail'];
  $p_quantity = $_POST['txtpqty'];
  $p_price = $_POST['txtpprice'];
  $veid = $_SESSION['vender_id'];
  $insert = "insert into tbl_product values('$sno',0,'$p_name','$folder','$category','$p_detail','$p_quantity','$p_price','$veid')";
  if (mysqli_query($connect, $insert)) {
    echo '<script>alert("Product Inserted Successfully")</script>';
  } else {
    echo '<script>alert("You Must Enter Unique Serial Number Or Check Product Details Dont Use Special Chareaters Only Use , ")</script>';
  
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <title>Bid Bazzar</title>

  <style>
    body {
      background-color: #2C3E50;
      padding-top: 5%;
    }

    .form-container {
      margin-top: 50px;
      background-color: #d0d0d0;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      transition: all 0.3s ease;
      
    }

    .form-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 20px #800080;
    }

    .custom-file-label {
      overflow: hidden;
    }

    .btn-insert {
      background-color: #A569BD;
      color: #fff;
      border: none;
    }

    .btn-insert:hover {
      background-color: #9739bd;
    }
  </style>

</head>

<body>

  <form action="" method="POST" id="productForm" enctype="multipart/form-data">
    <?php include("vender_navbar.php"); ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="form-container">
            <h2 class="text-center mb-4">Insert Product</h2>

            <div class="form-group">
              <label for="productName">Serial No</label>
              <input type="text" class="form-control" id="productName" name="txtpsno" required>
            </div>
            <div class="form-group">
              <label for="productName">Product Name</label>
              <input type="text" class="form-control" id="productName" name="txtpname" required>
            </div>
            <div class="form-group">
              <label for="productImage">Product Image</label>
              <div class="custom-file">
                <!-- <input type="file" class="custom-file-input" id="productImage" >
            <label class="custom-file-label" for="productImage">Choose file</label>-->
                <input type="file" name="uploadfile" required>
              </div>
            </div>
            <div class="form-group">
              <label for="productDetails">Product Details</label>
              <textarea class="form-control" id="productDetails" rows="3" name="txtpdetail" required></textarea>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" id="category" name="txtpcat" required>
                <option value="">Select Category</option>
                <option value="electronics">Electronics</option>
                <option value="gameing">Gameing</option>
                <option value="phone">Phone</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home</option>
                <!-- Add more categories here -->
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="txtpqty" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" name="txtpprice" required>
            </div>
            <input type="submit" class="btn btn-insert btn-block" name="btnadd" value="Insert">

  </form>
  </div>
  </div>
  </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JS for Animation -->
  <script>
    $(document).ready(function() {
      $(".form-container").hover(function() {
        $(this).css("transform", "translateY(-5px)");
        $(this).css("box-shadow", "0 0 20px rgba(0, 0, 0, 0.2)");
      }, function() {
        $(this).css("transform", "translateY(0)");
        $(this).css("box-shadow", "0 0 10px rgba(0, 0, 0, 0.1)");
      });
    });
  </script>

</body>

</html>