<?php

$search_val = $_POST["search"];

session_start();
include("connect.php");
$id = $_SESSION['vender_id'];
$sql = "SELECT * FROM tbl_user WHERE (user_id LIKE '%{$search_val}%' OR username LIKE '%{$search_val}%')";
$result = mysqli_query($connect, $sql) or die("SQL FAIELD");

$output = "";
$button = "";
$i = 0;
if (mysqli_num_rows($result) > 0) {
    $output = "<h1>User information</h1>
                <div class='tbl-header'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                        <thead>
                            <tr>
                                <th style='width:4%'>#</th>
                                <th>User Id</th>
                                <th>User Name</th>
                                <th style='width:25%'>Email</th>
                                <th>Phone Number</th>
                                <th style='width:25%'>Address</th>
                                <th style='width:7%'>Action</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    <div class='tbl-content'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                    <tbody>"; // Start of tbody

    while ($uresult = mysqli_fetch_assoc($result)) {
        $userid = $uresult['user_id'];
        $username = $uresult['username'];
        $email = $uresult['email'];
        $phone = $uresult['phone_number'];
        $address = $uresult['address'];
        $i++;

        $output .= "<tr>
                        <td style='width:4%'>$i</td>
                        <td>$userid</td>
                        <td>$username</td>
                        <td style='width:25%'>$email</td>
                        <td>$phone</td>
                        <td style='width:25%'>$address</td>
                        <td style='width:7%'><button id='btndelete' data-id='$userid' ><i class='ri-delete-bin-6-fill'></i></button></td>
                    </tr>";
    }

    $output .= "</tbody></table></div>"; // End of tbody, table, and div
    echo $output; // Output
} else {
    echo '<h1 style="color:white">NO USER ARE FOUND</h1>';
}

?>