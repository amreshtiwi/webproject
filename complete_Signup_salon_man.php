<?php
session_start();
//$image = $_SESSION['Image'];
$Days = $_SESSION['Days'];
$services = $_SESSION['ServicesMale'];
$start = $_SESSION['start'];
$end = $_SESSION['end'];
$showError = $_SESSION['showErrorPage3'];
$errorMSG = $_SESSION['errorMSGPage3'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>حلاقي</title>
    <link rel="icon" href="imgs/halaqee4.png">
    <link rel="stylesheet" href="styles/style4.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrap">
    <div class="backbtn" onclick="goback()">
        <a>رجوع</a><span><i class="fas fa-chevron-right"></i></span>
    </div>
    <form action="SignUpSaloonProcess.php" method="post" enctype="multipart/form-data">
        <div class="complete_sign">
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

            <div class="profile-pic-div">
                <img src="imgs/avatar-man.png" id="photo">
                <input type="file" id="file" name="photo">
                <label for="file" id="uploadeBtn">إختر صوره</label>
            </div>

        </div>
        <div class="services1">
            <div>
                <h6>إختر أيام دوامك</h6>
            </div>
            <div class="services-container">
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Sat" <?php if ($Days[0] == 1) echo 'checked'; ?>>
                        <span>السبت</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Sun" <?php if ($Days[1] == 1) echo 'checked'; ?>>
                        <span>الأحد</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Mon" <?php if ($Days[2] == 1) echo 'checked'; ?>>
                        <span>الإثنين</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Tue" <?php if ($Days[3] == 1) echo 'checked'; ?>>
                        <span>الثلاثاء</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Wed" <?php if ($Days[4] == 1) echo 'checked'; ?>>
                        <span>الأربعاء</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Thu" <?php if ($Days[5] == 1) echo 'checked'; ?>>
                        <span>الخميس</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Days[]" value="Fri" <?php if ($Days[6] == 1) echo 'checked'; ?>>
                        <span>الجمعه</span>
                    </label>
                </div>
            </div>
            <div class="flname">
                <div id="to_time" class="input-div one focus">
                    <div class="i">
                        <!--                    <i class="fas fa-city"></i>-->
                    </div>
                    <div>
                        <h5>إلى</h5>
                        <input class="input" type="time" name="end" value="<?php echo $end; ?>">
                    </div>

                </div>

                <div id="from_time" class="input-div two focus">
                    <div class="i">
                        <!--                    <i class="fas fa-road"></i>-->
                    </div>
                    <div>
                        <h5 class="mar">من</h5>
                        <input class="input" type="time" name="start" value="<?php echo $start; ?>">
                    </div>
                </div>

            </div>
        </div>


        <div class="services">
            <div>
                <h5>إختر الخدمات المتوفره في صالونك</h5>
            </div>
            <div class="services-container">
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="hairCut" <?php if ($services[0] == 1) echo 'checked'; ?>>
                        <span>قص شعر</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="SkinCare" <?php if ($services[1] == 1) echo 'checked'; ?>>
                        <span>تنظيف بشره</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="Dye" <?php if ($services[2] == 1) echo 'checked'; ?>>
                        <span>صبغه</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="Mesh" <?php if ($services[3] == 1) echo 'checked'; ?> >
                        <span>ميش</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="Protein" <?php if ($services[4] == 1) echo 'checked'; ?>>
                        <span>بروتين</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="Beard" <?php if ($services[5] == 1) echo 'checked'; ?>>
                        <span>لحيه</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="String" <?php if ($services[6] == 1) echo 'checked'; ?>>
                        <span>تنظيف بالخيط</span>
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="Services[]"
                               value="Tamlees" <?php if ($services[7] == 1) echo 'checked'; ?>>
                        <span>تمليس</span>
                    </label>
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn2" name="Page3" value="التالي">
                <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
            </div>
        </div>
    </form>
</div>
<script src="main4.js"></script>
<script src="main.js"></script>
</body>
</html>