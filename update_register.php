<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

    $admis_amt = $_POST['admis_amt'];
  //  $send_to = $_POST['send_to'];
    $date = $_POST['date'];
    $sanction_no = $_POST['sanction_no'];
    $sanction_date = $_POST['sanction_date'];
    $id = $_POST['id'];
    $amt_claimed = $_POST['amt_claimed'];
$phq_number = $_POST['phq_number'];
$diaryType = $_POST['diaryType'];

$table = '';

if($diaryType=='Individual'){
 $table='register';   
}elseif($diaryType=='Hospital'){
 $table='register_hospital';   
}


if($admis_amt==""){
    $admis_amt = " ";
}
if($date==""){
    $date = " ";
}
if($sanction_no==""){
    $sanction_no = " ";
}
if($amt_claimed==""){
    $amt_claimed = " ";
}
if($phq_number==""){
    $phq_number = " ";
}

if($sanction_date==""){
    $sanction_date = " ";
}



$sql = "UPDATE $table SET `admis_amt`= '$admis_amt', `amt_claimed`= '$amt_claimed', `number`='$phq_number', `date`= '$date', `sanction_no`= '$sanction_no', `sanction_date`= '$sanction_date' WHERE s_no = $id";
echo $sql;

if(mysqli_query($con, $sql)){
header('location: register.php');
}else {
   header('location: some_error.php');
}

?>