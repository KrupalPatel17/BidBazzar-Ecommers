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
    <title>Document</title>

    <style>
        h1 {
            padding-top: 6%;
            font-weight: bold;
            font-size: 30px;
            color: #000;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        .tbl {
            width: 100%;
            table-layout: fixed;

        }

        .tbl-header {
            background-color: black;
            font-weight: bold;
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            border-bottom: 1px solid white;
            text-align: center;
            text-transform: uppercase;
        }

        .tbl-content td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 12px;
            color: black;
            font-weight: bold;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
            text-align: center;
            border: 0.5px solid white;

        }

        .tbl-content td:hover {
            text-decoration: underline;
            font-weight: bold;
            color: #1b5e20;
        }


        .tbl-content tr {
            background-color: #a5d6a7;
            border: 1px solid #f1f8e9;
        }

        tr:nth-child(even) {
            background-color: #43a047;
            /* or any other color */
        }

        .tbl-content tr:hover {
            background-color: #e8f5e9;
        }

        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            background: linear-gradient(180deg, white, #a5d6a7, #1b5e20);
            font-family: 'Roboto', sans-serif;
            height: 100vh;
        }

        section {
            margin: 50px;
        }


        /* follow me template */
        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            color: #fff;
        }

        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }

        .made-with-love a {
            color: #fff;
            text-decoration: none;
        }

        .made-with-love a:hover {
            text-decoration: underline;
        }

        #btndelete {
            background-color: transparent;
            border: none;
            font-size: 160%;
            color: red;
            transition: all ease 0.5s;
        }

        #btndelete:hover {
            transform: scale(1.30);
        }

        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <?php include("admin_navbar.php"); ?>
    <section class="h1" id="tbl_rep">

    </section>
    <script>
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({
                'padding-right': scrollWidth
            });
        }).resize();
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
        function load() {
            $.ajax({
                url: "ajax_admin_user.php",
                type: "POST",
                success: function(data) {
                    $("#tbl_rep").html(data); // Replace the tbody content with the fetched data
                }

            });
        };
        load();

        $(document).on("click", "#btndelete", function() {
            var id = $(this).data("id");
            var confirmation = confirm("Are you sure you want to delete this record?");
            //console.log(id);
            if (confirmation) {
                $.ajax({
                    url: "ajax_admin_user_delete.php",
                    type: "POST",
                    data: {
                        uid: id
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

        $("#search").on("keyup", function() {
          var search_term = $(this).val();
          $.ajax({
            url: "ajax_admin_user_serach.php",
            type: "POST",
            data: {
              search: search_term
            },
            success: function(data) {
              $("#tbl_rep").html(data);
            }
          })
        });

        });
    
    </script>

</body>

</html>