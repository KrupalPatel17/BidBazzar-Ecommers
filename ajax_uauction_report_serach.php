<?php

$search_val = $_POST["search"];

session_start();
include("connect.php");
$uid = $_SESSION['users_id'];
$sql = "SELECT * FROM tbl_user_auction WHERE (p_name LIKE '%{$search_val}%' OR u_price LIKE '%{$search_val}%') ORDER BY time DESC";
$result = mysqli_query($connect, $sql) or die("SQL FAIELD");

$output = "";
$button = "";
$i = 0;
if (mysqli_num_rows($result) > 0) {
    $output = "<h1>Fixed Table header</h1>
    <div class='tbl-header'>
        <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Auction Starting Price</th>
                    <th>Your Bid</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            </table>
        </div>
        <div class='tbl-content'>
        <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
        <tbody>"; // Start of tbody

while ($uresult = mysqli_fetch_assoc($result)) {
$p_name = $uresult['p_name'];
$u_price = $uresult['u_price'];
$a_price = $uresult['a_price'];
$time = $uresult['time'];
$i++;

$inner_select = "SELECT * FROM tbl_auction WHERE user_id='$uid' AND a_price='$u_price'";
$inner_result = mysqli_query($connect, $inner_select);
$check = mysqli_fetch_assoc($inner_result);
$user_ids = $check['user_id'];
// Check if the user's bid matches the winning bid
$status = ($uid == $user_ids) ? 'WIN' : 'LOSE';
// Concatenate table rows to $output
$output .= "<tr>
            <td>$i</td>
            <td>$p_name</td>
            <td>$a_price</td>
            <td>$u_price</td>
            <td>$time</td>
            <td>$status</td>
        </tr>";
}

$output .= "</tbody></table></div>"; // End of tbody, table, and div
echo $output; // Output the constructed table
} else {
    echo '<h1 style="color:white">NO USER ARE FOUND</h1>';
}
?>
