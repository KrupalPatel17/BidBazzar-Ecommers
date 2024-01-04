<?php
include("connect.php");
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
    <title>Document</title>

    <style>
             body{
                background-image:url("img/bg.jpg");
                background-repeat:no-repeat;
                background-size: 99.99% 99.99%;
                background-attachment: fixed;
                margin: 0;
            font-family: Arial, sans-serif;
            }

            h2{
                    font-size:29px;
                    color:white;
                    text-shadow:0px 0px 5px #1ebfdd,0px 0px 5px #1ebfdd;
                    transition:all ease 0.5s;
                }

                h2:hover{
                    text-shadow:0px 0px 5px#1ebfdd,0px 0px 5px #1ebfdd,0px 0px 5px#1ebfdd,0px 0px 5px #1ebfdd;
                  
                }

                .logo-container {

                    position: relative;
                    width: 26%; /* Adjust the width and height to match your logo size */
                
                    }

                    .rotating-logo {
                    
                    width: 100%;
                    height: 100%;
                    animation: rotateLogo 6s linear infinite; /* Adjust the duration (6s in this case) to control the speed */
                    }

                    @keyframes rotateLogo {
                    0% {
                        transform: rotateY(0deg);
                    }
                    50% {
                        transform: rotateY(180deg);
                    }
                    100% {
                        transform: rotateY(360deg);
                    }
                 }
                 
            
                 
    </style>
</head>

    <?php
   
        if(isset($_POST['btnlogout'])){
            unset($_SESSION['username']);
            header("location:login.php");
        }
    ?>

<body>
    <form action="" method="POST">
        <div class="Header">
            <div class="logo-container">
                <table>
                    <tr>
                    <td><h2> Shopify's</h2></td><td> <img src="img/logo.png"  alt="Rotating Image" class="rotating-logo"></td> <td><h2>Shopping</h2></td>
                    </tr>
                </table>
            </div>
        </div>
        
    <input type="submit" name="btnlogout" value="Logout">
</form>
</body>
</html>