<?php
session_start();
    include("connect.php");
    $id=$_SESSION['vender_id'];
    $sql="SELECT * FROM tbl_product where vid='$id'";
    $result=mysqli_query($connect,$sql) or die("SQL FAIELD");
   
    $output="";
    $button="";
    $i=0;
    if(mysqli_num_rows($result) > 0){
        $output ='<table   margin-top: 20px border-radius: 10px overflow: hidden box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1)>
        <thead>
        <tr>
            <th>#</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Details</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
           
        </tr>
        </thead>';

        while($row=mysqli_fetch_assoc($result)){
            $i++;
            $output .="<tr><td>$i</td><td>{$row["product_id"]}</td><td>{$row["p_name"]}</td><td>{$row["p_detail"]}</td><td>{$row["category"]}</td><td>{$row["p_quantity"]}</td><td>{$row["p_price"]}</td><td><button class='edit-btn' ><span class='material-symbols-outlined' id='edit' ><a href='editproduct.php' data-id='{$row["product_id"]}'>edit</a></span></button>&nbsp<button class='delete-btn' data-id='{$row["product_id"]}'><span class='material-symbols-outlined' >delete</span></button></td></tr>";

        }
       

    $output .="</table>";

    mysqli_close($connect);
    
    echo $output;
    }else{
echo "ERROR";
    }
?>