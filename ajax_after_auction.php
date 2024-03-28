<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("connect.php");
//$auction_select= "SELECT product_id , hour(TIMEDIFF(time,CURRENT_TIME())) as etime FROM `tbl_auction` WHERE hour(TIMEDIFF(time,CURRENT_TIME())) = 1 or hour(TIMEDIFF(time,CURRENT_TIME())) > 1 GROUP BY product_id;";
//$result=mysqli_query($connect,$auction_select);
//while($row=mysqli_fetch_assoc($result)){
//$cq="SELECT * FROM `tbl_auction` WHERE product_id=$row['product_id'] ORDER by a_price DESC LIMIT 1 ";
//$res=mysqli_query($connect,$cq);
//$row1=mysqli_fetch_assoc($res);
$a_id = $_POST['ides'];
$user_id = $_SESSION['users_id'];
$username = $_SESSION['username'];
    $select = "SELECT * FROM tbl_user WHERE user_id='$user_id'";
    $result = mysqli_query($connect, $select);
    $check = mysqli_fetch_assoc($result);
    $email = $check['email'];

$sql = "SELECT * FROM tbl_auction WHERE a_id='$a_id'";
$result = $connect->query($sql);

$result->num_rows;
$row = $result->fetch_assoc();
$product_name =  $row["p_name"];
$a_price =  $row["a_price"];
$originalTime =  $row["time"];
// Convert the time string to a DateTime object
$dateTime = DateTime::createFromFormat('H:i:s', $originalTime);

// Add 1 hour to the DateTime object
$dateTime->modify('+1 hour');
$resultTime = $dateTime->format('H:i:s');

date_default_timezone_set('Asia/Kolkata');

$current_time = date('H:i:s');

if ($resultTime === $current_time) {
    $body = "<p>Dear $username, <br>
    
    We're thrilled to inform you that you've emerged as the highest bidder and successfully won the auction for $product_name !<br><br>
    
    Your determination and enthusiasm have paid off, and we couldn't be happier to have you as the winning bidder. Your bid of $a_price was the highest, securing you the coveted prize.<br><br>
    
    Here are the details of your winning:<br>
    
    - Item:<b><u>$product_name</u></b><br>
    - Winning Bid Amount:<b><u>$a_price</u></b><br><br> 
   
    
    Now that you've won, here's what you need to do next:<br>
    
    1. Payment: Please proceed with the payment for the winning bid amount within  $a_price . You can find payment instructions and methods in the auction listing or on our website.<br>
       
    2. Shipping Information: Kindly provide us with the shipping address and any specific delivery instructions to ensure smooth and timely delivery of your prize.<br><br>
    
    3. Confirmation: Once payment is received and confirmed, we'll initiate the shipping process and provide you with tracking information so you can keep an eye on your package's journey to your doorstep.<br><br>
    
    We want to express our gratitude for your participation in the auction. Your support contributes to the success of our platform and helps us continue providing exciting opportunities for our community.<br><br>
    
    If you have any questions or need assistance at any step of the process, please don't hesitate to reach out to our customer support team. We're here to help make your auction-winning experience as seamless as possible.<br><br>
    
    Congratulations once again on your win! We hope you enjoy your new $product_name.<br><br>
    
    Best regards,<br>
    
    <b>Bid Bazzer</b></p>";

    require 'Mailer/vendor/autoload.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'patelkrupal679@gmail.com'; // Your Gmail email address
        $mail->Password   = 'gvoi wbtn whnu joic';        // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('patelkrupal679@gmail.com', 'Bid Bazzer');
        $mail->addAddress($email,  $username);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Congratulations! You have Won the Auction!';
        $mail->Body    = "<p> $body </p>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
         } else{
        echo "unmatch";
       }
    //}
?>
