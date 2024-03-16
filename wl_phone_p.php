<?php 
 session_start();
 include("connect.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="wl_product.css" rel="stylesheet">
   
</head>

<body>
    <Form action="" method="POST">
<?php include "navbar.html"; ?>
    <div id="load">
        <?php
       
        
        $cat = "phone";
        // Query to select products from your database
        $sql = "SELECT * FROM tbl_product WHERE category='$cat'";


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
                    echo "<a href='wl_display_p.php?pids={$row["product_id"]}'><div class='product'>";
                    echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
                    echo "<h2>" . $row['p_name'] . "</h2>";
                    echo "<p>Price:" . $row['p_price'] . "</p>";
                    echo "</div></a>";
                    $count++; // Increment count for each product
                }
                echo "</div>"; // Close products container
                // Free result set
                $result->free();
            } else {
                echo "<h1>No products found.</h1>";
            }
        } else {
            echo "<p>ERROR: Could not able to execute $sql. " . $mysqli->error . "</p>";
        }

        // Close connection
        $connect->close();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            
        $("#search").on("keyup", function() {
        var search_term = $(this).val();
        $.ajax({
          url: "ajax_phone_serach.php",
          type: "POST",
          data: {
            search: search_term
          },
          success: function(data) {
            $("#load").html(data);
          }
        })
      });

        });
    </script>
    </Form>
</body>

</html>