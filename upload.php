<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo "$a";

// echo $_FILES["image"]["tmp_name"];
 if (move_uploaded_file($_FILES["image"]["tmp_name"], "/var/www/html/contact_application/uploads/$a")) {
    echo "file uploaded";
    echo "<br/>";
  
 }else{

    echo "There is some problem";
 }
?>
