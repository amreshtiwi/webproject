<?php
session_start();
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$CID=$_SESSION['UserID'];
$sql = 'select Email,PhoneNum from customer where CID=:CID';
$serviceResult = $db->prepare($sql);
$serviceResult->execute(array(
    ':CID' => $CID,
));
$row = $serviceResult->fetch(PDO::FETCH_ASSOC);
$email = $row['Email'];
$phone = $row['PhoneNum'];
?>

<div class="login-content">

    <div id="emailDiv" class="input-div two focus">
        <div class="i">
            <i class="fas fa-envelope"></i>
        </div>
        <div>
            <h5 class="mar">البريد الإلكتروني</h5>
            <input id="emalDiv" class="input1" type="email" name="emailDiv" value="<?php echo $email ?>"
                    style="background: none; outline: none; border: none; position: relative;top: -5px;">
        </div>
    </div>

    <div id="PhoneDiv" class="input-div two focus">
        <div class="i">
            <i class="fas fa-mobile"></i>
        </div>
        <div>
            <h5 class="mar">رقم الهاتف</h5>
            <input id="phonediv" class="input1" type="text" name="phoneDiv" pattern="\d{10}" maxlength="10"
                   title="Only number of 10 digits" value="<?php echo $phone ?>"  style="background: none; outline: none; border: none; position: relative;top: -5px;">
        </div>
    </div>
</div>
