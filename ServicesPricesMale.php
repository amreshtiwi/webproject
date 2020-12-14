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
$Services = $_SESSION['ServicesMale'];
$Prices = $_SESSION['PricesMale'];
$showError =  $_SESSION['showErrorPage5'];
$errorMSG = $_SESSION['errorMSGPage5'];
if($Services[0] == 1){
    echo " <h2>  قص شعر: </h2>" ;
    if($Prices[0] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='hairCut'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[0]' name='hairCut'> ";

    echo "<br>";
}
if($Services[1] == 1){
    echo " <h2> تنظيف بشره: </h2>" ;
    if($Prices[1] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='skin'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[1]' name='skin'> ";
    echo "<br>";
}
if($Services[2] == 1){
    echo " <h2>  صبغه: </h2>" ;
    if($Prices[2] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='Dye'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[2]' name='Dye'> ";
    echo "<br>";
}
if($Services[3] == 1){
    echo " <h2> ميش: </h2>" ;
    if($Prices[3] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='mesh'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[3]' name='mesh'> ";
    echo "<br>";
}
if($Services[4] == 1){
    echo " <h2>  بروتين: </h2>" ;
    if($Prices[4] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='protein'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[4]' name='protein'> ";
    echo "<br>";
}
if($Services[5] == 1){
    echo " <h2>  لحيه: </h2>" ;
    if($Prices[5] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='beard'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[5]' name='beard'> ";
    echo "<br>";
}
if($Services[6] == 1){
    echo " <h2>  تنظيف بالخيط: </h2>" ;
    if($Prices[6] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='String'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[6]' name='String'> ";
    echo "<br>";
}
if($Services[7] == 1){
    echo " <h2>  تمليس: </h2>" ;
    if($Prices[7] == -1) echo " <input type='number' step='0.01' maxlength='6' value='' name='tamlees'> ";
    else echo " <input type='number' step='0.01' maxlength='6' value='$Prices[7]' name='tamlees'> ";
    echo "<br>";
}
?>
    <input type="submit" name="Page5" value="انطلق!!">
    <span style="color: darkred; display: <?php echo $showError; ?> ">      <?php echo $errorMSG; ?> </span>
</form>
</body>
</html>
