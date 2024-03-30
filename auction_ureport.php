<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Bazzar</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
            padding-top: 5%;
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
            overflow-x: hidden;
            overflow-y: hidden;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: auto;
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            border: 1px solid white;
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
            border: 1.5px solid black;
        }

        .tbl-content tr {
            background-color: #b5dcfec7;
        }

        tr:nth-child(even) {
            background-color: #95c8f4f5;
            /* or any other color */
        }

        .tbl-content tr:hover {
            background-color: whitesmoke;
        }

        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        body {
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(318deg, #929292, white, #378aff);
            font-family: 'Roboto', sans-serif;
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
    <?php
    session_start();
    include("connect.php");
    include("navbar2.php");
    ?>

    <section class="h1" id="tbl_rep">
        <!--for demo wrap-->

    </section>

    <script>
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
                    url: "ajax_ureport.php",
                    type: "POST",
                    success: function(data) {
                        $("#tbl_rep").html(data); // Replace the tbody content with the fetched data
                    }

                });
            };
            load();
           // setInterval(load, 1000);

            $("#search").on("keyup", function() {
                var search_term = $(this).val();
                $.ajax({
                    url: "ajax_uauction_report_serach.php",
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