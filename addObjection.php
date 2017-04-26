<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);
include("includes/dbcon.php");

  
 $id = $_POST['id'];

$objection = $_POST['objection'];

$diaryType = $_POST['diaryType'];

$table = '';

if($diaryType=='Individual'){
 $table='register';   
}elseif($diaryType=='Hospital'){
 $table='register_hospital';   
}



$sql = "UPDATE $table SET `objection`= '$objection' WHERE s_no = $id";
//echo $sql;

if(mysqli_query($con, $sql)){
header('location: register.php');
}else {
   header('location: some_error.php');
}

?>