<?php
session_start();
include("connect.php");

if(isset($_POST['aids'])) {
    $aids = $_POST['aids'];

    // $select = "SELECT tbl_auction.*, tbl_user.username
    //            FROM tbl_auction
    //            INNER JOIN tbl_user ON tbl_auction.user_id = tbl_user.user_id 
    //            WHERE a_id='$aids'";
    $select = "SELECT * FROM tbl_auction WHERE a_id='$aids'";

    $result = mysqli_query($connect, $select);
    
    if($result) {
        $uresult = mysqli_fetch_assoc($result);
        $vname = $uresult['user_name'];
        $aprice = $uresult['a_price'];
        $bidprice = $uresult['bid_price'];

        $output = "<p class='max'><b style='font-size: 20px;margin-left:%'>Max Bid By: </b><input type='text' value='$vname' id='bider' readonly></p>
                   &nbsp&nbsp&nbsp&nbsp&nbspEnter You Bid Price:
                   <input type='number' id='num' class='form-control' value='$aprice' min='$bidprice' name='userInput' title='You Must Enter Price More Than ₹$aprice' required>";

        echo $output;
    } else {
        echo "Error executing SQL query: " . mysqli_error($connect);
    }
} else {
    echo "No auction ID received.";
}
?>
