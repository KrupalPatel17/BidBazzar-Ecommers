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
            padding: 20px;
        }

        .jumbotron {
            background-color: #343a40;
            color: #fff;
            padding: 40px;
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
            background-color: #343a40;
            /* Add a semi-transparent black background */
            backdrop-filter: blur(10px);
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                <p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
                <p>Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
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
            <p>&copy; 2024 E-Commerce Site. All rights reserved.</p>
        </div>
    </footer>
    <!-- Feedback Button -->
    <a href="https://forms.visme.co/formsPlayer/dm0eyx1g-untitled-project"><button class="feedback-button">Feedback</button></a>
    <!-- Bootstrap JS, Popper.js, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>