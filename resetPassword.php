<?php
$errorMSG = "";
$showError = "none";
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $user = 'root';
    $pass = '';
    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
    //echo "<script>alert('". $email. "  ". $key ."')</script>";
    $res = $db->prepare("select * from password_reset_temp where Vkey=? and email=?");
    $res->execute([$key, $email]);
    if ($res->rowCount() == 0) {
        echo "<script>alert('الرابط خاطئ أو منتهي الصلاحية. ربما ادخلت الرابط الخاطئ في المتصفح أو انك استعملت هذا الرابط مسبقاً مما جعله يتعطل.')</script>";
        echo '<script> window.location.href = "index.php"; </script>';
    } else {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $expDate = $row['expDate'];
        if ($expDate <= $curDate) {
            echo "<script>alert('هذا الرابط منتهي الصلاحية. صلاحية الرابط تنتهي بعد يوم واحد من ارساله.')</script>";
            echo '<script> window.location.href = "index.php"; </script>';
        }
    }
}
if (isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")) {
    $pass1 = test_input($_POST['pass1']);
    $pass2 = test_input($_POST['pass2']);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1 != $pass2) {
        $errorMSG = "كلمات المرور غير متطابقة";
        $showError = "block";
    } else {
        $user = 'root';
        $pass = '';
        $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
        $res1 = $db->query("update login set Password ='" . sha1($pass1) . "' where Email = '" . $email . "'");
        $res2 = $db->query("select * from login where Email = '" . $email . "'");
        $count = $res2->rowCount();
        //echo "<script>alert('$count')</script>";
        $row = $res2->fetch(PDO::FETCH_ASSOC);
        $type = $row['Type'];
        if ($type == "C") {
            $res3 = $db->query("update customer set Password ='" . sha1($pass1) . "' where Email = '" . $email . "'");
        } else {
            $res3 = $db->query("update saloon set Password ='" . sha1($pass1) . "' where Email = '" . $email . "'");
        }
        echo "<script>alert('تم تغيير كلمة المرور. سيتم تحويلك للصفحة الرئيسية.')</script>";
        echo '<script> window.location.href = "index.php"; </script>';
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

?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حلاقي</title>
    <link rel="icon" href="imgs/halaqee4.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>
    <!--    <script type="text/javascript" src="main.js"></script>-->
</head>
<body>
<div class="wrap">
    <!--    <div class="exit" onclick="goindex()"><span><i class="fas fa-times"></i></span></div>-->
    <div class="login-content">
        <form action="" method="post" name="update">
            <input type="hidden" name="action" value="update"/>
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 498.3 158.6"><title>
                    halaqee4</title>
                <path d="M18.9,94.8c0,5.7-4.1,9.3-9.4,9.3S0,100.5,0,94.8a9,9,0,0,1,9.4-9.3C14.7,85.5,18.9,89.2,18.9,94.8Zm0,23.5a9,9,0,0,1-9.4,9.3c-5.3,0-9.5-3.7-9.5-9.3A9,9,0,0,1,9.4,109C14.7,109,18.9,112.6,18.9,118.3Zm126.7-16.1v12.4l-3.1,3.1c-17.3,0-24.1-11.5-29.3-23.7L101.5,67.2C93,69.1,82.9,74,82.9,81.3c0,12.9,24,30.8,24,40.6,0,19-19.9,36.8-51.8,36.7-21.4,0-33.4-6.4-33.4-6.4l4.1-14.5h1.4c5.5,1.7,14.8,5.3,31.4,5.3,15.6,0,27.7-5.9,35.3-14.7C84,115.8,66,98.4,66,83.9c.2-22.6,25.8-31.6,44.1-35.5l1.6.3,13.2,31.7C130.9,95.2,134.2,102.2,145.6,102.2Z"
                      style="fill:#bc8500"/>
                <path d="M230.5,42.4c-1.3,5.6-1.3,18.6-1.3,24.8v45.5l-.6,1.2c-6.3,2.5-15.8,3.7-29,3.7H142.3V105.2l3.1-3.1h25.4c-9-6.8-15.1-17.2-15.1-29.6,0-21.7,16.5-36.7,43-36.7,9.6,0,18.4,1.4,31.2,5.3Zm-18.9,60V64.3a74.12,74.12,0,0,1,.8-11.5,43.94,43.94,0,0,0-14.8-2.2c-15.1,0-24.4,8.8-24.4,21.4C173.1,87.8,187.3,101.6,211.6,102.4Zm-33.3-89c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C182.4,22.6,178.3,18.9,178.3,13.4Zm22.5-3c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C204.9,19.7,200.8,16.1,200.8,10.4Z"
                      style="fill:#3e3e3e"/>
                <path d="M382.5,102.2v12.4l-3.1,3.1H259.6v-1.4l5.4-14.1h34.7a52.92,52.92,0,0,1-1.3-11.9V33.9l16.2-2.2H316v70.4h27a52.92,52.92,0,0,1-1.3-11.9V2l16.4-2h1.3V102.2Z"
                      style="fill:#3e3e3e"/>
                <path d="M498.3,102v1.4l-4.9,14.2H379.3V105.1l3.2-3.1h69.2c-15.1-9.6-34.8-30.8-56.7-59.6l11.3-11.9h1.4c42.4,55,65.7,71.7,76.3,71.7Z"
                      style="fill:#3e3e3e"/>
            </svg>
            <h1 class="sendmalepara" style="font-size: 18px">قم بتعيين كلمة مرور جديده</h1>

            <div id="passDiv" class="input-div two focus">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5 class="mar">كلمة المرور</h5>
                    <input id="pass" class="input" type="password" name="pass1" onfocus="focusfunc()"
                           required>
                </div>
            </div>
            <div id="rpassDiv" class="input-div two focus">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5 class="mar">كلمة المرور مرة أخرى</h5>
                    <input id="rpass" class="input" type="password" name="pass2" onfocus="focusfunc()"
                           required>
                </div>
            </div>
            <input type="hidden" name="email" value="<?php echo $email;?>"/>
            <input type="submit" name="sendForgetMail" class="btn" value="إعادة تعيين">
            <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span
        </form>
    </div>
</div>
<script>(function () {
        document.getElementById("passDiv").classList.remove('focus');
        document.getElementById("rpassDiv").classList.remove('focus');
    })()</script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>