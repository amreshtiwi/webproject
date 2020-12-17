<?php
session_start();
$_SESSION['selection'] = "saloon";
$chosenFilter = $_SESSION['selection'];
$resultText = "";
if (!isset($_SESSION['CusID'])) {
    echo '<script> window.location.href = "index.php"; </script>';
} else {
    $ID = $_SESSION['UserID'];
    if (isset($_GET['click'])) {
        try {
            $user = 'root';
            $pass = '';
            $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
            $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $db->query("select * from saloon,salAddress where saloon.SID = salAddress.SID");
            $count = $res->rowCount();
            for ($i = 0; $i < $count; $i++) {
                $eachres = $res->fetch(PDO::FETCH_ASSOC);
                $SID = '"' . $eachres['SID'] . '"';
                $res2 = $db->query("select * from salAddress where SID = $SID");
                $address = $res2->fetch(PDO::FETCH_ASSOC);
                $resultText = $resultText . "<div class='card' onclick='showBookingDialog($SID)'><img src='images/" . $eachres['image'] . "' style='width:100%'/>
                <div class='container'> <p> " . $eachres['SalName'] . " <br> " . $eachres['PhoneNum'] . "<br>" . $address['Street'] . " - " . $address['City'] . "</p>  </div> </div>";
            }
        } catch (Exception $exception) {
        }
    }
    if (!empty($_POST)) {



            if (isset($_POST['filter'])) {
                $_SESSION['selection'] = $_POST['filter'];
                $chosenFilter = $_POST['filter'];
            }
            if (isset($_POST['searchText'])) {
                try {
                    $user = 'root';
                    $pass = '';
                    $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
                    $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $text = test_input($_POST['searchText']);
                    if ($chosenFilter == "saloon") {
                        $res = $db->query("select * from saloon where SalName like '%$text%'");//order by SalName, case SalName when like $text then 1 else 2 end");
                        if ($res->rowCount() == 0) {
                            $resultText = "لا يوجد نتائج";
                        } else {

                            $count = $res->rowCount();
                            for ($i = 0; $i < $res->rowCount(); $i++) {
                                $eachres = $res->fetch(PDO::FETCH_ASSOC);
                                if (strpos($eachres['SalName'], $text) !== false) {
                                    $SID = '"' . $eachres['SID'] . '"';
                                    $res2 = $db->query("select * from salAddress where SID = $SID");
                                    $address = $res2->fetch(PDO::FETCH_ASSOC);
                                    $resultText = $resultText . "<div class='card' onclick='showBookingDialog($SID)'><img src='images/" . $eachres['image'] . "' style='width:100%'/>
                <div class='container'> <p> " . $eachres['SalName'] . " <br> " . $eachres['PhoneNum'] . "<br>" . $address['Street'] . " - " . $address['City'] . "</p>  </div> </div>";
                                }
                            }

                        }
                    } else if ($chosenFilter == "city") {
                        $res = $db->query("select * from saloon,saladdress where saladdress.City like '%$text%' and saloon.SID = saladdress.SID");//order by SalName, case SalName when like $text then 1 else 2 end");
                        $count = $res->rowCount();
                        //echo "<script> alert('$count'); </script>";
                        if ($res->rowCount() == 0) {
                            $resultText = "لا يوجد نتائج";
                        } else {
                            for ($i = 0; $i < $res->rowCount(); $i++) {
                                $eachres = $res->fetch(PDO::FETCH_ASSOC);
                                if (strpos($eachres['City'], $text) !== false) {
                                    $SID = '"' . $eachres['SID'] . '"';
                                    $res2 = $db->query("select * from salAddress where SID = $SID");
                                    $address = $res2->fetch(PDO::FETCH_ASSOC);
                                    $resultText = $resultText . "<div class='card' onclick='showBookingDialog($SID)'><img src='images/" . $eachres['image'] . "' style='width:100%'/>
                <div class='container'> <p> " . $eachres['SalName'] . " <br> " . $eachres['PhoneNum'] . "<br>" . $address['Street'] . " - " . $address['City'] . "</p>  </div> </div>";
                                }
                            }
                        }
                    } else if ($chosenFilter == "service") {
                        $res = $db->query("select * from saloon,services where services.service like '%$text%' and saloon.SID = services.SID");//order by SalName, case SalName when like $text then 1 else 2 end");
                        $count = $res->rowCount();
                        //echo "<script> alert('$count'); </script>";
                        if ($res->rowCount() == 0) {
                            $resultText = "لا يوجد نتائج";
                        } else {
                            for ($i = 0; $i < $res->rowCount(); $i++) {
                                $eachres = $res->fetch(PDO::FETCH_ASSOC);
                                if (strpos($eachres['Service'], $text) !== false) {
                                    $SID = '"' . $eachres['SID'] . '"';
                                    $res2 = $db->query("select * from salAddress where SID = $SID");
                                    $address = $res2->fetch(PDO::FETCH_ASSOC);
                                    $resultText = $resultText . "<div class='card' onclick='showBookingDialog($SID)'><img src='images/" . $eachres['image'] . "' style='width:100%'/>
                <div class='container'> <p> " . $eachres['SalName'] . " <br> " . $eachres['PhoneNum'] . "<br>" . $address['Street'] . " - " . $address['City'] . "</p>  </div> </div>";
                                }
                            }
                        }
                    }
                } catch (PDOException $e) {

                }
            }
        }
}
if (isset($_POST['logout'])) {
    session_destroy();
    echo '<script> window.location.href = "index.php"; </script>';
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
    <link rel="stylesheet" href="styles/style3.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".default_option").click(function () {
                $(".dropdown ul").addClass("active");
            });

            $(".dropdown ul li").click(function () {
                var text = $(this).text();
                $(".default_option").text(text);
                $(".dropdown ul").removeClass("active");
            });
        });
    </script>
