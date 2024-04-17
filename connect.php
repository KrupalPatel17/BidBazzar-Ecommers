<?php
error_reporting(E_ALL & ~E_WARNING);
$connect = mysqli_connect("localhost", "bidbazza_krupal", "krupal0617", "bidbazza_bid_bazzar");
if (!$connect)
    echo "Can not connect to database" or die(mysqli_connect_error());
?>