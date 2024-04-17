<?php
session_start();
if (isset($_POST['btnlogout'])) {
   header("location:login.php");
   unset($_SESSION['admin']);
}
if (!isset($_SESSION['admin'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome Back Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }

        #welcome {
            margin-top: 7%;
            color: black;
            padding: 20px 0;
            font-size: 34px;
            font-weight: bold;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .block {
            width: 20%;
            height: 21vh;
            border-radius: 8px;
            border: 3px solid darkblue;
            margin: 20px;
            display: inline-block;
            background-color: #4285F4;
            color: #fff;
            font-size: 25px;
            font-weight: bold;
            line-height: 100px;
            /* Adjusted line-height */
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
            /* Center text */
            vertical-align: top;
            /* Align text to the top */
        }

        .block:hover {
            transform: scale(1.1);
            box-shadow: 3px 3px 5px black;
        }
    </style>
</head>

<body>
    <?php

    include("admin_navbar.php");
    include("connect.php");

    $query_users = "SELECT COUNT(*) AS user_count FROM tbl_user";
    $result_users = mysqli_query($connect, $query_users);
    $row_users = mysqli_fetch_assoc($result_users);
    $user_count = $row_users['user_count'];

    // Query to count vendors
    $query_vendors = "SELECT COUNT(*) AS vendor_count FROM tbl_vender";
    $result_vendors = mysqli_query($connect, $query_vendors);
    $row_vendors = mysqli_fetch_assoc($result_vendors);
    $vendor_count = $row_vendors['vendor_count'];

    // Query to count products
    $query_products = "SELECT COUNT(*) AS product_count FROM tbl_product";
    $result_products = mysqli_query($connect, $query_products);
    $row_products = mysqli_fetch_assoc($result_products);
    $product_count = $row_products['product_count'];

    // Query to count auctions
    $query_auctions = "SELECT COUNT(*) AS auction_count FROM tbl_auction";
    $result_auctions = mysqli_query($connect, $query_auctions);
    $row_auctions = mysqli_fetch_assoc($result_auctions);
    $auction_count = $row_auctions['auction_count'];

    mysqli_close($connect);


    ?>

    <div id="welcome">Hello, Welcome Back Admin</div>
    <div>
        <a href="admin_user.php">
            <div class="block"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Users <?php echo $user_count ?></div>
        </a>
        <a href="admin_vender.php">
            <div class="block"><i class="ri-store-3-fill"></i> Vendor <?php echo $vendor_count ?></div>
        </a>
    </div>
    <div>
        <a href="admin_product.php">
            <div class="block"><i class="ri-shopping-cart-fill"></i> Products <?php echo $product_count ?></div>
        </a>
        <a href="admin_auction.php">
            <div class="block"><i class="ri-auction-line"></i> Auctions <?php echo $auction_count ?></div>
        </a>
    </div>
</body>

</html>