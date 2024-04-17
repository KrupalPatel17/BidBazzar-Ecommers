<?php
session_start();
include("connect.php");

if (isset($_SESSION['username'])) {
    header("location:vender_homepage.php");
}

if (isset($_POST['btnsubmit'])) {
    $vname = ($_POST['vdname']);
    $vemail = ($_POST['vdemail']);
    $vaddress = ($_POST['vaddress']);
    $vphne = ($_POST['vdphone']);
    $vusername = ($_POST['vusername']);
    $vpassword = ($_POST['vpassword']);

    $_SESSION['vdname'] = $vname;
    $_SESSION['vemail'] = $vemail;
    $_SESSION['vaddress'] = $vaddress;
    $_SESSION['vphne'] = $vphne;
    $_SESSION['vusername'] = $vusername;
    $_SESSION['vpassword'] = $vpassword;

    header("location:vender_singup2.php");
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
            var vdname = document.forms["signupForm"]["vdname"].value;
            var vdemail = document.forms["signupForm"]["vdemail"].value;
            var vaddress = document.forms["signupForm"]["vaddress"].value;
            var vdphone = document.forms["signupForm"]["vdphone"].value;
            var vusername = document.forms["signupForm"]["vusername"].value;
            var vpassword = document.forms["signupForm"]["vpassword"].value;
            var confirm_password = document.forms["signupForm"]["confirm_password"].value;

            // Email validation
            var emailRegex = /\S+@\S+\.\S+/;
            if (!emailRegex.test(vdemail)) {
                alert("Invalid email address");
                return false;
            }

            // Phone number validation
            if (isNaN(vdphone) || vdphone.length !== 10) {
                alert("Invalid phone number. Please enter 10 digits.");
                return false;
            }

            // Password match validation
            if (vpassword !== confirm_password) {
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
                <input type="text" name="vdname" placeholder="Vendor's Name" required>
                <input type="email" name="vdemail" placeholder="Vendor's Email">
                <input type="text" name="vaddress" placeholder="Vendor Address" />
                <input type="text" name="vdphone" placeholder="Vendor's Phone no.">
                <input type="text" placeholder="User Name" name="vusername" />
                <input type="password" placeholder="Password" name="vpassword" />
                <input type="password" placeholder="Confirm Password" name="confirm_password" />
                <p><b>Already Have An Account?<a href="login.php">LOGIN</a></b></p>
                <input type="Submit" value="Next" id="button" name="btnsubmit" />

            </div>
        </div>
    </form>
</body>

</html>