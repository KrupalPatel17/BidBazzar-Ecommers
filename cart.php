<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .add-to-cart-container {
            max-width: 100%;
            height: 100vh;
            background-color: #9d9d9d;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;

        }

        .product-details {
            width: calc(33.33% - 20px);
            height: 72vh;
            /* Adjust as needed */
            margin-right: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            float: left;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .product-details:hover {
            transform: scale(1.04);
        }

        .product-details:last-child {
            margin-right: 0;
        }

        .product-details h2 {
            text-align: center;
            margin-top: 10px;
        }

        .product-details p {
            text-align: center;
            margin-top: 5px;
            font-size: 16px;
            color: #333;
        }

        /* Add to Cart button */
        .add-to-cart input,
        .buy input {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #ff4a4a;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
            margin-left: 100px;
        }

        .add-to-cart input:hover,
        .buy input:hover {
            background-color: #d03636;
            transform: scale(1.06);
        }

        .buy input {
            margin-top: 10px;
            margin-left: 135px;
            background-color: #007bff;
        }

        .buy input:hover {
            background-color: #0056b3;
        }

        .product-image img {
            max-width: 180px;
            display: block;
            margin: 0 auto;
            mix-blend-mode: darken;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .product-details {
                width: calc(50% - 20px);
                height: 46vh;
            }

            .product-details:nth-child(2n) {
                margin-right: 0;
            }
        }

        @media screen and (max-width: 480px) {
            .product-details {
                width: 100%;
                /* Full width for smaller screens */
                margin-right: 0;
            }
        }
    </style>
</head>

<body>

    <div class="add-to-cart-container" id="cart">


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function load() {
                $.ajax({
                    url: "ajax_cart_load.php",
                    type: "POST",
                    success: function(data) {
                        $("#cart").html(data); // Replace the tbody content with the fetched data
                    }

                });
            };
            load();

            $(document).on("click", ".delete-btn", function() {
                var id = $(this).data("id");
                console.log(id);
                var confirmation = confirm("Are you sure you want to delete this record?");
                if (confirmation) {
                    $.ajax({
                        url: "ajax_remove_p.php",
                        type: "POST",
                        data: {
                            ids: id
                        },
                        success: function(data) {
                            console.log(data);
                            if (data == 1) {
                                load();
                            } else {
                                alert("Cant Delete Record");
                            }
                        }
                    });

                } else {
                    console.log("Deletion cancelled.");
                }
            });
            load();
        });
    </script>
</body>

</html>