<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $encpassword = md5($password);
    $select = "select user_id from tbl_user where username='$username'";
    $vselect = "select vid from tbl_vender where vuser_name='$username'";
    $result = mysqli_query($connect, $select);
    $vresult = mysqli_query($connect, $vselect);
    $count = mysqli_num_rows($result);
    $vcount = mysqli_num_rows($vresult);
    if ($count > 0) {
        echo '<script>alert("Error: User Name Is Already Registered Please Take Another")</script>';
    } elseif ($vcount > 0) {
        echo '<script>alert("Error: User Name Is Already Registered Please Take Another")</script>';
    } else {
        $insert = "insert into tbl_user values(0,'$email','$address',$phone,'$username','$encpassword')";
        if (mysqli_query($connect, $insert)) {

            $otp = rand(111111, 999999);

            $body = "<p> Dear $username,<br>

                Thank you for choosing bid Bazzere for your online shopping needs.<br>
                To ensure the security of your account, we have initiated the verification process for your email address.<br><br>

                Please find below your one-time password (OTP) for verification:<br><br>        

                <b>OTP: <u>$otp</u></b><br><br>

                Kindly use this OTP to verify your email address by entering it on the verification page.<br> 
                If you did not initiate this process or have any concerns regarding the security of your <br>
                account, please contact our customer support immediately.<br><br>

                We appreciate your cooperation in maintaining the security of your account. If you <br>
                have any further questions or require assistance, feel free to reach out to us.<br><br>

                Best regards,<br><br>

                Bid Bazzer Your Shopping Patner</p>";

            require 'Mailer/vendor/autoload.php';
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'patelkrupal679@gmail.com'; // Your Gmail email address
                $mail->Password   = 'gvoi wbtn whnu joic';        // Your Gmail password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('patelkrupal679@gmail.com', 'Bid Bazzer');
                $mail->addAddress($email,  $username);

                //Content
                $mail->isHTML(true);
                $mail->Subject = ' Your One-Time Password (OTP) for Verification';
                $mail->Body    = "<p> $body </p>";

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;
            header("location:verification.php");
        } else {
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
    <link rel="stylesheet" href="singup.css">

    <script>
        function validateForm() {
            var email = document.forms["signupForm"]["email"].value;
            var address = document.forms["signupForm"]["address"].value;
            var phone = document.forms["signupForm"]["phone"].value;
            var username = document.forms["signupForm"]["username"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirm_password"].value;

            // Email validation
            var emailRegex = /\S+@\S+\.\S+/;
            if (!emailRegex.test(email)) {
                alert("Invalid email address");
                return false;
            }

            // Phone number validation
            if (phone.length !== 10 || isNaN(phone)) {
                alert("Invalid phone number. Please enter 10 digits.");
                return false;
            }

            if (phone.length !== 10 || isNaN(phone)) {
                alert("Invalid phone number. Please enter exactly 10 digits.");
                return false;
            }

            // Password match validation
            if (password !== confirmPassword) {
                alert("Passwords do not match");
                return false;
            }

            return true;
        }
    </script>

</head>

<body>

    <form name="signupForm" action="" method="POST" onsubmit="return validateForm()">
        <div class="container">
            <div class="top"></div>
            <div class="bottom"></div>

            <div class="center">

                <h2><b>Bid Bazzar</b></h2>
                <input type="email" placeholder="Email" name="email" required />
                <input type="text" placeholder="Address" name="address" required />
                <input type="text" placeholder="Phone Number" name="phone" maxlength="10" required />
                <input type="text" placeholder="User Name" name="username" required />
                <input type="password" placeholder="Password" name="password" required />
                <input type="password" placeholder="Confirm Password" name="confirm_password" required />
                <p><b>Already Have An Account?<a href="login.php">LOGIN</a></b></p>
                <input type="submit" value="SignUp" id="button" name="btnsubmit" />

            </div>
        </div>
    </form>
</body>

</html>