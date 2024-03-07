<?php
    session_start();
    include("connect.php");
    
   
    $search_val = $_POST["search"];
    $cat = "phone";
    $sql = "SELECT * FROM tbl_product where category='$cat' AND p_name LIKE  '%{$search_val}%' ";


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
                if (isset($_SESSION['username'])) {
                    echo "<a href='displayproduct.php?pids={$row["product_id"]}'><div class='product'>";
                    echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
                    echo "<h2>" . $row['p_name'] . "</h2>";
                    echo "<p>Price:" . $row['p_price'] . "</p>";
                    echo "</div></a>";
                    $count++; // Increment count for each product
                } else {
                    echo "<a href='wl_display_p.php?pids={$row["product_id"]}'><div class='product'>";
                    echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
                    echo "<h2>" . $row['p_name'] . "</h2>";
                    echo "<p>Price:" . $row['p_price'] . "</p>";
                    echo "</div></a>";
                    $count++; // Increment count for each product
                }
            }
            echo "</div>"; // Close products container
            // Free result set
            $result->free();
        } else {
            echo "<h1>No Products Found.</h1>";
        }
    } else {
        echo "<p>ERROR: Could not able to execute $sql. " . $mysqli->error . "</p>";
    }

   

    // Close connection
    $connect->close();
    ?>
