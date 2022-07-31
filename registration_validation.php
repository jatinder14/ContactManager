<?php
  require_once "config.php";
  if($_POST['email']!=''){
    $email = $_POST['email'];
    $exist="select * from users where email='$email'";
    $result=$conn->query($exist) ;
    if ($result->num_rows > 0) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
?>