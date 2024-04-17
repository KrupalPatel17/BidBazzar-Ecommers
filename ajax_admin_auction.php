<?php
session_start();
include("connect.php");
$uid = $_SESSION['users_id'];
$select = "SELECT tbl_auction.*, tbl_vender.vuser_name
FROM tbl_auction
INNER JOIN tbl_vender ON tbl_auction.v_id = tbl_vender.vid;";
$result = mysqli_query($connect, $select);
$i = 0;

if ($result) {
    $output = "<h1>Auction information</h1>
                <div class='tbl-header'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                        <thead>
                            <tr>
                                <th style='width:4%'>#</th>
                                <th style='width:6%'>Auction Id</th>
                                <th style='width:9%'>Vender Name</th>
                                <th style='width:9%'>Product name</th>
                                <th style='width:9%'>Image</th>
                                <th style='width:6%'>Product Price</th>
                                <th style='width:6%'>Auction Price</th>
                                <th style='width:9%'>Auctio Time</th>
                                <th style='width:4%'>Action</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    <div class='tbl-content'>
                    <table class='tbl' cellpadding='0' cellspacing='0' border='0'>
                    <tbody>"; // Start of tbody

    while ($uresult = mysqli_fetch_assoc($result)) {
        $aid = $uresult['a_id'];
        $vname = $uresult['vuser_name'];
        $p_name = $uresult['p_name'];
        $image = $uresult['p_image'];
        $aprice = $uresult['bid_price'];
        $pprice = $uresult['p_price'];
        $atime = $uresult['time'];
        $adate = $uresult['date'];
        $i++;

        $output .= "<tr>
                        <td style='width:4%'>$i</td>
                        <td style='width:6%'>$aid</td>
                        <td style='width:9%'>$vname</td>
                        <td style='width:9%'>$p_name</td>
                        <td style='width:9%'><img src='$image' height='70px' width='70px' class='img' id='ig'></td>
                        <td style='width:6%'>$pprice</td>
                        <td style='width:6%'>$aprice</td>
                        <td style='width:9%'>$adate $atime</td>
                        <td style='width:4%'><button id='btndelete' data-aid='$aid' ><i class='ri-delete-bin-6-fill'></i></button></td>
                    </tr>";
    }

    $output .= "</tbody></table></div>"; // End of tbody, table, and div
    echo $output; // Output the constructed table
} else {
    echo "Query failed."; // Handle case where the query failed
}
