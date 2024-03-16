<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("connect.php");
include("navbar2.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

$pid = $_GET['pids'];

?>
<?php
//   $user_id = $_SESSION['users_id'];
//   $username = $_SESSION['username'];
// $select="SELECT * FROM tbl_user WHERE user_id='$user_id'";
// $result=mysqli_query($connect,$select);
// $check=mysqli_fetch_assoc($result);
// $email=$check['email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #C0C0C0;
        }

        .product-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
        }

        .product-image {
            flex: 1;
            margin-right: 20px;
        }

        .product-image img {
            width: 350px;
            display: block;
            border-radius: 10px;
            transition: all ease 0.5s;
            filter: drop-shadow(4px 4px 5px black);

        }

        .product-image img:hover {
            transform: scale(1.06);
            filter: drop-shadow(3px 3px 6px black);
        }

        .product-info h2 {
            font-weight: bold;
            margin-left: 2.5%;
        }


        .product-info {
            flex: 2;
        }

        .product-info h3 {
            font-size: 27px;
            font-weight: bold;
            margin-left: 2.9%;
        }

        .product-info h4 {
            font-size: 20px;
            margin-left: 2.9%;
        }

        .product-info p {
            margin-left: 2.9%;
            font-size: 20px;
        }

        .max {
            margin-left: 2.9%;
            font-size: 25px;
        }

        .product-info ul {
            list-style: none;
            padding: 0;
        }

        .product-info ul li {

            margin-left: 2.9%;
            font-size: 20px;
        }

        /* Add to Cart/Buy Now Button */
        .add-to-cart {
            margin-top: 20px;
        }

        .add-to-cart input {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all ease 0.5s;
            margin-left: 2.9%;
            width: 20%;
            height: 10vh;
        }

        .add-to-cart input:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        h5 {
            margin-left: 2.9%;
        }

        #bid {
            background-color: #acd4ff;
            color: #007bff;
            border: 3px solid #007bff;
            font-weight: bold;
            font-size: 140%;

        }

        #num {
            width: 20%;
            margin-left: 2.9%;
        }

        #bider {
            width: 25%;
            border: 2px double black;
            border-radius: 7px;
            font-weight: bold;
            color: darkblue;
            background-color: lightgray;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @media screen and (max-width: 768px) {
            .product-image img {
                width: 200px;

            }

        }
    </style>


</head>

