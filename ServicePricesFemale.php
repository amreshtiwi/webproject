<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حلاقي</title>
</head>
<body>
<form action="SignUpSaloonProcess.php" method="post">
    <?php
    $Services = $_SESSION['ServicesFemale1'];
    $Prices = $_SESSION['PricesFemale1'];
    $showError =  $_SESSION['showErrorPage6'];
    $errorMSG = $_SESSION['errorMSGPage6'];
    if($Services[0] == 1){
        echo " <h2>  قص شعر: </h2>" ;
        if($Prices[0] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='hairCut'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[0]' name='hairCut'> ";

        echo "<br>";
    }
    if($Services[1] == 1){
        echo " <h2> سشوار: </h2>" ;
        if($Prices[1] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='dryer'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[1]' name='dryer'> ";
        echo "<br>";
    }
    if($Services[2] == 1){
        echo " <h2>  واكس: </h2>" ;
        if($Prices[2] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='wax'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[2]' name='wax'> ";
        echo "<br>";
    }
    if($Services[3] == 1){
        echo " <h2> حواجب: </h2>" ;
        if($Prices[3] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='eyebrows'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[3]' name='eyebrows'> ";
        echo "<br>";
    }
    if($Services[4] == 1){
        echo " <h2>  ليزر: </h2>" ;
        if($Prices[4] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='laser'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[4]' name='laser'> ";
        echo "<br>";
    }
    if($Services[5] == 1){
        echo " <h2>  هاي لايت: </h2>" ;
        if($Prices[5] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='highlight'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[5]' name='highlight'> ";
        echo "<br>";
    }
    if($Services[6] == 1){
        echo " <h2> تسريحه: </h2>" ;
        if($Prices[6] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='style'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[6]' name='style'> ";
        echo "<br>";
    }
    if($Services[7] == 1){
        echo " <h2>  ميك اب: </h2>" ;
        if($Prices[7] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='makeup'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[7]' name='makeup'> ";
        echo "<br>";
    }
    if($Services[8] == 1){
        echo " <h2>  بدكير: </h2>" ;
        if($Prices[8] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='pedicure'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[8]' name='pedicure'> ";
        echo "<br>";
    }
    if($Services[9] == 1){
        echo " <h2>  منكير: </h2>" ;
        if($Prices[9] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='manicure'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[9]' name='manicure'> ";
        echo "<br>";
    }
    if($Services[10] == 1){
        echo " <h2>  تنظيف بشره: </h2>" ;
        if($Prices[10] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='skin'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[10]' name='skin'> ";
        echo "<br>";
    }
    if($Services[11] == 1){
        echo " <h2>  صبغه: </h2>" ;
        if($Prices[11] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='dye'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[11]' name='dye'> ";
        echo "<br>";
    }
    if($Services[12] == 1){
        echo " <h2>  ميش: </h2>" ;
        if($Prices[12] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='mesh'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[12]' name='mesh'> ";
        echo "<br>";
    }
    if($Services[13] == 1){
        echo " <h2>  حمام زيت: </h2>" ;
        if($Prices[13] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='oil'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[13]' name='oil'> ";
        echo "<br>";
    }
    if($Services[14] == 1){
        echo " <h2>  بروتين: </h2>" ;
        if($Prices[14] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='protein'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[14]' name='protein'> ";
        echo "<br>";
    }
    if($Services[15] == 1){
        echo " <h2>  تنظيف بالخيط: </h2>" ;
        if($Prices[15] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='String'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[15]' name='String'> ";
        echo "<br>";
    }
    if($Services[16] == 1){
        echo " <h2>  كراتين: </h2>" ;
        if($Prices[16] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='keratin'> ";
        else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[16]' name='keratin'> ";
        echo "<br>";
    }
    ?>
    <input type="submit" name="Page6" value="انطلق!!">
    <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
</form>
</body>
</html>
