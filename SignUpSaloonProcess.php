<?php
session_start();
if (isset($_POST['Page1'])) {
    //echo '<script>alert("Page1");</script>';
    $SalName = $Gender = $email = $phone = $pass1 = $pass2 = "";
    if (isset($_POST['SalName']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['pass1']) && isset($_POST['pass2'])
        && $_POST['SalName'] != "" && $_POST['gender'] != "" && $_POST['email'] != "" && $_POST['phone'] != "" && $_POST['pass1'] != "" && $_POST['pass2'] != "") {
        $SalName = test_input($_POST['SalName']);
        $Gender = test_input($_POST['gender']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $pass1 = test_input($_POST['pass1']);
        $pass2 = test_input($_POST['pass2']);
        // echo '<script> alert("'.$Gender.'"); </script>';
        if ($pass1 == $pass2) {
            $_SESSION['SalName'] = $SalName;
            $_SESSION['Gender'] = $Gender;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['pass1'] = $pass1;
            $_SESSION['pass2'] = $pass2;
            $EmailFlag = 0;
            try {
                $user = 'root';
                $pass = '';
                $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
                $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $db->query("select Email from login");
                $sizeOfRes = $res->rowCount();
                for ($i = 0; $i < $sizeOfRes; $i++) {
                    $row = $res->fetch();
                    if ($email == $row[0]) {
                        $EmailFlag = 1;
                    }
                }
                if ($EmailFlag == 0) {
                    $_SESSION['errorMSGPage1'] = "";
                    $_SESSION['showErrorPage1'] = "none";
                    echo '<script> window.location.href = "signup-salon1.php?click=0"; </script>';
                } else {
                    $_SESSION['errorMSGPage1'] = "البريد الالكتروني مستخدم سابقاً";
                    $_SESSION['showErrorPage1'] = "block";
                    echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
                    echo '<script type="text/javascript" src="main3.js"></script>';
                }
            } catch (PDOException $e) {
                $_SESSION['errorMSGPage1'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                $_SESSION['showErrorPage1'] = "block";
                echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
                echo '<script type="text/javascript" src="main3.js"></script>';
            }
        } else {
            setValPage1();
            $_SESSION['errorMSGPage1'] = "كلمات المرور غير متطابقة";
            $_SESSION['showErrorPage1'] = "block";
            // echo '<script type="text/javascript" src="main3.js"></script>';
            echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
        }
    } else {
        setValPage1();
        $_SESSION['errorMSGPage1'] = "الرجاء إدخال جميع الحقول";
        $_SESSION['showErrorPage1'] = "block";
        // echo '<script type="text/javascript" src="main3.js"></script>';
        echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
    }
} elseif (isset($_POST['Page2'])) {
    $SID = $City = $Street = $website = $Days = "";
    if (isset($_POST['SID']) && isset($_POST['City']) && isset($_POST['Street'])
        && $_POST['SID'] != "" && $_POST['City'] != "" && $_POST['Street'] != "") {
        $SID = test_input($_POST['SID']);
        $City = test_input($_POST['City']);
        $Street = test_input($_POST['Street']);
        if (isset($_POST['website'])) {
            $website = test_input($_POST['website']);
        } else {
            $website = null;
        }
        $_SESSION['SID'] = $SID;
        $_SESSION['City'] = $City;
        $_SESSION['Street'] = $Street;
        $_SESSION['website'] = $website;
        // echo '<script> alert("'.$_SESSION['Gender'].'"); </script>';
        $SalIDFlag = 0;
        try {
            $user = 'root';
            $pass = '';
            $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
            $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $res = $db->query("select SID from saloon");
            $sizeOfRes = $res->rowCount();
            for ($i = 0; $i < $sizeOfRes; $i++) {
                $row = $res->fetch();
                if ($SID == $row[0]) {
                    $SalIDFlag = 1;
                }
            }
            if ($SalIDFlag == 0) {
                $_SESSION['errorMSGPage2'] = "";
                $_SESSION['showErrorPage2'] = "none";
                if ($_SESSION['Gender'] == 'M') {
                    echo '<script> window.location.href = "complete_Signup_salon_man.php?click=0"; </script>';
                } else {
                    echo '<script> window.location.href = "complete_Signup_salon_woman.php?click=0"; </script>';
                }
            } else {
                $_SESSION['errorMSGPage2'] = "رخصة الصالون مسجلة سابقاً";
                $_SESSION['showErrorPage2'] = "block";
                echo '<script> window.location.href = "signup-salon1.php?click=1"; </script>';
                echo '<script type="text/javascript" src="main3.js"></script>';
            }
        } catch (PDOException $e) {
            $_SESSION['errorMSGPage2'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
            $_SESSION['showErrorPage2'] = "block";
            echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
            echo '<script type="text/javascript" src="main3.js"></script>';
        }
        //echo '<script>alert("Page2");</script>';
    } else {
        setValPage2();
        $_SESSION['errorMSGPage2'] = "الرجاء إدخال جميع الحقول";
        $_SESSION['showErrorPage2'] = "block";
        // echo '<script type="text/javascript" src="main3.js"></script>';
        echo '<script> window.location.href = "signup-salon1.php?click=1"; </script>';
    }
} elseif (isset($_POST['Page3'])) {
    $image = $start = $end = "";
    $Days = "";
    $services = "";
    $target = "";
    if (isset($_POST['start']) && isset($_POST['end']) && !empty($_POST['Days']) && !empty($_POST['Services'])) {
        $image = $_FILES['photo']['name'];
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = $_SESSION['SID'].'.'.$ext;
            $target = "./images/" . $image_name;
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                $_SESSION['Image'] = null;

            }else {
                $_SESSION['Image'] = $image_name;
            }
        }else {
            $_SESSION['Image'] = null;
        }
        $start = $_POST['start'];
        $end = $_POST['end'];
        $Days = DaysParse($_POST['Days']);
        $services = SerParse($_POST['Services']);
        setValPage3();
        echo '<script> window.location.href = "ServicesPricesMale.php"; </script>';
    } else {
        if (empty($_POST['Days'])) {
            $_SESSION['errorMSGPage3'] = "الرجاء إدخال يوم واحد على الأقل";
            $_SESSION['showErrorPage3'] = "block";
        } elseif ($_POST['end'] == "") {
            $_SESSION['errorMSGPage3'] = "الرجاء إدخال وقت نهاية الدوام";
            $_SESSION['showErrorPage3'] = "block";
        } else if ($_POST['start'] == "") {
            $_SESSION['errorMSGPage3'] = "الرجاء إدخال وقت بداية الدوام";
            $_SESSION['showErrorPage3'] = "block";
        } elseif (empty($_POST['Services'])) {
            $_SESSION['errorMSGPage3'] = "الرجاء إدخال خدمة واحدة على الأقل";
            $_SESSION['showErrorPage3'] = "block";
        }
        setValPage3();
        // echo '<script type="text/javascript" src="main3.js"></script>';
        echo '<script> window.location.href = "complete_Signup_salon_man.php"; </script>';
    }

}
elseif (isset($_POST['Page4'])) {
    $image = $start = $end = "";
    $Days = "";
    $services = "";
    if (isset($_POST['start']) && isset($_POST['end']) && !empty($_POST['Days']) && !empty($_POST['Services'])) {
        $image = $_FILES['photo']['name'];
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = $_SESSION['SID'].'.'.$ext;
            $target = "./images/" . $image_name;
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                $_SESSION['Image'] = null;
                echo "<script>alert('Hi');</script>";

            }else {
                $_SESSION['Image'] = $image_name;
            }
        }else {
            $_SESSION['Image'] = null;
            echo "<script>alert('Hello');</script>";
        }
        $start = $_POST['start'];
        $end = $_POST['end'];
        $Days = DaysParse($_POST['Days']);
        $services = SerParse1($_POST['Services']);
        setValPage4();
        echo '<script> window.location.href = "ServicePricesFemale.php"; </script>';
    } else {
        if (empty($_POST['Days'])) {
            $_SESSION['errorMSGPage4'] = "الرجاء إدخال يوم واحد على الأقل";
            $_SESSION['showErrorPage4'] = "block";
        } elseif ($_POST['end'] == "") {
            $_SESSION['errorMSGPage4'] = "الرجاء إدخال وقت نهاية الدوام";
            $_SESSION['showErrorPage4'] = "block";
        } else if ($_POST['start'] == "") {
            $_SESSION['errorMSGPage4'] = "الرجاء إدخال وقت بداية الدوام";
            $_SESSION['showErrorPage4'] = "block";
        } elseif (empty($_POST['Services'])) {
            $_SESSION['errorMSGPage4'] = "الرجاء إدخال خدمة واحدة على الأقل";
            $_SESSION['showErrorPage4'] = "block";
        }
        setValPage4();
        // echo '<script type="text/javascript" src="main3.js"></script>';
        echo '<script> window.location.href = "complete_Signup_salon_woman.php"; </script>';
    }
} elseif (isset($_POST['Page5'])) {
    $Serflag = 0;
    $Serflag1 = 0;
    $ServicesPrices = array(-1, -1, -1, -1, -1, -1, -1, -1);
    $Pricesflag = array(-1, -1, -1, -1, -1, -1, -1, -1);
    if (isset($_POST['hairCut']))
        if ($_POST['hairCut'] != "") {
            $ServicesPrices[0] = $_POST['hairCut'];
            $Pricesflag[0] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['skin']))
        if ($_POST['skin'] != "") {
            $ServicesPrices[1] = $_POST['skin'];
            $Pricesflag[1] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['Dye']))
        if ($_POST['Dye'] != "") {
            $ServicesPrices[2] = $_POST['Dye'];
            $Pricesflag[2] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['mesh']))
        if ($_POST['mesh'] != "") {
            $ServicesPrices[3] = $_POST['mesh'];
            $Pricesflag[3] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['protein']))
        if ($_POST['protein'] != "") {
            $ServicesPrices[4] = $_POST['protein'];
            $Pricesflag[4] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['beard']))
        if ($_POST['beard'] != "") {
            $ServicesPrices[5] = $_POST['beard'];
            $Pricesflag[5] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['String']))
        if ($_POST['String'] != "") {
            $ServicesPrices[6] = $_POST['String'];
            $Pricesflag[6] = 1;
        } else {
            $Serflag = 1;
        }

    if (isset($_POST['tamlees']))
        if ($_POST['tamlees'] != "") {
            $ServicesPrices[7] = $_POST['tamlees'];
            $Pricesflag[7] = 1;
        } else {
            $Serflag = 1;
        }


    for ($i = 0; $i < count($Pricesflag); $i++) {
        if ($Pricesflag[$i] == 1) {
            if ($ServicesPrices[$i] < 0 || $ServicesPrices[$i] > 999.99) {
                $Serflag1 = 11;
            }
        }
    }
    if ($Serflag == 1) {
        $_SESSION['errorMSGPage5'] = "الرجاء إدخال جميع الاسعار";
        $_SESSION['showErrorPage5'] = "block";
        $_SESSION['PricesMale'] = $ServicesPrices;
        echo '<script> window.location.href = "ServicesPricesMale.php"; </script>';
    } elseif ($Serflag1 == 11) {
        $_SESSION['errorMSGPage5'] = "الرجاء إدخال قيم صحيحة";
        $_SESSION['showErrorPage5'] = "block";
        $_SESSION['PricesMale'] = $ServicesPrices;
        echo '<script> window.location.href = "ServicesPricesMale.php"; </script>';
    } else {
        // echo '<script>alert("success");</script>';
        $_SESSION['PricesMale'] = $ServicesPrices;
        InsertSalTable();
    }
} elseif (isset($_POST['Page6'])) {
    $SerflagF = 0;
    $SerflagF1 = 0;
    $ServicesPrices1 = array(-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1);
    $Pricesflag1 = array(-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1);
    if (isset($_POST['hairCut']))
        if ($_POST['hairCut'] != "") {
            $ServicesPrices1[0] = $_POST['hairCut'];
            $Pricesflag1[0] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['dryer']))
        if ($_POST['dryer'] != "") {
            $ServicesPrices1[1] = $_POST['dryer'];
            $Pricesflag1[1] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['wax']))
        if ($_POST['wax'] != "") {
            $ServicesPrices1[2] = $_POST['wax'];
            $Pricesflag1[2] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['eyebrows']))
        if ($_POST['eyebrows'] != "") {
            $ServicesPrices1[3] = $_POST['eyebrows'];
            $Pricesflag1[3] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['laser']))
        if ($_POST['laser'] != "") {
            $ServicesPrices1[4] = $_POST['laser'];
            $Pricesflag1[4] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['highlight']))
        if ($_POST['highlight'] != "") {
            $ServicesPrices1[5] = $_POST['highlight'];
            $Pricesflag1[5] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['style']))
        if ($_POST['style'] != "") {
            $ServicesPrices1[6] = $_POST['style'];
            $Pricesflag1[6] = 1;
        } else {
            $SerflagF = 1;
        }

    if (isset($_POST['pedicure']))
        if ($_POST['pedicure'] != "") {
            $ServicesPrices1[8] = $_POST['pedicure'];
            $Pricesflag1[8] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['manicure']))
        if ($_POST['manicure'] != "") {
            $ServicesPrices1[9] = $_POST['manicure'];
            $Pricesflag1[9] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['skin']))
        if ($_POST['skin'] != "") {
            $ServicesPrices1[10] = $_POST['skin'];
            $Pricesflag1[10] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['dye']))
        if ($_POST['dye'] != "") {
            $ServicesPrices1[11] = $_POST['dye'];
            $Pricesflag1[11] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['mesh']))
        if ($_POST['mesh'] != "") {
            $ServicesPrices1[12] = $_POST['mesh'];
            $Pricesflag1[12] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['oil']))
        if ($_POST['oil'] != "") {
            $ServicesPrices1[13] = $_POST['oil'];
            $Pricesflag1[13] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['protein']))
        if ($_POST['protein'] != "") {
            $ServicesPrices1[14] = $_POST['protein'];
            $Pricesflag1[14] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['String']))
        if ($_POST['String'] != "") {
            $ServicesPrices1[15] = $_POST['String'];
            $Pricesflag1[15] = 1;
        } else {
            $SerflagF = 1;
        }
    if (isset($_POST['keratin']))
        if ($_POST['keratin'] != "") {
            $ServicesPrices1[16] = $_POST['keratin'];
            $Pricesflag1[16] = 1;
        } else {
            $SerflagF = 1;
        }


    for ($i = 0; $i < count($Pricesflag1); $i++) {
        if ($Pricesflag1[$i] == 1) {
            if ($ServicesPrices1[$i] < 0 || $ServicesPrices1[$i] > 999.99) {
                $SerflagF1 = 11;
            }
        }

    }
    if ($SerflagF == 1) {
        $_SESSION['errorMSGPage6'] = "الرجاء إدخال جميع الاسعار";
        $_SESSION['showErrorPage6'] = "block";
        $_SESSION['PricesFemale1'] = $ServicesPrices1;
        echo '<script> window.location.href = "ServicePricesFemale.php"; </script>';
    } elseif ($SerflagF1 == 11) {
        $_SESSION['errorMSGPage6'] = "الرجاء إدخال قيم صحيحة";
        $_SESSION['showErrorPage6'] = "block";
        $_SESSION['PricesFemale1'] = $ServicesPrices1;
        echo '<script> window.location.href = "ServicePricesFemale.php"; </script>';
    } else {
        // echo '<script>alert("success");</script>';
        $_SESSION['PricesFemale1'] = $ServicesPrices1;
        InsertSalTable1();
    }
}


