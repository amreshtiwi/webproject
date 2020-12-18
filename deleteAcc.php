<?php
//session_start();
//if (isset($_GET['ID']) && isset($_SESSION['UserID']) && $_SESSION['UserID'] == $_GET['ID']) {
//    $ID = $_GET['ID'];
//    //echo "<script>alert('" . $_SESSION['UserID'] . "')</script>";
//    $user = 'root';
//    $pass = '';
//    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
//    $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $query = $db->prepare("delete from login where ID=?");
//    $query->execute([$ID]);
//    echo '<script>alert("تم حذف الحساب بنجاح")</script>';
//    session_destroy();
//    echo '<script> window.location.href = "index.php"; </script>';
//} else {
    echo '<script> window.location.href = "index.php"; </script>';
