<?php 
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Table</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Custom CSS -->
  <style>
    h2{
    color:white;
    }
        body {
        background-color: #2d3e4e;
        }
        .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .table td {
        vertical-align: middle !important;
        text-align: center;
        color: black;
        }
        .table th{
        vertical-align: middle !important;
        text-align: center;
        color:#fff;
        }
        .table thead th {
        background-color: #A569BD;
        }
        .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
        }
        .table tbody tr:nth-child(odd) {
        background-color: #e9ecef;
        }
        .table tbody tr:hover {
        background-color: #ced4da;
        }
        .table tbody tr.fade-in {
        animation: fadeIn 0.5s ease;
        }
       .material-symbols-outlined {
        color:red;
        font-variation-settings:
        'FILL' 1,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
      }
      #edit {
        color:#0026ee;
      font-variation-settings:
      'FILL' 1,
      'wght' 400,
      'GRAD' 0,
      'opsz' 24
    }

    .edit-btn{
      border: none;
      background-color: transparent;
    }
    .edit-btn:hover{
      background-color: #ced4da;
    }
    .delete-btn{
      border: none;
      background-color: transparent;
    }
    
        @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
        }
  </style>
</head>
<body>
<form action="" method="POST">
    <?php include"vender_navbar.php" ; ?>
<div class="container">
  <h2 class="text-center mb-4">Product Table</h2>
  <table class="table table-bordered"   id="tbl_data">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Details</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
       </tr>
    </thead>
   
    
	   <tr class="fade-in" >
        <td>1</td>
        <td>Product A</td>
        <//td><//img src="product_a_image.jpg" alt="Product A Image" style="max-width: 100px;"><//td>
        <td>Product A Details Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
        <td>Category A</td>
        <td>10</td>
        <td>$100</td>
      </tr>
      <!-- Add more rows as needed -->

  </table>
  <div id="formContainer"></div>
</div>
</form>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
     $(document).ready(function(){
        function load(){
            $.ajax({
                url: "ajaxload.php",
                type: "POST",
                success: function(data){
                    $("#tbl_data").html(data); // Replace the tbody content with the fetched data
                }

        });
    };
    load();

    $(document).on("click",".delete-btn", function(){
            var id = $(this).data("id");
            var confirmation = confirm("Are you sure you want to delete this record?");
            if (confirmation) {
            $.ajax({
                url:"ajaxdelete.php",
                type:"POST",
                data:{ids:id},
                success : function(data){
                  console.log(response);
                    if(data ==1){ 
                            load();
                        }else{
                            alert("Cant Delete Record");
                        }
                    }
                    });
                }
                else {
                        console.log("Deletion cancelled.");
                }
            }); 

            $(document).on("click",".edit-btn", function(){
            var pid = $(this).data("id");
         
            $.ajax({
                url:"editproduct.php",
                type:"POST",
                data:{pids:pid},
                success : function(data){
                  console.log(data);  
                }
                    });
                
               
            }); 
 
            
     });
</script>
</body>
</html>
