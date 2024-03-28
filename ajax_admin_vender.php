<?php
session_start();
include("connect.php");
$uid = $_SESSION['users_id'];
$select = "SELECT * FROM tbl_vender ";
$result = mysqli_query($connect, $select);
$i = 0;

if ($result) {
    $output = "<h1>Vendor information</h1>
                <div class='tbl-header'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                        <thead>
                            <tr>
                                <th style='width:4%'>#</th>
                                <th style='width:7%'>Vendor Id</th>
                                <th style='width:15%'>Vendor User Name</th>
                                <th style='width:20%'>Email</th>
                                <th style='width:8%'>Phone Number</th>
                                <th style='width:25%'>Address</th>
                                <th>Bank Name</th>
                                <th style='width:8%'>Account No</th>
                                <th style='width:7%'>Action</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    <div class='tbl-content'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                    <tbody>"; // Start of tbody

    while ($uresult = mysqli_fetch_assoc($result)) {
        $vid = $uresult['vid'];
        $vname = $uresult['vname'];
        $vusername = $uresult['vuser_name'];
        $email = $uresult['vemail'];
        $phone = $uresult['vphone_no'];
        $address = $uresult['vaddress'];
        $bankname = $uresult['bank_name'];
        $accountno = $uresult['account_no'];
        $i++;

        $output .= "<tr>
                        <td style='width:4%'>$i</td>
                        <td style='width:7%'>$vid</td>
                        <td style='width:15%'>$vusername</td>
                        <td style='width:20%'>$email</td>
                        <td style='width:8%'>$phone</td>
                        <td style='width:25%'>$address</td>
                        <td>$bankname</td>
                        <td style='width:8%'>$accountno</td>
                        <td style='width:7%'><button id='btndelete' data-id='$vid' ><i class='ri-delete-bin-6-fill'></i></button></td>
                    </tr>";
    }

    $output .= "</tbody></table></div>"; // End of tbody, table, and div
    echo $output; // Output the constructed table
} else {
    echo "Query failed."; // Handle case where the query failed
}
