<?php
session_start();

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);

$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'select * from bookings,saloon,services where bookings.CID = :CID and services.service = bookings.service and bookings.SID=services.SID and saloon.SID = bookings.SID';
$stmt = $db->prepare($sql);
$stmt->execute(array(':CID' => $_SESSION['UserID']));

?>

<div class="table-div">
    <table class="styled-table">
        <thead>
        <th>اسم الصالون</th>
        <th>التاريخ</th>
        <th>الوقت</th>
        <th>الخدمة</th>
        <th>السعر</th>
        </thead>
        <tbody>
        <?php
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                echo "<td>". $row['SalName'] ."</td>";
                echo "<td>". $row['Date'] ."</td>";
                echo "<td>". $row['BookTime'] ."</td>";
                echo "<td>". $row['Service'] ."</td>";
                echo "<td>". $row['Price'] ."</td>";
                echo '</tr>';

            }


        ?>


        </tbody>
    </table>

</div>





