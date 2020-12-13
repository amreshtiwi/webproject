<?php
session_start();
if (isset($_POST['Page1'])) {
    //echo '<script>alert("Page1");</script>';
    $SalName = $Gender = $email = $phone = $pass1 = $pass2 ="";
    if (isset($_POST['SalName']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['pass1']) && isset($_POST['pass2'])
        && $_POST['SalName'] != "" && $_POST['gender'] != "" && $_POST['email'] != "" && $_POST['phone'] != "" && $_POST['pass1'] != "" && $_POST['pass2'] != "") {
        $SalName = test_input($_POST['SalName']);
        $Gender = test_input($_POST['gender']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $pass1 = test_input($_POST['pass1']);
        $pass2 = test_input($_POST['pass2']);
        echo '<script> alert("'.$Gender.'"); </script>';
        if ($pass1 == $pass2) {
            $_SESSION['SID'] = $_SESSION['City'] = $_SESSION['Street'] = $_SESSION['website'] = "";
            $_SESSION['SalName'] = $SalName;
            $_SESSION['Gender'] = $Gender;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['pass1'] = $pass1;
            $_SESSION['pass2'] = $pass2;
            echo '<script> window.location.href = "signup-salon1.php?click=0"; </script>';
        } else {
            setValPage1();
            $errorMSG = "كلمات المرور غير متطابقة";
            $showError = "block";
            // echo '<script type="text/javascript" src="main3.js"></script>';
            echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
        }
    } else {
        setValPage1();
        $errorMSG = "الرجاء إدخال جميع الحقول";
        $showError = "block";
        // echo '<script type="text/javascript" src="main3.js"></script>';
        echo '<script> window.location.href = "signup-salon.php?click=1"; </script>';
    }
} else if (isset($_POST['Page2'])) {
    $SID = $City = $Street = $website = $Days = $start = $end = "";
    if (isset($_POST['SID']) && isset($_POST['City']) && isset($_POST['Street']) && isset($_POST['website'])
        && $_POST['SID'] != "" && $_POST['City'] != "" && $_POST['Street'] != "" && $_POST['website'] != "") {
        $SID = test_input($_POST['SID']);
        $City = test_input($_POST['City']);
        $Street = test_input($_POST['Street']);
        $website = test_input($_POST['website']);
        $_SESSION['Image'] = $_SESSION['Services'] = "";
       // echo '<script> alert("'.$_SESSION['Gender'].'"); </script>';
        if($_SESSION['Gender'] == 'M'){
            echo '<script> window.location.href = "complete_Signup_salon_man.php?click=0"; </script>';
        }else {
            echo '<script> window.location.href = "complete_Signup_salon_woman.php?click=0"; </script>';
        }
        //echo '<script>alert("Page2");</script>';
    }
}

    function setValPage1()
    {
        $_SESSION['SalName'] = $_SESSION['Gender'] = $_SESSION['email'] = $_SESSION['phone'] = $_SESSION['pass1'] = $_SESSION['pass2'] = "";
        if ($_POST['SalName'] != "") {
            $SalName = test_input($_POST['SalName']);
            $_SESSION['SalName'] = $SalName;
        }
        if ($_POST['gender'] != "") {
            $Gender = test_input($_POST['gender']);
            $_SESSION['Gender'] = $Gender;
        }
        if ($_POST['email'] != "") {
            $email = test_input($_POST['email']);
            $_SESSION['email'] = $email;
        }
        if ($_POST['phone'] != "") {
            $phone = test_input($_POST['phone']);
            $_SESSION['phone'] = $phone;
        }
        if ($_POST['pass1'] != "") {
            $pass1 = test_input($_POST['pass1']);
            $_SESSION['pass1'] = $pass1;
        }
        if ($_POST['pass2'] != "") {
            $pass2 = test_input($_POST['pass2']);
            $_SESSION['pass2'] = $pass2;
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

//echo '<script> window.location.href = "signup-salon.php"; </script>';
    ?>