<?php
session_start(); 
include("connect.php");
if (isset($_SESSION['username'])) {
    header("location:home.php");
    }    
     if (isset($_POST['btnsubmit'])) {
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $select = "select user_id from tbl_user where username='$username'";
        $result = mysqli_query($connect, $select);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "<p>Error: User Name is already registered</p>";
        } else {
            $insert = "insert into tbl_user values(0,'$email','$address',$phone,'$username','$password')";
            if (mysqli_query($connect, $insert)){
            header("location:login.php");
            }
            else {
                echo "Fail" or die(mysqli_error($connect));
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <style>
            @import url("https://fonts.googleapis.com/css?family=Raleway:400,700");
                *, *:before, *:after {
                box-sizing: border-box;
                }

                body {
                min-height: 100vh;
                font-family: "Raleway", sans-serif;
                
                }

                .container {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
                
                }
                .container:hover .top:before, .container:hover .top:after, .container:hover .bottom:before, .container:hover .bottom:after, .container:active .top:before, .container:active .top:after, .container:active .bottom:before, .container:active .bottom:after {
                margin-left: 200px;
                transform-origin: -200px 50%;
                transition-delay: 0s;
                }
                .container:hover .center, .container:active .center {
                opacity: 1;
                transition-delay: 0.3s;
                }

                .top:before, .top:after, .bottom:before, .bottom:after {
                content: "";
                display: block;
                position: absolute;
                width: 200vmax;
                height: 200vmax;
                top: 50%;
                left: 50%;
                margin-top: -100vmax;
                transform-origin: 0 50%;
                transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
                z-index: 10;
                opacity: 0.65;
                transition-delay: 0.2s;
                
                }

                .top:before {
                transform: rotate(45deg);
                background: #800080;
                }
                .top:after {
                transform: rotate(135deg);
                background: #C0C0C0;
                }

                .bottom:before {
                transform: rotate(-45deg);
                background: #A569BD;
                }
                .bottom:after {
                transform: rotate(-135deg);
                background: #2C3E50;
                }

                .center {
                position: absolute;
                width: 400px;
                height: 400px;
                top: 50%;
                left: 50%;
                margin-left: -200px;
                margin-top: -200px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 30px;
                opacity: 0;
                transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
                transition-delay: 0s;
                color: #333;
                
                }
                .center input {
                width: 70%;
                height:27px;
                padding: 6px;
                margin: 1px;
                border-radius: 1px;
                border: 1px solid #ccc;
                font-family: inherit;
                box-shadow: 7px 7px 7px #757575;
                transition:all ease 0.4s;
                }

                .center input:hover {
                width: 73%;
                height:30px;
                padding: 7px;
                margin: 3px;
                border-radius: 1px;
                border: 2px solid #800080;
                font-family: inherit;
                box-shadow: 10px 10px 10px #757575;
                }

               
                #button{
                    width:30%;
                    height:27px;
                    background:#f3e5f5  ;
                    box-shadow: 1px 1px 5px #2C3E50, 1px 1px 5px #2C3E50, 1px 1px 5px #2C3E50, 1px 1px 5px #2C3E50,;
                    border:2px solid #800080;
                    border-width:1px;
                    border-radius: 3px;
                    font-weight: bold;
                    transition:all ease 0.5s;
                    color:#A569BD;
                    font-weight: bold;
                }

                #button:hover{
                    width:33%;
                    height:30px;
                    background:#ce93d8;
                    border:2px solid #800080;
                    border-width:1px;
                    border-radius: 3px;
                    color:#2C3E50;
                    font-weight: bold;
                    font-size:15px;
                   
                }
                
                h2{
                    font-size:29px;
                    color:white;
                    text-shadow:0px 0px 5px #800080,0px 0px 5px #800080;
                    transition:all ease 0.5s;
                }

                h2:hover{
                    text-shadow:0px 0px 5px #800080,0px 0px 5px #800080,0px 0px 5px #800080,0px 0px 5px #800080;
                  
                }
        </style>
</head>

<body>

  <form action="" method ="POST"> 
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  
  <div class="center">
   
  <h2><b>Shopify's Shopping</b></h2>
    <input type="email" placeholder="Email" name="email"/>
    <input type="text" placeholder="Address" name="address"/>
    <input type="numbers" placeholder="Phone Number" name="phone"/>
    <input type="text" placeholder="User Name" name="username"/>
    <input type="password" placeholder="Password" name="password"/>
    <input type="password" placeholder="Conform Password"/>
    <p><b>Already Have An Account?<a href="login.php">LOGIN</a></b></p>
    <input type="Submit" value="SingUp" id="button" name="btnsubmit"/>
    
   
  </div>
</div>
</form>
</body>
</html>
