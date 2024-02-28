<?php  
 session_start();
include("connect.php");
  if (isset($_SESSION['username'])) {
      header("location:home.php");
   }
   if (isset($_SESSION['vusername'])) {
   header("location:vender_homepage.php");
}
    if (isset($_POST['btnsubmit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $select = "SELECT user_id,username,password FROM tbl_user WHERE username='$username'";
        $vselect = "SELECT vid,vuser_name,vpassword FROM tbl_vender WHERE vuser_name='$username'";
        $check = mysqli_query($connect, $select);
        $vcheck = mysqli_query($connect, $vselect);
        $result = mysqli_fetch_assoc($check);
        $vresult = mysqli_fetch_assoc($vcheck);
        $userid=$result['user_id'];
        $user = $result['username'];
        $encpass = $result['password'];

         $veid = $vresult['vid'];
         $vuser = $vresult['vuser_name'];
         $vencpass = $vresult['vpassword'];
         if (mysqli_num_rows($check)>0) {
                $fpass=md5($password);
                if($fpass==$encpass){
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['users_id'] =  $userid;
                
                    header("location:home.php");
            }else{
            echo '<script>alert("Eiter Username Or Password Is Wrong")</script>';
            }
        }

            if (mysqli_num_rows($vcheck)>0) {
                $fpass=md5($password);
                if($fpass==$vencpass){
                    $_SESSION['vusername'] = $username;
                    $_SESSION['vender_id'] = $veid  ;
                    header("location:vender_homepage.php");
            }else{
            echo '<script>alert("Eiter Username Or Password Is Wrong")</script>';
            }
         }
     else {
     echo '<script>alert("Eiter Username Or Password Is Wrong")</script>';
 }
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singup.css">
    <title>Document</title>
    <script>
        function validateForm() {
            var uname = document.getElementById('uname').value;
            var password = document.getElementById('password').value;

            if (uname.trim() == '' || password.trim() == '') {
                alert('Username and password are required!');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
   
</head>

<body>

   <form action="" method ="POST" onsubmit="return validateForm()"> 
    <div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  
  <div class="center">
   
  <h2><b>Bid Bazzar</b></h2>
   
    <input type="text" placeholder="User Name" name="username" id="uname" />
    <input type="password" placeholder="Password" name="password" id="password" />
    <p><b>Don't Have An Account?<a href="opction.html">SINGUP</a></b></p>
    <input type="Submit" value="Login" id="button" name="btnsubmit" id="button" />
    
   
  </div>
</div>
</form>
</body>
</html>
