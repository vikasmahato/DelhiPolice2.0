<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

    $admis_amt = $_POST['admis_amt'];
    $send_to = $_POST['send_to'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $sanction_no = $_POST['sanction_no'];
    $id = $_POST['id'];

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


$sql = "UPDATE register SET `admis_amt`= '$admis_amt', `send_to`= '$send_to', `number`= '$number', `date`= '$date', `sanction_no`= '$sanction_no' WHERE s_no = $id";


/*if(mysqli_query($con, $sql))
{
    $last_id = mysqli_insert_id($con);
    echo "New Record created Last ID = ".$last_id;
}else  {
    echo "Error: ".$sql . "<br>" . mysqli_error($con);
}*/
if(mysqli_query($con, $sql)){
header('location: register.php');
}else {
    echo "Some error occurred";
}

?>