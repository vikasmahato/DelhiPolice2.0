<?php
session_start();

ob_start();
include("includes/dbcon.php");
$user_id=$_POST['user_id']; 
$pass=$_POST['pass']; 

$sql="SELECT * FROM users WHERE username=? AND password=?";
$stmt = $con->prepare($sql);
$stmt->bind_param('ss', $user_id, $pass);


$stmt->execute();

$result=$stmt->get_result();
$count=mysqli_num_rows($result);

// If result matched $email and $pass, table row must be 1 row
// If result matched $email and $pass, table row must be 1 row
if($count==1){
    $_SESSION['user_id']=$user_id;
    if($user_id=="dealinghand"){
     $_SESSION['sess_userrole']="dealinghand";
         header("Location: dashboard.php");
    }elseif($user_id=="acp"){
     $_SESSION['sess_userrole']="acp";
         header("Location: dashboard_acp.php");
    }elseif($user_id=="hag"){
     $_SESSION['sess_userrole']="hag";
         header("Location: dashboard_hag.php");
    }elseif($user_id=="iadmin"){
     $_SESSION['sess_userrole']="iadmin";
         header("Location: dashboard_iadmin.php");
    }elseif($user_id=="admin"){
     $_SESSION['sess_userrole']="admin";
         header("Location: dashboard_dcp.php");
    }
   $stmt->close();
   
}
else {
    $stmt->close();
 header("Location: index.php?msg=error");
}
ob_end_flush();

?>