<?php
require 'includes/dbcon.php';

$subtotal = round($_POST['subTotal']);

$itemNo = $_POST['itemNo'];
$itemName = $_POST['itemName'];
$totalGranted = $_POST['total'];
$itemHosp = $_POST['itemHosp'];
$itemDate = $_POST['itemDate'];
$totalAsked = $_POST['total_asked'] ;
$sumTotalAsked = round($_POST['askedTotal']);
$appid = $_POST['appId'];
$arrlength = count($itemNo);


    if(isset($_POST['edit'])){
        mysqli_query($con, "DELETE FROM medical WHERE app_id = ".$appid);
    }
    
    if($subtotal > 200000)
    
        $sql = "UPDATE form SET amt_granted = '$subtotal',amt_asked = '$sumTotalAsked',  status = 'PHQ' WHERE app_id = '$appid' ";
    else
        $sql = "UPDATE form SET amt_granted = '$subtotal',amt_asked = '$sumTotalAsked',  status = 'HAG' WHERE app_id = '$appid' ";
    
    mysqli_query($con, $sql);
    
    for($x = 0; $x < $arrlength; $x++) {
         
         if($itemNo[$x]=='')
         {
             $itemNo[$x]=0;
         }
        if($itemHosp[$x]=='')
         {
             $itemHosp[$x]=' ';
         }
         $sql3 = "INSERT INTO medical (app_id, s_no, treatment, total, bill_no_hosp, date, amt_asked) VALUES ('$appid','$itemNo[$x]', '$itemName[$x]', '$totalGranted[$x]', '$itemHosp[$x]', '$itemDate[$x]','$totalAsked[$x]')";
        
         mysqli_query($con, $sql3);
    }
   
    
    
    echo "New record created successfully " ;
    
    header ("Location: viewclaim.php?id=$appid");

?>

