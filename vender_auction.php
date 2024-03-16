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
    <link href="product.css" rel="stylesheet">
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            height: 80vh;
            box-sizing: border-box;
            background-color: #fff;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
            float: left;
            margin-right: 20px;
            border-radius: 10px;
            color: #000;
        }
        #remove_btn{
            width: 40%;
            height: 6vh;
            margin: 3% 28%;
            font-weight: bold;
            background-color: #ffd3d3;
            border: 2px solid darkred;
            color:red;
            border-radius: 5px;
            transition: all ease 0.3s;
            box-shadow: 4px 4px 2px gray;
            transform: scale(1.05);
        }

        #remove_btn:hover{
            transform: scale(1);
            box-shadow: 1px 1px 1px gray;
        }
    </style>
</head>

<body>
    <Form action="" method="POST">
        <?php include "vender_navbar.php"; ?>
        <div id="load">
            <?php
            if (!isset($_SESSION['vusername'])) {
                header("location:login.php");
            }
            $id = $_SESSION['vender_id'];

            // Query to select products from your database
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
                        echo "<div class='product'>";
                        echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
                        echo "<h2>" . $row['p_name'] . "</h2>";
                        echo "<p>Price:" . $row['p_price'] . "</p>";
                        echo "<p>Auction Starting Price:" . $row['a_price'] . "</p>";
                        echo "<p>Auction Starting Date:" . $row['date'] . "</p>";
                        echo "<p>Auction Starting Starting:" . $row['time'] . "</p>";
                        echo "<input type='submit' value='Remove Product' id='remove_btn' data-id='$row[a_id]'>";
                        //echo "<p>Auction Starting time: <span class='countdown' data-time='{$row['time']}' data-date='{$row['date']}'>Countdown</span></p>";
                        echo "</div>";
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
                $(document).on("click", "#remove_btn", function() {
                    var confirmation = confirm("Are you sure you want to delete this record?");
                    var a_id = $(this).data("id");
                    console.log(a_id);
                    if (confirmation) {
                        $.ajax({
                            url: "ajax_auction_delete.php",
                            type: "POST",
                            data: {
                                id: a_id
                            },
                            success: function(data) {
                                if (data == 1) {
                                    alert("Auction Has Been Cancle");
                                }
                            }
                        })
                    } else {
                        console.log("Deletion cancelled.");

                    }
                })
            });
        </script>


        <!-- <script>
            // Function to update countdown
            function updateCountdown() {
                var countdownElements = document.querySelectorAll('.countdown');
                countdownElements.forEach(function(element) {
                    var auctionDate = element.getAttribute('data-date');
                    var auctionTime = element.getAttribute('data-time');
                    var auctionDateTime = new Date(auctionDate + ' ' + auctionTime);
                    var now = new Date();
                    var diff = auctionDateTime - now;
                    if (diff > 0) {
                        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((diff % (1000 * 60)) / 1000);

                        // Display the countdown
                        element.textContent = days + "d " + hours + ":" + minutes + ":" + seconds;
                    } else {
                        element.textContent = "Auction ended";
                    }
                });
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);
        </script> -->
    </Form>
</body>

</html>