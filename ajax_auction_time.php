<?php
session_start();
include("connect.php");

$id = $_SESSION['vender_id'];

$sql = "SELECT * FROM tbl_auction WHERE v_id='$id'";

if ($result = $connect->query($sql)) {

    // Check if there are any products
    if ($result->num_rows > 0) {
        // Loop through each product and display its details
        echo "<div class='products-container clearfix'>"; // Add clearfix to contain floated elements
        $count = 0; // Initialize count for tracking products in the row
        while ($row = $result->fetch_array()) {
            if ($count % 3 == 0 && $count != 0) {
                echo "<div class='clearfix'></div>"; // Clear float after every third product
            }

            // Calculate time remaining for the auction
            $current_time = time();
            $auction_start_time = strtotime($row['date'] . ' ' . $row['time']);
            $time_remaining = $auction_start_time - $current_time;

            // Display countdown timer
            echo "<div class='product'>";
            echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
            echo "<h2>" . $row['p_name'] . "</h2>";
            echo "<p>Auction Staring Price:" . $row['a_price'] . "</p>";
            echo "<p>Auction Starting Time: " . date('Y-m-d H:i:s', $auction_start_time) . "</p>";
            echo "<p>Time Remaining: " . gmdate("H:i:s", $time_remaining) . "</p>";
            echo "</div>";

            $count++;
        }
        echo "</div>"; // Close products container
        // Free result set
        $result->free();
    } else {
        echo "<p>No products found.</p>";
    }
} else {
    echo "<p>ERROR: Could not able to execute $sql. " . $mysqli->error . "</p>";
}

// Close connection
$connect->close();

?>
