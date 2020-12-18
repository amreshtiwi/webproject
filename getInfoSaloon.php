<?php
session_start();
$user = 'root';
$pass = '';
$db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$SID=$_SESSION['UserID'];
$sql = 'select Email,PhoneNum,SalName,WebPage from saloon where SID=:SID';
$serviceResult = $db->prepare($sql);
$serviceResult->execute(array(
    ':SID' => $SID,
));
$row = $serviceResult->fetch(PDO::FETCH_ASSOC);
$email = $row['Email'];
$phone = $row['PhoneNum'];
$name = $row['SalName'];
$page = $row['WebPage'];


?>

<div class="login-content">

    <div id="nameDiv1" class="input-div one focus ">
        <div class="i">
            <i class="fas fa-envelope"></i>
        </div>
        <div>
            <h5>إسم الصالون</h5>
            <input id="NameId1" class="input1" type="text" name="nameDiv1" value="<?php echo $name ?>"
                   required style="background: none; outline: none; border: none; position: relative; top: -5px;">
        </div>
    </div>

    <div id="webDiv1" class="input-div one focus ">
        <div class="i">
            <i class="fas fa-envelope"></i>
        </div>
        <div>
            <h5>صفحة التواصل الإجتماعي</h5>
            <input id="WebId1" class="input1" type="text" name="WebDiv1" value="<?php echo $page ?>"
                   required style="background: none; outline: none; border: none; position: relative; top: -5px;">
        </div>
    </div>

    <div id="emailDiv1" class="input-div two focus">
        <div class="i">
            <i class="fas fa-lock"></i>
        </div>
        <div>
            <h5 class="mar">البريد الإلكتروني</h5>
            <input id="emalDiv1" class="input1" type="text" name="emailDiv1" value="<?php echo $email ?>"
                   required style="background: none; outline: none; border: none; position: relative;top: -5px;">
        </div>
    </div>

    <div id="PhoneDiv1" class="input-div two focus">
        <div class="i">
            <i class="fas fa-lock"></i>
        </div>
        <div>
            <h5 class="mar">رقم الهاتف</h5>
            <input id="phonediv1" class="input1" type="text" name="phoneDiv1" value="<?php echo $phone ?>"
                   required style="background: none; outline: none; border: none; position: relative;top: -5px;">
        </div>
    </div>

</div>
