<?php
session_start();
include("connect.php");
include("navbar2.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

$pid = $_GET['pids'];

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

        .product-info {
            flex: 2;
        }

        .product-info h2 {
            margin-top: 0;
        }

        .product-info p {
            margin-top: 5px;
            font-size: 16px;
        }

        .product-info ul {
            list-style: none;
            padding: 0;
        }

        .product-info ul li {
            margin-top: 5px;
        }

        /* Add to Cart/Buy Now Button */
        .add-to-cart {
            margin-top: 20px;
        }

        .add-to-cart button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all ease 0.5s;
        }

        .add-to-cart button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        #addtocart {
            background-color: #acd4ff;
            color: #007bff;
            font-weight: bold;
        }

        @media screen and (max-width: 768px) {
            .product-image img {
                width: 200px;

            }

        }
    </style>

</head>

<body>
    <?php

    $sql = "SELECT * FROM tbl_product WHERE product_id='$pid'";
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
                    <p>Price:<?php echo $row['p_price']; ?></p><br>
                    <h3>Specifications:</h3>
                    <ul>
                        <h4>Product Dteails</h4>
                        <li><?php echo $row['p_detail']; ?></li>
                        <h4>Product Category</h4>
                        <li><?php echo $row['category']; ?></li>
                        <div class="add-to-cart">
                            <button id="addtocart" data-id='<?php echo $row["product_id"]; ?>'>Add to Cart</button>
                            <a href="payment.html"><button>Buy Now</button></a>
                        </div>
                </div>
            </div>

        </div>
    <?php
    } else {
        echo "<p>No product found with the given ID.</p>";
    }

    $result->free();


    $connect->close();
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on("click", "#addtocart", function() {
                var id = $(this).data("id");
                console.log(id);
                $.ajax({
                    url: "ajax_add_to_cart.php",
                    type: "POST",
                    data: {
                        ids: id
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            alert("Product Add To Cart ");
                        } else {
                            alert("Cant Delete Record");
                        }
                    }
                });


            })
        });
    </script>
</body>

</html>