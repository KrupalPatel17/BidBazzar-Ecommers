<?php

session_start();
  include("connect.php");
  
  //if (!isset($_SESSION['vusername'])) {
    //header("location:login.php");
//}

include("connect.php");
if (isset($_POST['btnadd'])) {
   // $sno= $_POST['txtpsno'];

   $filename= $_FILES["uploadfile"]["name"];
   $tmpname= $_FILES["uploadfile"]["tmp_name"];
   $folder ="img/".$filename;
   move_uploaded_file($tmpname,$folder);
   

    $product_id = $_POST['txtpid'];
    $p_name = $_POST['txtpname'];
    $category = $_POST['txtpcat'];
    $p_detail = $_POST['txtpdetail'];
    $p_quantity = $_POST['txtpqty'];
    $p_price = $_POST['txtpprice'];
    $insert = "insert into tbl_product values(0,'$product_id','$p_name','$folder','$category','$p_detail','$p_quantity','$p_price')";
    if (mysqli_query($connect, $insert)) {
        echo '<script>alert("Product Inserted Successfully")</script>';
    } else {
        echo "Error :" . mysqli_error($connect);
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
    <title>Document</title>

    <style>
    
            body {
            background-color: #2C3E50;
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
<?php  
include("vender_navbar[1].php"); 
?>
<form action="" method="POST" id="productForm" enctype="multipart/form-data">
       
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="form-container">
        <h2 class="text-center mb-4">Insert Product</h2>
            <div class="form-group">
            <label for="productName">Product ID</label>
            <input type="text" class="form-control" id="productName" name="txtpid"required>
          </div>
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="txtpname" required>
          </div>
          <div class="form-group">
            <label for="productImage">Product Image</label>
            <div class="custom-file">
              <!--<input type="file" class="custom-file-input" id="productImage" name="uploadfile" required>
              <label class="custom-file-label" for="productImage"></label>-->
              <input type="file" name="uploadfile">
            </div>
          </div>
          <div class="form-group">
            <label for="productDetails">Product Details</label>
            <textarea class="form-control" id="productDetails" rows="3" name="txtpdetail" required></textarea>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category"  name="txtpcat" required>
              <option value="">Select Category</option>
              <option value="electronics">Electronics</option>
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