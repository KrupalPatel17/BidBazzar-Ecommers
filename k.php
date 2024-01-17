<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$otp= rand(111111,999999);
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
    $mail->setFrom('patelkrupal679@gmail.com', 'Punisher');
    $mail->addAddress('krupal561@gmail.com', 'Krupal');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body    = "<p> hello $otp </p>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
