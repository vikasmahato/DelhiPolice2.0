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
$endDate = $_POST['endDate'];
$hospitalName = $_POST['refHospitalName'];
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
$relativeName = $_POST['relativeName'];
$refHospitalName = $_POST['hospitalName'];

$sql = "INSERT INTO form (application_date, applicant_name, pis, rank, relation,relative_name, startdate, enddate, hospital_name,ref_hospital_name, hospital_address, police_station_no, diary_no, a_cghs_no, a_cghs_exp, r_cghs_no, r_cghs_exp, a_cghs_category, diary_date, claim_type, status ) 

VALUES (CURDATE(), '$appName', '$pis', '$rank', '$relation','$relativeName', '$startDate','$endDate', '$hospitalName', '$refHospitalName', '$hospitalAddress', '$policestationNo', '$diaryNo',$appCGHSno,'$appCGHSexp',$refCGHSno,'$refCGHSexp','$appCGHScategory', '$diaryDate','OP_REFERRAL', 'HAG')";

if(mysqli_query($con, $sql)){
    $last_id =  mysqli_insert_id($con);
        header('location: checklist.php?id='.$last_id);
}else{
    echo mysqli_error($con);
  //  header('location:some_error.php ');
}


?>