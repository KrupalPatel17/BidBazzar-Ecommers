<?php
session_start();
include("connect.php");

$id = $_SESSION['vender_id'];

$sql = "SELECT * FROM tbl_auction WHERE v_id='$id'";
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    // Loop through each product and display its details
    echo "<div class='products-container clearfix'>"; // Add clearfix to contain floated elements
    $count = 0; // Initialize count for tracking products in the row
    while ($row = $result->fetch_array()) {
        if ($count % 3 == 0 && $count != 0) {
            echo "<div class='clearfix'></div>"; // Clear float after every third product
        }
$today_date = new DateTime(date("Y-m-d")); //get current date 
$auction_date = new DateTime($row['date']); //get auction date
$interval = $today_date->diff($auction_date);  // difference of auction date
$days_difference = $interval->days; // convert it into days

$current_time = date("H:i:s"); //get current time 
$auction_time = $row['time'];    //get auction time 
$datetime1 = DateTime::createFromFormat('H:i:s', $current_time); //convert it into time
$datetime2 = DateTime::createFromFormat('H:i:s', $auction_time); //convert it into time
$tinterval = $datetime1->diff($datetime2);
$tinterval_string = $tinterval->format('%H:%i:%s');
echo "<p>Time Remaining: " . $days_difference . "d" . " " . $tinterval_string  . "</p>";
    }
}


?>