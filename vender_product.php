<?php
session_start();
include("connect.php");
if (!isset($_SESSION['vusername'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bid Bazzar</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- Custom CSS -->
  <style>
    h2 {
      color: white;
    }

    body {
      background-color: #2d3e4e;
      padding-top: 9%;
    }

    .table {
      margin-top: 20px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .table td {
      vertical-align: middle !important;
      text-align: center;
      color: black;
    }

    .table th {
      vertical-align: middle !important;
      text-align: center;
      color: #fff;
    }

    .table thead th {
      background-color: #A569BD;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .table tbody tr:nth-child(odd) {
      background-color: #e9ecef;
    }

    .table tbody tr:hover {
      background-color: #ced4da;
    }

    .table tbody tr.fade-in {
      animation: fadeIn 0.5s ease;
    }

    #edit {
      color: #4ba2ff;
      transition: all ease 0.5s;
      font-variation-settings:
        'FILL' 1,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }

    #edit:hover {
      transform: scale(1.30);
      color: #0026ee;
      text-decoration: none;
    }

    .edit-btn {
      border: none;
      background-color: transparent;
      position: relative;
      display: inline-block;
    }

    .edit-btn .tooltiptext {
      font-size: 80%;
      visibility: hidden;
      width: 100px;
      background-color: black;
      color: white;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      top: 100%;
      left: 50%;
      margin-left: -60px;
      opacity: 0;
      transition: opacity 0.3s;
      background-color: #2d3536;
    }

    .edit-btn:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }

    .material-symbols-outlined {
      color: #ff6b6b;
      transition: all ease 0.5s;
      font-variation-settings:
        'FILL' 1,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }

    .material-symbols-outlined:hover {
      color: red;
      transform: scale(1.30);
    }

    .delete-btn {
      border: none;
      background-color: transparent;
      position: relative;
      display: inline-block;
    }

    .delete-btn .tooltiptext {
      font-size: 80%;
      visibility: hidden;
      width: 100px;
      background-color: black;
      color: white;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      top: 100%;
      left: 50%;
      margin-left: -60px;
      opacity: 0;
      transition: opacity 0.3s;
      background-color: #2d3536;
    }

    .delete-btn:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }

    td .ri-auction-line {
      color: #000dff;
      font-weight: 900;
      font-size: 140%;
      transition: all ease 0.5s;
      filter: drop-shadow(1px 1px 1px black);
    }

    .auction-btn {
      border: none;
      background-color: transparent;
      transition: all ease 0.5s;
      position: relative;
      display: inline-block;
    }

    .auction-btn:hover {
      transform: scale(1.30);
    }

    .auction-btn .tooltiptext {
      font-size: 61%;
      visibility: hidden;
      width: 70px;
      background-color: black;
      color: white;
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 90%;
      left: 150%;
      margin-left: -60px;
      opacity: 0;
      transition: opacity 0.3s;
      background-color: #2d3536;
    }

    .auction-btn:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }

    .img {
      border-radius: 10px;
      mix-blend-mode: darken;
    }

    .img:hover {
      filter: drop-shadow(1px 1px 10px #1ebfdd);
    }

    #modal {
      background-color: rgba(0, 0, 0, 0.7);
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: 100;
      display: none;

    }

    #modal input {
      width: 80%;
      margin-top: 2%;
      background-color: #ced4da;
      border: 1px solid grey;
      border-radius: 3px;
      transition: all ease 0.5s;
    }

    #modal input:hover {
      transform: scale(1.10)
    }

    #modal_form {
      background: #fff;
      width: 40%;
      position: relative;
      top: 20%;
      left: calc(50%-20%);
      padding: 15px;
      border-radius: 4px;

    }

    #modal_form h2 {
      margin: 0 0 15px;
      padding-bottom: 1px solid #000;
      color: #000dff;
      font-weight: bold;
      border-bottom: 2px double darkblue;
    }

    #close-btn {
      background: red;
      color: white;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      border-radius: 50%;
      position: absolute;
      top: -15px;
      right: -15px;
      cursor: pointer;
    }

    #btnsubmit {
      color: #fff;
      font-weight: bold;
      height: 7vh;
      box-shadow: -2px 4px 4px grey, -2px 4px 4px grey, -2px 4px 4px grey, -2px 4px 4px grey;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @media screen and (max-width: 768px) {
      nav {
        width: 210%;
      }
    }
  </style>
</head>

<body>
  <center>
    <div id="modal">
      <div id="modal_form">
        <h2>Add Product To Auction</h2>
        <table cellpading="10" width="100%">

        </table>
        <div id="close-btn">X</div>
      </div>
    </div>
  </center>
  <form action="" method="POST">
    <?php include "vender_navbar.php"; ?>
    <div class="container">
      <center>
        <h2 class="text-center mb-4">Product Table</h2>
      </center>
      <table class="table table-bordered" id="tbl_data">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Details</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
          </tr>
        </thead>


        <tr class="fade-in">
          <td>1</td>
          <td>Product A</td>
          <td>Product A Details Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
          <td>Category A</td>
          <td>10</td>
          <td>$100</td>
        </tr>
        <!-- Add more rows as needed -->

      </table>

    </div>



    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
      $(document).ready(function() {
        function load() {
          $.ajax({
            url: "ajaxload.php",
            type: "POST",
            success: function(data) {
              $("#tbl_data").html(data); // Replace the tbody content with the fetched data
            }

          });
        };
        load();

        $(document).on("click", ".delete-btn", function() {
          var id = $(this).data("id");
          var confirmation = confirm("Are you sure you want to delete this record?");
          if (confirmation) {
            $.ajax({
              url: "ajaxdelete.php",
              type: "POST",
              data: {
                ids: id
              },
              success: function(data) {
                console.log(response);
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

        $("#search").on("keyup", function() {
          var search_term = $(this).val();
          $.ajax({
            url: "ajaxserach.php",
            type: "POST",
            data: {
              search: search_term
            },
            success: function(data) {
              $("#tbl_data").html(data);
            }
          })
        });

        $(document).on("click", ".auction-btn", function(ele) {
          ele.preventDefault();
          $("#modal").show();
          var sid = $(this).data("id");
          $.ajax({
            url: "ajaxauction.php",
            type: "POST",
            data: {
              ides: sid
            },
            success: function(data) {
              $("#modal_form table").html(data);

            }

          })
        });


        $("#close-btn").on("click", function() {
          $("#modal").hide();
        });


        $(document).on("click", "#btnsubmit", function() {
          var aid = $(this).data("aid");
          var sprice = $('#sprice').val();
          var date = $('#date').val();
          var time = $('#time').val();

          if (sprice.trim() === "") {
            alert("Please Enter Auction Starting Price");
          } else if (date.trim() === "") {
            alert("Please Enter Auction Date");
          } else if (time.trim() === "") {
            alert("Please Enter Auction Time");
          } else {
            $.ajax({
              url: "ajax_auction_insert.php",
              type: "POST",
              data: {
                aids: aid,
                stprice: sprice,
                adate: date,
                atime: time
              },
              success: function(data) {
                console.log(data);
                if (data == 1) {
                  alert("Product Add To Auction");
                  $("#modal").hide();
                } else {
                  alert("Product Can't Add To Auctions");
                }
              }
            });
          }
        });
      });
    </script>
  </form>
</body>

</html>