<?php
session_start();
include("connect.php");

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
           
        }

        .jumbotron {
            background-color: #343a40;
            color: #fff;
           padding-top: 8%;
            margin-bottom: 30px;
            border-radius: 0;
        }

        .feedback-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .feedback-button:hover {
            background-color: #0056b3;
        }

        .navbar {
         
            border-radius: 0px;
        }

        .navbar:hover {
            background-color: #343a40bd;
            box-shadow: 1px 1px 50px #343a40bd;
        }

        a {
            list-style: none;
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Page Title -->
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="display-4">About Us</h1>
            <p class="lead">Learn more about our company and mission.</p>
        </div>
    </div>
    <!-- Main Content Area -->
    <main>
        <div class="container">
            <section id="about-section">
                <h2 class="text-center">About Our Company</h2>
                <p>BidBazzar is a website where Users can browse and purchase a wide range of products,</p>
                <p>and they also have the exciting option of participating in real-time auctions for exclusive items.</p>
                <p>That's the beauty of a hybrid e-commerce website that combines live auctions with traditional product sales.</p>
                <p>The platform offers a user-friendly interface, secure payment options, and robust auction functionalities, </p>
                <p>creating a diverse and engaging online marketplace. </p>
            </section>
            <section id="auction-section">
                <h2 class="text-center">Auction Feature</h2>
                <!-- Insert auction functionality here -->
                <p class="text-center">This is where you would integrate the auction feature.</p>
            </section>
        </div>

    </main>
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Bid Bazzar. All rights reserved.</p>
        </div>
    </footer>
    <!-- Feedback Button -->
<<<<<<< HEAD
    <!-- <a href="https://forms.visme.co/formsPlayer/dm0eyx1g-untitled-project"><button class="feedback-button">Feedback</button></a> -->
=======
    <a href="https://forms.visme.co/formsPlayer/dm0eyx1g-untitled-project"><button class="feedback-button">Feedback</button></a>
>>>>>>> origin/main
    <!-- Bootstrap JS, Popper.js, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>