<?php

    $to = 'ramisir3@gmail.com';
    $body = $_POST['message'];
    $Client = $_POST['email'];
    $headers = 'From: softwareproject92@gmail.com';
    $subject = 'WebSite Msg from ' . $Client;
    if (mail($to, $subject, $body,$headers)) {
        echo '<script>alert("Email successfully sent to' .$to. '");</script>';
        echo '<script> window.location.href = "index.php"; </script>';

    } else {
        echo '<script>alert("Email Failed...");</script>';
        echo '<script> window.location.href = "index.php"; </script>';

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
//        echo '<script> window.location.href = "index.php"; </script>';
//    }
//    $mail->Subject = 'WebSite Msg from ' . $Client;
//    $body = $message;
//    $mail->Body = $body;
//    $mail->AddAddress($to);
//    try {
//        $mail->send();
//    } catch (phpmailerException $e) {
//        echo ' send exception ' . $e->errorMessage();
//        echo '<script> window.location.href = "index.php"; </script>';
//    }

  //  echo '<script> alert("Email Sent Successfully")</script>';


?>