</head>
<body>
<div class="header">
    <h1>أهلاً وسهلاً بك في<span><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 498.3 158.6"><title>halaqee4</title><path
                        d="M18.9,94.8c0,5.7-4.1,9.3-9.4,9.3S0,100.5,0,94.8a9,9,0,0,1,9.4-9.3C14.7,85.5,18.9,89.2,18.9,94.8Zm0,23.5a9,9,0,0,1-9.4,9.3c-5.3,0-9.5-3.7-9.5-9.3A9,9,0,0,1,9.4,109C14.7,109,18.9,112.6,18.9,118.3Zm126.7-16.1v12.4l-3.1,3.1c-17.3,0-24.1-11.5-29.3-23.7L101.5,67.2C93,69.1,82.9,74,82.9,81.3c0,12.9,24,30.8,24,40.6,0,19-19.9,36.8-51.8,36.7-21.4,0-33.4-6.4-33.4-6.4l4.1-14.5h1.4c5.5,1.7,14.8,5.3,31.4,5.3,15.6,0,27.7-5.9,35.3-14.7C84,115.8,66,98.4,66,83.9c.2-22.6,25.8-31.6,44.1-35.5l1.6.3,13.2,31.7C130.9,95.2,134.2,102.2,145.6,102.2Z"
                        style="fill:#bc8500"/><path
                        d="M230.5,42.4c-1.3,5.6-1.3,18.6-1.3,24.8v45.5l-.6,1.2c-6.3,2.5-15.8,3.7-29,3.7H142.3V105.2l3.1-3.1h25.4c-9-6.8-15.1-17.2-15.1-29.6,0-21.7,16.5-36.7,43-36.7,9.6,0,18.4,1.4,31.2,5.3Zm-18.9,60V64.3a74.12,74.12,0,0,1,.8-11.5,43.94,43.94,0,0,0-14.8-2.2c-15.1,0-24.4,8.8-24.4,21.4C173.1,87.8,187.3,101.6,211.6,102.4Zm-33.3-89c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C182.4,22.6,178.3,18.9,178.3,13.4Zm22.5-3c0-5.6,4.1-9.3,9.5-9.3s9.5,3.7,9.5,9.3-3.9,9.3-9.5,9.3C204.9,19.7,200.8,16.1,200.8,10.4Z"
                        style="fill:#3e3e3e"/><path
                        d="M382.5,102.2v12.4l-3.1,3.1H259.6v-1.4l5.4-14.1h34.7a52.92,52.92,0,0,1-1.3-11.9V33.9l16.2-2.2H316v70.4h27a52.92,52.92,0,0,1-1.3-11.9V2l16.4-2h1.3V102.2Z"
                        style="fill:#3e3e3e"/><path
                        d="M498.3,102v1.4l-4.9,14.2H379.3V105.1l3.2-3.1h69.2c-15.1-9.6-34.8-30.8-56.7-59.6l11.3-11.9h1.4c42.4,55,65.7,71.7,76.3,71.7Z"
                        style="fill:#3e3e3e"/></svg>
