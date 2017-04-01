<?php
require 'includes/dbcon.php';
session_start();
if (isset($_POST['approve_btn'])){
        $comment =  $_POST['inputComment'];
    $choice = $_SESSION['sess_userrole'];
    $id = $_POST['appId'];
    $insetComment='';
    $updateStatus='';
    
switch ($choice) {
    case "hag":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'hag','$comment')";
        $updateStatus="UPDATE form SET status='I_ADMIN' WHERE app_id = $id";
        break;
    case "iadmin":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'iadmin','$comment')";
        $updateStatus="UPDATE form SET status='ACP' WHERE app_id = $id";
        break;
    case "acp":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'acp','$comment')";
        $updateStatus="UPDATE form SET status='DCP' WHERE app_id = $id";
        break;
    case "admin":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'admin','$comment')";
        $updateStatus="UPDATE form SET status='APPROVED' WHERE app_id = $id";
        break;
    default:
        
}
    if(mysqli_query($con, $insetComment)){
        mysqli_query($con, $updateStatus);
        echo "updated";
    }else {
        echo "some error occurred";
    }
    header('location: dashboard.php');
    }
elseif(isset($_POST['deny_btn'])){
    
    $reason = $_POST['reason'];   
    $choice = $_SESSION['sess_userrole'];
    $id = $_POST['appId'];
    $insetComment='';
    $updateStatus='';
    
switch ($choice) {
    case "hag":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'hag','$reason')";
        $updateStatus="UPDATE form SET status='REEVAL_HAG' WHERE app_id = $id";
        break;
    case "iadmin":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'iadmin','$reason')";
        $updateStatus="UPDATE form SET status='REEVAL_IADMIN' WHERE app_id = $id";
        break;
    case "acp":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'acp','$reason')";
        $updateStatus="UPDATE form SET status='REEVAL_ACP' WHERE app_id = $id";
        break;
    case "admin":
        $insetComment="INSERT INTO `comments`(`app_id`, `user_id`, `comment`) VALUES ( $id,'admin','$reason')";
        $updateStatus="UPDATE form SET status='REEVAL_DCP' WHERE app_id = $id";
        break;
    default:
        
}
    if(mysqli_query($con, $insetComment)){
        mysqli_query($con, $updateStatus);
        echo "updated";
    }else {
        echo "some error occurred";
    }
    
    header('location: dashboard.php');
    
}elseif(isset($_POST['reeval_approve'])){
       
    $choice = $_SESSION['sess_userrole'];
    $id = $_POST['appId'];
    $status = $_POST['revStatus'];
    $updateStatus='';
    
switch ($status) {
    case "REEVAL_HAG":
        $updateStatus="UPDATE form SET status='HAG' WHERE app_id = $id";
        break;
    case "REEVAL_IADMIN":
        $updateStatus="UPDATE form SET status='I_ADMIN' WHERE app_id = $id";
        break;
    case "REEVAL_ACP":
        $updateStatus="UPDATE form SET status='ACP' WHERE app_id = $id";
        break;
    case "REEVAL_DCP":
        $updateStatus="UPDATE form SET status='DCP' WHERE app_id = $id";
        break;
    default:
        
}
       if(mysqli_query($con, $updateStatus)){
        echo "updated";
        }
    
    header('location: dashboard.php');
    
}
?>
