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
            height: 88vh;
            box-sizing: border-box;
            background-color: #fff;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease-in-out;
            float: left;
            margin-right: 20px;
            border-radius: 10px;
            color: #000;
        }

        #remove_btn, #end_btn {
            margin: 0.70%;
            font-weight: bold;
            border-radius: 5px;
            box-shadow: 1px 1px 2px gray;
        }

        .btn-group{
            margin-left:9%;
        }
      
        #report_btn{
            margin: 0.70% 9.50%;
            width:80%;
            font-weight: bold;
            border-radius: 5px;
            box-shadow: 1px 1px 2px gray;
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

            // if(isset($_POST['btnreport'])){
            //     header("location:vender_auction_report.php");
            // }
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
                        echo "<p>Price:" . $row['p_price'] ."<br>";
                        echo "Auction Starting Price:" . $row['a_price']."<br>";
                        echo "Auction Starting At: " .  $row['date'] ." ". $row['time'] . "</p>";
                       // echo "<p>Auction Starting Starting:" . $row['time'] . "</p>";
                        // echo "<input type='submit' value='Remove Product' class='btn btn-outline-danger' id='remove_btn' data-id='$row[a_id]'>  ";
                        // echo "<input type='submit' value='End Auction' id='end_btn'  class='btn btn-outline-warning' data-ide='$row[a_id]' title='You Can Not End Your Auction If It Was Not Start';>";
                        echo "<div class='btn-group' role='group' aria-label='Basic outlined example'>
                        <input type='submit' value='Remove Product' class='btn btn-outline-danger' id='remove_btn' data-id='$row[a_id]'>  
                        <input type='submit' value='End Auction' id='end_btn'  class='btn btn-outline-warning' data-ide='$row[a_id]' title='You Can Not End Your Auction If It Was Not Start';>
                        </div>";
                        echo "<a href='vender_auction_report.php?aids={$row["a_id"]}'><buttom type='submit' id='report_btn' class='btn btn-outline-info' data-ide='$row[a_id]' name='btnreport';>Auction Report</button></a>";
                        echo "<input type='hidden' value='$row[time]' id='time' >";
                       
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

                $(document).on("click", "#end_btn", function(){
                    var confirmation = confirm("Are you sure you want to end auction?");
                    var a_id = $(this).data("ide");
                    // var time = $('#time').val();
                    // var currentTime = $.datepicker.formatTime('H:i:s', new Date());
                    //  //console.log(a_id);

                    // if(currentTime > time){
                    //     alert("After Auction Start You Will End It");
                    // }else{
                    if (confirmation) {
                        $.ajax({
                            url: "ajax_auction_end.php",
                            type: "POST",
                            data: {
                                id: a_id,
                            },
                            success: function(data) {
                                if (data == 1) {
                                    alert("Auction Has Been Ended");
                                }
                            }
                        })
                    } else {
                        console.log("End cancelled.");

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