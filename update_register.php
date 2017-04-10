<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

    $admis_amt = $_POST['admis_amt'];
    $send_to = $_POST['send_to'];
    $date = $_POST['date'];
    $sanction_no = $_POST['sanction_no'];
    $id = $_POST['id'];
    $amt_claimed = $_POST['amt_claimed'];


if($admit_amt==""){
    $admit_amt = " ";
}
if($send_to==""){
    $send_to = " ";
}
if($number==""){
    $number = " ";
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


$sql = "UPDATE register SET `admis_amt`= '$admis_amt', `send_to`= '$send_to', `amt_claimed`= '$amt_claimed', `date`= '$date', `sanction_no`= '$sanction_no' WHERE s_no = $id";
echo $sql;

if(mysqli_query($con, $sql)){
header('location: register.php');
}else {
   header('location: some_error.php');
}

?>