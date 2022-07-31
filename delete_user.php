<?php
// Include config file

session_start();

$id=$_GET['id'];
require_once "config.php";
$sql=" DELETE FROM contact_details WHERE id= $id ";


if ($conn->query($sql) === TRUE) {
  $_SESSION['delete']=1;
    header("Location: http://localhost/contact_application/index.php");


} else {
  
  echo die("Error: " . $sql . "<br>" . $conn->error);
}

  
  
?>