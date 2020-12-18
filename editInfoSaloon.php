<?php
session_start();
if (isset($_POST['email'], $_POST['phone'], $_POST['name'], $_POST['site'])) {
    if ($_POST['email'] == "" || $_POST['phone'] == "" || $_POST['name'] == "") {
        echo '<span style="color: darkred">الرجاء ادخال جميع الحقول المطلوبة</span>';
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<span style="color: darkred">الرجاء ادخال بريد الكتروني صحيح</span>';
        } else {
            $phone = test_input($_POST['phone']);
            if (!is_numeric($phone)) {
                echo '<span style="color: darkred">الرجاء ادخال رقم صحيح</span>';
            } else {
                $site = test_input($_POST['site']);
                $name = test_input($_POST['name']);
                if ($site != "" && !filter_var($site, FILTER_VALIDATE_URL)) {
                    echo '<span style="color: darkred">الرجاء ادخال رابط صحيح</span>';
                } else {
                    $user = 'root';
                    $pass = '';
                    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
                    $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $SID = $_SESSION['UserID'];
                    $sql = 'update saloon set Email=:email, PhoneNum=:num, SalName=:name, WebPage=:site where SID=:SID';
                    $serviceResult = $db->prepare($sql);
                    $serviceResult->execute(array(
                        ':SID' => $SID,
                        ':email' => $email,
                        ':num' => $phone,
                        ':name'=>$name,
                        ':site'=>$site
                    ));
                    $sql = 'update login set Email=:email where ID=:SID';
                    $serviceResult = $db->prepare($sql);
                    $serviceResult->execute(array(
                        ':SID' => $SID,
                        ':email' => $email,
                    ));
                    echo '<span style="color: darkred">تم تحديث البيانات بنجاح</span>';
                }
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