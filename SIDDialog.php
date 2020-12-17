<?php

$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
if(isset($_POST['SID'])){
    $SID =htmlentities(trim($_POST['SID']));
    $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'select service from services where SID=:SID';
    $result = $db->prepare($sql);
    $result->execute(array(
         ':SID'=>$SID
     ));
    $row = $result->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($row);
}
