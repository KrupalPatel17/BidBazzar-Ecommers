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
       header("location:index.php");
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


    <form action="" method="POST">
    <?php include 'navbar2.html'; ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="profile-form">
          <h2>User Profile</h2>
          <form>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" id="address" rows="3" placeholder="Enter address"></textarea>
            </div>
            <input type="submit" class="btn btn-primary"  value="Save Changes">
            <input type="submit" class="btn btn-danger mt-3"  value="Delete Account">
            <input type="submit" class="btn btn-secondary mt-3"  name="btnlogout"  value="Logout"> 
          </form>
        </div>
      </div>
    </div>
  </div>



</form>
</body>
</html>