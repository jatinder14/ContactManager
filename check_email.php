<?php
require_once("database.php"); // require the db connection
/* catch the post data from ajax */
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$query = mysql_query("SELECT `email` FROM `users` WHERE `email` = '$email'");
if(mysql_num_rows($query) == 1) { // if return 1, email exist.
    echo '1';
} else { // else not, insert to the table
    $query = mysql_query("INSERT INTO `users` (`first_name` ,`last_name` ,`email`)
                            VALUES ('$fname', '$lname', '$email')");
  }
?>