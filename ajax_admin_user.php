<?php
session_start();
include("connect.php");
$uid = $_SESSION['users_id'];
$select = "SELECT * FROM tbl_user ";
$result = mysqli_query($connect, $select);
$i = 0;

if ($result) {
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
    echo $output; // Output the constructed table
} else {
    echo "Query failed."; // Handle case where the query failed
}
