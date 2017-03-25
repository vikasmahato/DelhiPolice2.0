<?php
session_start();

ob_start();
include("includes/dbcon.php");
$user_id=$_POST['user_id']; 
$pass=$_POST['pass']; 

$sql="SELECT * FROM users WHERE username='$user_id' AND password='$pass'";
$result=mysqli_query($con, $sql);
$count=mysqli_num_rows($result);

// If result matched $email and $pass, table row must be 1 row
// If result matched $email and $pass, table row must be 1 row
if($count==1){
    $_SESSION['user_id']=$user_id;
    if($user_id=="dealinghand"){
     $_SESSION['name']="dealinghand";
         header("Location: dashboard.php");
    }elseif($user_id=="acp"){
     $_SESSION['name']="acp";
         header("Location: dashboard_acp.php");
    }elseif($user_id=="hag"){
     $_SESSION['name']="hag";
         header("Location: dashboard_hag.php");
    }elseif($user_id=="iadmin.com"){
     $_SESSION['name']="iadmin";
         header("Location: dashboard_iadmin.php");
    }elseif($user_id=="admin"){
     $_SESSION['name']="admin";
         header("Location: dashboard_dcp.php");
    }
   
   
}
else {
 header("Location: index.php?msg=error");
}
ob_end_flush();

?>