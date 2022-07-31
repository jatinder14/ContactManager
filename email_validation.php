<?php
  session_start();
  $user_id=$_SESSION['id'];
  require_once "config.php";
  if($_POST['email']!=''){
    $email = $_POST['email'];
    $exist="select * from contact_details where email='$email' AND user_id='$user_id'";
    $result=$conn->query($exist) ;
    if ($result->num_rows > 0) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
?>