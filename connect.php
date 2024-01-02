<?php
$connect = mysqli_connect("localhost", "root", "", "shopify");
if (!$connect)
    echo "Can not connect to database" or die(mysqli_connect_error());
?>