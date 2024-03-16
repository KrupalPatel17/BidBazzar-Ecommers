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
</head>

<body>

    <form action="" method="POST">
        <div class="container" onclick="onclick">
            <div class="top"></div>
            <div class="bottom"></div>

            <div class="center">

                <h2><b>Bid Bazzar</b></h2>
                <input type="email" placeholder="Email" name="email" />
                <input type="text" placeholder="Address" name="address" />
                <input type="numbers" placeholder="Phone Number" name="phone" maxlength="10" />
                <input type="text" placeholder="User Name" name="username" />
                <input type="password" placeholder="Password" name="password" />
                <input type="password" placeholder="Conform Password" />
                <p><b>Already Have An Account?<a href="login.php">LOGIN</a></b></p>
                <input type="Submit" value="SingUp" id="button" name="btnsubmit" />

            </div>
        </div>
    </form>
</body>

</html>