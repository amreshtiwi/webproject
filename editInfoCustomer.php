<?php
session_start();
if (isset($_POST['email'], $_POST['phone'])) {
    if ($_POST['email'] == "" || $_POST['phone'] == "") {
        echo '<span style="color: darkred">الرجاء ادخال كلا الحقلين</span>';
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<span style="color: darkred">الرجاء ادخال بريد الكتروني صحيح</span>';
        } else {
            $phone = test_input($_POST['phone']);
            if (!is_numeric($phone)) {
                echo '<span style="color: darkred">الرجاء ادخال رقم صحيح</span>';
            } else {
                $user = 'root';
                $pass = '';
                $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
                $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $CID = $_SESSION['UserID'];
                $sql = 'update customer set Email=:email, PhoneNum=:num where CID=:CID';
                $serviceResult = $db->prepare($sql);
                $serviceResult->execute(array(
                    ':CID' => $CID,
                    ':email'=> $email,
                    ':num'=>$phone
                ));
                $sql = 'update login set Email=:email where ID=:CID';
                $serviceResult = $db->prepare($sql);
                $serviceResult->execute(array(
                    ':CID' => $CID,
                    ':email'=> $email,
                ));
                echo '<span style="color: darkred">تم تحديث البيانات بنجاح</span>';
            }
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