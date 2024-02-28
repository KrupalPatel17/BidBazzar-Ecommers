<?php
include("connect.php");
if (isset($_POST['btnadd'])) {
    $sno= $_POST['txtpsno'];
    $product_id = $_POST['txtpid'];
    $p_name = $_POST['txtpname'];
    $category = $_POST['txtpcat'];
    $p_detail = $_POST['txtpdetail'];
    $p_quantity = $_POST['txtpqty'];
    $p_price = $_POST['txtpprice'];
    $insert = "insert into tbl_product values(0,'$product_id','$p_name','$category','$p_detail','$p_quantity','$p_price')";
    if (mysqli_query($connect, $insert)) {
        echo "Success : Product Added Successfully";
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
    <title>Vendor Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <style>
        .navbar{
                background-color: rgb(77, 27, 27);
                border-radius: 30px;
        
            }
            .navbar ul{
                overflow: auto;
            }
            .navbar li{
               float: left;
               list-style: none;
               margin: 13px 20px;
               
            }
            .navbar li a{
                padding: 3px 3px; 
                text-decoration: none;
                color: whitesmoke;
            }
            .navbar li a:hover{
                
                color: aqua;
            }
            .search{
                float: right;
                color: white;
                padding: 12px 75px;
            }
            .navbar input{
                border: 2px solid black;
                border-radius: 14px;
                padding: 3px 17px;
                width: 129px;
            }
    </style>
    
</head>
<body>
   <header>
        <nav class="navbar">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="products_list.php">Products</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Search this website">
                </div>
            </ul>
            
        </nav>
   </header>
   <center>
   <form method="post">
   <table>              
            <tr>
                <th> SNo.</th>
                <td><input type="int" name="txtpsno"></td>
            </tr>
            <tr>
                <th> Product ID</th>
                <td><input type="int" name="txtpid"></td>
            </tr>
            <tr>
                <th> Product Name </th>
                <td><input type="text" name="txtpname"></td>
            </tr>
            <tr>
                <th> Product Category</th>
                <td><input type="text" name="txtpcat"></td>
            </tr>
            <tr>
                <th> Product Details </th>
                <td><input type="textarea" name="txtpdetail"></td>
            </tr>
            <tr>
                <th> Product Quantity</th>
                <td><input type="int" name="txtpqty"></td>
            </tr>
            <tr>
                <th> Product Price</th>
                <td><input type="int" name="txtpprice"></td>
            </tr>
            <th>
                <input type="submit" value="ADD" name="btnadd" >
            </th>
                
            
        
        
   </table>
</form>
</center>
</body>
</html>