<body>
    <form action="" method="POST">
        <div id="load">
            <?php

            $sql = "SELECT * FROM tbl_auction WHERE a_id='$pid'";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            ?>
                <div class="product-container">
                    <div class="product-details">
                        <div class="product-image">
                            <img src="<?php echo $row['p_image']; ?>" alt="<?php echo $row['p_name']; ?>">
                        </div>
                        <div class="product-info">
                            <h2><?php echo $row['p_name']; ?></h2>
                            <p id="price">Price:<?php echo $row['p_price']; ?></p><br>
                            <h3>Specifications:</h3>
                            <ul>
                                <li><?php echo $row['p_details']; ?></li>
                            </ul>
                            <h3>Auction Details:</h3>
                            <p id="a">Auction Starting Price:<?php echo $row['a_price']; ?></p>
                            <?php echo "<h5><span class='countdown' data-time='{$row['time']}' data-date='{$row['date']}' data-product-id='{$row['product_id']}'>Countdown</span></h5>"; ?>
                            <?php echo "<input type='hidden' value='{$row['a_id']}' id='aid'"; ?>

                            <p class="max"><b style="font-size: 20px;margin-left:3%">Max Bid By: </b><input type="text" value=" <?php echo $row['user_name']; ?>" id="bider" readonly></p>


                            &nbsp&nbsp&nbsp&nbsp&nbspEnter You Bid Price:
                            <input type="number" id="num" class="form-control" value="<?php echo $row['a_price'] ?>" min="<?php $row['bid_price'] ?>" name="userInput" title="You Must Enter Price More Than ₹<?php echo $row['bid_price'] ?>" required>
                            <input type="hidden" id="num2" value="<?php echo $row['a_price'] ?>">


                            <div class="add-to-cart">
                                <input type="submit" id="bid" data-id='<?php echo $row["a_id"]; ?>' value="Bid" disabled>

                            </div>
                        </div>
                    </div>

                </div>
            <?php
            } else {
                echo "<h1>No product for auction now.</h1>";
            }

            $result->free();


            $connect->close();
            ?>
        </div>
        <!-- 
    <?php


    //     $originalTime =  $row["time"];

    //     // Convert the time string to a DateTime object
    //     $dateTime = DateTime::createFromFormat('H:i:s', $originalTime);

    //     // Add 1 hour to the DateTime object
    //     $dateTime->modify('+1 hour');
    //     $resultTime = $dateTime->format('H:i:s');

    //     date_default_timezone_set('Asia/Kolkata');

    //     $current_time = date('H:i:s');

    //    if($resultTime<$current_time){

    //     $body = "<p> Dear $username,<br>

    //     Thank you for choosing bid Bazzere for your online shopping needs.<br>
    //     To ensure the security of your account, we have initiated the verification process for your email address.<br><br>

    //     Please find below your one-time password (OTP) for verification:<br><br>        

    //     <b>OTP: <u>$email</u></b><br><br>

    //     Kindly use this OTP to verify your email address by entering it on the verification page.<br> 
    //     If you did not initiate this process or have any concerns regarding the security of your <br>
    //     account, please contact our customer support immediately.<br><br>

    //     We appreciate your cooperation in maintaining the security of your account. If you <br>
    //     have any further questions or require assistance, feel free to reach out to us.<br><br>

    //     Best regards,<br><br>

    //     Bid Bazzer Your Shopping Patner</p>";

    // require 'Mailer/vendor/autoload.php';
    // $mail = new PHPMailer(true);

    // try {
    //     //Server settings
    //     $mail->isSMTP();
    //     $mail->Host       = 'smtp.gmail.com';
    //     $mail->SMTPAuth   = true;
    //     $mail->Username   = 'patelkrupal679@gmail.com'; // Your Gmail email address
    //     $mail->Password   = 'gvoi wbtn whnu joic';        // Your Gmail password
    //     $mail->SMTPSecure = 'tls';
    //     $mail->Port = 587;

    //     //Recipients
    //     $mail->setFrom('patelkrupal679@gmail.com', 'Bid Bazzer');
    //     $mail->addAddress($email,  $username);

    //     //Content
    //     $mail->isHTML(true);
    //     $mail->Subject = ' Your One-Time Password (OTP) for Verification';
    //     $mail->Body    = "<p> $body </p>";

    //     $mail->send();
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }
    //      } else{
    //     echo "unmatch";
    //    }

    ?>
 -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                function load() {
                    var ids = $("#aid").val();
                    $.ajax({
                        url: "ajax_after_auction.php",
                        type: "POST",
                        data: {
                            ides: ids
                        },
                        success: function(data) {
                            console.log(data); // Replace the tbody content with the fetched data
                        }

                    });
                };
                load();

                //     function load_auction_details() {
                //         $.ajax({
                //             url: "ajax_load_auction_details.php",
                //             type: "POST",
                //             success: function(data) {
                //                 $("#load").html(data); // Replace the tbody content with the fetched data
                //             }

                //         });
                //     };
                //    load_auction_details();
                setInterval(load, 1000);
                $(document).on("click", "#bid", function() {
                    var id = $(this).data("id");
                    var bprise = $('#num').val();
                    var bprise2 = $('#num2').val();
                    console.log(id);
                    if (bprise > bprise2) {
                        $.ajax({
                            url: "ajax_insert_bid.php",
                            type: "POST",
                            data: {
                                ids: id,
                                bp: bprise
                            },
                            success: function(data) {
                                console.log(data);
                                if (data == 1) {
                                    alert("You Auction Price Has Been Save");
                                } else {
                                    alert("You Can Not Add Auction Price");
                                }
                            }
                        });
                    } else {
                        alert("You Must Enter Price More Than " + " " + "₹" + bprise2);
                    }

                })
            });
        </script>
        <!-- inc / dec js  -->
        <!-- inc / dec js  -->


        <!-- //Timer JS -->
        <script>
            function refresh() {
                var divElement = document.querySelectorAll('load');
                var newContent = 'Updated content at ' + new Date().toLocaleTimeString();

                // Update the content of the div
                divElement.innerHTML = newContent;
            }
            // Function to update countdown
            function updateCountdown() {
                var button = document.getElementById("bid");
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
                            var button = document.getElementById("bid");
                            var now = new Date();
                            var diffe = oneHourLater - now;
                            if (diffe > 0) {
                                var hours = Math.floor(diffe / (1000 * 60 * 60));
                                var minutes = Math.floor((diffe % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((diffe % (1000 * 60)) / 1000);
                                button.removeAttribute('disabled');
                                // Display the countdown
                                element.textContent = "Auction Ends In: " + hours + "h " + minutes + "m " + seconds + "s";
                            } else {
                                // Auction has ended
                                button.addEventListener("click", function() {
                                    // Function to add CSS styles
                                    button.style.display = "none"; // Change background color
                                    alert("Auction Has Ended");
                                });
                                clearInterval(countdownInterval);
                                element.textContent = "Auction Ended";

                            }

                        }, 1000);

                    }
                });
            }
            setInterval(refresh, 3000);
            // Update countdown every second
            setInterval(updateCountdown, 1000);
        </script>
    </form>
</body>

</html>