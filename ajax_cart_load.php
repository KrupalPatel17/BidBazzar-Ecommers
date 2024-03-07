<?php
session_start();
include("connect.php");
include("navbar2.php");

$uid = $_SESSION['users_id'];
$sql = "SELECT * FROM tbl_addtocart WHERE user_id='$uid'";
$result = $connect->query($sql);

$count = 0; // Initialize count for tracking products in the row

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $row['p_image']; ?>" alt="<?php echo $row['p_name']; ?>">
            </div>
            <div class="product-info">
                <h2><?php echo $row['p_name']; ?></h2>
                <p>Price: <?php echo $row['p_price']; ?></p><br>
                <div class="add-to-cart">
                    <input type="submit" value="Remove From Cart" id="addtocart" class="delete-btn" data-id="<?php echo $row['product_id'] ?>">
                </div>
                <div class="buy">
                    <input type="submit" value="Buy Now">
                </div>
            </div>
        </div>
<?php
        $count++; // Increment count for each product

        // Clear the float after every third product
        if ($count % 3 == 0) {
            echo '<div style="clear:both;"></div>';
        }
    }
} else {
    echo "<h1>No Products Are In Cart.</h1>";
}

$result->free();
$connect->close();
?>