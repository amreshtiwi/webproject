<?php
session_start();
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حلاقي</title>
    <link rel="icon" href="imgs/halaqee4.png">
    <link rel="stylesheet" href="styles/style5.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Turret+Road:wght@300&display=swap"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/45aa54fd2a.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>
<body>
<div class="wrap">
    <div class="welcome">
    <h1>أهلاً بك </h1><!--  هو بتضيف اسم الصالون الي بدو يسجل  -->
    <p>  بقي عليك خطوه أخيره</p>
    <p>أدخل أسعار خدماتك التي اخترتها</p>
    </div>
    <div class="login-content">
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
    <div class="cont">
    <?php
    $Services = $_SESSION['ServicesFemale1'];
    $Prices = $_SESSION['PricesFemale1'];
    $showError =  $_SESSION['showErrorPage6'];
    $errorMSG = $_SESSION['errorMSGPage6'];
    if($Services[0] == 1){
        echo "<div class='input-div1'> <div class='input-div  focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  قص شعر: </h5>" ;
        if($Prices[0] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='hairCut'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[0]' name='hairCut'> ";
        echo "</div> </div> </div>";
//        echo "<br>";
    }
    if($Services[1] == 1){
        echo "<div class='input-div1'><div class='input-div input-div2 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5> سشوار: </h5>" ;
        if($Prices[1] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='dryer'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[1]' name='dryer'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[2] == 1){
        echo "<div class='input-div1'><div class='input-div input-div3 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  واكس: </h5>" ;
        if($Prices[2] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='wax'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[2]' name='wax'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[3] == 1){
        echo "<div class='input-div1'><div class='input-div input-div4 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5> حواجب: </h5>" ;
        if($Prices[3] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='eyebrows'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[3]' name='eyebrows'> ";
        echo "</div> </div></div>";

//        echo "<br>";
    }
    if($Services[4] == 1){
        echo "<div class='input-div1'><div class='input-div input-div5 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  ليزر: </h5>" ;
        if($Prices[4] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='laser'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[4]' name='laser'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[5] == 1){
        echo "<div class='input-div1'><div class='input-div input-div6 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  هاي لايت: </h5>" ;
        if($Prices[5] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='highlight'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[5]' name='highlight'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[6] == 1){
        echo "<div class='input-div1'><div class='input-div input-div7 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5> تسريحه: </h5>" ;
        if($Prices[6] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='style'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[6]' name='style'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[7] == 1){
        echo "<div class='input-div1'><div class='input-div input-div8 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  ميك اب: </h5>" ;
        if($Prices[7] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='makeup'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[7]' name='makeup'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[8] == 1){
        echo "<div class='input-div1'><div class='input-div input-div9 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  بدكير: </h5>" ;
        if($Prices[8] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='pedicure'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[8]' name='pedicure'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[9] == 1){
        echo "<div class='input-div1'><div class='input-div input-div10 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  منكير: </h5>" ;
        if($Prices[9] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='manicure'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[9]' name='manicure'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[10] == 1){
        echo "<div class='input-div1'><div class='input-div input-div11 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  تنظيف بشره: </h5>" ;
        if($Prices[10] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='skin'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[10]' name='skin'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[11] == 1){
        echo "<div class='input-div1'><div class='input-div input-div12 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  صبغه: </h5>" ;
        if($Prices[11] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='dye'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[11]' name='dye'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[12] == 1){
        echo "<div class='input-div1'><div class='input-div input-div13 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  ميش: </h5>" ;
        if($Prices[12] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='mesh'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[12]' name='mesh'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[13] == 1){
        echo "<div class='input-div1'><div class='input-div input-div14 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  حمام زيت: </h5>" ;
        if($Prices[13] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='oil'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[13]' name='oil'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[14] == 1){
        echo "<div class='input-div1'><div class='input-div input-div15 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  بروتين: </h5>" ;
        if($Prices[14] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='protein'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[14]' name='protein'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[15] == 1){
        echo "<div class='input-div1'><div class='input-div input-div16 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  تنظيف بالخيط: </h5>" ;
        if($Prices[15] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='String'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[15]' name='String'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    if($Services[16] == 1){
        echo "<div class='input-div1'><div class='input-div input-div17 focus ' id=''>
                <div class='i'>
                </div>
                <div>";
        echo " <h5>  كراتين: </h5>" ;
        if($Prices[16] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='keratin'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[16]' name='keratin'> ";
        echo "</div> </div></div>";
//        echo "<br>";
    }
    echo "<script src='main3.js'></script>";
    ?>
    <input type="submit" class="btn" name="Page6" value="انطلق!">
    <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
    </div>
</form>
</div>
</div>

</body>
</html>
