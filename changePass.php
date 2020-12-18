<?php
session_start();
if (isset($_POST['oldPass'], $_POST['pass1'], $_POST['pass2'])) {
    $ID = $_SESSION['UserID'];
    $oldPass = test_input($_POST['oldPass']);
    $pass1 = test_input($_POST['pass1']);
    $pass2 = test_input($_POST['pass2']);
    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
    $sql = 'select Type,Password from login where ID=:ID';
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':ID' => $ID));
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $dataPass = $res['Password'];
    if (sha1($oldPass) != $dataPass) {
        echo '<span style="color: darkred">كلمة المرور القديمة غير صحيحة</span>';
    } elseif ($pass1 != $pass2) {
        echo '<span style="color: darkred">كلمات المرور الجديدة غير متطابقة</span>';
    } else {
        if ($res['Type'] == "C") {
            $sql = 'update login set Password=:PassW where ID=:CID';
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':PassW' => sha1($pass1), ':CID' => $ID));
            $sql = 'update customer set Password=:PassW where CID=:CID';
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':PassW' => sha1($pass1), ':CID' => $ID));
            echo '<span style="color: darkred">تم تحديث كلمة المرور بنجاح!</span>';
        } else {
            $sql = 'update login set Password=:PassW where ID=:ID';
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':PassW' => sha1($pass1), ':ID' => $ID));
            $sql = 'update saloon set Password=:PassW where SID=:SID';
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':PassW' => sha1($pass1), ':SID' => $ID));
            echo '<span style="color: darkred">تم تحديث كلمة المرور بنجاح!</span>';
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = htmlentities($data);

    return $data;
}