function setValPage1()
{
    // $_SESSION['SalName'] = $_SESSION['Gender'] = $_SESSION['email'] = $_SESSION['phone'] = $_SESSION['pass1'] = $_SESSION['pass2'] = "";
    if ($_POST['SalName'] != "") {
        $SalName = test_input($_POST['SalName']);
        $_SESSION['SalName'] = $SalName;
    } else {
        $_SESSION['SalName'] = "";
    }
    if ($_POST['gender'] != "") {
        $Gender = test_input($_POST['gender']);
        $_SESSION['Gender'] = $Gender;
    } else {
        $_SESSION['gender'] = "";
    }
    if ($_POST['email'] != "") {
        $email = test_input($_POST['email']);
        $_SESSION['email'] = $email;
    } else {
        $_SESSION['email'] = "";
    }
    if ($_POST['phone'] != "") {
        $phone = test_input($_POST['phone']);
        $_SESSION['phone'] = $phone;
    } else {
        $_SESSION['phone'] = "";
    }
    if ($_POST['pass1'] != "") {
        $pass1 = test_input($_POST['pass1']);
        $_SESSION['pass1'] = $pass1;
    } else {
        $_SESSION['pass1'] = "";
    }
    if ($_POST['pass2'] != "") {
        $pass2 = test_input($_POST['pass2']);
        $_SESSION['pass2'] = $pass2;
    } else {
        $_SESSION['pass2'] = "";
    }
}

