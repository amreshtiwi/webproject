<?php

$to = 'ramisir3@gmail.com';
$body = $_POST['message'];
$Client = $_POST['email'];


require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->CharSet = 'UTF-8';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'softwareproject92@gmail.com';
$mail->Password = '101200119';
$mail->SetFrom('softwareproject92@gmail.com', 'Halaqi');
$mail->AddAddress($to);
$mail->addReplyTo('softwareproject92@gmail.com');
$mail->isHTML(true);
$mail->Subject = 'WebSite Msg from ' . $Client;
//$body = $message;
$mail->Body = $body;

if (!$mail->send()) {
    echo '<script> alert("Email Failed")</script>';
    echo '<script> alert("' . $mail->ErrorInfo . '")</script>';
} else {
    echo '<script> alert("Email Sent Successfully")</script>';
    echo '<script> window.location.href = "index.php"; </script>';
}


?>