</span></h1>
    <form action="customer-page.php" method="post">
        <div class="search_box">
            <div class="dropdown">

                <select name="filter" id="filter">
                    <option value="saloon" <?php if ($chosenFilter == "saloon") echo 'selected'; ?>>اسم الصالون</option>
                    <option value="city" <?php if ($chosenFilter == "city") echo 'selected'; ?>>في المدينة</option>
                    <option value="service" <?php if ($chosenFilter == "service") echo 'selected'; ?>>خدمة</option>
                </select>
            </div>

            <div class="search_field">
                <input type="text" name="searchText" id="searchText" class="input" placeholder="ابحث عن صالونك المفضل">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </form>
</div>

<!--ناف بار الي بالزاويه-->
<div class="navbar">
    <ul>
        <form method="post" action="customer-page.php?click=0">
            <li><a><input type="submit" name="home" id="home" value=""><label for="home"><i
                                class="fas fa-home"></i></label> </a></li>
        </form>
        <li><a href="#" onclick="showDialog()"><i class="far fa-clock"></i></a></li>
        <li><a href="#" onclick="showDialog2()"><i class="fas fa-cog"></i></a></li>
        <li><a href="#" onclick="showDialog1()"><i class="fas fa-sign-out-alt"></i></a></li>
    </ul>

</div>
<!--انتهاء الناف بار-->
<div id="white-background"></div>

<!--ديالوج حجز الوقت-->
<div id="dlgbox" class="dlgbox">
    <div id="dlg-header" class="dlg-header">
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
    </div>

    <div id="dlg-body" class="dlg-body">Do you want to continue?</div>

    <div id="dlg-footer" class="dlg-footer">
        <button onclick="dlgOK()">OK</button>
        <button onclick="dlgCancel()">Cancel</button>
    </div>
</div>
<!--انتهاء ديالوج حجز الوقت-->
<!--ديالوج تسجيل الخروج-->
<div id="dlgbox1" class="dlgbox">
    <div id="dlg-header1" class="dlg-header">
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
    </div>


    <div id="dlg-body1" class="dlg-body">هل حقاً تود الخروج؟</div>

    <div id="dlg-footer1" class="dlg-footer">
        <form action="?" method="post">
            <input type="submit" name="logout" value="تسجيل الخروج">
        </form>
        <button onclick="dlgCancel1()">إلغاء</button>
    </div>


</div>
<!--انتهاء ديالوج تسجيل الخروج-->
<!--ديالوج الاعدادات -->
<div id="dlgbox2" class="dlgbox">
    <div id="dlg-header2" class="dlg-header">
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
    </div>

    <div id="dlg-body2" class="dlg-body">
        <div class="navbar1">
            <ul>
                <li><a href="#" onclick="changePassDialog()">تغير كلمة المرور </i></a></li>
                <li><a href="#" onclick="infoDialog()">البيانات الشخصيه</a></li>
                <li><a href="#" onclick="deleteDialog()">حذف حساب</a></li>
            </ul>

        </div>
    </div>

    <div id="dlg-footer2" class="dlg-footer">
        <button onclick="dlgOK2()">حسناً</button>
        <button onclick="dlgCancel2()">إلغاء</button>
    </div>
