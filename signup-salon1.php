<?php
session_start();
$errorMSG = $_SESSION['errorMSGPage2'];
$showError = $_SESSION['showErrorPage2'];
$SID = $_SESSION['SID'];
$City = $_SESSION['City'];
$Street = $_SESSION['Street'];
$website = $_SESSION['website'];


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
<body id="bodyid">
<div class="wrap">
    <div class="exit" onclick="goback()"><span><i class="fas fa-times"></i></span></div>
    <div class="login-content1" id="login-content1">
        <form action="SignUpSaloonProcess.php" method="post">
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
            <!--رخصة الصالون-->
            <div id="license_salon" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-registered"></i>
                </div>
                <div>
                    <h5>رخصة الصالون</h5>
                    <input class="input" type="text" name="SID" value="<?php echo $SID; ?>" maxlength="11">
                </div>
            </div>
            <!--     الموقع-->
            <div class="flname">
                <div id="city" class="input-div one focus">
                    <div class="i">
                        <i class="fas fa-city"></i>
                    </div>
                    <div>
                        <h5>المدينه</h5>
                        <input class="input" type="text" name="City" maxlength="20" value="<?php echo $City; ?>">
                    </div>

                </div>

                <div id="street" class="input-div two focus">
                    <div class="i">
                        <i class="fas fa-road"></i>
                    </div>
                    <div>
                        <h5 class="mar">الشارع</h5>
                        <input class="input" type="text" maxlength="50" name="Street" value="<?php echo $Street; ?>">
                    </div>
                </div>

            </div>
            <!-- موقع الويب -->

            <div id="website" class="input-div  focus ">
                <div class="i">
                    <i class="fas fa-globe"></i>
                </div>
                <div>
                    <h5>صفحة التواصل الإجتماعي</h5>
                    <input class="input" type="url" maxlength="100" name="website" pattern="https://.*"
                           value="<?php echo $website; ?>">
                </div>
            </div>


            <input type="submit" name="Page2" class="btn" value="التالي">
            <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
        </form>
    </div>
</div>
<script>
    (function(){
    document.getElementById("license_salon").classList.remove('focus');
    document.getElementById("city").classList.remove('focus');
    document.getElementById("street").classList.remove('focus');
    document.getElementById("website").classList.remove('focus');
    })()
</script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>