<?php
$Fname = $LName = $email = $gender = $birthday = $PhoneNum = $Pass1 = $Pass2 = $errorMSG = "";
$showError = "none";
if (!empty($_POST)) {
    if (isset($_POST['FName']) && isset($_POST['LName']) && isset($_POST['gender']) && isset($_POST['birthday']) && isset($_POST['email'])
        && isset($_POST['PhoneNum']) && isset($_POST['pass2']) && isset($_POST['pass1'])) {
        $Fname = test_input($_POST['FName']);
        $LName = test_input($_POST['LName']);
        $email = test_input($_POST['email']);
        $gender = test_input($_POST['gender']);
        $birthday = test_input($_POST['birthday']);
        $PhoneNum = test_input($_POST['PhoneNum']);
        $Pass1 = test_input($_POST['pass1']);
        $Pass2 = test_input($_POST['pass2']);

        $date = new DateTime($birthday);
        $now = new DateTime();

        if ($Pass1 != $Pass2) {
            $errorMSG = "كلمة المرور غير متطابقه";
            $showError = "block";
            echo '<script type="text/javascript" src="main3.js"></script>';
        } else if ($date > $now) {
            $errorMSG = "خطأ في تاريخ الميلاد";
            $showError = "block";
            echo '<script type="text/javascript" src="main3.js"></script>';
        } else {
            try {
                $user = 'root';
                $pass = '';
                $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
                $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $EmailFlag = 0;
                $res = $db->query("select Email from login");
                $sizeOfRes = $res->rowCount();
                for ($i = 0; $i < $sizeOfRes; $i++) {
                    $row = $res->fetch();
                    if ($email == $row[0]) {
                        $EmailFlag = 1;
                    }
                }
                if ($EmailFlag == 0) {
                    $res = $db->query("select CID from customer order by CID DESC");
                    $last = $res->fetch();
                    $lastID = $last[0];
                    $lastID = substr($lastID, 1);
                    $Id = $lastID + 1;
                    $formatted_value = sprintf("%010d", $Id);
                    $NewID = 'c' . $formatted_value;
                    $query = "insert into Customer values('" . $NewID . "', '" . $gender . "', '" . $birthday . "',  '" . $PhoneNum . "', '" . $email . "', '" . sha1($Pass1) . "')";
                    $result = $db->query($query);
                    if (!$result) {
                        $errorMSG = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                        $showError = "block";
                        echo '<script type="text/javascript" src="main3.js"></script>';
                    } else {
                        $query = "insert into customerfullname values('" . $NewID . "', '" . $Fname . "', '" . $LName . "')";
                        $result = $db->query($query);
                        if ($result) {
                            $query = "insert into login values('" . $email . "', '".sha1($Pass1)."', '" . $NewID . "', 'C')";
                            $result = $db->query($query);
                            echo '<script>alert("تم انشاء الحساب بنجاح!")</script>';
                            echo '<script> window.location.href = "index.php"; </script>';
                        } else {
                            $errorMSG = " حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                            $showError = "block";
                            echo '<script type="text/javascript" src="main3.js"></script>';
                        }
                    }
                }else {
                    $errorMSG = "البريد الالكتروني مستخدم سابقاً";
                    $showError = "block";
                    echo '<script type="text/javascript" src="main3.js"></script>';
                }
            } catch (PDOException $e) {
                $errorMSG = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                $showError = "block";
                echo '<script type="text/javascript" src="main3.js"></script>';
            }
        }
    } else {
        if (isset($_POST['FName'])) {
            $Fname = test_input($_POST['FName']);
        }
        if (isset($_POST['LName'])) {
            $LName = test_input($_POST['LName']);
        }
        if (isset($_POST['email'])) {
            $email = test_input($_POST['email']);
        }
        if (isset($_POST['gender'])) {
            $gender = test_input($_POST['gender']);
        }
        if (isset($_POST['birthday'])) {
            $birthday = test_input($_POST['birthday']);
        }
        if (isset($_POST['PhoneNum'])) {
            $PhoneNum = test_input($_POST['PhoneNum']);
        }
        if (isset($_POST['pass1'])) {
            $Pass1 = test_input($_POST['pass1']);
        }
        if (isset($_POST['pass2'])) {
            $Pass2 = test_input($_POST['pass2']);
        }
        $errorMSG = "الرجاء إدخال جميع الحقول";
        $showError = "block";
        echo '<script type="text/javascript" src="main3.js"></script>';
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
    <link rel="stylesheet" href="styles/style2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrap">

    <!--    <div class="describe welcome">-->
    <!--        <h1>أهلاً وسهلاً بك</h1>-->
    <!--        <p>منصة حلاقي أكبر منصه في الوطن العربي لصالونات الحلاقه</p>-->
    <!--    </div>-->
    <div class="exit" onclick="goindex()"><span><i class="fas fa-times"></i></span></div>
    <div class="login-content">
        <form action="sign-up-customer.php" method="post" name="form1">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 498.3 158.6">
                <title>halaqee4</title>
                <path d="M18.9,94.8c0,5.7-4.1,9.3-9.4,9.3S0,100.5,0,94.8a9,9,0,0,1,9.4-9.3C14.7,85.5,18.9,89.2,18.9,94.8Zm0,23.5a9,9,0,0,1-9.4,9.3c-5.3,0-9.5-3.7-9.5-9.3A9,9,0,0,1,9.4,109C14.7,109,18.9,112.6,18.9,118.3Zm126.7-16.1v12.4l-3.1,3.1c-17.3,0-24.1-11.5-29.3-23.7L101.5,67.2C93,69.1,82.9,74,82.9,81.3c0,12.9,24,30.8,24,40.6,0,19-19.9,36.8-51.8,36.7-21.4,0-33.4-6.4-33.4-6.4l4.1-14.5h1.4c5.5,1.7,14.8,5.3,31.4,5.3,15.6,0,27.7-5.9,35.3-14.7C84,115.8,66,98.4,66,83.9c.2-22.6,25.8-31.6,44.1-35.5l1.6.3,13.2,31.7C130.9,95.2,134.2,102.2,145.6,102.2Z"
                      style="fill:#bc8500"/>
                <path d="M230.5,42.4c-1.3,5.6-1.3,18.6-1.3,24.8v45.5l-.6,1.2c-6.3,2.5-15.8,3.7-29,3.7H142.3V105.2l3.1-3.1h25.4c-9-6.8-15.1-17.2-15.1-29.6,0-21.7,16.5-36.7,43-36.7,9.6,0,18.4,1.4,31.2,5.3Zm-18.9,60V64.3a74.12,74.12,0,0,1,.8-11.5,43.94,43.94,0,0,0-14.8-2.2c-15.1,0-24.4,8.8-24.4,21.4C173.1,87.8,187.3,101.6,211.6,102.4Zm-33.3-89c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C182.4,22.6,178.3,18.9,178.3,13.4Zm22.5-3c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C204.9,19.7,200.8,16.1,200.8,10.4Z"
                      style="fill:#3e3e3e"/>
                <path d="M382.5,102.2v12.4l-3.1,3.1H259.6v-1.4l5.4-14.1h34.7a52.92,52.92,0,0,1-1.3-11.9V33.9l16.2-2.2H316v70.4h27a52.92,52.92,0,0,1-1.3-11.9V2l16.4-2h1.3V102.2Z"
                      style="fill:#3e3e3e"/>
                <path d="M498.3,102v1.4l-4.9,14.2H379.3V105.1l3.2-3.1h69.2c-15.1-9.6-34.8-30.8-56.7-59.6l11.3-11.9h1.4c42.4,55,65.7,71.7,76.3,71.7Z"
                      style="fill:#3e3e3e"/>
            </svg>
            <div class="flname">
                <div id="fname" class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>الإسم الأول</h5>
                        <input class="input" type="text" name="FName" maxlength="20" value="<?php echo $Fname; ?>"
                               required>
                    </div>

                </div>

                <div id="lname" class="input-div two focus">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5 class="mar">الإسم الأخير</h5>
                        <input class="input" name="LName" type="text" maxlength="20" required
                               value="<?php echo $LName; ?>">
                    </div>
                </div>

            </div>


            <div class="radio-div">
                <div class="i">
                    <i class="fas fa-venus-mars"></i>
                </div>
                <div>
                    <h5>الجنس</h5>
                    <input type="radio" id="male" name="gender" value="M"
                        <?php if (isset($gender) && $gender == "M") echo "checked"; ?>>
                    <label for="male">ذكر</label>
                    <!--                    <br>-->

                    <input type="radio" id="female" name="gender"
                           value="F" <?php if (isset($gender) && $gender == "F") echo "checked"; ?>>
                    <label for="female">أنثى</label>
                    <br>
                </div>
            </div>

            <div id="date" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <div>
                    <h5>تاريخ الميلاد</h5>
                    <input class="input" type="date" name="birthday" id="birthday" required
                           value="<?php echo $birthday; ?>" min="1900-01-01" max=" <?php echo date("Y-m-d") ?>">
                </div>
            </div>

            <div id="emailDiv" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>البريد الإلكتروني</h5>
                    <input class="input" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                           required value="<?php echo $email; ?>">
                </div>
            </div>

            <div id="phoneNum" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-mobile"></i>
                </div>
                <div>
                    <h5>رقم الجوال </h5>
                    <input class="input" type="text" name="PhoneNum" pattern="\d{10}" maxlength="10"
                           title="Only number of 10 digits"
                           required value="<?php echo $PhoneNum; ?>">
                </div>
            </div>

            <div id="passDiv" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>كلمة المرور </h5>
                    <input class="input" type="password" pattern=".{8,}" name="pass1" title="Eight or more characters"
                           required maxlength="64" value="<?php echo $Pass1; ?>">
                </div>
            </div>

            <div id="rpassDiv" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>إعادة كلمة المرور</h5>
                    <input class="input" type="password" pattern=".{8,}" name="pass2" title="Eight or more characters"
                           required maxlength="64" value="<?php echo $Pass2; ?>">
                </div>
            </div>
            <input type="submit" class="btn" value="إنشاء حساب">
            <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
        </form>

    </div>


</div>
<script>
(function () {
   document.getElementById("fname").classList.remove('focus');
   document.getElementById("lname").classList.remove('focus');
   document.getElementById("date").classList.remove('focus');
   document.getElementById("emailDiv").classList.remove('focus');
   document.getElementById("phoneNum").classList.remove('focus');
   document.getElementById("passDiv").classList.remove('focus');
   document.getElementById("rpassDiv").classList.remove('focus');
})()
</script>
<script type="text/javascript" src="main3.js"></script>
</body>
</html>