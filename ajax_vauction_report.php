<?php
include("connect.php");
$a_id = $_POST['r_id'];
$select = "SELECT * FROM tbl_auction WHERE a_id='$a_id'";
$result = mysqli_query($connect, $select);
$check = mysqli_fetch_assoc($result);

$p_name = $check['p_name'];
$price = $check['p_price'];
$a_prcie = $check['bid_price'];
$max_b = $check['a_price'];
$a_declare = $check['c_time'];
$a_start = $check['f_time'];
$a_start_d = $check['date'];
$userid = $check['user_id'];
$username = $check['user_name'];

$sel = "SELECT * FROM tbl_user_auction WHERE a_id='$a_id' ORDER BY time DESC"; // Fetching bids in descending order of time
$uresult = mysqli_query($connect, $sel);

$output = "<dl class='row'>
  <dt class='col-sm-3'>Product Name</dt>
  <dd class='col-sm-9'> $p_name </dd>

  <dt class='col-sm-3'>Price</dt>
  <dd class='col-sm-9'> $price </dd>

  <dt class='col-sm-3'>Auction Starting Price</dt>
  <dd class='col-sm-9'> $a_prcie </dd>

  <dt class='col-sm-3'>Max Bid Price</dt>
  <dd class='col-sm-9'> $max_b </dd>

  <dt class='col-sm-3'>Auction Declare At</dt>
  <dd class='col-sm-9'> $a_declare </dd>

  <dt class='col-sm-3'>Auction Starting Time</dt>
  <dd class='col-sm-9'> $a_start_d $a_start </dd>
  
</dl>

<figure class='text-center'>
<blockquote class='blockquote'>
    <p>Auction Reports</p>
</blockquote>
<figcaption class='blockquote-footer'>
    Track Your <cite title='Source Title'>Auction</cite>
</figcaption>
</figure>

<table class='table' id='tbls'>
<th style='width:3%'>#</th>
<th style='width:5%'>User Name</th>
<th style='width:5%'>Bid Price</th>
<th style='width:8%'>Date\Time</th>
<th style='width:9%'>User Email Id</th>
<th style='width:9%'>Status</th>";

$i = 1;
while ($row = mysqli_fetch_assoc($uresult)) {
    $user_id = $row['user_id'];
    $bid_price = $row['u_price'];
    $time = $row['time'];
  
    $usel = "SELECT * FROM tbl_user WHERE user_id='$user_id'";
    $usresult = mysqli_query($connect, $usel);
    $uscheck = mysqli_fetch_assoc($usresult);

    $u_name = $uscheck['username'];
    $email = $uscheck['email'];
    $status = ($u_name == $username) ? 'WIN' : 'LOSE';
    $output .= "<tr>
   <td>$i</td>
   <td>$u_name</td>
   <td>$bid_price</td>
   <td>$time</td>
   <td>$email</td>
   <td>$status</td>
   </tr>";

    $i++;
}

$output .= "</table>";

echo $output;
?>
