<?php

session_start();
  include("connect.php");
  
  if (!isset($_SESSION['vusername'])) {
   header("location:login.php");
}
if(isset($_POST['btnlogout'])){
  unset($_SESSION['vusername']);
  unset($_SESSION['vender_id']);
  header("location:index.php");
}
if (isset($_POST['btnsave'])) {
  $bid = $_GET['bid'];
  $update = "update tbl_vender set vname='$_POST[name]',vemail='$_POST[email]',vaddress='$_POST[address]',vphone_no='$_POST[phone]',vuser_name='$_POST[uname]',vsh_name='$_POST[sname]',vsh_number='$_POST[snumber]',vsh_address='$_POST[saddress]',pincode='$_POST[pincode]',gst_no='$_POST[gst]',bank_name='$_POST[bname]',account_no='$_POST[anumber]' where vid=$bid";
  //echo $update;
  //exit;
  if (mysqli_query($connect, $update))
  echo '<script>alert("Your Account Has Been Update Successfully")</script>';
  
}

// if (isset($_POST['btndelete'])) {
// $bid = $_GET['bid'];
// $delete = "delete from tbl_vender where vid=$bid";
// // echo $delete;
// // exit;
// if (mysqli_query($connect, $delete)){
// unset($_SESSION['vusername']);
// unset($_SESSION['vender_id']);
// header("location: login.php");
// echo '<script>alert("Your Account Has Been Deleted Successfully")</script>';
// }
// else {
//   echo "Error:" . mysqli_error($connect);
// }
// }


if (isset($_GET['bid'])) {
    $sel = "select * from tbl_vender where vid=$_GET[bid]";
    $res = mysqli_query($connect, $sel);
    $data = mysqli_fetch_row($res);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Bazzar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<style>
		body {
			background: rgb(99, 39, 120);
      padding-top: 4%;
		}
		
		.form-control:focus {
			box-shadow: none;
			border-color: #BA68C8
		}

		.profile-button {
			background: rgb(99, 39, 120);
			box-shadow: none;
			border: none
		}
    .profile-button{
			background:rgb(166 82 195);
      transition: all ease 0.5s;
      font-weight: bold;
      border:1px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 1px 1px 5px black;
      transition: all ease 0.5s;
		}
    
		.profile-button:hover {
			background: #682773;
      font-weight: bold;
      border:1px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 0px 0px 0px black;
      transition: all ease 0.5s;
		}

		.profile-button:focus {
			background: #682773;
			box-shadow: none
		}

		.profile-button:active {
			background: #682773;
			box-shadow: none
		}

		.back:hover {
			color: #682773;
			cursor: pointer
		}

		.labels {
			font-size: 15px
		}

		.add-experience:hover {
			background: #BA68C8;
			color: #fff;
			cursor: pointer;
			border: solid 1px #BA68C8
		}
		#btnlogout{
      background-color:  #ff5050;
      width:60%;
      height: 6vh;
      font-weight: bold;
      border:1px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 1px 1px 5px black;
      transition: all ease 0.5s;
    }
    #btnlogout:hover{
      background-color:red;
      width:60.5%;
      height: 6.5vh;
      font-weight: bold;
      border:2px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 0px 0px 0px black;
    }
    #btndelete{
      background-color: #654dff;
      width:60%;
      height: 6vh;
      font-weight: bold;
      border:1px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 1px 1px 5px black;
      transition: all ease 0.5s;
    }
    #btndelete:hover{
      background-color: #2300ff;
      width:60.5%;
      height: 6.5vh;
      font-weight: bold;
      border:2px solid grey;
      color:white;
      border-radius: 5px;
      box-shadow: 0px 0px 0px black;
    }
		
		</style>
	</head>
	
	<body>
	 <form action="" method="POST">
    <?php  include("vender_navbar.php"); ?>
	  <input type="hidden" name="confirm_delete" value="yes">
	<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $data[1]; ?></span><span class="text-black-50"><?php echo $data[2]; ?></span><span> </span><br><input type="submit" name="btnlogout" value="Logout" id="btnlogout"></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Vendor Profile</h4>
                </div>
               
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $data[1]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="mail" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $data[2]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Enter Address"  name="address" value="<?php echo $data[3]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Phone</label><input type="number" class="form-control" placeholder="Enter Phone" name="phone" value="<?php echo $data[4]; ?>"></div>
                    <div class="col-md-12"><label class="labels">User Name</label><input type="text" class="form-control" placeholder="Enter User Name" name="uname" value="<?php echo $data[5]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Shop Name</label><input type="text" class="form-control" placeholder="Enter Shope Name" name="sname" value="<?php echo $data[7]; ?>"></div>
                    
                </div>
               
             
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
				<div class="col-md-12"><label class="labels">Shop Number</label><input type="number" class="form-control" placeholder="Enter Shope Number" name="snumber" value="<?php echo $data[8]; ?>"></div>
                <div class="col-md-12"><label class="labels">Shop Address</label><input type="text" class="form-control" placeholder="Enter Shope Address" name="saddress" value="<?php echo $data[9]; ?>"></div>
                <div class="col-md-12"><label class="labels">Pincode</label><input type="number" class="form-control" placeholder="Enter Pincode" name="pincode" value="<?php echo $data[10]; ?>"></div>
                <div class="col-md-12"><label class="labels">GST No</label><input type="number" class="form-control" placeholder="Enter GST No." name="gst" value="<?php echo $data[11]; ?>"></div>
                <div class="col-md-12"><label class="labels">Bank Name</label><input type="text" class="form-control" placeholder="Enter Bank Name" name="bname" value="<?php echo $data[12]; ?>"></div>
                <div class="col-md-12"><label class="labels">Account Number</label><input type="number" class="form-control" placeholder="Enter Account Number"  name="anumber" value="<?php echo $data[13]; ?>"></div>
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button"  name="btnsave" value="Save Profile"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
  </form>
	</body>
      <!-- <script>
        function checkdelete(){
          if(!confirm("Are You Sure To Want Delete An Account")){
            return false;
          }
          else{
            return true;
          }
        }
      </script> -->
</html>