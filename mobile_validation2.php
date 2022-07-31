<?php
  session_start();
  $user_id=$_SESSION['id'];
  $record_id=$_SESSION['record_id'];
  require_once "config.php";
  if($_POST['mobile']!=''){
    $mobile = $_POST['mobile'];
    $exist="select * from contact_details where mobile='$mobile' AND user_id='$user_id' AND id!='$record_id'";
    $result=$conn->query($exist) ;
    if ($result->num_rows > 0) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
?>