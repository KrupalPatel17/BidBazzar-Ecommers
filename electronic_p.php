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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #800080;
        }

        .products-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Product styles */
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            height: 60vh;
            box-sizing: border-box;
            background-color: #fff;
            transition: transform 0.3s ease-in-out;
            float: left;
            margin-right: 20px;
            border-radius: 10px;
        }

        .product img {
            max-width: 200px;
            display: block;
            margin: 0 auto;
            mix-blend-mode: darken;
        }

        .product h2 {
            text-align: center;
            margin-top: 10px;
        }

        .product p {
            text-align: center;
            margin-top: 5px;
            font-size: 16px;
            color: #333;
        }

        /* Animation on hover */
        .product:hover {
            transform: scale(1.05);
        }

        /* Clearfix for float elements */
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .product {
                width: calc(50% - 20px);
                /* Adjust for smaller screens */
            }
        }

        @media screen and (max-width: 480px) {
            .product {
                width: calc(100% - 20px);
                /* Full width for smaller screens */
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
    <Form action="" method="POST">
<?php include "navbar2.php"; ?>
    <div id="load">
        <?php
       
        
        $cat = "electronics";
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
                    echo "<a href='displayproduct.php?pids={$row["product_id"]}'><div class='product'>";
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
                echo "<p>No products found.</p>";
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
          url: "ajax_ele_serach.php",
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