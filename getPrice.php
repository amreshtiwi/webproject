<?php
if (isset($_POST['SID'], $_POST['service'])) {
    $SID = test_input($_POST['SID']);
    $service = test_input($_POST['service']);
    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
    $sql = 'select Price from Services where SID=:SID and Service=:serv';
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':serv' => $service,
        ':SID' => $SID,
    ));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $price = $row['Price'];
    echo '<span style="color: darkblue"> صافي الدفع ='.$price.'</span>';
}
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);

        return $data;
    }