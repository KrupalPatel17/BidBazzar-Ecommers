<?php
session_start();
include("connect.php");
include("navbar2.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Gateway</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 5%;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color:#800080;
      color: #fff;
      border-radius: 10px 10px 0 0;
      padding: 15px;
    }
    .btn-primary {
      background-color: #800080;
      border: none;
    }
    .btn-primary:hover {
      background-color: #d300d3;
    }
    #paymentForm input[type="text"],
    #paymentForm input[type="email"] {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 10px;
    }
    #paymentForm input[type="text"]:focus,
    #paymentForm input[type="email"]:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
    #paymentForm button[type="submit"] {
      border-radius: 5px;
      padding: 10px;
    }
    #paymentForm button[type="submit"]:hover {
      opacity: 0.8;
    }
    /* Animation */
    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(100px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    .card {
      animation: slideInRight 0.5s ease-out;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Payment Details</h3>
          </div>
          <div class="card-body">
            <form id="paymentForm">
              <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="expiryDate">Expiration Date</label>
                  <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="cvv">CVV</label>
                  <input type="text" class="form-control" id="cvv" placeholder="CVV" required>
                </div>
              </div>
              <div class="form-group">
                <label for="cardHolderName">Cardholder Name</label>
                <input type="text" class="form-control" id="cardHolderName" placeholder="Enter cardholder name" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom Script -->
  <script>
    // Add custom JavaScript here
  </script>
</body>
</html>