</div>
<!--انتهاء ديالوج الاعدادات-->
<!-- ديالوج تغير كلمة السر-->
<div id="dlgbox3" class="dlgbox">
    <div class="dlg-header">
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
    </div>

    <div class="dlg-body">
        <form action="logIn.php" method="post">

            <div id="emailDiv" class="input-div one focus ">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>كلمة المرور القديمه</h5>
                    <input id="emailid" class="input" type="text">
                </div>
            </div>

            <div id="passDiv" class="input-div two focus">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5 class="mar">كلمة المرور الجديده</h5>
                    <input id="pass" class="input" type="password">
                </div>
            </div>

            <div id="rrpassDiv" class="input-div two focus">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5 class="mar">إعادة كلمة المرور</h5>
                    <input id="rpass" class="input" type="password">
                </div>
            </div>

        </form>
    </div>

    <div class="dlg-footer">
        <button onclick="dlgOK3()">حسناً</button>
        <button onclick="dlgCancel3()">إلغاء</button>
    </div>
</div>
<!--انتهاء ديالوج تغير كلمة المرور -->

<!-- ديالوج البيانات الشخصيه-->
<div id="dlgbox4" class="dlgbox">
    <div class="dlg-header">
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
    </div>

    <div class="dlg-body">

    </div>

    <div class="dlg-footer">
        <button onclick="dlgOK4()">حسناً</button>
        <button onclick="dlgCancel4()">إلغاء</button>
    </div>
</div>
<!--انتهاء ديالوج البيانات -->

<!--ديالوج حذف الحساب -->
<div id="dlgbox5" class="dlgbox">
    <div class="dlg-header">
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
    </div>

    <div class="dlg-body">
        هل تود حقاً حذف حسابك ؟
    </div>

    <div class="dlg-footer">
        <button class="delete_account" onclick="dlgOK5()">حذف حسابي</button>
        <button onclick="dlgCancel5()">إلغاء</button>
    </div>
</div>
<!--إنتهاء ديالوج حذف الحساب -->
<!--ديالوج حجز الوقت-->
<div id="dlgBookingBox" class="dlgbox">
    <div class="dlg-header">
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
    </div>

    <div class="dlg-body">
        <h1>احجز موعدك الأن قبل فوات الأوان</h1>
        <br>
        <br>
        <label for="selectServ">اختر الخدمه المتوفره:</label>
        <select id="selectServ" class="select">
            <option disabled selected>الخدمه</option>
        </select>

        <label for="selectday">أي يوم :</label>
        <select id="selectday" class="select">
            <option disabled selected>اليوم</option>
            <option>الأحد</option>
            <option>الإثنين</option>
            <option>الثلاثاء</option>
            <option>الأربعاء</option>
            <option>الخميس</option>
            <option>الجمعه</option>
            <option>السبت</option>
        </select>
        <br>
        <label for="selecttime">ماذا عن الوقت؟</label>
        <input type="time" id="selecttime">

    </div>

    <div class="dlg-footer">
        <button onclick="dlgBooking()">حجز</button>
        <button onclick="dlgCancelBooking()">إلغاء</button>
    </div>
</div>
<!--انتهاء ديالوج حجز الوقت-->
<div class="wrap">
    <!--    start-->
    <!--    <div class="card" onclick="showBookingDialog()">-->
    <!--        <img src="imgs/img1.jpg" alt="Avatar" >-->
    <!--        <div class="container">-->
    <!--            <h4><b>عمرو شتيوي</b></h4>-->
    <!--            <p>هندسة حاسوب</p>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--      start-->
    <?php echo $resultText; ?>
</div>
<script type="text/javascript" src="main.js"></script>
<!--<script type="text/javascript" src="main2.js"></script>-->
</body>
</html>