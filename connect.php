<?php
error_reporting(E_ALL & ~E_WARNING);
$connect = mysqli_connect("localhost", "root", "", "bid_bazzar");
if (!$connect)
    echo "Can not connect to database" or die(mysqli_connect_error());
