<?php
    
    session_start();
    include("connect.php");
    $id = $_POST["ides"];
    $sql="SELECT * FROM tbl_product WHERE product_id = {$id}";
    $result=mysqli_query($connect,$sql) or die("SQL FAIELD");
    $output="";
    $button="";
    $i=0;
    if(mysqli_num_rows($result) > 0){
        $output ='';

        while($row=mysqli_fetch_assoc($result)){
            $i++;
            $output .="  <tr>
            <td>Product Name</td>
            <td><input type='text' id='pname' value='{$row["p_name"]}' readonly>
            <input type='text' id='eid' hidden value='{$row["product_id"]}'></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input type='text' id='price' value='{$row["p_price"]}' readonly></td>
        </tr>
        <tr>
            <td>Starting Price Of Auction</td>
            <td><input type='number' name='sprice' id='sprice' required></td>
        </tr>
        <tr>
            <td>Date Of Auction</td>
            <td><input type='date' name='date'  id='date' required></td>
        </tr>
        <tr>
            <td>Staring Time Of Auction</td>
            <td><input type='time'  name='time'  id='time' required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' id='btnsubmit' style='background-color:#0000ab' class='btnsave' data-aid='{$row["product_id"]}' value='Add To Auction'></td>
        </tr>";
        

        
        }

  

    mysqli_close($connect);
    
    echo $output;
    }else{
echo "ERROR";
    }

?>