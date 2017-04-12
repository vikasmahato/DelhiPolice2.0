<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

$diaryNo = $_POST['diaryNo'];
    $diaryType = $_POST['diaryType'];
    $diaryDate = $_POST['diaryDate'];
    $rank = $_POST['rank'];
    $applicantName = $_POST['applicantName'];
    $idNo = $_POST['idNo'];
    $pis = $_POST['pis'];
    $treatment_by = $_POST['treatment_by'];
    $hospitalName = $_POST['hospitalName'];
    $type = $_POST['type'];
    $amt_claimed = $_POST['amt_claimed'];
    $admis_amt = $_POST['admis_amt'];
    $send_to = $_POST['send_to'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $sanction_no = $_POST['sanction_no'];

$sql = "INSERT INTO register ( `diaryNo`, `diaryType`, `diaryDate`, `rank`, `applicantName`, `idNo`, `pis`, `treatment_by`, `hospitalName`, `type`, `amt_claimed`, `admis_amt`, `send_to`, `number`, `date`, `sanction_no`) VALUES ('$diaryNo','$diaryType','$diaryDate','$rank','$applicantName','$idNo','$pis','$treatment_by','$hospitalName','$type','$amt_claimed','$admis_amt','$send_to','$number','$date','$sanction_no')";

if(mysqli_query($con, $sql)){
    $last_id = mysqli_insert_id($con);
header('location: viewregister.php?id='.$last_id);
}else {     
    header('location:some_error.php ');
    //echo $sql;
    //echo mysqli_error($con);
}

?>