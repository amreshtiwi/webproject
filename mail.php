<?php

    $to = 'ramisir3@gmail.com';
    $body = $_POST['message'];
    $Client = $_POST['email'];
    $subject = 'WebSite Msg from ' . $Client;
    if (mail($to, $subject, $body)) {
        echo "Email successfully sent to $to...";
        echo '<script> window.location.href = "index.html"; </script>';

    } else {
        echo "Email sending failed...";
        echo '<script> window.location.href = "index.html"; </script>';

    }
//    require_once('./PHPMailer/PHPMailerAutoload.php');
//
//    $mail = new PHPMailer();
//    $mail->CharSet = 'UTF-8';
//    $mail->IsSMTP();
//    $mail->SMTPAuth = true;
//    $mail->Host = 'smtp.gmail.com';
//    $mail->SMTPSecure = 'ssl';
//    $mail->Port = 587;
//    $mail->isHTML();
//    $mail->Username = 'softwareproject92@gmail.com';
//    $mail->Password = '101200119';
//    try {
//        $mail->SetFrom('softwareproject92@gmail.com');
//    } catch (phpmailerException $e) {
//        echo ' setfrom exception ' . $e->errorMessage();
//        echo '<script> window.location.href = "index.html"; </script>';
//    }
//    $mail->Subject = 'WebSite Msg from ' . $Client;
//    $body = $message;
//    $mail->Body = $body;
//    $mail->AddAddress($to);
//    try {
//        $mail->send();
//    } catch (phpmailerException $e) {
//        echo ' send exception ' . $e->errorMessage();
//        echo '<script> window.location.href = "index.html"; </script>';
//    }

  //  echo '<script> alert("Email Sent Successfully")</script>';


?>