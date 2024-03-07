<?php
error_reporting(0);
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_list</title>
</head>

<body>
    <center>
        <h1>Welcome </h1>
        <a href="vender_homepage[1].php">Add Products</a>
        <h2>PRODUCTS LIST</h2>
        <table border="1">
            <tr>
                <th>SNO.</th>
                <th>P_ID</th>
                <th>P_NAME</th>
                <th>P_IMAGE</th>
                <th>P_CATEGORY</th>
                <th>P_DETAIL</th>
                <th>P_QUANTITY</th>
                <th>P_PRICE</th>
            </tr>
            <?php
            $sql="select * from tbl_product";
            $result=mysqli_query($connect,$sql);
            $count=mysqli_num_rows($result);
            if ($count>0){
                while($rows=$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$rows["1"]."</td>
                    <td>".$rows["product_id"]."</td>
                    <td>".$rows["p_name"]."</td>
                    <td><img src='".$rows["p_img"]."' height='100px' width='100px'></td>
                    <td>".$rows["category"]."</td>
                    <td>".$rows["p_detail"]."</td>
                    <td>".$rows["p_quantity"]."</td>
                    <td>".$rows["p_price"]."</td>
                    </tr>";

                }
                echo "</table>";
            }
            else{
                echo "0 result";
            }

            ?>
                    
        </table>
    </center>
</body>

</html>