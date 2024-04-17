<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Bazzar</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
    <style>
        
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            height: 68vh;
            box-sizing: border-box;
            background-color: #fff;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
            float: left;
            margin-right: 20px;
            border-radius: 10px;
            color: #000;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <?php include "navbar2.php"; ?>
        <div id="load">
            <?php
            if (!isset($_SESSION['username'])) {
                header("location:login.php");
            }


            // Query to select products from your database
            $sql = "SELECT * FROM tbl_auction ";

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
                        echo "<a href='auction_display.php?pids={$row["a_id"]}'><div class='product'>";
                        echo "<img src='" . $row['p_image'] . "' alt='" . $row['name'] . "'><br>";
                        echo "<h2>" . $row['p_name'] . "</h2>";
                        echo "<p>Price:" . $row['bid_price'] . "</p>";
                        //echo "<p>Auction Starting Starting:" . $row['time'] . "</p>";
                        echo "<p><span class='countdown' data-time='{$row['time']}' data-date='{$row['date']}'>Countdown</span></p>";
                        echo "</div></a>";
                        $count++; // Increment count for each product
                    }
                    echo "</div>"; // Close products container
                    // Free result set
                    $result->free();
                } else {
                    echo "<h1>No product for auction now.</h1>";
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
                        element.textContent = "Auction Starts In: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                    } else {
                        // Auction has started, set another countdown for 1 hour
                        var oneHourLater = new Date(auctionDateTime.getTime() + 60 * 60 * 1000);
                        var countdownInterval = setInterval(function() {
                            var now = new Date();
                            var diff = oneHourLater - now;
                            if (diff > 0) {
                                var hours = Math.floor(diff / (1000 * 60 * 60));
                                var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((diff % (1000 * 60)) / 1000);

                                // Display the countdown
                                element.textContent = "Auction Ends In: " + hours + "h " + minutes + "m " + seconds + "s";
                            } else {
                                // Auction has ended
                                clearInterval(countdownInterval);
                                element.textContent = "Auction Ended";
                            }
                        }, 1000);
                    }
                });
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);
           
        </script>
    </form>
</body>

</html>