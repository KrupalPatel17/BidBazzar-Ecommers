<?php
include("connect.php");
session_start();
if (!isset($_SESSION['username'])) {
  header("location:login.php");
}
?>
<?php
   
   if(isset($_POST['btnlogout'])){
       unset($_SESSION['username']);
       unset($_SESSION['user_id']);
       header("location:index.php");
   }

   if (isset($_POST['btnsave'])) {
      $bid = $_GET['bid'];
      $update = "update tbl_user set email='$_POST[email]',phone_number='$_POST[phone]',username='$_POST[uname]',address='$_POST[address]'where user_id=$bid";
      if (mysqli_query($connect, $update))
      echo '<script>alert("Your Account Has Been Update Successfully")</script>';
}

if (isset($_POST['btndelete'])) {
  $bid = $_GET['bid'];
  $delete = "delete from tbl_user where user_id= $bid";
  if (mysqli_query($connect, $delete)){
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
header("location: login.php");
echo '<script>alert("Your Account Has Been Deleted Successfully")</script>';
}
  else {
      echo "Error:" . mysqli_error($connect);
  }
}



   if (isset($_GET['bid'])) {
    $sel = "select * from tbl_user where user_id=$_GET[bid]";
    $res = mysqli_query($connect, $sel);
    $data = mysqli_fetch_row($res);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>


</head>

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #2C3E50;
      color: white;
    }
    .container {
      margin-top: 50px;
    }
    .profile-form {
      background-color: #800080;
      padding: 30px;
      border-radius: 10px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    .btn {
      width: 100%;
    }
  </style>
</head>
<body>

<?php include 'navbar2.php'; ?>
    <form  id="deleteForm" action="" method="POST">
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="profile-form">
          <h2>User Profile</h2>
          <input type="hidden" name="confirm_delete" value="yes">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $data[1]; ?>">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php echo $data[3]; ?>">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter username" name="uname" value="<?php echo $data[4]; ?>">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" id="address" rows="3" placeholder="Enter address" name="address"><?php echo $data[2]; ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary"  value="Save Changes" name="btnsave">
            <input type="submit" class="btn btn-danger mt-3"  value="Delete Account" name="btndelete">
            <input type="submit" class="btn btn-secondary mt-3"  name="btnlogout"  value="Logout"> 
        
        </div>
      </div>
    </div>
  </div>



</form>
</body>
</html>