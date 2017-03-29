<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

$appName = $_POST['applicantName'];
$pis = $_POST['pis'];
$rank = $_POST['rank'];
$relation = $_POST['relation'];
$pincode = 000000;
$startDate = $_POST['startDate'];
$hospitalName = $_POST['hospitalName'];
$hospitalAddress = $_POST['hospitalAddress'];
$policestationNo = $_POST['idNo'];
$diaryNo = $_POST['diaryNo'];
$appCGHSno = $_POST['appCGHSno'];
$appCGHSexp = $_POST['appCGHSexp'];
$refCGHSno = $_POST['refCGHSno'];
$refCGHSexp = $_POST['refCGHSexp'];
$appCGHScategory = $_POST['appCGHScategory'];
$disease = $_POST['disease'];
$diaryDate = $_POST['diaryDate'];
$amtAsked = $_POST['amtAsked'];
$claim_type = "Permission Credit";

$sql = "INSERT INTO form (application_date, applicant_name, pis, rank, relation, startdate, hospital_name, hospital_address, police_station_no, diary_no, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, diary_date, claim_type, status ) 

VALUES (CURDATE(), '$appName', '$pis', '$rank', '$relation', '$startDate', '$hospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo',$appCGHSno,'$appCGHSexp',$refCGHSno,'$refCGHSexp','$appCGHScategory', '$diaryDate','CREDIT', 'HAG')";

//echo $sql; 
if(mysqli_query($con, $sql)){
header('location: dashboard.php');
}else {
    echo "Some error occurred";
}
?>