<?php
session_start();
if (isset($_POST['day'], $_POST['service'], $_POST['time'],$_POST['SID'])) {


    $service = test_input($_POST['service']);
    $day = test_input($_POST['day']);
    $d=strtotime("next $day");
    $date = date("Y-m-d", $d);
    $time = test_input($_POST['time']);
    $arabicDay = parseDay($day);
    $SID = test_input($_POST['SID']);
    $CID = $_SESSION['UserID'];

    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
    $sql = 'insert into bookings (CID,SID,Date,BookTime,Service) values (:CID,:SID,:bDate,:BTime,:Service)';
    $stmt = $db->prepare($sql);
    $stmt->execute(
        array(
            ':CID'=>$CID,
            ':SID'=>$SID,
            ':bDate'=>$date,
            ':BTime'=>$time,
            ':Service'=>$service,

        )
    );

    echo '<span style="color: darkred">تم الحجز بنجاح!</span>';
    return;
}else {
    echo '<span style="color: darkred">حدث خطأ أثناء تثبيت الحجز. يرجى المحاولة لاحقاً.</span>';
    return;
}

function parseDay($english)
{
    switch ($english) {
        case "sunday":
            return "أحد";
        case "monday":
            return "اثنين";
        case "tuesday":
            return "ثلاثاء";
        case "wednesday":
            return "أربعاء";
        case "thursday":
            return "خميس";
        case  "friday":
            return "جمعة";
        case "saturday":
            return "سبت";
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
