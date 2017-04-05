<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

$rank = $_POST['rank'];
$appName = $_POST['applicantName'];
$policestationNo = $_POST['idNo']; //belt Number
$pis = $_POST['pis'];
$relation = $_POST['relation'];
$startDate = $_POST['startDate'];
$hospitalName = $_POST['hospitalName'];
$refHospitalName = $_POST['refHospitalName'];
$hospitalAddress = $_POST['hospitalAddress'];

$diaryNo = $_POST['diaryNo'];
$diaryDate = $_POST['diaryDate'];
$appCGHSno = $_POST['appCGHSno'];
$appCGHSexp = $_POST['appCGHSexp'];
$refCGHSno = $_POST['refCGHSno'];
$refCGHSexp = $_POST['refCGHSexp'];
$appCGHScategory = $_POST['appCGHScategory'];
$claim_type = "Permission Treatment";
$relativeName = $_POST['relativeName'];

$sql = "INSERT INTO form (application_date, applicant_name, pis, rank, relation, relative_name, startdate, hospital_name, ref_hospital_name, hospital_address, police_station_no, diary_no, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, diary_date, claim_type, status ) 

VALUES (CURDATE(), '$appName', '$pis', '$rank', '$relation','$relativeName', '$startDate', '$hospitalName', '$refHospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo',$appCGHSno,'$appCGHSexp',$refCGHSno,'$refCGHSexp','$appCGHScategory', '$diaryDate','PERMISSION', 'HAG')";

//echo $sql; 
if(mysqli_query($con, $sql)){
header('location: dashboard.php');
}else{
	header('location:some_error.php ');
}
?>