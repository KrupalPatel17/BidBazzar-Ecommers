<?php
include("connect.php");

$id=$_POST["ids"];

$del="delete from tbl_product where product_id='$id'";


if(mysqli_query($connect,$del)){

    echo 1;
}
else{
    echo 0;
}

?>