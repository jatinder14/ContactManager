<?PHP

session_start();

if(!isset($_SESSION['email']))
{
header('location:http://localhost/contact_application/login.php');

}


session_destroy();

header('location:http://localhost/contact_application/login.php');
?>
