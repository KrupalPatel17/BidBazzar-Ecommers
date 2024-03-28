<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Bid Bazzar</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('bgimgs/p\ \(5\).jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow-x: hidden;
        }

        dl {
            padding-top: 1%;
            margin-left: 10%;
            font-size: 120%;

        }

        #rep {
            color: black;
            padding-top: 0%;
            font-size: 10px;
        }

        #title {
            padding-top: 8%;
            font-size: 200%;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            filter: drop-shadow(1px 1px 1px #2c26ff);
            color: #0500bc;
        }

        blockquote p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            filter: drop-shadow(1px 1px 1px #2c26ff);
            color: #0500bc;
            font-size: 160%;
            font-weight: bold;
            padding-top: 1%;
        }

        figcaption {
            color: black;
            font-weight: bold;
        }

        #tbls {
            width: 100%;
        }

        .table th {
            background-color: #A0D2EB;
            border: 2px double black;
            
        }

        .table tr {
            background-color: #E5EAF5;
            border: 2px double black;

        }

        .table td {
            border: 2px double black;

        }

        tr:nth-child(even) {
            background-color: #c1c6d2;
            /* or any other color */
        }

        .table tr:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <?php
    include("vender_navbar.php");
    $a_id = $_GET['aids'];
    ?>
    <div class="container"></div>

    <center>
        <p id="title">Product Details</p>
    </center>



    <input type="hidden" value="<?php echo $a_id ?>" id="aid">
    <div id="tbl_data">

    </div>

    <div id="auction_details">


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <script>
        $(document).ready(function() {
           
            function load() {
                var rid = $('#aid').val();
                console.log(rid);
                $.ajax({
                    url: "ajax_vauction_report.php",
                    type: "POST",
                    data: {
                        r_id: rid
                    },
                    success: function(data) {
                        $("#tbl_data").html(data); // Replace the tbody content with the fetched data
                    }

                });
            };
            load();
            setInterval(load, 1000);

            // $("#search").on("keyup", function() {
            //     var rid = $('#aid').val();
            //     var search_term = $(this).val();
            //     $.ajax({
            //         url: "ajax_vauction_report_serach.php",
            //         type: "POST",
            //         data: {
            //             search: search_term,
            //             r_id: rid
            //         },
            //         success: function(data) {
            //             $("#tbl_data").html(data);
            //         }
            //     })
            // });
        });
    </script>
</body>

</html>