function setValPage2()
{
    if ($_POST['SID'] != "") {
        $SID = test_input($_POST['SID']);
        $_SESSION['SID'] = $SID;
    } else {
        $_SESSION['SID'] = "";
    }
    if ($_POST['Street'] != "") {
        $Street = test_input($_POST['Street']);
        $_SESSION['Street'] = $Street;
    } else {
        $_SESSION['Street'] = "";
    }
    if ($_POST['City'] != "") {
        $City = test_input($_POST['City']);
        $_SESSION['City'] = $City;
    } else {
        $_SESSION['City'] = "";
    }
    if ($_POST['website'] != "") {
        $website = test_input($_POST['website']);
        $_SESSION['website'] = $website;
    } else {
        $_SESSION['website'] = "";
    }
}

function setValPage3()
{
    if ($_POST['start'] != "") {
        $_SESSION['start'] = $_POST['start'];
    }
    if ($_POST['end'] != "") {
        $_SESSION['end'] = $_POST['end'];
    }
    $_SESSION['Days'] = DaysParse($_POST['Days']);
    $_SESSION['ServicesMale'] = SerParse($_POST['Services']);

}

function setValPage4()
{

    if ($_POST['start'] != "") {
        $_SESSION['start'] = $_POST['start'];
    }
    if ($_POST['end'] != "") {
        $_SESSION['end'] = $_POST['end'];
    }
    $_SESSION['Days'] = DaysParse($_POST['Days']);
    $_SESSION['ServicesFemale1'] = SerParse1($_POST['Services']);

}

