<?php

session_start();
require 'crud.php';
require 'dbcon.php';

$name ="";
$value = array();

        if (isset($_POST['approve_btn'])) {
            //approve action
           // echo "approve";
           $id = $_GET['id'];       
            $comment = $_POST['inputComment'];
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM form WHERE app_id = $id";                         
            //nothing here
            foreach ($con->query($sql) as $row) {
                $value = $row;           
            }
           
            switch ($_SESSION["sess_userrole"]){
                case "hag":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "acp":
                   update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "admin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "dealing":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                case "iadmin":
                    update_data($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
                    break;
                default:
                     header ("Location: index.php");
            }
            
            
        } elseif (isset($_POST['deny_btn'])) {
            //deny action
            $id = $_GET['id'];
            $comment = $_POST['inputComment'];
            
            if ($_SESSION["sess_userrole"]!=null){
                  delete($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
                
        } elseif(isset($_POST['reval_btn'])) {
          //  echo "hello";
             $id = $_GET['id'];
            $comment = $_POST['inputComment'];
           // echo $comment;
            if ($_SESSION["sess_userrole"]!=null){
                  reeval($_SESSION["sess_userrole"], $id, $comment);header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
        }elseif(isset($_POST['memo_btn'])) {
          //  echo "hello";
             $id = $_GET['id'];
            $memo = $_POST['inputMemo'];
		$memoDate = $_POST['inputMemoDate'];
           // echo $comment;
            if ($_SESSION["sess_userrole"]!=null){
                  //reeval($_SESSION["sess_userrole"], $id, $comment);
                 require 'database-config.php';
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $sql = "UPDATE form SET phq_memo='$memo', status='HAG', phq_memo_date='$memoDate' WHERE app_id=$id";

        $stmt = $con->prepare($sql);
        $stmt->execute();

        echo $stmt->rowCount() . " records UPDATED sussesfully by user $user"; 
	header("Location: {$_SERVER["HTTP_REFERER"]}");
            }
        }else{
            //No button pressed
        }

?>