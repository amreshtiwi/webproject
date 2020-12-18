<?php
if (isset($_POST['day'], $_POST['SID'])) {
    $day = test_input($_POST['day']);
    $d = strtotime("next $day");
    $date = date("Y-m-d", $d);
    $today = date("Y-m-d");
    $arabicDay = parseDay($day);
    $SID = test_input($_POST['SID']);
    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
    $sql = 'select DISTINCT(Times) from timesday,saloon where (timesday.Times >= (SELECT OpenTime from workhours where workhours.Day =:Day and workhours.SID =:SID) && timesday.Times < ((SELECT CloseTime from workhours where workhours.Day =:Day and workhours.SID =:SID)) && Times not in (select BookTime from bookings where bookings.Date =:date && bookings.Date>=:today))';
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':Day' => $arabicDay,
        ':SID' => $SID,
        ':date' => $date,
        ':today' => $today
    ));
    $count = $stmt->rowCount();
    //echo '<script>alert("'.$count. " ". $arabicDay . " ". $SID . " ". $today ." ". $date .'")</script>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Time = $row['Times'];
        echo "<option value='$Time'>$Time</option>";
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
            return "أريعاء";
        case "thursday":
            return "خميس";
        case  "friday":
            return "جمعة";
        case "saturday":
            return "سبت";
    }
}