function DaysParse($Days)
{
    $countArray = count($Days);
    $ArrayRes = array(0, 0, 0, 0, 0, 0, 0);
    for ($i = 0; $i < $countArray; $i++) {
        if ($Days[$i] == "Sat") {
            $ArrayRes[0] = 1;
        }
        if ($Days[$i] == "Sun") {
            $ArrayRes[1] = 1;
        }
        if ($Days[$i] == "Mon") {
            $ArrayRes[2] = 1;
        }
        if ($Days[$i] == "Tue") {
            $ArrayRes[3] = 1;
        }
        if ($Days[$i] == "Wed") {
            $ArrayRes[4] = 1;
        }
        if ($Days[$i] == "Thu") {
            $ArrayRes[5] = 1;
        }
        if ($Days[$i] == "Fri") {
            $ArrayRes[6] = 1;
        }
    }
    return $ArrayRes;
}

function SerParse($Services)
{
    $ArrayRes = array(0, 0, 0, 0, 0, 0, 0, 0);
    $countArray = count($Services);
    for ($i = 0; $i < $countArray; $i++) {
        if ($Services[$i] == "hairCut") {
            $ArrayRes[0] = 1;
        }
        if ($Services[$i] == "SkinCare") {
            $ArrayRes[1] = 1;
        }
        if ($Services[$i] == "Dye") {
            $ArrayRes[2] = 1;
        }
        if ($Services[$i] == "Mesh") {
            $ArrayRes[3] = 1;
        }
        if ($Services[$i] == "Protein") {
            $ArrayRes[4] = 1;
        }
        if ($Services[$i] == "Beard") {
            $ArrayRes[5] = 1;
        }
        if ($Services[$i] == "String") {
            $ArrayRes[6] = 1;
        }
        if ($Services[$i] == "Tamlees") {
            $ArrayRes[7] = 1;
        }
    }
    return $ArrayRes;
}

