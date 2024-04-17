<?php
include("connect.php");

$id = $_POST["auid"];

$del = "delete from tbl_auction where a_id='$id'";


if (mysqli_query($connect, $del)) {

    echo 1;
} else {
    echo 0;
}
?>