function SerParse1($Services)
{
    $ArrayRes = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $countArray = count($Services);
    for ($i = 0; $i < $countArray; $i++) {
        if ($Services[$i] == "hairCut") {
            $ArrayRes[0] = 1;
        }
        if ($Services[$i] == "dryer") {
            $ArrayRes[1] = 1;
        }
        if ($Services[$i] == "wax") {
            $ArrayRes[2] = 1;
        }
        if ($Services[$i] == "eyebrows") {
            $ArrayRes[3] = 1;
        }
        if ($Services[$i] == "laser") {
            $ArrayRes[4] = 1;
        }
        if ($Services[$i] == "highlight") {
            $ArrayRes[5] = 1;
        }
        if ($Services[$i] == "style") {
            $ArrayRes[6] = 1;
        }
        if ($Services[$i] == "makeup") {
            $ArrayRes[7] = 1;
        }
        if ($Services[$i] == "pedicure") {
            $ArrayRes[8] = 1;
        }
        if ($Services[$i] == "manicure") {
            $ArrayRes[9] = 1;
        }
        if ($Services[$i] == "skin") {
            $ArrayRes[10] = 1;
        }
        if ($Services[$i] == "dye") {
            $ArrayRes[11] = 1;
        }
        if ($Services[$i] == "mesh") {
            $ArrayRes[12] = 1;
        }
        if ($Services[$i] == "oil") {
            $ArrayRes[13] = 1;
        }
        if ($Services[$i] == "protein") {
            $ArrayRes[14] = 1;
        }
        if ($Services[$i] == "String") {
            $ArrayRes[15] = 1;
        }
        if ($Services[$i] == "keratin") {
            $ArrayRes[16] = 1;
        }
    }
    return $ArrayRes;
}

function InsertSalTable()
{
    $SID = $_SESSION['SID'];
    $phone = $_SESSION['phone'];
    $SalName = $_SESSION['SalName'];
    $Gender = $_SESSION['Gender'];
    $webpage = $_SESSION['website'];
    $image = $_SESSION['Image'];
    $email = $_SESSION['email'];
    $password = $_SESSION['pass1'];
    $City = $_SESSION['City'];
    $Street = $_SESSION['Street'];
    $Services = $_SESSION['ServicesMale'];
    $ServicesPrices = $_SESSION['PricesMale'];
    $start = $_SESSION['start'];
    $end = $_SESSION['end'];
    $Days = $_SESSION['Days'];

    try {
        $user = 'root';
        $pass = '';
        $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
        $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "insert into saloon values('" . $SID . "', '" . $phone . "', '" . $SalName . "',  '" . $Gender . "', '" . $webpage . "', '" . $image . "', '" . $email . "', '" . sha1($password) . "')";
        $result = $db->query($query);
        if (!$result) {
            $_SESSION['errorMSGPage5'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
            $_SESSION['showErrorPage5'] = "block";
            echo '<script type="text/javascript" src="main3.js"></script>';
        } else {
            $query = "insert into saladdress values('" . $SID . "', '" . $City . "', '" . $Street . "')";
            $result = $db->query($query);
            if ($result) {
                if ($Services[0] == 1) {
                    $query = "insert into services values('" . $SID . "', 'قص شعر', '" . $ServicesPrices[0] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[1] == 1) {
                    $query = "insert into services values('" . $SID . "', 'تنظيف بشرة', '" . $ServicesPrices[1] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[2] == 1) {
                    $query = "insert into services values('" . $SID . "', 'صبغه', '" . $ServicesPrices[2] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[3] == 1) {
                    $query = "insert into services values('" . $SID . "', 'ميش', '" . $ServicesPrices[3] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[4] == 1) {
                    $query = "insert into services values('" . $SID . "', 'بروتين', '" . $ServicesPrices[4] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[5] == 1) {
                    $query = "insert into services values('" . $SID . "', 'لحيه', '" . $ServicesPrices[5] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[6] == 1) {
                    $query = "insert into services values('" . $SID . "', 'تنظيف بالخيط', '" . $ServicesPrices[6] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Services[7] == 1) {
                    $query = "insert into services values('" . $SID . "', ' تمليس', '" . $ServicesPrices[7] . "', 'M')";
                    $result = $db->query($query);
                }
                if ($Days[0] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'سبت', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[1] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'أحد', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[2] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'اثنين', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[3] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'ثلاثاء', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[4] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'أريعاء', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[5] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'خميس', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[6] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'جمعة', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                $query = "insert into login values('" . $email . "', '" . sha1($password) . "', '" . $SID . "', 'S')";
                $result = $db->query($query);
                echo '<script>alert("تم انشاء الحساب بنجاح!")</script>';
                echo '<script> window.location.href = "index.php"; </script>';
            } else {
                $_SESSION['errorMSGPage5'] = " حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                $_SESSION['showErrorPage5'] = "block";
                echo '<script type="text/javascript" src="main3.js"></script>';
            }
        }

    } catch (PDOException $e) {
        $_SESSION['errorMSGPage5'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
        $_SESSION['showErrorPage5'] = "block";
        echo '<script type="text/javascript" src="main3.js"></script>';
    }
}

function InsertSalTable1()
{
    $SID = $_SESSION['SID'];
    $phone = $_SESSION['phone'];
    $SalName = $_SESSION['SalName'];
    $Gender = $_SESSION['Gender'];
    $webpage = $_SESSION['website'];
    $image = $_SESSION['Image'];
    $email = $_SESSION['email'];
    $password = $_SESSION['pass1'];
    $City = $_SESSION['City'];
    $Street = $_SESSION['Street'];
    $Services = $_SESSION['ServicesFemale1'];
    $ServicesPrices = $_SESSION['PricesFemale1'];
    $start = $_SESSION['start'];
    $end = $_SESSION['end'];
    $Days = $_SESSION['Days'];

    try {
        $user = 'root';
        $pass = '';
        $db = new PDO('mysql:host=localhost;dbname=halaqi', $user, $pass);
        $db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "insert into saloon values('" . $SID . "', '" . $phone . "', '" . $SalName . "',  '" . $Gender . "', '" . $webpage . "', '" . $image . "', '" . $email . "', '" . sha1($password) . "')";
        $result = $db->query($query);
        if (!$result) {
            $_SESSION['errorMSGPage6'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
            $_SESSION['showErrorPage6'] = "block";
            echo '<script type="text/javascript" src="main3.js"></script>';
        } else {
            $query = "insert into saladdress values('" . $SID . "', '" . $City . "', '" . $Street . "')";
            $result = $db->query($query);
            if ($result) {
                if ($Services[0] == 1) {
                    $query = "insert into services values('" . $SID . "', 'قص شعر', '" . $ServicesPrices[0] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[1] == 1) {
                    $query = "insert into services values('" . $SID . "', 'سشوار', '" . $ServicesPrices[1] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[2] == 1) {
                    $query = "insert into services values('" . $SID . "', 'واكس', '" . $ServicesPrices[2] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[3] == 1) {
                    $query = "insert into services values('" . $SID . "', 'حواجب', '" . $ServicesPrices[3] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[4] == 1) {
                    $query = "insert into services values('" . $SID . "', 'ليزر', '" . $ServicesPrices[4] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[5] == 1) {
                    $query = "insert into services values('" . $SID . "', 'هاي لايت', '" . $ServicesPrices[5] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[6] == 1) {
                    $query = "insert into services values('" . $SID . "', 'تسريحه', '" . $ServicesPrices[6] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[7] == 1) {
                    $query = "insert into services values('" . $SID . "', ' ميك اب', '" . $ServicesPrices[7] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[8] == 1) {
                    $query = "insert into services values('" . $SID . "', 'بدكير', '" . $ServicesPrices[8] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[9] == 1) {
                    $query = "insert into services values('" . $SID . "', 'منكير', '" . $ServicesPrices[9] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[10] == 1) {
                    $query = "insert into services values('" . $SID . "', 'تنظيف بشره', '" . $ServicesPrices[10] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[11] == 1) {
                    $query = "insert into services values('" . $SID . "', 'صبغه', '" . $ServicesPrices[11] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[12] == 1) {
                    $query = "insert into services values('" . $SID . "', 'ميش', '" . $ServicesPrices[12] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[13] == 1) {
                    $query = "insert into services values('" . $SID . "', 'حمام زيت', '" . $ServicesPrices[13] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[14] == 1) {
                    $query = "insert into services values('" . $SID . "', 'بروتين', '" . $ServicesPrices[14] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[15] == 1) {
                    $query = "insert into services values('" . $SID . "', 'تنظيف بالخيط', '" . $ServicesPrices[15] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Services[16] == 1) {
                    $query = "insert into services values('" . $SID . "', 'كراتين', '" . $ServicesPrices[16] . "', 'F')";
                    $result = $db->query($query);
                }
                if ($Days[0] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'سبت', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[1] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'أحد', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[2] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'اثنين', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[3] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'ثلاثاء', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[4] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'أريعاء', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[5] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'خميس', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                if ($Days[6] == 1) {
                    $query = "insert into workhours values('" . $SID . "', 'جمعة', '" . $start . "','" . $end . "')";
                    $result = $db->query($query);
                }
                $query = "insert into login values('" . $email . "', '" . sha1($password) . "', '" . $SID . "', 'S')";
                $result = $db->query($query);
                echo '<script>alert("تم انشاء الحساب بنجاح!")</script>';
                echo '<script> window.location.href = "index.php"; </script>';
            } else {
                $_SESSION['errorMSGPage6'] = " حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
                $_SESSION['showErrorPage6'] = "block";
                echo '<script type="text/javascript" src="main3.js"></script>';
            }
        }

    } catch (PDOException $e) {
        $_SESSION['errorMSGPage6'] = "حصل خطأ أثناء عمل الحساب. الرجاء المحاولة لاحقاً";
        $_SESSION['showErrorPage6'] = "block";
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

